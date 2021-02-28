<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("applicant/add");
$can_edit = ACL::is_allowed("applicant/edit");
$can_view = ACL::is_allowed("applicant/view");
$can_delete = ACL::is_allowed("applicant/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">APPLICANTS</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <?php $modal_id = "modal-" . random_str(); ?>
                    <button data-toggle="modal" data-target="#<?php  echo $modal_id ?>"  class="btn btn btn-success my-1 jim">
                        <i class="fa fa-plus"></i>                                  
                    </button>
                    <div data-backdrop="true" id="<?php  echo $modal_id ?>" class="modal fade"  role="dialog" aria-labelledby="<?php  echo $modal_id ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0 reset-grids">
                                    <div class=" ">
                                        <?php  
                                        $this->render_page("applicant/add"); 
                                        ?>
                                    </div>
                                </div>
                                <div style="top: 5px; right:5px; z-index: 999;" class="position-absolute">
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">&times;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('applicant'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('applicant'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('applicant'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Search
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            echo "Hello World";   }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4 comp-grid">
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated bounce page-content">
                            <div id="applicant-list-records ">
                                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                    <link rel="stylesheet" href="assets\css\adminlte.min.css">
                                        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                            <div class="row container d-inline">
                                                <?php
                                                if(!empty($records)){
                                                ?>
                                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                                    <!--record-->
                                                    <?php
                                                    $counter = 0;
                                                    $i=0;
                                                    foreach($records as $data){
                                                    $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                                    $counter++;
                                                    $i++;
                                                    ?>
                                                    <div class="col-sm-12 col-md-5 col-lg-5">
                                                        <!-- DIRECT CHAT SUCCESS -->
                                                        <div class="card card-light cardutline direct-chat direct-chat-success ">
                                                            <div class="card-header">
                                                                <h3 class="card-title"><b>APPLICATION <?php echo " ". $counter; ?></b></h3>
                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-times"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                                <!-- Conversations are loaded here -->
                                                                <div class="direct-chat-messages">
                                                                    <!-- Message. Default to the left -->
                                                                    <div class="direct-chat-msg">
                                                                        <div class="direct-chat-infos clearfix">
                                                                            <span class="direct-chat-timestamp float-right">23 <?php echo $data['date_applied']; ?> </span>
                                                                        </div>
                                                                        <!-- /.direct-chat-infos -->
                                                                        <img class="direct-chat-img " src="<?php echo $data['photo']; ?>" alt="Message User Image"  style="height:50px;width:50px;margin-right:2px;" >
                                                                            <!-- /.direct-chat-img -->
                                                                            <div class="direct-chat-text ml-10">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 ml-1 container-fluid">
                                                                                        <p>
                                                                                            <span class="col-sm-4 col-md-4 col-lg-4" style="font-family:verdana">
                                                                                                <b>Full Names : </b>
                                                                                            </span>
                                                                                            <span class="col-sm-4 col-md-4 col-lg-4">
                                                                                                <?php echo $data['name']; ?> 
                                                                                            </span>
                                                                                        </p>
                                                                                        <p>
                                                                                            <span class="col-sm-4 col-md-4 col-lg-4" style="font-family:verdana">
                                                                                                <b>House Name :</b>
                                                                                            </span>
                                                                                            <span class="col-sm-4 col-md-4 col-lg-4">
                                                                                                <?php echo $data['house_name']; ?> 
                                                                                            </span>
                                                                                        </p>
                                                                                        <p>
                                                                                            <span class="col-sm-4 col-md-4 col-lg-4" style="font-family:verdana">
                                                                                                <b>Property Name :</b>
                                                                                            </span>
                                                                                            <span class="col-sm-4 col-md-4 col-lg-4">
                                                                                                <?php echo $data['property_name']; ?> 
                                                                                            </span>
                                                                                        </p>
                                                                                        <p>
                                                                                            <span class="col-sm-4 col-md-4 col-lg-4" style="font-family:verdana">
                                                                                                <b>Phone :</b>
                                                                                            </span>
                                                                                            <span class="col-sm-4 col-md-4 col-lg-4">
                                                                                                <?php echo $data['phone']; ?> 
                                                                                            </span>
                                                                                        </p>
                                                                                        <p>
                                                                                            <span class="col-sm-4 col-md-4 col-lg-4" style="font-family:verdana">
                                                                                                <b>Email :</b>
                                                                                            </span>
                                                                                            <span class="col-sm-4 col-md-4 col-lg-4">
                                                                                                <?php echo $data['email']; ?> 
                                                                                            </span>
                                                                                        </p>
                                                                                        <div class="justify-content-center">
                                                                                            <a class="btn btn-sm btn-success has-tooltip ml-1" title="View Record" href="<?php print_link("applicant/view/$rec_id"); ?>">
                                                                                                <i class="fa fa-eye"></i> <?php print_lang('view'); ?>
                                                                                            </a>
                                                                                            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn ml-2 " title="Delete this record" href="<?php print_link("applicant/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                                                                <i class="fa fa-times"></i>
                                                                                                <?php print_lang('delete'); ?>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div> 
                                                                                </div>
                                                                            </div>
                                                                            <!-- /.direct-chat-text -->
                                                                        </div>
                                                                        <!-- /.direct-chat-msg -->
                                                                        <!-- /.direct-chat-msg -->
                                                                    </div>
                                                                    <!--/.direct-chat-messages-->
                                                                    <!-- Contacts are loaded here -->
                                                                    <!-- /.direct-chat-pane -->
                                                                </div>
                                                                <!-- /.card-body -->
                                                                <!-- /.card-body -->
                                                                <div class="card-footer">
                                                                    <form action="#" method="post">
                                                                        <div class="input-group">
                                                                            <input type="text" name="message" placeholder="Send feedback to the Applicant" class="form-control">
                                                                                <span class="input-group-append">
                                                                                    <button type="submit" class="btn btn-success">Send</button>
                                                                                </span>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <!-- /.card-footer-->
                                                                </div>
                                                            </div>
                                                            <div id="page-report-body">
                                                                <?php 
                                                                }
                                                                ?>
                                                                <!--endrecord-->
                                                            </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php 
                                                            if(empty($records)){
                                                            ?>
                                                            <div class="col-sm-12 col-md-5 col-lg-5">
                                                                <!-- DIRECT CHAT SUCCESS -->
                                                                <div class="card card-light cardutline direct-chat direct-chat-success ">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title"><b>APPLICATION</b></h3>
                                                                        <div class="card-tools">
                                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                                                                            </button>
                                                                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-times"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.card-header -->
                                                                    <div class="card-body">
                                                                        <!-- Conversations are loaded here -->
                                                                        <div class="direct-chat-messages">
                                                                            <!-- Message. Default to the left -->
                                                                            <div class="direct-chat-msg">
                                                                                <div class="direct-chat-infos clearfix">
                                                                                    <span class="direct-chat-timestamp float-right">00-00-0000  </span>
                                                                                </div>
                                                                                <!-- /.direct-chat-infos -->
                                                                                <img class="direct-chat-img " src="" alt="Message User Image"  style="height:50px;width:50px;margin-right:2px;" >
                                                                                    <!-- /.direct-chat-img -->
                                                                                    <div class="direct-chat-text ml-10">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 ml-1 container-fluid">
                                                                                                <h3>
                                                                                                    <span class="col-sm-12 col-md-12 col-lg-12 text-danger" style="font-family:verdana">
                                                                                                        <b>No Applications From Tenants</b>
                                                                                                    </span>
                                                                                                </h3>
                                                                                            </p>
                                                                                            <p>
                                                                                            </div> 
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- /.direct-chat-text -->
                                                                                </div>
                                                                                <!-- /.direct-chat-msg -->
                                                                                <!-- /.direct-chat-msg -->
                                                                            </div>
                                                                            <!--/.direct-chat-messages-->
                                                                            <!-- Contacts are loaded here -->
                                                                            <!-- /.direct-chat-pane -->
                                                                        </div>
                                                                        <!-- /.card-body -->
                                                                        <!-- /.card-body -->
                                                                        <div class="card-footer">
                                                                            <form action="#" method="">
                                                                                <div class="input-group">
                                                                                    <input type="text" name="message" placeholder="Send feedback to the Applicant" class="form-control " disabled>
                                                                                        <span class="input-group-append">
                                                                                            <button type="submit" class="btn btn-success">Send</button>
                                                                                        </span>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            <!-- /.card-footer-->
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <?php
                                                                if( $show_footer && !empty($records)){
                                                                ?>
                                                                <div class=" border-top mt-2">
                                                                    <div class="row justify-content-center">    
                                                                        <div class="col-md-auto justify-content-center">    
                                                                            <div class="p-3 d-flex justify-content-between">    
                                                                                <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("applicant/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                                                    <i class="fa fa-times"></i> Delete Selected
                                                                                </button>
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
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col">   
                                                                                                <?php
                                                                                                if($show_pagination == true){
                                                                                                $pager = new Pagination($total_records, $record_count);
                                                                                                $pager->route = $this->route;
                                                                                                $pager->show_page_count = true;
                                                                                                $pager->show_record_count = true;
                                                                                                $pager->show_page_limit =true;
                                                                                                $pager->limit_count = $this->limit_count;
                                                                                                $pager->show_page_number_list = true;
                                                                                                $pager->pager_link_range=5;
                                                                                                $pager->render();
                                                                                                }
                                                                                                ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 comp-grid">
                                                                            <div class="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
