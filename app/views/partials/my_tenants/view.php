<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("my_tenants/add");
$can_edit = ACL::is_allowed("my_tenants/edit");
$can_view = ACL::is_allowed("my_tenants/view");
$can_delete = ACL::is_allowed("my_tenants/delete");
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
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  My Tenants</h4>
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
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <div id="applicant-list-records">
                            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                <link rel="stylesheet" href="assets\css\adminlte.min.css">
                                    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                                            <!-- /.col -->
                                            <?php
                                            $counter = 0;
                                            if(!empty($data)){
                                            $rec_id = (!empty($data['tenant_id']) ? urlencode($data['tenant_id']) : null);
                                            $counter++;
                                            ?>
                                            <div class="card card-solid">
                                                <div class="card-body pb-0">
                                                    <div class="row d-flex align-items-stretch">
                                                        <div class="col-12 col-sm-12 col-md-8 d-flex align-items-stretch">
                                                            <div class="card bg-light">
                                                                <div class="card-header text- border-bottom-0">
                                                                    VIEW TENANT PROFILE
                                                                </div>
                                                                <div class="card-body pt-0">
                                                                    <div class="row">
                                                                        <div class="col-7">
                                                                            <h3 class="text-danger"><?php echo $data['tenant_name']; ?></h3>
                                                                            <p class="text-muted text-sm"><b>About: </b> <?php echo $data['more_info']; ?> </p>
                                                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                                                <li class="mt-3"><span class="fa-li"><i class="fa fa-lg fa-phone text-success"></i></span> Phone :  <?php echo $data['phone']; ?></li>
                                                                                <li class="mt-2"><span class="fa-li"><i class="fa fa-lg fa-envelope text-danger"></i></span> Email : <?php echo $data['email']; ?></li>
                                                                                <li class="mt-2"><span class="fa-li"><i class="fa fa-mars-double fa-lg text-warning"></i></span> Gender : <?php echo $data['sex']; ?></li>
                                                                                <li class="mt-2"><span class="fa-li"><i class="fa fa-lg fa-home text-dark"></i></span> House Name : <?php echo $data['house_name']; ?></li>
                                                                                <li class="mt-2"><span class="fa-li"><i class="fa fa-lg fa-credit-card text-info"></i></span> National ID : <?php echo $data['national_id']; ?></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-5 text-center">
                                                                            <img src="<?php echo $data['photo']; ?>" alt="" class="img-circle img-fluid">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="text-right">
                                                                            <button download="<?php echo $data['doc_pdf'];  ?>" class="btn btn-sm bg-teal">
                                                                                <i class="fa fa-download fa-2x text-dark"></i>
                                                                            </button>
                                                                            <a href="<?php echo $data['doc_pdf'];  ?>" class="btn btn-sm btn-primary">
                                                                                <i class="fa fa-paste"></i> View Policy Document
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="page-report-body" class="">
                                                </div>
                                                <div class="p-3 d-flex">
                                                    <div class="dropup export-btn-holder mx-1">
                                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-save"></i> <?php print_lang('export'); ?>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                                </a>
                                                                <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                                                <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                                    <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                                                    </a>
                                                                    <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                                                    <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                                        <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                                        </a>
                                                                        <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                                        <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                                            <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                                            </a>
                                                                            <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                                            <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                                                <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <a class="btn btn-sm btn-info"  href="<?php print_link("my_tenants/edit/$rec_id"); ?>">
                                                                            <i class="fa fa-edit"></i> <?php print_lang('edit'); ?>
                                                                        </a>
                                                                        <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("my_tenants/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                                            <i class="fa fa-times"></i> <?php print_lang('delete'); ?>
                                                                        </a>
                                                                    </div>
                                                                    <?php
                                                                    }
                                                                    else{
                                                                    ?>
                                                                    <!-- Empty Record Message -->
                                                                    <div class="text-muted p-3">
                                                                        <i class="fa fa-ban"></i> No Record Found
                                                                    </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
