@extends('layouts.admin')

@section('title')
    Tambah Product
@endsection

@section('stylesheet')
    <style>
        #map {
            height: 300px;
            width: 100%;
            margin: auto auto;
            border: solid 2px #0d6b7a;
            //box-shadow: 5px 5px 30px grey;
            -webkit-transform: translateZ(0);
            z-index: 10;
        }

        #map-canvas {
            height: 100%;
            width: 100%;
            margin: 0px;
            padding: 0px;
            z-index: 10;
        }

        .controls {
            margin-top: 16px;
            border: 1px solid #0d6b7a;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            // box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: floralwhite;
            border-radius: 5px;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 80%;
            z-index: 1081;
        }

        #pac-input:focus {
            border-color: #0088FF;
        }

        .pac-container {
            font-family: Roboto;
        }

        #type-selector {
            color: #fff;
            background-color: #4d90fe;
            padding: 5px 11px 0px 11px;
        }

        #type-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        .pac-container {
            background-color: #FFF;
            z-index: 20;
            position: fixed;
            display: inline-block;
            float: left;
        }
    </style>
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="shopping-bag"></i></div>
                                Tambah Product
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('user.index') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke Semua Prodcut
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Informasi Product</div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <div id="map" class="">
                                            <input id="pac-input" class="controls" placeholder="insert the location"
                                                ame="location" type="text">
                                            <div id="map-canvas"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-3">
                                        <label class="small mb-1" for="name">Latitude</label>
                                        <input class="form-control lat @error('lat') is-invalid @enderror" name="lat"
                                            type="text" value="{{ old('lat') }}" required />
                                        @error('lat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Form Group (first name)-->
                                    <div class="col-md-3">
                                        <label class="small mb-1" for="name">Longitude</label>
                                        <input class="form-control lon @error('long') is-invalid @enderror" name="long"
                                            type="text" value="{{ old('long') }}" required />
                                        @error('long')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Village</label>
                                        <select class="form-select" name="village_id" aria-label="Default select example">
                                            @foreach($villages as $village)
                                            <option value="{{ $village->id }}">{{ $village->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('village_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Video ID</label>
                                        <input class="form-control @error('video_id') is-invalid @enderror" name="video_id"
                                            type="text" value="{{ old('video_id') }}" required />
                                        @error('video_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Name Prodcut</label>
                                        <input class="form-control @error('name') is-invalid @enderror" name="name"
                                            type="text" value="{{ old('name') }}" required />
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Price</label>
                                        <input class="form-control @error('price') is-invalid @enderror" name="price"
                                            type="number" value="{{ old('price') }}" required />
                                        @error('price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Category</label>
                                        <select class="form-select" name="category" aria-label="Default select example">
                                            <option selected>Open this select Category</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Banner</label>
                                        <input class="form-control @error('image') is-invalid @enderror" name="image"
                                            type="file" value="{{ old('image') }}" required />
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Image (multiple)</label>
                                        <input class="form-control @error('photo') is-invalid @enderror" name="photo[]"
                                            type="file" value="{{ old('photo') }}" required multiple />
                                        @error('photo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Address</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" cols="30" rows="5" name="address"
                                            value="{{ old('address') }}" required></textarea>
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" cols="30" rows="5"
                                            name="description" value="{{ old('description') }}" required></textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Additional Information</label>
                                        <textarea class="form-control @error('additional_information') is-invalid @enderror" cols="30" rows="5"
                                            name="additional_information" value="{{ old('additional_information') }}" required></textarea>
                                        @error('additional_information')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Seller Name</label>
                                        <input class="form-control @error('seller_name') is-invalid @enderror"
                                            name="seller_name" type="text" value="{{ old('seller_name') }}"
                                            required />
                                        @error('seller_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">
                                    Add New Product
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL3qmSEZlR-lTVQkqxUsBoM8IdoL4QkCA&v=3.exp&libraries=places">
    </script>
    <script>
        var geocoder;
        var map;
        var infowindow = new google.maps.InfoWindow();
        var marker;
        var g_err = 0;

        function initialize() {

            var markers = [];
            var mapOptions = {
                zoom: 12,
                center: new google.maps.LatLng(-6.968667, 110.1234954),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false,
                streetViewControl: false
            };
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            // Create the search box and link it to the UI element.  
            var input = document.getElementById('pac-input');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            var searchBox = new google.maps.places.SearchBox(input);

            // [START region_getplaces]  
            // Listen for the event fired when the user selects an item from the  
            // pick list. Retrieve the matching places for that item.  
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                for (var i = 0, marker; marker = markers[i]; i++) {
                    marker.setMap(null);
                }

                // For each place, get the icon, place name, and location.  
                markers = [];
                var bounds = new google.maps.LatLngBounds();
                for (var i = 0, place; place = places[i]; i++) {
                    var image = {
                        url: place.icon,
                        size: new google.maps.Size(75, 75),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.  
                    var marker = new google.maps.Marker({
                        map: map,
                        icon: image,
                        title: place.name,
                        position: place.geometry.location
                    });
                    $('.lat').val(marker.position.lat());
                    $('.lon').val(marker.position.lng());
                    // alert('Lat :' + marker.position.lat() + ' Lon :' + marker.position.lng());
                    markers.push(marker);
                    bounds.extend(place.geometry.location);
                }

                map.fitBounds(bounds);
            });
            // [END region_getplaces]  

            // Bias the SearchBox results towards places that are within the bounds of the  
            // current map's viewport.  
            google.maps.event.addListener(map, 'bounds_changed', function() {
                var bounds = map.getBounds();
                searchBox.setBounds(bounds);
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    map.setCenter(initialLocation);
                    $('.lat').val(position.coords.latitude);
                    $('.lon').val(position.coords.longitude);
                });
            }
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection
