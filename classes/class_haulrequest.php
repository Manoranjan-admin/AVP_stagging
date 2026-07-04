<?php
class HaulRequest {  
	public $csodhaulrequestid = '';
	public $csoid = '';
	public $mmrid = '';
	public $driverdid = '';
	public $vip = '';
	public $tierno = '';
	public $hvic = '';
	public $chsubname = '';
	public $chaddress = '';
	public $chaddress2 = '';
	public $chcity = '';
	public $chstate = '';
	public $chzip = '';
	public $chcountry = '';
	public $nhsubname = '';
	public $nhaddress = '';
	public $nhaddress2 = '';
	public $nhcity = '';
	public $nhstate = '';
	public $nhzip = '';
	public $nhcountry = '';
	public $psdate = '';
	public $pedate = '';
	public $ptimeh = '';
	public $ptimem = '';
	public $ptimeampm = '';
	public $lsdate = '';
	public $ledate = '';
	public $ltimeh = '';
	public $ltimem = '';
	public $ltimeampm = '';
	public $dsdate = '';
	public $dedate = '';
	public $dtimeh = '';
	public $dtimem = '';
	public $dtimeampm = '';
	public $gnte = '';
	public $gntecar = '';
	public $csonotes = '';
	public $con = '';
	public function __construct($c_csodhaulrequestid,$c_csoid,$c_mmrid,$c_driverdid,$c_vip,$c_tierno,$c_hvic,$c_chsubname,$c_chaddress,$c_chaddress2,$c_chcity,$c_chstate,$c_chzip,$c_chcountry,$c_nhsubname,$c_nhaddress,$c_nhaddress2,$c_nhcity,$c_nhstate,$c_nhzip,$c_nhcountry,$c_psdate,$c_pedate,$c_ptimeh,$c_ptimem,$c_ptimeampm,$c_lsdate,$c_ledate,$c_ltimeh,$c_ltimem,$c_ltimeampm,$c_dsdate,$c_dedate,$c_dtimeh,$c_dtimem,$c_dtimeampm,$c_gnte,$c_gntecar,$c_csonotes,$c_con){
		$this->csodhaulrequestid = $c_csodhaulrequestid;
		$this->csoid = $c_csoid;
		$this->mmrid = $c_mmrid;
		$this->driverdid = $c_driverdid;
		$this->vip = $c_vip;
		$this->tierno = $c_tierno;
		$this->hvic = $c_hvic;
		$this->chsubname = mysqli_real_escape_string($c_con, $c_chsubname);
		$this->chaddress = mysqli_real_escape_string($c_con, $c_chaddress);
		$this->chaddress2 = mysqli_real_escape_string($c_con, $c_chaddress2);
		$this->chcity = $c_chcity;
		$this->chstate = $c_chstate;
		$this->chzip = $c_chzip;
		$this->chcountry = $c_chcountry;
		$this->nhsubname = mysqli_real_escape_string($c_con, $c_nhsubname);
		$this->nhaddress = mysqli_real_escape_string($c_con, $c_nhaddress);
		$this->nhaddress2 = mysqli_real_escape_string($c_con, $c_nhaddress2);
		$this->nhcity = $c_nhcity;
		$this->nhstate = $c_nhstate;
		$this->nhzip = $c_nhzip;
		$this->nhcountry = $c_nhcountry;
		$this->psdate = $c_psdate;
		$this->pedate = $c_pedate;
		$this->ptimeh = $c_ptimeh;
		$this->ptimem = $c_ptimem;
		$this->ptimeampm = $c_ptimeampm;
		$this->lsdate = $c_lsdate;
		$this->ledate = $c_ledate;
		$this->ltimeh = $c_ltimeh;
		$this->ltimem = $c_ltimem;
		$this->ltimeampm = $c_ltimeampm;
		$this->dsdate = $c_dsdate;
		$this->dedate = $c_dedate;
		$this->dtimeh = $c_dtimeh;
		$this->dtimem = $c_dtimem;
		$this->dtimeampm = $c_dtimeampm;
		$this->gnte = $c_gnte;
		$this->gntecar = $c_gntecar;
		$this->csonotes = mysqli_real_escape_string($c_con, $c_csonotes);
		$this->con = $c_con;
	}
	// getter
	public function getcsodhaulrequestid(){
		return $this->csodhaulrequestid;
	}
	public function getcsoid(){
		return $this->csoid;
	}
	public function getmmrid(){
		return $this->mmrid;
	}
	public function getdriverdid(){
		return $this->driverdid;
	}
	public function getvip(){
		return $this->vip;
	}
	public function gettierno(){
		return $this->tierno;
	}
	public function gethvic(){
		return $this->hvic;
	}
	public function getchsubname(){
		return $this->chsubname;
	}
	public function getchaddress(){
		return $this->chaddress;
	}
	public function getchaddress2(){
		return $this->chaddress2;
	}
	public function getchcity(){
		return $this->chcity;
	}
	public function getchstate(){
		return $this->chstate;
	}
	public function getchzip(){
		return $this->chzip;
	}
	public function getchcountry(){
		return $this->chcountry;
	}
	public function getnhsubname(){
		return $this->nhsubname;
	}
	public function getnhaddress(){
		return $this->nhaddress;
	}
	public function getnhaddress2(){
		return $this->nhaddress2;
	}
	public function getnhcity(){
		return $this->nhcity;
	}
	public function getnhstate(){
		return $this->nhstate;
	}
	public function getnhzip(){
		return $this->nhzip;
	}
	public function getnhcountry(){
		return $this->nhcountry;
	}
	public function getpsdate(){
		return $this->psdate;
	}
	public function getpedate(){
		return $this->pedate;
	}
	public function getptimeh(){
		return $this->ptimeh;
	}
	public function getptimem(){
		return $this->ptimem;
	}
	public function getptimeampm(){
		return $this->ptimeampm;
	}
	public function getlsdate(){
		return $this->lsdate;
	}
	public function getledate(){
		return $this->ledate;
	}
	public function getltimeh(){
		return $this->ltimeh;
	}
	public function getltimem(){
		return $this->ltimem;
	}
	public function getltimeampm(){
		return $this->ltimeampm;
	}
	public function getdsdate(){
		return $this->dsdate;
	}
	public function getdedate(){
		return $this->dedate;
	}
	public function getdtimeh(){
		return $this->dtimeh;
	}
	public function getdtimem(){
		return $this->dtimem;
	}
	public function getdtimeampm(){
		return $this->dtimeampm;
	}
	public function getgnte(){
		return $this->gnte;
	}
	public function getgntecar(){
		return $this->gntecar;
	}
	public function getcsonotes(){
		return $this->csonotes;
	}


	// setter
	public function setcsodhaulrequestid($s_csodhaulrequestid){
		$this->csodhaulrequestid = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_csodhaulrequestid);
	}
	public function setcsoid($s_csoid){
		$this->csoid = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_csoid);
	}
	public function setmmrid($s_mmrid){
		$this->mmrid = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_mmrid);
	}
	public function setdriverdid($s_driverdid){
		$this->driverdid = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_driverdid);
	}
	public function setvip($s_vip){
		$this->vip = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_vip);
	}
	public function settierno($s_tierno){
		$this->tierno = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_tierno);
	}
	public function sethvic($s_hvic){
		$this->hvic = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_hvic);
	}
	public function setchsubname($s_chsubname){
		$this->chsubname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_chsubname);
	}
	public function setchaddress($s_chaddress){
		$this->chaddress = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_chaddress);
	}
	public function setchaddress2($s_chaddress2){
		$this->chaddress2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_chaddress2);
	}
	public function setchcity($s_chcity){
		$this->chcity = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_chcity);
	}
	public function setchstate($s_chstate){
		$this->chstate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_chstate);
	}
	public function setchzip($s_chzip){
		$this->chzip = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_chzip);
	}
	public function setchcountry($s_chcountry){
		$this->chcountry = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_chcountry);
	}
	public function setnhsubname($s_nhsubname){
		$this->nhsubname = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_nhsubname);
	}
	public function setnhaddress($s_nhaddress){
		$this->nhaddress = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_nhaddress);
	}
	public function setnhaddress2($s_nhaddress2){
		$this->nhaddress2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_nhaddress2);
	}
	public function setnhcity($s_nhcity){
		$this->nhcity = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_nhcity);
	}
	public function setnhstate($s_nhstate){
		$this->nhstate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_nhstate);
	}
	public function setnhzip($s_nhzip){
		$this->nhzip = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_nhzip);
	}
	public function setnhcountry($s_nhcountry){
		$this->nhcountry = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_nhcountry);
	}
	public function setpsdate($s_psdate){
		$this->psdate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_psdate);
	}
	public function setpedate($s_pedate){
		$this->pedate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_pedate);
	}
	public function setptimeh($s_ptimeh){
		$this->ptimeh = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_ptimeh);
	}
	public function setptimem($s_ptimem){
		$this->ptimem = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_ptimem);
	}
	public function setptimeampm($s_ptimeampm){
		$this->ptimeampm = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_ptimeampm);
	}
	public function setlsdate($s_lsdate){
		$this->lsdate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_lsdate);
	}
	public function setledate($s_ledate){
		$this->ledate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_ledate);
	}
	public function setltimeh($s_ltimeh){
		$this->ltimeh = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_ltimeh);
	}
	public function setltimem($s_ltimem){
		$this->ltimem = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_ltimem);
	}
	public function setltimeampm($s_ltimeampm){
		$this->ltimeampm = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_ltimeampm);
	}
	public function setdsdate($s_dsdate){
		$this->dsdate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_dsdate);
	}
	public function setdedate($s_dedate){
		$this->dedate = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_dedate);
	}
	public function setdtimeh($s_dtimeh){
		$this->dtimeh = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_dtimeh);
	}
	public function setdtimem($s_dtimem){
		$this->dtimem = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_dtimem);
	}
	public function setdtimeampm($s_dtimeampm){
		$this->dtimeampm = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_dtimeampm);
	}
	public function setgnte($s_gnte){
		$this->gnte = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_gnte);
	}
	public function setgntecar($s_gntecar){
		$this->gntecar = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_gntecar);
	}
	public function setcsonotes($s_csonotes){
		$this->csonotes = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s_csonotes);
	}

	function storehaulrequest(){
		$query = "INSERT INTO ".MMS_RECORD_HAUL_REQUEST." SET csoid='".$this->csoid."', mmrid='".$this->mmrid."', driverdid='".$driverdid."', vip='".$this->vip."', tierno='".$this->tierno."', hvic='".$this->hvic."', chsubname='".$this->chsubname."', chaddress='".$this->chaddress."', chaddress2='".$this->chaddress2."', chcity='".$this->chcity."', chstate='".$this->chstate."', chzip='".$this->chzip."', chcountry='".$this->chcountry."', nhsubname='".$this->nhsubname."', nhaddress='".$this->nhaddress."', nhaddress2='".$this->nhaddress2."', nhcity='".$this->nhcity."', nhstate='".$this->nhstate."', nhzip='".$this->nhzip."', nhcountry='".$this->nhcountry."', psdate='".$this->psdate."', pedate='".$this->pedate."', ptimeh='".$this->ptimeh."', ptimem='".$this->ptimem."', ptimeampm='".$this->ptimeampm."', lsdate='".$this->lsdate."', ledate='".$this->ledate."', ltimeh='".$this->ltimeh."', ltimem='".$this->ltimem."', ltimeampm='".$this->ltimeampm."', dsdate='".$this->dsdate."', dedate='".$this->dedate."', dtimeh='".$this->dtimeh."', dtimem='".$this->dtimem."', dtimeampm='".$this->dtimeampm."', gnte='".$this->gnte."', gntecar='".$this->gntecar."', csonotes='".$this->csonotes."'";
		$result = mysqli_query($this->con, $query);
		return 1;
	}
	function gethaulrequestrecord(){
		$query = "SELECT * FROM ".MMS_RECORD_HAUL_REQUEST." mrhq LEFT JOIN ".MMS_RECORD_GENERAL_INFORMATION." mrgi LEFT JOIN ".MMS_DRIVERS." md ON WHERE mrhq";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;

	}
	function gethaulrequest(){
		$query = "SELECT * FROM ".MMS_RECORD_HAUL_REQUEST." WHERE csodhaulrequestid = '".$this->csodhaulrequestid."'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return $result;
	}
	function edithaulrequest(){
		$query = "UPDATE ".MMS_RECORD_HAUL_REQUEST." SET csoid='".$this->csoid."', mmrid='".$this->mmrid."', driverdid='".$driverdid."', vip='".$this->vip."', tierno='".$this->tierno."', hvic='".$this->hvic."', chsubname='".$this->chsubname."', chaddress='".$this->chaddress."', chaddress2='".$this->chaddress2."', chcity='".$this->chcity."', chstate='".$this->chstate."', chzip='".$this->chzip."', chcountry='".$this->chcountry."', nhsubname='".$this->nhsubname."', nhaddress='".$this->nhaddress."', nhaddress2='".$this->nhaddress2."', nhcity='".$this->nhcity."', nhstate='".$this->nhstate."', nhzip='".$this->nhzip."', nhcountry='".$this->nhcountry."', psdate='".$this->psdate."', pedate='".$this->pedate."', ptimeh='".$this->ptimeh."', ptimem='".$this->ptimem."', ptimeampm='".$this->ptimeampm."', lsdate='".$this->lsdate."', ledate='".$this->ledate."', ltimeh='".$this->ltimeh."', ltimem='".$this->ltimem."', ltimeampm='".$this->ltimeampm."', dsdate='".$this->dsdate."', dedate='".$this->dedate."', dtimeh='".$this->dtimeh."', dtimem='".$this->dtimem."', dtimeampm='".$this->dtimeampm."', gnte='".$this->gnte."', gntecar='".$this->gntecar."', csonotes='".$this->csonotes."' WHERE csodhaulrequestid = '".$this->csodhaulrequestid."'";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
		return 1;
	}
}
?>