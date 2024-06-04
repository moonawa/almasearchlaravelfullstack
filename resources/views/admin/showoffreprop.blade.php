@extends('layouts.appadmin')


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
      
          @if ($offre->statuscabinet)
    <p>L'entreprise a  fait appel aux cabinets</p>
          @endif
       
          
        </div>
      </div>
    </div>
   
  </div>
  <div class="col-md-8">
  <div class="card card-user">
      <div class="card-header">
      <div class="p-2">
      <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link " href="{{ route('showoffreadmin', $offre->id) }} " style=" color:#ef882b; "><strong>Candidats Sélectionnés ({{$candidaturescount}})</strong> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('showoffrepropadmin', $offre->id)}}" style="background: #325fa6;"> <strong> Candidats Proposés  ({{$propositionscount}}) </strong></a>
      </li>

    </ul><br><br>
        <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('showoffrepropadmin', $offre->id) }}"  style="color:#325fa6;">Proposés ({{$propositionscount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('showoffrerecrutepropadmin', $offre->id)}}" style="color:black;">Recrutés ({{$propositionsrecrutecount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('showoffrerefusepropadmin', $offre->id)}}" style="color:black;">Refusés ({{$propositionsrefusecount}})</a>
  </li>
 
</ul>
    </div>
        <br>
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
                Réponse
              </th>
            </thead>
            <tbody>

              @if($propositions->count() > 0)
              @foreach($propositions as $prop)
              <tr>
             
                <td>
                  {{ $prop->candidat->user->name }} <br>

                </td>
                <td>
                  <a href="/uploads/{{  $prop->candidat->cv }}"><i class="fa fa-eye" style="color: #ef882b;"></i></a>

                </td>
               
                <td>
               
                @if( $prop->heureproposition)
                @php
                $date = date('Y-m-d', strtotime($prop->heureproposition));
                $heure = date('H:i', strtotime($prop->heureproposition));
                @endphp
                {{ $date }} à  {{ $heure }}
               
                @else
                --
                @endif
                   
                </td>
                <td>
                @if( $prop->lieuproposition)
                {{ $prop->lieuproposition}}
                @else
                --
                @endif
                </td>
                @if($prop->reponseseproposition  == "Recruté" )

                <td style="color: green;">
                 Recruté  </td>
                @elseif($prop->reponseseproposition == "Refusé" )
                <td style="color: red;"> Refusé  </td>
                @elseif($prop->reponseseproposition == "En Cours" )
                <td>En Cours </td>
               
                @endif           
            
              </tr>

              @endforeach
              @else
              <tr>
                <td class="text-center" colspan="5">Il n'y a pas encore de Proposition</td>
              </tr>
              @endif
            </tbody>
          </table>
          {{$propositions->links('vendor.pagination.custom')}}
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