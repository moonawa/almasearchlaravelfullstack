@if(auth()->user()->role =='Entreprise')
<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo ">
        <a href="#" class="simple-text " >
          <div class=" ">
            <img src="{{ asset('admin/img/logo.jpeg') }}" width="100px" >
      
            @if(auth()->user()->interlocuteurese->entreprise->logo)
            <img class="avatar" src="/uploads/{{ auth()->user()->interlocuteurese->entreprise->logo }}"  style="border-radius: 50%; width: 50px; height:50px;" >
            @endif
     
          </div>
         
        </a>
      
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="{{ route( 'dashboard') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-bank"></i>
              <p  style="font-weight: bold;">Tableau de bord</p>
            </a>
          </li>
          <li>
          @if (auth()->user()->interlocuteurese)

            <a href="{{ route('entreprises.show', auth()->user()->interlocuteurese->id) }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-diamond"></i>
              <p  style="font-weight: bold;">Profil</p>
            </a>
            @endif
            @if (auth()->user()->interlocuteurese)

            <a href="{{ route('entreprises.show', auth()->user()->interlocuteurese->id) }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-diamond"></i>
              <p  style="font-weight: bold;">Infos Entreprise</p>
            </a>
            @endif
          </li>
          <li>
            <a href="{{ route( 'indexinter') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-single-02"></i>
              <p style="font-weight: bold;"> Interlocuteurs</p>
            </a>
          </li>
        
     <li>
            <a href="{{ route( 'offreencoursentreprise') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-refresh-69"></i>
              <p style="font-weight: bold;">Offres </p>
            </a>
          </li>
           
        
          
        </ul>
      </div>
    </div>
    @elseif(auth()->user()->role =='Admin')
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text ">
          <div class="">
            <img src="{{ asset('admin/img/logo.jpeg') }}" width="100px" >
          </div>
          <!-- <p>CT</p> -->
        </a>
      
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav" >
          <li >

              <a href="{{ route('dashboardadmin') }}" style=" line-height: 1rem; ">
                <i class="nc-icon nc-compass-05" ></i>
                <strong > Tableau de bord</strong>
              </a>

            </a>
          </li>
          
          <li >
          @if (auth()->user())
            <a href="{{ route('admin.show', auth()->user()) }}" style="line-height: 1rem; ">
              <i class="nc-icon nc-diamond"></i>
              <strong >Profil</strong>
            </a>
            @endif
          </li>
          <li>
            <a href="{{ route( 'admin.admin') }}" style="line-height: 1rem; ">
              <i class="nc-icon nc-favourite-28"></i>
              <strong >Membres </strong>
            </a>
          </li>
          <li>
            <a href="{{ route( 'admin.listentrepriseadmin') }}" style="line-height: 1rem; ">
              <i class="nc-icon nc-briefcase-24"></i>
              <strong >Entreprises </strong>
            </a>
          </li>
          <li>
            <a href="{{ route( 'admin.listcabinetadmin') }}" style="line-height: 1rem; ">
              <i class="nc-icon nc-badge"></i>
              <strong >Cabinets </strong>
            </a>
          </li>
          <li>
            <a href="{{ route( 'admin.listcandidatadmin') }}" style="line-height: 1rem; ">
              <i class="nc-icon nc-circle-10"></i>
              <strong >Candidats  </strong>
            </a>
          </li>
          
          <li>
            <a href="{{ route( 'admin.listcandidatnonadmin') }}" style="line-height: 1rem; ">
              <i class="nc-icon nc-circle-10"></i>
              <strong >Viviers </strong>
            </a>
          </li>
          <li>
            <a href="{{ route( 'offreencoursadmin') }}" style="line-height: 1rem; ">
              <i class="nc-icon nc-paper"></i>
              <strong >Offres </strong>
            </a>
          </li>
        </ul>
      </div>
    </div>
    @elseif(auth()->user()->role =='Cabinet')
    <div class="sidebar" data-color="white" data-active-color="danger">
<div class="logo ">
        <a href="#" class="simple-text " >
          <div class=" ">
            <img src="{{ asset('admin/img/logo.jpeg') }}" width="100px" >
      
          @if(auth()->user()->interlocuteurcbt->cabinet->logocbt)
            <img class="avatar" src="/uploads/{{ auth()->user()->interlocuteurcbt->cabinet->logocbt }}" width="50px" style="border-radius: 50%; width: 50px; height:50px;">
            @endif
        </a>
        </div>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="{{ route( 'dashboardcabinet') }}"  style=" line-height: 1rem; ">
              <i class="nc-icon nc-bank"></i>
              <p style="font-weight: bold;">Tableau de bord</p>
            </a>
          </li>
          <li>
          @if (auth()->user()->interlocuteurcbt)
            <a href="{{ route('cabinets.show', auth()->user()->interlocuteurcbt->id) }}"  style=" line-height: 1rem; ">
           
              <i class="nc-icon nc-diamond"></i>
              <p style="font-weight: bold;">Profil</p>
            </a>
            @endif
          </li>
          <li>
          @if (auth()->user()->interlocuteurcbt)
            <a href="{{ route('cabinets.show', auth()->user()->interlocuteurcbt->id) }}"  style=" line-height: 1rem; ">
           
              <i class="nc-icon nc-diamond"></i>
              <p style="font-weight: bold;">Infos Cabinet</p>
            </a>
            @endif
          </li>
          <li>
            <a href="{{ route( 'indexintercbt') }}"  style=" line-height: 1rem; ">
              <i class="nc-icon nc-single-02"></i>
              <p style="font-weight: bold;">Interlocuteurs </p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'candidatcabinet') }}"  style=" line-height: 1rem; ">
              <i class="nc-icon nc-circle-10"></i>
              <p style="font-weight: bold;">Viviers </p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'offreencourscabinet') }}"  style=" line-height: 1rem; ">
              <i class="nc-icon nc-tile-56"></i>
              <p style="font-weight: bold;">Offres </p>
            </a>
          </li>
     
          
        </ul>
      </div>
    </div>
    @elseif(auth()->user()->role =='CandidatVIP')
    <div class="sidebar" data-color="white" data-active-color="danger">
<div class="logo ">
        <a href="#" class="simple-text " >
          <div class=" ">
            <img src="{{ asset('admin/img/logo.jpeg') }}" width="100px" >
          </div>
          <!-- <p>CT</p> -->
        </a>
       
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="{{ route( 'dashboardcandidatvip') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-bank"></i>
              <p style="font-weight: bold ;">Tableau de bord</p>
            </a>
          </li>
          <li>
          @if (auth()->user()->candidat)
            <a href="{{ route('candidatvip.show', auth()->user()->candidat->id) }}"  style=" line-height: 1rem; ">
              <i class="nc-icon nc-single-02"></i>
              <p  style="font-weight: bold ;"> Profil</p>
            </a>
            @endif
          </li>
          <li>
            <a href="{{ route( 'formations') }}" style=" line-height: 1rem; " >
              <i class="nc-icon nc-user-run"></i>
              <p style="font-weight: bold;"> CV Détaillé</p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'motCles') }}" style=" line-height: 1rem; " >
              <i class="nc-icon nc-lock-circle-open"></i>
              <p style="font-weight: bold;"> Mots Clés</p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'offreencourscandidat') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-refresh-69"></i>
              <p style="font-weight: bold;"> Offres </p>
            </a>
          </li>
        
      
        </ul>
      </div>
    </div>
    @endif