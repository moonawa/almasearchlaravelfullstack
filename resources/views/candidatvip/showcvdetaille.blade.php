@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
  <div class="col-md-4">
    <div class="card card-user">
      <div class="image">
        <img src="{{ asset('admin/img/bg5.jpg') }}" alt="...">
      </div>
      <div class="card-body">
        <div class="author">
          @if (!$can->user->avatar)
          <img class="avatar border-gray" src=" {{ asset('admin/img/default-avatar.png') }}" alt="...">

          @else ( $can->user->avatar)
          <img class="avatar border-gray" src=" /avatars/{{ $can->user->avatar }}">
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
      <div class="card-footer">
        <hr>
        <div class="button-container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-6 ml-auto">
              <h5>CV<br> <a href="/uploads/{{ $can->cv }}"><i class="fa fa-eye" style="color: #ef8938"></i></a></h5>
            </div>
            <div class="col-lg-6 col-md-6 col-6 ml-auto mr-auto">
              <h5>Motivation<br><a href="/uploads/{{ $can->motivation }}"><i class="fa fa-eye" style="color: #ef8938"></i></a></h5>
            </div>

          </div>
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
@endsection