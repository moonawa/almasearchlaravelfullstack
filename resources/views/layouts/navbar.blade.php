<nav class="navbar navbar-expand-lg navbar-absolute fixed-top " style="background: #035874;">
        <div class="container-fluid" style="background: #035874;">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;" style="color: #fff;">Tableau de bord</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
           
            <ul class="navbar-nav">
              
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i><span class="badge badge-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  @foreach (auth()->user()->unreadNotifications as $notification)
                  <div class="alert alert-success alert-dismissible fade show">
                            <span> {{ $notification->data['message'] }}</span>
                            <form action="{{ route('notifications.mark.as.read', $notification->id) }}" method="GET">
                              @csrf
                            <button type="submit"  class="btn btn-success" style="font-size: 14px;">Marqué comme lu
                            </form>
                        </div>
                  @endforeach
                
                </div>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link btn-rotate dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <p>
                 Bonjour {{ auth()->user()->name }} !
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('pass') }}">Mot de Passe</a>
                  <a class="dropdown-item" href="{{ route('logout') }}">Se Déconnecter</a>

                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>