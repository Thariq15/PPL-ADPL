<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ngopi Sedoyo</title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset("assets-landing/img/favicon.png") }}" rel="icon">
  <link href="{{ asset("assets-landing/img/apple-touch-icon.png") }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset("assets-landing/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
  <link href="{{ asset("assets-landing/vendor/bootstrap-icons/bootstrap-icons.css") }}" rel="stylesheet">
  <link href="{{ asset("assets-landing/vendor/glightbox/css/glightbox.min.css") }}" rel="stylesheet">
  <link href="{{ asset("assets-landing/vendor/swiper/swiper-bundle.min.css") }}" rel="stylesheet">
  <link href="{{ asset("assets-landing/vendor/aos/aos.css")}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset("assets-landing/css/main.css")}}" rel="stylesheet">

</head>
<body>
    

      <!-- ======= Header ======= -->
  <header class="header d-flex align-items-center sticky-top" id="header">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a class="logo d-flex align-items-center me-auto me-xl-0" href="index.html">

        <h1>Ngopisedoyo</h1>
        <span>.</span>
      </a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#kopi">Kopi</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

      @auth  
      @else
        <a href="{{ route('login') }}" class="btn-getstarted">Login</a>
      @endauth

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

      <img src="{{ asset("assets-landing/img/bg.jpg")}}" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100">Welcome to Our Website</h2>
            <p data-aos="fade-up" data-aos-delay="200">Website ini adalah website untuk landing page dari kopi dan cafe dari mitra kamu, semoga kamu mendapatkan apa yg kamu cari.</p>
          </div>
        </div>
      </div>

    </section><!-- End Hero Section -->


    <!-- Recent-posts Section - Home Page -->
    <section id="kopi" class="recent-posts">

      <!-- Recent-posts Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Product Kopi Kami</h2>
        <p>Berikut menu yang kami berikan</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <article>

              <div class="post-img">
                <img src="{{ asset("assets-landing/img/kopi.jpg")}}" alt="" class="img-fluid">
              </div>


              <h2 class="title">
                <a href="#">Kopi Luwak</a>
              </h2>

            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <article>

              <div class="post-img">
                <img src="{{ asset("assets-landing/img/kopi.jpg")}}" alt="" class="img-fluid">
              </div>



              <h2 class="title">
                <a href="#">Kopi Robusta</a>
              </h2>
   

            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <article>

              <div class="post-img">
                <img src="{{ asset("assets-landing/img/kopi.jpg")}}" alt="" class="img-fluid">
              </div>


              <h2 class="title">
                <a href="#">Kopi Hitam</a>
              </h2>
        

            </article>
          </div><!-- End post list item -->

        </div><!-- End recent posts list -->

      </div>

    </section><!-- End Recent-posts Section -->

    <!-- About Section - Home Page -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">

          <div class="col-xl-5 content">
            <h3>About Us</h3>
            <h2>Ngopisedoyo</h2>
            <p>Ngopisedoyo adalah sebuah platform yang menemukan 2 mitra dari pihak kaffe dan perkebun kopi sehingga kopi yang di jual di kami sangat berkualitas karena dari petani nya langsung dan masih fresh</p>
          </div>

          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-buildings"></i>
                  <h3>Kualitas</h3>
                  <p>Kualitas bener kami jaga dan kami rawat dengan benar, dan diolah dengan higienis</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-clipboard-pulse"></i>
                  <h3>Services</h3>
                  <p>Kami akan memberikan layanan kami yang baik dan ramah jadi jangan lupa berkunjung.</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-command"></i>
                  <h3>Harga</h3>
                  <p>Di tempat kami, memberikan harga yang sangat murah ketimbang ditempat lain dan tetep berkualitas tentunya</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-graph-up-arrow"></i>
                  <h3>Delares sapiente</h3>
                  <p>Sint et dolor voluptas minus possimus nostrum. Reiciendis commodi eligendi omnis quideme lorenda</p>
                </div>
              </div> <!-- End Icon Box -->

            </div>
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

    <!-- Recent-posts Section - Home Page -->
    <section id="menu" class="recent-posts">

      <!-- Recent-posts Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Menu Caffe Kami</h2>
        <p>Berikut menu yang kami berikan</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <article>

              <div class="post-img">
                <img src="{{ asset("assets-landing/img/kopi.jpg")}}" alt="" class="img-fluid">
              </div>


              <h2 class="title">
                <a href="#">Kopi Luwak</a>
              </h2>

            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <article>

              <div class="post-img">
                <img src="{{ asset("assets-landing/img/kopi.jpg")}}" alt="" class="img-fluid">
              </div>



              <h2 class="title">
                <a href="#">Kopi Robusta</a>
              </h2>



            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <article>

              <div class="post-img">
                <img src="{{ asset("assets-landing/img/kopi.jpg")}}" alt="" class="img-fluid">
              </div>


              <h2 class="title">
                <a href="#">Kopi Hitam</a>
              </h2>


            </article>
          </div><!-- End post list item -->

        </div><!-- End recent posts list -->

      </div>

    </section><!-- End Recent-posts Section -->

    <!-- Contact Section - Home Page -->
    <section id="contact" class="contact">

      <!-- Contact Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>A108 Adam Street</p>
                  <p>New York, NY 535022</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                  <p>+1 6678 254445 41</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                  <p>contact@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Monday - Friday</p>
                  <p>9:00AM - 05:00PM</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>Ngopisedoyo</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p>United States</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>&copy; <span>Copyright</span> <strong class="px-1">Ngopisedoyo</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
      </div>
    </div>

  </footer><!-- End Footer -->

  <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset("assets-landing/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <script src="{{ asset("assets-landing/vendor/glightbox/js/glightbox.min.js") }}"></script>
  <script src="{{ asset("assets-landing/vendor/purecounter/purecounter_vanilla.js") }}"></script>
  <script src="{{ asset("assets-landing/vendor/isotope-layout/isotope.pkgd.min.js") }}"></script>
  <script src="{{ asset("assets-landing/vendor/swiper/swiper-bundle.min.js") }}"></script>
  <script src="{{ asset("assets-landing/vendor/php-email-form/validate.js") }}"></script>
  <script src="{{ asset("assets-landing/vendor/aos/aos.js") }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset("assets-landing/js/main.js") }}"></script>
</body>
</html>