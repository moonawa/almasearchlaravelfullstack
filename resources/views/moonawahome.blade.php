<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body >
    
<!-- Navigation -->
<nav class="navbar navbar-expand-lg  static-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('admin/img/logoalma.png') }}" alt="..." height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">A Propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services"> Services</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item" style="margin: 5px;">
        <button  class="btn  btn-round  " style="background-color: #ef882b;"> 
    <a href="#services" style="color: white; text-decoration: none;">S' inscrire</a> </button>

        </li>
        <li class="nav-item" style="margin: 5px;">
        <button  class="btn  btn-round  " style="background-color: #325fa6;"> 
    <a href=" {{ route('login') }}" style="color: white; text-decoration: none;">Se Connecter</a> </button>

        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
<img src="admin/img/0cbd44aa01.jpeg" alt="" width="100%">
</div><br><br>
<!-- Slider
<div id="carouselExampleDark" class="carousel carousel-dark slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="{{ asset('admin/img/main-background-img.jpeg') }}" class="d-block w-100" alt="main-background-img" width="1280px" height="500px">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="{{ asset('admin/img/main-background-img.jpeg') }}" class="d-block w-100" alt="..." width="1280px" height="500px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item" style="background-image: url('admin/img/main-home-rev-slider-background-1.png')">
      <img src="{{ asset('admin/img/main-background-img.jpeg') }}" class="d-block w-100" alt="..." width="100%" height="500px">
      <div  class="carousel-caption d-none d-md-block" >
      <div  style="background-image: url('admin/img/main-home-rev-slider-background-1.png'); background-repeat: no-repeat;">
      <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
        
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 end Slider-->

 <div class="container"  >
    <div class=" col-md-12">
        <div class="row">
            <div class="col-md-8">
                <div class="">
                  <h3> Découvrez Alma Search, votre destination ultime pour simplifier le processus de recrutement.</h3>
                  <p style="text-align: justify;">
                 
                   Que vous soyez un candidat à la recherche d'opportunités,
                    une entreprise en quête de talents ou
                     un cabinet de recrutement désireux de faciliter ses placements,
                      nous sommes là pour vous accompagner à chaque étape du processus.
                       Explorez notre plateforme dès aujourd'hui et commencez à façonner l'avenir de votre carrière ou de votre entreprise avec nous.
                
                   
                   Nous sommes dédiés à fournir une expérience fluide et efficace, 
                   en connectant les meilleurs talents avec les opportunités professionnelles qui leur correspondent.
                  </p>
                </div>

           
            </div>
            <div class="col-md-4" >
                <div>
                    <img src="admin/img/alma.png" alt="" width="400px">
                </div>
                
            </div>
        </div>
    </div>
 </div>
 <br><br>
<div class="container"  style="border:1px solid #ef882b; " id="services">
  <div class="col-md-12" >
    <div class="row">
    <h3 class="text-center "><br>Explorez nos Services</h3>
    <div class="col-md-4 "><br><br>
  <center> <img  src="{{ asset('admin/img/cv.png') }}" alt="..." height="90"></center> 
<br>
        <h5 class="text-center" style="color:#ef882b;">Vous êtes un candidat</h5>
        <p style="font-size: 14px; text-align:justify;">Notre plateforme offre une gamme de services pour les candidats à la recherche d'opportunités professionnelles. 
          Vous pouvez vous inscrire gratuitement, mettre à jour votre CV à tout moment,vos cv seront envoyés aux entreprises directement.
           Nous sommes là pour vous aider à trouver le poste parfait pour votre carrière.</p>
        <br><br>
        <a  href=" {{ route('registercandidat') }}" style=" color: #000; text-decoration: none;"> 
         <p class="text-center"> S'inscrire</p>
      </a>
    </div>
    <div class="col-md-4 "><br><br>
    <center> <img  src="{{ asset('admin/img/recruitment1.png') }}" alt="..." height="90"></center> 

<br>
        <h5 class="text-center" style="color:#ef882b;">Vous êtes une entreprise</h5>
        <p  style="font-size: 14px; text-align:justify;">Les entreprises peuvent tirer parti de notre plateforme pour simplifier leur processus de recrutement.
           Créez et publiez des offres d'emploi, recherchez des candidats qualifiés, planifiez des entretiens et recrutez efficacement, le tout sur une seule plateforme conviviale.
           Nous vous offrons les outils dont vous avez besoin pour trouver les talents qui feront avancer votre entreprise.</p>
        <br>
        <a   href=" {{ route('register') }}" style=" color: #000; text-decoration: none;"> <p class="text-center"> S'inscrire</p></a>
    </div>
    <div class="col-md-4 "><br><br>
    <center> <img  src="{{ asset('admin/img/recruitment.png') }}" alt="..." height="90"></center> 
<br>
        <h5 class="text-center" style="color:#ef882b;">Vous êtes un cabinet</h5>
        <p  style="font-size: 14px; text-align:justify;">Les cabinets de recrutement peuvent maximiser leur efficacité grâce à notre plateforme. 
          Repérez les offres d'emploi pertinentes pour vos candidats, proposez-leur les meilleures opportunités, gérez les processus de candidature et simplifiez la collaboration avec les entreprises clientes. 
          Nous sommes là pour vous aider à faire correspondre les meilleurs talents avec les meilleures opportunités.</p>
        <br>
        <a  href=" {{ route('registercabinet') }}" style=" color: #000; text-decoration: none;">
        <p class="text-center"> S'inscrire </p>
 </a>
        </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <center><img src="admin/img/demoalma.jpg" alt="" wiidth="100%"></center>
</div>


  <div class="container-fluid	" style="background-color: #325fa6; padding: 30px;">
    <div class="row">
      <div class="col-md-3">
        <img src="admin/img/logoalmacopie.png" alt="" width="200px">
      </div>
      <div class="col-md-3">
        <h4 style="color:white;">Liens Utiles</h4>
        <ul>
          <li style="color:white;">Accueil</li>
          <li style="color:white;">A propos</li>
          <li style="color:white;">Services</li>
          <li style="color:white;">Contact</li>
        </ul>
      </div>
      <div class="col-md-3">
        <h4 style="color:white;">Services</h4>
        <ul>
          <li style="color:white;"><a href="#services" style="color:white; text-decoration:none;">Candidat</a> </li>
          <li style="color:white;"><a href="#services" style="color:white; text-decoration:none;">Entreprise</a></li>
          <li style="color:white;"><a href="#services" style="color:white; text-decoration:none;">Cabinet</a></li>
        </ul>
      </div>
      <div class="col-md-3">
  
        <button  class="btn  btn-round  " style="background-color: #ef882b;"> 
    <a href="#services" style="color: white; text-decoration: none;">S' inscrire</a> </button>

       
        <button  class="btn  btn-round  " style="background-color: #ffffff;"> 
    <a href=" {{ route('login') }}" style="color: #325FA6; text-decoration: none;">Se Connecter</a> </button>

      
      </div>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>