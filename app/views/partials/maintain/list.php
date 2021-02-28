<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("maintain/add");
$can_edit = ACL::is_allowed("maintain/edit");
$can_view = ACL::is_allowed("maintain/view");
$can_delete = ACL::is_allowed("maintain/delete");
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
                    <h4 class="record-title">Maintenance</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <?php $modal_id = "modal-" . random_str(); ?>
                    <button data-toggle="modal" data-target="#<?php  echo $modal_id ?>"  class="btn btn btn-primary my-1 jim">
                        <i class="fa fa-plus"></i>                                  
                    </button>
                    <div data-backdrop="true" id="<?php  echo $modal_id ?>" class="modal fade"  role="dialog" aria-labelledby="<?php  echo $modal_id ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0 reset-grids">
                                    <div class=" ">
                                        <?php  
                                        $this->render_page("maintain/add"); 
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
                    <form  class="search" action="<?php print_link('maintain'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
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
                    <div class="col-md-2 comp-grid">
                        <div class=""><div></div>
                        </div>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class="bg-light animated bounce page-content">
                            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                <link rel="stylesheet" href="assets\css\adminlte.min.css">
                                    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                            <script src="assets\js\adminlte.js"></script>
                                            <!-- /.card -->
                                            <div class="row">
                                                <div class="col-md-6 mx-3">
                                                    <!-- DIRECT CHAT -->
                                                    <div class="card direct-chat direct-chat-warning">
                                                        <div class="card-header">
                                                            <h3 class="card-title"><b>MAINTENANCE REQUEST</b></h3>
                                                            <div class="card-tools">
                                                                <span data-toggle="tooltip"  class="badge badge-warning">3</span>
                                                                <button type="button" class="btn btn-tool tr" data-card-widget="collapse"><i class="fa fa-minus"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-tool" data-toggle="tooltip" 
                                                                    data-widget="chat-pane-toggle">
                                                                <i class="fa fa-comments"></i></button>
                                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body bc">
                                                            <!-- Conversations are loaded here -->
                                                            <div class="direct-chat-messages" >
                                                                <!-- Message. Default to the left -->
                                                                <div class="direct-chat-msg col-md-8 mx-auto mb-5 mt-3 w3-card-4" style="background-color:#E8E8E8 ">
                                                                    <div class="direct-chat-infos clearfix w3-card bg-light">
                                                                        <span class="direct-chat-name float-left py-3 pl-2  "><b> Alexander Pierce </b></span>
                                                                        <span class="direct-chat-timestamp float-right py-3 pr-1">23 Jan 2:00 pm</span>
                                                                    </div>
                                                                    <!-- /.direct-chat-infos 
                                                                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                                                        <!-- /.direct-chat-img -->
                                                                        <div class=" justify-content-center d-block text-center m-2" >
                                                                            <p class="py-2 text-uppercase" style="font-family:arial;font-size:15px">Lorem ipsum dolor sit amet</p>
                                                                            <div class="col " style="position:relative;top:-6px;">
                                                                                <h5 class="text-info pl-1">Property</h5>
                                                                                <p class="py-1" style="position:relative;bottom:8px;">Kakis Trail</p>
                                                                            </div>
                                                                            <div class="float-left ml-4 pl-2" style="position:relative;bottom:4px;">
                                                                                <p class="btn btn-light w3-card-2 px-2 py-1 text-shadow"> #234567 </p> 
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.direct-chat-text -->
                                                                    </div>
                                                                    <!-- /.direct-chat-msg -->
                                                                    <!-- /.direct-chat-msg -->
                                                                    <!-- /.direct-chat-msg -->
                                                                    <!-- /.direct-chat-msg -->
                                                                </div>
                                                                <!--/.direct-chat-messages-->
                                                                <!-- Contacts are loaded here -->
                                                                <div class="direct-chat-contacts">
                                                                    <ul class="contacts-list">
                                                                        <li>
                                                                            <a href="#">
                                                                                <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">
                                                                                    <div class="contacts-list-info">
                                                                                        <span class="contacts-list-name">
                                                                                            Count Dracula
                                                                                            <small class="contacts-list-date float-right">2/28/2015</small>
                                                                                        </span>
                                                                                        <span class="contacts-list-msg">How have you been? I was...</span>
                                                                                    </div>
                                                                                    <!-- /.contacts-list-info -->
                                                                                </a>
                                                                            </li>
                                                                            <!-- End Contact Item -->
                                                                            <li>
                                                                                <a href="#">
                                                                                    <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">
                                                                                        <div class="contacts-list-info">
                                                                                            <span class="contacts-list-name">
                                                                                                Sarah Doe
                                                                                                <small class="contacts-list-date float-right">2/23/2015</small>
                                                                                            </span>
                                                                                            <span class="contacts-list-msg">I will be waiting for...</span>
                                                                                        </div>
                                                                                        <!-- /.contacts-list-info -->
                                                                                    </a>
                                                                                </li>
                                                                                <!-- End Contact Item -->
                                                                                <li>
                                                                                    <a href="#">
                                                                                        <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">
                                                                                            <div class="contacts-list-info">
                                                                                                <span class="contacts-list-name">
                                                                                                    Nadia Jolie
                                                                                                    <small class="contacts-list-date float-right">2/20/2015</small>
                                                                                                </span>
                                                                                                <span class="contacts-list-msg">I'll call you back at...</span>
                                                                                            </div>
                                                                                            <!-- /.contacts-list-info -->
                                                                                        </a>
                                                                                    </li>
                                                                                    <!-- End Contact Item -->
                                                                                    <li>
                                                                                        <a href="#">
                                                                                            <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">
                                                                                                <div class="contacts-list-info">
                                                                                                    <span class="contacts-list-name">
                                                                                                        Nora S. Vans
                                                                                                        <small class="contacts-list-date float-right">2/10/2015</small>
                                                                                                    </span>
                                                                                                    <span class="contacts-list-msg">Where is your new...</span>
                                                                                                </div>
                                                                                                <!-- /.contacts-list-info -->
                                                                                            </a>
                                                                                        </li>
                                                                                        <!-- End Contact Item -->
                                                                                        <li>
                                                                                            <a href="#">
                                                                                                <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">
                                                                                                    <div class="contacts-list-info">
                                                                                                        <span class="contacts-list-name">
                                                                                                            John K.
                                                                                                            <small class="contacts-list-date float-right">1/27/2015</small>
                                                                                                        </span>
                                                                                                        <span class="contacts-list-msg">Can I take a look at...</span>
                                                                                                    </div>
                                                                                                    <!-- /.contacts-list-info -->
                                                                                                </a>
                                                                                            </li>
                                                                                            <!-- End Contact Item -->
                                                                                            <li>
                                                                                                <a href="#">
                                                                                                    <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">
                                                                                                        <div class="contacts-list-info">
                                                                                                            <span class="contacts-list-name">
                                                                                                                Kenneth M.
                                                                                                                <small class="contacts-list-date float-right">1/4/2015</small>
                                                                                                            </span>
                                                                                                            <span class="contacts-list-msg">Never mind I found...</span>
                                                                                                        </div>
                                                                                                        <!-- /.contacts-list-info -->
                                                                                                    </a>
                                                                                                </li>
                                                                                                <!-- End Contact Item -->
                                                                                            </ul>
                                                                                            <!-- /.contacts-list -->
                                                                                        </div>
                                                                                        <!-- /.direct-chat-pane -->
                                                                                    </div>
                                                                                    <!-- /.card-body -->
                                                                                    <div class="card-footer">
                                                                                        <form action="#" method="post">
                                                                                            <div class="input-group">
                                                                                                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                                                                                    <span class="input-group-append">
                                                                                                        <button type="button" class="btn btn-warning">Send</button>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                        <!-- /.card-footer-->
                                                                                    </div>
                                                                                    <!--/.direct-chat -->
                                                                                </div>
                                                                                <!-- /.col -->
                                                                                <div class="col-md-5 ml-2">
                                                                                    <!-- DIRECT CHAT -->
                                                                                    <div class="card direct-chat direct-chat-warning">
                                                                                        <div class="card-header">
                                                                                            <h3 class="card-title"><b>PROGRESS</b></h3>
                                                                                            <div class="card-tools">
                                                                                                <span data-toggle="tooltip"  class="badge badge-warning">3</span>
                                                                                                <button type="button" class="btn btn-tool tr" data-card-widget="collapse"><i class="fa fa-minus"></i>
                                                                                                </button>
                                                                                                <button type="button" class="btn btn-tool" data-toggle="tooltip" 
                                                                                                    data-widget="chat-pane-toggle">
                                                                                                <i class="fa fa-comments"></i></button>
                                                                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-times"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- /.card-header -->
                                                                                        <div class="card-body bc">
                                                                                            <!-- Conversations are loaded here -->
                                                                                            <br>
                                                                                                <br>
                                                                                                    <div class="w3-card-4 w3-round-xlarge <?php echo" bg-danger" ?> container mx-5 mb-5 mt-3 justify-content-center d-block text-center">
                                                                                                        <h4 class="p-3 ">
                                                                                                            <i class="fa fa-exclamation-triangle text-light fa-2x" aria-hidden="true"></i>
                                                                                                            <br>
                                                                                                                <span>
                                                                                                                    No Request Made
                                                                                                                </span>
                                                                                                            </h4>
                                                                                                        </div>
                                                                                                        <!--/.direct-chat-messages-->
                                                                                                        <p class></p>
                                                                                                        <!-- Contacts are loaded here -->
                                                                                                        <div class="section">
                                                                                                            <button class="btn btn-warning m-2">
                                                                                                                <span class="spinner-grow spinner-grow-sm"></span>
                                                                                                                InComplete
                                                                                                            </button>
                                                                                                            <button class="btn btn-info m-2">
                                                                                                                <span class="spinner-grow spinner-grow-sm"></span>
                                                                                                                In Progress
                                                                                                            </button>
                                                                                                            <button class="btn btn-success m-2">
                                                                                                                <span class="spinner-grow spinner-grow-sm"></span>
                                                                                                                Complete
                                                                                                            </button>
                                                                                                            <!-- /.direct-chat-pane -->
                                                                                                        </div>
                                                                                                        <!-- /.card-body -->
                                                                                                        <div class="card-footer ">
                                                                                                            <form action="#" method="post">
                                                                                                                <div class="input-group">
                                                                                                                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                                                                                                        <span class="input-group-append">
                                                                                                                            <button type="button" class="btn btn-info">FEEDBACK</button>
                                                                                                                        </span>
                                                                                                                    </div>
                                                                                                                </form>
                                                                                                            </div>
                                                                                                            <!-- /.card-footer-->
                                                                                                        </div>
                                                                                                        <!--/.direct-chat -->
                                                                                                    </div>
                                                                                                    <!-- /.col -->
                                                                                                </div>
                                                                                                <div id="maintain-list-records">
                                                                                                    <div id="page-report-body" class="table-responsive">
                                                                                                        <?php 
                                                                                                        if(empty($records)){
                                                                                                        ?>
                                                                                                        <h4 class="bg-light text-center border-top text-muted animated bounce  p-3 col-12">
                                                                                                            <i class="fa fa-ban"></i> <?php print_lang('no_record_found'); ?>
                                                                                                        </h4>
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
                                                                                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("maintain/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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
                                                                                                                                <a class="text-decoration-none" href="<?php print_link('maintain'); ?>">
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
                                                                                                                                <a class="text-decoration-none" href="<?php print_link('maintain'); ?>">
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
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-4 comp-grid">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </section>
