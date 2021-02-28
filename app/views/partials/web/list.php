<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("web/add");
$can_edit = ACL::is_allowed("web/edit");
$can_view = ACL::is_allowed("web/view");
$can_delete = ACL::is_allowed("web/delete");
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
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title text-info">Marketting Website</h4>
                </div>
                <div class="col-2 mr-5 ">
                    <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                        <link rel="stylesheet" href="assets\css\adminlte.min.css">
                            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                    <div style="height:5px;">
                                        <a class="btn btn-app buton" style="padding:-3px;margin:-2px">
                                            <span class="badge bg-success">link</span>
                                            <i class="fa fa-share" style="padding:-3px;margin:-2px"></i> Share Link
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-3 ">
                                <?php if($can_add){ ?>
                                <?php $modal_id = "modal-" . random_str(); ?>
                                <button data-toggle="modal" data-target="#<?php  echo $modal_id ?>"  class="btn btn btn-danger my-1 jim ml-2">
                                    <i class="fa fa-plus"></i>                                  
                                </button>
                                <div data-backdrop="true" id="<?php  echo $modal_id ?>" class="modal fade"  role="dialog" aria-labelledby="<?php  echo $modal_id ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0 reset-grids">
                                                <div class=" ">
                                                    <?php  
                                                    $this->render_page("web_info/add"); 
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
                                <form  class="search" action="<?php print_link('web'); ?>" method="get">
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
                                                    <a class="text-decoration-none" href="<?php print_link('web'); ?>">
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
                                                    <a class="text-decoration-none" href="<?php print_link('web'); ?>">
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
                    <?php
                    }
                    ?>
                    <div  class="">
                        <div class="container-fluid">
                            <div class="row ">
                                <div class="col-md-12 comp-grid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  class="m-2">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12   ">
                                    <div class="">
                                        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                            <link rel="stylesheet" href="assets\css\adminlte.min.css">
                                                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-4 col-10 col-md-4">
                                                                <!-- small box -->
                                                                <div class="small-box bg-info">
                                                                    <div class="inner">
                                                                        <h4 class="text-warning alert-link">Basic Website</h4>
                                                                        <h5><span class="alert-link">Duration</span> : <span class="text-danger">30</span> days</h5>
                                                                        <p><big><span class="alert-link">Domain</span></big> :<big> <span >nelson.tenant.com</span></big></p>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <i class="ion ion-bag"></i>
                                                                    </div>
                                                                    <a href="#" class="small-box-footer">Click to view <i class="fa fa-arrow-circle-right pl-1"></i></a>
                                                                </div>
                                                            </div>
                                                            <!-- ./col -->
                                                            <div class="col-lg-4 col-10 col-md-4">
                                                                <!-- small box -->
                                                                <div class="small-box bg-success">
                                                                    <div class="inner">
                                                                        <h4 class="text-danger alert-link">UpGrade</h4>
                                                                        <h5><small><b>STATUS</b></small> : <span class="text-warning">Professional</span></h5>
                                                                        <p class=""><span class="alert-link"><big>Duration Limit</big> </span>: <b>30</b> days</p>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <i class="ion ion-stats-bars"></i>
                                                                    </div>
                                                                    <a href="<?php echo SITE_ADDR  ?>/app/views/partials/css/index.php " class="small-box-footer">Click To Upgrade<i class="fa fa-arrow-circle-right pl-1"></i></a>
                                                                </div>
                                                            </div>
                                                            <!-- ./col -->
                                                            <div class="col-lg-4 col-10 col-md-4">
                                                                <!-- small box -->
                                                                <div class="small-box bg-danger">
                                                                    <div class="inner">
                                                                        <h4 class="text-dark alert-link">Web Functionality</h4>
                                                                        <h5><small><b>STATUS</b></small> : <span class="text-success"><span class="spinner-grow spinner-grow-sm"></span> active...</span></h5>
                                                                        <p><span class="alert-link"><big>Renewal Date</big> </span>:<span class="text-info"> Jan 12-2021</span></p>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <i class="ion ion-pie-graph"></i>
                                                                    </div>
                                                                    <a href="#" class="small-box-footer">Click To View Invoice <i class="fa fa-arrow-circle-right pl-1"></i></a>
                                                                </div>
                                                            </div>
                                                            <!-- ./col -->
                                                        </div>
                                                        <!-- /.row -->
                                                        <!-- Main row -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div  class="m-2">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12 ">
                                                    <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                        <link rel="stylesheet" href="assets\css\adminlte.min.css">
                                                            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                                <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                                                    <div class="row">
                                                                        <div class="col-12 col-sm-6 col-md-3">
                                                                            <div class="info-box">
                                                                                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-cog"></i></span>
                                                                                <div class="info-box-content">
                                                                                    <span class="info-box-text">Listed Property</span>
                                                                                    <span class="info-box-number">
                                                                                        10
                                                                                        <small>%</small>
                                                                                    </span>
                                                                                </div>
                                                                                <!-- /.info-box-content -->
                                                                            </div>
                                                                            <!-- /.info-box -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                        <!-- fix for small devices only -->
                                                                        <div class="clearfix hidden-md-up"></div>
                                                                        <div class="col-12 col-sm-6 col-md-3">
                                                                            <div class="info-box mb-3">
                                                                                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-home"></i></span>
                                                                                <div class="info-box-content">
                                                                                    <span class="info-box-text">Listed Houses</span>
                                                                                    <span class="info-box-number">760</span>
                                                                                </div>
                                                                                <!-- /.info-box-content -->
                                                                            </div>
                                                                            <!-- /.info-box -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                        <div class="col-12 col-sm-6 col-md-3">
                                                                            <div class="info-box mb-3">
                                                                                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-thumbs-up"></i></span>
                                                                                <div class="info-box-content">
                                                                                    <span class="info-box-text">Viewers</span>
                                                                                    <span class="info-box-number">41</span>
                                                                                </div>
                                                                                <!-- /.info-box-content -->
                                                                            </div>
                                                                            <!-- /.info-box -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                        <div class="col-12 col-sm-6 col-md-3">
                                                                            <div class="info-box mb-3">
                                                                                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-comments-o"></i></span>
                                                                                <div class="info-box-content">
                                                                                    <span class="info-box-text">Messages</span>
                                                                                    <span class="info-box-number">2</span>
                                                                                </div>
                                                                                <!-- /.info-box-content -->
                                                                            </div>
                                                                            <!-- /.info-box -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                    </div>
                                                                    <!-- /.row -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div  class="my-1">
                                                    <div class="container-fluid">
                                                        <div class="page-header"><h4><h4 class="my-2 text-center text-uppercase text-info">Miscellaneous</h4>  </h4></div>
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-6 comp-grid">
                                                                <?php $modal_id = "modal-" . random_str(); ?>
                                                                <button data-toggle="modal" data-target="#<?php  echo $modal_id ?>"  class="btn btn-primary">
                                                                    <i class="fa fa-copy "></i>                                 
                                                                    Add Top Page 
                                                                </button>
                                                                <div data-backdrop="true" id="<?php  echo $modal_id ?>" class="modal fade"  role="dialog" aria-labelledby="<?php  echo $modal_id ?>" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body p-0 reset-grids">
                                                                                <div class=" ">
                                                                                    <?php  
                                                                                    $this->render_page("web_top_page/add"); 
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                            <div style="top: 5px; right:5px; z-index: 999;" class="position-absolute">
                                                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php $modal_id = "modal-" . random_str(); ?>
                                                                <button data-toggle="modal" data-target="#<?php  echo $modal_id ?>"  class="btn btn-warning mx-3">
                                                                    <i class="fa fa-desktop "></i>                                  
                                                                    Add Web Body 
                                                                </button>
                                                                <div data-backdrop="true" id="<?php  echo $modal_id ?>" class="modal fade"  role="dialog" aria-labelledby="<?php  echo $modal_id ?>" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body p-0 reset-grids">
                                                                                <div class=" ">
                                                                                    <?php  
                                                                                    $this->render_page("web_info/add"); 
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                            <div style="top: 5px; right:5px; z-index: 999;" class="position-absolute">
                                                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php $modal_id = "modal-" . random_str(); ?>
                                                                <button data-toggle="modal" data-target="#<?php  echo $modal_id ?>"  class="btn btn-success ">
                                                                    <i class="fa fa-file-code-o "></i>                                  
                                                                    Add Web Footer 
                                                                </button>
                                                                <div data-backdrop="true" id="<?php  echo $modal_id ?>" class="modal fade"  role="dialog" aria-labelledby="<?php  echo $modal_id ?>" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body p-0 reset-grids">
                                                                                <div class=" ">
                                                                                    <?php  
                                                                                    $this->render_page("web_bottom_page/add"); 
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
                                                <div  class="my-1 mt-3">
                                                    <div class="container-fluid">
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-6 comp-grid">
                                                                <?php $modal_id = "modal-" . random_str(); ?>
                                                                <button data-toggle="modal" data-target="#<?php  echo $modal_id ?>"  class="btn btn-primary">
                                                                    <i class="fa fa-folder-open "></i>                                  
                                                                    Edit Top Page 
                                                                </button>
                                                                <div data-backdrop="true" id="<?php  echo $modal_id ?>" class="modal fade"  role="dialog" aria-labelledby="<?php  echo $modal_id ?>" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body p-0 reset-grids">
                                                                                <div class=" ">
                                                                                    <?php  
                                                                                    $this->render_page("web_top_page/view"); 
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                            <div style="top: 5px; right:5px; z-index: 999;" class="position-absolute">
                                                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php $modal_id = "modal-" . random_str(); ?>
                                                                <button data-toggle="modal" data-target="#<?php  echo $modal_id ?>"  class="btn btn-warning mx-3">
                                                                    <i class="fa fa-edit "></i>                                 
                                                                    Edit Web Body 
                                                                </button>
                                                                <div data-backdrop="true" id="<?php  echo $modal_id ?>" class="modal fade"  role="dialog" aria-labelledby="<?php  echo $modal_id ?>" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body p-0 reset-grids">
                                                                                <div class=" ">
                                                                                    <?php  
                                                                                    $this->render_page("web_info/view"); 
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                            <div style="top: 5px; right:5px; z-index: 999;" class="position-absolute">
                                                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php $modal_id = "modal-" . random_str(); ?>
                                                                <button data-toggle="modal" data-target="#<?php  echo $modal_id ?>"  class="btn btn-success ">
                                                                    <i class="fa fa-file-code-o "></i>                                  
                                                                    Edit Web Footer 
                                                                </button>
                                                                <div data-backdrop="true" id="<?php  echo $modal_id ?>" class="modal fade"  role="dialog" aria-labelledby="<?php  echo $modal_id ?>" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body p-0 reset-grids">
                                                                                <div class=" ">
                                                                                    <?php  
                                                                                    $this->render_page("web_bottom_page/view"); 
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
                                            </section>
