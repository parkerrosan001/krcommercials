<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>KR Commercial Interiors Inc. | <?php echo $page_title; ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>assets/images/fav-icon-fl.png">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/flaticon.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/slicknav.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/slick.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/styles.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom-ca.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/responsive.css">
  <script src="<?php echo base_url() ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

  <header class="header-area " id="sticky-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-9 col-sm-8 col-6">
          <div class="logo">
            <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/logo-black.png" alt="" class="logo-ca"></a>
          </div>
        </div>
        <div class="col-lg-9 d-none d-lg-block">
          <div class="mainmenu">
            <ul id="navigation">
              <?php
              if (!isset($_SESSION['selected_branch'])) {
                $url = base_url() . 'home';
              } else {
                if ($_SESSION['selected_branch'] == 'FL') {
                  $url = base_url() . 'home/landing/FL';
                }
                if ($_SESSION['selected_branch'] == 'CAL') {
                  $url = base_url() . 'home/landing/CAL';
                }
              }
              ?>
              <li class="<?php if (isset($_SESSION['current_page']) && $_SESSION['current_page'] == 'Home') {
                            echo 'active';
                          } ?>"><a href="<?php echo $url; ?>">Home</a>
              </li>
              <li class="<?php if (isset($_SESSION['current_page']) && $_SESSION['current_page'] == 'Services') {
                            echo 'active';
                          } ?>"><a href="<?php echo base_url() ?>services">Services</a>
              </li>
              <li class="<?php if (isset($_SESSION['current_page']) && $_SESSION['current_page'] == 'Projects') {
                            echo 'active';
                          } ?>"><a href="<?php echo base_url() ?>projects">Projects</a>
              </li>
              <li class="<?php if (isset($_SESSION['current_page']) && $_SESSION['current_page'] == 'Our Staff') {
                            echo 'active';
                          } ?>"><a href="<?php echo base_url() ?>staff">Our Staff</a></li>
              <li class="<?php if (isset($_SESSION['current_page']) && $_SESSION['current_page'] == 'Contact Us') {
                            echo 'active';
                          } ?>"><a href="<?php echo base_url() ?>contactus">Contact Us</a></li>
              <?php
              if (isset($_SESSION['logged_in_id'])) {
              ?>
                <li class="dropdown">
                  <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"> <?php if (isset($_SESSION['logged_in_name'])) {
                                                                      echo $_SESSION['logged_in_name'];
                                                                    } ?> <i class="fa fa-caret-down" aria-hidden="true"></i></button>
                    <div id="myDropdown" class="dropdown-content">
                      <a href="<?php echo base_url() ?>FileSystem">File System</a>
                      <a href="<?php echo base_url() ?>account/myAccount">Profile</a>
                      <a href="<?php echo base_url() ?>account/logout">Logout</a>
                    </div>
                  </div>
                </li>
              <?php
              } else {
              ?>
                <li><a href="<?php echo base_url() ?>account">Sign In</a></li>
              <?php
              }
              ?>

            </ul>
          </div>
        </div>

        <div class="col-lg-1 col-md-3 col-5 d-lg-none d-sm-block">
          <div class="responsive-menu-wrap floatright"></div>
        </div>
      </div>
    </div>
  </header>
  <!-- header-area end -->

  <?php $this->load->view($view_to_load); ?>

  <!-- footer-area start -->
  <footer class="footer-area">
    <div class="footer-top bg-1">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-6 col-12">
            <div class="footer-widget footer-logo">
              <img src="<?php echo base_url() ?>assets/images/logo-black.png" alt="">
              <p>KR Commercial Interiors Inc. offers a wide variety of service to the Hotel Owner. From budget development to project
                close out, every detail is important</p>
            </div>
          </div>

          <div class="col-lg-2 col-sm-6 col-12">
            <div class="footer-widget footer-menu">
              <h4 class="widget-title">Services</h4>
              <ul>
                <li><a href="<?php echo base_url() ?>home/landing">Home</a></li>
                <li><a href="<?php echo base_url() ?>services">Services</a></li>
                <li><a href="<?php echo base_url() ?>projects">Projects</a></li>
                <li><a href="<?php echo base_url() ?>staff">Our Staff</a></li>
                <li><a href="<?php echo base_url() ?>contactus">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-12">
            <div class="footer-widget footer-contact">
              <h4 class="widget-title">GET IN TOUCH</h4>
              <ul>
                <li><i class="fa fa-home"></i> 1011 East Lacy Avenue Anaheim, CA 92805, USA</li>
                <li><i class="fa fa-phone"></i> (714) 516 2100</li>
                <li><i class="fa fa-fax"></i> (714) 516 2110</li>
                <li><i class="fa fa-envelope"></i> scot@kr-commercial.com</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-12">
            <div class="footer-widget social-media">
              <h4 class="widget-title">Social Media</h4>
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li><br>
                <h4 class="widget-title">Have an account?</h4>
                <li><a href="<?php echo base_url() ?>account" class="login-btn">Sign In</a></li>
                <li><a href="<?php echo base_url() ?>account/signup" class="login-btn">Sign Up</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 text-center">
          <p>&copy; Copyright <script>
              document.write(new Date().getFullYear());
            </script> <a href="index-ca.html" class="theme-color-2">KR Commercial Interior Inc.</a> All rights reserved </p>
        </div>
      </div>
    </div>
  </footer>

  <script src="<?php echo base_url() ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/vendor/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/slick.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
  <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_QD2_rlwEFGhCK0oj2n6cixsvX0D3zgk"></script>
  <script src="<?php echo base_url() ?>assets/admin_assets/file_system.js"></script>

  <script>
    $(function() {
      $('.file-input').on('change', function(e) {
        var file = this.files[0]
        $('#file-list-' + $(this).data('id')).append('<span>' + file.name + '</span>')
      })

      $('.file-input-button').on('click', function(e) {
        $('#file-input-' + $(this).data('id')).trigger('click');
      })
    })
  </script>

  <script>
    function initialize() {
      var mapOptions = {
        zoom: 15,
        scrollwheel: false,
        center: new google.maps.LatLng(40.712764, -74.005667),
        styles: [{
            "elementType": "geometry",
            "stylers": [{
              "color": "#f5f5f5"
            }]
          },
          {
            "elementType": "labels.icon",
            "stylers": [{
              "visibility": "off"
            }]
          },
          {
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#616161"
            }]
          },
          {
            "elementType": "labels.text.stroke",
            "stylers": [{
              "color": "#f5f5f5"
            }]
          },
          {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#bdbdbd"
            }]
          },
          {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
              "color": "#eeeeee"
            }]
          },
          {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#757575"
            }]
          },
          {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [{
              "color": "#e5e5e5"
            }]
          },
          {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#9e9e9e"
            }]
          },
          {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [{
              "color": "#ffffff"
            }]
          },
          {
            "featureType": "road.arterial",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#757575"
            }]
          },
          {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [{
              "color": "#dadada"
            }]
          },
          {
            "featureType": "road.highway",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#616161"
            }]
          },
          {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#9e9e9e"
            }]
          },
          {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [{
              "color": "#e5e5e5"
            }]
          },
          {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [{
              "color": "#eeeeee"
            }]
          },
          {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
              "color": "#c9c9c9"
            }]
          },
          {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#9e9e9e"
            }]
          }
        ]
      };

      var map = new google.maps.Map(document.getElementById('googleMap'),
        mapOptions);


      var marker = new google.maps.Marker({
        position: map.getCenter(),
        animation: google.maps.Animation.BOUNCE,
        map: map
      });

    }

    google.maps.event.addDomListener(window, 'load', initialize);
  </script>

  <script>
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>

  <script>
    function preview_image(event) {
      var reader = new FileReader();
      reader.onload = function() {

        var output = document.getElementById('output_image');
        output.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
</body>

</html>