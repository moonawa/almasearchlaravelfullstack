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

<a href="{{ route('entreprises.inter', auth()->user()->interlocuteurese->id) }}" style=" line-height: 1rem; ">
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
          
           <!--    <li>
            <a href="./tables.html">
              <i class="nc-icon nc-tile-56"></i>
              <p>Admin </p>
            </a>
          </li>
          <li>
            <a href="./typography.html">
              <i class="nc-icon nc-caps-small"></i>
              <p>Typography</p>
            </a>
          </li> -->
          
        </ul>
      </div>
    </div>