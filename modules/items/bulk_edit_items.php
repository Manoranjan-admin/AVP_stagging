<?php
include("classes/class_items.php");

$ids = explode(',', $_GET['ids']);
$idList = implode(',', array_map('intval', $ids));

$obj_items = new items('','','','','','','','','');
$getitems = mysqli_query($GLOBALS["___mysqli_ston"], 
    "SELECT * FROM ".ITEMS." WHERE pk_items_id IN ($idList)"
);
?>

<div class="content-wrapper">
<section class="content">
<div class="container-fluid">

<form id="bulk_edit_form">

<input type="hidden" name="ids" value="<?php echo $_GET['ids']; ?>">

<div class="row">

<?php while($row = mysqli_fetch_array($getitems)) { ?>

<div class="col-md-6">
<div class="card card-primary p-3 mb-3">

<h5><?php echo $row['fk_item_id']; ?></h5>

<input type="hidden" name="item_ids[]" value="<?php echo $row['pk_items_id']; ?>">

<div class="form-group">
<label>Item Name</label>
<input type="text" name="txt_item[]" class="form-control"
value="<?php echo $row['fk_item_id']; ?>">
</div>

<div class="form-group">
<label>Price 1</label>
<input type="number" name="txt_first_price[]" class="form-control"
value="<?php echo $row['first_price']; ?>">
</div>

<div class="form-group">
<label>Price 2</label>
<input type="number" name="txt_second_price[]" class="form-control"
value="<?php echo $row['second_price']; ?>">
</div>

</div>
</div>

<?php } ?>

</div>

<button type="submit" class="btn btn-success">Update All</button>

</form>

</div>
</section>
</div>

<script>

$('#bulk_edit_form').submit(function(e){
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        url: "modules/items/ajax_functions.php",
        type: "POST",
        data: formData + '&mode=BulkEditItems',
        success: function(res){
            if(res == 1){
                alert('Updated successfully');
                window.location.href = "index.php?erp=50";
            } else {
                alert('Error updating');
            }
        }
    });
});
</script>