<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/custom.css'); }} " >
        

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
       
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-min bg-gray-100 dark:bg-gray-900 sm:items-center py-6 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-1 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ url('/welcome') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">welcome</a>
                    @endauth
                </div>
            @endif
           
        </div>
        <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card"> 
                        <div class="card-header text-center">
                            <h4>Property Details</h4>
                        </div>  
                       
                        <div class="card-body">
                            <?php
                                if(isset($_GET['prop_btn'])){
                                    
                                    

                                    $prop_type = isset($_GET['prop-type']) ? $_GET['prop-type'] : false ;
                                    
                                    
                                    if($prop_type == '1') { ?>
                                        <form action="" method="post" id="frmProperty" enctype="multipart/form-data" onSubmit="">
                                        @csrf
                                            

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
                                    }else if($prop_type == '2'){
                                        ?>
                                        <form action="" method="post" id="frmProperty" enctype="multipart/form-data" onSubmit="">
                                        @csrf
                                            
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
                                        <form action="" method="post" id="frmPlot" enctype="multipart/form-data" onSubmit="">
                                        @csrf
        
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
                                                            <label for="plot-size">Plot Size:</label> <span class="error-info" id="plot-size-info"></span>
                                                            <input type="text" name="plot-size" id="plot-size" class="form-control">
                                                        </div>
                                                        <div class="col">
                                                            <label for="plot-size-unit">Plot Measurement units: </label> <span class="error-info" id="plot-size-unit-info"></span>
                                                            <select class="form-control" name="plot-size-unit" id="plot-size-unit" >
                                                                <option value="none" selected disabled hidden>--Select Measurement units--</option>
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
