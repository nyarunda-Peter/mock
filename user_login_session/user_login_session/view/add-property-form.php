<html>
<head>
<title>Register New Property</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="./assets/css/bootstrap5.min.css">
<link rel="stylesheet" href="./css/custom.css">

</head>
<body>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card" style="width:100%"> 
                        <div class="card-header text-center">
                            <h4>Add Property</h4>
                        </div>
                        <!-- action="login-action.php" -->
                        <div class="card-body">
                        <form action="add-property-details.php" method="post" id="frmLogin" onSubmit="return validate();">
                                <?php 
                                if(isset($_SESSION["errorMessage"])) {
                                ?>
                                <div class="error-message"><?php  echo $_SESSION["errorMessage"]; ?></div>
                                <?php 
                                unset($_SESSION["errorMessage"]);
                                } 
                                ?>
                                <!-- Property General Details -->
								<div class = "field-column">
									<div class="form-group row mb-6">
										<div class="col">
											<label for="prop-category">Property Category:</label> <span class="error-info" id="prop-category-info"></span>
											<select class="form-control" name="prop-category" id="prop-category" >
                                                <option value="none" selected disabled hidden>--Select Property Category--</option>
                                                <option value="1">For Sale</option>
                                                <option value="2">For Rent</option>
                                                <option value="3">For Lease</option>
										    </select>
										</div>
										<div class="col">
											<label for="prop-type">Property Type: </label> <span class="error-info" id="prop-type-info"></span>
											<select class="form-control" name="prop-type" id="prop-type" >
                                                <option value="none" selected disabled hidden>--Select Property Type--</option>
                                                <option value="1">House</option>
                                                <option value="2">Apartment</option>
                                                <option value="3">Plot</option>
										    </select>
										</div>
									</div>
								</div>

                                <!-- Property Specific Details -->
                                <div class="field-column">
                                    <div class="form-group mb-3">
                                        <label for="prop-title">Property Title: </label><span id="prop-title-info" class="error-info"></span>
                                        <input name="prop-title" id="prop-title" type="Text" class="demo-input-box form-control" placeholder="Enter Property Title">
                                    </div>
                                </div>

                                <!-- Property Location Details -->
                                <div class="field-column">
                                    <div class="form-group mb-3">
                                        <label for="prop-loc">Property Locality: </label><span id="prop-loc-info" class="error-info"></span>
                                        <select class="form-control" name="prop-type" id="prop-loc" >
                                            <option value="none" selected disabled hidden>--Select Property Locale--</option>
                                            <option value="1">Runda</option>
                                            <option value="2">Kitsuru</option>
                                            <option value="3">Rosslyn</option>
										</select>
                                    </div>
                                </div>

								<!-- Property DEscription Field -->
                                <div class = "field-column">
									<div class="form-group row mb-3">
										<label for="prop-desc">Property Description:</label><span id="prop-desc-info" class="error-info"></span>
                                        <textarea name="prop-desc"  id="prop-desc" cols="20" rows="5" class="form-control" minlength="50" maxlength="200" class="form-control"></textarea>
									</div>
								</div>
                                
                                <!-- Price Details Field-->
								<div class = "field-column">
									<div class="form-group row mb-6">
                                        <div class="col">
                                            <label for="price-unit">Price Unit:</label> <span class="error-info" id="price-unit-info"></span>
                                            <select class="form-control" name="price-unit" id="price-unit" >
                                                <option value="none" selected disabled hidden>--Select Price Unit--</option>
                                                <option value="1">Kshs</option>
                                                <option value="2">Usd</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="prop-price">Price:</label> <span class="error-info" id="prop-price-info"></span>
                                            <input type="text" name="prop-price" id="prop-price" class="demo-input-box form-control" placeholder="Enter Price in Values">
                                        </div>
									</div>
								</div>
                                <div class=field-column>
                                    <div class="form-group mb-3 text-center m-4">
                                        <input type="submit" name="prop_btn" id="prop_btn" value="Next"
                                        class="btn btn-primary"></span>
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
        function validate()
        {

            var $valid = true;
            document.getElementById("prop-category-info").innerHTML = "";
            document.getElementById("prop-type-info").innerHTML = "";
            document.getElementById("prop-title-info").innerHTML = "";
            document.getElementById("prop-loc-info").innerHTML = "";
            document.getElementById("prop-desc-info").innerHTML = "";
            document.getElementById("price-unit-info").innerHTML = "";
            document.getElementById("prop-price-info").innerHTML = "";

            var prop_category = document.getElementById("prop-category").value;
            var prop_type = document.getElementById("prop-type").value;
            var prop_title = document.getElementById("prop-title").value;
            var prop_loc = document.getElementById("prop-loc").value;
            var prop_desc = document.getElementById("prop-desc").value;
            var price_unit = document.getElementById("price-unit").value;
            var prop_price = document.getElementById("prop-price").value;

            if(prop_category == "none")
            {
                document.getElementById("prop-category-info").innerHTML = " Select Category";
                $valid = false;
            } 
            else if(prop_type == "none") 
            {
                document.getElementById("prop-type-info").innerHTML = " Select Type";
                $valid = false;
            }
            else if(prop_title == "" ) 
            {
                document.getElementById("prop-title-info").innerHTML = "  Enter Property Title";
                $valid = false;
            } 
            else if(prop_loc == "none")
            {
                document.getElementById("prop-loc-info").innerHTML = " Select Location";
                $valid = false;
            }
            else if(prop_desc == "")
            {
                document.getElementById("prop-desc-info").innerHTML = " Enter Property Description";
                $valid = false;
            }
            else if(price_unit == "none") 
            {
                document.getElementById("price-unit-info").innerHTML = " Required -> Select Price Unit";
                $valid = false;
            } 
            else if(prop_price == "") 
            {
                document.getElementById("prop-price-info").innerHTML = " Enter Price Amount";
                $valid = false;
            }
           
            return $valid;
        }

        // function limComments(obj) {
        //     var charLimit = [obj.getAttribute('minlength'), obj.getAttribute('maxlength')];
        //     var fieldID = obj.getAttribute('id');

        //     if (obj.value.length >= charLimit[0] && obj.value.length <= charLimit[1]) {
        //         console.log("The comment in " + fieldID + " is just right.");
        //     } else if (obj.value.length > charLimit[1]) {
        //         console.log("The comment in " + fieldID + " is too long.");
        //         obj.value = obj.value.substring(0, charLimit[1]); 
        //     } else {
        //         console.log("The comment in " + fieldID + " is too short.");
        //     }
        // }
    </script>
    </body>
</html>