@extends('layouts.app')

@push('head')
<style>
    #map {
        height: 800px;
    }
</style>
@endpush

@section('content')

<div class="container">
<div class="card">
    <div id="map"></div>
    </div>
</div>

<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdmbRi43RUtaRK5pRAkjWwG9_LfYYfYcA&callback=initMap"></script>

<script>
    function initMap() {
        var arr = [];

        @foreach($labs as $lab)
            arr.push({
                "name": "{{$lab->name}}",
                "address": "{{$lab->getAddressString()}}"
            });
        @endforeach

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15
        });

        var bounds = new google.maps.LatLngBounds();
        var geocoder = new google.maps.Geocoder();
        arr.forEach((lab) => {
           geocodeAddress(geocoder, map, bounds, lab);
        });
    }

    function geocodeAddress(geocoder, resultsMap, bounds, lab) {
        geocoder.geocode({'address': lab.address}, function(results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location,
                    label: {
                        color: 'red',
                        fontWeight: 'bold',
                        text: lab.name
                    },
                    icon: {
                        url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                        size: new google.maps.Size(50, 80),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(10, 32)
                    }
                });

                bounds.extend(results[0].geometry.location);
                resultsMap.fitBounds(bounds);
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
</script>

@endsection