<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo ">
        <a href="#" class="simple-text " >
          <div class=" ">
            <img src="{{ asset('admin/img/logo.jpeg') }}" width="100px" >
      
           
     
          </div>
         
        </a>
      
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="{{ route( 'dashboard') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-bank"  style="color: #035874;"></i>
              <p  style="font-weight: bold; color: #035874;">Tableau de bord</p>
            </a>
          </li>
          <li>
          @if (auth()->user()->interlocuteurese)

<a href="{{ route('entreprises.inter', auth()->user()->interlocuteurese->id) }}" style=" line-height: 1rem; ">
  <i class="nc-icon nc-diamond"  style="color: #035874;"></i>
  <p  style="font-weight: bold; color: #035874;">Profil</p>
</a>
@endif
          @if (auth()->user()->interlocuteurese)

            <a href="{{ route('entreprises.show', auth()->user()->interlocuteurese->id) }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-diamond"  style="color: #035874;"></i>
              <p  style="font-weight: bold; color: #035874;">Infos Entreprise</p>
            </a>
            @endif
          </li>
          <li>
            <a href="{{ route( 'indexinter') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-single-02"  style="color: #035874;"></i>
              <p style="font-weight: bold; color: #035874;"> Interlocuteurs</p>
            </a>
          </li>
        
     <li>
            <a href="{{ route( 'offreencoursentreprise') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-refresh-69"  style="color: #035874;"></i>
              <p style="font-weight: bold; color: #035874;">Offres </p>
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