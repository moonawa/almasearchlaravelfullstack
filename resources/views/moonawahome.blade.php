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
            <li><a class="dropdown-item" href="{{ route('csmcandidat') }}">Candidat</a></li>
            <li><a class="dropdown-item" href="{{ route('csmentreprise') }}">Entreprise </a></li>
           
            <li><a class="dropdown-item" href="{{ route('csmcabinet') }}">Cabinet</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
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
<!-- Navigation -->
<div class="container-fluid p-5" style="background-image: url('admin/img/photo5accueilfiltrenoir.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center; width: 100%; height: 600px;">
<center>
  <h1 style="color:white; padding-top: 200px;"> Découvrez Alma Search, votre destination ultime pour simplifier le processus de recrutement.</h1>
  <a href="#services" class="btn  btn-round" style="background-color:white; color: #7ac9e8;">S'inscrire</a>
</center>

<div class="row">
  <div class="col-md-12">
    <div class="col-md-6 p-5" style="text-align: center;">
    </div>
  </div>
</div>
</div>
<div class="container mt-5 mb-5"  id="services">
  <div class="col-md-12" >
    <div class="row">
    <h3 class="text-center ">Explorez nos Services</h3>
    <div class="col-md-4 p-5"><br>
  <center> <img  src="{{ asset('admin/img/cv.png') }}" alt="..." height="90 " ></center> 
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
    <center> <img  src="{{ asset('admin/img/cabinet.png') }}" alt="..." height="90 " ></center> 

<br>
        <h5 class="text-center" style="color:#7ac9e8;">Vous êtes une entreprise</h5>
        <p  style=" text-align:center;">
           Créez et publiez des offres d'emploi, recherchez des candidats qualifiés, planifiez des entretiens et recrutez efficacement.
          </p>
        
        <a   href=" {{ route('register') }}" style=" color: #000; "> <p class="text-center"> S'inscrire</p></a>
    </div>
    <div class="col-md-4 p-5"><br>
    <center> <img  src="{{ asset('admin/img/recruitment.png') }}" alt="..." height="90 "></center> 
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

<div class="container-fluid p-5" id="propos" style="background-image: url(admin/img/bg2alma.jpeg); background-repeat: no-repeat; background-size: cover; opacity: 0.9;">
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
                    <img src="admin/img/photo4presentation.jpg" alt="" width="400px">
                </div>
                
            </div>
        </div>
    </div>
 </div>
 </div>

<div class="container-fluid mb-5" id="contact">
  <center><img src="admin/img/Modele.jpg" alt="" wiidth="100%"></center>
</div>

<!-- events -->
 <!-- pour le caroussel -->
<div class="container">
@if($events)
<h3 class="">Blog</h3>

<div class="col-md-12 pt-4">
                <div class="row">
           
            @if($events->count() > 0)
            @foreach($events as $event)
            <div class="col-md-4">
                <div class="card">
                    @if(!$event->photo)
                    <img src="{{ asset('admin/img/almafond3.jpg') }}" style ="width: 400px; height: 200px;" alt="...">
                    @else
                    <img src="/uploads/{{ $event->photo}} " style ="width: 350px; height: 200px;" alt="...">

                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->nomevent }}</h5>
                        <p class="card-text">{!! $event->description !!}</p>
                        <p class="card-text"><i class="fa fa-trash"></i> {{ $event->lieuevent }}</p>
                        <p class="card-text">{{ $event->dateevennement }}</p>
                        <p>
                        <a href="{{route('showpublic', $event->id)}}" style=" background: #035874; color: white; " class="btn">

                        En Savoir plus
                        </a>
                        </p>
            </div>
            </div>
            </div>
            @endforeach
            @else
            <p class="text-center" colspan="5">A venir</p>
            @endif
      
        </div>
      <center>  <a href="{{ route('indexpublic') }}" class="btn m-3" style="background: #7ac9e8; color: white;">Voir Plus d'évènements</a></center>

    </div>
    @endif
    </div>
<!--fin pour le caroussel -->
<!-- events -->

<div class="container-fluid	" style="background-color: #035874; padding: 30px;">
    <div class="row">
      <div class="col-md-3">
        <img src="admin/img/logoalmasearchfooter.png" alt="" width="200px">
        <a href="maito:contact@alma-search.com" style="color:white; text-decoration: none;">contact@alma-search.com</a>

      </div>
      <div class="col-md-3">
        <h4 style="color:white;">Liens Utiles</h4>
        <ul>
          <li style="color:white;"><a href="#" style="color:white; text-decoration:none;">Accueil</a></li>
          <li style="color:white;"><a href="#propos" style="color:white; text-decoration:none;">A propos</a></li>
          <li style="color:white;"><a href="#services" style="color:white; text-decoration:none;">Services</a></li> 
          <li style="color:white;"><a href="#contact" style="color:white; text-decoration:none;">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h4 style="color:white;">Services</h4>
        <ul>
          <li style="color:white;"><a href="{{ route('csmcandidat') }}" style="color:white; text-decoration:none;">Candidat</a> </li>
          <li style="color:white;"><a href="{{ route('csmentreprise') }}" style="color:white; text-decoration:none;">Entreprise</a></li>
          <li style="color:white;"><a href="{{ route('csmcabinet') }}" style="color:white; text-decoration:none;">Cabinet</a></li>
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