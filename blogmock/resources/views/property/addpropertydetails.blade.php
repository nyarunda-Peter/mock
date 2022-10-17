<x-layout>

    <section class="px-6 py-8">
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

                                    $prop_type = isset($_POST['prop-type']) ? $_POST['prop-type'] : false ;

                                    if($prop_type == '1') { ?>
                                        <form action="{{ route('StoreProperty') }}" method="post" id="frmProperty" enctype="multipart/form-data" onSubmit="">
                                            @csrf

                                            @foreach (request()->post() as $key => $val)
                                            <input type="hidden" name="{{ $key }}" value="<?= $val ?>">
                                            @endforeach

                                            <input type="hidden" name="type" value="<?= request()->post('prop-type') ?>">
                                            <input type="hidden" name="category" value="<?= request()->post('prop-category') ?>">
                                            <input type="hidden" name="title" value="<?= request()->post('prop-title') ?>">
                                            <input type="hidden" name="locality" value="<?= request()->post('prop-loc') ?>">
                                            <input type="hidden" name="description" value="<?= request()->post('prop-desc') ?>">
                                            <input type="hidden" name="price" value="<?= request()->post('prop-price') ?>">
                                            <input type="hidden" name="price_unit" value="<?= request()->post('price-unit') ?>">

                                            @error('status')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                            <div class="">

                                                <!-- Property Internal Details -->

                                                <div class="form-group row mb-6">
                                                    <div class="col">
                                                        <label for="prop-bedroom">Number of Bedrooms:</label> <span class="error-info" id="prop-bedroom-info"></span>
                                                        <select class="form-control" name="bedrooms" id="prop-bedroom" >
                                                            <option value="none" selected disabled hidden>--Select Number of Bedrooms--</option>
                                                            <option value="1">1 : One</option>
                                                            <option value="2">2 : Two</option>
                                                            <option value="3">3: Three</option>
                                                            <option value="4">4: Four</option>
                                                            <option value="5">5: Five</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="prop-bathroom">Number of Bathrooms: </label> <span class="error-info" id="prop-bathroom-info"></span>
                                                        <select class="form-control" name="bathrooms" id="prop-bathroom" >
                                                            <option value="none" selected disabled hidden>--Select Number of Bathrooms--</option>
                                                            <option value="1">1 : One</option>
                                                            <option value="2">2 : Two</option>
                                                            <option value="3">3: Three</option>
                                                            <option value="4">4: Four</option>
                                                            <option value="5">5: Five</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                @foreach ($features as $group => $grouped_features)
                                                <div class = "">
                                                    <label for="internal_features">{{ $group }}: </label> <span class="error-info" id="internal-features-info"></span>
                                                    <div class="form-group row mb-6 m-3">
                                                        <p id="internal_features">
                                                            @foreach ($grouped_features as $feature)
                                                            <label><input type="checkbox" name="features[]" value="{{ $feature->id }}"><span>{{ $feature->name }}</span></label>
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                                @endforeach

                                                <!-- Property Images Details -->
                                                <div class="form-group mb-3">
                                                    <label for="">Main Image </label>
                                                    <input type="file" class="form-control" required name="main_image">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Other Image </label>
                                                    <input type="file" class="form-control" name="other_image[]" multiple>
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
                                    }elseif ($prop_type == '2') {?>
                                        <form action="{{ route('StoreProperty') }}" method="post" id="frmProperty" enctype="multipart/form-data" onSubmit="">
                                            @csrf

                                            @foreach (request()->post() as $key => $val)
                                            <input type="hidden" name="{{ $key }}" value="<?= $val ?>">
                                            @endforeach

                                            <input type="hidden" name="type" value="<?= request()->post('prop-type') ?>">
                                            <input type="hidden" name="category" value="<?= request()->post('prop-category') ?>">
                                            <input type="hidden" name="title" value="<?= request()->post('prop-title') ?>">
                                            <input type="hidden" name="locality" value="<?= request()->post('prop-loc') ?>">
                                            <input type="hidden" name="description" value="<?= request()->post('prop-desc') ?>">
                                            <input type="hidden" name="price" value="<?= request()->post('prop-price') ?>">
                                            <input type="hidden" name="price_unit" value="<?= request()->post('price-unit') ?>">

                                            @error('status')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                            <div class="">

                                                <!-- Property Internal Details -->

                                                <div class="form-group row mb-6">
                                                    <div class="col">
                                                        <label for="prop-bedroom">Number of Bedrooms:</label> <span class="error-info" id="prop-bedroom-info"></span>
                                                        <select class="form-control" name="bedrooms" id="prop-bedroom" >
                                                            <option value="none" selected disabled hidden>--Select Number of Bedrooms--</option>
                                                            <option value="1">1 : One</option>
                                                            <option value="2">2 : Two</option>
                                                            <option value="3">3: Three</option>
                                                            <option value="4">4: Four</option>
                                                            <option value="5">5: Five</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="prop-bathroom">Number of Bathrooms: </label> <span class="error-info" id="prop-bathroom-info"></span>
                                                        <select class="form-control" name="bathrooms" id="prop-bathroom" >
                                                            <option value="none" selected disabled hidden>--Select Number of Bathrooms--</option>
                                                            <option value="1">1 : One</option>
                                                            <option value="2">2 : Two</option>
                                                            <option value="3">3: Three</option>
                                                            <option value="4">4: Four</option>
                                                            <option value="5">5: Five</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Property Features --}}
                                                @foreach ($features as $group => $grouped_features)
                                                <div class = "">
                                                    <label for="internal_features">{{ $group }}: </label> <span class="error-info" id="internal-features-info"></span>
                                                    <div class="form-group row mb-6 m-3">
                                                        <p id="internal_features">
                                                            @foreach ($grouped_features as $feature)
                                                            <label><input type="checkbox" name="features[]" value="{{ $feature->id }}"><span>{{ $feature->name }}</span></label>
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                                @endforeach

                                                <!-- Property Images Details -->
                                                <div class="form-group mb-3">
                                                    <label for="">Main Image </label>
                                                    <input type="file" class="form-control" required name="main_image">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Other Image </label>
                                                    <input type="file" class="form-control" name="other_image[]" multiple>
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
                                    }elseif ($prop_type == '3'){
                                        ?>
                                        <form action="{{ route('StoreProperty') }}" method="post" id="frmPlot" enctype="multipart/form-data" onSubmit="">
                                            @csrf

                                            <input type="hidden" name="type" value="<?= request()->post('prop-type') ?>">
                                            <input type="hidden" name="category" value="<?= request()->post('prop-category') ?>">
                                            <input type="hidden" name="title" value="<?= request()->post('prop-title') ?>">
                                            <input type="hidden" name="locality" value="<?= request()->post('prop-loc') ?>">
                                            <input type="hidden" name="description" value="<?= request()->post('prop-desc') ?>">
                                            <input type="hidden" name="price" value="<?= request()->post('prop-price') ?>">
                                            <input type="hidden" name="price_unit" value="<?= request()->post('price-unit') ?>">

                                            <div class="">

                                                <!-- Property Internal Details -->

                                                <div class="form-group row mb-6">
                                                    <div class="col">
                                                        <label for="plot-size">Plot Size:</label> <span class="error-info" id="plot-size-info"></span>
                                                        <input type="text" name="size" id="plot-size" class="form-control">
                                                    </div>
                                                    <div class="col">
                                                        <label for="plot-size-unit">Plot Measurement units: </label> <span class="error-info" id="plot-size-unit-info"></span>
                                                        <select class="form-control" name="dimensions" id="plot-size-unit" >
                                                            <option value="none" selected disabled hidden>--Select Measurement units--</option>
                                                            <option value="1">Sq Metres </option>
                                                            <option value="2">Acres</option>
                                                            <option value="3">Hectares</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <!-- Property Images Details -->
                                                <div class="form-group mb-3">
                                                    <label for="">Main Image </label>
                                                    <input type="file" class="form-control" required name="main_image">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Other Image </label>
                                                    <input type="file" class="form-control" name="other_image[]" multiple>
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
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</x-layout>
