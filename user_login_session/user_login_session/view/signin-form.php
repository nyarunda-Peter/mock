<HTML>
    <HEAD>
        <TITLE>User Registration</TITLE>
        <link rel="stylesheet" href=".\assets\css\bootstrap5.min.css">
	    <link rel="stylesheet" href=".\assets\css\custom.css">
    </HEAD>
    <BODY>
        <div class ="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">

                        <div class="card">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" onsubmit="return validate();">

                                    <div class="form-group mb-3">
                                        <label for="email">Email Address:</label> <span id="email_info" class="error-info"> </span>
                                        <input type="Email" name="email" id="email" placeholder="Enter email address" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password:</label> <span id="password_info" class="error-info"> </span>
                                        <input type="password" name="password" id="password" placeholder="Enter password" class="form-control">
                                    </div>
                                    <div class="form-group mb-3 text-center">
                                        <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
        <script>
            function validate()
            {
                var $valid = true;
                var $validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;


                document.getElementById("email_info").innerHTML = "";
                document.getElementById("password_info").innerHTML = "";
                
                var email = document.getElementById("email").value;
                var password = document.getElementById("password").value;

                if(email == "" || ValidateEmail()) 
                {
                    document.getElementById("user_info").innerHTML = "required";
                    $valid = false;
                } 
                if(password == "") 
                {
                    document.getElementById("password_info").innerHTML = "required";
                    $valid = false;
                }
                return $valid;
            }

            function ValidateEmail() {
                var $valid = true;
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("email").value)) {
                    document.getElementById("email_info").innerHTML = "Valid email address.";  
                } else {
                    document.getElementById("email_info").innerHTML = "Invalid email address"
                    $valid = false;
                }
                return $valid;
            }
        </script>
        <script src="assets\js\jquery.min.js"></script>
	    <script src="assets\js\bootstrap5.bundle.min.js"></script>
	    <script src="assets\js\scripts.js"></script>
    </BODY>
</HTML>