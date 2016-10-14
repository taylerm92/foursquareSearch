<html>
  <head>
    <meta charset="UTF-8">
		<!-- Bootstrap MaxCDN -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/foursquareSearch/css/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD9DEz4zv2NRZjDOkLACx0LK4uhiIeq_8k"></script>
    <script type="text/javascript" src="/foursquareSearch/scripts/gmaps.js"></script>
    <style>
      html{
        background-image: url(/foursquareSearch/images/map.jpg);
        background-size: cover;
        background-repeat: no-repeat;
      }
    </style>
  </head>
  <body>
    <div class="container">
    <?php
      //foursquare specific php
      $client_id = 'MNXYPPHA5KJKSPMUA4T4X1FTWAXWBPMUXY0KM3U2GGIELKM0';
      $client_secret = 'QYPFEQHQHANLNCUJIPGRI0FKMJ5ZLMUQDIJE0SAAT403X5YR';

      $url = 'https://api.foursquare.com/v2/venues/search';     //set the resource link
      $url .= '?query='.urlencode($_GET['keyword']) ;           //set GET parameters
      $url .= '&near='.urlencode($_GET['name']) ;               //set GET parameters
      $url .= '&radius='.$_GET['radius'] ;                      //set GET parameters
      $url .= '&client_id='.$client_id ;                        //set GET parameters
      $url .= '&client_secret='.$client_secret ;                //set GET parameters
      $url .= '&v=20161005' ;                                   //set GET parameters  //specify today’s date

      $file = file_get_contents($url);
      $data = json_decode($file, true);
      $size = count($data['response']['venues']);
      $data1 = $data['response']['venues'];
      //echo $size;

      /*echo "<pre>";
      print_r($data);
      echo "</pre>";*/
      ?>
      <h3><a href="index.php" style="margin: 0 auto;">Search another keyword!</a></h3>
      <div id="map" style="width: 100%; height:50%"></div>
      <script type="text/javascript"> //map specific javascript
      $(document).ready(function(){
        map = new GMaps({
          div: '#map',
          lat: 34.3,
          lng: -94.14,
          zoom: 4,
        });

      <?php
      for($x=0; $x < $size; $x++)
      {
        if(isset($data1[$x]['name']))
        {
          $name = $data1[$x]['name'];
        }
        else{
          $name = '';
        }

        if(isset($data1[$x]['location']['address'])) //checks to see if there is an address
        {
          $address = $data1[$x]['location']['address'];
        }
        else
        {
          $address = '';
        }

        if(isset($data1[$x]['contact']['formattedPhone'])) //checks to see if there is a phone number
        {
          $phonenumber = $data1[$x]['contact']['formattedPhone'];
        }
        else
        {
          $phonenumber = '';
        }

        echo "map.addMarker({\n";
        echo "lat:".$data1[$x]['location']['lat'].",\n";
        echo "lng:".$data1[$x]['location']['lng'].",\n";
        echo "title: '".addslashes($name)."',\n";
        echo "infoWindow: {\n";
          echo "content: '<p>".addslashes($name)."<br>Address: ".$address."<br>Phone Number: ".$phonenumber."</p>'}\n";
        echo "});\n";
      }

    ?>
    });
  </script>
  </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
