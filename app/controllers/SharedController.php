<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * my_houses_inclusives_option_list Model Action
     * @return array
     */
	function my_houses_inclusives_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT inclusives AS value,inclusives AS label FROM inclusives ORDER BY inclusives ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * my_houses_property_name_option_list Model Action
     * @return array
     */
	function my_houses_property_name_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT property_name AS value,property_name AS label FROM property where landlord_id='". USER_ID . "' ORDER BY property_name ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * my_houses_property_name_default_value Model Action
     * @return Value
     */
	function my_houses_property_name_default_value(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT property_name AS value,property_name AS label FROM property where landlord_id='". USER_ID . "' ORDER BY property_name ASC";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * my_tenants_house_id_option_list Model Action
     * @return array
     */
	function my_tenants_house_id_option_list($lookup_house_id){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT house_name AS value,house_name AS label FROM my_houses WHERE house_name= ? ORDER BY house_id ASC" ;
		$queryparams = array($lookup_house_id);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * my_tenants_house_name_option_list Model Action
     * @return array
     */
	function my_tenants_house_name_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT house_id AS value,house_name AS label FROM my_houses ORDER BY house_name ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * payment_house_id_option_list Model Action
     * @return array
     */
	function payment_house_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT house_id AS value,house_name AS label FROM my_houses where landlod_id='". USER_ID . "' ORDER BY house_name ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * payment_tenant_id_option_list Model Action
     * @return array
     */
	function payment_tenant_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT tenant_id AS value , tenant_name AS label FROM my_tenants where landlod_id='". USER_ID . "' ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * login_user_name_value_exist Model Action
     * @return array
     */
	function login_user_name_value_exist($val){
		$db = $this->GetModel();
		$db->where("user_name", $val);
		$exist = $db->has("login");
		return $exist;
	}

	/**
     * login_email_value_exist Model Action
     * @return array
     */
	function login_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("login");
		return $exist;
	}

	/**
     * getcount_houses Model Action
     * @return Value
     */
	function getcount_houses(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(house_id) FROM my_houses where landlod_id='". USER_ID . "'"  ;
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_tenants Model Action
     * @return Value
     */
	function getcount_tenants(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(tenant_id) FROM my_tenants where landlod_id='". USER_ID . "'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_applicants Model Action
     * @return Value
     */
	function getcount_applicants(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(id) FROM  applicant where landlod_id='". USER_ID . "'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_invoices Model Action
     * @return Value
     */
	function getcount_invoices(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(id)FROM payment where landlod_id='". USER_ID . "'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

}
