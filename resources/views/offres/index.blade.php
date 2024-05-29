@extends('layouts.app')
  
  
@section('contents')
<div class="row ">
  <div class=" col-md-12 ">
  <div class="card ">
    <div class="row p-4">
    <div class="col-md-10">
    <ul class="nav nav-tabs ">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('offres') }}" style="color:#325fa6;">Toutes les Offres ({{$offrecount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('offreencoursentreprise') }}" style="color:black;">Offres En Cours ({{$encourscount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('offreexpireentreprise') }}" style="color:black;">Offres Expirées ({{$expirescount}})</a>
  </li>
</ul>
    </div>
  <div class="col-md-2">
    <button class="btn btn-round" style="background-color: #325fa6;" data-toggle="modal" data-target="#exampleModal">Ajouter</button>
  </div>
  </div>
  
            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une offre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <form method="POST" action="{{ route('offres.store') }}" id="myForm">
                @csrf
                <div class="row">
                <div class="col-md-6 pr-1">
                <label>Nom poste</label>
                    <div class="form-group">
                        <input type="text" class="form-control" required name="nomposte" placeholder="Developpeur web H/F">
                    </div>
                    </div>
                    <div class="col-md-6 px-1">
                    <label>Nombre de poste </label>
                    <div class="form-group">
                        <input type="number" class="form-control" required name="nombredeposte" placeholder="5">
                    </div>
                    </div>
                    </div>
                    <label>Description</label>
                    <div class="form-group">
                        <textarea name="description" id="description" required class="form-control" cols="30" rows="10"></textarea>
                    </div>
                  
                   
                    <label>Compétences Requises   </label>
                    <div class="form-group">
                        <input type="text" class="form-control" required name="competenceoffre" >
                    </div>

                    <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Année d'expérience </label>
                    <div class="form-group">
                        <select name="annexperience" id="annexperience" class="form-control" required>
                            <option value="0 à 3 ans">	0 à 3 ans</option>
                            <option value="3 à 5 ans">3 à 5 ans</option>
                            <option value="5 à 10 ans">5 à 10 ans</option>
                            <option value="+ de 10 ans">+ de 10 ans</option>
                            <option value="+ de 20 ans">+ de 20 ans</option>
                           
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6 pr-1">
                    <label>Salaire  </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="salaire" required placeholder="500000">
                    </div>
                    </div>
                    </div>
                   

                    <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Date de prise de fonction  </label>
                    <div class="form-group">
                        <input type="date" class="form-control" name="datedebut" >
                        @error('datedebut')
              <div class="text-danger">{{ $message }}</div>
            @enderror
                      </div>
                   
                    </div>
                    <div class="col-md-6 pr-1">
                    <label>Date Clôture  </label>
                    <div class="form-group">
                        <input type="date" class="form-control"  name="datecloture" >
                        @error('datecloture')
              <div class="text-danger">{{ $message }}</div>
            @enderror
                      </div>
                    </div>
                    </div>
                    <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Type de contrat </label>
                    <div class="form-group">
                        <select name="typecontrat" id="typecontrat" class="form-control" required>
                        <option value="Stage">Stage</option>
                            <option value="CDD">CDD</option>
                            <option value="CDI">CDI</option>
                            <option value="Prestation">Prestation</option>
                           
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6 pr-1">
                    <label>Lieu   </label>
                    <div class="form-group">
                        <input type="text" class="form-control" required name="lieu" placeholder="Dakar, remote" >
                    </div>
                    </div>
                    </div>
             
                     <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Avantage </label>
                    <div class="form-group">
                      <select name="typeoffre" id="typeoffre" required class="form-control">
                        <option value="13ième mois">13ième mois</option>
                        <option value="Couverture médicale">Couverture médicale</option>
                        <option value="Primes annuelles">Primes annuelles</option>
                        <option value="Véhicule + carburant">Véhicule + carburant</option>
                        <option value="Autres ">Autres </option>
                      </select>
                    </div>
                    </div>
                    <div class="col-md-6 pr-1">
                   
                    </div>
                    </div>
                    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-round"   data-dismiss="modal">Fermer</button>
        <button id="submitButton" type="submit" class="btn btn-round" style="background-color: #325fa6;">Ajouter </button>
      </div>
      </form>
    </div>
  </div>
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
                        #
                      </th>
                      <th style="color:black">
                        Nom 
                      </th>
                      <th style="color:black">
                       Poste
                      </th>
                      <th style="color:black">
                      Contrat
                      </th>
                      <th style="color:black">
                        Date de Cloture
                      </th>
                      <th style="color:black">
                        Status
                      </th>
                      <th class="text-right" style="color:black">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @if($offre->count() > 0)
                @foreach($offre as $rs)
                      <tr>
                      <td>
                      {{ $loop->iteration }}
                        </td>
                        <td>
                        {{ $rs->nomposte }}
                        </td>
                        <td>
                        {{ $rs->nombredeposte  }}
                        </td>
                        <td>
                        {{ $rs->typecontrat }}
                        </td>
                        <td>
                        {{ $rs->datecloture  }}
                        </td>
                        <td>
                        <form class="statusForm" method="post" action="{{ route('updateStatus', ['id' => $rs->id]) }}">
                          @csrf

                          @method('PUT')
                          @if($rs->statusoffre)
                          <p style="color:red;">Expirée</p>
                          @else
                          <div  class="form-group">
                     <select name="statusoffre" class="status-checkbox form-control" data-offre-id="{{ $rs->id }}">

                      <option   id="flexSwitchCheck{{$rs->id}}" value="{{ $rs->statusoffre}}" {{ $rs->statusoffre == 0  ? 'selected' : '' }} >En cours</option>
                      <option id="flexSwitchCheck{{$rs->id}}" value="1" {{ $rs->statusoffre == 1  ? 'selected' : '' }}>Expirée</option>

                      @endif
                     </select>
                     </div>
                          </form>
                      </td>
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('offres.show', $rs->id)}}" style="color: #ef882b; text-decoration:none;">Détails</a>
                        &nbsp;|
                                <a href="{{ route('offres.edit', $rs->id)}}" ><button style="background: white; border:none;  color:#325fa6;">Éditer</button></a>
                             <!--   <form action="{{ route('offres.destroy', $rs->id) }}" method="POST" type="button"  onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="" style="margin:5px; background: white; border:none;"><i class="fa fa-trash" style="color: red; "></i></button>
                                </form> -->
                            </div>
                        </td>
                      </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des offres est vide</td>
                </tr>
            @endif
                     
                    </tbody>
                  </table>
                </div>
                {{$offre->links('vendor.pagination.custom')}}
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
        $('.status-checkbox').change(function () {
            $(this).closest('form').submit();
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('#exampleModal').on('hidden.bs.modal', function (e) {
            // Vérifiez s'il y a des erreurs de validation dans le modal
            if ($('#exampleModal .is-invalid').length > 0) {
                // Si des erreurs sont présentes, empêchez le modal de se fermer
                e.preventDefault();
                e.stopPropagation();
            }
        });
    });
</script>
@endsection