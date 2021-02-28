<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 ><?php print_lang('the_dashboard'); ?></h4>
                </div>
                <div class="col-md-6 comp-grid">
                    <a  class="btn btn-primary" href="<?php print_link("landlord") ?>">
                        <?php print_lang('landlord'); ?> 
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
