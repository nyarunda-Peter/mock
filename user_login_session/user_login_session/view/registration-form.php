<?php
use \Mock\Member;
if (!empty($_POST["register_btn"])){
    require_once '..\class\Member.php';
    $member = new Member();
    $registrationResponse = $member->registerMember();
}
?>


<html>
<head>
<title>User Login</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="./assets/css/bootstrap5.min.css">
<link rel="stylesheet" href="./css/custom.css">

</head>
<body>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card"> 
                        <div class="card-header text-center">
                            <h4>Registration</h4>
                        </div>
                        <!-- action="login-action.php" -->
                        <div class="card-body">
                        <form action="" method="post" id="frmLogin" onSubmit="return validate();">
                            <div class="demo-table">
                                <?php 
                                if(isset($_SESSION["errorMessage"])) {
                                ?>
                                <div class="error-message"><?php  echo $_SESSION["errorMessage"]; ?></div>
                                <?php 
                                unset($_SESSION["errorMessage"]);
                                } 
                                ?>
                                <!-- User Names Fields -->
								<div class = "field-column">
									<div class="form-group row mb-6">
										<div class="col">
											<label for="firstname">Firstname:</label> <span class="error-info" id="firstname-info"></span>
											<input name="firstname" id="firstname" class="demo-input-box form-control" type="text" placeholder="Enter Firstname" >
										</div>
										<div class="col">
											<label for="lastname">Lastname: </label> <span class="error-info" id="lastname-info"></span>
											<input  name="lastname" id="lastname" class="demo-input-box form-control" type="text" placeholder="Enter Lastname">
										</div>
									</div>
								</div>

                                <!-- Email Address Field -->
                                <div class="field-column">
                                    <div class="form-group mb-3">
                                        <label for="email">Email Address: </label><span id="email_info" class="error-info"></span>
                                        <input name="email" id="email" type="Email" class="demo-input-box form-control" placeholder="Enter email address">
                                    </div>
                                </div>

                                <!-- Phone Number Field -->
                                <div class="field-column">
                                    <div class="form-group mb-3">
                                        <label for="phone">Phone Number: </label><span id="phone_info" class="error-info"></span>
                                        <input name="phone" id="phone" type="text" class="demo-input-box form-control" placeholder="Enter phone number">
                                    </div>
                                </div>

								<!-- Password Field -->
                                <div class = "field-column">
									<div class="form-group row mb-6">
										<div class="col">
											<label for="password">Password:</label> <span class="error-info" id="password-info"></span>
											<input name="password" id="password" class="demo-input-box form-control" type="password" placeholder="Enter Password"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                            >
										</div>
										<div class="col">
											<label for="cpassword">Confirm Password: </label> <span class="error-info" id="cpassword-info"></span>
											<input  name="cpassword" id="cpassword" class="demo-input-box form-control" type="password"  placeholder="Enter Password Again">
										</div>
									</div>
								</div>
                                <div id="message" class="form-group row mb-6" style="display:none;">
                                    <h5>Password must contain the following:</h5>
                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                    <p id="number" class="invalid">A <b>number</b></p>
                                    <p id="length" class="invalid">Minimum <b>6 characters</b></p>
                                </div>
                                
                                <!-- Role As Field -->
								<div class = "field-column">
									<div class="form-group row mb-6">
										<label for="role">Role As:</label> <span class="error-info" id="role-info"></span>
										<select class="form-control" name="role" id="role" >
											<option value="none" selected disabled hidden>--Select Role--</option>
											<option value="1">Employee Role</option>
											<option value="2">Administrator Role</option>
										</select>
									</div>
								</div>
                                <div class=field-column>
                                    <div class="form-group mb-3 text-center m-4">
                                        <input type="submit" name="register_btn" id="register_btn" value="Register"
                                        class="btn btn-primary"></span>
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
        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {  
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }
        
        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {  
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {  
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }
        
        // Validate length
        if(myInput.value.length >= 6) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
        }
    

    function validate() {
        var $valid = true;

        document.getElementById("firstname-info").innerHTML = "";
        document.getElementById("lastname-info").innerHTML = "";
        document.getElementById("email_info").innerHTML = "";
        document.getElementById("phone_info").innerHTML = "";
        document.getElementById("password-info").innerHTML = "";
        document.getElementById("cpassword-info").innerHTML = "";
        document.getElementById("role-info").innerHTML = "";
        
        var firstName = document.getElementById("firstname").value;
		var lastName = document.getElementById("lastname").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var password = document.getElementById("password").value;
        var cpassword = document.getElementById("cpassword").value;
        var role = document.getElementById("role").value;
        
        
        if(firstName == "") 
        {
        	document.getElementById("firstname-info").innerHTML = " Enter FirstName";
            $valid = false;
        } 
		else if(lastName == "") 
        {
        	document.getElementById("lastname-info").innerHTML = " Enter LastName";
            $valid = false;
        }
        else if(email == "" || !ValidateEmail()) 
        {
            document.getElementById("email_info").innerHTML = "  Enter Email Address";
        	$valid = false;
        }
        else if(phone == "")
        {
            document.getElementById("phone_info").innerHTML = " Enter Phone Number";
            $valid = false;
        }
        else if(password == "") 
        {
        	document.getElementById("password-info").innerHTML = " Enter Password";
            $valid = false;
        } 
        else if(cpassword == "") 
        {
        	document.getElementById("cpassword-info").innerHTML = " Confirm Password";
            $valid = false;
        }
        else if(role == "none")
        {
            document.getElementById("role-info").innerHTML = "Required -> Select Role";
            $valid = false;
        }
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
    
    function checkPassword()
	{
        var $valid = true;
		var $validPasswordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

		if($validPasswordRegex.test(getElementById('password').value)){
			document.getElementById('password-info').style.color = 'green';
			document.getElementById('password-info').innerHTML = 'Valid Password';
		} else {
			document.getElementById('cpassword-info').style.color = 'red';
			document.getElementById('cpassword-info').innerHTML = ' Enter Valid Password Should have atleast one Uppercase letter, Lowercase letter, Number and Special character';
            $valid = false;
		}
		
	}


    function PasswordCheck() {
        var $valid = true;
      
        if (document.getElementById('password').value ==
            document.getElementById('cpassword').value) {
            document.getElementById('cpassword-info').style.color = 'green';
            document.getElementById('cpassword-info').innerHTML = 'Passwords matching';
        } else {
            document.getElementById('cpassword-info').style.color = 'red';
            document.getElementById('cpassword-info').innerHTML = 'not matching';
            $valid = false;
        }
    }
    </script>
</body>
</html>