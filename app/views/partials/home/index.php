<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-6 col-sm-12  col-xs-12 ">
                    <div class="">
                        <div class="card justify-content-center">
                            <div class="card-header">
                                <div>
                                    <h4 class="text-dark">Quick Buttons 
                                        <span class="justify-content-end float-right">
                                            <i class="fa fa-arrows"></i>  
                                        </span>
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless table-responsive .example">
                                    <tbody>
                                        <tr style="width:100%" class="mt-3">
                                            <td style="width:33%">
                                                <span>
                                                    <span class="ml-4 text-warning"><i class="fa fa-money fa-3x"></i></span>
                                                    <br>
                                                        <a href="#" class="col-sm-4 col-md-4 col-lg-auto   mt-6 mx-auto" style="font-size:15px;width:100%;font-family:sans;color:grey;"><span class="pl-2">ADD NEW</span><br><span class=" pl-3" style="position:relative;top:-4px;left:1px;">EXPENSE</span></a>
                                                        </span>
                                                    </td>
                                                    <td style="width:33%">
                                                        <span>
                                                            <span class="ml-4 text-success"><i class="fa fa-user-plus fa-3x"></i></span>
                                                            <br>
                                                                <a href="#" class="col-sm-4 col-md-4 col-lg-auto   mt-6 mx-auto" style="font-size:15px;width:100%;font-family:sans;color:grey;"><span class="pl-2">ADD NEW</span><br><span class="pt-0 pl-3" style="position:relative;top:-4px;left:1px;">TENANT</span></a>
                                                                </span>
                                                            </td>
                                                            <td style="width:33%">
                                                                <span>
                                                                    <span class="ml-4 text-dark"><i class="fa fa-home fa-3x"></i></span>
                                                                    <br>
                                                                        <a href="#" class="col-sm-4 col-md-4 col-lg-auto   mt-6 mx-auto" style="font-size:15px;width:100%;font-family:sans;color:grey;">ADD NEW<br><span class="pt-0 pl-2" style="position:relative;top:-4px;left:1px;">PROPERTY</span></a>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="invisible" style="height:5px;">
                                                                    <td>Mary</td>
                                                                    <td>Moe</td>
                                                                    <td>mary@example.com</td>
                                                                </tr> 
                                                            </tbody>
                                                        </table>   
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12  col-xs-12 comp-grid">
                                            <div class=""><div class="card justify-content-center">
                                                <div class="card-header">
                                                    <div>
                                                        <h4 class="text-dark">MY HOUSES
                                                            <span class="justify-content-end float-right">
                                                                <i class="fa fa-arrows "></i>  
                                                            </span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="card-body" style="width:auto ; height:195px;" id="piechart">
                                                </div>
                                            </div>
                                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                            <script>
                                                google.charts.load('current', {'packages':['corechart']});
                                                google.charts.setOnLoadCallback(drawChart);
                                                function drawChart() {
                                                var data = google.visualization.arrayToDataTable([
                                                ['LANDLORD', 'INFORMATION'],
                                                ['Tenants',     <?php echo "11";   ?>],
                                                ['PROPERTY',      2],
                                                ['HOUSES',  5],
                                                ['APPLICANTS', 2],
                                                ]);
                                                var options = {
                                                // title: 'My Daily Activities'
                                                };
                                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                                chart.draw(data, options);
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="p-3 mb-3">
                            <div class="container-fluid">
                                <div class="row ">
                                    <div class="col-sm-6 col-md-3 col-lg-3 col-xs-12 comp-grid">
                                        <?php $rec_count = $comp_model->getcount_houses();  ?>
                                        <a class="animated zoomIn record-count card bg-primary card-white"  href="<?php print_link("my_houses/") ?>">
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="fa fa-building-o fa-2x"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="flex-column justify-content align-center">
                                                        <div class="title">HOUSES</div>
                                                        <small class="">Total Houses</small>
                                                    </div>
                                                </div>
                                                <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-3 col-lg-3 col-xs-12 comp-grid">
                                        <?php $rec_count = $comp_model->getcount_tenants();  ?>
                                        <a class="animated zoomIn record-count card bg-success text-white"  href="<?php print_link("my_tenants/") ?>">
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="fa fa-users fa-2x"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="flex-column justify-content align-center">
                                                        <div class="title">TENANTS</div>
                                                        <small class="">Total Tenants</small>
                                                    </div>
                                                </div>
                                                <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-3 col-lg-3 col-xs-12 comp-grid">
                                        <?php $rec_count = $comp_model->getcount_applicants();  ?>
                                        <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("applicant/") ?>">
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="fa fa-user-plus fa-2x"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="flex-column justify-content align-center">
                                                        <div class="title">APPLICANTS</div>
                                                        <small class="">Pending Applicantions</small>
                                                    </div>
                                                </div>
                                                <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-3 col-lg-3 col-xs-12 comp-grid">
                                        <?php $rec_count = $comp_model->getcount_invoices();  ?>
                                        <a class="animated zoomIn record-count card bg-danger text-white"  href="<?php print_link("payment/") ?>">
                                            <div class="row">
                                                <div class="col-2">
                                                    <i class="fa fa-money fa-2x"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="flex-column justify-content align-center">
                                                        <div class="title">INVOICES</div>
                                                        <small class="">Invoices Made </small>
                                                    </div>
                                                </div>
                                                <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="p-3 mb-3">
                            <div class="container-fluid">
                                <div class="row ">
                                    <div class="col-12 comp-grid">
                                        <div class=""><link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                            <link rel="stylesheet" href="assets\css\adminlte.min.css">
                                                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                                                    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                                                        <div class="row">
                                                            <?php
                                                            $conn=mysqli_connect("localhost","root","","rms");
                                                            $user=USER_ID;
                                                            ?>
                                                            <?php
                                                            //removed
                                                            $y=strtotime("next year");
                                                            $year=date("Y-12-31",$y);
                                                            $sql=mysqli_query($conn,"select SUM(Amount) as annual_rent,date from payment where date<='$year' and landlod_id='$user'");
                                                            while($row=mysqli_fetch_array($sql)){
                                                            if(!empty($row['annual_rent'])){
                                                            $annual_rent=$row['annual_rent'];
                                                            }else{
                                                            $annual_rent=0;
                                                            }
                                                            }
                                                            ?>
                                                            <!-- /.col -->
                                                            <div class="col-md-3 col-lg-3 col-sm-12">
                                                                <div class="info-box bg-gradient-success">
                                                                    <span class="info-box-icon"><i class="fa fa-briefcase"></i></span>
                                                                    <div class="info-box-content">
                                                                        <span class="info-box-text"><b>ANNUAL RENT</b></span>
                                                                        <span class="info-box-number">Ksh <?php echo number_format($annual_rent, 2, '.', ', '); ?></span>
                                                                        <div class="progress">
                                                                            <div class="progress-bar" style="width:100%"></div>
                                                                        </div>
                                                                        <span class="progress-description">
                                                                            Annual Rent Collected
                                                                        </span>
                                                                    </div>
                                                                </div></div>
                                                                <!-- /.info-box-content -->
                                                                <!-- /.col -->
                                                                <div class="col-md-3 col-lg-3 col-sm-12 ">
                                                                    <div class="info-box bg-gradient-danger">
                                                                        <span class="info-box-icon"><i class="fa fa-database"></i></span>
                                                                        <div class="info-box-content">
                                                                            <?php
                                                                            //removed
                                                                            $y=strtotime("this month ");
                                                                            $month=date("Y-m-d",$y);
                                                                            $sql=mysqli_query($conn,"select SUM(Amount) as monthly_rent,date from payment where date<='$month' and landlod_id='". USER_ID . "' ");
                                                                            while($row=mysqli_fetch_assoc($sql)){
                                                                            if(!empty($row['monthly_rent'])){
                                                                            $monthly_rent=$row['monthly_rent'];
                                                                            }else{
                                                                            $monthly_rent=0;
                                                                            }
                                                                            }
                                                                            ?>
                                                                            <span class="info-box-text"><b>MONTHLY RENT</b></span>
                                                                            <span class="info-box-number">Ksh <?php echo number_format($monthly_rent, 2, '.', ', ') ?></span>
                                                                            <?php
                                                                            $y=strtotime("this month ");
                                                                            $month=date("Y-m-d",$y);
                                                                            $sql=mysqli_query($conn,"select SUM(rent_amount) as occupation_rent FROM my_houses where occupation='Occupied' and landlod_id='". USER_ID . "'");
                                                                            while($row=mysqli_fetch_array($sql)){
                                                                            $occupation_rent=$row['occupation_rent'];
                                                                            }
                                                                            ?>
                                                                            <div class="progress">
                                                                                <div class="progress-bar" style="width:100%"></div>
                                                                            </div>
                                                                            <span class="progress-description">
                                                                                Monthly Rent Received
                                                                            </span>
                                                                        </div>
                                                                    </div></div>
                                                                    <!-- /.info-box-content -->
                                                                    <!-- /.col -->
                                                                    <div class="col-md-3 col-lg-3 col-sm-12 ">
                                                                        <div class="info-box bg-gradient-info">
                                                                            <span class="info-box-icon"><i class="fa fa-exclamation-triangle"></i></span>
                                                                            <div class="info-box-content">
                                                                                <span class="info-box-text"><b>OVERDUE</b></span>
                                                                                <span class="info-box-number">
                                                                                    Ksh <?php echo $occupation_rent-$monthly_rent  ?>
                                                                                </span>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar" style="width:100%"></div>
                                                                                </div>
                                                                                <span class="progress-description">
                                                                                    Total Amount Pending
                                                                                </span>
                                                                            </div>
                                                                        </div></div>
                                                                        <!-- /.info-box-content -->
                                                                        <!-- /.col -->
                                                                        <div class="col-md-3 col-lg-3 col-sm-12 ">
                                                                            <div class="info-box bg-gradient-warning">
                                                                                <span class="info-box-icon"><i class="fa fa-home"></i></span>
                                                                                <?php
                                                                                $sql=mysqli_query($conn,"select SUM(rent_amount) as no_rent FROM my_houses where occupation='Empty'  and landlod_id='". USER_ID . "'");
                                                                                while($row=mysqli_fetch_assoc($sql)){
                                                                                $no_rent=$row['no_rent'];
                                                                                }
                                                                                ?>
                                                                                <?php
                                                                                $sql=mysqli_query($conn,"select count(house_id) as rent FROM my_houses where landlod_id='". USER_ID ."'");
                                                                                while($row=mysqli_fetch_array($sql)){
                                                                                $rent=$row['rent'];
                                                                                }
                                                                                ?>
                                                                                <div class="info-box-content">
                                                                                    <span class="info-box-text"><b>VACANT UNITS</b></span>
                                                                                    <span class="info-box-number"><?php if(!empty($no_rent)){echo $no_rent;}else{echo 0;}  ?></span>
                                                                                    <div class="progress">
                                                                                        <div class="progress-bar" style="width:100%"></div>
                                                                                    </div>
                                                                                    <span class="progress-description">
                                                                                        Total Vacant Units
                                                                                    </span>
                                                                                </div>
                                                                            </div></div>
                                                                            <!-- /.info-box-content -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
