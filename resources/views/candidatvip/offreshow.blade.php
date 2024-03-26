@extends('layouts.appcandidatvip')


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
            {{ $candidature->offre->nomposte }}
          </p>
          <p>
         
            {{Str::limit($candidature->offre->description, 100, '...')}}
          @if(strlen($candidature->offre->description) > 100)
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
      {{ $candidature->offre->description }}
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
            Nombre de poste: {{ $candidature->offre->nombredeposte }}
          </p>
          <p>
            Année d'expérience: {{ $candidature->offre->annexperience }}
          </p>
          <p>
            Salaire: {{ $candidature->offre->salaire }}
          </p>
          <p>
            Date début: {{ $candidature->offre->datedebut }}
          </p>
          <p>
            Lieu : {{ $candidature->offre->lieu }}
          </p>
          <p>
          Type de contrat : {{ $candidature->offre->typecontrat }}
          </p>
          <p>
          Compétences Requises : {{ $candidature->offre->competenceoffre }}
          </p>
          <p>
          Date clôture : {{ $candidature->offre->datecloture }}
          </p>
         

        </div>

      </div>
      <div class="card-footer">
     
      </div>
    </div>
    
  </div>
  <div class="col-md-8">
  <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title">Informations sur la sélection </h5>
      </div>
      
      <div class="card-body">
        <div class="table-responsive">
        
          <form method="POST" action="">
          @csrf
                
                    <label>Rendez-Vous</label>
                    @if( $candidature->heurecandidature)
                @php
                $date = date('Y-m-d', strtotime($candidature->heurecandidature));
                $heure = date('H:i', strtotime($candidature->heurecandidature));
                @endphp
             
                    <div class="form-group">
                        <input   disabled class="form-control"  value="{{ $date }} à  {{ $heure }}" name="heurecandidature">
                    </div>
                 
                    <label>Lieu</label>
                    <div class="form-group">
                        <input type="text" disabled class="form-control"  value="{{ $candidature->lieu }}">
                    </div>
                    <label>Numéro à contacter</label>
                    <div class="form-group">
                        <input type="text" disabled class="form-control"  value="{{ $candidature->offre->entreprise->user->telephone }}">
                    </div>
                    @endif
                    <label>Recruté</label>
                        @if ($candidature->recrute == 1)
                        <div class="form-group">
                            <input type="text" disabled class="form-control"  value="Vous êtes recruté Félicitations">
                        </div>
                        @else 
                        <div class="form-group">
                            <input type="text" disabled class="form-control"  value="Pas Encore recruté">
                        </div>
                        @endif
                        </form>
                    
                    <div class="card-footer "> 
                    <form class="statusForm" method="post" action="{{ route('updateDecline', ['id' => $candidature->id]) }}">
                          @csrf

                          @method('PUT')
                <button type="submit" class="btn  btn-round" style="background-color: #325fa6;">Décliner L'offre</button>
                </form>
            </div>
            @if ($candidature->decline)
      <hr>
<p>Vous avez décliné l'offre</p>
          @endif
        </div>
      </div>
    </div>
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
@endsection