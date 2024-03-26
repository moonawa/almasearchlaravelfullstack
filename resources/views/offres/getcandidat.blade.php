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
            {{ $offre->description }}
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
<p>Vous avez fait appel aux cabinets</p>
          @endif
       
          
        </div>
      </div>
    </div>
    <!-- <div class="card">
      <div class="card-header">
        <h4 class="card-title">Fichiers</h4>
      </div>

      <div class="card-body">

        <form action="{{ route('cabinets.ninea') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @endif
          <label for="nineacabinet"> NINEA</label>
          <input id="nineacabinet" type="file" class="form-control @error('nineacabinet') is-invalid @enderror" name="nineacabinet" autocomplete="nineacabinet">

          <label for="rccabinet">Régistre de Commerce </label>
          <input id="rccabinet" type="file" class="form-control @error('rccabinet') is-invalid @enderror" name="rccabinet" autocomplete="rccabinet">

          <button type="submit" class="btn btn-primary btn-round">
            {{ __('Télécharger') }}
          </button>
        </form>
      </div>
    </div>
  </div> -->
  </div>
  <div class="col-md-8">
  <div class="card card-user">
      <div class="card-header">
      <div class="row">
            <div class="col-md-3"><a href="{{ route('offres.show', $offre->id) }}" style=" background-color: #325fa6; color:white; padding-left: 15px; padding-right: 15px; padding-top:5px; padding-bottom: 5px;border-radius:20px; text-decoration: none;">Sélectionnés</a></div>
            <div class="col-md-3"><a href="{{ route('indexproposition', $offre->id)}}" style=" background-color: #ef882b; color:white; padding-left: 15px; padding-right: 15px; padding-top:5px; padding-bottom: 5px;border-radius:20px; text-decoration: none;">Proposés</a></div>
        </div>
      <br>      </div>
      
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

              @if($propositions->count() > 0)
              @foreach($propositions as $prop)
              <tr>
                <td>
                  {{ $loop->iteration }}
                </td>
                <td>
                  {{ $prop->candidat->user->name }} <br>
                  <a href="{{ route('cvdetailleese', $prop->candidat->id)}}" ><i class="fa fa-eye" style="color: #ef882b;"></i></a>
                  <a href="/uploads/{{ $prop->candidat->cv }}"><i class="fa fa-eye" style="color: #325fa6;"></i></a>

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
                     
                          <div class="form-check">
                          <label class="form-check-label">
                          <input class="form-check-input status-checkbox" type="checkbox" id="flexSwitchCheck{{$prop->id}}"   {{ $prop->recruteproposition == 1  ? 'checked' : '' }} >
                          <span class="form-check-sign"></span>
                          </label>
                          </div>
                          </form>
                 
                </td>
                <td>
                @if($prop->recruteproposition && !$prop->declineproposition)
                  <p>Recruté  </p>
                @elseif(!$prop->recruteproposition  && $prop->declineproposition == 1)
                <p> Décliné  </p>
                @elseif(!$prop->recruteproposition  && !$prop->declineproposition)
                <p> Encours</p>
               
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
      </div>
    </div>
    </div>
    <div class="card card-user">
        
   
     
    </div>


   

  </div>


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