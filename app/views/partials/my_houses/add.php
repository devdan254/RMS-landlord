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
                    <h4 class="record-title">Add New  House</h4>
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
                        <form id="my_houses-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("my_houses/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <input id="ctrl-house_id"  value="<?php  echo $this->set_field_value('house_id',random_chars(6)); ?>" type="hidden" placeholder="Enter House Id"  required="" name="house_id"  class="form-control " />
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="house_name">House Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-house_name"  value="<?php  echo $this->set_field_value('house_name',""); ?>" type="text" placeholder="Enter House Name"  required="" name="house_name"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="beds">Beds </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <?php
                                                        $beds_options = Menu :: $beds;
                                                        if(!empty($beds_options)){
                                                        foreach($beds_options as $option){
                                                        $value = $option['value'];
                                                        $label = $option['label'];
                                                        //check if current option is checked option
                                                        $checked = $this->set_field_checked('beds', $value, "");
                                                        ?>
                                                        <label class="custom-control custom-radio custom-control-inline">
                                                            <input id="ctrl-beds" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="beds" />
                                                                <span class="custom-control-label"><?php echo $label ?></span>
                                                            </label>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="baths">Baths </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <?php
                                                            $baths_options = Menu :: $baths;
                                                            if(!empty($baths_options)){
                                                            foreach($baths_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            //check if current option is checked option
                                                            $checked = $this->set_field_checked('baths', $value, "");
                                                            ?>
                                                            <label class="custom-control custom-radio custom-control-inline">
                                                                <input id="ctrl-baths" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="baths" />
                                                                    <span class="custom-control-label"><?php echo $label ?></span>
                                                                </label>
                                                                <?php
                                                                }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="description">Description </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter Description" id="ctrl-description"  rows="5" name="description" class="htmleditor form-control"><?php  echo $this->set_field_value('description',""); ?></textarea>
                                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="rent_amount">Rent Amount <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-rent_amount"  value="<?php  echo $this->set_field_value('rent_amount',""); ?>" type="number" placeholder="Enter Rent Amount" step="1"  required="" name="rent_amount"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="photos">Photos </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <div class="dropzone " input="#ctrl-photos" fieldname="photos"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="10">
                                                                        <input name="photos" id="ctrl-photos" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('photos',""); ?>" type="text"  />
                                                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                            <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input id="ctrl-address"  value="<?php  echo $this->set_field_value('address',random_chars(6)); ?>" type="hidden" placeholder="Enter Address"  required="" name="address"  class="form-control " />
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="property_name">Property Name <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <select required=""  id="ctrl-property_name" name="property_name"  placeholder="Select a value ..."    class="selectize" >
                                                                                <option value="">Select a value ...</option>
                                                                                <?php 
                                                                                $property_name_options = $comp_model -> my_houses_property_name_option_list();
                                                                                if(!empty($property_name_options)){
                                                                                foreach($property_name_options as $option){
                                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                                $selected = $this->set_field_selected('property_name',$value, $comp_model->my_houses_property_name_default_value());
                                                                                ?>
                                                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                                    <?php echo $label; ?>
                                                                                </option>
                                                                                <?php
                                                                                }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="occupation">Occupation <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <select required=""  id="ctrl-occupation" name="occupation"  placeholder="Select a value ..."    class="custom-select" >
                                                                                <option value="">Select a value ...</option>
                                                                                <?php
                                                                                $occupation_options = Menu :: $occupation;
                                                                                if(!empty($occupation_options)){
                                                                                foreach($occupation_options as $option){
                                                                                $value = $option['value'];
                                                                                $label = $option['label'];
                                                                                $selected = $this->set_field_selected('occupation', $value, "");
                                                                                ?>
                                                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                                    <?php echo $label ?>
                                                                                </option>                                   
                                                                                <?php
                                                                                }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="rent_type">Rent Type <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <select required=""  id="ctrl-rent_type" name="rent_type"  placeholder="Select a value ..."    class="custom-select" >
                                                                                <option value="">Select a value ...</option>
                                                                                <?php
                                                                                $rent_type_options = Menu :: $rent_type;
                                                                                if(!empty($rent_type_options)){
                                                                                foreach($rent_type_options as $option){
                                                                                $value = $option['value'];
                                                                                $label = $option['label'];
                                                                                $selected = $this->set_field_selected('rent_type', $value, "");
                                                                                ?>
                                                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                                    <?php echo $label ?>
                                                                                </option>                                   
                                                                                <?php
                                                                                }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="inclusives">Inclusives </label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <?php 
                                                                            $inclusives_options = $comp_model -> my_houses_inclusives_option_list();
                                                                            if(!empty($inclusives_options)){
                                                                            $ci = 0;
                                                                            foreach($inclusives_options as $option){
                                                                            $ci++;
                                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                            $checked = $this->set_field_checked('inclusives', $value, "");
                                                                            ?>
                                                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                                                <input id="ctrl-inclusives" class="custom-control-input" <?php echo $checked; ?> value="<?php echo $value; ?>" type="checkbox" name="inclusives[]"   />
                                                                                    <span class="custom-control-label"><?php echo $label; ?></span>
                                                                                </label>
                                                                                <?php
                                                                                }
                                                                                }
                                                                                ?>
                                                                            </div>
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
                                                <div class="col-md-7 comp-grid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
