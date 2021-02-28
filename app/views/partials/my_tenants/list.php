<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("my_tenants/add");
$can_edit = ACL::is_allowed("my_tenants/edit");
$can_view = ACL::is_allowed("my_tenants/view");
$can_delete = ACL::is_allowed("my_tenants/delete");
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
                    <h4 class="record-title text-uppercase text-info">My Tenants</h4>
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
                                        $this->render_page("my_tenants/add"); 
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
                    <form  class="search" action="<?php print_link('my_tenants'); ?>" method="get">
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
                                        <a class="text-decoration-none" href="<?php print_link('my_tenants'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('my_tenants'); ?>">
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
                        <div  class=" animated fadeIn page-content">
                            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                <link rel="stylesheet" href="assets\css\adminlte.min.css">
                                    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                            <?php
                                            if(!empty($records)){
                                            ?>
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            foreach($records as $data){
                                            $rec_id = (!empty($data['tenant_id']) ? urlencode($data['tenant_id']) : null);
                                            $counter++;
                                            ?>
                                            <div class="col-md-4 d-inline-block">
                                                <!-- Widget: user widget style 1 -->
                                                <div class="card card-widget widget-user">
                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header bg-info">
                                                        <h3 class="widget-user-username"><?php echo $data['tenant_name']; ?>  <span class="w3-badge w3-red">  <?php echo " "." "." "." ". $counter; ?> </span></h3>
                                                        <h5 class="widget-user-desc"><?php echo $data['email']; ?></h5>
                                                    </div>
                                                    <div class="widget-user-image">
                                                        <img class="img-circle elevation-2 rounded-circle" src="<?php echo $data['photo']; ?>" alt="User Avatar" style="position:relative;bottom:5px;width:100px;height:120px;">
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-sm-4 border-right">
                                                                    <div class="description-block">
                                                                        <h5 class="description-header">PHONE</h5>
                                                                        <span class="description-text"><?php echo $data['phone']; ?></span>
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                                <!-- /.col -->
                                                                <div class="col-sm-4 border-right">
                                                                    <div class="description-block">
                                                                        <h5 class="description-header">HOUSE</h5>
                                                                        <span class="description-text"><?php echo $data['house_name']; ?></span>
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                                <!-- /.col -->
                                                                <div class="col-sm-4">
                                                                    <div class="description-block">
                                                                        <h5 class="description-header">DATE IN</h5>
                                                                        <span class="description-text display-6"><?php echo $data['date_moved_in']; ?></span>
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                                <div class="w3-container thumbnail card-light cardutline direct-chat direct-chat-success rounded w3-card-4 bg-light">
                                                                    <div class="section">
                                                                        <h4 class="" style="font-family:Arial">Brief Description</h4>
                                                                        <p style="font-family:Arial" class="teal"><?php echo $data['more_info']; ?></p>
                                                                        <h5 class="mt-2" style="font-family:Arial">Gender  <span style="font-family:Times New Roman">  :  <?php echo $data['sex']; ?></span></h5>
                                                                        <h5 class="mt-1" style="font-family:Arial">REG ID  <span style="font-family:Times New Roman">  :  <?php echo $data['national_id']; ?></span></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="justify-content-center mx-auto d-block">
                                                                    <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("my_tenants/view/$rec_id"); ?>">
                                                                        <i class="fa fa-eye"></i> <?php print_lang('view'); ?>
                                                                    </a>
                                                                    <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("my_tenants/edit/$rec_id"); ?>">
                                                                        <i class="fa fa-edit"></i> <?php print_lang('edit'); ?>
                                                                    </a>
                                                                    <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("my_tenants/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                                        <i class="fa fa-times"></i>
                                                                        <?php print_lang('delete'); ?>
                                                                    </a>
                                                                </div>
                                                                <!-- /.col -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php } ?>
                                                <?php 
                                                if(empty($records)){
                                                ?>
                                                <div class="col-md-4 d-inline-block">
                                                    <!-- Widget: user widget style 1 -->
                                                    <div class="card card-widget widget-user">
                                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                                        <div class="widget-user-header bg-info">
                                                        </div>
                                                        <div class="widget-user-image">
                                                            <img class="img-circle elevation-2 rounded-circle" src="" alt="User Avatar" style="position:relative;bottom:5px;width:100px;height:120px;">
                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="row">
                                                                    <div class="col-sm-4 border-right">
                                                                        <div class="description-block">
                                                                        </div>
                                                                        <!-- /.description-block -->
                                                                    </div>
                                                                    <!-- /.col -->
                                                                    <div class="col-sm-4 border-right">
                                                                        <div class="description-block">
                                                                            <h5 class="description-header invisible">HOUSE</h5>
                                                                        </div>
                                                                        <!-- /.description-block -->
                                                                    </div>
                                                                    <!-- /.col -->
                                                                    <div class="col-sm-4">
                                                                        <div class="description-block">
                                                                            <h5 class="description-header invisible">DATE</h5>
                                                                            <span class="description-text display-6"></span>
                                                                        </div>
                                                                        <!-- /.description-block -->
                                                                    </div>
                                                                    <div class="w3-container thumbnail card-light cardutline direct-chat direct-chat-success rounded w3-card-4 bg-light">
                                                                        <div class="section justify-content-center ml-4">
                                                                            <h4 style="font-family:Arial" class="teal text-danger">No Tenants In Your records</h4>
                                                                            <h5 class="mt-1 invisible" style="font-family:Arial">REG ID  <span style="font-family:Times New Roman">  :  </span></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="justify-content-center mx-auto d-block">
                                                                        <a class="disabled btn btn-sm btn-success has-tooltip ml-1" title="View Record" href="" >
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                        <a class="btn btn-sm btn-info disabled has-tooltip" title="Edit This Record" href="">
                                                                            <i class="fa fa-edit"></i> 
                                                                        </a>
                                                                        <a class="btn btn-sm disabled btn-danger has-tooltip record-delete-btn" title="Delete this record" href="" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </div>
                                                                    <!-- /.col -->
                                                                </div>
                                                            </div>
                                                        </div>
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
