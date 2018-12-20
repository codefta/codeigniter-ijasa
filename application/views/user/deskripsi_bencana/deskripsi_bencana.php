<?php $this->load->view('user/partials/header');  ?>
<?php $this->load->view('user/partials/navbar'); ?>

<div class="container mb-3">
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h3 class="text-center"><?php echo $info->nama?></h3>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <!--card section-->
                        <img src="<?php echo base_url().'/uploads/infobencana/'.$info->foto ?>" style="width:100%;">
                    </div>
                    <div class="col-md-8">
                        <!--card section-->
                        <h4></h4>
                        <p><?php echo $info->deskripsi ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Lokasi</h4>
                        <input type="text" id="posisi" value="<?php echo $info->desa . ", ". $info->kecamatan .", " . $info->kabupaten . ", ". $info->provinsi?>" readonly class="form-control">
                    </div>
                    <div class="col-md-12 ">
                        <div id="map" style="width:100%; height:300px; background:grey" ></div>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col">
                        <h4>Kebutuhan Logistik</h4>
                    </div>
                    <div class="col-md-12 mb-3">
                      <h6>Makanan</h6>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="<?php foreach($logistik as $data){$var = $data['makan'];} $cent = 100; $total = $var/$info->makanan*$cent; echo "width: $total%;";?>"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="0"> <?php foreach($logistik as $data){echo $data['makan'];}  ?> dari <?php echo $info->makanan ?></div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <h6>Pakaian</h6>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="<?php foreach($logistik as $data){$var = $data['pakai'];} $cent = 100; $total = $var/$info->pakaian*$cent; echo "width: $total%;"; ?>" aria-valuenow="100" aria-valuemin="0" aria-valuemax="0"> <?php foreach($logistik as $data){echo $data['pakai'];}  ?> dari <?php echo $info->pakaian ?></div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <h6>Buku</h6>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="<?php foreach($logistik as $data){$var = $data['buku'];}$cent = 100; $total = $var/$info->buku*$cent; echo "width: $total%;"; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="0"><?php foreach($logistik as $data){echo $data['buku'];}  ?> dari <?php echo $info->buku ?></div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <h6>Kendaraan</h6>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="<?php foreach($logistik as $data){$var = $data['kendaraan'];} $cent = 100; $total = $var/$info->kendaraan*$cent; echo "width: $total%;"; ?>"  aria-valuemin="0" aria-valuemax="0"><?php foreach($logistik as $data){echo $data['kendaraan'];}  ?> dari <?php echo $info->kendaraan ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 "><a href="<?php echo site_url('deskripsibencana/donasi_bencana/'.$info->idbencana) ?>" class="btn btn-success float-right">Donasi</a></div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>

<script>
function geocode(platform) {
  var geocoder = platform.getGeocodingService(),
    geocodingParameters = {
      searchText: document.getElementById('posisi').value,
      jsonattributes : 1
    };

  geocoder.geocode(
    geocodingParameters,
    onSuccess,
    onError
  );
}
/**
 * This function will be called once the Geocoder REST API provides a response
 * @param  {Object} result          A JSONP object representing the  location(s) found.
 *
 * see: http://developer.here.com/rest-apis/documentation/geocoder/topics/resource-type-response-geocode.html
 */
function onSuccess(result) {
  var locations = result.response.view[0].result;
 /*
  * The styling of the geocoding response on the map is entirely under the developer's control.
  * A representitive styling can be found the full JS + HTML code of this example
  * in the functions below:
  */
  addLocationsToMap(locations);
  addLocationsToPanel(locations);
  // ... etc.
}

/**
 * This function will be called if a communication error occurs during the JSON-P request
 * @param  {Object} error  The error message received.
 */
function onError(error) {
  alert('Ooops!');
}




/**
 * Boilerplate map initialization code starts below:
 */

//Step 1: initialize communication with the platform
var platform = new H.service.Platform({
  app_id: 'zoDHH444a9wiHiHbqjC8',
  app_code: 'oV6qmg31FHGur7Cwm3Hlcg',
  useHTTPS: true
});
var pixelRatio = window.devicePixelRatio || 1;
var defaultLayers = platform.createDefaultLayers({
  tileSize: pixelRatio === 1 ? 256 : 512,
  ppi: pixelRatio === 1 ? undefined : 320
});

//Step 2: initialize a map - this map is centered over California
var map = new H.Map(document.getElementById('map'),
  defaultLayers.normal.map,{
  center: {lat:37.376, lng:-122.034},
  zoom: 15,
  pixelRatio: pixelRatio
});

var locationsContainer = document.getElementById('panel');

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Create the default UI components
var ui = H.ui.UI.createDefault(map, defaultLayers);

// Hold a reference to any infobubble opened
var bubble;

/**
 * Opens/Closes a infobubble
 * @param  {H.geo.Point} position     The location on the map.
 * @param  {String} text              The contents of the infobubble.
 */
function openBubble(position, text){
 if(!bubble){
    bubble =  new H.ui.InfoBubble(
      position,
      {content: text});
    ui.addBubble(bubble);
  } else {
    bubble.setPosition(position);
    bubble.setContent(text);
    bubble.open();
  }
}

/**
 * Creates a series of list items for each location found, and adds it to the panel.
 * @param {Object[]} locations An array of locations as received from the
 *                             H.service.GeocodingService
 */
function addLocationsToPanel(locations){

  var nodeOL = document.createElement('ul'),
    i;

  nodeOL.style.fontSize = 'small';
  nodeOL.style.marginLeft ='5%';
  nodeOL.style.marginRight ='5%';


   for (i = 0;  i < locations.length; i += 1) {
     var li = document.createElement('li'),
        divLabel = document.createElement('div'),
        address = locations[i].location.address,
        content =  '<strong style="font-size: large;">' + address.label  + '</strong></br>';
        position = {
          lat: locations[i].location.displayPosition.latitude,
          lng: locations[i].location.displayPosition.longitude
        };

      content += '<strong>houseNumber:</strong> ' + address.houseNumber + '<br/>';
      content += '<strong>street:</strong> '  + address.street + '<br/>';
      content += '<strong>district:</strong> '  + address.district + '<br/>';
      content += '<strong>city:</strong> ' + address.city + '<br/>';
      content += '<strong>postalCode:</strong> ' + address.postalCode + '<br/>';
      content += '<strong>county:</strong> ' + address.county + '<br/>';
      content += '<strong>country:</strong> ' + address.country + '<br/>';
      content += '<br/><strong>position:</strong> ' +
        Math.abs(position.lat.toFixed(4)) + ((position.lat > 0) ? 'N' : 'S') +
        ' ' + Math.abs(position.lng.toFixed(4)) + ((position.lng > 0) ? 'E' : 'W');

      divLabel.innerHTML = content;
      li.appendChild(divLabel);

      nodeOL.appendChild(li);
  }

  locationsContainer.appendChild(nodeOL);
}


/**
 * Creates a series of H.map.Markers for each location found, and adds it to the map.
 * @param {Object[]} locations An array of locations as received from the
 *                             H.service.GeocodingService
 */
function addLocationsToMap(locations){
  var group = new  H.map.Group(),
    position,
    i;

  // Add a marker for each location found
  for (i = 0;  i < locations.length; i += 1) {
    position = {
      lat: locations[i].location.displayPosition.latitude,
      lng: locations[i].location.displayPosition.longitude
    };
    marker = new H.map.Marker(position);
    marker.label = locations[i].location.address.label;
    group.addObject(marker);
  }

  group.addEventListener('tap', function (evt) {
    map.setCenter(evt.target.getPosition());
    openBubble(
       evt.target.getPosition(), evt.target.label);
  }, false);

  // Add the locations group to the map
  map.addObject(group);
  map.setCenter(group.getBounds().getCenter());
}

// Now use the map as required...
geocode(platform);

</script>
<?php $this->load->view('user/partials/footer'); ?>
<?php $this->load->view('user/partials/js'); ?>
<?php $this->load->view('user/partials/closing_tag'); ?>