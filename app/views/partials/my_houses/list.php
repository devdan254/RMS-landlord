<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("my_houses/add");
$can_edit = ACL::is_allowed("my_houses/edit");
$can_view = ACL::is_allowed("my_houses/view");
$can_delete = ACL::is_allowed("my_houses/delete");
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
                    <h4 class="record-title text-uppercase">My Houses</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <?php $modal_id = "modal-" . random_str(); ?>
                    <button data-toggle="modal" data-target="#<?php  echo $modal_id ?>"  class="btn btn btn-success my-1 jim">
                        <i class="fa fa-plus "></i>                                 
                    </button>
                    <div data-backdrop="true" id="<?php  echo $modal_id ?>" class="modal fade"  role="dialog" aria-labelledby="<?php  echo $modal_id ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0 reset-grids">
                                    <div class=" ">
                                        <?php  
                                        $this->render_page("my_houses/add"); 
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
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a  class="btn btn btn-light my-1" href="<?php print_link("my_houses/house_table?orderby=house_name&ordertype=desc") ?>">
                        <i class="fa fa-align-justify "></i>                                
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-3 ">
                    <form  class="search" action="<?php print_link('my_houses'); ?>" method="get">
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
                                        <a class="text-decoration-none" href="<?php print_link('my_houses'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('my_houses'); ?>">
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
                            <div id="property-list-records">
                                <div class="card justify-content-center">
                                    <div class="card-header">
                                        <div>
                                            <h4 class="text-dark">MY HOUSES
                                                <span class="justify-content-end float-right">
                                                    <i class="fa fa-arrows" aria-hidden="true"></i> 
                                                </span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $counter = 0;
                                        foreach($records as $data){
                                        $rec_id = (!empty($data['house_id']) ? urlencode($data['house_id']) : null);
                                        $counter++;
                                        ?>
                                        <div class="container row">
                                            <div class="col-md-4 col-lg-4 col-sm-6">
                                                <img src="<?php echo $data['photos']; ?>" height="auto" width="100%">
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-sm-6">
                                                    <h4 style="font-family:verdana;"><?php echo strtoupper($data['property_name']); ?></h4>
                                                    <p><span><i class="fa fa-home pr-2 text-danger"></i> </span> <b><span style="font-size:16px;"><?php echo strtoupper($data['house_name']);?></span></b></p>
                                                    <p style="position:relative;top:-5px;"><span><i class="fa fa-credit-card pr-2 text-warning"></i> </span> <b><?php echo "Ksh"." ". $data['rent_amount'];?> </b></p>
                                                    <p style="font-family:verdana;position:relative;bottom:10px;"><span><i class="fa fa-cogs pr-2 text-info"></i> </span> <span style="font-family:monospace;font-size:17px"><?php echo $data['inclusives'];?></span></p>
                                                    <p class="d-flex">
                                                        <a class="btn btn-sm btn-success has-tooltip mx-1" title="View Record" href="<?php print_link("my_houses/view/$rec_id"); ?>">
                                                            <i class="fa fa-eye"></i> <?php print_lang('view'); ?>
                                                        </a>
                                                        <a class="btn btn-sm btn-info has-tooltip mx-1" title="Edit This Record" href="<?php print_link("my_houses/edit/$rec_id"); ?>">
                                                            <i class="fa fa-edit"></i> <?php print_lang('edit'); ?>
                                                        </a>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn mx-1" title="Delete this record" href="<?php print_link("my_houses/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                            <i class="fa fa-times"></i>
                                                            <?php print_lang('delete'); ?>
                                                        </a>
                                                    </p>
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-sm-6">
                                                    <h4 class="invisible"> <span style="font-size:18px;color:grey"><i class="fa fa-link"></i></span></h4>
                                                    <p><span style="color:#adad85"> <i class="fa fa-clock-o text-grey pr-2"></i> </span> <b> <span class="" style="font-size:12px;font-family:verdana;color:#adad85 "> <?php echo $data['date'];?> </span> </b> </p>
                                                    <p style="font-family:verdana;position:relative;bottom:7px;"><span><i class="fa fa-user pr-2 text-success"></i> </span> <span style="font-size:17px"><?php echo $data['occupation'];?></span></p>
                                                    <p style="position:relative;top:-9px;"><span><i class="fa fa-info-circle pr-2 text-info"></i> </span> <span style="font-family:monospace;font-size:17px;" ><?php echo $data['description'];?> </span></p>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
