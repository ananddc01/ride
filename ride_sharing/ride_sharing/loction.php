<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrioBikes</title>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.png">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
    <script src="assets/icons/font_awsome.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- css -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


    <link href="./loc_css/style.css" rel="stylesheet">
    <link href="./loc_css/map.css" rel="stylesheet">

      <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />

</head>

<body>
<div class="topbar">
        <a id="title" href="# ">TrioBikes</a>
        <div class="user">
            <p>
                <?php
                if (isset($_SESSION['firstname1'])) {
                    echo $_SESSION['firstname1'];
                } else {
                    echo "Asay";
                }
                ?>
            </p>
            <a href="#"><img src="download.jpeg" alt="PFP"></a>
        </div>

    </div>

    
    <div class="container col-md-3 map_container">
            <form class="mt-5" id="form" name="form" onsubmit="return handleSubmit()" method="post" action="https://api.web3forms.com/submit">
              <input type="hidden" name="access_key" value="037e0273-3c6f-4751-8578-36c0a1136710"  />
            <!--  <input type="hidden" name="access_key" value="72bee752-83b2-4840-80d8-674e43d39582" />
              <input type="hidden" name="access_key" value="01fca26e-58e9-493f-b014-1c57eb87681f" /> -->
              <input type="hidden" name="subject" value="Trio Bikes" />
              <input type="checkbox" name="botcheck" id="" style="display: none;" />

                <p class="select_route">Choose Route</p>
                <input type="text" id="from" placeholder="Origin" class="form-  control" name="from">
                <input type="text" id="to" placeholder="Destination" class="form-control" name="to">

                
                <div id="output"></div>
                <div class="rides hide">
                    <div class="ride">
                        <input type="radio" name="rupees" id="car" value= "0" />
                        <img src="bike4.png" alt="Vroom vroom" />
                        <div class="ride-name">Bike</div>
                        <div id="bike1" name="bike" > &#8377;0</div>
                    </div>
            
                    <button type="button" class="" onclick="calcRoute();" >Get Location</button>
                <button type="submit"  >Ask for ride</button>
                </div>
            </form>
        </div>

    <div class="container-fluid">
        <i class="fa-solid fa-angle-down down_arrow"></i>
        <div id="googleMap">
            
        </div>

    </div>

    <section class="info_section layout_padding-top layout_padding2-bottom">
    <div class="container">
      <div class="box">
        <div class="info_links">
          <ul>
            <li class=" ">
              <a class="" href="in.php">Home <span class="sr-only"></span></a>
            </li>
            <li class="">
              <a class="" href="about.php"> About</a>
            </li>
            <li class="">
              <a class="" href="service.php"> Services </a>
            </li>
            <!--
            <li class="">
              <a class="" href="news.html"> News</a>
            </li>
            -->
            <li class="">
              <a class="" href="contact.php">Contact Us</a>
            </li>
            <li class="">
              <a class="" href="login1.php">Logout</a>
            </li>
          </ul>
        </div>
        <div class="info_social">
          <div>
            <a href="">
              <img src="images/fb.png" alt="">
            </a>
          </div>
          <div>
            <a href="">
              <img src="images/twitter.png" alt="">
            </a>
          </div>
          <div>
            <a href="">
              <img src="images/linkedin.png" alt="">
            </a>
          </div>
          <div>
            <a href="">
              <img src="images/instagram.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- end info section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <div class="container">
      <p>
        &copy; 2025 All Rights Reserved By
        <a href="https://html.design/">Trio Bikes</a>
      </p>
    </div>
  </section>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>


  <!-- owl carousel script -->
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 20,
      navText: [],
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        1000: {
          items: 2
        }
      }s


    });
  </script>
  <!-- end owl carousel script -->


    <!-- <div class="earth3dmap-com"><iframe id="iframemap" src="https://maps.google.com/maps?q=surat&amp;ie=UTF8&amp;iwloc=&amp;output=embed" width="100%" height="500" frameborder="0" scrolling="no"></iframe><div style="color: #333; font-size: 14px; font-family: Arial, Helvetica, sans-serif; text-align: right; padding: 10px;">Map by <a style="color: #333; text-decoration: underline; font-size: 14px; font-family: Arial, Helvetica, sans-serif; text-align: right;" href="http://earth3dmap.com/?from=embed" target="_blank" >Earth3DMap.com</a></div> -->



    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSNW7Pt4PQZ7qxeT6rrTAQoBqpcw51KBE&libraries=places"></script> -->



    <script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,places,drawing&client=gme-snapchatinc&channel=on-demand"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="./loc_js/map.js"></script>
    

</body>

</html>