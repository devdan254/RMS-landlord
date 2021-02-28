<?php 
/**
 * My_houses Page Controller
 * @category  Controller
 */
class My_housesController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "my_houses";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("my_houses.house_id", 
			"my_houses.landlod_id", 
			"my_houses.house_name", 
			"my_houses.inclusives", 
			"my_houses.description", 
			"my_houses.rent_amount", 
			"my_houses.photos", 
			"my_houses.address", 
			"my_houses.property_name", 
			"my_houses.occupation", 
			"my_houses.beds", 
			"my_houses.baths", 
			"my_houses.rent_type", 
			"my_houses.date");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				my_houses.house_id LIKE ? OR 
				my_houses.landlod_id LIKE ? OR 
				my_houses.house_name LIKE ? OR 
				my_houses.inclusives LIKE ? OR 
				my_houses.description LIKE ? OR 
				my_houses.rent_amount LIKE ? OR 
				my_houses.photos LIKE ? OR 
				my_houses.address LIKE ? OR 
				my_houses.property_name LIKE ? OR 
				my_houses.occupation LIKE ? OR 
				login.id LIKE ? OR 
				login.user_name LIKE ? OR 
				login.email LIKE ? OR 
				login.password LIKE ? OR 
				login.photo LIKE ? OR 
				login.phone LIKE ? OR 
				login.national_id LIKE ? OR 
				my_houses.beds LIKE ? OR 
				my_houses.baths LIKE ? OR 
				my_houses.rent_type LIKE ? OR 
				my_houses.date LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "my_houses/search.php";
		}
		$db->join("login", "my_houses.landlod_id = login.id", "INNER");
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("my_houses.house_id", ORDER_TYPE);
		}
		$db->where("my_houses.landlod_id", get_active_user('id') );
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		if(	!empty($records)){
			foreach($records as &$record){
				$record['date'] = human_date($record['date']);
			}
		}
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "My Houses";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("my_houses/list.php", $data); //render the full page
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("my_houses.house_id", 
			"my_houses.landlod_id", 
			"property.property_name AS property_property_name", 
			"my_houses.house_name", 
			"my_houses.inclusives", 
			"inclusives.inclusives AS inclusives_inclusives", 
			"my_houses.description", 
			"my_houses.rent_amount", 
			"my_houses.photos", 
			"my_houses.address", 
			"my_houses.property_name", 
			"my_houses.occupation", 
			"login.id AS login_id", 
			"login.user_name AS login_user_name", 
			"login.email AS login_email", 
			"login.password AS login_password", 
			"login.photo AS login_photo", 
			"login.phone AS login_phone", 
			"login.national_id AS login_national_id", 
			"my_houses.beds", 
			"my_houses.baths", 
			"my_houses.rent_type", 
			"my_houses.date");
		$db->where("my_houses.landlod_id", get_active_user('id') );
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("my_houses.house_id", $rec_id);; //select record based on primary key
		}
		$db->join("property", "my_houses.property_name = property.landlord_id", "INNER");
		$db->join("inclusives", "my_houses.inclusives = inclusives.inclusives", "INNER");
		$db->join("login", "my_houses.landlod_id = login.id", "INNER ");  
		$record = $db->getOne($tablename, $fields );
		if($record){
			$record['date'] = human_date($record['date']);
			$page_title = $this->view->page_title = "View  My Houses";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("my_houses/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("house_id","landlod_id","house_name","beds","baths","description","rent_amount","photos","address","property_name","occupation","rent_type","inclusives","date");
			$postdata = $this->format_request_data($formdata);
			$modeldata = $this->modeldata = $postdata;
			$modeldata['landlod_id'] = USER_ID;
$modeldata['date'] = date_now();
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("my_houses");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Houses";
		$this->render_view("my_houses/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("house_id","house_name","beds","baths","description","rent_amount","photos","property_name","occupation","rent_type","inclusives","date");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->validate_captcha = true; //will check for captcha validation
			$this->rules_array = array(
				'house_name' => 'required',
				'rent_amount' => 'required|numeric',
				'property_name' => 'required',
				'occupation' => 'required',
				'rent_type' => 'required',
			);
			$this->sanitize_array = array(
				'house_name' => 'sanitize_string',
				'beds' => 'sanitize_string',
				'baths' => 'sanitize_string',
				'rent_amount' => 'sanitize_string',
				'photos' => 'sanitize_string',
				'property_name' => 'sanitize_string',
				'occupation' => 'sanitize_string',
				'rent_type' => 'sanitize_string',
				'inclusives' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['date'] = date_now();
			if($this->validated()){
		$db->where("my_houses.landlod_id", get_active_user('id') );
				$db->where("my_houses.house_id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("my_houses");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("my_houses");
					}
				}
			}
		}
		$db->where("my_houses.landlod_id", get_active_user('id') );$db->where("my_houses.house_id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  My Houses";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("my_houses/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("house_id","house_name","beds","baths","description","rent_amount","photos","property_name","occupation","rent_type","inclusives","date");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'house_name' => 'required',
				'rent_amount' => 'required|numeric',
				'property_name' => 'required',
				'occupation' => 'required',
				'rent_type' => 'required',
			);
			$this->sanitize_array = array(
				'house_name' => 'sanitize_string',
				'beds' => 'sanitize_string',
				'baths' => 'sanitize_string',
				'rent_amount' => 'sanitize_string',
				'photos' => 'sanitize_string',
				'property_name' => 'sanitize_string',
				'occupation' => 'sanitize_string',
				'rent_type' => 'sanitize_string',
				'inclusives' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
		$db->where("my_houses.landlod_id", get_active_user('id') );
				$db->where("my_houses.house_id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("my_houses.house_id", $arr_rec_id, "in");
		$db->where("my_houses.landlod_id", get_active_user('id') );
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("my_houses");
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function house_table($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("house_id", 
			"landlod_id", 
			"house_name", 
			"description", 
			"rent_amount", 
			"address", 
			"property_name", 
			"occupation", 
			"beds", 
			"baths", 
			"rent_type", 
			"inclusives", 
			"date");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				my_houses.house_id LIKE ? OR 
				my_houses.landlod_id LIKE ? OR 
				my_houses.house_name LIKE ? OR 
				my_houses.description LIKE ? OR 
				my_houses.rent_amount LIKE ? OR 
				my_houses.photos LIKE ? OR 
				my_houses.address LIKE ? OR 
				my_houses.property_name LIKE ? OR 
				my_houses.occupation LIKE ? OR 
				my_houses.beds LIKE ? OR 
				my_houses.baths LIKE ? OR 
				my_houses.rent_type LIKE ? OR 
				my_houses.inclusives LIKE ? OR 
				my_houses.date LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "my_houses/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("my_houses.house_id", ORDER_TYPE);
		}
		$db->where("my_houses.landlod_id", get_active_user('id') );
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "My Houses";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("my_houses/house_table.php", $data); //render the full page
	}
}
