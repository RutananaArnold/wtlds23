@extends('layouts.app')

@section('content')
<div class="container">
<div id="map"></div>
<script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: {lat: 0, lng: 0}
            });

            @foreach ($coordinates as $coordinate)
                new google.maps.Marker({
                    position: {lat: {{ $coordinate->latitude }}, lng: {{ $coordinate->longitude }}},
                    map: map,
                    title: '{{ $coordinate->name }}'
                });
            @endforeach
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpjvVBi25ib36YRHbPc7UHwZypsQ3wNJM&callback=initMap" async defer></script>
</div>

@endsection
