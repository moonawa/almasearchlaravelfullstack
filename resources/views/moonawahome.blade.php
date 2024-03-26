<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
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
          <a class="nav-link" href="#"> Services</a>
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
    <a href=" {{ route('login') }}" style="color: white; text-decoration: none;">S' inscrire</a> </button>

        </li>
        <li class="nav-item" style="margin: 5px;">
        <button  class="btn  btn-round  " style="background-color: #325fa6;"> 
    <a href=" {{ route('login') }}" style="color: white; text-decoration: none;">Se Connecter</a> </button>

        </li>
      </ul>
    </div>
  </div>
</nav>


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

 <div class="container">
    <div class=" col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
           
            </div>
            <div class="col-md-6" >
                <div style="background-image: url('admin/img/home-1-phone-1.png '); background-repeat: no-repeat;">
                    <img src="admin/img/home-1-phone-11.png" alt="">
                </div>
                
            </div>
      
    </div>
 </div>
<div class="container">
  <div class="col-md-12">
    <div class="row" style="border:1px solid #325fa6; padding:5px; margin:5px;">
    <h3 class="text-center " style="padding: 50px;">Powered by an intelligent global network, our connectivity cloud is a unified platform that helps your business work, deliver, and innovate everywhere.</h3>
    <div class="col-md-4 mt-5">
  <center> <img  src="{{ asset('admin/img/candidat.png') }}" alt="..." height="90"></center> 

        <h5 class="text-center">Pour le candidat</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, ex.</p>
        <br>
        <a  href=" {{ route('registercandidat') }}" style="text-decoration: none;"> <p class="text-center"> S'inscrire</p></a>
    </div>
    <div class="col-md-4 mt-5">
    <center> <img  src="{{ asset('admin/img/organisation.png') }}" alt="..." height="90"></center> 


        <h5 class="text-center">Pour l'entreprise</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, ex.</p>
        <br>
        <a   href=" {{ route('register') }}" style="text-decoration: none;"> <p class="text-center"> S'inscrire</p></a>
    </div>
    <div class="col-md-4 mt-5">
    <center> <img  src="{{ asset('admin/img/organisation.png') }}" alt="..." height="90"></center> 

        <h5 class="text-center">Pour le cabinet</h5>
        <p>Lorem ipsum dolor sit amet, conse consectetur adipisicing elit. Voluptatum, ex.</p>
        <br>
        <a  href=" {{ route('registercabinet') }}" style="text-decoration: none;">
        <p class="text-center"> S'inscrire</p> </a>
        </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>