<?php
class Module {
	public $module_id;
	public $module_name;
	public $module_folder;
	
	//accessor (or) getter
	public function getModuleID() 
	{
        return $this->module_id;
   }
   public function getModuleName() 
	{
        return $this->module_name;
   }
   public function getModuleFolder() 
	{
        return $this->module_folder;
   }
   
	//settor (or) modifier
   public function setModuleID($m_module_id) 
	{
        $this->module_id = $m_module_id;
   }
   public function setModuleName($m_module_name) 
	{
        $this->module_name = $m_module_name;
   }
   public function setModuleFolder($m_module_folder) 
	{
        $this->module_folder = $m_module_folder;
   }
   
	public function __construct($c_module_id,$c_module_name,$c_module_folder)
   {
		$this->module_id=$c_module_id;
		$this->module_name=$c_module_name;
		$this->module_folder=$c_module_folder;
	}
	function getModuleById() 
	{
      $moduleQuery="select * from ".MODULE." where module_id='".$this->module_id."'";
		$moduleResult=mysqli_query($GLOBALS["___mysqli_ston"], $moduleQuery);
		$this->result=$moduleResult;
		return $this->result;
   }  
}

?>