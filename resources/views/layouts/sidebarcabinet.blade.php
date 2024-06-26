<div class="sidebar" data-color="white" data-active-color="danger">
<div class="logo ">
        <a href="#" class="simple-text " >
          <div class=" ">
            <img src="{{ asset('admin/img/logoalma.png') }}" width="100px" >
      
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
              <p style="font-weight: bold;">Offres En Cours</p>
            </a>
          </li>
     
          
        </ul>
      </div>
    </div>