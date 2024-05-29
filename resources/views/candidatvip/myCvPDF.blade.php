
<!DOCTYPE html>
<html lang="en">

<head>


  <title>
    Paper Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <!-- CSS Files -->
    <link href="{{ public_path('admin/css/bootstrap.min.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ public_path('admin/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet"  type="text/css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ public_path('admin/demo/demo.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ public_path('admin/css/moonawa.css') }}" rel="stylesheet"  type="text/css">

</head>

<body class="">
<div class="wrapper ">
<div class="main-panel">
<div class="content">
<div class="row">
  <div class="col-md-4">
    <div class="card card-user">
      <div class="image">
        <img src="{{ public_path('admin/img/bg5.jpg') }}" alt="...">
      </div>
      <div class="card-body">
        <div class="author">
          @if (!$can->user->avatar)
          <img class="avatar border-gray" src=" {{ public_path('admin/img/default-avatar.png') }}" alt="...">

          @else ( $can->user->avatar)
          <img class="avatar border-gray" src=" /avatars/{{$can->user->avatar}}">
          @endif

          
          

          <p class="title">
            {{ $can->user->name }}
          </p>
          <p>
            {{ $can->genre }}
          </p>
          <p>
            {{ $can->nationnalite }}
          </p>
          <p>
            Tel: {{ $can->user->telephone }}
          </p>
          <p>
            Mail: {{ $can->user->email }}
          </p>
          <p>
            Fonction: {{ $can->fonction }}
          </p>
        </div>

      </div>
     
    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Compétences</h4>
      </div>

      <div class="card-body">
     

      <ul>
      @foreach($can->competences as $rs)
         <li> {{ $rs->nomcompetence }}</li>
         @endforeach  
</ul>
          
        
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Langues</h4>
      </div>

      <div class="card-body">
    

      <ul>
      @foreach($can->langues as $rs)
       <li> {{ $rs->nomlangue }}</li>    
       @endforeach
</ul>
          
        
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Références</h4>
      </div>

      <div class="card-body">

     
<ul>
@foreach($can->references as $rs)
  <li>
  <strong>
      {{ $rs->nomreferent }}
    </strong>
 <p>  {{ $rs->posteoccupereferent }} , {{ $rs->entreprisereferent }}
   {{ $rs->mailreferent }},  {{ $rs->telephonereferent }}</p>
  
  </li>
  @endforeach
</ul>
     
   
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title"> Formations</h5>
      </div>
      <div class="card-body">
       
   

      <ul >
      @foreach($can->formations as $rs)
    <li >
   
       
            <strong> {{  $rs->nomformation }}</strong>
            <p> {{  $rs->anneeacademique }} , {{  $rs->etablissementformation }}</p>
          </li>
          @endforeach
        </ul>

      </div>

    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Expérience Professionelle</h4>
      </div>
      <div class="card-body">
    

      <ul >
      @foreach($can->experiences as $rs)
    <li >

       
            <strong> {{  $rs->missionexperience }}</strong>
            <p> Depuis {{  $rs->datedebutexperience }} à {{  $rs->datefinexperience }}</p>
            <p> {{  $rs->entrepriseexperience }}  </p>
          </li>
          @endforeach
        </ul>
       


      </div>
    </div>
  </div>

</div>
</div>
</div>
</div>


<script src="{{ public_path('admin/js/moonawa.js') }}"></script>
<script src="{{ public_path('admin/js/core/jquery.min.js') }}"></script>
<script src="{{ public_path('admin/js/core/popper.min.js') }}"></script>
<script src="{{ public_path('admin/js/core/bootstrap.min.js') }}"></script>
<script src="{{ public_path('admin/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

<!--  Google Maps Plugin    -->

<script src="{{ public_path('admin/js/plugins/chartjs.min.js') }}"></script>
<script src="{{ public_path('admin/js/plugins/bootstrap-notify.js') }}"></script>
<script src="{{ public_path('admin/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript" ></script>
<script src="{{ public_path('admin/demo/demo.js') }}"></script>
<script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
