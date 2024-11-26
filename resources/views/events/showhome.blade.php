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
<div class="col-md-12">
<div class="card p-5">
    <p>Evennement</p>
    <h1>{{ $event->nomevent }}</h1>
    @if(!$event->photo)
        <img src="{{ asset('admin/img/almafond3.jpg') }}" style ="width: 100%; height: 500px;" alt="...">
    @else
        <img src="/uploads/{{ $event->photo}} " style ="width: 100%; height: 500px;" alt="...">
    @endif
    <p>{!! $event->description !!}</p>
</div>
</div> 
