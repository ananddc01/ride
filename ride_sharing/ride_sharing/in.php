<!DOCTYPE html>
<html>
<?php
echo "<div class='code-container'>";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ride_login";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $firstname = $_POST['firstname'];
    $phone = $_POST['phone'];

    $_SESSION['firstname1']=$_POST['firstname'];

    $sql = "INSERT INTO rider(firstname, phone) VALUES ('$firstname', '$phone')";

    if ($conn->query($sql) === TRUE) {
      header("Location: loction.php");
    } else {
        echo "<div class='error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $ans = $conn->query("Select id from users where phone = $phone");
    $r = $ans->fetch_assoc()['id'];
    $conn->close();
}
echo "</div>";
?>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Trio Bikes</title>


  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              Trio Bikes
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="in.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.php"> Services </a>
                </li>
               <!-- <li class="nav-item">
                  <a class="nav-link" href="news.html"> News</a>
                </li>
                -->
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login1.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-7 ">
            <div class="box">
              <div class="detail-box">
                <h4>
                  Welcome to
                </h4>
                <h1>
                  TRIO BIKES
                </h1>
              </div>
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">

                    <div class="img-box">
                      <img src="images/slider-img.png" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box">
                      <img src="images/fz.png" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box">
                      <img src="images/passion.png" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box">
                      <img src="images/hero1.png" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box">
                      <img src="images/hero2.png" alt="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="btn-box">
                <a href="" class="btn-1">
                  Read More
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-5 ">
            <div class="slider_form">
              <h4>
                Get A Bikes Now
              </h4>
              <form  action="in.php" method="post">
                <input type="text" placeholder="Name"  id="firstname" name="firstname" required>
                <input type="number" placeholder="Phone Number" name="phone" id="phone">
                <div class="btm_input">
                 <!-- <input type="text" placeholder="Your Phone Number"> -->
                  <button>Get Location</button> <!-- <a href="loction.php" class="new"> -->
  
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-5 offset-lg-2 offset-md-1">
          <div class="detail-box">
            <h2>
              About <br>
              Taxi Company
            </h2>
            <p>
            A bike-sharing platform allows users for short-term use, providing an eco-friendly,
             convenient mode of transportation for cities and communities. Typically, bikes are available ,
              where users can pick up and drop off bikes at various locations.
              The platform often includes features like GPS tracking, pricing per ride or time intervals.
               Bike-sharing programs aim to reduce traffic congestion, improve air quality, and promote healthier lifestyles.  	
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our <br>
          Taxi Services
        </h2>
      </div>
      <div class="service_container">
        <div class="box">
          <div class="img-box">
            <img src="images/delivery-man.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Private Driver
            </h5>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="box">
      <!--    <div class="img-box">
            <img src="images/airplane.png" alt="">
          </div>
      
          <div class="detail-box">
            <h5>
              Airport Transfer
            </h5>
            <p>
              Lorem ipsum dolor sit ame
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        --> 
        <div class="box">
          <div class="img-box">
            <img src="images/backpack.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Luggage Transfer
            </h5>

            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->

  

  <!-- client section -->


  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          What <br>
          Client <br>
          Says
        </h2>
      </div>
      <div class="client_container">
        <div class="carousel-wrap ">
          <div class="owl-carousel">
            <div class="item">
              <div class="box">
                <div class="img-box">
                  <img src="images/client-1.png" alt="">
                </div>
                <div class="detail-box">
                  <h3>
                    Aliqua
                  </h3>
                  <p>
                  Service is good. But they go a little fast than normal.
                  </p>
                  <img src="images/quote.png" alt="">
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box">
                <div class="img-box">
                  <img src="images/client-2.png" alt="">
                </div>
                <div class="detail-box">
                  <h3>
                    Liqua
                  </h3>
                  <p>
                  Used it a lot last year and safe to say most of the drivers rode them safely except for one. Would definitely recomend it for short distances 👍🏼
                  </p>
                  <img src="images/quote.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- contact section -->

  <section class="contact_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Any Problems <br>
          Any Questions
        </h2>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5  offset-md-1">
          <div class="contact_form">
            <h4>
              Get In touch
            </h4>
            <form action="https://api.web3forms.com/submit" method="POST" id="form">
              <input type="hidden" name="access_key" value="037e0273-3c6f-4751-8578-36c0a1136710" />
              <input type="hidden" name="subject" value="Trio Bikes" />
              <input type="checkbox" name="botcheck" id="" style="display: none;" />
              
              <input type="text" placeholder="Name"   name="name" id="first_name" />  
              <input type="text" placeholder="Email" name="email" id="email"  />
              <input type="text" placeholder="Phone Number" name="phone" id="phone"/>
              <input type="text" placeholder="Message" class="message_input" name="message" id="message" >
              <button type="submit" >Send</button>
              <p  id="result"></p>
            </form>
          </div>
        </div>
        <div class="col-md-6 px-0">
          <div class="img-box">
            <img src="images/contact-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->


  <!-- why section -->

  <section class="why_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Why <br>
          Choose Us
        </h2>
      </div>
      <div class="why_container">
        <div class="box">
          <div class="img-box">
            <img src="images/delivery-man-white.png" alt="" class="img-1">
            <img src="images/delivery-man-black.png" alt="" class="img-2">
          </div>
          <div class="detail-box">
            <h5>
              Best Drivers
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/shield-white.png" alt="" class="img-1">
            <img src="images/shield-black.png" alt="" class="img-2">
          </div>
          <div class="detail-box">
            <h5>
              Safe and Secure
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/repairing-service-white.png" alt="" class="img-1">
            <img src="images/repairing-service-black.png" alt="" class="img-2">
          </div>
          <div class="detail-box">
            <h5>
              24x7 support
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end why section -->

  <!-- info section -->

  <section class="info_section layout_padding-top layout_padding2-bottom">
    <div class="container">
      <div class="box">
        <div class="info_links">
          <ul>
            <li class=" ">
              <a class="" href="in.php">Home <span class="sr-only">(current)</span></a>
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
              <a class="" href="#">Logout</a>
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
  <!-- footer section -->

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
      }
    });
  </script>
  <!-- end owl carousel script -->

</body>

</html>