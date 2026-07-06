<?php
class Handler
{

	public $handler_id;
	public $handler_name;
	public $operation_id;
	public $module_id;

	//accessor (or) getter
	public function getHandlerID()
	{
		return $this->handler_id;
	}

	public function getHandlerName()
	{
		return $this->handler_name;
	}

	public function getOperationId()
	{
		return $this->operation_id;
	}

	public function getModuleId()
	{
		return $this->module_id;
	}

	//settor (or) modifier
	public function setHandlerID($m_handler_id)
	{
		$this->handler_id = $m_handler_id;
	}

	public function setHandlerName($m_handler_name)
	{
		$this->handler_name = $m_handler_name;
	}

	public function setOperationId($m_operation_id)
	{
		$this->operation_id = $m_operation_id;
	}

	public function setModuleId($m_module_id)
	{
		$this->module_id = $m_module_id;
	}

	public function __construct($c_handler_id, $c_handler_name, $c_operation_id, $c_module_id)
	{
		$this->handler_id = $c_handler_id;
		$this->handler_name = $c_handler_name;
		$this->operation_id = $c_operation_id;
		$this->module_id = $c_module_id;
	}

	function getHandlerById()
	{
		$handlerQuery = "select * from " . HANDLER . " where handler_id='" . $this->handler_id . "'";
		$handlerResult = mysqli_query($GLOBALS["___mysqli_ston"], $handlerQuery);
		$this->result = $handlerResult;
		return $this->result;
	}

	function getModuleById()
	{
		$handlerQuery = "select * from " . HANDLER . " where module_id='" . $this->module_id . "'";
		$handlermodResult = mysqli_query($GLOBALS["___mysqli_ston"], $handlerQuery);
		$this->resultmod = $handlermodResult;
		return $this->resultmod;
	}

	function getHandlerExist()
	{
		$handlerQuery = "select * from " . HANDLER . " where handler_id='" . $this->handler_id . "'";
		$handlerResult = mysqli_query($GLOBALS["___mysqli_ston"], $handlerQuery);
		$handlerCount = mysqli_num_rows($handlerResult);
		$this->result = $handlerCount;
		return $this->result;
	}

	function checkAccess($menu = 0, $type = 0)
	{

		$handlerQuery = "SELECT * FROM erp_access_pages acp
                		INNER JOIN erp_access_settings acs ON acs.fk_acp_id = acp.pk_acp_id 
						WHERE acp.restrict_type = 1
						AND acs.access_status = 1
						AND acp.fk_handler_id = '" . $this->handler_id . "' 
						AND acs.fk_role_id ='" . $_SESSION['roleId'] . "'";
		if ($menu != 0) $handlerQuery .= " AND FIND_IN_SET('$menu', acp.fk_menu_id) > 0";
		if ($type != 0) $handlerQuery .= " AND acp.type= '$type'";
		// echo $handlerQuery;
		// exit;
		$handlerResult = mysqli_query($GLOBALS["___mysqli_ston"], $handlerQuery);
		$handlerCount = mysqli_num_rows($handlerResult);
		return $handlerCount;
	}

	function getAccess($menu = 0, $type = 0)
	{
		$handlerQuery = "SELECT * FROM erp_access_pages acp
                		INNER JOIN erp_access_settings acs ON acs.fk_acp_id = acp.pk_acp_id 
						WHERE acp.restrict_type = 2
						AND acp.fk_handler_id = '" . $this->handler_id . "' 
						AND acs.fk_role_id ='" . $_SESSION['roleId'] . "'";
		if ($menu != 0) $handlerQuery .= " AND FIND_IN_SET('$menu', acp.fk_menu_id) > 0";
		if ($type != 0) $handlerQuery .= " AND acp.type= '$type'";
		// echo $handlerQuery;
		$handlerResult = mysqli_query($GLOBALS["___mysqli_ston"], $handlerQuery);
		return mysqli_fetch_all($handlerResult, MYSQLI_ASSOC);
	}
}
