<html>
<head>
<title>Register New Property</title>
<link href="./view/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="./assets/css/bootstrap5.min.css">
<link rel="stylesheet" href="./assets/css/custom.css">

</head>
<body>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card"> 
                        <div class="card-header text-center">
                            <h4>Add Property</h4>
                        </div>
                        <!-- action="login-action.php" -->
                        <div class="card-body">
                        <form action="add-property-details.php" method="post" id="frmLogin" onSubmit="return validate();">
                            <div class="demo-table">
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
                                        <label for="prop-title">Property Title: </label><span id="prop-title_info" class="error-info"></span>
                                        <input name="prop-title" id="prop-title" type="Text" class="demo-input-box form-control" placeholder="Enter Property Title">
                                    </div>
                                </div>

                                <!-- Property Location Details -->
                                <div class="field-column">
                                    <div class="form-group mb-3">
                                        <label for="prop-loc">Property Locality: </label><span id="prop-loc_info" class="error-info"></span>
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
                                        <textarea name="prop-desc"  id="prop-desc" cols="20" rows="5" class="form-control"></textarea>
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
                                        <input type="submit" name="prop_btn" id="prop_btn" value="Register Property"
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
    </body>
</html>