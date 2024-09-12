@extends('layouts.appadmin')


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
            {{ $can->genre }}, {{ $can->situationmatrimonaile }}, {{ $can->nationnalite }}

          </p>
          <p>
            Permis: {{ $can->permisconduire }}
          </p>
          <p>
            {{ $can->user->telephone }}, {{ $can->user->email }}
          </p>
          <p>
            Salaire: {{ $can->tranchesalariale }}
          </p>
          <p>
            Expérience: {{ $can->trancheanneeexpeience }}
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
              <h5>CV<br> <a href="/uploads/{{ $can->cv }}"><i class="fa fa-eye" style="color: #035874"></i></a></h5>
            </div>
            <div class="col-lg-6 col-md-6 col-6 ml-auto mr-auto">
              <h5>Fichiers<br><a href="/uploads/{{ $can->motivation }}"><i class="fa fa-eye" style="color: #035874"></i></a></h5>
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
        <h4 class="card-title">Mot clés</h4>
      </div>

      <div class="card-body">
    

      <ul>
      @foreach($can->mot_cles as $rs)
       <li> {{ $rs->mot }}</li>    
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
            <p> {{ $rs->posteoccupereferent }} , {{ $rs->entreprisereferent }}
              {{ $rs->mailreferent }}, {{ $rs->telephonereferent }}
            </p>

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
        <ul>
          @foreach($can->formations as $rs)
          <li>


            <strong> {{ $rs->nomformation }}</strong>
            <p> {{ $rs->anneeacademique }} , {{ $rs->etablissementformation }}</p>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Expériences Professionelles</h4>
      </div>
      <div class="card-body">
        <ul>
          @foreach($can->experiences as $rs)
          <li>
            <strong> {{ $rs->missionexperience }}</strong>
            <p> Depuis {{ $rs->datedebutexperience }} à {{ $rs->datefinexperience }}</p>
            <p> {{ $rs->entrepriseexperience }} </p>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Offres Sélectionnées({{$candidaturecount}})</h4>
      </div>
      <div class="card-body">
      <div class="table-responsive">
        <table class="table">
        <thead class=" text-primary">
          <th style="color:black">
                   Entreprise     
          </th>
          <th style="color:black">
                   Offre     
          </th>
          <th style="color:black">
                   Processus     
          </th>
          <th style="color:black">
                    Commentaire     
          </th>
        </thead>
        <tbody>
          @if($candidature->count() > 0)
          @foreach($candidature as $rs)
          <tr>
          <td>
                        {{ $rs->offre->entreprise->nomentreprise }}
                        </td>
                        <td>
                        {{ $rs->offre->nomposte }}
                        </td>
                        @if( $rs->reponese =="Recruté")
                        <td style="color: green;">
                        {{ $rs->reponese  }}
                        </td>
                        @elseif( $rs->reponese =="Refusé")
                        <td style="color: red;">
                        {{ $rs->reponese  }}
                        </td>
                        @elseif( $rs->reponese =="Décliné")
                        <td style="color: orange;">
                        {{ $rs->reponese  }}
                        </td>
                        @elseif( $rs->reponese =="En Cours")
                        <td style="color: black;">
                        {{ $rs->reponese  }}
                        </td>
                        @endif
                        <td>{{ $rs->commentaireese  }}</td>
          </tr>
          @endforeach
                      @else
                      <tr>
                    <td class="text-center" colspan="5">Le candidat n'a pas encore été sélectionné</td>
                </tr>
            @endif
        </tbody>
       
        </table>
        {{$candidature->links('vendor.pagination.custom')}}
       
        </div>
        
      </div>
     
    </div>
  </div>

</div>
@endsection