<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-203133373-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-203133373-1');
        </script>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Title -->
        <title>Roger Neves Portfólio</title>
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
        <!-- Main Site -->
        <div id="home">
            <div id="about">
                <div id="resume">
                    <div id="portfolio">
                        <div id="blog">
                            <div id="contact">
                                <div class="header-mobile">
                                    <a class="header-toggle"><i class="fas fa-bars"></i></a>
                                    <h2>Roger</h2>
                                </div>
                                <!-- Left Block -->
                                <nav class="header-main" data-simplebar>
                                    <!-- Logo -->
                                    <div class="logo">
                                        <img src="{{asset('assets/img/logo.png')}}" alt="">
                                    </div>
                                    <ul>
                                        <li data-tooltip="home" data-position="top">
                                            <a href="#home" class="icon-h fas fa-house-damage"></a>
                                        </li>
                                        <li data-tooltip="Sobre" data-position="top">
                                            <a href="#about" class="icon-a fas fa-user-tie"></a>
                                        </li>
                                        <li data-tooltip="Resumo" data-position="top">
                                            <a href="#resume" class="icon-r fas fa-address-book"></a>
                                        </li>
                                        <li data-tooltip="portfolio" data-position="top">
                                            <a href="#portfolio" class="icon-p fas fa-briefcase"></a>
                                        </li>
                                        <li data-tooltip="blog" data-position="top">
                                            <a href="#blog" class="icon-b fas fa-receipt"></a>
                                        </li>
                                        <li data-tooltip="Contato" data-position="bottom">
                                            <a href="#contact" class="icon-c fas fa-envelope"></a>
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
								
                                <!-- Home Section -->
                                <div class="pt-home" style="background-image: url({{asset('assets/img/slider/arpoador.png')}}">
                                    <div class="bg-lines">
                                        <div class="bg-line"></div>
                                        <div class="bg-line"></div>
                                        <div class="bg-line"></div>
                                        <div class="bg-line"></div>
                                        <div class="bg-line"></div>
                                    </div>
                                    <section>
                                        <!-- Banner -->
                                        <div class="banner">
                                            <h1>ROGER NEVES</h1>
                                            <p class="cd-headline rotate-1">
                                                <span></span>
                                                <span class="cd-words-wrapper">
                                                    <b class="is-visible">Programador</b>
                                                    <b>Empreendedor</b>
                                                    <b>Laravel</b>
                                                    <b>PHP</b>
                                                </span>
                                            </p>
                                        </div>
                                        <!-- Social -->
                                        <div class="social">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                            </ul>
                                        </div>
                                    </section>
                                </div>
                                <!-- About Section -->
                                <div class="page pt-about" data-simplebar>
                                    <section class="container">
                                        <!-- Section Title -->
                                        <div class="header-page mt-70 mob-mt">
                                            <h2>Sobre</h2>
                                            <span></span>
                                        </div>
										
                                        <!-- Personal Info Start -->
                                        <div class="row mt-100">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="info box-1">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-sm-4">
                                                            <div class="photo">
                                                                <img alt="" src="{{asset('assets/img/cover.png')}}">
                                                            </div>
                                                        </div>
													
                                                        <div class="col-lg-9 col-sm-8">
                                                            <h4>{{$user['name'] ?? ''}}</h4>
																{{ dd('aaa') }}
                                                            <div class="loc">
                                                                <i class="fas fa-map-marked-alt"></i> Rio de Janeiro, BR
                                                            </div>
                                                            {!!$user['description']!!}
                                                        </div>
                                                        <!-- Icon Info -->
                                                        <div class="col-lg-3 col-sm-4">
                                                            <div class="info-icon">
                                                                <i class="fas fa-award"></i>
                                                                <div class="desc-icon">
                                                                    <h6>{!!$user['anosExperiencia']!!} Anos de</h6>
                                                                    <p>Experiência</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-4">
                                                            <div class="info-icon">
                                                                <i class="fas fa-certificate"></i>
                                                                <div class="desc-icon">
                                                                    <h6>{{$user['numeroProjetos']}} Projetos</h6>
                                                                    <p>Completos</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-4">
                                                            <div class="info-icon">
                                                                <i class="fas fa-user-astronaut"></i>
                                                                <div class="desc-icon">
                                                                    <h6>Freelance</h6>
                                                                    <p>Available</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-12 pt-50">
                                                            <a href="{{Storage::url('users/'.$user['curriculum'])}}" target="_blank" class="btn-st">Download CV</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										
                                        <!-- Interests Row Start -->
                                        <div class="row mt-100">
                                            <div class="col-md-12">
                                                <div class="header-box mb-50">
                                                    <h3>Interesses</h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="box-2">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div class="inter-icon">
                                                                <i class="fas fa-music"></i>
                                                                <div class="desc-inter">
                                                                    <h6>Musicas</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div class="inter-icon">
                                                                <i class="fas fa-route"></i>
                                                                <div class="desc-inter">
                                                                    <h6>Viagens</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div class="inter-icon">
                                                                <i class="far fa-image"></i>
                                                                <div class="desc-inter">
                                                                    <h6>Fotografia</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div class="inter-icon">
                                                                <i class="fas fa-film"></i>
                                                                <div class="desc-inter">
                                                                    <h6>FILMES</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div class="inter-icon">
                                                                <i class="fas fa-space-shuttle"></i>
                                                                <div class="desc-inter">
                                                                    <h6>Bodyboard</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div class="inter-icon">
                                                                <i class="fas fa-book"></i>
                                                                <div class="desc-inter">
                                                                    <h6>Livros</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div class="inter-icon">
                                                                <i class="fas fa-gamepad"></i>
                                                                <div class="desc-inter">
                                                                    <h6>Video games</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div class="inter-icon">
                                                                <i class="fas fa-cat"></i>
                                                                <div class="desc-inter">
                                                                    <h6>Animais</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Service Row Start -->
                                        <div class="row mt-100">
                                            <div class="col-md-12">
                                                <div class="header-box mb-50">
                                                    <h3>Serviços</h3>
                                                </div>
                                            </div>
                                            <div class="row mt-100">
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="service box-1 mb-40">
                                                        <i class="fas fa-code"></i>
                                                        <h4>Desenvolvimento Web</h4>
                                                        <p>Uso a tecnologia para criação de sistemas que levam os clientes até você.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
							
                                <!-- Resume Section -->
                                <div class="page pt-resume" data-simplebar>
                                    <section class="container">
                                        <div class="header-page mt-70 mob-mt">
                                            <h2>Resumo</h2>
                                            <span></span>
                                        </div>
                                        <div class="row mt-100">
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="header-box mb-50">
                                                    <h3>Experiências</h3>
                                                </div>
                                                <div class="experience box-1">
                                                    <div class="item">
                                                        <div class="main">
                                                            <h4>Desenvolvedor Full Stack</h4>
                                                            <p><i class="far fa-calendar-alt"></i>dê {{formatDateAndTime($experiencia['datestart'])}} até {{formatDateAndTime($experiencia['dateend'])}} | Empresa XYZ</p>
                                                        </div>
                                                        <p>{!!$experiencia['body']!!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="header-box mb-50 mob-box-mt">
                                                    <h3>Cursos</h3>
                                                </div>
                                                <div class="experience box-2">
                                                    <div class="item">
                                                        <div class="main">
                                                            <h4>{!!$curso['linguagem']!!}</h4>
                                                            <p><i class="far fa-calendar-alt"></i>{!!$curso['plataforma']!!} | {!!$curso['data']!!}</p>
                                                        </div>
                                                        <p>{!!$curso['body']!!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-100">
                                            <div class="col-md-12">
                                                <div class="header-box mb-50">
                                                    <h3>Skills</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-1 skills">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="skill-item">
                                                        <h4 class="progress-title">PHP</h4>
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width:98%">
                                                                <div class="progress-value">80%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="skill-item">
                                                        <h4 class="progress-title">Laravel</h4>
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width:98%">
                                                                <div class="progress-value">70%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="skill-item">
                                                        <h4 class="progress-title">Mysql</h4>
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width:70%">
                                                                <div class="progress-value">70%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="skill-item">
                                                        <h4 class="progress-title">HTML5</h4>
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width:98%">
                                                                <div class="progress-value">80%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="skill-item">
                                                        <h4 class="progress-title">CSS3</h4>
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width:85%">
                                                                <div class="progress-value">85%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="skill-item">
                                                        <h4 class="progress-title">Jquery</h4>
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width:90%">
                                                                <div class="progress-value">90%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="skill-item">
                                                        <h4 class="progress-title">JavaScript</h4>
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width:90%">
                                                                <div class="progress-value">90%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="skill-item">
                                                        <h4 class="progress-title">Photoshop</h4>
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width:90%">
                                                                <div class="progress-value">90%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="chart" data-percent="80" data-bar-color="#fff"> 80% <p>PHP</p></div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="chart" data-percent="90" data-bar-color="#fff"> 90% <p>Laravel</p></div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="chart" data-percent="70" data-bar-color="#fff"> 70% <p>Mysql</p></div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="chart" data-percent="90" data-bar-color="#fff"> 90% <p>HTML5</p></div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="chart" data-percent="90" data-bar-color="#fff"> 90% <p>CSS 3</p></div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="chart" data-percent="90" data-bar-color="#fff"> 90% <p>Jquery</p></div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="chart" data-percent="90" data-bar-color="#fff"> 90% <p>JavaScript</p></div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="chart" data-percent="80" data-bar-color="#fff"> 80% <p>Photoshop</p></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- Portfolio Section -->
                                <div class="page pt-portfolio" data-simplebar>
                                    <section class="container">
                                        <div class="header-page mt-70 mob-mt">
                                            <h2>Portfolio</h2>
                                            <span></span>
                                        </div>
                                        <div class="row mt-100">
                                            <div class="col-lg-12 col-sm-12 portfolio-filter">
                                                <ul>
                                                    <li class="active" data-filter="*">TODOS</li>
                                                    <li data-filter=".web">Web</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row portfolio-items mt-100 mb-100">
                                            <div class="item col-lg-4 col-sm-6 web">
                                                <?php $cover = ($portifolio['cover'] == null ? asset('assets/img/default-image.jpg') : Storage::url($portifolio['cover'])); ?>
                                                <figure>
                                                    <img src="{{$cover}}">
                                                    <figcaption>
                                                        <h3>{{$portifolio['title']}}</h3>
                                                        <p>{{$portifolio['categoria']}}</p><i class="fas fa-image"></i>
                                                        <a href="{{$portifolio['url']}}" target="_blank"></a>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- Blog Section -->
                                <div class="page pt-blog">
                                    <section class="container">
                                        <div class="header-page mt-70 mob-mt">
                                            <h2>Blog</h2>
                                            <span></span>
                                        </div>
                                        <div class="row mt-100">
                                            <div class="col-lg-12 col-sm-12 blog-filter">
                                                <ul style="display: inline-flex;">
                                                    <li class="active" data-filter="*">TODOS</li>
                                                    <li style="margin-left: 10px" data-filter=".tech">Tech</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row blog-masonry mt-100 mb-50">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="blog-item">
                                                    <div class="thumbnail">
                                                        <a href="blog/{{$article['id']}}">
                                                            <img alt="{{$article['title']}}" src="{{Storage::url($article['cover'])}}">
                                                        </a>
                                                        @if($article['type'])
                                                            <a href="https://www.youtube.com/watch?v=k_okcNVZqqI" class="btn-play"></a>
                                                        @endif
                                                    </div>
                                                    <h4><a href="blog/{{$article['id']}}">{{$article['title']}}</a></h4>
                                                    <ul>
                                                        <li><a href="#">{{ formatDateAndTime($article['date'], 'd/m/Y') }}</a></li>
                                                        <li><a href="#">{{$article['categoria']}}</a></li>
                                                    </ul>
                                                    <div class="blog-btn">
                                                        <a href="blog/{{$article['id']}}" class="btn-st">Leia Mais</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-100 mb-90">
                                            <div class="col-lg-12 col-sm-12 text-center"></div>
                                        </div>
                                    </section>
                                </div>
                                <!-- Contact Section -->
                                <div class="page pt-contact" data-simplebar>
                                    <section class="container">
                                        <div class="header-page mt-70 mob-mt">
                                            <h2>Contato</h2>
                                            <span></span>
                                        </div>
                                        <div class="row mt-100">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="contact-form">
                                                    <form method="post" class="box-1 contact-valid" id="contact-form">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-12">
                                                                <input type="text" name="name" id="name" class="form-control" placeholder="Nome *">
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12">
                                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email *">
                                                            </div>
                                                            <div class="col-lg-12 col-sm-12">
                                                                <textarea class="form-control" name="note" id="note" placeholder="Mensagem"></textarea>
                                                            </div>
                                                            <div class="col-lg-12 col-sm-12 text-center">
                                                                <button type="submit" class="btn-st">Enviar Mensagem</button>
                                                                <div id="loader">
                                                                    <i class="fas fa-sync"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-sm-12">
                                                                <div class="error-messages">
                                                                    <div id="success">
                                                                        <i class="far fa-check-circle"></i>Obrigado, Sua mensagem foi enviada.
                                                                    </div>
                                                                    <div id="error">
                                                                        <i class="far fa-times-circle"></i>Erro ao enviar mensagem por favor tente mais tarde.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-2 contact-info">
                                            <script>
                                                let wtazap = "{{$user['cel']}}";
                                            </script>
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-12 info">
                                                    <i class="fas fa-paper-plane"></i>
                                                    <p>{{$user['email']}}</p>
                                                    <span>Email</span>
                                                </div>
                                                <div class="col-lg-4 col-sm-12 info">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <p>{{$user['estate']}}, {{$user['bairro']}}</p>
                                                    <span>Endereço</span>
                                                </div>
                                                <div class="col-lg-4 col-sm-12 info">
                                                    <i class="fas fa-phone"></i>
                                                    <p>{{$user['cel']}}</p>
                                                    <span>CEL</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="google-map box-1 mt-100 mb-100">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div id="map" data-latitude="40.712775" data-longitude="-74.005973" data-zoom="14"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <a href="https://api.whatsapp.com/send?phone=55{{$user['cel']}}" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888; z-index:1000;" target="_blank">
            <i style="margin-top:16px" class="fa fa-whatsapp"></i>
        </a>
        <!-- All Script -->
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