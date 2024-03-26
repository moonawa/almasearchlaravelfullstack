<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{ asset('admin/img/logo-small-alma.jpg') }}">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="#" class="simple-text logo-normal">
          Alma Search
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="{{ route( 'dashboardcabinet') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Tableau de bord</p>
            </a>
          </li>
          <li>
          @if (auth()->user())
            <a href="{{ route('cabinets.show', auth()->user()) }}">
           
              <i class="nc-icon nc-diamond"></i>
              <p>Profil</p>
            </a>
            @endif
          </li>
         
          <li>
            <a href="{{ route( 'candidatcabinet') }}">
              <i class="nc-icon nc-single-02"></i>
              <p>Entreprises </p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'indexcabinet') }}">
              <i class="nc-icon nc-tile-56"></i>
              <p>Cabinets </p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'indexcabinet') }}">
              <i class="nc-icon nc-tile-56"></i>
              <p>Candidats </p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'indexcabinet') }}">
              <i class="nc-icon nc-tile-56"></i>
              <p>Offres </p>
            </a>
          </li>
        </ul>
      </div>
    </div>