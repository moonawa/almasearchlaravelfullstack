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
          <li>
            <a href="{{ route( 'dashboardcandidatvip') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-bank"  style="color: #035874;" ></i>
              <p style="font-weight: bold ; color: #035874; ">Tableau de bord</p>
            </a>
          </li>
          <li>
          @if (auth()->user()->candidat)
            <a href="{{ route('candidatvip.show', auth()->user()->candidat->id) }}"  style=" line-height: 1rem; ">
              <i class="nc-icon nc-single-02" style="color: #035874;" ></i>
              <p  style="font-weight: bold ; color: #035874;"> Profil</p>
            </a>
            @endif
          </li>
          <li>
            <a href="{{ route( 'formations') }}" style=" line-height: 1rem; " >
              <i class="nc-icon nc-user-run" style="color: #035874;" ></i>
              <p style="font-weight: bold; color: #035874;" > CV Détaillé</p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'motCles') }}" style=" line-height: 1rem; " >
              <i class="nc-icon nc-lock-circle-open" style="color: #035874;" ></i>
              <p style="font-weight: bold; color: #035874;" > Mots Clés</p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'offreencourscandidat') }}" style=" line-height: 1rem; ">
              <i class="nc-icon nc-refresh-69" style="color: #035874;" ></i>
              <p style="font-weight: bold; color: #035874;" > Offres </p>
            </a>
          </li>
       
          
        </ul>
      </div>
    </div>