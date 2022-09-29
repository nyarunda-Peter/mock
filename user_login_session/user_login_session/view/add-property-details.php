<html>
<head>
<title>Property Details</title>
<link href="./view/css/style.css" rel="stylesheet" type="text/css" />
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
                            <h4>Property Details</h4>
                        </div> 
                        <!-- action="login-action.php" -->
                        <div class="card-body">
                        <?php
                            if(isset($_POST['prop_btn'])){
                                $prop_type = $_POST['prop-type'];
                                echo $prop_type;
                                if($prop_type == '1' || '2') { ?>
                                    <form action="" method="post" id="frmProperty" enctype="multipart/form-data" onSubmit="return validate();">
                                        <div class="demo-table">
                                            <?php 
                                            if(isset($_SESSION["errorMessage"])) {
                                            ?>
                                            <div class="error-message"><?php  echo $_SESSION["errorMessage"]; ?></div>
                                            <?php 
                                            unset($_SESSION["errorMessage"]);
                                            } 
                                            ?>
                                            <!-- Property Internal Details -->
                                            <div class = "field-column">
                                                <div class="form-group row mb-6">
                                                    <div class="col">
                                                        <label for="prop-bedroom">Property Category:</label> <span class="error-info" id="prop-bedroom-info"></span>
                                                        <select class="form-control" name="prop-bedroom" id="prop-bedroom" >
                                                            <option value="none" selected disabled hidden>--Select Number of Bedrooms--</option>
                                                            <option value="1">1 : One</option>
                                                            <option value="2">2 : Two</option>
                                                            <option value="3">3: Three</option>
                                                            <option value="4">4: Four</option>
                                                            <option value="5">5: Five</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="prop-bathroom">Property Type: </label> <span class="error-info" id="prop-bathroom-info"></span>
                                                        <select class="form-control" name="prop-bathroom" id="prop-bathroom" >
                                                            <option value="none" selected disabled hidden>--Select Number of Bathrooms--</option>
                                                            <option value="1">1 : One</option>
                                                            <option value="2">2 : Two</option>
                                                            <option value="3">3: Three</option>
                                                            <option value="4">4: Four</option>
                                                            <option value="5">5: Five</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class = "field-column">
                                            <label for="internal_features">Internal Features: </label> <span class="error-info" id="internal-features-info"></span>
                                            <div class="form-group row mb-6 m-3">
                                                    <p id="internal_features">
                                                        <label><input type="checkbox" name="ifeatures" value="1"><span>SQ</span></label>
                                                        <label><input type="checkbox" name="ifeatures" value="2"><span>AirCon</span></label>
                                                        <label><input type="checkbox" name="ifeatures" value="3"><span>Fiber</span></label>
                                                        <label><input type="checkbox" name="ifeatures" value="4"><span>Laundry Room</span></label>
                                                        <label><input type="checkbox" name="ifeatures" value="5"><span>Balcony</span></label>
                                                        <label><input type="checkbox" name="ifeatures" value="6"><span>Pantry</span></label>
                                                        <label><input type="checkbox" name="ifeatures" value="7"><span>Fireplace</span></label>
                                                    </p>
                                                </div>
                                        </div>
                                            <!-- Property External Details -->
                                            <div class = "field-column">
                                            <label for="external_features">External Features: </label> <span class="error-info" id="external_features-info"></span>
                                            <div class="form-group row mb-6 m-3">
                                                    <p id="external_features">
                                                        <label><input type="checkbox" name="efeatures" value="1"><span>Parking</span></label>
                                                        <label><input type="checkbox" name="efeatures" value="2"><span>Garden</span></label>
                                                        <label><input type="checkbox" name="efeatures" value="3"><span>Pool</span></label>
                                                        <label><input type="checkbox" name="efeatures" value="4"><span>CCTV</span></label>
                                                    </p>
                                                </div>

                                            <!-- Property Images Details -->
                                            <div class="form-group mb-3">
                                                <label for="">Main Image </label>
                                                <input type="file" class="form-control" required name="main-image">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Other Image </label>
                                                <input type="file" class="form-control" name="other-image[]" multiple>
                                            </div>
                                            <div class=field-column>
                                                <div class="form-group mb-3 text-center m-4">
                                                    <input type="submit" name="register_btn" id="register_btn" value="Register Property"
                                                    class="btn btn-primary"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                                }else{
                                    ?>
                                    <form action="" method="post" id="frmPlot" enctype="multipart/form-data" onSubmit="return validate();">
                                        <div class="demo-table">
                                            <?php 
                                            if(isset($_SESSION["errorMessage"])) {
                                            ?>
                                            <div class="error-message"><?php  echo $_SESSION["errorMessage"]; ?></div>
                                            <?php 
                                            unset($_SESSION["errorMessage"]);
                                            } 
                                            ?>
                                            <!-- Property Internal Details -->
                                            <div class = "field-column">
                                                <div class="form-group row mb-6">
                                                    <div class="col">
                                                        <label for="plot-size">Property Category:</label> <span class="error-info" id="plot-size-info"></span>
                                                        <input type="text" name="plot-size" id="plot-size" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <label for="plot-size-unit">Property Type: </label> <span class="error-info" id="plot-size-unit-info"></span>
                                                        <select class="form-control" name="plot-size-unit" id="plot-size-unit" >
                                                            <option value="none" selected disabled hidden>--Select Number of Bathrooms--</option>
                                                            <option value="1">Sq Metres </option>
                                                            <option value="2">Acres</option>
                                                            <option value="3">Hectares</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Property Images Details -->
                                            <div class="form-group mb-3">
                                                <label for="">Main Image </label>
                                                <input type="file" class="form-control" required name="main-image">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Other Image </label>
                                                <input type="file" class="form-control" name="other-image[]" multiple>
                                            </div>
                                            <div class=field-column>
                                                <div class="form-group mb-3 text-center m-4">
                                                    <input type="submit" name="register_btn" id="register_btn" value="Register Plot"
                                                    class="btn btn-primary"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>