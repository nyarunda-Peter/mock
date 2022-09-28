<HTML>
<HEAD>
<TITLE>User Registration</TITLE>
<link rel="stylesheet" href=".\assets\css\bootstrap5.min.css">
<link rel="stylesheet" href=".\assets\css\custom.css">
<link href="./view/css/style.css" type="text/css" rel="stylesheet" />
<link href="./view/css/user-registration.css" type="text/css" rel="stylesheet" />

</HEAD>
<BODY>
	<div class="py-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-5">
					<div class="card">
						<div class="card-header text-center">
							<h4>Registeration</h4>
						</div>
						<div class="card-body">
						<form name="sign-up" action="" method="post" onsubmit="return Validate();">
							<div class="demo-table">
							
								<?php
									if (! empty($registrationResponse["status"])) {
										?>
													<?php
										if ($registrationResponse["status"] == "error") {
											?>
													<div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
													<?php
										} else if ($registrationResponse["status"] == "success") {
											?>
													<div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
													<?php
										}
										?>
												<?php
									}
								?>
								<div class="error-msg" id="error-msg"></div>
								<!-- User Names Fields -->
								<div class = "field-column">
									<div class="form-group row mb-6">
										<div class="col">
											<label for="firstname">Firstname:</label> <span class="error-info" id="firstname-info"></span>
											<input name="firstname" id="fname" class="demo-input-box form-control" type="text">
										</div>
										<div class="col">
											<label for="lastname">Lastname: </label> <span class="required error" id="lastname-info"></span>
											<input  name="lastname" id="lastname" class="demo-input-box form-control" type="text" name="lastname" id="lastname" >
										</div>
									</div>
								</div>

								<!-- Email Address Field-->
								<div class = "field-column">
									<div class="form-group row mb-6">
										<label for="email"> Email:<span class="error-info" id="email-info"></span>
										<input name="email" id="email" class="demo-input-box form-control" type="email">
									</div>
								</div>
								
								<!-- Phone Number Field -->
								<div class = "field-column">
									<div class="form-group row mb-6 ">
										<label for="phone">Phone: </label> <span class="error-info" id="phone-info"></span>
										<input name="phone" id="phone" class="demo-input-box form-control" type="text">
									</div>
								</div>
								
								<!-- Password Field -->
								<div class = "field-column">
									<div class="form-group row mb-6">
										<div class="col">
											<label for="password">Password:</label> <span class="error-info" id="password-info"></span>
											<input name="password" id="password" class="demo-input-box form-control" type="password">
										</div>

										<!-- Confirm Password Field -->
										<div class="col">
											<label for="cpassword">Confirm Password:<span class="error-info" id="cpassword-info"></span>
											<input name="cpassword" id="cpassword"  class="demo-input-box form-control" type="password">
										</div>
									</div>
								</div>

								<!-- Role As Field -->
								<div class = "field-column">
									<div class="form-group row mb-6">
										<label for="role">Role As:</label> <span class="error-info" id="role-info"></span>
										<select class="form-control" name="role" id="role" >
											<option value="none" selected disabled hidden>--Select Role--</option>
											<option value="3">Employee Role</option>
											<option value="4">Administrator Role</option>
										</select>
									</div>
								</div>

								<!-- Register Button -->
								<div class=field-column>
									<div class="form-group mb-6 text-center m-3">
										<input class="btn btn-primary" type="submit" name="signup-btn" id="signup-btn" value="Sign up"></span>
									</div>
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script>

function Validate() {
        var $valid = true;

        document.getElementById("firstname-info").innerHTML = "";
        document.getElementById("lastname-info").innerHTML = "";
		document.getElementById("email-info").innerHTML = "";
		document.getElementById("phone-info").innerHTML = "";
		document.getElementById("password-info").innerHTML = "";
		document.getElementById("cpassword-info").innerHTML = "";
		document.getElementById("role-info").innerHTML = "";
		
        
        var firstName = document.getElementById("fname").value;
		var lastName = document.getElementById("lastname").value;
		var email = document.getElementById("email").value;
		var phone = document.getElementById("phone").value;
		var password = document.getElementById("password").value;
		var confirmPassword = document.getElementById("cpassword").value;
		var role = document.getElementById("role").value;
   

		if(firstName == "") 
        {
        	document.getElementById("firstname-info").innerHTML = " Enter FirstName";
            $valid = false;
        } 
		// else if(lastName == "") 
        // {
        // 	document.getElementById("lastname-info").innerHTML = " Enter LastName";
        //     $valid = false;
        // }
        // else if(email == "" ) 
        // {
        //     document.getElementById("email_info").innerHTML = "  Enter Valid Email Address";
        // 	$valid = false;
        // } 
		// else if(phone == "") 
        // {
        // 	document.getElementById("phone-info").innerHTML = " Enter Phone Number";
        //     $valid = false;
		// }
      	// else if(password == "") 
        // {
        // 	document.getElementById("password-info").innerHTML = " Enter Password";
        //     $valid = false;
        // }
		// else if(confirmPassword == "") 
        // {
        // 	document.getElementById("cpassword-info").innerHTML = " Please Confirm Entered Password";
        //     $valid = false;
        // }
		// else if(role == "none") 
        // {
        // 	document.getElementById("role-info").innerHTML = " Select Role";
        //     $valid = false;
        // }

        return $valid;
    }

    function ValidateEmail() {
        var $valid = true;

        var $validEmailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        
        if ($validEmailRegex.test(document.getElementById("email").value)) {
            document.getElementById("email_info").innerHTML = " Valid email address.";  
        } else {
            document.getElementById("email_info").innerHTML = " Invalid email address"
            $valid = false;
        }
        return $valid;
    }

	function PasswordCheck() {
	if (document.getElementById('password').value ==
		document.getElementById('cpassword').value) {
		document.getElementById('cpassword-info').style.color = 'green';
		document.getElementById('cpassword-info').innerHTML = 'Passwords matching';
	} else {
		document.getElementById('cpassword-info').style.color = 'red';
		document.getElementById('cpassword-info').innerHTML = 'not matching';
	}

	function checkPassword()
	{
		var $validPasswordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

		if($validPasswordRegex.test(getElementById('password').value)){
			document.getElementById('password-info').style.color = 'green';
			document.getElementById('password-info').innerHTML = 'Valid Password';
		} else {
			document.getElementById('cpassword-info').style.color = 'red';
			document.getElementById('cpassword-info').innerHTML = ' Enter Valid Password (Should have atleast one Uppercase letter, Lowercase letter, Number and SPecial character';
		}
		return $validPasswordRegex.test(str);
	}
</script>
</BODY>
</HTML>
