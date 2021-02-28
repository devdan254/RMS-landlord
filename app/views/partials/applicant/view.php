<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("applicant/add");
$can_edit = ACL::is_allowed("applicant/edit");
$can_view = ACL::is_allowed("applicant/view");
$can_delete = ACL::is_allowed("applicant/delete");
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
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="custom" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Applicant</h4>
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
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div  id="page-report-body" class="">
                            <div class="detail-list td-name">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Name
                                    </div>
                                    <div class="col-sm-9">
                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['name']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("applicant/editfield/" . urlencode($data['id'])); ?>" 
                                            data-name="name" 
                                            data-title="Enter Name" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="text" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" <?php } ?>>
                                            <?php echo $data['name']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-birth_date">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Birth Date
                                    </div>
                                    <div class="col-sm-9">
                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['birth_date']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("applicant/editfield/" . urlencode($data['id'])); ?>" 
                                            data-name="birth_date" 
                                            data-title="Enter Age" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="text" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" <?php } ?>>
                                            <?php echo $data['birth_date']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-phone">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Phone
                                    </div>
                                    <div class="col-sm-9">
                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['phone']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("applicant/editfield/" . urlencode($data['id'])); ?>" 
                                            data-name="phone" 
                                            data-title="Enter Phone number" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="text" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" <?php } ?>>
                                            <?php echo $data['phone']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-gender">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Gender
                                    </div>
                                    <div class="col-sm-9">
                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $sex); ?>' 
                                            data-value="<?php echo $data['gender']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("applicant/editfield/" . urlencode($data['id'])); ?>" 
                                            data-name="gender" 
                                            data-title="Enter Gender" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="radiolist" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" <?php } ?>>
                                            <?php echo $data['gender']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-email">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Email
                                    </div>
                                    <div class="col-sm-9">
                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['email']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("applicant/editfield/" . urlencode($data['id'])); ?>" 
                                            data-name="email" 
                                            data-title="Enter Email" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="email" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" <?php } ?>>
                                            <?php echo $data['email']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-description">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Description
                                    </div>
                                    <div class="col-sm-9">
                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['description']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("applicant/editfield/" . urlencode($data['id'])); ?>" 
                                            data-name="description" 
                                            data-title="Enter Related Information" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="text" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" <?php } ?>>
                                            <?php echo $data['description']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-property_name">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Property Name
                                    </div>
                                    <div class="col-sm-9">
                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['property_name']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("applicant/editfield/" . urlencode($data['id'])); ?>" 
                                            data-name="property_name" 
                                            data-title="Enter Property Name" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="text" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" <?php } ?>>
                                            <?php echo $data['property_name']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-house_name">
                                <div class="row">
                                    <div class="col-sm-3">
                                        House Name
                                    </div>
                                    <div class="col-sm-9">
                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['house_name']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("applicant/editfield/" . urlencode($data['id'])); ?>" 
                                            data-name="house_name" 
                                            data-title="Enter House Name" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="text" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" <?php } ?>>
                                            <?php echo $data['house_name']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-pdf">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa fa-cloud-download "></i> Pdf
                                    </div>
                                    <div class="col-sm-9">
                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['pdf']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("applicant/editfield/" . urlencode($data['id'])); ?>" 
                                            data-name="pdf" 
                                            data-title="Browse..." 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="text" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" <?php } ?>>
                                            <?php echo $data['pdf']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-date_applied">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Date Applied
                                    </div>
                                    <div class="col-sm-9">
                                        <?php echo $data['date_applied']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-list td-photo">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Photo
                                    </div>
                                    <div class="col-sm-9">
                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['photo']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("applicant/editfield/" . urlencode($data['id'])); ?>" 
                                            data-name="photo" 
                                            data-title="Browse..." 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="text" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" <?php } ?>>
                                            <?php echo $data['photo']; ?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3">
                            <?php if($can_edit){ ?>
                            <a class="btn btn-sm btn-info"  href="<?php print_link("applicant/edit/$rec_id"); ?>">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <?php } ?>
                            <?php if($can_delete){ ?>
                            <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("applicant/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="confirm">
                                <i class="fa fa-times"></i> Delete
                            </a>
                            <?php } ?>
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
