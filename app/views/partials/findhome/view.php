<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("findhome/add");
$can_edit = ACL::is_allowed("findhome/edit");
$can_view = ACL::is_allowed("findhome/view");
$can_delete = ACL::is_allowed("findhome/delete");
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
                    <h4 class="record-title">View  Findhome</h4>
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
                        $rec_id = (!empty($data['']) ? urlencode($data['']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-flocation">
                                        <th class="title"> Flocation: </th>
                                        <td class="value"> <?php echo $data['flocation']; ?></td>
                                    </tr>
                                    <tr  class="td-fbeds">
                                        <th class="title"> Fbeds: </th>
                                        <td class="value"> <?php echo $data['fbeds']; ?></td>
                                    </tr>
                                    <tr  class="td-fbaths">
                                        <th class="title"> Fbaths: </th>
                                        <td class="value"> <?php echo $data['fbaths']; ?></td>
                                    </tr>
                                    <tr  class="td-fprice">
                                        <th class="title"> Fprice: </th>
                                        <td class="value"> <?php echo $data['fprice']; ?></td>
                                    </tr>
                                    <tr  class="td-frent">
                                        <th class="title"> Frent: </th>
                                        <td class="value"> <?php echo $data['frent']; ?></td>
                                    </tr>
                                    <tr  class="td-lid">
                                        <th class="title"> Lid: </th>
                                        <td class="value"> <?php echo $data['lid']; ?></td>
                                    </tr>
                                    <tr  class="td-lname">
                                        <th class="title"> Lname: </th>
                                        <td class="value"> <?php echo $data['lname']; ?></td>
                                    </tr>
                                    <tr  class="td-lphoto">
                                        <th class="title"> Lphoto: </th>
                                        <td class="value"> <?php echo $data['lphoto']; ?></td>
                                    </tr>
                                    <tr  class="td-lphone">
                                        <th class="title"> Lphone: </th>
                                        <td class="value"> <?php echo $data['lphone']; ?></td>
                                    </tr>
                                    <tr  class="td-pname">
                                        <th class="title"> Pname: </th>
                                        <td class="value"> <?php echo $data['pname']; ?></td>
                                    </tr>
                                    <tr  class="td-paddress">
                                        <th class="title"> Paddress: </th>
                                        <td class="value"> <?php echo $data['paddress']; ?></td>
                                    </tr>
                                    <tr  class="td-pdesc">
                                        <th class="title"> Pdesc: </th>
                                        <td class="value"> <?php echo $data['pdesc']; ?></td>
                                    </tr>
                                    <tr  class="td-plid">
                                        <th class="title"> Plid: </th>
                                        <td class="value"> <?php echo $data['plid']; ?></td>
                                    </tr>
                                    <tr  class="td-pphoto">
                                        <th class="title"> Pphoto: </th>
                                        <td class="value"> <?php echo $data['pphoto']; ?></td>
                                    </tr>
                                    <tr  class="td-pkey">
                                        <th class="title"> Pkey: </th>
                                        <td class="value"> <?php echo $data['pkey']; ?></td>
                                    </tr>
                                    <tr  class="td-mlid">
                                        <th class="title"> Mlid: </th>
                                        <td class="value"> <?php echo $data['mlid']; ?></td>
                                    </tr>
                                    <tr  class="td-mhsname">
                                        <th class="title"> Mhsname: </th>
                                        <td class="value"> <?php echo $data['mhsname']; ?></td>
                                    </tr>
                                    <tr  class="td-include">
                                        <th class="title"> Include: </th>
                                        <td class="value"> <?php echo $data['include']; ?></td>
                                    </tr>
                                    <tr  class="td-mdesc">
                                        <th class="title"> Mdesc: </th>
                                        <td class="value"> <?php echo $data['mdesc']; ?></td>
                                    </tr>
                                    <tr  class="td-mpay">
                                        <th class="title"> Mpay: </th>
                                        <td class="value"> <?php echo $data['mpay']; ?></td>
                                    </tr>
                                    <tr  class="td-mphoto">
                                        <th class="title"> Mphoto: </th>
                                        <td class="value"> <?php echo $data['mphoto']; ?></td>
                                    </tr>
                                    <tr  class="td-propname">
                                        <th class="title"> Propname: </th>
                                        <td class="value"> <?php echo $data['propname']; ?></td>
                                    </tr>
                                    <tr  class="td-occupation">
                                        <th class="title"> Occupation: </th>
                                        <td class="value"> <?php echo $data['occupation']; ?></td>
                                    </tr>
                                    <tr  class="td-mbeds">
                                        <th class="title"> Mbeds: </th>
                                        <td class="value"> <?php echo $data['mbeds']; ?></td>
                                    </tr>
                                    <tr  class="td-mbaths">
                                        <th class="title"> Mbaths: </th>
                                        <td class="value"> <?php echo $data['mbaths']; ?></td>
                                    </tr>
                                    <tr  class="td-mrtype">
                                        <th class="title"> Mrtype: </th>
                                        <td class="value"> <?php echo $data['mrtype']; ?></td>
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
