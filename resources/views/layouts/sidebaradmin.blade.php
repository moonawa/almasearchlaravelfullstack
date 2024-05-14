<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text ">
          <div class="">
            <img src="{{ asset('admin/img/logoalma.png') }}" width="100px" >
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
              <strong >Candidats VIP </strong>
            </a>
          </li>
          
          <li>
            <a href="{{ route( 'admin.listcandidatnonadmin') }}" style="line-height: 1rem; ">
              <i class="nc-icon nc-circle-10"></i>
              <strong >Candidats </strong>
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