<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("payment/add");
$can_edit = ACL::is_allowed("payment/edit");
$can_view = ACL::is_allowed("payment/view");
$can_delete = ACL::is_allowed("payment/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page ajax-page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3 card">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-sm-6 comp-grid">
                    <h4 class="record-title text-info">TRANSACTIONS</h4>
                </div>
                <div class="col-md-2 ">
                    <?php $modal_id = "modal-" . random_str(); ?>
                    <button data-toggle="modal" data-target="#<?php  echo $modal_id ?>"  class="btn btn-success jim">
                        <i class="fa fa-plus "></i>                                 
                    </button>
                    <div data-backdrop="true" id="<?php  echo $modal_id ?>" class="modal fade"  role="dialog" aria-labelledby="<?php  echo $modal_id ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0 reset-grids">
                                    <div class=" ">
                                        <?php  
                                        $this->render_page("money_in/add"); 
                                        ?>
                                    </div>
                                </div>
                                <div style="top: 5px; right:5px; z-index: 999;" class="position-absolute">
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">&times;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 ">
                    <?php $modal_id = "modal-" . random_str(); ?>
                    <button data-toggle="modal" data-target="#<?php  echo $modal_id ?>"  class="btn btn-danger jim">
                        <i class="fa fa-minus "></i>                                    
                    </button>
                    <div data-backdrop="true" id="<?php  echo $modal_id ?>" class="modal fade"  role="dialog" aria-labelledby="<?php  echo $modal_id ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0 reset-grids">
                                    <div class=" ">
                                        <?php  
                                        $this->render_page("money_out/add"); 
                                        ?>
                                    </div>
                                </div>
                                <div style="top: 5px; right:5px; z-index: 999;" class="position-absolute">
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">&times;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 mt-5 comp-grid">
                    <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                        <link rel="stylesheet" href="..\assets\css\adminlte.min.css">
                            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                    <div class="row">
                                        <!-- /.col -->
                                        <div class="col-md-4 col-lg-4  col-sm-12">
                                            <div class="info-box bg-gradient-success">
                                                <span class="info-box-icon"><i class="fa fa-briefcase"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text"><b>PAID</b></span>
                                                    <span class="info-box-number">Ksh 41,410</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" style="width: 70%"></div>
                                                    </div>
                                                    <span class="progress-description">
                                                        70% of the annual Collection
                                                    </span>
                                                </div>
                                            </div></div>
                                            <!-- /.info-box-content -->
                                            <!-- /.col -->
                                            <div class="col-md-4 col-lg-4  col-sm-12 ">
                                                <div class="info-box bg-gradient-danger">
                                                    <span class="info-box-icon"><i class="fa fa-database"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text"><b>OUTSTANDING</b></span>
                                                        <span class="info-box-number">Ksh 41,410</span>
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width: 70%"></div>
                                                        </div>
                                                        <span class="progress-description">
                                                            70% of the current month rent
                                                        </span>
                                                    </div>
                                                </div></div>
                                                <!-- /.info-box-content -->
                                                <!-- /.col -->
                                                <div class="col-md-4 col-lg-4 col-sm-12 ">
                                                    <div class="info-box bg-gradient-info">
                                                        <span class="info-box-icon"><i class="fa fa-exclamation-triangle"></i></span>
                                                        <div class="info-box-content">
                                                            <span class="info-box-text"><b>OVERDUE</b></span>
                                                            <span class="info-box-number">1</span>
                                                            <div class="progress">
                                                                <div class="progress-bar" style="width: 20%"></div>
                                                            </div>
                                                            <span class="progress-description">
                                                                20% of the total tenants
                                                            </span>
                                                        </div>
                                                    </div></div>
                                                    <!-- /.info-box-content -->
                                                    <!-- /.col -->
                                                    <!-- /.info-box-content -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div  class="bg-light p-3 mb-3">
                                <div class="container">
                                    <div class="page-header"><h4><h4 class="my-2 text-center text-uppercase text-info">Miscellaneous</h4></h4></div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-5 card mr-2 comp-grid">
                                            <h4 class="text-center text-success">DEBIT</h4>
                                            <div id="Comp-2-Accordion-Group" role="tablist" class="accordion-group">
                                                <div class="card">
                                                    <div class="card-header accordion-header" data-toggle="collapse" data-target="#Accordion-2-Page1" role="tab">
                                                        Property Income <span class="expand text-muted">+</span>
                                                    </div>
                                                    <div id="Accordion-2-Page1" class="collapse " data-parent="#Comp-2-Accordion-Group">
                                                        <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                            <link rel="stylesheet" href="..\assets\css\adminlte.min.css">
                                                                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                                                        <div class="card-body p-0">
                                                                            <div class="table-responsive">
                                                                                <table class="table m-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Category</th>
                                                                                            <th>Amount</th>
                                                                                            <th>Status</th>
                                                                                            <th>Date</th>
                                                                                            <th>Payee/Paye</th>
                                                                                            <th>Details</th>
                                                                                            <th>File</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Tenant Charges & Fees</td>
                                                                                            <td>Ksh 1200 </td>
                                                                                            <td><span class="badge badge-success">Paid</span></td>
                                                                                            <td>
                                                                                                21-01-2021
                                                                                            </td>
                                                                                            <td>
                                                                                                John Mula
                                                                                            </td>
                                                                                            <td>
                                                                                                Paid for tap leakage
                                                                                            </td>
                                                                                            <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Tenant Charges & Fees</td>
                                                                                            <td>Ksh 1200 </td>
                                                                                            <td><span class="badge badge-warning">Pending</span></td>
                                                                                            <td>
                                                                                                21-01-2021
                                                                                            </td>
                                                                                            <td>
                                                                                                John Mula
                                                                                            </td>
                                                                                            <td>
                                                                                                Paid for tap leakage
                                                                                            </td>
                                                                                            <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Tenant Charges & Fees</td>
                                                                                            <td>Ksh 1200 </td>
                                                                                            <td><span class="badge badge-info">Processing</span></td>
                                                                                            <td>
                                                                                                21-01-2021
                                                                                            </td>
                                                                                            <td>
                                                                                                John Mula
                                                                                            </td>
                                                                                            <td>
                                                                                                Paid for tap leakage
                                                                                            </td>
                                                                                            <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <!-- /.table-responsive -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header accordion-header" data-toggle="collapse" data-target="#Accordion-2-Page2" role="tab">
                                                                    General Income <span class="expand text-muted">+</span>
                                                                </div>
                                                                <div id="Accordion-2-Page2" class="collapse " data-parent="#Comp-2-Accordion-Group">
                                                                    <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                        <link rel="stylesheet" href="..\assets\css\adminlte.min.css">
                                                                            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="table-responsive">
                                                                                            <table class="table m-0">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>Category</th>
                                                                                                        <th>Amount</th>
                                                                                                        <th>Status</th>
                                                                                                        <th>Date</th>
                                                                                                        <th>Payee/Paye</th>
                                                                                                        <th>Details</th>
                                                                                                        <th>File</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td>Tenant Charges & Fees</td>
                                                                                                        <td>Ksh 1200 </td>
                                                                                                        <td><span class="badge badge-success">Paid</span></td>
                                                                                                        <td>
                                                                                                            21-01-2021
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            John Mula
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            Paid for tap leakage
                                                                                                        </td>
                                                                                                        <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Tenant Charges & Fees</td>
                                                                                                        <td>Ksh 1200 </td>
                                                                                                        <td><span class="badge badge-warning">Pending</span></td>
                                                                                                        <td>
                                                                                                            21-01-2021
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            John Mula
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            Paid for tap leakage
                                                                                                        </td>
                                                                                                        <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Tenant Charges & Fees</td>
                                                                                                        <td>Ksh 1200 </td>
                                                                                                        <td><span class="badge badge-info">Processing</span></td>
                                                                                                        <td>
                                                                                                            21-01-2021
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            John Mula
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            Paid for tap leakage
                                                                                                        </td>
                                                                                                        <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                        <!-- /.table-responsive -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-header accordion-header" data-toggle="collapse" data-target="#Accordion-2-Page3" role="tab">
                                                                                Bulk Payments <span class="expand text-muted">+</span>
                                                                            </div>
                                                                            <div id="Accordion-2-Page3" class="collapse " data-parent="#Comp-2-Accordion-Group">
                                                                                <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                    <link rel="stylesheet" href="..\assets\css\adminlte.min.css">
                                                                                        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                                                                                <div class="card-body p-0">
                                                                                                    <div class="table-responsive">
                                                                                                        <table class="table m-0">
                                                                                                            <thead>
                                                                                                                <tr>
                                                                                                                    <th>Category</th>
                                                                                                                    <th>Amount</th>
                                                                                                                    <th>Status</th>
                                                                                                                    <th>Date</th>
                                                                                                                    <th>Payee/Paye</th>
                                                                                                                    <th>Details</th>
                                                                                                                    <th>File</th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td>Tenant Charges & Fees</td>
                                                                                                                    <td>Ksh 1200 </td>
                                                                                                                    <td><span class="badge badge-success">Paid</span></td>
                                                                                                                    <td>
                                                                                                                        21-01-2021
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        John Mula
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        Paid for tap leakage
                                                                                                                    </td>
                                                                                                                    <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>Tenant Charges & Fees</td>
                                                                                                                    <td>Ksh 1200 </td>
                                                                                                                    <td><span class="badge badge-warning">Pending</span></td>
                                                                                                                    <td>
                                                                                                                        21-01-2021
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        John Mula
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        Paid for tap leakage
                                                                                                                    </td>
                                                                                                                    <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>Tenant Charges & Fees</td>
                                                                                                                    <td>Ksh 1200 </td>
                                                                                                                    <td><span class="badge badge-info">Processing</span></td>
                                                                                                                    <td>
                                                                                                                        21-01-2021
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        John Mula
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        Paid for tap leakage
                                                                                                                    </td>
                                                                                                                    <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                    <!-- /.table-responsive -->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card">
                                                                                        <div class="card-header accordion-header" data-toggle="collapse" data-target="#Accordion-2-Page4" role="tab">
                                                                                            Deposit <span class="expand text-muted">+</span>
                                                                                        </div>
                                                                                        <div id="Accordion-2-Page4" class="collapse " data-parent="#Comp-2-Accordion-Group">
                                                                                            <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                <link rel="stylesheet" href="..\assets\css\adminlte.min.css">
                                                                                                    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                                                                                            <div class="card-body p-0">
                                                                                                                <div class="table-responsive">
                                                                                                                    <table class="table m-0">
                                                                                                                        <thead>
                                                                                                                            <tr>
                                                                                                                                <th>Category</th>
                                                                                                                                <th>Amount</th>
                                                                                                                                <th>Status</th>
                                                                                                                                <th>Date</th>
                                                                                                                                <th>Payee/Paye</th>
                                                                                                                                <th>Details</th>
                                                                                                                                <th>File</th>
                                                                                                                            </tr>
                                                                                                                        </thead>
                                                                                                                        <tbody>
                                                                                                                            <tr>
                                                                                                                                <td>Tenant Charges & Fees</td>
                                                                                                                                <td>Ksh 1200 </td>
                                                                                                                                <td><span class="badge badge-success">Paid</span></td>
                                                                                                                                <td>
                                                                                                                                    21-01-2021
                                                                                                                                </td>
                                                                                                                                <td>
                                                                                                                                    John Mula
                                                                                                                                </td>
                                                                                                                                <td>
                                                                                                                                    Paid for tap leakage
                                                                                                                                </td>
                                                                                                                                <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td>Tenant Charges & Fees</td>
                                                                                                                                <td>Ksh 1200 </td>
                                                                                                                                <td><span class="badge badge-warning">Pending</span></td>
                                                                                                                                <td>
                                                                                                                                    21-01-2021
                                                                                                                                </td>
                                                                                                                                <td>
                                                                                                                                    John Mula
                                                                                                                                </td>
                                                                                                                                <td>
                                                                                                                                    Paid for tap leakage
                                                                                                                                </td>
                                                                                                                                <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td>Tenant Charges & Fees</td>
                                                                                                                                <td>Ksh 1200 </td>
                                                                                                                                <td><span class="badge badge-info">Processing</span></td>
                                                                                                                                <td>
                                                                                                                                    21-01-2021
                                                                                                                                </td>
                                                                                                                                <td>
                                                                                                                                    John Mula
                                                                                                                                </td>
                                                                                                                                <td>
                                                                                                                                    Paid for tap leakage
                                                                                                                                </td>
                                                                                                                                <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </div>
                                                                                                                <!-- /.table-responsive -->
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="card">
                                                                                                    <div class="card-header accordion-header" data-toggle="collapse" data-target="#Accordion-2-Page5" role="tab">
                                                                                                        Credits <span class="expand text-muted">+</span>
                                                                                                    </div>
                                                                                                    <div id="Accordion-2-Page5" class="collapse " data-parent="#Comp-2-Accordion-Group">
                                                                                                        <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                            <link rel="stylesheet" href="..\assets\css\adminlte.min.css">
                                                                                                                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                                    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                                                                                                        <div class="card-body p-0">
                                                                                                                            <div class="table-responsive">
                                                                                                                                <table class="table m-0">
                                                                                                                                    <thead>
                                                                                                                                        <tr>
                                                                                                                                            <th>Category</th>
                                                                                                                                            <th>Amount</th>
                                                                                                                                            <th>Status</th>
                                                                                                                                            <th>Date</th>
                                                                                                                                            <th>Payee/Paye</th>
                                                                                                                                            <th>Details</th>
                                                                                                                                            <th>File</th>
                                                                                                                                        </tr>
                                                                                                                                    </thead>
                                                                                                                                    <tbody>
                                                                                                                                        <tr>
                                                                                                                                            <td>Tenant Charges & Fees</td>
                                                                                                                                            <td>Ksh 1200 </td>
                                                                                                                                            <td><span class="badge badge-success">Paid</span></td>
                                                                                                                                            <td>
                                                                                                                                                21-01-2021
                                                                                                                                            </td>
                                                                                                                                            <td>
                                                                                                                                                John Mula
                                                                                                                                            </td>
                                                                                                                                            <td>
                                                                                                                                                Paid for tap leakage
                                                                                                                                            </td>
                                                                                                                                            <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                        </tr>
                                                                                                                                        <tr>
                                                                                                                                            <td>Tenant Charges & Fees</td>
                                                                                                                                            <td>Ksh 1200 </td>
                                                                                                                                            <td><span class="badge badge-warning">Pending</span></td>
                                                                                                                                            <td>
                                                                                                                                                21-01-2021
                                                                                                                                            </td>
                                                                                                                                            <td>
                                                                                                                                                John Mula
                                                                                                                                            </td>
                                                                                                                                            <td>
                                                                                                                                                Paid for tap leakage
                                                                                                                                            </td>
                                                                                                                                            <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                        </tr>
                                                                                                                                        <tr>
                                                                                                                                            <td>Tenant Charges & Fees</td>
                                                                                                                                            <td>Ksh 1200 </td>
                                                                                                                                            <td><span class="badge badge-info">Processing</span></td>
                                                                                                                                            <td>
                                                                                                                                                21-01-2021
                                                                                                                                            </td>
                                                                                                                                            <td>
                                                                                                                                                John Mula
                                                                                                                                            </td>
                                                                                                                                            <td>
                                                                                                                                                Paid for tap leakage
                                                                                                                                            </td>
                                                                                                                                            <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                        </tr>
                                                                                                                                    </tbody>
                                                                                                                                </table>
                                                                                                                            </div>
                                                                                                                            <!-- /.table-responsive -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-5 card ml-2 comp-grid">
                                                                                                        <h4 class="text-center text-danger">CREDIT</h4>
                                                                                                        <div id="Comp-2-Accordion-Group" role="tablist" class="accordion-group">
                                                                                                            <div class="card">
                                                                                                                <div class="card-header accordion-header" data-toggle="collapse" data-target="#Accordion-2-Page1" role="tab">
                                                                                                                    Property Expense <span class="expand text-muted">+</span>
                                                                                                                </div>
                                                                                                                <div id="Accordion-2-Page1" class="collapse " data-parent="#Comp-2-Accordion-Group">
                                                                                                                    <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                                        <link rel="stylesheet" href="..\assets\css\adminlte.min.css">
                                                                                                                            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                                                <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                                                                                                                    <div class="card-body p-0">
                                                                                                                                        <div class="table-responsive">
                                                                                                                                            <table class="table m-0">
                                                                                                                                                <thead>
                                                                                                                                                    <tr>
                                                                                                                                                        <th>Category</th>
                                                                                                                                                        <th>Amount</th>
                                                                                                                                                        <th>Status</th>
                                                                                                                                                        <th>Date</th>
                                                                                                                                                        <th>Payee/Paye</th>
                                                                                                                                                        <th>Details</th>
                                                                                                                                                        <th>File</th>
                                                                                                                                                    </tr>
                                                                                                                                                </thead>
                                                                                                                                                <tbody>
                                                                                                                                                    <tr>
                                                                                                                                                        <td>Tenant Charges & Fees</td>
                                                                                                                                                        <td>Ksh 1200 </td>
                                                                                                                                                        <td><span class="badge badge-success">Paid</span></td>
                                                                                                                                                        <td>
                                                                                                                                                            21-01-2021
                                                                                                                                                        </td>
                                                                                                                                                        <td>
                                                                                                                                                            John Mula
                                                                                                                                                        </td>
                                                                                                                                                        <td>
                                                                                                                                                            Paid for tap leakage
                                                                                                                                                        </td>
                                                                                                                                                        <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                    </tr>
                                                                                                                                                    <tr>
                                                                                                                                                        <td>Tenant Charges & Fees</td>
                                                                                                                                                        <td>Ksh 1200 </td>
                                                                                                                                                        <td><span class="badge badge-warning">Pending</span></td>
                                                                                                                                                        <td>
                                                                                                                                                            21-01-2021
                                                                                                                                                        </td>
                                                                                                                                                        <td>
                                                                                                                                                            John Mula
                                                                                                                                                        </td>
                                                                                                                                                        <td>
                                                                                                                                                            Paid for tap leakage
                                                                                                                                                        </td>
                                                                                                                                                        <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                    </tr>
                                                                                                                                                    <tr>
                                                                                                                                                        <td>Tenant Charges & Fees</td>
                                                                                                                                                        <td>Ksh 1200 </td>
                                                                                                                                                        <td><span class="badge badge-info">Processing</span></td>
                                                                                                                                                        <td>
                                                                                                                                                            21-01-2021
                                                                                                                                                        </td>
                                                                                                                                                        <td>
                                                                                                                                                            John Mula
                                                                                                                                                        </td>
                                                                                                                                                        <td>
                                                                                                                                                            Paid for tap leakage
                                                                                                                                                        </td>
                                                                                                                                                        <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                    </tr>
                                                                                                                                                </tbody>
                                                                                                                                            </table>
                                                                                                                                        </div>
                                                                                                                                        <!-- /.table-responsive -->
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="card">
                                                                                                                            <div class="card-header accordion-header" data-toggle="collapse" data-target="#Accordion-2-Page2" role="tab">
                                                                                                                                General Expense <span class="expand text-muted">+</span>
                                                                                                                            </div>
                                                                                                                            <div id="Accordion-2-Page2" class="collapse " data-parent="#Comp-2-Accordion-Group">
                                                                                                                                <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                                                    <link rel="stylesheet" href="..\assets\css\adminlte.min.css">
                                                                                                                                        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                                                            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                                                                                                                                <div class="card-body p-0">
                                                                                                                                                    <div class="table-responsive">
                                                                                                                                                        <table class="table m-0">
                                                                                                                                                            <thead>
                                                                                                                                                                <tr>
                                                                                                                                                                    <th>Category</th>
                                                                                                                                                                    <th>Amount</th>
                                                                                                                                                                    <th>Status</th>
                                                                                                                                                                    <th>Date</th>
                                                                                                                                                                    <th>Payee/Paye</th>
                                                                                                                                                                    <th>Details</th>
                                                                                                                                                                    <th>File</th>
                                                                                                                                                                </tr>
                                                                                                                                                            </thead>
                                                                                                                                                            <tbody>
                                                                                                                                                                <tr>
                                                                                                                                                                    <td>Tenant Charges & Fees</td>
                                                                                                                                                                    <td>Ksh 1200 </td>
                                                                                                                                                                    <td><span class="badge badge-success">Paid</span></td>
                                                                                                                                                                    <td>
                                                                                                                                                                        21-01-2021
                                                                                                                                                                    </td>
                                                                                                                                                                    <td>
                                                                                                                                                                        John Mula
                                                                                                                                                                    </td>
                                                                                                                                                                    <td>
                                                                                                                                                                        Paid for tap leakage
                                                                                                                                                                    </td>
                                                                                                                                                                    <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                                </tr>
                                                                                                                                                                <tr>
                                                                                                                                                                    <td>Tenant Charges & Fees</td>
                                                                                                                                                                    <td>Ksh 1200 </td>
                                                                                                                                                                    <td><span class="badge badge-warning">Pending</span></td>
                                                                                                                                                                    <td>
                                                                                                                                                                        21-01-2021
                                                                                                                                                                    </td>
                                                                                                                                                                    <td>
                                                                                                                                                                        John Mula
                                                                                                                                                                    </td>
                                                                                                                                                                    <td>
                                                                                                                                                                        Paid for tap leakage
                                                                                                                                                                    </td>
                                                                                                                                                                    <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                                </tr>
                                                                                                                                                                <tr>
                                                                                                                                                                    <td>Tenant Charges & Fees</td>
                                                                                                                                                                    <td>Ksh 1200 </td>
                                                                                                                                                                    <td><span class="badge badge-info">Processing</span></td>
                                                                                                                                                                    <td>
                                                                                                                                                                        21-01-2021
                                                                                                                                                                    </td>
                                                                                                                                                                    <td>
                                                                                                                                                                        John Mula
                                                                                                                                                                    </td>
                                                                                                                                                                    <td>
                                                                                                                                                                        Paid for tap leakage
                                                                                                                                                                    </td>
                                                                                                                                                                    <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                                </tr>
                                                                                                                                                            </tbody>
                                                                                                                                                        </table>
                                                                                                                                                    </div>
                                                                                                                                                    <!-- /.table-responsive -->
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="card">
                                                                                                                                        <div class="card-header accordion-header" data-toggle="collapse" data-target="#Accordion-2-Page3" role="tab">
                                                                                                                                            Bulk Payments <span class="expand text-muted">+</span>
                                                                                                                                        </div>
                                                                                                                                        <div id="Accordion-2-Page3" class="collapse " data-parent="#Comp-2-Accordion-Group">
                                                                                                                                            <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                                                                <link rel="stylesheet" href="..\assets\css\adminlte.min.css">
                                                                                                                                                    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                                                                        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                                                                                                                                            <div class="card-body p-0">
                                                                                                                                                                <div class="table-responsive">
                                                                                                                                                                    <table class="table m-0">
                                                                                                                                                                        <thead>
                                                                                                                                                                            <tr>
                                                                                                                                                                                <th>Category</th>
                                                                                                                                                                                <th>Amount</th>
                                                                                                                                                                                <th>Status</th>
                                                                                                                                                                                <th>Date</th>
                                                                                                                                                                                <th>Payee/Paye</th>
                                                                                                                                                                                <th>Details</th>
                                                                                                                                                                                <th>File</th>
                                                                                                                                                                            </tr>
                                                                                                                                                                        </thead>
                                                                                                                                                                        <tbody>
                                                                                                                                                                            <tr>
                                                                                                                                                                                <td>Tenant Charges & Fees</td>
                                                                                                                                                                                <td>Ksh 1200 </td>
                                                                                                                                                                                <td><span class="badge badge-success">Paid</span></td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    21-01-2021
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    John Mula
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    Paid for tap leakage
                                                                                                                                                                                </td>
                                                                                                                                                                                <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                                            </tr>
                                                                                                                                                                            <tr>
                                                                                                                                                                                <td>Tenant Charges & Fees</td>
                                                                                                                                                                                <td>Ksh 1200 </td>
                                                                                                                                                                                <td><span class="badge badge-warning">Pending</span></td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    21-01-2021
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    John Mula
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    Paid for tap leakage
                                                                                                                                                                                </td>
                                                                                                                                                                                <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                                            </tr>
                                                                                                                                                                            <tr>
                                                                                                                                                                                <td>Tenant Charges & Fees</td>
                                                                                                                                                                                <td>Ksh 1200 </td>
                                                                                                                                                                                <td><span class="badge badge-info">Processing</span></td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    21-01-2021
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    John Mula
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    Paid for tap leakage
                                                                                                                                                                                </td>
                                                                                                                                                                                <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                                            </tr>
                                                                                                                                                                        </tbody>
                                                                                                                                                                    </table>
                                                                                                                                                                </div>
                                                                                                                                                                <!-- /.table-responsive -->
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="card">
                                                                                                                                                    <div class="card-header accordion-header" data-toggle="collapse" data-target="#Accordion-2-Page4" role="tab">
                                                                                                                                                        Return Deposit <span class="expand text-muted">+</span>
                                                                                                                                                    </div>
                                                                                                                                                    <div id="Accordion-2-Page4" class="collapse " data-parent="#Comp-2-Accordion-Group">
                                                                                                                                                        <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                                                                            <link rel="stylesheet" href="..\assets\css\adminlte.min.css">
                                                                                                                                                                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                                                                                    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                                                                                                                                                        <div class="card-body p-0">
                                                                                                                                                                            <div class="table-responsive">
                                                                                                                                                                                <table class="table m-0">
                                                                                                                                                                                    <thead>
                                                                                                                                                                                        <tr>
                                                                                                                                                                                            <th>Category</th>
                                                                                                                                                                                            <th>Amount</th>
                                                                                                                                                                                            <th>Status</th>
                                                                                                                                                                                            <th>Date</th>
                                                                                                                                                                                            <th>Payee/Paye</th>
                                                                                                                                                                                            <th>Details</th>
                                                                                                                                                                                            <th>File</th>
                                                                                                                                                                                        </tr>
                                                                                                                                                                                    </thead>
                                                                                                                                                                                    <tbody>
                                                                                                                                                                                        <tr>
                                                                                                                                                                                            <td>Tenant Charges & Fees</td>
                                                                                                                                                                                            <td>Ksh 1200 </td>
                                                                                                                                                                                            <td><span class="badge badge-success">Paid</span></td>
                                                                                                                                                                                            <td>
                                                                                                                                                                                                21-01-2021
                                                                                                                                                                                            </td>
                                                                                                                                                                                            <td>
                                                                                                                                                                                                John Mula
                                                                                                                                                                                            </td>
                                                                                                                                                                                            <td>
                                                                                                                                                                                                Paid for tap leakage
                                                                                                                                                                                            </td>
                                                                                                                                                                                            <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                                                        </tr>
                                                                                                                                                                                        <tr>
                                                                                                                                                                                            <td>Tenant Charges & Fees</td>
                                                                                                                                                                                            <td>Ksh 1200 </td>
                                                                                                                                                                                            <td><span class="badge badge-warning">Pending</span></td>
                                                                                                                                                                                            <td>
                                                                                                                                                                                                21-01-2021
                                                                                                                                                                                            </td>
                                                                                                                                                                                            <td>
                                                                                                                                                                                                John Mula
                                                                                                                                                                                            </td>
                                                                                                                                                                                            <td>
                                                                                                                                                                                                Paid for tap leakage
                                                                                                                                                                                            </td>
                                                                                                                                                                                            <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                                                        </tr>
                                                                                                                                                                                        <tr>
                                                                                                                                                                                            <td>Tenant Charges & Fees</td>
                                                                                                                                                                                            <td>Ksh 1200 </td>
                                                                                                                                                                                            <td><span class="badge badge-info">Processing</span></td>
                                                                                                                                                                                            <td>
                                                                                                                                                                                                21-01-2021
                                                                                                                                                                                            </td>
                                                                                                                                                                                            <td>
                                                                                                                                                                                                John Mula
                                                                                                                                                                                            </td>
                                                                                                                                                                                            <td>
                                                                                                                                                                                                Paid for tap leakage
                                                                                                                                                                                            </td>
                                                                                                                                                                                            <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                                                        </tr>
                                                                                                                                                                                    </tbody>
                                                                                                                                                                                </table>
                                                                                                                                                                            </div>
                                                                                                                                                                            <!-- /.table-responsive -->
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                            <div class="card">
                                                                                                                                                                <div class="card-header accordion-header" data-toggle="collapse" data-target="#Accordion-2-Page5" role="tab">
                                                                                                                                                                    Apply Deposit <span class="expand text-muted">+</span>
                                                                                                                                                                </div>
                                                                                                                                                                <div id="Accordion-2-Page5" class="collapse " data-parent="#Comp-2-Accordion-Group">
                                                                                                                                                                    <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                                                                                        <link rel="stylesheet" href="..\assets\css\adminlte.min.css">
                                                                                                                                                                            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                                                                                                                                <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                                                                                                                                                                    <div class="card-body p-0">
                                                                                                                                                                                        <div class="table-responsive">
                                                                                                                                                                                            <table class="table m-0">
                                                                                                                                                                                                <thead>
                                                                                                                                                                                                    <tr>
                                                                                                                                                                                                        <th>Category</th>
                                                                                                                                                                                                        <th>Amount</th>
                                                                                                                                                                                                        <th>Status</th>
                                                                                                                                                                                                        <th>Date</th>
                                                                                                                                                                                                        <th>Payee/Paye</th>
                                                                                                                                                                                                        <th>Details</th>
                                                                                                                                                                                                        <th>File</th>
                                                                                                                                                                                                    </tr>
                                                                                                                                                                                                </thead>
                                                                                                                                                                                                <tbody>
                                                                                                                                                                                                    <tr>
                                                                                                                                                                                                        <td>Tenant Charges & Fees</td>
                                                                                                                                                                                                        <td>Ksh 1200 </td>
                                                                                                                                                                                                        <td><span class="badge badge-success">Paid</span></td>
                                                                                                                                                                                                        <td>
                                                                                                                                                                                                            21-01-2021
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        <td>
                                                                                                                                                                                                            John Mula
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        <td>
                                                                                                                                                                                                            Paid for tap leakage
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                                                                    </tr>
                                                                                                                                                                                                    <tr>
                                                                                                                                                                                                        <td>Tenant Charges & Fees</td>
                                                                                                                                                                                                        <td>Ksh 1200 </td>
                                                                                                                                                                                                        <td><span class="badge badge-warning">Pending</span></td>
                                                                                                                                                                                                        <td>
                                                                                                                                                                                                            21-01-2021
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        <td>
                                                                                                                                                                                                            John Mula
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        <td>
                                                                                                                                                                                                            Paid for tap leakage
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                                                                    </tr>
                                                                                                                                                                                                    <tr>
                                                                                                                                                                                                        <td>Tenant Charges & Fees</td>
                                                                                                                                                                                                        <td>Ksh 1200 </td>
                                                                                                                                                                                                        <td><span class="badge badge-info">Processing</span></td>
                                                                                                                                                                                                        <td>
                                                                                                                                                                                                            21-01-2021
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        <td>
                                                                                                                                                                                                            John Mula
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        <td>
                                                                                                                                                                                                            Paid for tap leakage
                                                                                                                                                                                                        </td>
                                                                                                                                                                                                        <td><a href=""><span class="fa fa-file" aria-hidden="true"></span></a></td>
                                                                                                                                                                                                    </tr>
                                                                                                                                                                                                </tbody>
                                                                                                                                                                                            </table>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <!-- /.table-responsive -->
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </section>
