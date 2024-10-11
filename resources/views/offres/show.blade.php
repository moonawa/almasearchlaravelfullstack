@extends('layouts.app')


@section('contents')


<div class="card card-user p-3 col-md-12">
  <div class=" ">
    <div class="row ">
      <div class="col-md-4">
        <p><strong>L'offre a été créée le:</strong> {{$offre->created_at}} par <span style="font-size: large;"> {{$offre->interlocuteurese->user->name}} </span></p>
        <p><strong>Nom:</strong> {{$offre->nomposte}}</p>
        <p><strong>Description:</strong>
          {{Str::limit($offre->description, 100, '...')}}
          @if(strlen($offre->description) > 100)
          <a href="" data-toggle="modal" data-target="#exampleModal">Voir plus </a>
          <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {{ $offre->description }}
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        </p>
        @if($offre->fichierjoint)
        <p><strong>Fichier Joint: </strong>                  <a href="/uploads/{{ $offre->fichierjoint }}" style="color: #035874">Voir</i></a>
</p>
@endif
      </div>
      <div class="col-md-4">
        <p> <strong>Nombre de poste: </strong> {{$offre->nombredeposte}} </p>
        <p> <strong>Salaire: </strong>{{$offre->salaire}} </p>
        <p> <strong>Lieu: </strong>{{$offre->lieu}} </p>
        <p> <strong>Date de prise de Service: </strong>{{$offre->datedebut}} </p>
        <p> <strong>Date de Cloture: </strong>{{$offre->datecloture}} </p>

      </div>
      <div class="col-md-4">
        <p> <strong>Compétences Requises: </strong>{{$offre->competenceoffre}} </p>
        <p><strong>Année d'expérience: </strong>{{$offre->annexperience}} </p>
        <p><strong>Type de Contrat: </strong>{{$offre->typecontrat}} </p>

        <hr>
        <div class="button-container">
          <form id="statusForm" method="post" action="{{ route('updateStatuscabinet', $offre->id) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn  btn-round  status-button" style="background-color: #035874;">
              {{ __('Faire appel aux cabinets') }}
            </button>
          </form>
          @if ($offre->statuscabinet)
          <p>Vous avez fait appel aux cabinets, </p>
          @else
          <p>Si vous faites appel aux cabinets vous ne pourrez plus sélectionner de candidats pour cette offre .</p>
          @endif


        </div>
      </div>
    </div>
  </div>
</div>
<div class="card card-user col-md-12">
  <div class="card-header">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('offres.show', $offre->id) }} " style="background: #035874;">Candidats Sélectionnés ({{$candidaturescount}})</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('indexproposition', $offre->id)}}" style="color:#7ac9e8;"> <strong> Candidats Proposés ({{$propositionscount}}) </strong></a>
      </li>

    </ul>
    <br><br>
    @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
    <ul class="nav nav-tabs">
   
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('offres.show', $offre->id) }}" style="color: #035874;">Sélectionnés ({{$candidaturescount}})</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('candidatrecrute', $offre->id) }}" style="color: black;">Recrutés ({{$candidatrecrutecount}})</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('candidatrefuse', $offre->id) }}" style="color: black;">Refusés ({{$candidatrefusecount}})</a>
      </li>

    </ul>
  </div>
  <br>

  <div class="card-body">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="table-responsive">
      <table class="table">
        <thead class=" text-primary">
          
          <th style="color:black">
            Nom
          </th>
          <th style="color:black">
            CV
          </th>
         
          <th style="color:black">
            Date et Adresse du RV
          </th>
        
          <th style="color:black">
            Processus
          </th>
          <th style="color:black">
            Réponse
          </th>
          <th style="color:black">
            Sélection
          </th>
        </thead>
        <tbody>

          @if($candidatures->count() > 0)
          @foreach($candidatures as $candidature)
          <tr>
           
            <td>
              {{ $candidature->candidat->user->name }}

            </td>
            <td>
              <a href="{{ route('cvdetailleese', $candidature->candidat->id)}}"><i class="fa fa-eye" style="color: #7ac9e8;"></i></a>

              <a href="/uploads/{{ $candidature->candidat->cv }}"><i class="fa fa-eye" style="color: #035874;"></i></a>
            </td>
        
            <td>
            @if($candidature->heurecandidature && $candidature->lieu)
            {{ $candidature->heurecandidature }} à {{ $candidature->lieu }}
           <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModall{{$candidature->id}}">
 Modifier
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModall{{$candidature->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModall{{$candidature->id}}Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModall{{$candidature->id}}Label">Modifier le rendez-vous </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="lieuForm" method="post" action="{{ route('updateRvLieu', $candidature->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="">Date et Heure</label>
                <input type="datetime-local" class="form-control  " required name="heurecandidature" value="{{ $candidature->heurecandidature }}">
                </div>
                <div class="form-group">
                  <label for="">Lieu ou Lien(meet, teams, zoom ...) </label>
                  <input type="text" class="form-control  " required name="lieu" value="{{ $candidature->lieu }}" >
                  </div>

             
  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary"> Enregistrer</button>
      </div>
      </form>
      </div>
      
    </div>
  </div>
</div>
     
            @else
            <!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">
  Ajouter une date et un lieu
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">  Ajouter une date et un lieu </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="lieuForm" method="post" action="{{ route('updateRvLieu', $candidature->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="">Date et Heure</label>
                <input type="datetime-local" class="form-control  " required name="heurecandidature" value="{{ $candidature->heurecandidature }}">
                </div>
                <div class="form-group">
                  <label for="">Lieu ou Lien(meet, teams, zoom ...)</label>
                  <input type="text" class="form-control  " required name="lieu" value="{{ $candidature->lieu }}" >
                  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary"> Enregistrer</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endif
</td>
            <td>
              <form class="statusForm" method="post" action="{{ route('updateRecrute', ['id' => $candidature->id]) }}">
                @csrf
                @method('PUT')
                @if($candidature->reponese == "Recruté")
                <p style="color:green;">Recruté</p>
                @elseif($candidature->reponese == "Refusé")
                <p style="color:red;">Refusé</p>
                @elseif($candidature->reponese == "Décliné")
                <p style="color:Orange;">Décliné</p>
                @else

                <div class="form-group ">
                  <select name="reponese" class="status-checkbox form-control" id="status-select" data-offre-id="{{ $candidature->id }}">
                    <option id="flexSwitchCheck{{$candidature->id}}" value="En Cours" {{ $candidature->reponese == "En Cours"  ? 'selected' : '' }} >En Cours</option>
                    <option id="flexSwitchCheck{{$candidature->id}}" value="Recruté" {{ $candidature->reponese == "Recruté"  ? 'selected' : '' }}>Recruté</option>
                    <option id="flexSwitchCheck{{$candidature->id}}" value="Refusé" {{ $candidature->reponese == "Refusé"  ? 'selected' : '' }}>Refusé</option>
                  </select>
                </div>
                @endif
              </form>

            </td>
            <td>
              @if($candidature->commentaireviprv )
              Commentaire du candidat: {{$candidature->commentaireviprv}}
              @elseif($candidature->confirmerv == 1 )
              Le rendez-vous a été confirmé par le candidat
              @elseif($candidature->reponese=="Recruté" )
              Le candidat a été recruté pour ce poste.
              @elseif($candidature->reponese=="Refusé" )
              Le candidat n'a pas été retenu pour ce poste.
              @elseif($candidature->reponese == "Décliné")
              Le candidat a décliné l'offre.
              @elseif($candidature->reponese=="En Cours" )
              En cours </p>


              @endif

            </td>
            <td>
            {{ $candidature->interlocuteurese->user->name }}
            </td>
          </tr>

          @endforeach
          @else
          <tr>
            <td class="text-center" colspan="5">La liste des candidats sélectionnés est vide</td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>
    {{$candidatures->links('vendor.pagination.custom')}}
  </div>
</div>

@if (!$offre->statuscabinet)
<div class="card card-user">

  <div class="card-header">

    <form action="{{ route('search', $offre->id) }}" method="GET">
      <div class="row">
        <div class="col-md-3">
          <label for="fonction">Fonction :</label>
          <input type="text" name="fonction" id="fonction" class="form-control">
        </div>
        <div class="col-md-3">
          <label for="disponibilite">Disponibilité :</label>
          <input type="text" name="disponibilite" id="disponibilite" class="form-control">
        </div>
        <div class="col-md-3">
          <label for="genre">Genre :</label>
          <input type="text" name="genre" id="genre" class="form-control">
        </div>
        <div class="col-md-3">
          <label for="competences">Compétences :</label>
          <input type="text" name="competences" id="competences" class="form-control">
        </div>
        <div class="col-md-3">
          <label for="langues">Langue :</label>
          <input type="text" name="langues" id="langues" class="form-control">
        </div>

        <div class="col-md-3">
          <label for="formations">Formation :</label>
          <input type="text" name="formations" id="formations" class="form-control">
        </div>
        <div class="col-md-3">
          <label for="mot_cles">Mot Clé :</label>
          <input type="text" name="mot_cles" id="mot_cles" class="form-control">
        </div>

        <!-- Ajouter des champs pour les autres critères de recherche -->
        <div class="col-md-3 mt-3">
          <button type="submit" class="btn btn-round " style="background-color: #035874;">Rechercher</button>
        </div>
      </div>
    </form>

    <h5 class="card-title"> Liste des candidats</h5>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead class=" text-primary">
        
          <th style="color:black">
            Nom
          </th>

        
          <th style="color:black">
            Niveau Formation
          </th>
          <th style="color:black">
            Fonction
          </th>
          <th style="color:black">
            Expérience
          </th>
          <th style="color:black">
            Disponibilité
          </th>
          <th style="color:black">
            CV
          </th>
          <th class="text-right" style="color:black">
            Action
          </th>
        </thead>
        <tbody>

          @if($candidats->count() > 0)
          @foreach($candidats as $rs)
          <tr>
          
            <td>
              {{ $rs->user->name }}
            </td>
           
            <td>
            @if($rs->latestFormation)
            {{ $rs->latestFormation->nomformation }} ({{ $rs->latestFormation->anneeacademique }})
              @else
                            <p>Aucune formation</p>
                        @endif
            </td>
            <td>
              {{ $rs->fonction }}</li>

            </td>
           <td>{{ $rs->trancheanneeexpeience }}</td>
            <td>
              {{ $rs->disponibilite }}
            </td>


            <td>
              <a href="{{ route('cvdetailleese', $rs->id)}}"><i class="fa fa-eye" style="color: #7ac9e8;" ></i></a>
              <a href="/uploads/{{ $rs->cv }}"><i class="fa fa-eye" style="color: #035874;"></i></a>

            </td>

            <td class="text-right">
              <div class="btn-group" role="group" aria-label="Basic example">
                <form action="{{ route('offres.getcandidatstore') }}" method="POST" id="myForm">
                  @csrf
                  <input type="hidden" name="offre_id" value="{{ $offre->id }}">
                  <input type="hidden" name="candidat_id" value="{{ $rs->id }}">
                  <button id="submitButton" type="submit" class="btn btn-round" style=" background:white; border:none; color: #7ac9e8">Selectionner</button>
                </form>


              </div>
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td class="text-center" colspan="5">La liste des candidats est vide</td>
          </tr>
          @endif

        </tbody>
      </table>
    </div>
    {{$candidats->links('vendor.pagination.custom')}}

  </div>
</div>




</div>

</div>
@endif
<style>
    .spinner-border {
        display: inline-block;
        width: 2rem;
        height: 2rem;
        vertical-align: text-bottom;
        border: 0.25em solid currentColor;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner-border .75s linear infinite;
        animation: spinner-border .75s linear infinite;
    }

    .spinner-border {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.datePicker').change(function() {
            // Show the spinner
            $('#loadingSpinner').show();

            // Submit the form
            $(this).closest('form').submit();
        });

        $('.dateForm').on('submit', function() {
            // Show the spinner
            $('#loadingSpinner').show();
        });
    });
</script>

<script>
  $(document).ready(function() {
    $('.status-button').change(function() {
      $('#statusForm').submit();
    });
  });
</script>

<script>
  $(document).ready(function() {
    $('.status-checkbox').change(function() {
      $(this).closest('form').submit();
    });
  });
</script>


@endsection