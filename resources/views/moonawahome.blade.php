<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alma Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body >
    
<!-- Navigation -->
<nav class="navbar navbar-expand-lg  static-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('admin/img/logo.jpeg') }}" alt="..." height="85">
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
          <a class="nav-link" href="#propos">A Propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services"> Services</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Comment ça Marche
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Candidat</a></li>
            <li><a class="dropdown-item" href="#">Entreprise </a></li>
           
            <li><a class="dropdown-item" href="#">Cabinet</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item" style="margin: 5px;">
     
    <a href="#services" class="btn  btn-round " style="color: white; background-color: #035874; text-decoration: none;">S' inscrire</a> 
    

        </li>
        <li class="nav-item" style="margin: 5px;">
      
    <a class="btn  btn-round  " href=" {{ route('login') }}" style="background-color: #7ac9e8; color: white; text-decoration: none;">Se Connecter</a> 

        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid p-5" style="background-image: url('admin/img/0fee6af4fa.jpeg'); background-repeat: no-repeat; background-size: cover;">
<div class="row">
  <div class="col-md-12">
    <div class="col-md-6 p-5">
    <div class="card " >
  <div class="card-body">
    <h4 class="card-title">Découvrez Alma Search, votre destination ultime pour simplifier le processus de recrutement.
</h4>
    <p class="card-text"> Nous sommes dédiés à fournir une expérience fluide et efficace, 
                   en connectant les meilleurs talents avec les opportunités professionnelles qui leur correspondent.</p>
   <a href="#" class="btn  mt-2" style="background-color: #035874; color:white;">Comment ça Marche</a>
  </div>
</div>
    </div>
  </div>
</div>
</div>
<div class="container mt-5 mb-5"  id="services">
  <div class="col-md-12" >
    <div class="row">
    <h3 class="text-center ">Explorez nos Services</h3>
    <div class="col-md-4 p-5"><br>
  <center> <img  src="{{ asset('admin/img/cv.png') }}" alt="..." height="90"></center> 
<br>
        <h5 class="text-center" style="color:#7ac9e8;">Vous êtes un candidat</h5>
        <p style=" text-align:center;">
          Vous pouvez vous inscrire gratuitement, mettre à jour votre CV à tout moment, vos cv seront envoyés aux entreprises directement.
          </p>
        
        <a  href=" {{ route('registercandidat') }}" style=" color: #000; "> 
         <p class="text-center"> S'inscrire </p>
      </a>
    </div>
    <div class="col-md-4 p-5"><br>
    <center> <img  src="{{ asset('admin/img/recruitment1.png') }}" alt="..." height="90"></center> 

<br>
        <h5 class="text-center" style="color:#7ac9e8;">Vous êtes une entreprise</h5>
        <p  style=" text-align:center;">
           Créez et publiez des offres d'emploi, recherchez des candidats qualifiés, planifiez des entretiens et recrutez efficacement.
          </p>
        
        <a   href=" {{ route('register') }}" style=" color: #000; "> <p class="text-center"> S'inscrire</p></a>
    </div>
    <div class="col-md-4 p-5"><br>
    <center> <img  src="{{ asset('admin/img/recruitment.png') }}" alt="..." height="90"></center> 
<br>
        <h5 class="text-center" style="color:#7ac9e8;">Vous êtes un cabinet</h5>
        <p  style=" text-align:center;"> 
          Repérez les offres d'emploi pertinentes pour vos candidats, proposez-leur les meilleures opportunités. 
        </p>
        
        <a  href=" {{ route('registercabinet') }}" style=" color: #000; ">
        <p class="text-center"> S'inscrire </p>
 </a>
        </div>
    </div>
  </div>
</div>

<div class="container-fluid p-5" id="propos" style="background-image: url(admin/img/d2c4674a16.jpg); background-repeat: no-repeat; background-size: cover; opacity: 0.9;">
 <div class="container mt-5 " >
    <div class=" col-md-12">
        <div class="row" style="background-color: white;">
            <div class="col-md-7 p-5" >
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
            <div class="col-md-5 p-5" >
                <div>
                    <img src="admin/img/alma.png" alt="" width="400px">
                </div>
                
            </div>
        </div>
    </div>
 </div>
 </div>

<div class="container-fluid mb-5">
  <center><img src="admin/img/Modele.jpg" alt="" wiidth="100%"></center>
</div>


  <div class="container-fluid	" style="background-color: #035874; padding: 30px;">
    <div class="row">
      <div class="col-md-3">
        <img src="admin/img/logo-removebg.png" alt="" width="200px">
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
  
        <button  class="btn  btn-round" style="background-color: #7ac9e8;"> 
    <a href="#services" style="color: white; text-decoration: none;">S' inscrire</a> </button>
        <button  class="btn  btn-round  " style="background-color: #ffffff;"> 
    <a href=" {{ route('login') }}" style="color: #7ac9e8; text-decoration: none;">Se Connecter</a> </button>

      
      </div>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>