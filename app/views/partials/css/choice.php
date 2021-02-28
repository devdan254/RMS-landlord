 
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="adminlte.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <!-- /.card --><div class="col-5 mx-auto">
            <!-- Horizontal Form -->
            <div class="card card-success">
              <div class="card-header justify-content-center w3-card">
                <h3 class="card-title  d-block "><b>PAYMENT MODE</b></h3>
                <br>
                <p class=" mx-auto d-block text-dark" style="padding-bottom:-5px;margin-bottom:-7px;">Pay easily for your plan</p>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body ">
                  <!--this indicates the form for paypal-->    
                       
                  <form action="" method="post" name="frmPayPal1" class="col-5 d-block mx-auto" >
					<div class="panel price panel-red">
						    <input type="hidden" name="business" value="<?php echo $paypalId; ?>">
						    <input type="hidden" name="cmd" value="_xclick">
						    <input type="hidden" name="item_name" value="It Solution Stuff">
						    <input type="hidden" name="item_number" value="2">
						    <input type="hidden" name="amount" value="20">
						    <input type="hidden" name="no_shipping" value="1">
						    <input type="hidden" name="currency_code" value="USD">
						    <input type="hidden" name="cancel_return" value="http://demo.itsolutionstuff.com/paypal/cancel.php">
						    <input type="hidden" name="return" value="http://demo.itsolutionstuff.com/paypal/success.php">  
						
						
						<div id="paypal-button-container"></div>
						
  									<button type="submit" name="paypal" class="p-2 w3-card-4 w3-round-large col-10"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" border="0" alt="PayPal Logo"></button>

						
					</div>
    			</form>
    			
    			
    			
    			<form action="pesapal-iframe.php" method="post"  class="col-5 d-block mx-auto my-3">
	<table class="d-none">
		<tr>
			<td>Amount:</td>
			<td><input type="text" name="amount" value="50" />
			(in Kshs)
			</td>
		</tr>
		<tr>
			<td>Type:</td>
			<td><input type="text" name="type" value="MERCHANT" readonly="readonly" />
			(leave as default - MERCHANT)
			</td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><input type="text" name="description" value="Order Description" /></td>
		</tr>
		<tr>
			<td>Reference:</td>
			<td><input type="text" name="reference" value="001" />
			(the Order ID )
			</td>
		</tr>
		<tr>
			<td>Shopper's First Name:</td>
			<td><input type="text" name="first_name" value="John" /></td>
		</tr>
		<tr>
			<td>Shopper's Last Name:</td>
			<td><input type="text" name="last_name" value="Doe" /></td>
		</tr>
		<tr>
			<td>Shopper's Email Address:</td>
			<td><input type="text" name="email" value="john@yahoo.com" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Make Payment" /></td>
		</tr>
	</table>
	<button type="submit" name="" class="p-2 w3-card-4 w3-round-large col-10"><span style="color:#4285F4;font-size:21px;font-family:verdana"><b>Pesa</b></span><span   style="color:#EA4335;font-size:19px"><b>Pal</b></span></button>

	
</form>
 <div class="payform">
        <form class="form col-5 d-block mx-auto mb-2">
            
            <div id="response"></div>
            <div class="d-none">
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="number" class="form-control" id="phone" aria-describedby="numberHelp" required>
                <small id="number" class="form-text text-muted">We will send an M-PESA Payment request to this
                    number</small>
            </div>
            <div class="form-group">
                <label for="phone">Account Number</label>
                <input type="text" class="form-control" id="account" aria-describedby="accountHelp" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" required>
            </div>
            </div>
            <button id="pay" type="submit" class="btn  form-control"><img src="https://i0.wp.com/techmoran.com/wp-content/uploads/2017/06/mpesa.png?resize=518%2C375&ssl=1" border="0" alt="PayPal Logo" style="width:135px;height:55px;position:relative;right:15px"></button>
        </form>
                </div>
                <!-- /.card-body -->
               
             
            </div>
            <!-- /.card -->
            
            </div>
         <button class="btn btn-info text-light p-3 col-3 mx-auto mt-3" <?php echo $_SERVER['HTTP_REFERER']; ?> > GO BACK </button>
         
         <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        $(() => {
            'use strict'

            $("#pay").click((ev) => {
                ev.preventDefault()
                $("#response").html("")
                var phone, amount, account;
                phone = $("#phone").val(), amount = $("#amount").val(), account = $("#account").val()

                if (!phone || !amount) {
                    $("#response").html("<p class='alert alert-danger'>Phone and amount must be entered before you proceed.</p>")
                    return
                }

                swal.showLoading()

                $.ajax({
                    method: "POST",
                    url: '../secure/lnmo.php',
                    data: JSON.stringify({ PartyA: phone, PhoneNumber: phone, Amount: amount, AccountReference:  account}),
                    dataType: 'json',
                    contentType: 'application/json',
                    success: (response_) => {
                        swal.hideLoading()
                        console.log(response_)

                    //    const { _error: errorMessage, _response: ResponseDescription } = response_
                    //    console.log(_error)
                    //    console.log(_response)

                        if(response_.ResponseCode == 0){
                            swal.fire('Payment Request Sent', response_.ResponseDescription, 'success')
                        } else {
                            swal.fire('Ops!', response_.errorMessage, 'error')
                        }
                    },
                    error: (error_) => {
                        swal.hideLoading()
                        console.log(error_)
                        swal.fire('Error!', 'A server error occured.', 'error')
                    }
                })



            })

            console.log("JQuery Loaded")

        })
    </script> 