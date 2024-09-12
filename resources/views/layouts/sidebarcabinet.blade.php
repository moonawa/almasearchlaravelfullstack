<div class="sidebar" data-color="white" data-active-color="danger">
<div class="logo ">
        <a href="#" class="simple-text " >
          <div class=" ">
            <img src="{{ asset('admin/img/logo.jpeg') }}" width="100px" >
      
         
        </a>
        </div>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="{{ route( 'dashboardcabinet') }}"  style=" line-height: 1rem; ">
              <i class="nc-icon nc-bank" style=" color: #035874;"></i>
              <p style="font-weight: bold;  color: #035874;" >Tableau de bord</p>
            </a>
          </li>
          <li>
          @if (auth()->user()->interlocuteurcbt)
            <a href="{{ route('cabinets.intercbt', auth()->user()->interlocuteurcbt->id) }}"  style=" line-height: 1rem; ">
           
              <i class="nc-icon nc-diamond" style=" color: #035874;"></i>
              <p style="font-weight: bold; color: #035874;">Profil</p>
            </a>
            @endif
          </li>
          <li>
          @if (auth()->user()->interlocuteurcbt)
            <a href="{{ route('cabinets.show', auth()->user()->interlocuteurcbt->id) }}"  style=" line-height: 1rem; ">
           
              <i class="nc-icon nc-diamond" style=" color: #035874;"></i>
              <p style="font-weight: bold; color: #035874;">Infos Cabinet</p>
            </a>
            @endif
          </li>
          <li>
            <a href="{{ route( 'indexintercbt') }}"  style=" line-height: 1rem; ">
              <i class="nc-icon nc-single-02" style=" color: #035874;"></i>
              <p style="font-weight: bold; color: #035874;">Interlocuteurs </p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'candidatcabinet') }}"  style=" line-height: 1rem; ">
              <i class="nc-icon nc-circle-10" style=" color: #035874;"></i>
              <p style="font-weight: bold; color: #035874;">Viviers </p>
            </a>
          </li>
          <li>
            <a href="{{ route( 'offreencourscabinet') }}"  style=" line-height: 1rem; ">
              <i class="nc-icon nc-tile-56" style=" color: #035874;"></i>
              <p style="font-weight: bold; color: #035874;">Offres </p>
            </a>
          </li>
     
          
        </ul>
      </div>
    </div>