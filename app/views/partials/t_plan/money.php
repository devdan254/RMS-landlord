 
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
              <form class="form-horizontal" action="<?php
    $this->load_view('t_plan/view.php'); 
  ?>" >
                <div class="card-body">
                  <div class="form-group row">
                   
                    <div class="col-sm-8 mx-auto">
                      <select class="form-control " id="mySelect" onchange="myFunction()">
                          <option selected="" disabled>Choose Plan</option>
                          <option value="2">STARDARD</option>
                          <option value="3">ADVANCED</option>
                          <option value="4">PREMIUM</option>
                          
                        </sel
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
                  <button type="submit" class="btn btn-info float-right">CONTINUE</button>
                  
                  
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
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
</script>