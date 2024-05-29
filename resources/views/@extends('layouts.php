//$user = Auth::user();
        //$entreprise = Entreprise::where('user_id', $user->id)->first();
        //$offre = Offre::where('entreprise_id', $entreprise->id)->get();
        //return view('offres.index', compact('offre'));

@extends('layouts.app')


@section('contents')
<div class="row">
  <div class="col-md-4">
    <div class="card card-user">
    <div class="card-header">
        <h5 class="card-title"> Infos sur l'offre</h5>
      </div>
      <hr>
      <div class="card-body">
        <div class="">
        

          <p class="title">
            {{ $offre->nomposte }}
          </p>
          <p>
          {{Str::limit($offre->description, 100, '...')}}
          @if(strlen($offre->description) > 100)
            <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" style="color:#ef882b;"></i> </a>
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
        <button type="button" class="btn btn-secondary btn-round"   data-dismiss="modal">Fermer</button>
      </div>
      </div>
    </div>
  </div>
</div>
            @endif
          </p>
          <p>
            Nombre de poste: {{ $offre->nombredeposte }}
          </p>
          <p>
            Année d'expérience: {{ $offre->annexperience }}
          </p>
          <p>
            Salaire: {{ $offre->salaire }}
          </p>
          <p>
            Date début: {{ $offre->datedebut }}
          </p>
          <p>
            Lieu : {{ $offre->lieu }}
          </p>
          <p>
          Type de contrat : {{ $offre->typecontrat }}
          </p>
          <p>
          Compétences Requises : {{ $offre->competenceoffre }}
          </p>
          <p>
          Date clôture : {{ $offre->datecloture }}
          </p>
         

        </div>

      </div>
      <div class="card-footer">
        <hr>
        <div class="button-container">
        <form id="statusForm" method="post" action="{{ route('updateStatuscabinet', $offre->id) }}">
          @csrf
          @method('PUT')
          <button type="submit" class="btn  btn-round  status-button" style="background-color: #325fa6;">
            {{ __('Faire appel aux cabinets') }}
          </button>
          </form>
          @if ($offre->statuscabinet)
<p>Vous avez fait appel aux cabinets, vous ne pourrez plus sélectionner de candidat pour cette offre</p>
          @endif
       
          
        </div>
      </div>
    </div>
  
  </div>

  <div class="col-md-8">
  <div class="card card-user">
      <div class="card-header">
        <div class="row">
            <div class="col-md-3"><a href="{{ route('offres.show', $offre->id) }}" style=" background-color: #325fa6; color:white; padding-left: 15px; padding-right: 15px; padding-top:5px; padding-bottom: 5px;border-radius:20px; text-decoration: none;">Sélectionnés</a></div>
            <div class="col-md-3"><a href="{{ route('indexproposition', $offre->id)}}" style=" color:#ef882b; text-decoration: none;">Proposés</a></div>
        </div>
      </div>
      <br>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th style="color:black">
                #
              </th>
              <th style="color:black">
                Nom 
              </th>
              <th style="color:black">
                Rendez-vous
              </th>
              <th style="color:black">
                Lieu
              </th>
              <th style="color:black">
                Recruté
              </th>
              <th style="color:black">
                Réponse
              </th>
            </thead>
            <tbody>

              @if($candidatures->count() > 0)
              @foreach($candidatures as $candidature)
              <tr>
                <td>
                  {{ $loop->iteration }}
                </td>
                <td>
                  {{ $candidature->candidat->user->name }}  <br>
                  <a href="{{ route('cvdetailleese', $candidature->candidat->id)}}" ><i class="fa fa-eye" style="color: #ef882b;"></i></a>
                  <a href="/uploads/{{ $candidature->candidat->cv }}"><i class="fa fa-eye" style="color: #325fa6;"></i></a>


                </td>
                <td>
                <form class="dateForm" method="post" action="{{ route('updateDate', $candidature->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="datetime-local"  class="form-control datePicker" name="heurecandidature" value="{{ $candidature->heurecandidature }}">
                    </div>
                  </form>
                </td>
                <td>
                <form class="lieuForm" method="post" action="{{ route('updateLieu', $candidature->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text"  class="form-control datePicker" name="lieu" value="{{ $candidature->lieu }}">
                    </div>
                  </form>
                </td>
                <td>
                <form class="statusForm" method="post" action="{{ route('updateRecrute', ['id' => $candidature->id]) }}">
                          @csrf

                          @method('PUT')

                          <div class="form-check">
                          <label class="form-check-label">
                          <input class="form-check-input status-checkbox" type="checkbox" id="flexSwitchCheck{{$candidature->id}}"   {{ $candidature->recrute == 1  ? 'checked' : '' }} >
                          <span class="form-check-sign"></span>
                          </label>
                          </div>
                          </form>
                 
                </td>
                <td>
                @if($candidature->commentaireviprv)
                <p> {{$candidature->commentaireviprv}} </p>
              
                @elseif($candidature->recrute && !$candidature->decline)
                  <p>Recruté  </p>
                @elseif(!$candidature->recrute  && $candidature->decline == 1)
                <p> Décliné  </p>
                @elseif(!$candidature->recrute  && !$candidature->decline)
                <p> Encours </p>
                @elseif($candidature->confirmerv)
                <p> Le rendez-vous a été confirmé </p>
                
                @endif

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
      </div>
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
        
        
        <!-- Ajouter des champs pour les autres critères de recherche -->
        <div class="col-md-3 mt-3">
            <button type="submit" class="btn btn-round " style="background-color: #325fa6;">Rechercher</button>
        </div>
    </div>
</form>
     
        <h5 class="card-title"> Liste des candidats</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th style="color:black">
                #
              </th>
              <th style="color:black">
                Nom
              </th>
              <th style="color:black">
                Compétences
              </th>
              <th style="color:black">
                Formation
              </th>
              <th style="color:black">
                Fonction
              </th>
              <th style="color:black">
                Langues
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
                  {{ $loop->iteration }}
                </td>
                <td>
                  {{ $rs->user->name }}
                </td>
                <td>
                @foreach ($rs->competences as $competence)
                <li>{{ $competence->nomcompetence }}</li>
            @endforeach
                </td>
                <td>
                @foreach ($rs->formations as $formation)
                <li>{{ $formation->niveauformation }}</li>
            @endforeach
                </td>
                <td>
               {{ $rs->fonction }}</li>
         
                </td>
                <td>
                @foreach ($rs->langues as $langue)
                <li>{{ $langue->nomlangue }}</li>
            @endforeach
                </td>
                <td>
                  {{ $rs->disponibilite }}
                </td>
               

                <td>
                <a href="{{ route('cvdetailleese', $rs->id)}}" ><i class="fa fa-eye" style="color: #ef882b;"></i></a>

                  <a href="/uploads/{{ $rs->cv }}"><i class="fa fa-eye" style="color: #325fa6;"></i></a>

                </td>

                <td class="text-right">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <form action="{{ route('offres.getcandidatstore') }}" method="POST">
                      @csrf
                      <input type="hidden" name="offre_id" value="{{ $offre->id }}">
                      <input type="hidden" name="candidat_id" value="{{ $rs->id }}">
                      <button type="submit" style="margin:5px; background:white; border:none; color: #ef882b" >Selectionner</button>
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
      </div>
    </div>


   

  </div>


</div>
@endif
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