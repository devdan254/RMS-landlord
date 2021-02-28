<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New Property</h4>
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
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="property-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("property/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="control-label" for="property_name">Property Name <span class="text-danger">*</span></label>
                                        <div id="ctrl-property_name-holder" class=""> 
                                            <input id="ctrl-property_name"  value="<?php  echo $this->set_field_value('property_name',""); ?>" type="text" placeholder="Enter Property Name"  required="" name="property_name"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="control-label" for="address">Address <span class="text-danger">*</span></label>
                                            <div id="ctrl-address-holder" class=""> 
                                                <input id="ctrl-address"  value="<?php  echo $this->set_field_value('address',""); ?>" type="text" placeholder="Enter Address"  required="" name="address"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="control-label" for="description">Description <span class="text-danger">*</span></label>
                                                <div id="ctrl-description-holder" class=""> 
                                                    <input id="ctrl-description"  value="<?php  echo $this->set_field_value('description',""); ?>" type="text" placeholder="Enter Description"  required="" name="description"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="photo">Photo <span class="text-danger">*</span></label>
                                                <div id="ctrl-photo-holder" class=""> 
                                                    <div class="dropzone required" input="#ctrl-photo" fieldname="photo"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                        <input name="photo" id="ctrl-photo" required="" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('photo',""); ?>" type="text"  />
                                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                            <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                                <div class="form-ajax-status"></div>
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-send"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
