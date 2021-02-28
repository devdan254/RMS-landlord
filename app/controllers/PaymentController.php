<?php 
/**
 * Payment Page Controller
 * @category  Controller
 */
class PaymentController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "payment";
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
		$fields = array("payment.house_id", 
			"my_houses.house_name AS my_houses_house_name", 
			"payment.tenant_id", 
			"my_tenants.tenant_name AS my_tenants_tenant_name", 
			"payment.category", 
			"payment.Amount", 
			"payment.date", 
			"payment.id", 
			"payment.landlod_id");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				payment.house_id LIKE ? OR 
				payment.tenant_id LIKE ? OR 
				payment.category LIKE ? OR 
				payment.Amount LIKE ? OR 
				payment.date LIKE ? OR 
				payment.id LIKE ? OR 
				payment.landlod_id LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "payment/search.php";
		}
		$db->join("my_houses", "payment.house_id = my_houses.house_id", "INNER");
		$db->join("my_tenants", "payment.tenant_id = my_tenants.tenant_id", "INNER");
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("payment.id", ORDER_TYPE);
		}
		$db->where("payment.landlod_id", get_active_user('id') );
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
		$page_title = $this->view->page_title = "Payments";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("payment/list.php", $data); //render the full page
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
		$fields = array("payment.house_id", 
			"my_houses.house_name AS my_houses_house_name", 
			"payment.tenant_id", 
			"my_tenants.tenant_name AS my_tenants_tenant_name", 
			"payment.Amount", 
			"payment.category", 
			"payment.date", 
			"payment.id", 
			"payment.landlod_id");
		$db->where("payment.landlod_id", get_active_user('id') );
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("payment.id", $rec_id);; //select record based on primary key
		}
		$db->join("my_houses", "payment.house_id = my_houses.house_id", "INNER");
		$db->join("my_tenants", "payment.tenant_id = my_tenants.tenant_id", "INNER");  
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Payment";
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
		return $this->render_view("payment/view.php", $record);
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
			$fields = $this->fields = array("house_id","tenant_id","Amount","category","date","landlod_id");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'house_id' => 'required',
				'tenant_id' => 'required',
				'Amount' => 'required',
				'category' => 'required',
				'date' => 'required',
			);
			$this->sanitize_array = array(
				'house_id' => 'sanitize_string',
				'tenant_id' => 'sanitize_string',
				'Amount' => 'sanitize_string',
				'category' => 'sanitize_string',
				'date' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['landlod_id'] = USER_ID;
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("payment");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Payment";
		$this->render_view("payment/add.php");
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
		$fields = $this->fields = array("house_id","tenant_id","Amount","category","date","id");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->validate_captcha = true; //will check for captcha validation
			$this->rules_array = array(
				'house_id' => 'required',
				'tenant_id' => 'required',
				'Amount' => 'required',
				'category' => 'required',
				'date' => 'required',
			);
			$this->sanitize_array = array(
				'house_id' => 'sanitize_string',
				'tenant_id' => 'sanitize_string',
				'Amount' => 'sanitize_string',
				'category' => 'sanitize_string',
				'date' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
		$db->where("payment.landlod_id", get_active_user('id') );
				$db->where("payment.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("payment");
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
						return	$this->redirect("payment");
					}
				}
			}
		}
		$db->where("payment.landlod_id", get_active_user('id') );$db->where("payment.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Payment";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("payment/edit.php", $data);
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
		$fields = $this->fields = array("house_id","tenant_id","Amount","category","date","id");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'house_id' => 'required',
				'tenant_id' => 'required',
				'Amount' => 'required',
				'category' => 'required',
				'date' => 'required',
			);
			$this->sanitize_array = array(
				'house_id' => 'sanitize_string',
				'tenant_id' => 'sanitize_string',
				'Amount' => 'sanitize_string',
				'category' => 'sanitize_string',
				'date' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
		$db->where("payment.landlod_id", get_active_user('id') );
				$db->where("payment.id", $rec_id);;
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
		$db->where("payment.id", $arr_rec_id, "in");
		$db->where("payment.landlod_id", get_active_user('id') );
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("payment");
	}
}
