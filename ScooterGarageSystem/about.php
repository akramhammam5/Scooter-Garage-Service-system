<?php include("assets/includes/head.php"); ?>

<body>

<!-- Header -->

<?php include("assets/includes/header.php"); ?>

<!-- End Header -->



<!-- Content -->

<div class="header-spacer"></div>

<main>

<section>
<div class="position-relative">
<div class="page-title-img" style="background-image: url(assets/img/about/slide-01.jpg)"></div>
<div class="mask-02"></div>
<div class="page-title-img-text">
<div class="container">
<h1>About Us</h1>
</div>
</div>
</div>
</section>


<section class="mt-5">
<div class="container">
<div class="artc-03">
<div class="row">	
<div class="col-lg-6">
<h2>We are a scooter agency & post sale services. - Scooter Garage.</h2>	
</div>	
<div class="col-lg-6 p-3">
<p>It's our platform that can help you to find your best scooter, and find all post sale services like book an appointment to your regular maintance or buy spare parts or accessories.</p>
<p>Our Location: Altayarran St, Nasr city, Cairo</p>
</div>
<!-- <div class="col-lg-3 p-3">
<p>Our Location: <br> Altayarran St, Nasr city, Cairo.</p>
</div> -->
</div>
</div>
</div>
</section>


<section class="my-5">
<div class="container">
<div class="row">	
<div class="col-lg-3 mb-4 mb-lg-0 position-relative">
<div class="position-relative">
<img src="assets/img/about/about-img-01.jpg" class="img-fluid" alt=""/>
<div class="mask-03"></div>
</div>
<div class="about-title">
<h4>Visit us</h4>
</div>
</div>
<div class="col-lg-3 mb-4 mb-lg-0 position-relative">
<div class="position-relative">
<img src="assets/img/about/about-img-02.jpg" class="img-fluid" alt=""/>
<div class="mask-03"></div>
</div>
<div class="about-title">
<h4>Call us</h4>
</div>
</div>
<div class="col-lg-3 position-relative">
<div class="position-relative">
<img src="assets/img/about/about-img-03.jpg" class="img-fluid" alt=""/>
<div class="mask-03"></div>
</div>
<div class="about-title">
<h4>+20128 214 0230</h4>
</div>
</div>
<div class="col-lg-3 position-relative">
<div class="position-relative">
<img src="assets/img/about/about-img-04.jpg" class="img-fluid" alt=""/>
<div class="mask-03"></div>
</div>
<div class="about-title">
<h4>Our happy branch</h4>
</div>
</div>
</div>
</div>
</section>
	

</main>

<!-- End Content -->



<!-- Footer -->

<?php include("assets/includes/footer.php"); ?>

<!-- End Footer -->



<!-- JS -->

<?php include("assets/includes/scripts.php"); ?>
<script>
var a=0;$(window).scroll(function(){var t=$("#counter").offset().top-window.innerHeight;0==a&&$(window).scrollTop()>t&&($(".counter-value").each(function(){var t=$(this),n=t.attr("data-count");$({countNum:t.text()}).animate({countNum:n},{duration:3e3,easing:"swing",step:function(){t.text(Math.floor(this.countNum))},complete:function(){t.text(this.countNum)}})}),a=1)});	
</script>

<!-- End JS -->

</body>
</html>
