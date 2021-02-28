<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("my_houses/add");
$can_edit = ACL::is_allowed("my_houses/edit");
$can_view = ACL::is_allowed("my_houses/view");
$can_delete = ACL::is_allowed("my_houses/delete");
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
                    <h4 class="record-title">View  My Houses</h4>
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
                        $rec_id = (!empty($data['house_id']) ? urlencode($data['house_id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-house_name">
                                        <th class="title"> House Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['house_name']; ?>" 
                                                data-pk="<?php echo $data['house_id'] ?>" 
                                                data-url="<?php print_link("my_houses/editfield/" . urlencode($data['house_id'])); ?>" 
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
                                        </td>
                                    </tr>
                                    <tr  class="td-inclusives">
                                        <th class="title"> Inclusives: </th>
                                        <td class="value">
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("inclusives/view/" . urlencode($data['inclusives'])) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['inclusives_inclusives'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <div><?php echo $data['description']; ?></div>
                                    <tr  class="td-rent_amount">
                                        <th class="title"> Rent Amount: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['rent_amount']; ?>" 
                                                data-pk="<?php echo $data['house_id'] ?>" 
                                                data-url="<?php print_link("my_houses/editfield/" . urlencode($data['house_id'])); ?>" 
                                                data-name="rent_amount" 
                                                data-title="Enter Rent Amount" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['rent_amount']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-photos">
                                        <th class="title"> Photos: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['photos']; ?>" 
                                                data-pk="<?php echo $data['house_id'] ?>" 
                                                data-url="<?php print_link("my_houses/editfield/" . urlencode($data['house_id'])); ?>" 
                                                data-name="photos" 
                                                data-title="Browse..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['photos']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-address">
                                        <th class="title"> Address: </th>
                                        <td class="value"> <?php echo $data['address']; ?></td>
                                    </tr>
                                    <tr  class="td-property_name">
                                        <th class="title"> Property Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/my_houses_property_name_option_list'); ?>' 
                                                data-value="<?php echo $data['property_name']; ?>" 
                                                data-pk="<?php echo $data['house_id'] ?>" 
                                                data-url="<?php print_link("my_houses/editfield/" . urlencode($data['house_id'])); ?>" 
                                                data-name="property_name" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="selectize" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable selectize" <?php } ?>>
                                                <?php echo $data['property_name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-occupation">
                                        <th class="title"> Occupation: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $occupation); ?>' 
                                                data-value="<?php echo $data['occupation']; ?>" 
                                                data-pk="<?php echo $data['house_id'] ?>" 
                                                data-url="<?php print_link("my_houses/editfield/" . urlencode($data['house_id'])); ?>" 
                                                data-name="occupation" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['occupation']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-login_id">
                                        <th class="title"> Login Id: </th>
                                        <td class="value"> <?php echo $data['login_id']; ?></td>
                                    </tr>
                                    <tr  class="td-login_user_name">
                                        <th class="title"> Login User Name: </th>
                                        <td class="value"> <?php echo $data['login_user_name']; ?></td>
                                    </tr>
                                    <tr  class="td-login_email">
                                        <th class="title"> Login Email: </th>
                                        <td class="value"> <?php echo $data['login_email']; ?></td>
                                    </tr>
                                    <tr  class="td-login_password">
                                        <th class="title"> Login Password: </th>
                                        <td class="value"> <?php echo $data['login_password']; ?></td>
                                    </tr>
                                    <tr  class="td-login_photo">
                                        <th class="title"> Login Photo: </th>
                                        <td class="value"> <?php echo $data['login_photo']; ?></td>
                                    </tr>
                                    <tr  class="td-login_phone">
                                        <th class="title"> Login Phone: </th>
                                        <td class="value"> <?php echo $data['login_phone']; ?></td>
                                    </tr>
                                    <tr  class="td-login_national_id">
                                        <th class="title"> Login National Id: </th>
                                        <td class="value"> <?php echo $data['login_national_id']; ?></td>
                                    </tr>
                                    <tr  class="td-beds">
                                        <th class="title"> Beds: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $beds); ?>' 
                                                data-value="<?php echo $data['beds']; ?>" 
                                                data-pk="<?php echo $data['house_id'] ?>" 
                                                data-url="<?php print_link("my_houses/editfield/" . urlencode($data['house_id'])); ?>" 
                                                data-name="beds" 
                                                data-title="Enter Beds" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['beds']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-baths">
                                        <th class="title"> Baths: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $baths); ?>' 
                                                data-value="<?php echo $data['baths']; ?>" 
                                                data-pk="<?php echo $data['house_id'] ?>" 
                                                data-url="<?php print_link("my_houses/editfield/" . urlencode($data['house_id'])); ?>" 
                                                data-name="baths" 
                                                data-title="Enter Baths" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['baths']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-rent_type">
                                        <th class="title"> Rent Type: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $rent_type); ?>' 
                                                data-value="<?php echo $data['rent_type']; ?>" 
                                                data-pk="<?php echo $data['house_id'] ?>" 
                                                data-url="<?php print_link("my_houses/editfield/" . urlencode($data['house_id'])); ?>" 
                                                data-name="rent_type" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['rent_type']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-date">
                                        <th class="title"> Date: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['date']; ?>" 
                                                data-pk="<?php echo $data['house_id'] ?>" 
                                                data-url="<?php print_link("my_houses/editfield/" . urlencode($data['house_id'])); ?>" 
                                                data-name="date" 
                                                data-title="Enter Date" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['date']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-save"></i> Export
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
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("my_houses/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("my_houses/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
