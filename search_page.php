<!doctype html>
<html lang="en">
  <head>

    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
    <link rel="stylesheet" href="asset/css/style.css" type="text/css">
    <link rel="stylesheet" href="asset/css/search_box.css" type="text/css">
    <link rel="stylesheet" href="asset/css/style2.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/ol-layerswitcher@3.0.0/src/ol-layerswitcher.css" />
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    <script src="https://unpkg.com/ol-layerswitcher@3.0.0"></script>
    <link href="https://unpkg.com/ol-geocoder/dist/ol-geocoder.min.css" rel="stylesheet">
      <script src="https://unpkg.com/ol-geocoder"></script>
    <title>OpenLayers example</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="topnav">
      <a class="active" href="index.php">Home</a>
      <a href="#about">About</a>
      <div class="search-container">
        <form action="search_page.php">
          <input type="text" placeholder="Nama" name="cari">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
    <div id="map" class="map"></div>
    <div id="popup" class="ol-popup">
      <a href="#" id="popup-closer" class="ol-popup-closer"></a>
      <div id="popup-content"></div>
    </div>
  </body>
    <script type="text/javascript">
<?php
  $cari = $_GET['cari'];
 ?>
    var search = new ol.layer.Vector({
      source: new ol.source.Vector({
        format: new ol.format.GeoJSON(),
        url:'shp/coba2.php?cari=<?php echo $cari;?>'
      }),
      style: new ol.style.Style({
        image: new ol.style.Icon(({
          anchor: [0.5, 46],
          anchorXUnits: 'fraction',
          anchorYUnits: 'pixels',
          src: 'asset/gambar/search.png'
        }))
      })
    });

    var vectorLayer = new ol.layer.Vector({
      type: 'base',
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



    var smk_swasta = new ol.layer.Vector({
      title: 'SMK Swasta',
      source: new ol.source.Vector({
        format: new ol.format.GeoJSON(),
        url: 'shp/get_smk_swasta.php'
      }),
      style: new ol.style.Style({
        image: new ol.style.Icon(({
          anchor: [0.5, 46],
          anchorXUnits: 'fraction',
          anchorYUnits: 'pixels',
          src: 'https://img.icons8.com/color/35/000000/school-building.png'
        }))
      })
    });
    var smk_negeri = new ol.layer.Vector({
      title: 'SMK Negeri',
      source: new ol.source.Vector({
        format: new ol.format.GeoJSON(),
        url: 'shp/get_smk_negeri.php'
      }),
      style: new ol.style.Style({
        image: new ol.style.Icon(({
          anchor: [0.5, 46],
          anchorXUnits: 'fraction',
          anchorYUnits: 'pixels',
          src: 'https://img.icons8.com/color/35/000000/school-building.png'
        }))
      })
    });
    var pt_negeri = new ol.layer.Vector({
      title: 'Perguruan Tinggi Negeri',
      source: new ol.source.Vector({
        format: new ol.format.GeoJSON(),
        url: 'shp/get_pt_negeri.php'
      }),
      style: new ol.style.Style({
        image: new ol.style.Icon(({
          anchor: [0.5, 46],
          anchorXUnits: 'fraction',
          anchorYUnits: 'pixels',
          src: 'https://img.icons8.com/color/35/000000/student-male.png'
        }))
      })
    });
    var pt_swasta = new ol.layer.Vector({
      title: 'Perguruan Tingi Swasta',
      source: new ol.source.Vector({
        format: new ol.format.GeoJSON(),
        url: 'shp/get_pt_swasta.php'
      }),
      style: new ol.style.Style({
        image: new ol.style.Icon(({
          anchor: [0.5, 46],
          anchorXUnits: 'fraction',
          anchorYUnits: 'pixels',
          src: 'https://img.icons8.com/color/35/000000/student-male.png'
        }))
      })
    });

    var map = new ol.Map({
      target: 'map',
      layers: [
        new ol.layer.Group({
            title: 'Smk',
            layers: [
              new ol.layer.Tile({
                source: new ol.source.OSM()
              }),vectorLayer ,search
            ]
        }),
        new ol.layer.Group({
            title: 'Perguruan Tinggi',
            layers: [

            ]
        })


      ],
      view: new ol.View({
        center: ol.proj.fromLonLat([101.437062, 0.505487]),
        zoom: 12
      })
    });
            /*switch layer*/
    map.addControl(new ol.control.LayerSwitcher());

    var geocoder = new Geocoder('nominatim', {
    provider: 'osm',
    lang: 'en',
    placeholder: 'Search for ...',
    limit: 5,
    debug: false,
    autoComplete: true,
    keepOpen: true
  });
  map.addControl(geocoder);

  //Listen when an address is chosen
  geocoder.on('addresschosen', function (evt) {
  	console.info(evt);
    window.setTimeout(function () {
      popup.show(evt.coordinat, evt.address.formatted);
    }, 3000);
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
    content += '<h5>' + feature.get('Alamat') + '</h5>';
    content += '<img width="500px" height="200px" src="data:image/jpeg;base64,' + feature.get('Foto')+'">';

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
