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
          <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" style="color:#7ac9e8;"></i> </a>
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
         
          @if($candidature->offre->fichierjoint)
        <p>Fichier Joint: 
        <a href="/uploads/{{ $candidature->offre->fichierjoint }}" style="color: #035874">Voir</i></a>
</p>
@endif
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
                        <input type="text" disabled class="form-control"  value="{{ $candidature->interlocuteurese->user->name }}">
                    </div>
                    @endif
                    <label>Processus</label>
                        @if ($candidature->reponese == "Recruté")
                        <div class="form-group">
                            <input type="text" disabled class="form-control"  value="Vous êtes recruté Félicitations!!!">
                        </div>
                        @elseif($candidature->reponese == "En Cours" ) 
                        <div class="form-group">
                            <input type="text" disabled class="form-control"  value="Processus En cours">
                        </div>
                        @elseif($candidature->reponese == "Refusé" ) 
                        <div class="form-group">
                            <input type="text" disabled class="form-control"  value="Vous n'avez pas été retenu. Bon Courage!!!">
                        </div>
                        @elseif($candidature->reponese == "Décliné" ) 
                        <div class="form-group">
                            <input type="text" disabled class="form-control"  value="Vous avez Décliné l'offre.">
                        </div>
                        @endif
                        </form>
                    
                    <div class="card-footer row"> 
                   
                   <div class="col-md-4">
                <button type="button" class="btn btn-round " data-toggle="modal" data-target="#exampleModalv" style="background-color: #7ac9e8;" >Décliner Le RV</button>
                <div class="modal fade" id="exampleModalv" tabindex="-1" role="dialog" aria-labelledby="exampleModalvLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalvLabel">Pourquoi Vous décliner le Rendez-vous?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
        <form method="post" action="{{route('commentaireVipRv', ['id' => $candidature->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
<textarea class="form-control" name="commentaireviprv" id="" placeholder="la date ne m'arrange pas..." required>{{ $candidature->commentaireviprv}}</textarea>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-round" style="background: #035874;">Commenter</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
</div>


                   <div class="col-md-4">
                <form class="statusForm" method="post" action="{{ route('confirmeVipRv', ['id' => $candidature->id]) }}">
                          @csrf
                          @method('PUT')
                <button type="submit" id="submitButton" class="btn btn-round" style="background-color: #035874;">Confirmer le Rv </button>
                </form>
                </div>
             
              
                   <div class="col-md-4">
                <form class="statusForm" method="post" action="{{ route('updateDecline', ['id' => $candidature->id]) }}">
                          @csrf

                          @method('PUT')
                <button type="submit" id="submitButton" class="btn btn-round" style="background-color: #ff3333;">Décliner L'offre</button>
                </form>
                </div>
           
            </div>
            @if ($candidature->confirmerv)
              <hr>
        <p>Le Rendez-vous a été confirmé</p>
        @endif     
                  @if ($candidature->commentaireviprv)
              <hr>
        <p>Rendez-vous Décliné: {{ $candidature->commentaireviprv}}</p>
                  @endif
                    @if ($candidature->reponese=="Décliné")
              <hr>
        <p>Vous avez décliné l'offre</p>
          @endif
        </div>
      </div>
    </div>
    </div>
   


   

  </div>


</div>

<style>
/* CSS pour le spinner de chargement */
.btn-loading {
    position: relative;
}
.btn-loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 1rem;
    height: 1rem;
    margin-top: -0.5rem;
    margin-left: -0.5rem;
    border: 2px solid #fff;
    border-top-color: transparent;
    border-radius: 50%;
    animation: spin 0.6s linear infinite;
}
.was-validated input:invalid {
    border-color: red;
}
.was-validated input:valid {
    border-color: green;
}
@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
document.getElementById('myForm').addEventListener('submit', function(event) {
    var form = event.target;
    var submitButton = document.getElementById('submitButton');
    
    if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        form.classList.add('was-validated');
    } else {
        // Désactiver le bouton et afficher un indicateur de chargement
        submitButton.disabled = true;
        submitButton.classList.add('btn-loading');

        // Permettre au formulaire de se soumettre normalement
    }
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  $('#exampleModal').on('hidden.bs.modal', function (e) {
        if ($('#exampleModal .is-invalid').length > 0) {
            e.preventDefault();
            e.stopPropagation();
        }
    });
    $('.status-checkbox').change(function () {
        $(this).closest('form').submit();
    });
});
</script>
<script>
    $(document).ready(function () {
        $('.status-button').change(function () {
            $('#statusForm').submit();
        });
    });
</script>
@endsection