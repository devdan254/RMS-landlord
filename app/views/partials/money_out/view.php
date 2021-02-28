<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("money_out/add");
$can_edit = ACL::is_allowed("money_out/edit");
$can_view = ACL::is_allowed("money_out/view");
$can_delete = ACL::is_allowed("money_out/delete");
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
                    <h4 class="record-title">View  Money Out</h4>
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
                        $rec_id = (!empty($data['landlod_id']) ? urlencode($data['landlod_id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-landlod_id">
                                        <th class="title"> Landlod Id: </th>
                                        <td class="value"> <?php echo $data['landlod_id']; ?></td>
                                    </tr>
                                    <tr  class="td-main_out_category">
                                        <th class="title"> Main Out Category: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['main_out_category']; ?>" 
                                                data-pk="<?php echo $data['landlod_id'] ?>" 
                                                data-url="<?php print_link("money_out/editfield/" . urlencode($data['landlod_id'])); ?>" 
                                                data-name="main_out_category" 
                                                data-title="Enter Main Out Category" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['main_out_category']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-category">
                                        <th class="title"> Category: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['category']; ?>" 
                                                data-pk="<?php echo $data['landlod_id'] ?>" 
                                                data-url="<?php print_link("money_out/editfield/" . urlencode($data['landlod_id'])); ?>" 
                                                data-name="category" 
                                                data-title="Enter Category" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['category']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-date">
                                        <th class="title"> Date: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['date']; ?>" 
                                                data-pk="<?php echo $data['landlod_id'] ?>" 
                                                data-url="<?php print_link("money_out/editfield/" . urlencode($data['landlod_id'])); ?>" 
                                                data-name="date" 
                                                data-title="Enter Date" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['date']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amount">
                                        <th class="title"> Amount: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amount']; ?>" 
                                                data-pk="<?php echo $data['landlod_id'] ?>" 
                                                data-url="<?php print_link("money_out/editfield/" . urlencode($data['landlod_id'])); ?>" 
                                                data-name="amount" 
                                                data-title="Enter Amount" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amount']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-pay_to">
                                        <th class="title"> Pay To: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['pay_to']; ?>" 
                                                data-pk="<?php echo $data['landlod_id'] ?>" 
                                                data-url="<?php print_link("money_out/editfield/" . urlencode($data['landlod_id'])); ?>" 
                                                data-name="pay_to" 
                                                data-title="Enter Pay To" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['pay_to']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-details">
                                        <th class="title"> Details: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['details']; ?>" 
                                                data-pk="<?php echo $data['landlod_id'] ?>" 
                                                data-url="<?php print_link("money_out/editfield/" . urlencode($data['landlod_id'])); ?>" 
                                                data-name="details" 
                                                data-title="Enter Details" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['details']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-file">
                                        <th class="title"> File: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['file']; ?>" 
                                                data-pk="<?php echo $data['landlod_id'] ?>" 
                                                data-url="<?php print_link("money_out/editfield/" . urlencode($data['landlod_id'])); ?>" 
                                                data-name="file" 
                                                data-title="Browse..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['file']; ?> 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("money_out/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("money_out/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
