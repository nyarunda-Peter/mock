<x-layout>

    <section class="px-6 py-8">
         <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">

            <form action="code.php" method="POST" enctype="multipart/form-data">

                @error('status')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                @error('exception')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                @csrf

                {{-- Collect Post ID to retrieve details --}}
                <input type="hidden" name="post_id" value="">

                <div class="row">
                    {{-- Property General Details  --}}
                    <div class="form-group row mb-6">
                        <div class="col">
                            <label for="prop-category">Property Category:</label> <span class="error-info" id="prop-category-info"></span>
                            <select class="form-control" name="prop-category" id="prop-category" >
                                <option value="none" selected disabled hidden>--Select Property Category--</option>

                                {{-- Make saved category default value --}}
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ ucwords($category->name)}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col">
                            <label for="prop-type">Property Type: </label> <span class="error-info" id="prop-type-info"></span>
                            <select class="form-control" name="prop-type" id="prop-type" >
                                <option value="none" selected disabled hidden>--Select Property Type--</option>

                                {{-- Make saved category default value --}}
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"> {{ ucwords($type->name)}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" value="" required name="name">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description </label>
                        <textarea required name="description" id="summernote" class="form-control" rows="4"></textarea>
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
                            <input type="text" name="prop-price" id="prop-price" class="demo-input-box form-control" value="{{ old('prop-price') }}" placeholder="Enter Price in Values">
                        </div>
                    </div>

                    
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

                    <div class="col-md-12 mb-3">
                        <label for="">Image </label>
                        <input type="hidden" name="old_image" value="">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Other Images </label>
                        <input type="hidden" name="old_image" value="">
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Property Visibility Status</label>
                            <input type="checkbox" name="status"  width="100px" height="100px"/>
                            </br><b>checked = hidden, unchecked = visible</b>

                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Delete Property !</label>
                            <input type="checkbox" name="status"  width="100px" height="100px"/>
                            </br><b>checked = DELETE, unchecked = KEEP Property </b>

                        </div>
                       
                    </div>



                    <div class="col-md-12 mb-3">
                        <button type="submit" name="post_update" class="btn btn-primary">Update Post</button>
                    </div>
                </div>

            </form>
         </main>
         
     </section>
 
 </x-layout>