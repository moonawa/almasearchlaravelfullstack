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
                    @if(!$candidature->confirmerv && $candidature->reponese == "En Cours") 
                   <div class="col-md-4">
                <button type="button" class="btn btn-round " data-toggle="modal" data-target="#exampleModalv" style="background-color: #ef882b;" >Décliner Le RV</button>
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
<textarea class="form-control" name="commentaireviprv" id="" placeholder="la date ne m'arrange pas..." required>{{ $candidature->commentaireviprv}}</textarea>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-round" style="background: #325fa6;">Commenter</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
@endif
@if($candidature->reponese == "En Cours") 
                   <div class="col-md-4">
                <form class="statusForm" method="post" action="{{ route('confirmeVipRv', ['id' => $candidature->id]) }}">
                          @csrf
                          @method('PUT')
                <button type="submit" class="btn  btn-round" style="background-color: #325fa6;">Confirmer le Rv </button>
                </form>
                </div>
                @endif
                @if(!$candidature->confirmerv) 
                   <div class="col-md-4">
                <form class="statusForm" method="post" action="{{ route('updateDecline', ['id' => $candidature->id]) }}">
                          @csrf

                          @method('PUT')
                <button type="submit" class="btn  btn-round" style="background-color: #ff3333;">Décliner L'offre</button>
                </form>
                </div>
                @endif
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.status-button').change(function () {
            $('#statusForm').submit();
        });
    });
</script>
@endsection