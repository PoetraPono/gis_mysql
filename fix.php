<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Jobstart &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="jobstart/css/bootstrap.min.css">
    <link rel="stylesheet" href="jobstart/css/magnific-popup.css">
    <link rel="stylesheet" href="jobstart/css/jquery-ui.css">
    <link rel="stylesheet" href="jobstart/css/owl.carousel.min.css">
    <link rel="stylesheet" href="jobstart/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="jobstart/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="jobstart/css/animate.css">
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/fl-bigmug-line.css">
  
    <link rel="stylesheet" href="jobstart/css/aos.css">

    <link rel="stylesheet" href="jobstart/css/style.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="openlayers-2.12/OpenLayers.js"></script>
<script type="text/javascript" src="FeaturePopups.js"></script>
<script type="text/javascript">
window.onload = function() {
 // set layer
 var osm = new OpenLayers.Layer.OSM('OSM');

 // set icon marker
 var icon = new OpenLayers.StyleMap({
  'externalGraphic': 'https://4.bp.blogspot.com/-XjraOOVhBpI/VuZqnqPVlrI/AAAAAAAABPQ/u6-6K7CpPhUlY9_DCO01sdqBTM-ho2BCQ/s320/merah.png',
  'graphicOpacity': 1.0,
  'graphicWith': 16,
  'graphicHeight': 32,
  'graphicYOffset': -32
 });

 var map = new OpenLayers.Map({
  // div element
  'div': 'map',

  // set center
  'center': new OpenLayers.LonLat(13125273.0316, -237257.9905),

  // set zoom
  'zoom': 6,

  // set layers
  'layers': [osm]
 });

 // set vector marker
 var vector_marker = new OpenLayers.Layer.Vector('Marker', {
  'styleMap': icon,
  'strategies': [new OpenLayers.Strategy.Fixed()],
  'protocol': new OpenLayers.Protocol.HTTP({
   'url': 'get_sekolah.php',
   'params': {},
   'format': new OpenLayers.Format.GeoJSON()
  })
 });

 // add to layer
 map.addLayer(vector_marker);


 // add merker point
 var marker = new OpenLayers.Layer.Markers('marker');
 map.addLayer(marker);

 // create event
 var singleEventListeners = {
  'beforepopupdisplayed': function(e) {
   var sel = e.selection;
   popup(sel.feature.attributes, true);
   return false;
  }
 }

 // Create control and add some layers
 var fp_control = new OpenLayers.Control.FeaturePopups({
  'boxSelectionOptions': {},
  'popupSingleOptions': {'eventListeners': singleEventListeners},
  'layers': [[vector_marker, {'templates': {'hover': '<b>${.Nama_Sekol}</b><br><p>Jenis : ${.Jenis}</p></br><p>Alamat : ${.Alamat}', 'single': ' ', 'item': '<li>${.title}</li>'}}]]
 });
 map.addControl(fp_control);
}

function popup(json, status) {
 if (status == true) {
  $('.background-popup').fadeIn(500);
  $('.popup').fadeIn(700);
  $('.popup > .popup-heading > .popup-heading-title').html(json.title);
  $('.popup > .popup-body').html(json.desc);

 } else if (status == false) {
  $('.background-popup, .popup').fadeOut('fast');
  $('.popup > .popup-heading > .popup-heading-title, .popup > .popup-body').html('');
 }
}
</script>
<style type="text/css">
 * { padding: 0; margin: 0; font-family: Arial; }
 .display-none { display: none; }
 .background-popup { position: relative; width: 100%; height: 100%; background-color: #000; opacity: 0.7; z-index: 999; }
 .popup { z-index: 9999; background-color: #FFF; position: absolute; left: 15%; right: 15%; top: 5%; bottom: 5%; }
 .popup > .popup-heading { padding: 15px; background-color: #DDD; }
 .popup > .popup-heading > .popup-heading-title { font-size: 22px; }
 .popup > .popup-heading > .close { position: absolute; right: 15px; top: 20px; font-weight: bold; cursor: pointer; }
 .popup > .popup-body { padding: 7px; font-size: 14px; }
</style>
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <header class="site-navbar py-1" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0"><a href="index.html" class="text-black h2 mb-0">Map<strong>riau</strong></a></h1>
          </div>

          <div class="col-10 col-xl-10 d-none d-xl-block">
            <nav class="site-navigation text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="index.html">Home</a></li>
                <li class="has-children">
                  <a href="category.html">Category</a>
                  <ul class="dropdown">
                    <li><a href="#">Full Time</a></li>
                    <li><a href="#">Part Time</a></li>
                    <li><a href="#">Freelance</a></li>
                    <li><a href="#">Internship</a></li>
                    <li><a href="#">Termporary</a></li>
                  </ul>
                </li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="new-post.html"><span class="rounded bg-primary py-2 px-3 text-white"><span class="h5 mr-2">+</span> Post a Job</span></a></li>
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right d-block">
            
            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
  
    </header>

 
   
   

    <div id="map" style="position: fixed; width: 100%; height: 100%;"></div>

   

     
   
    
  </div>

  <script src="jobstart/js/jquery-3.3.1.min.js"></script>
  <script src="jobstart/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="jobstart/js/jquery-ui.js"></script>
  <script src="jobstart/js/popper.min.js"></script>
  <script src="jobstart/js/bootstrap.min.js"></script>
  <script src="jobstart/js/owl.carousel.min.js"></script>
  <script src="jobstart/js/jquery.stellar.min.js"></script>
  <script src="jobstart/js/jquery.countdown.min.js"></script>
  <script src="jobstart/js/jquery.magnific-popup.min.js"></script>
  <script src="jobstart/js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&libraries=places&callback=initAutocomplete"
        async defer></script>

  <script src="jobstart/js/main.js"></script>
    
  </body>
</html>