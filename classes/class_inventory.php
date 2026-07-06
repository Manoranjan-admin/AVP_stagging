<?php

class Inventory
{
    // 	public $id;

    // 	public function __construct($c_id) {

    // 		$this->id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $c_id);

    //    }



    function getItemStockList($data)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $start  = intval($data['start']);
        $length = intval($data['length']);
        $search = $data['search']['value'];

        $type     = (int) $data['type'];      // 1 = Commercial, 2 = Non Commercial
        $itemType = (int) $data['item_type'];

        /* ---------------- Search Condition ---------------- */
        $searchCondition = "";
        if (!empty($search)) {
            $search = mysqli_real_escape_string($conn, $search);
            $searchCondition = " AND (
            item.item_name LIKE '%$search%' 
            OR item.type LIKE '%$search%'
        )";
        }

        /* ---------------- Total Records (No Search) ---------------- */
        $totalQuery = "SELECT COUNT(DISTINCT item.pk_items_id) AS total
                        FROM erp_items item
                        INNER JOIN erp_stocks stock ON stock.fk_items_id = item.pk_items_id
                        WHERE item.visibility = 1
                        AND stock.visibility = 1
                        AND item.type = $type
                        AND item.item_type = $itemType
                    ";

        $totalResult  = mysqli_query($conn, $totalQuery);
        $totalRecords = mysqli_fetch_assoc($totalResult)['total'];

        /* ---------------- Total Filtered Records (With Search) ---------------- */
        $filteredQuery = "SELECT COUNT(DISTINCT item.pk_items_id) AS total
                            FROM erp_items item
                            INNER JOIN erp_stocks stock ON stock.fk_items_id = item.pk_items_id
                            WHERE item.visibility = 1
                            AND stock.visibility = 1
                            AND item.type = $type
                            AND item.item_type = $itemType
                            $searchCondition
                        ";

        $filteredResult  = mysqli_query($conn, $filteredQuery);
        $totalFiltered   = mysqli_fetch_assoc($filteredResult)['total'];

        /* ---------------- Main Data Query ---------------- */
        $query = "SELECT 
                    item.pk_items_id,
                    MIN(stock.pk_stock_id) as stock_id,
                    item.fk_item_id as item_name,
                    CASE 
                        WHEN item.type = 1 THEN 'Commercial' 
                        ELSE 'Non Commercial' 
                    END AS type,

                    IF(
                        item.type = 1,
                        'Product',
                        (SELECT ts.types_name 
                        FROM erp_types ts 
                        WHERE ts.pk_types_id = item.item_type)
                    ) AS item_type,

                    SUM(stock.total_stocks) AS total_stocks,
                    SUM(stock.sold_stocks) AS sold_stocks,
                    (SUM(stock.total_stocks) - SUM(stock.sold_stocks)) AS available_stocks,
                    DATE_FORMAT(MAX(stock.created_on), '%b %d, %Y %h:%i %p') AS last_created_date

                FROM erp_items item
                INNER JOIN erp_stocks stock ON stock.fk_items_id = item.pk_items_id
                WHERE item.visibility = 1
                AND stock.visibility = 1
                AND item.type = $type
                AND item.item_type = $itemType
                $searchCondition
                GROUP BY item.pk_items_id
                LIMIT $start, $length
            ";

        $stmt = mysqli_query($conn, $query);
        $res  = mysqli_fetch_all($stmt, MYSQLI_ASSOC);

        /* ---------------- JSON Response ---------------- */
        return [
            "draw"            => intval($data['draw']),
            "recordsTotal"    => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            "data"            => $res
        ];
    }

    // public function getAllItems($data)
    // {
    //     $conn = $GLOBALS["___mysqli_ston"];

    //     $type     = (int) $data['type'];
    //     // $itemType = (int) $data['item_type'];

    //     $query = "SELECT * FROM erp_items WHERE visibility = 1 AND type = $type";
    //     $stmt = mysqli_query($conn, $query);
    //     return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    // }

    public function getAllItems($data)
    {
        $conn = $GLOBALS["___mysqli_ston"];
        $type = (int)$data['type'];

        $query = "
        SELECT 
            i.pk_items_id,
            i.fk_item_id,

            -- Latest UOM (if inventory exists)
            MAX(inv.inv_UOM) AS uom,

            -- Stock calculation
            COALESCE(
                SUM(
                    CASE 
                        WHEN inv.type_of_transaction = 'ADD' THEN inv.inv_value
                        WHEN inv.type_of_transaction = 'UTILIZE' THEN -inv.inv_value
                        ELSE 0
                    END
                ), 0
            ) AS stock_in_hand,

            -- Last updated date
            MAX(inv.created_on) AS last_updated

        FROM erp_items i
        LEFT JOIN erp_inventory inv 
            ON inv.inv_item_id = i.pk_items_id
            AND inv.visibility = 1

        WHERE i.visibility = 1
          AND i.type = $type

        GROUP BY i.pk_items_id
        ORDER BY i.pk_items_id ASC
    ";

        $res = mysqli_query($conn, $query);
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }



    public function getAllComEst($data)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $query = "SELECT * FROM erp_estimate_comm WHERE visibility = 1";
        $stmt = mysqli_query($conn, $query);
        return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    }

    public function getAllNonComEst($data)
    {
        $conn = $GLOBALS["___mysqli_ston"];


        $query = "SELECT PK_ES_ID, sono 
              FROM erp_estimate_noncomm 
              WHERE visibility = 1";
        $stmt = mysqli_query($conn, $query);
        return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    }

    public function searchComOrders($search)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $sql = "
        SELECT PK_ES_ID, sono
        FROM erp_estimate_comm
        WHERE visibility = 1
          AND sono LIKE ?
        ORDER BY PK_ES_ID ASC
        LIMIT 20
    ";

        $stmt = $conn->prepare($sql);
        $like = "%{$search}%";
        $stmt->bind_param("s", $like);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    public function searchNonComOrders($search)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $sql = "
        SELECT PK_ES_ID, sono
        FROM erp_estimate_noncomm
        WHERE visibility = 1
          AND sono LIKE ?
        ORDER BY PK_ES_ID ASC
        LIMIT 20
    ";

        $stmt = $conn->prepare($sql);
        $like = "%{$search}%";
        $stmt->bind_param("s", $like);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }




    public function getAlluonList($data)
    {
        $conn = $GLOBALS["___mysqli_ston"];


        $query = "SELECT * FROM erp_uom_master WHERE visibility = 1";
        $stmt = mysqli_query($conn, $query);
        return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    }

    public function getStockByItem($data)
    {
        $conn = $GLOBALS["___mysqli_ston"];



        $start  = intval($data['start']);
        $length = intval($data['length']);
        $search = $data['search']['value'];

        $itemsId = (int) $data['items_id'];

        /* ---------------- Search Condition ---------------- */
        $searchCondition = "";
        if (!empty($search)) {
            $search = mysqli_real_escape_string($conn, $search);
            $searchCondition = " AND (
            item.item_name LIKE '%$search%' 
            OR item.type LIKE '%$search%'
        )";
        }

        /* ---------------- Total Records (No Search) ---------------- */
        $totalQuery = "SELECT COUNT(DISTINCT item.pk_items_id) AS total
                        FROM erp_items item
                        INNER JOIN erp_stocks stock ON stock.fk_items_id = item.pk_items_id
                        WHERE item.visibility = 1
                        AND stock.visibility = 1
                        AND stock.fk_items_id = $itemsId
                    ";

        $totalResult  = mysqli_query($conn, $totalQuery);
        $totalRecords = mysqli_fetch_assoc($totalResult)['total'];

        /* ---------------- Total Filtered Records (With Search) ---------------- */
        $filteredQuery = "SELECT COUNT(DISTINCT item.pk_items_id) AS total
                            FROM erp_items item
                            INNER JOIN erp_stocks stock ON stock.fk_items_id = item.pk_items_id
                            WHERE item.visibility = 1
                            AND stock.visibility = 1
                            AND stock.fk_items_id = $itemsId
                            $searchCondition
                        ";

        $filteredResult  = mysqli_query($conn, $filteredQuery);
        $totalFiltered   = mysqli_fetch_assoc($filteredResult)['total'];

        /* ---------------- Main Data Query ---------------- */
        $query = "SELECT 
                    item.pk_items_id,
                    item.fk_item_id as item_name,
                    CASE 
                        WHEN item.type = 1 THEN 'Commercial' 
                        ELSE 'Non Commercial' 
                    END AS type,

                    IF(
                        item.type = 1,
                        'Product',
                        (SELECT ts.types_name 
                        FROM erp_types ts 
                        WHERE ts.pk_types_id = item.item_type)
                    ) AS item_type,
                    stock.total_stocks,
                    stock.stock_notes,
                    DATE_FORMAT(stock.created_on, '%b %d, %Y %h:%i %p') AS formated_dt
                    -- SUM(stock.total_stocks) AS total_stocks,
                    -- SUM(stock.sold_stocks) AS sold_stocks,
                    -- (SUM(stock.total_stocks) - SUM(stock.sold_stocks)) AS available_stocks,
                    -- DATE_FORMAT(MAX(stock.created_on), '%b %d, %Y') AS last_created_date

                FROM erp_items item
                INNER JOIN erp_stocks stock ON stock.fk_items_id = item.pk_items_id
                WHERE item.visibility = 1
                AND stock.visibility = 1
                AND stock.fk_items_id = $itemsId
                $searchCondition
                -- GROUP BY item.pk_items_id
                LIMIT $start, $length
            ";

        $stmt = mysqli_query($conn, $query);
        $res  = mysqli_fetch_all($stmt, MYSQLI_ASSOC);


        return [
            "draw"            => intval($data['draw']),
            "recordsTotal"    => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            "data"            => $res
        ];
    }

    // public function addStocks($data)
    // {
    //     $conn = $GLOBALS["___mysqli_ston"];

    //     $stockId = (int) $data['stock_id'];
    //     $itemId = (int) $data['txt_item'];
    //     $qty = (int) $data['txt_stock'];
    //     $notes = (string) $data['txt_stock_notes'];
    //     $createdBy = (int) $data['created_by'];

    //     $query = "INSERT INTO erp_stocks (`fk_stock_id`, `fk_items_id`, `total_stocks`, `stock_notes`, `created_by`) VALUES ($stockId, $itemId, $qty, '$notes', $createdBy)";
    //     $res = mysqli_query($conn, $query);
    //     return $res ? 1 : 0;
    // }

    public function addStocks($data)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $itemId   = mysqli_real_escape_string($conn, $data['pk_items_id']);
        $date     = mysqli_real_escape_string($conn, $data['stock_date']);
        $uom      = mysqli_real_escape_string($conn, $data['uom']);
        $value    = mysqli_real_escape_string($conn, $data['value']);
        $remarks  = mysqli_real_escape_string($conn, $data['remarks']);
        $type     = (int) $data['type']; // 1 or 2

        $query = "
        INSERT INTO erp_inventory
        (
            inv_date,
            inv_item_id,
            inv_UOM,
            inv_value,
            inv_remarks,
            type_of_estimate,
            type_of_transaction,
            visibility
        )
        VALUES
        (
            '$date',
            '$itemId',
            '$uom',
            '$value',
            '$remarks',
            $type,
            'ADD',
            1
        )
    ";

        $res = mysqli_query($conn, $query);

        return $res
            ? ["status" => true, "message" => "Stock added successfully"]
            : ["status" => false, "error" => mysqli_error($conn)];
    }

    public function utilizeStock($data)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $itemId   = mysqli_real_escape_string($conn, $data['pk_items_id'] ?? '');
        $date     = mysqli_real_escape_string($conn, $data['utilize_date']);
        $orderId  = mysqli_real_escape_string($conn, $data['order_id']); // PK_ES_ID
        $uom      = mysqli_real_escape_string($conn, $data['uom']);
        $value    = mysqli_real_escape_string($conn, $data['value']);
        $remarks  = mysqli_real_escape_string($conn, $data['remarks'] ?? '');
        $type     = (int) ($data['type'] ?? 1);

        if ($type === 1) {
            $sql = "SELECT sono FROM erp_estimate_comm WHERE PK_ES_ID = '$orderId'";
        } else {
            $sql = "SELECT sono FROM erp_estimate_noncomm WHERE PK_ES_ID = '$orderId'";
        }

        $res = mysqli_query($conn, $sql);
        if (!$res || mysqli_num_rows($res) === 0) {
            return ["status" => false, "error" => "Invalid Order"];
        }

        $row = mysqli_fetch_assoc($res);
        $sono = mysqli_real_escape_string($conn, $row['sono']);

        $query = "
        INSERT INTO erp_inventory
        (
            inv_date,
            inv_item_id,
            inv_UOM,
            inv_value,
            inv_remarks,
            est_number,
            type_of_estimate,
            type_of_transaction,
            visibility
        )
        VALUES
        (
            '$date',
            '$itemId',
            '$uom',
            '$value',
            '$remarks',
            '$sono',
            $type,
            'UTILIZE',
            1
        )
    ";

        $insert = mysqli_query($conn, $query);

        return $insert
            ? ["status" => true, "message" => "Stock utilized successfully"]
            : ["status" => false, "error" => mysqli_error($conn)];
    }
    public function getUtilizationList($data)
    {
        $conn = $GLOBALS["___mysqli_ston"];

        $where = " WHERE i.visibility = 1";

        if (!empty($data['item_id'])) {
            $where .= " AND i.inv_item_id = '" . mysqli_real_escape_string($conn, $data['item_id']) . "'";
        }

        if (!empty($data['date'])) {
            $where .= " AND i.inv_date = '" . mysqli_real_escape_string($conn, $data['date']) . "'";
        }

        if (!empty($data['order'])) {
            $where .= " AND i.est_number LIKE '%" . mysqli_real_escape_string($conn, $data['order']) . "%'";
        }

        if (!empty($data['remarks'])) {
            $where .= " AND i.inv_remarks LIKE '%" . mysqli_real_escape_string($conn, $data['remarks']) . "%'";
        }

        if (!empty($data['value'])) {
            $where .= " AND i.inv_value = '" . mysqli_real_escape_string($conn, $data['value']) . "'";
        }

        $query = "
        SELECT 
            i.inv_date,
            it.fk_item_id,
            i.inv_UOM,
            i.inv_value,
            i.est_number,
            i.inv_remarks
        FROM erp_inventory i
        LEFT JOIN erp_items it ON it.pk_items_id = i.inv_item_id
        $where
        ORDER BY i.inv_date DESC
    ";

        $res = mysqli_query($conn, $query);
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
}
