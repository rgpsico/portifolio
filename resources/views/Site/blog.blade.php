
@include('Site.includes.header')
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
					  <span><i class="fas fa-calendar-alt"></i> <?= formatDateAndTime($article['date']) ?></span>
				  </div>

				  <!-- Content -->
				  <div class="blog-content">
					 <?=$article['body'] ?>
				  </div>
		
		
				  @include('Site.pages.comentarios')
		
		
		
	  @endforeach

	  @include('Site.includes.footer')

