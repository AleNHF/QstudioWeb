@extends('front.index')
@section('redes')
<div class="red">
    <div id="facebook">
        <a href="https://www.facebook.com/angelica.mirandamendoza.9" target="none" class="fab fa-facebook-f "></a>
    </div>
    <div id="instagram">
        <a href="https://www.instagram.com/angelicamiranda.m/" target="none" class="fab fa-instagram"></a>
    </div>
    <div id="twiter">
        <a href="https://twitter.com/MirandaMedoza" target="none" class="fab fa-twitter-square"></a>
    </div>
    <div id="whatsaap">
        <a href="#" target="none" class="fab fa-whatsapp"></a>
    </div>
    <div id="linkeding">
        <a href="#" target="none" class="fab fa-linkedin"></a>
    </div>
</div>
@endsection
@section('navbar_top')
<div class="header-top">
    <div class="container d-flex justify-content-between">
        <div class="d-inline-flex ml-auto">
            
        </div>
    </div>
</div>
@endsection
@section('navbar')
    <header>
    <a href="#" class="logo">
        
        <img  class="imgtamaño" src="{{ asset('images/logo.png')}}" alt="Protecting You">
    </a>
    <div class="menu-toggle" ></div>
        <nav>
            <ul>
                <li><a href="" class="active">INICIO</a></li>
                <li><a href="">CONTÁCTENOS</a></li>
                <li><a href="">NOSOTROS</a></li>
				<li><a href="login">LOGIN</a></li>
				<li><a href="register">REGISTRATE</a></li>
                {{-- <li><a href="" class="active">INICIO</a></li>
                <li><a href="{{ url('/contact')}}">CONTÁCTENOS</a></li>
                <li><a href="{{ url('/nosotros')}}">NOSOTROS</a></li>
				<li><a href="{{route('login')}}">LOGIN</a></li>
				<li><a href="{{route('register')}}">REGISTRATE</a></li> --}}
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
@endsection
@section('banner')
<div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-text">
                        <h4> </h4>
						<br>
						<br>
                        <h1 class="tipeo1">PROTECTING YOU</h1>
                        <h1 class="tipeo2"><span class="type"></span></h1>
                        <div class="botonesinfo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 
@section('cards_service')
<div class="container_cards">
    <div class="row_cards">
        <div class="col-md-3 col-sm-6 mb-3 text-center">
            <div class="single-content_service">
                <div class="service">
                    <i class="fas fa-map-marker-alt fa-4x"></i>
                    <h4 class="title_services">Localizador</h4>
                    <p class="description_services">Rastrea la ubicación en tiempo real del niño</p><br>
                   
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3 text-center">
            <div class="single-content_service">
                <div class="service">
                    <i   >
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                            <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
                          </svg>
                    </i>
                    <h4 class="title_services">Actividad</h4>
                    <p class="description_services">Revisa la actividad de tu niño</p><br>
                 
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3 text-center">
            <div class="single-content_service">
                <div class="service">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                            <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                          </svg>
                    </i>
                   
                    <h4 class="title_services">Contenido Inapropiado</h4>
                    <p class="description_services">Controla el contenido inapropiado de tu niño</p>
                  
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3 text-center">
            <div class="single-content_service">
                <div class="service">
                    <i >
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
                          </svg>
                    </i>
                    <h4 class="title_services">Múltiples Formas de Pago</h4>
                    <p class="description_services">Diferentes tipos de pago</p>
                          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('cards')
<div class="container_cards">    
    <div class="row_cards">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="single-content">
                <img src="{{ asset('images/infante.png')}}" >
                <div class="text-content">
                    <h3>Tokens</h3>
                    <hr class="style2">
                    <h5>Conecta a tu niño con el token generado</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="single-content">
                <img src="{{ asset('images/infante1.png')}}" alt="Categorias Higienika Oficce Perú">
                <div class="text-content">
                    <h3>Multimedia</h3>
                    <hr class="style2">
                    <h5>Ten acceso a los archivos multimedia</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('products')
<div class="producst_body autoplay ">
     
</div>
@endsection

@section('footer')
<footer class="footer">
    <div class="l-footer">
        <img  class="footer_img" src="{{asset('images/logo-sin-background.png')}}" alt="Protecting You">
      
    <p>
    </p>
    </div>
        <ul class="r-footer">
            <li>
            <h2>Social</h2>
                <ul class="box">
                    <li class="button_social">
                        <i class="fab mr-2 fa-facebook"></i>
                        <a href="#" target="_blank">Facebook</a>
                    </li>
                    <li class="button_social">
                        <i class="fab mr-2 fa-twitter"></i>
                        <a href="#">Twitter</a>
                    </li>
                    <li class="button_social">
                        <i class="fab mr-2 fa-instagram"></i>
                        <a href="#" target="_blank">Instagram</a>
                    </li>
                    <li class="button_social">
                        <i class="fab mr-2 fa-linkedin-in"></i>
                        <a href="#" target="_blank">Linkedin</a>
                    </li>
                </ul>
            </li>
            <li class="features">
            <h2>Información</h2>
            <ul class="box">
                <li><a href="#">Políticas de Privacidad</a></li>
                <li><a href="#">Trabaja con nosotros</a></li>
            </ul>
            </li>
           
        </ul>
       
</footer>
@endsection
@section('title')
<div class="col-12">
		<div class="testimonial-title">
			<h5>CONOCE</h5>
            <h3>LAS VISTAS DEL INFANTE</h3>
            <hr class="style1">
	    </div>
</div>
@endsection
@section('title2')
<div class="col-12">
		<div class="testimonial-title">
			<h5>CONOCE</h5>
            <h3>LAS VISTAS DEL TUTOR</h3>
            <hr class="style1">
	    </div>
</div>
@endsection
@section('cards2')
<div class="container_cards">    
    <div class="row_cards">
   
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="single-content">
                <img src="{{ asset('images/listpadre.png')}}" >
                <div class="text-content">
                    <h3>Hijos</h3>
                    <hr class="style2">
                    <h5>Registra a todos los dispositivos de tus hijos</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="single-content">
                <img src="{{ asset('images/contacpadre.png')}}" >
                <div class="text-content">
                    <h3>Archivos</h3>
                    <hr class="style2">
                    <h5>Ten acceso a los archivos, contactos de tus hijos</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="single-content">
                <img src="{{ asset('images/perfilpadre.png')}}" >
                <div class="text-content">
                    <h3>Perfil</h3>
                    <hr class="style2">
                    <h5>Verifica tus datos personales</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="single-content">
                <img src="{{ asset('images/ubipadre.png')}}">
                <div class="text-content">
                    <h3>Ubicación</h3>
                    <hr class="style2">
                    <h5>Ten ubicación exacta de tu hijo</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
