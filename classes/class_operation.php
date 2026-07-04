<?php
class Operation {
	
	public $operation_id;
	public $operation_name;
	public $operation_file;
	
	//accessor (or) getter
	public function getOperationID() 
	{
        return $this->operation_id;
   }
   public function getOperationName() 
	{
        return $this->operation_name;
   }
   public function getOperationFile() 
	{
        return $this->operation_file;
   }
   
	//settor (or) modifier
   public function setOperationID($m_operation_id) 
	{
        $this->operation_id = $m_operation_id;
   }
   public function setOperationName($m_operation_name) 
	{
        $this->operation_name = $m_operation_name;
   }
   public function setOperationFile($m_operation_file) 
	{
        $this->operation_file = $m_operation_file;
   }
	
	function __construct($c_operation_id,$c_operation_name,$c_operation_file)
   {
		$this->operation_id=$c_operation_id;
		$this->operation_name=$c_operation_name;
		$this->operation_file=$c_operation_file;
   }
   function getOperationById() 
   {
      $operationQuery="select * from ".OPERATION." where operation_id='".$this->operation_id."'";
      $operationResult = mysqli_query($GLOBALS["___mysqli_ston"], $operationQuery);
      return $operationResult;
   }
}
?> 



