@extends('layouts.admin')

@section('title')
    Edit Desa
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
                                <div class="page-header-icon"><i data-feather="folder"></i></div>
                                Edit Desa
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('user.index') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke Semua Desa
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
                        <div class="card-header">Informasi Desa</div>
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
                            <form action="{{ route('villages.update', $villages->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

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
                                            type="text" value="{{ $villages->lat }}" required readonly />
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
                                            type="text" value="{{ $villages->long }}" required readonly />
                                        @error('long')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Name Desa</label>
                                        <input class="form-control @error('name') is-invalid @enderror" name="name"
                                            type="text" value="{{ $villages->name }}" required />
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        @if (substr($villages->image, 0, 5) == 'https')
                                            <img src="{{ $villages->image }}" class="img-thumbnail" alt="image_village">
                                        @else
                                            <img src="{{ Storage::url('/assets/villages/images/' . $villages->image) }}"
                                                class="img-thumbnail" alt="image_village">
                                        @endif
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Image</label>
                                        <input class="form-control @error('image') is-invalid @enderror" name="image"
                                            type="file" value="{{ old('image') }}" />
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
                                        <label class="small mb-1" for="name">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" cols="30" rows="5"
                                            name="description" value="{{ old('description') }}" required>{{ $villages->description }}</textarea>
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
                                        <label class="small mb-1" for="name">Video ID</label>
                                        <input class="form-control @error('video_id') is-invalid @enderror" name="video_id"
                                            type="text" value="{{ $villages->video_id }}" required />
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
                                        <label class="small mb-1" for="name">Video VR</label>
                                        <input class="form-control @error('video_vr') is-invalid @enderror"
                                            name="video_vr" type="text" value="{{ $villages->video_vr }}"
                                            required />
                                        @error('video_vr')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Video ETC</label>
                                        <input class="form-control @error('video_etc') is-invalid @enderror"
                                            name="video_etc" type="text" value="{{ $villages->video_etc }}"
                                            required />
                                        @error('video_etc')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">
                                    Update Desa
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
                center: new google.maps.LatLng({{ $villages->lat }}, {{ $villages->long }}),
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
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
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
