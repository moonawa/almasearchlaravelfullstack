<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alma Search</title>
    <link rel="icon" type="image/png" href="{{ asset('admin/img/logoicon.png') }}" sizes="50x50">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  </head>
<body>
    
<!-- Navigation -->
<nav class="navbar navbar-expand-lg  static-top">
  <div class="container">
    <a class="navbar-brand" href="https://alma-search.com/">
      <img src="{{ asset('admin/img/logo.jpeg') }}" alt="..." height="85">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="https://alma-search.com/">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://alma-search.com/#propos">A Propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://alma-search.com/#services"> Services</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Comment ça Marche
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('csmcandidat') }}">Candidat</a></li>
            <li><a class="dropdown-item" href="{{ route('csmentreprise') }}">Entreprise </a></li>
           
            <li><a class="dropdown-item" href="{{ route('csmcabinet') }}">Cabinet</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://alma-search.com/#contact">Contact</a>
        </li>
        <li class="nav-item" style="margin: 5px;">
     
    <a href="https://alma-search.com/#services" class="btn  btn-round " style="color: white; background-color: #035874; text-decoration: none;">S' inscrire</a> 
    

        </li>
        <li class="nav-item" style="margin: 5px;">
      
    <a class="btn  btn-round  " href=" {{ route('login') }}" style="background-color: #7ac9e8; color: white; text-decoration: none;">Se Connecter</a> 

        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navigation -->
<div class="container-fluid p-5" style="background-image: url('admin/img/513dc72033.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center; width: 100%; height: 300px;">
</div>
<div class="container p-5">
    <h1>Vous etes un cabinet?</h1>
   
       <h3>   <h3>Inscrivez-vous gratuitement</h3></h3>
        <p>  
        Les cabinets peuvent enrichir leur vivier de candidats et gérer les profils de leur réseau. Lorsqu’une entreprise sollicite un cabinet, celui-ci peut recommander certains candidats et initier le processus de mise en relation. Le cabinet coordonne alors avec l’entreprise pour programmer les rendez-vous d’entretien et reçoit les retours de l’entreprise pour les communiquer aux candidats.
</p>
<a href="{{ route('registercabinet')}}" class="btn  btn-round " style="background-color: #035874; color: white;">S'inscrire</a>
    <p style="margin: 100px;"></p>
</div>
<div class="container-fluid	" style="background-color: #035874; padding: 30px;">
    <div class="row">
      <div class="col-md-3">
        <img src="admin/img/logoalmasearchfooter.png" alt="" width="200px">
        <a href="maito:contact@alma-search.com" style="color:white; text-decoration: none;">contact@alma-search.com</a>
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
          <li style="color:white;"><a href="https://alma-search.com/" style="color:white; text-decoration:none;">Accueil</a></li>
          <li style="color:white;"><a href="https://alma-search.com/#propos" style="color:white; text-decoration:none;">A propos</a></li>
          <li style="color:white;"><a href="https://alma-search.com/#services" style="color:white; text-decoration:none;">Services</a></li> 
          <li style="color:white;"><a href="https://alma-search.com/#contact" style="color:white; text-decoration:none;">Contact</a></li>
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