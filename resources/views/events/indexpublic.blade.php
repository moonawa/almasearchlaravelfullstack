<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alma Search</title>
    <link rel="icon" type="image/png" href="{{ asset('admin/img/logoicon.png') }}" sizes="50x50">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body >
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
<div class="container-fluid p-5" style="background-image: url('admin/img/513dc72033.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center; width: 100%; height: 300px;">
</div>
<div class="container">
<div class="row">
    <div class="col-md-12">
       
        
            <div class="col-md-12 pt-4">
                <div class="row">
           
            @if($events->count() > 0)
            @foreach($events as $event)
            <div class="col-md-4 ">
                <div class="card m-2">
                    @if(!$event->photo)
                    <img src="{{ asset('admin/img/almafond3.jpg') }}" style ="width: 300px; height: 150px;" alt="...">
                    @else
                    <img src="/uploads/{{ $event->photo}} " style ="width: 300px; height: 150px;" alt="...">

                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->nomevent }}</h5>
                      
                        <p class="card-text">{!! $event->description !!}</p>
                   
                        <p class="card-text">{{ $event->lieuevent }}</p>
                        <p class="card-text">{{ $event->dateevennement }}</p>
                        <p>
                        <a href="{{ route('showpublic', $event->id) }}" class="btn " style="background: #035874; color: white;">
                        Voir
                        </a>
                       
                        </p>
            </div>
            </div>
            </div>
            @endforeach
            @else
            <p class="text-center" colspan="5">La liste des évennements est vide</p>
            @endif
      
     
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Dans le <head> ou avant la fermeture du <body> -->
<script src="https://cdn.ckeditor.com/4.22.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>

</body>
</html>