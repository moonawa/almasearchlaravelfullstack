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
              <p  style="font-weight: bold ;"> profil</p>
            </a>
            @endif
          </li>
          <li>
            <a href="{{ route( 'formations') }}" style=" line-height: 1rem; " >
              <i class="nc-icon nc-user-run"></i>
              <p style="font-weight: bold;"> CV détaillé</p>
            </a>
          </li>
          
          <li>
            <a href="{{ route( 'offreencourscandidat') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-refresh-69"></i>
              <p style="font-weight: bold;"> Offre En cours</p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'offrerecrutecandidat') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-satisfied" ></i>
              <p style="font-weight: bold;"> Offres Recrutées</p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'offredeclinecandidat') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-simple-remove"></i>
              <p style="font-weight: bold;"> Offres Déclinées</p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'showcandidat') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-paper"></i>
              <p style="font-weight: bold;">Toutes les Offres </p>
            </a>
          </li>
        </ul>
      </div>
    </div>