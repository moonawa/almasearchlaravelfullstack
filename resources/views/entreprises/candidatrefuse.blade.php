@extends('layouts.app')


@section('contents')
<div class="row">
  
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
        <button type="button" class="btn btn-secondary btn-round"   data-dismiss="modal">Fermer</button>
      </div>
      </div>
    </div>
  </div>
</div>
            @endif
        </p> 
      </div>
      <div class="col-md-4">
     <p>  <strong>Nombre de poste: </strong>  {{$offre->nombredeposte}} </p> 
     <p>  <strong>Salaire: </strong>{{$offre->salaire}} </p> 
     <p>  <strong>Lieu: </strong>{{$offre->lieu}} </p> 
     <p>  <strong>Date de prise de Service: </strong>{{$offre->datedebut}} </p> 
     <p>  <strong>Date de Cloture: </strong>{{$offre->datecloture}} </p>

      </div>
      <div class="col-md-4">
     <p>  <strong>Compétences Requises: </strong>{{$offre->competenceoffre}} </p> 
     <p><strong>Année d'expérience: </strong>{{$offre->annexperience}} </p>
     <p><strong>Type de Contrat: </strong>{{$offre->typecontrat}} </p>

     

      </div>
    </div>
    </div>
    </div>
    <div class="card card-user col-md-12">
      <div class="card-header">
      <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('offres.show', $offre->id) }} " style="background: #325fa6;">Candidats Sélectionnés ({{$candidaturescount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('indexproposition', $offre->id)}}" style="color:#ef882b ;"><strong> Candidats Proposés ({{$propositionscount}}) </strong></a>
  </li>
 
</ul>
   <br><br>
      <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link "  href="{{ route('offres.show', $offre->id) }}" style="color: black;">Sélectionnés ({{$candidaturescount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('candidatrecrute', $offre->id) }}" style="color: black;">Recrutés ({{$candidatrecrutecount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('candidatrefuse', $offre->id) }}" style="color: #325fa6;">Refusés ({{$candidatrefusecount}})</a>
  </li>
  
</ul>
      </div>
      <br>
     
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
               Fonction
              </th>
              <th style="color:black">
                Commentaire sur le Candidat
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
                <a href="{{ route('cvdetailleese', $candidature->candidat->id)}}" ><i class="fa fa-eye" style="color: #ef882b;"></i></a>
                  <a href="/uploads/{{ $candidature->candidat->cv }}"><i class="fa fa-eye" style="color: #325fa6;"></i></a>

                </td>
                <td>
                {{ $candidature->candidat->fonction }}  
                </td>
                <td>
                <form class="dateForm" method="post" action="{{ route('commentaireese', ['id' => $candidature->id]) }}">
                          @csrf

                          @method('PUT')

                        

                          <div  class="form-group ">
                     <textarea name="commentaireese" class="form-control commentaireese" id="" cols="60" rows="2" placeholder="Pourquoi le candidat a été refusé?">{{ $candidature->commentaireese }}</textarea>
                     <button type="submit" class="btn  btn-sm mt-1" style="background-color: #325FA6;">Commenter</button>

    </div>
                          </div>
                          </form>
                 
                </td>
             
              </tr>

              @endforeach
              @else
              <tr>
                <td class="text-center" colspan="5">La liste des candidats refusés est vide</td>
              </tr>
              @endif
            </tbody>
          </table>
          </div>
          {{$candidatures->links('vendor.pagination.custom')}}
      </div>
    </div>
    </div>
    <style>
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
    $(document).ready(function() {
        $('.commentaireese').change(function() {
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
    
    $(document).ready(function () {
        $('.commentaireese').change(function () {
            $(this).closest('form').submit();
        });
    });
</script>



@endsection