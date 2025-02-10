<?php
   $con=mysqli_connect("localhost","ID","PASSWORD","DATABASE");
   // Check connection
   if(mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   $result = mysqli_query($con,"SELECT * FROM tbl_weather ORDER BY w_ID DESC LIMIT 30 ");

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Weather App</title>
    

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/features/">
    <script src="https://kit.fontawesome.com/2363f97efc.js" crossorigin="anonymous"></script>
    
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon-32x32.png">
    <script src="jquery.js" type="text/javascript"></script>
    <script src="jquery.lazyload.js" type="text/javascript"></script>

    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .button {
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
      }
      .button2 {
        background-color: white; 
        color: black; 
        border: 2px solid #008CBA;
      }

      .button2:hover {
        background-color: #008CBA;
        color: white;
      }
      #btn-back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="features.css" rel="stylesheet">
  </head>
  <body>

  <button
        type="button"
        class="btn btn-danger btn-floating btn-lg"
        id="btn-back-to-top"
        >
        <span data-feather="arrow-top"></span>
  </button>
    
  <div class="container px-4 py-5" id="icon-grid" >
    <h2 class="pb-2 border-bottom">Weather app</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
          <a class="button button2" href="./first_call.html">Go to weather app</a>
    </div>
  </div>
  <div class="b-example-divider"></div>

  <div class="container px-4 py-5" id="icon-grid" >
    <h2 class="pb-2 border-bottom">Weather Archives</h2>

  
  

<?php
     
    $id = 1;
    while($row = mysqli_fetch_array($result)) {
      echo'<div class="container px-4 py-5 " id="icon-grid" >';

      echo '<div class="col d-flex align-items-start"><div><h4 class="fw-bold mb-0 text-muted">' . $id. '</h4><span data-feather="bar-chart-2"></span></div></div>';

      echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5"><div class="col d-flex align-items-start"><div class=" bg-info rounded">';
      echo '<img id="icon" src="http://openweathermap.org/img/wn/'. $row['w_icon'] . '@4x.png" width="100px" height="100px"></div></div>';
      
      echo '<div class="col d-flex align-items-start"><div><h4 class="fw-bold mb-0 text-info ">Loaction</h4><span data-feather="map-pin"></span>';
      echo '<span id="city" class="text-primary">'. $row['w_city'] . '</span></div></div>';
        
      echo '<div class="col d-flex align-items-start"><div> <h4 class="fw-bold mb-0 text-info">Temp : </h4><span data-feather="thermometer"></span>';
      echo'<span id="tem" class="text-primary">' . $row['w_tem'] . '</span></div></div>';
       
      echo '<div class="col d-flex align-items-start"><div><h4 class="fw-bold mb-0 text-info">Weather : </h4><span data-feather="feather"></span>';
      echo '<span id="weather" class="text-primary"> ' . $row['w_weather'] . '</span></div></div>';
      
      echo '<div class="col d-flex align-items-start"><div><h4 class="fw-bold mb-0 text-muted">Discription : </h4><span data-feather="bar-chart-2"></span>';
      echo '<span id="description" class="text-primary">'. $row['w_description'] . '</span></div></div>';
      
      echo ' <div class="col d-flex align-items-start"><div><h4 class="fw-bold mb-0 text-muted">Wind speed : </h4><span data-feather="wind"></span>';
      echo ' <span id="wind_speed" class="text-primary">' . $row['w_wind_speed'] .'</span></div></div>';
      
      echo '<div class="col d-flex align-items-start"><div><h4 class="fw-bold mb-0 text-muted">Humidity : </h4><span data-feather="droplet"></span>';
      echo '<span id="humidity" class="text-primary">' . $row['w_humidity'] . '</span></div></div>';
      
      echo '<div class="col d-flex align-items-start"><div><h4 class="fw-bold mb-0 text-muted">Feels like : </h4><span data-feather="user"></span>';
      echo '<span id="feels_like" class="text-primary">' . $row['w_feels_like'].'</span></div></div>';

      echo '<div class="col d-flex align-items-start"><div><h4 class="fw-bold mb-0 text-muted">Clouds : </h4><span data-feather="cloud"></span>';
      echo '<span id="clouds" class="text-primary">' . $row['w_clouds'] . '</span></div></div>';

      echo '<div class="col d-flex align-items-start"><div><h4 class="fw-bold mb-0 text-muted">Country : </h4><span data-feather="map"></span>';
      echo '<span id="country" class="text-primary">' . $row['w_country'] . '</span></div></div>';

      echo '<div class="col d-flex align-items-start"><div><h4 class="fw-bold mb-0 text-muted">Min temp. : </h4> <span data-feather="minus"></span>';
      echo '<span id="min_tem" class="text-primary">' . $row['w_min_tem'] . '</span></div></div>';

      echo '<div class="col d-flex align-items-start"><div><h4 class="fw-bold mb-0 text-muted">Max temp. : </h4><span data-feather="plus"></span>';
      echo '<span id="max_tem" class="text-primary">' . $row['w_max_tem'] . '</span></div></div>';
      
      echo '<div class="col d-flex align-items-start"><div><h4 class="fw-bold mb-0 text-muted">Wind deg. : </h4><span data-feather="compass"></span>';
      echo '<span id="wind_deg" class="text-primary">' . $row['w_wind_speed'] .'</span></div></div>';
      
      echo '<div class="col d-flex align-items-start"><div> <h4 class="fw-bold mb-0 text-muted"> Pressure : </h4><span data-feather="chevrons-down"></span>';
      echo '<span id="pressure" class="text-primary">' . $row['w_pressure'] . '</span></div></div>';

      echo '<div class="col d-flex align-items-start"><div><h4 class="fw-bold mb-0 text-muted">Stored date : </h4><span data-feather="clock"></span>';
      echo '<span id="fetched" class="text-primary">' . $row['w_fetched'] . '</span></div></div></div></div>';
      
      $id = $id + 1;
   }
   mysqli_close($con);
?>
            
              
          </tbody>
        </table>
      </div>

  <script>

    $(function() {
    $("img.lazy").lazyload();
    });


    //Get the button
    let mybutton = document.getElementById("btn-back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
      scrollFunction();
    };

    function scrollFunction() {
      if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
      ) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", backToTop);

    function backToTop() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>

  
      
  </body>
</html>
