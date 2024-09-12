@extends('layouts.app')
  
  
@section('contents')
<div class="row ">
  <div class=" col-md-12 ">
  <div class="card ">
    <div class="row p-4">
    <div class="col-md-10">
    <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active"  href="{{ route('offres') }}" style="color:black;">Toutes les Offres ({{$offrecount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('offreencoursentreprise') }}" style="color:black;">Offres En Cours ({{$encourscount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('offreexpireentreprise') }}" style="color:black;">Offres Expirées ({{$expirescount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="{{ route('offrestandbyentreprise') }}" style="color:#035874;">Offres En StandBy ({{$standbycount}})</a>
  </li>
</ul>
    </div>
  
  </div>
  
            <!-- Modal -->



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
                    @if($standby->count() > 0)
                @foreach($standby as $rs)
                      <tr>
                   
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
                         
                          <div  class="form-group">
                     <select name="offrestatu" class="status-checkbox form-control" data-offre-id="{{ $rs->id }}">
                     <option id="flexSwitchCheck{{$rs->id}}" value="{{ $rs->offrestatu}}" {{ $rs->offrestatu == "StandBy"  ? 'selected' : '' }}>StandBy</option>

                      <option id="flexSwitchCheck{{$rs->id}}" value="En Cours" {{ $rs->offrestatu == "En Cours"  ? 'selected' : '' }} >En Cours</option>
                      <option id="flexSwitchCheck{{$rs->id}}" value="Cloturée" {{ $rs->offrestatu == "Cloturée"  ? 'selected' : '' }}>Clôturée</option>

                  
                     </select>
                     </div>
                          </form>
                      </td>
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary btn-sm">
                        <a href="{{ route('offres.show', $rs->id)}}" style="color: #fff; text-decoration:none ">Détails</a>

                        </button>

                        &nbsp;|
                        <button type="button" class="btn btn-info btn-sm">
                        <a href="{{ route('offres.edit', $rs->id)}}" style="color:#fff;   text-decoration:none">Editer</a>

                        </button>
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
                {{$standby->links('vendor.pagination.custom')}}
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