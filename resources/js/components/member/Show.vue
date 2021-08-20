<template>
  <!DOCTYPE html>
  <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
  <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
  <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
  <!--[if gt IE 8]><!-->
  <html class="no-js">
    <!--<![endif]-->
    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <title>Hydrogen &mdash; A free HTML5 Template by FREEHTML5.CO</title>
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
      <meta
        name="keywords"
        content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive"
      />
      <meta name="author" content="FREEHTML5.CO" />

      <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

      <!-- Facebook and Twitter integration -->
      <meta property="og:title" content="" />
      <meta property="og:image" content="" />
      <meta property="og:url" content="" />
      <meta property="og:site_name" content="" />
      <meta property="og:description" content="" />
      <meta name="twitter:title" content="" />
      <meta name="twitter:image" content="" />
      <meta name="twitter:url" content="" />
      <meta name="twitter:card" content="" />

      <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
      <link rel="shortcut icon" href="favicon.ico" />

      <!-- Google Webfonts -->
      <link
        href="http://fonts.googleapis.com/css?family=Roboto:400,300,100,500"
        rel="stylesheet"
        type="text/css"
      />
      <link
        href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
        rel="stylesheet"
        type="text/css"
      />

      <!-- Animate.css -->
      <link rel="shortcut icon" href="favicon.ico" />

      <!-- Google Webfonts -->

      <!-- Animate.css -->
      <link rel="stylesheet" href="/member/css/animate.css" />
      <!-- Icomoon Icon Fonts-->
      <link rel="stylesheet" href="/member/css/icomoon.css" />
      <!-- Magnific Popup -->
      <link rel="stylesheet" href="/member/css/magnific-popup.css" />
      <!-- Salvattore -->
      <link rel="stylesheet" href="/member/css/salvattore.css" />
      <!-- Theme Style -->
      <link rel="stylesheet" href="/member/css/style.css" />
      <!-- Modernizr JS -->
      <script
        type="application/javascript"
        src="/member/js/modernizr-2.6.2.min.js"
      />
      <!-- FOR IE9 below -->
      <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
      <div id="fh5co-offcanvass">
        <a href="#" class="fh5co-offcanvass-close js-fh5co-offcanvass-close"
          >Menu <i class="icon-cross"></i>
        </a>
        <h1 class="fh5co-logo">
              <router-link class="navbar-brand" to="/">Hydrogen</router-link>
        </h1>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li class="active"><a href="about.html">About</a></li>
          <li><a href="pricing.html">Pricing</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
        <h3 class="fh5co-lead">Connect with us</h3>
        <p class="fh5co-social-icons">
          <a href="#"><i class="icon-twitter"></i></a>
          <a href="#"><i class="icon-facebook"></i></a>
          <a href="#"><i class="icon-instagram"></i></a>
          <a href="#"><i class="icon-dribbble"></i></a>
          <a href="#"><i class="icon-youtube"></i></a>
        </p>
      </div>
      <header id="fh5co-header" role="banner">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <a href="#" class="fh5co-menu-btn js-fh5co-menu-btn"
                >Menu <i class="icon-menu"></i
              ></a>
              <router-link class="navbar-brand" to="/">Hydrogen</router-link>
            </div>
          </div>
        </div>
      </header>
      <!-- END .header -->

      <div id="fh5co-main">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2>{{ news.title }}</h2>
              <div class="fh5co-spacer fh5co-spacer-sm"></div>
              <p>
                <img
                  :src="news.thumbnail"
                  alt="Free HTML5 template by FREEHTML5.co"
                  class="img-rounded img-responsive"
                />
              </p>
              <p>{{ news.description }}</p>
              <span v-html="news.content"></span>
            </div>
          </div>
        </div>
      </div>

      <footer id="fh5co-footer">
        <div class="container">
          <div class="row row-padded">
            <div class="col-md-12 text-center">
              <p class="fh5co-social-icons">
                <a href="#"><i class="icon-twitter"></i></a>
                <a href="#"><i class="icon-facebook"></i></a>
                <a href="#"><i class="icon-instagram"></i></a>
                <a href="#"><i class="icon-dribbble"></i></a>
                <a href="#"><i class="icon-youtube"></i></a>
              </p>
              <p>
                <small
                  >&copy; Hydrogen Free HTML5 Template. All Rights Reserved.
                  <br />Designed by:
                  <a href="http://freehtml5.co/" target="_blank"
                    >FREEHTML5.co</a
                  >
                  | Images by:
                  <a href="http://pexels.com" target="_blank">Pexels</a>
                </small>
              </p>
            </div>
          </div>
        </div>
      </footer>

      <!-- jQuery -->
      <script type="application/javascript" src="/member/js/jquery.min.js" />
      <!-- jQuery Easing -->
      <script
        type="application/javascript"
        src="/member/js/jquery.easing.1.3.js"
      />
      <!-- Bootstrap -->
      <script type="application/javascript" src="/member/js/bootstrap.min.js" />
      <!-- Waypoints -->
      <script
        type="application/javascript"
        src="/member/js/jquery.waypoints.min.js"
      />
      <!-- Magnific Popup -->
      <script
        type="application/javascript"
        src="/member/js/jquery.magnific-popup.min.js"
      />
      <!-- Salvattore -->
      <script
        type="application/javascript"
        src="/member/js/salvattore.min.js"
      />
      <!-- Main JS -->
      <script type="application/javascript" src="/member/js/main.js" />
    </body>
  </html>
</template>

<script>
export default {
  data() {
    return {
      news: {
        title: "",
        description: "",
        content: "",
        newstype_id: "",
        thumbail: "",
      },
    };
  },
  mounted() {
    this.getNewsById;
  },
  computed: {
    getNewsById() {
      this.axios
        .get(`/api/news/${this.$route.params.id}`)
        .then((result) => {
          this.news.title = result.data.title;
          this.news.description = result.data.description;
          this.news.content = result.data.content;
          this.news.thumbnail = result.data.thumbnail;
          this.news.newstype_id = result.data.newstype_id;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style>
</style>