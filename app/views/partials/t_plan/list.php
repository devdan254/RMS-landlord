<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("t_plan/add");
$can_edit = ACL::is_allowed("t_plan/edit");
$can_view = ACL::is_allowed("t_plan/view");
$can_delete = ACL::is_allowed("t_plan/delete");
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
                <div class="col-md-4 comp-grid">
                    <h4 class="text-center ">PAYMENT PLAN</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="m-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 comp-grid">
                    <div class=""> 
                        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                            <link rel="stylesheet" href="assets\css\adminlte.min.css">
                                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                        <!-- /.card --><div>
                                            <!-- Horizontal Form -->
                                            <div class="card card-info">
                                                <div class="card-header justify-content-center">
                                                    <h3 class="card-title  d-block">Choose your plan</h3>
                                                    <br>
                                                        <p class=" mx-auto d-block text-dark" style="padding-bottom:-5px;margin-bottom:-7px;">Get access to more features</p>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <!-- form start -->
                                                    <form class="form-horizontal" action="app/views/partials/t_plan/list.php" method="post">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <div class="col-sm-8 mx-auto">
                                                                    <select class="form-control " id="mySelect" onchange="myFunction()" name="plan">
                                                                        <option selected="" disabled>Choose Plan</option>
                                                                        <option value="2">STARDARD</option>
                                                                        <option value="3">ADVANCED</option>
                                                                        <option value="4">PREMIUM</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mx-auto">
                                                                <!-- radio -->
                                                                <div class="form-group ">
                                                                    <div class="form-check d-block">
                                                                        <input class="form-check-input" type="radio" name="radio1">
                                                                            <label class="form-check-label"><b><span class="text-success"><strong>Monthly</strong></span></b>
                                                                            </label>
                                                                        <p class="ml-1 " style="margin-top:-5px;padding-top:-3px" > <i>Ksh <span id="demo"></span></i></span></p>
                                                                    </div>
                                                                    <div class="form-check " style="position:relative;top:-6px;">
                                                                        <input class="form-check-input" type="radio" name="radio1">
                                                                            <label class="form-check-label"><b><span class="text-success"><strong>Annual</strong></span></b>
                                                                            </label>
                                                                        <p class="ml-1 " style="margin-top:-5px;padding-top:-3px" > <i>Ksh <span id="demo12"></span></i></span></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                        <div class="card-footer">
                                                            <button type="reset" class="btn btn-default ">Cancel</button>
                                                            <button type="submit" class="btn btn-info float-right" name="submit">CONTINUE</button>
                                                        </div>
                                                        <!-- /.card-footer -->
                                                    </form>
                                                </div>
                                                <!-- /.card -->
                                                <?php
                                                if(isset($_POST['submit'])){
                                                echo $_POST['plan'];
                                                }
                                                ?>
                                            </div>
                                            <script>
                                                function myFunction() {
                                                var x = document.getElementById("mySelect").value;
                                                if(x = 2){
                                                document.getElementById("demo").innerHTML = 300;
                                                document.getElementById("demo12").innerHTML = 300*10;
                                                }
                                                else if (x = 3){
                                                document.getElementById("demo").innerHTML = 500;
                                                document.getElementById("demo12").innerHTML = 500*10;
                                                }
                                                else if (x = 4){
                                                document.getElementById("demo").innerHTML = 700;
                                                document.getElementById("demo12").innerHTML = 700*10;
                                                }
                                                }
                                            </script></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div  class="">
                                <div class="container-fluid">
                                    <div class="row ">
                                        <div class="col-md-12 comp-grid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
