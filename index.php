<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    <style>
      .map {
        height: 600px;
        width: 800px;
      }
    </style>
    <title>OpenLayers example</title>
  </head>
  <body>
    <h2>My Map</h2>
    <div id="map" class="map"></div>
    <div id="popup" class="ol-popup">
      <a href="#" id="popup-closer" class="ol-popup-closer"></a>
      <div id="popup-content"></div>
    </div>
  </body>
    <script type="text/javascript">
    var vectorLayer = new ol.layer.Vector({
      source: new ol.source.Vector({
        format: new ol.format.GeoJSON(),
        url: 'shp/DaerahPKU.json'
      }),
      style: new ol.style.Style({
        fill: new ol.style.Fill({
          color: 'rgba(30, 255, 255, 0.6)'
        }),
        stroke: new ol.style.Stroke({
          color: 'white'
        })
      })
    });

    /*var titik_perternakan = new ol.layer.Vector({
      source: new ol.source.Vector({
        format: new ol.format.GeoJSON(),
        url: 'shp/Peternakan.json'
      }),
      style: new ol.style.Style({
        image: new ol.style.Icon(({
          anchor: [0.5, 46],
          anchorXUnits: 'fraction',
          anchorYUnits: 'pixels',
          src: 'https://cdn2.iconfinder.com/data/icons/emoji-32/96/2.Emoji-Shy-16.png'
        }))
      })
    });*/

    var smp = new ol.layer.Vector({
      source: new ol.source.Vector({
        format: new ol.format.GeoJSON(),
        url: 'shp/kel.json'
      }),
      style: new ol.style.Style({
        image: new ol.style.Icon(({
          anchor: [0.5, 46],
          anchorXUnits: 'fraction',
          anchorYUnits: 'pixels',
          src: 'https://cdn4.iconfinder.com/data/icons/halloween-01/128/Castle-16.png'
        }))
      })
    });

    var map = new ol.Map({
      target: 'map',
      layers: [
        new ol.layer.Tile({
          source: new ol.source.OSM()
        }),
        vectorLayer,
        smp
        /*titik_perternakan,*/
      ],
      view: new ol.View({
        center: ol.proj.fromLonLat([101.437062, 0.505487]),
        zoom: 12
      })
    });

    var container = document.getElementById('popup'),
    content_element = document.getElementById('popup-content'),
    closer = document.getElementById('popup-closer');

    closer.onclick = function() {
    overlay.setPosition(undefined);
    closer.blur();
    return false;
    };

    var overlay = new ol.Overlay({
    element: container,
    autoPan: true,
    offset: [0, -10]
    });

    map.addOverlay(overlay);

    var fullscreen = new ol.control.FullScreen();
    map.addControl(fullscreen);

    map.on('click', function(evt){
    var feature = map.forEachFeatureAtPixel(evt.pixel,
    function(feature, layer) {
    return feature;
    });
    if (feature) {
    var geometry = feature.getGeometry();
    var coord = geometry.getCoordinates();

    var content = '<h3>' + feature.get('Nama_Sekol') + '</h3>';
    content += '<h5>' + feature.get('Jenis') + '</h5>';

    content_element.innerHTML = content;
    overlay.setPosition(coord);

    console.info(feature.getProperties());
    }
    });
    map.on('pointermove', function(e) {
    if (e.dragging) return;

    var pixel = map.getEventPixel(e.originalEvent);
    var hit = map.hasFeatureAtPixel(pixel);

    map.getTarget().style.cursor = hit ? 'pointer' : '';
    });
    </script>
</html>