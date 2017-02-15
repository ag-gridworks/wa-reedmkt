
<!DOCTYPE html>
<html>
  <head>
    <title>PlaceID finder</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
      .controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      .controls:focus {
        border-color: #4d90fe;
      }

    </style>
  </head>
  <body>
    <input id="pac-input" class="controls" type="text"
        placeholder="Enter a location">
    <div id="map"></div>

<div style="width: 500px; height: 500px">
    <script>
      initMap();
    </script>
</div> 


    <button onclick="window.location.href="incteste.php?uid=1";">Clique</button>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAP4l1X0Zg34sb9_xw1J6vLbL3ENpK_X9g&libraries=places&signed_in=true&callback=initMap"
        async defer></script>
        <script src="js/main.js"></script>
  </body>
</html>