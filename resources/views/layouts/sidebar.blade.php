<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo ">
        <a href="#" class="simple-text " >
          <div class=" ">
            <img src="{{ asset('admin/img/logoalma.png') }}" width="100px" >
          </div>
          <!-- <p>CT</p> -->
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
          @if (auth()->user()->entreprise)

            <a href="{{ route('entreprises.show', auth()->user()->entreprise->id) }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-diamond"></i>
              <p  style="font-weight: bold;">Profil</p>
            </a>
            @endif
          </li>
          <li>
            <a href="{{ route( 'offres') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-money-coins"></i>
              <p style="font-weight: bold;"> Toutes les Offres</p>
            </a>
          </li>
     <li>
            <a href="{{ route( 'offreencoursentreprise') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-refresh-69"></i>
              <p style="font-weight: bold;">Offres Encours</p>
            </a>
          </li>
            <li>
            <a href="{{ route( 'offreexpireentreprise') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-simple-remove"></i>
              <p style="font-weight: bold;">Offres Expirées </p>
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