@extends('layouts.appcabinet')


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
      
      </div>
    </div>
  
  </div>
  <div class="col-md-8">
  <div class="card card-user">
      <div class="card-header row p-4">
      <div class="col-md-9">  <h5 class="card-title">Liste des candidats Proposés ({{$propositionscount}})</h5>   </div>
        <div class="col-md-3">
        <button class="btn btn-round" style="background-color: #325fa6;" data-toggle="modal" data-target="#exampleModalr">Ajouter</button>

        </div>

      </div>
       <!-- Modal -->
<div class="modal fade" id="exampleModalr" tabindex="-1" role="dialog" aria-labelledby="exampleModalrLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalrLabel">Ajouter un Candidat à la proposition</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('offres.propositionstoreshow') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="offre_id" value="{{ $offre->id }}">
 <label>Nom </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required placeholder="Nom">
                    </div>
                   
                    <label>Genre </label>
                    <div class="form-group">
                    <select name="genre" id="genre" class="form-control" required>
                            <option value="Homme">Homme</option>
                            <option value="Femme"> Femme</option>
                    </select>
                    </div>
                    <label>Date de naissance </label>
                    <div class="form-group">
                        <input type="date" class="form-control" name="birthday" placeholder="12-12-1998" required>
                    </div>
                    <label>Mail </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="awandiayesene7@gmail.com" required>
                    </div>
                  
                    <label>Téléphone </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="telephone" placeholder="+221771301409" required>
                    </div>
                   
                    <label>Fonction </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="fonction" placeholder="fonction" required>
                    </div>
                    
                    <label>Disponibilité </label>
                    <div class="form-group">
                    <select name="disponibilite" id="disponibilite" class="form-control" required>
                            <option value="Immédaite">Immédaite</option>
                            <option value="Dans un mois">Dans un mois</option>
                            <option value="Négociable">Négociable</option>
                            <option value="Dans deux mois">Dans deux mois</option>
                        </select>     
                   </div>
                   <label>Nationnalité </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nationnalite" placeholder="nationnalite" required>
                    </div>
                   <label>CV </label>
                    <input id="cv" type="file" required class="form-control " name="cv"   autocomplete="cv" />
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-round"   data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-round" style="background-color: #325fa6;">Ajouter </button>
      </div>
      </form>
    </div>
  </div>
</div>
      <div class="card-body">
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
                Rendez-vous
              </th>
              <th style="color:black">
               Lieu
              </th>
              <th style="color:black">
                Processus
              </th>
             
            </thead>
            <tbody>

              @if($propositions->count() > 0)
              @foreach($propositions as $proposition)
              <tr>
              
                <td>
                  {{ $proposition->candidat->user->name }}

                </td>
                <td>
                  <a href="/uploads/{{ $proposition->candidat->cv }}" style="color: #325fa6;"><i class="fa fa-eye"></i></a>

                </td>
                <td>
                @if( $proposition->heureproposition)
                @php
                $date = date('Y-m-d', strtotime($proposition->heureproposition));
                $heure = date('H:i', strtotime($proposition->heureproposition));
                @endphp
                {{ $date }} à  {{ $heure }}
               
                @else
               --
                @endif
                </td>
      
                <td>
                @if( $proposition->lieuproposition)
                
                {{ $proposition->lieuproposition }}
                @else
                --
                @endif
                </td>
                @if($proposition->reponseseproposition == "Recruté" )
                <td style="color:green;">
               
                     Recruté 
                     </td>
                     
                    
                     @elseif($proposition->reponseseproposition == "Refusé")
                     <td style="color:red">Refusé</td>
                  
                  @elseif($proposition->reponseseproposition == "En Cours")
                  <td style="color:orange">En Cours</td>
                  
                          @endif
              </tr>

              @endforeach
              @else
              <tr>
                <td class="text-center" colspan="5">Aucun candidat n'a été proposé</td>
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
        
    <div class="card-header">

    <form action="{{ route('searchWithCabinet', $offre->id) }}" method="GET">
    <div class="row">
        <div class="col-md-3">
            <label for="disponibilite">Disponibilité :</label>
            <input type="text" name="disponibilite" id="disponibilite" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="genre">Genre :</label>
            <input type="text" name="genre" id="genre" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="fonction">Fonction :</label>
            <input type="text" name="fonction" id="fonction" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="nationnalite">Nationnalité :</label>
            <input type="text" name="nationnalite" id="nationnalite" class="form-control">
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
                Nom
              </th>
              <th style="color:black">
                Fonction
              </th>
              <th style="color:black">
              Genre
              </th>
              <th style="color:black">
              Nationnalite
              </th>
              <th style="color:black">
                Age
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
              
              {{ $rs->fonction }}

                </td>
                <td>
            
               {{ $rs->genre }}
       
                </td>
                <td>
          
               {{ $rs->nationnalite }}
           
                </td>
                <td>
   @if($rs->birthday)
                @php
                $birthday = $rs->birthday;
                $age = $birthday ? \Carbon\Carbon::parse($birthday)->age : null;
                @endphp
                {{  $age }}  ans
        @else
        --
        @endif
                </td>
                <td>
                  {{ $rs->disponibilite }}
                </td>
               

                <td>
                  <a href="/uploads/{{ $rs->cv }}" style="color: #325fa6;">Voir</a>
                </td>

                <td class="text-right">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <form action="{{ route('offres.propositionstore') }}" method="POST">
                      @csrf
                      <input type="hidden" name="offre_id" value="{{ $offre->id }}">
                      <input type="hidden" name="candidat_id" value="{{ $rs->id }}">
                      <button type="submit" style="margin:5px; background: white;border:none; color:#ef882b;" > Ajouter</i></button>
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