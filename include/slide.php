<div id="slide">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-inner">
      <div class="carousel-item">
        <img src="assets/images/slide_2.jpg" class="d-block w-100" alt="slide 1">
      </div>
      
      <div class="carousel-item active">
        <img src="assets/images/sille1.jpg" class="d-block w-100" alt="slide 2">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden"></span>
    </button>
  </div>
</div>
<section class="section site-portfolio">
            <div class="container">
              <div class="block-title text-center">
                  <h2 class="title"><a href="#" title="">Kingshoes</a></h2>
              </div>
                <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
                    <div class="item web col-sm-6 col-md-4 col-lg-4 mb-4">
                        <a href="work-single.html" class="item-wrap fancybox">
                            <div class="work-info">
                                <h3>Boxed Water</h3>
                                <span>Web</span>
                            </div>
                            <img class="img-fluid" src="assets/img/img_1.jpg">
                        </a>
                    </div>
                    <div class="item photography col-sm-6 col-md-4 col-lg-4 mb-4">
                        <a href="work-single.html" class="item-wrap fancybox">
                            <div class="work-info">
                                <h3>Build Indoo</h3>
                                <span>Photography</span>
                            </div>
                            <img class="img-fluid" src="assets/img/img_2.jpg">
                        </a>
                    </div>
                    <div class="item branding col-sm-6 col-md-4 col-lg-4 mb-4">
                        <a href="work-single.html" class="item-wrap fancybox">
                            <div class="work-info">
                                <h3>Cocooil</h3>
                                <span>Branding</span>
                            </div>
                            <img class="img-fluid" src="assets/img/img_3.jpg">
                        </a>
                    </div>
                    <div class="item design col-sm-6 col-md-4 col-lg-4 mb-4">
                        <a href="work-single.html" class="item-wrap fancybox">
                            <div class="work-info">
                                <h3>Nike Shoe</h3>
                                <span>Design</span>
                            </div>
                            <img class="img-fluid" src="assets/img/img_4.jpg">
                        </a>
                    </div>
                    <div class="item photography col-sm-6 col-md-4 col-lg-4 mb-4">
                        <a href="work-single.html" class="item-wrap fancybox">
                            <div class="work-info">
                                <h3>Kitchen Sink</h3>
                                <span>Photography</span>
                            </div>
                            <img class="img-fluid" src="assets/img/img_5.jpg">
                        </a>
                    </div>
                    <div class="item branding col-sm-6 col-md-4 col-lg-4 mb-4">
                        <a href="work-single.html" class="item-wrap fancybox">
                            <div class="work-info">
                                <h3>Amazon</h3>
                                <span>brandingn</span>
                            </div>
                            <img class="img-fluid" src="assets/img/img_6.jpg">
                        </a>
                    </div>
                </div>
            </div>
        </section>
<style>
  /**
* Template Name: MyPortfolio - v4.9.1
* Template URL: https://bootstrapmade.com/myportfolio-bootstrap-portfolio-website-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
body {
  font-family: "Inconsolata", monospace;
  color: #0d1e2d;
}

a {
  color: #777;
  text-decoration: none;
}

a:hover {
  color: #000;
}

h1,
h2,
h3,
h4,
h5,
h6,
.font-heading {
  font-family: "Raleway", sans-serif;
}

.section {
  padding: 7rem 0;
}

.filters a {
  text-decoration: none;
  color: #000;
  display: inline-block;
  padding-left: 10px;
  padding-right: 10px;
  position: relative;
}

.filters a:hover,
.filters a:focus,
.filters a:active {
  text-decoration: none;
}

.filters a:hover:before {
  content: "";
  position: absolute;
  left: 10px;
  right: 10px;
  bottom: 0;
  height: 1px;
  background-color: #000;
}

.filters a.active {
  color: #000;
}

.filters a.active:before {
  content: "";
  position: absolute;
  left: 10px;
  right: 10px;
  bottom: 0;
  height: 1px;
  background-color: #000;
}

.item {
  border: none;
  margin-bottom: 30px;
}

.item .item-wrap {
  display: block;
  position: relative;
  overflow: hidden;
}

.item .item-wrap:after {
  z-index: 2;
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.4);
  visibility: hidden;
  opacity: 0;
  transition: 0.3s all ease-in-out;
}

.item .item-wrap img {
  transition: 0.3s transform ease;
  transform: scale(1);
}

.item .item-wrap>.work-info {
  position: absolute;
  top: 50%;
  width: 100%;
  text-align: center;
  z-index: 3;
  transform: translateY(-50%);
  color: #fff;
  opacity: 0;
  visibility: hidden;
  margin-top: 20px;
  transition: 0.3s all ease;
}

.item .item-wrap>.work-info h3 {
  font-size: 20px;
  margin-bottom: 0;
}

.item .item-wrap>.work-info span {
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 0.2rem;
}

.item .item-wrap:hover {
  text-decoration: none;
}

.item .item-wrap:hover img {
  transform: scale(1.05);
}

.item .item-wrap:hover:after {
  opacity: 1;
  visibility: visible;
}

.item .item-wrap:hover .work-info {
  margin-top: 0px;
  opacity: 1;
  visibility: visible;
}

.testimonial-wrap {
  padding: 50px 50px 80px 50px;
  background: #eceff2;
}

.testimonial-wrap .testimonial {
  text-align: center;
  max-width: 500px;
  margin: 0 auto;
}

.testimonial-wrap .testimonial img {
  border-radius: 50%;
  width: 120px;
  margin: 0 auto 30px auto;
}

.testimonial-wrap .testimonial blockquote p {
  font-size: 20px;
}

.h3 {
  font-size: 20px;
}

.h4 {
  font-size: 16px;
}

.heading {
  font-size: 28px;
}

.readmore {
  display: inline-block;
  border: 1px solid #000;
  padding: 10px 15px;
  font-size: 12px;
  text-transform: uppercase;
  color: #000;
  transition: 0.2s all ease;
  font-weight: 700;
}

.readmore:active,
.readmore:focus,
.readmore:hover {
  outline: none;
}

.readmore:hover {
  color: #fff;
  text-decoration: none;
  background: #000;
}

.testimonials-slider .swiper-pagination {
  margin-top: -60px;
  position: relative;
}

.testimonials-slider .swiper-pagination .swiper-pagination-bullet {
  width: 12px;
  height: 12px;
  background-color: rgba(13, 30, 45, 0.3);
  opacity: 1;
}

.testimonials-slider .swiper-pagination .swiper-pagination-bullet-active {
  background-color: rgba(13, 30, 45, 0.6);
}

.sticky-content {
  position: sticky;
  position: -webkit-sticky;
  top: 0;
  /* required */
}

.list-line li {
  margin-bottom: 10px;
  position: relative;
  padding-left: 30px;
}

.list-line li:before {
  content: "";
  position: absolute;
  left: 0;
  top: 0.7rem;
  width: 10px;
  height: 2px;
  background: #000;
}

.form-control {
  border-radius: 0;
  background: #f8f9fa;
  border: 1px solid transparent;
  padding-top: 10px !important;
  padding-bottom: 10px !important;
}

.form-control:active,
.form-control:focus {
  background: #eff1f4;
  outline: none;
  box-shadow: none;
  border: 1px solid transparent;
}

.custom-progress {
  height: 7px;
  border-radius: 0;
}

.custom-progress .progress-bar {
  background: #000;
}

/* Services */
.services i {
  font-size: 40px;
}

.services h4 {
  padding-top: 10px;
}

/* Contact Form */
.php-email-form .error-message {
  display: none;
  color: #fff;
  background: #ed3c0d;
  text-align: left;
  padding: 15px;
  font-weight: 600;
}

.php-email-form .error-message br+br {
  margin-top: 25px;
}

.php-email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}

.php-email-form .loading {
  display: none;
  background: #fff;
  text-align: center;
  padding: 15px;
}

.php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid #18d26e;
  border-top-color: #eee;
  -webkit-animation: animate-loading 1s linear infinite;
  animation: animate-loading 1s linear infinite;
}

@-webkit-keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
/* Custom Navmenu */
.custom-navmenu {
  background: #0d1e2d;
}

.custom-navmenu .custom-menu,
.custom-navmenu .custom-menu li {
  padding: 0;
  margin: 0;
  list-style: none;
}

.custom-navmenu .custom-menu li {
  margin-bottom: 0;
  font-size: 20px;
}

.custom-navmenu .custom-menu li a {
  color: #fff;
  padding: 10px 0 !important;
}

.custom-navmenu .custom-menu li a:hover {
  text-decoration: none;
}

.custom-navmenu .custom-menu li.active a {
  text-decoration: underline;
}

.custom-navmenu h3 {
  font-size: 20px;
  color: #fff;
}

.custom-navmenu p {
  color: rgba(255, 255, 255, 0.6);
}

.custom-navmenu a {
  color: rgba(255, 255, 255, 0.7);
}

.custom-navmenu a:hover {
  color: #fff;
}

/* Custom Navbar */
.custom-navbar {
  padding-top: 50px;
  width: 100%;
}

@media (max-width: 780px) {
  .custom-navbar>.container {
    padding-right: 0;
    padding-left: 0;
  }
}

.custom-navbar .navbar-brand {
  font-size: 1.7rem;
}

/* Burger */
.burger {
  width: 28px;
  height: 32px;
  cursor: pointer;
  position: relative;
}

.burger:before,
.burger span,
.burger:after {
  width: 100%;
  height: 2px;
  display: block;
  background: #000;
  border-radius: 2px;
  position: absolute;
  opacity: 1;
}

.burger:before,
.burger:after {
  transition: top 0.35s cubic-bezier(0.23, 1, 0.32, 1), transform 0.35s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.35s cubic-bezier(0.23, 1, 0.32, 1), background-color 1.15s cubic-bezier(0.86, 0, 0.07, 1);
  -webkit-transition: top 0.35s cubic-bezier(0.23, 1, 0.32, 1), -webkit-transform 0.35s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.35s cubic-bezier(0.23, 1, 0.32, 1), background-color 1.15s cubic-bezier(0.86, 0, 0.07, 1);
  content: "";
}

.burger:before {
  top: 4px;
}

.burger span {
  top: 15px;
}

.burger:after {
  top: 26px;
}

/* Hover */
.burger:hover:before {
  top: 7px;
}

.burger:hover:after {
  top: 23px;
}

/* Click */
.burger.active span {
  opacity: 0;
}

.burger.active:before,
.burger.active:after {
  top: 40%;
}

.burger.active:before {
  transform: rotate(45deg);
}

.burger.active:after {
  transform: rotate(-45deg);
}

.burger:focus {
  outline: none;
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
.footer {
  padding: 0 0 4rem 0;
}

.footer a {
  color: #000;
}

.social a {
  display: inline-block;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #f8f9fa;
  position: relative;
  text-align: center;
  color: #0d1e2d;
}

.social a span {
  display: inline-block;
  left: 50%;
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
}

.social a:hover {
  color: #000;
}
#text{
  text-align: center;
  font-size:25px;
}
</style>