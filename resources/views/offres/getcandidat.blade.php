@extends('layouts.app')


@section('contents')



  <div class="card card-user p-3 col-md-12">
  <div class=" ">
    <div class="row ">
      <div class="col-md-4">
        <p><strong>L'offre a été créée le:</strong> {{$offre->created_at}}</p>
        <p><strong>Nom:</strong> {{$offre->nomposte}}</p>
        <p><strong>Description:</strong>
          {{Str::limit($offre->description, 100, '...')}}
          @if(strlen($offre->description) > 100)
          <a href="" data-toggle="modal" data-target="#exampleModal" >Voir plus </a>
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
<p>Vous avez fait appel aux cabinets</p>
@else
<p>Si vous faites appel aux cabinets vous ne pourrez pas pas sélectionner de candidats pour cette offre</p>
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
        <a class="nav-link " href="{{ route('offres.show', $offre->id) }} " style="color: #7ac9e8;"> <strong>Candidats Sélectionnés ({{$candidaturescount}}) </strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('indexproposition', $offre->id)}}" style="background:#035874;">Candidats Proposés ({{$propositionscount}})</a>
      </li>

    </ul>
    <br><br>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('indexproposition', $offre->id) }}" style="color: #035874;">Proposés ({{$propositionscount}})</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('proposerecrute', $offre->id) }}" style="color: black;">Recrutés ({{$propositionsrecrutecount}})</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('proposerefuse', $offre->id) }}" style="color: black;">Refusés ({{$propositionsrefusecount}})</a>
      </li>

    </ul><br><br>
  </div>
  <br>
 
      
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
            
              <th style="color:black">
                Cabinet 
              </th>
              <th style="color:black">
                Nom 
              </th>
              <th style="color:black">
                CV 
              </th>
              <th style="color:black">
                Rendez-vous
              </th>
              <th style="color:black">
              Adresse du RV 
              </th>
              <th style="color:black">
              Processus
              </th>
              <th style="color:black">
                Réponse
              </th>
            </thead>
            <tbody>

              @if($propositions->count() > 0)
              @foreach($propositions as $prop)
              <tr>
           
                <td>
                  {{ $prop->candidat->cabinet->nomcabinet }}
                </td>
                <td>
                  {{ $prop->candidat->user->name }} <br>

                </td>
                <td>
                  <a href="/uploads/{{ $prop->candidat->cv }}"><i class="fa fa-eye" style="color: #035874;"></i></a>

                </td>
                <td>
                <form class="dateForm" method="post" action="{{ route('updateDateprop', $prop->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="datetime-local" class="form-control datePicker" name="heureproposition" value="{{ $prop->heureproposition }}">
                    </div>
                  </form>
                </td>
                <td>
                <form class="lieuForm" method="post" action="{{ route('updateLieuprop', $prop->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text"  class="form-control datePicker" name="lieuproposition" value="{{ $prop->lieuproposition }}">
                    </div>
                  </form>
                </td>
                <td>
                <form class="statusForm" method="post" action="{{ route('updateRecruteprop', ['id' => $prop->id]) }}">
                          @csrf

                          @method('PUT')
                          @if($prop->reponseseproposition == "Recruté")
                          <p style="color:green;">Recruté</p>
                          @elseif($prop->reponseseproposition == "Refusé")
                          <p style="color:red;">Refusé</p>
                          @else
                          <div class="form-group ">
                  <select name="reponseseproposition" class="status-checkbox form-control" id="status-select" data-offre-id="{{ $prop->id }}">
                    <option id="flexSwitchCheck{{$prop->id}}" value="{{ $prop->reponseseproposition}}" {{ $prop->reponseseproposition == "En Cours"  ? 'selected' : '' }}>En cours</option>
                    <option id="flexSwitchCheck{{$prop->id}}" value="Recruté" {{ $prop->reponseseproposition == "Recruté"  ? 'selected' : '' }}>Recruté</option>
                    <option id="flexSwitchCheck{{$prop->id}}" value="Refusé" {{ $prop->reponseseproposition == "Refusé"  ? 'selected' : '' }}>Refusé</option>
                  </select>
                </div>
                         
                          @endif
                          </form>
                 
                </td>
                <td>
                @if($prop->reponseseproposition == "Recruté" )
                  <p>Recruté  </p>
                @elseif($prop->reponseseproposition =="Décliné" )
                <p> Décliné  </p>
                @elseif($prop->reponseseproposition =="Refusé" )
                <p> Refusé  </p>
                @elseif($prop->reponseseproposition == "En Cours")
                <p> En Cours</p>
               
                @endif           
               </td>
              </tr>

              @endforeach
              @else
              <tr>
                <td class="text-center" colspan="5">La liste des candidats proposés est vide</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
        {{$propositions->links('vendor.pagination.custom')}}
      </div>
    </div>
    </div>
    <div class="card card-user">
        
   
     
    </div>


   

  



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.status-button').change(function () {
            $('#statusForm').submit();
        });
    });
</script>
<script>
    
    $(document).ready(function () {
        $('.datePicker').change(function () {
            $(this).closest('form').submit();
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.status-checkbox').change(function () {
            $(this).closest('form').submit();
        });
    });
</script>
@endsection