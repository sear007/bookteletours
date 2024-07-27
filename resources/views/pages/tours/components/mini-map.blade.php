<div id="map"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApzzyJRobxpQIkW9Jm96ZTSM71EmzH-Ts&callback=initMap&v=weekly" defer></script>
@push('scripts')
<script>
    localStorage.setItem('show_title', '{{$title}}');
    localStorage.setItem('show_long', '{{$long}}');
    localStorage.setItem('show_lat', '{{$lat}}');
</script>
@endpush