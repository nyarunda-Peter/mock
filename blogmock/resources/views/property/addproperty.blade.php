<x-layout>

    <section class="px-6 py-8">

        <div class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="card" style="width:100%">
                            <div class="card-header text-center">
                                <h4>Add Property</h4>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('Add-Property-Details') }}" method="POST" id="frmLogin" onSubmit="">

                                    @csrf

                                    <!-- Property General Details -->
                                    <div class="form-group row mb-6">
                                        <div class="col">
                                            <label for="prop-category">Property Category:</label> <span class="error-info" id="prop-category-info"></span>
                                            <select class="form-control" name="prop-category" id="prop-category" >
                                                <option value="none" selected disabled hidden>--Select Property Category--</option>

                                                @foreach ($posts as $category)
                                                    <option value="{{ $category->id }}"> {{ ucwords($category->name)}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="prop-type">Property Type: </label> <span class="error-info" id="prop-type-info"></span>
                                            <select class="form-control" name="prop-type" id="prop-type" >
                                                <option value="none" selected disabled hidden>--Select Property Type--</option>
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}"> {{ ucwords($type->name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <!-- Property Specific Details -->

                                    <div class="form-group mb-3">
                                        <label for="prop-title">Property Title: </label><span id="prop-title-info" class="error-info"></span>
                                        <input name="prop-title" id="prop-title" type="Text" class="demo-input-box form-control" placeholder="Enter Property Title">
                                    </div>


                                    <!-- Property Location Details -->

                                    <div class="form-group mb-3">
                                        <label for="prop-loc">Property Locality: </label><span id="prop-loc-info" class="error-info"></span>
                                        <select class="form-control" name="prop-loc" id="prop-loc" >
                                            <option value="none" selected disabled hidden>--Select Property Locale--</option>
                                            <option value="1">Runda</option>
                                            <option value="2">Kitsuru</option>
                                            <option value="3">Rosslyn</option>
                                        </select>
                                    </div>


                                    <!-- Property DEscription Field -->

                                    <div class="form-group row mb-3">
                                        <label for="prop-desc">Property Description:</label><span id="prop-desc-info" class="error-info"></span>
                                        <textarea name="prop-desc"  id="prop-desc" cols="20" rows="5" class="form-control" minlength="50" maxlength="200" class="form-control"></textarea>
                                    </div>


                                    <!-- Price Details Field-->

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


                                    <div class="form-group mb-3 text-center m-4">
                                        <input type="submit" name="prop_btn" id="prop_btn" value="Next"
                                        class="btn btn-primary"></span>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
