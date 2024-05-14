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
          <a href="" data-toggle="modal" data-target="#exampleModal">Voir plus </a>
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
    <a class="nav-link " href="{{ route('offres.show', $offre->id) }} " style="color: #ef882b;"><strong>Candidats Sélectionnés ({{$candidaturescount}}) </strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('indexproposition', $offre->id)}}" style="background:#325fa6;;">Candidats Proposés ({{$propositionscount}})</a>
  </li>
 
</ul>
   <br><br>
      <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link "  href="{{ route('indexproposition', $offre->id) }}" style="color: black;">Proposés ({{$propositionscount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('proposerecrute', $offre->id) }}" style="color: black;">Recrutés ({{$propositionsrecrutecount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('proposerefuse', $offre->id) }}" style="color:  #325fa6;">Refusés ({{$propositionsrefusecount}})</a>
  </li>
  
</ul>
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
                Cabinet 
              </th>
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
                Commentaire  sur le Candidat
              </th>
             
              </thead>
            <tbody>

              @if($propositions->count() > 0)
              @foreach($propositions as $candidature)
              <tr>
                <td>
                  {{ $loop->iteration }}
                </td>
                <td>
                  {{ $candidature->candidat->cabinet->user->name }}  

                </td>
                <td>
                  {{ $candidature->candidat->user->name }}  

                </td>
                <td>
                  <a href="/uploads/{{ $candidature->candidat->cv }}"><i class="fa fa-eye" style="color: #325fa6;"></i></a>

               
                </td>
                <td>
                {{ $candidature->candidat->fonction }}  
                </td>
                <td>
                <form  method="post" action="{{ route('commentaireeseproposition', ['id' => $candidature->id]) }}">
                          @csrf
                          @method('PUT')

                          <div  class="form-group ">
                        
                         <textarea name="commentaireeseproposition" class="form-control commentaireese" id="" cols="60" rows="2" placeholder="Pourquoi le candidat a été recruté?" > {{ $candidature->commentaireeseproposition }}</textarea>
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
      </div>
    </div>
    </div>
   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    
    $(document).ready(function () {
        $('.commentaireese').change(function () {
            $(this).closest('form').submit();
        });
    });
</script>


@endsection