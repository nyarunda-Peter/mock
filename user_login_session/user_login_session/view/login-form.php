<html>
<head>
<title>User Login</title>
<link href="./view/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="./view/assets/css/bootstrap5.min.css">
<link rel="stylesheet" href="./css/custom.css">
</head>
<body>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card"> 
                        <div class="card-header text-center">
                            <h4>Login</h4>
                        </div>
                        <!-- action="login-action.php" -->
                        <div class="card-body">
                        <form action="login-action.php" method="post" id="frmLogin" onSubmit="return validate();">
                            
                                <?php 
                                if(isset($_SESSION["errorMessage"])) {
                                ?>
                                <div class="error-message"><?php  echo $_SESSION["errorMessage"]; ?></div>
                                <?php 
                                unset($_SESSION["errorMessage"]);
                                } 
                                ?>
                                <div class="field-column">
                                    <div class="form-group mb-3">
                                        <label for="email">Email Address: </label><span id="email_info" class="error-info"></span>
                                    
                                        <input name="email" id="email" type="Email"
                                            class="demo-input-box form-control" placeholder="Enter email address">
                                    </div>
                                </div>
                                <div class="field-column">
                                    <div class="form-group mb-3">
                                        <label for="password">Password: </label><span id="password_info" class="error-info"></span>
                                    
                                        <input name="password" id="password" type="password"
                                            class="demo-input-box form-control" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class=field-column>
                                    <div class="form-group mb-3 text-center m-4">
                                        <input type="submit" name="login" value="login"
                                        class="btn btn-primary"></span>
                                    </div>
                                </div>
                                <a href="./view/registration-form.php">Register</a>
                            
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function validate() {
        var $valid = true;
        document.getElementById("email_info").innerHTML = "";
        document.getElementById("password_info").innerHTML = "";
        
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        if(email == "" || !ValidateEmail()) 
        {
            document.getElementById("email_info").innerHTML = "  Enter Valid Email Address";
        	$valid = false;
        } 
        else if(password == "") 
        {
        	document.getElementById("password_info").innerHTML = "  Enter Password";
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

    </script>
</body>
</html>