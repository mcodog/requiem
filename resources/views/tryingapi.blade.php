<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Point Distance</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://unpkg.com/@turf/turf/turf.min.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css' rel='stylesheet' />

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
  </head>
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    #map {
      position: absolute;
      top: 0;
      bottom: 0;
      width: 100%;
    }

    #map-overlay {
      position: absolute;
      top: 0;
      right: 0;
      background: rgba(255, 255, 255, 0.8);
      margin-right: 20px;
      margin-top: 20px;
      padding: 10px 0 0 10px;
      font-family: Arial, sans-serif;
      overflow: auto;
      width: 200px;
      height: 50px;
      border-radius: 3px;
    }

  </style>

  <body>
    <div class="container m-5 p2"><h3 class="">Transaction Beta</h3></div>
    
    <script>
    console.log('init');
      mapboxgl.accessToken = 'pk.eyJ1IjoibWNvZG9nMDQxMiIsImEiOiJjbHNoeWZyaWgyYmtiMm1xdTg2N3hvM2t4In0.6pi6udJ9MWZWmyzhpn296g';
      var to = [120.5963, 15.4755] //lng, lat
      var from = [121.015208, 14.56232] //lng, lat 
      var options = {
        units: 'miles'
      }; 
      var distance = turf.distance(to, from, options);

      async function GetNearest() {
            <?php
            
            echo "let el_down = document.getElementById('near_location');let nearest_distance = 10000;var url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/'+ document.getElementById('customer_location').value +'.json?access_token=pk.eyJ1IjoibWNvZG9nMDQxMiIsImEiOiJjbHNoeWZyaWgyYmtiMm1xdTg2N3hvM2t4In0.6pi6udJ9MWZWmyzhpn296g';
            var obj = await (await fetch(url)).json();
            console.log(obj);";

            echo "let customer_coordinates = obj.features[1].geometry.coordinates;";

            foreach($branch as $branches) {
                $place = $branches->location;

            echo "var url2 = 'https://api.mapbox.com/geocoding/v5/mapbox.places/" . $place .".json?access_token=pk.eyJ1IjoibWNvZG9nMDQxMiIsImEiOiJjbHNoeWZyaWgyYmtiMm1xdTg2N3hvM2t4In0.6pi6udJ9MWZWmyzhpn296g';
            var obj = await (await fetch(url2)).json();
            
            //console.log(obj);
            console.log(obj);
            console.log(obj.features[1].geometry.coordinates);";

            echo "var distance = turf.distance(customer_coordinates, obj.features[1].geometry.coordinates, options);
                console.log(distance);
                 if(nearest_distance>distance) {
                    nearest_distance=distance;
                    nearest_branch = obj.features[1].place_name;
                    document.getElementById('near_location').value = '" . $place ."';
                }";
            }
            ?>

            console.log('Distance: ' + distance + ', Branch: ' + nearest_branch);
        }

    </script>
    <div class="container-lg m-5 p-2 d-flex justify-content-center flex-column align-items-md-center bg-light">
      <div class="container-sm m-5 p-2">
          <form>
          <div class="form-group d-flex flex-row">
            <div class="d-flex flex-column m-2">
              <label for="customer_location">Enter Shipment Location </label>
              <input type="text" class="form-control" id="customer_location">
            </div>
            <div class="d-flex flex-column m-2">
              <label for="near_location">Nearest Branch</label>
              <input type="text" class="form-control" id="near_location" readonly>
            </div>
            <div class="d-flex flex-column m-2 justify-content-center">
              <label for="nearest" class="text-light">.</label>
              <input type="button" class="btn btn-primary" value="Find Nearest" id="nearest" onclick="myFunction()">
            </div>
          </div>
          <div class="form-group">

          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
    
    <script>
        function myFunction() {
            console.log(document.getElementById('customer_location').value);
            GetNearest();
        }
    </script>

  </body>

</html>