
<!DOCTYPE html>
<html lang="en">
    <head>

		<!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- Title -->
		<title>Roger Neves - Portfolio</title>
    <link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap.min.css')}}">


		<!-- CSS Plugins -->
      
        <link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/plugins/font-awesome.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/plugins/simplebar.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/plugins/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/plugins/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/plugins/jquery.animatedheadline.css')}}">

		<!-- CSS Base -->
        <link rel="stylesheet" href="{{asset('assets/css/style-dark.css')}}">

		<!-- Settings Style -->
		<link rel="stylesheet" href="{{asset('assets/css/settings/left-nav.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/settings/box/box.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/settings/box/circle.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/settings/title/title.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/settings/color/green-color.css')}}" />


    </head>
     <body>

		<!-- Preloader -->
		<div id="preloader">
			<div class="loading-area">
			  <div class="circle"></div>
			</div>
			<div class="left-side"></div>
			<div class="right-side"></div>
	  </div>

	  <div class="header-mobile">
		  <a class="header-toggle"><i class="fas fa-bars"></i></a>
		  <h2>Baha</h2>
	  </div>

	  <!-- Left Block -->
	  <nav class="header-main" data-simplebar>

		  <!-- Logo -->
		  <div class="logo">
			  <img src="img/logo.png" alt="">
		  </div>

			<ul>
			  <li data-tooltip="home" data-position="top">
				  <a href="/" class="fas fa-house-damage"></a>
			  </li>
			  <li>
				  <span class="active fas fa-receipt"></span>
			  </li>
			  <li data-tooltip="back to blog" data-position="top">
				  <a href="../#blog" class="fas fa-long-arrow-alt-left"></a>
			  </li>
			</ul>

		  <!-- Sound wave -->
		  <a class="music-bg">
				<div class="lines">
				  <span></span>
				  <span></span>
				  <span></span>
				  <span></span>
				  <span></span>
				  <span></span>
				</div>
			  <p> Sound </p>
		  </a>
	   </nav>

	  <!--Blog Page-->
	  @foreach($articles->all() as $article)
	  <div class="blog-page" data-simplebar>
		  <nav class="blog-nav">
			  <a href="#" data-tooltip="prev" data-position="left">
				  <i class="fas fa-long-arrow-alt-left"></i>
			  </a>
			  <a href="/#blog">
				  <i class="fas fa-bars"></i>
			  </a>
			  <a href="#" data-tooltip="next" data-position="right">
				  <i class="fas fa-long-arrow-alt-right"></i>
			  </a>
		  </nav>

	
			  
	
		  <div class="blog-image">
			  <img src="" class="text-alingn-center" alt="">
		  </div>
		  <div class="row blog-container">
			  <div class="col-md-10 offset-md-1">

				  <!-- Heading -->
				  <div class="blog-heading pt-70 pb-100">
					  <h2>{{ $article['title'] }}</h2>
					  <span><i class="fas fa-home"></i><a href="#">Brand</a></span>
					  <span><i class="fas fa-comment"></i><a href="#">5 comments</a></span>
					  <span><i class="fas fa-calendar-alt"></i>January 06, 2019</span>
				  </div>

				  <!-- Content -->
				  <div class="blog-content">
					 <?=$article['body'] ?>
				  </div>
		
		
		  
		
		
		
				  <!-- Comments -->
				  <div class="blog-comments mt-100 mb-100">
					  <div class="header-box mb-50">
						  <h3>Comments</h3>
					  </div>
					  <ul>
						  <li>
							  <div class="author-img">
								  <img src="img/blog/authors/author-1.png" alt="">
							  </div>
							  <div class="comment-text">
								  <a href="#"><i class="fas fa-reply"></i>Reply</a>
								  <h4>Alex Doe</h4>
								  <span>Aug 15, 2018 at 8:11 am</span>
								  <p>Morbi ut faucibus nulla, at fringilla est. Morbi lacinia sagittis purus.</p>
							  </div>
							  <ul>
								  <li>
									  <div class="author-img">
										  <img src="img/blog/authors/author-2.png" alt="">
									  </div>
									  <div class="comment-text">
										  <h4>Kriss Doe</h4>
										  <span>Aug 15, 2018 at 8:11 am</span>
										  <p>Morbi ut faucibus nulla, at fringilla est. Morbi lacinia sagittis purus, nec dapibus felis tempus in. Quisque eget elementum sem, cursus tristique orci.</p>
									  </div>
								  </li>
							  </ul>
						  </li>

						  <li>
							  <div class="author-img">
								  <img src="img/blog/authors/author-3.png" alt="">
							  </div>
							  <div class="comment-text">
								  <a href="#"><i class="fas fa-reply"></i>Reply</a>
								  <h4>Emma Doe</h4>
								  <span>Aug 15, 2018 at 8:11 am</span>
								  <p>Morbi ut faucibus nulla, at fringilla est. Morbi lacinia sagittis purus.</p>
							  </div>
						  </li>
					  </ul>
				  </div>

				  <!--Blog Form-->
				  <div class="header-box mb-50">
					  <h3>Leave a comment</h3>
				  </div>

				  <div class="contact-form mb-100">
					  <form method="post" class="box contact-valid" id="contact-form">
						  <div class="row">
							  <div class="col-lg-6 col-sm-12">
									 <input type="text" name="name" id="name" class="form-control" placeholder="Nome *">
							  </div>
							  <div class="col-lg-6 col-sm-12">
									 <input type="email" name="email" id="email" class="form-control" placeholder="Email *">
							  </div>
							  <div class="col-lg-12 col-sm-12">
								  <textarea class="form-control" name="note"  id="note" placeholder="Sua mensagem"></textarea>
							  </div>
							   <div class="col-lg-12 col-sm-12 text-center">
									 <button type="submit" class="btn-st">Enviar Message</button>
									 <div id="loader">
										<i class="fas fa-sync"></i>
									 </div>
							  </div>
							  <div class="col-lg-12 col-sm-12">
								  <div class="error-messages">
									  <div id="success">
										  <i class="far fa-check-circle"></i>Thank you, your message has been sent.
									  </div>
									  <div id="error">
										  <i class="far fa-times-circle"></i>Error occurred while sending email. Please try again later.
									  </div>
								  </div>
							  </div>
						  </div>
					  </form>
					 </div>
			  </div>
		  </div>
	  </div>
	  @endforeach

	
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/js/simplebar.js')}}"></script>
		<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery.animatedheadline.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery.easypiechart.js')}}"></script>
		<script src="{{asset('assets/js/jquery.validation.js')}}"></script>
		<script src="{{asset('assets/js/tilt.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        <script src="https://maps.google.com/maps/api/js?sensor=false"></script>

    </body>
</html>