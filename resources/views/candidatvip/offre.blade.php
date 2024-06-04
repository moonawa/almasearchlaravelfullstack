@extends('layouts.appcandidatvip')
  
  
  @section('contents')
  <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class=" p-4" >
    <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('showcandidat') }}" style="color:#325fa6;">Toutes Les Offres ({{$candidaturescount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('offreencourscandidat') }}" style="color:black;">Offres En Cours ({{$encourscount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('offrerecrutecandidat') }}" style="color:black;">Offres Recrutées ({{$recrutescount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('offredeclinecandidat') }}"  style="color:black;">Offres Déclinées  ({{$declinescount}})</a>
  </li>
</ul>
  
  
</div>
      
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                   
                        <th style="color:black">
                         Entreprise
                        </th>
                        <th style="color:black">
                          Poste 
                        </th>
                       
                        <th style="color:black">
                           Contrat
                        </th>
                        <th style="color:black">
                          Compétences
                        </th>
                        
                        <th style="color:black">
                           Status
                        </th>
                        <th class="text-right" style="color:black">
                          Détails
                        </th>
                      </thead>
                      <tbody>
                      @if($candidatures->count() > 0)
                  @foreach($candidatures as $rs)
                        <tr>
                      
                          <td>
                          {{ $rs->offre->entreprise->nomentreprise  }}
                          </td>
                          <td>
                          {{ $rs->offre->nomposte }}
                          </td>
                         
                          <td>
                          {{ $rs->offre->typecontrat }}
                          </td>
                         
                          <td>
                          {{ $rs->offre->competenceoffre  }}
                        </td>
                        <td>
                        @if($rs->reponese=="Recruté" || $rs->reponese=="Décliné" || $rs->reponese=="Refusé" || $rs->offre->statusoffre)
                       
                       <p style="color: red">Terminée</p>

                       @elseif($rs->reponese=="En Cours" && $rs->offre->statusoffre==0 )
                       <p style="color: green">En cours</p>
                       @endif
                          </td>
                          <td class="text-right">
                          <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="{{ route('showcandidatoffre', $rs->id)}}" style="margin:5px;"><button style=" background: white; border:none ; color: #325fa6">Voir</button></a>
                                  
                              </div>
                          </td>
                        </tr>
                        @endforeach
                        @else
                  <tr>
                      <td class="text-center" colspan="5">Vous n'avez pas encore été sélectionné pour une offre</td>
                  </tr>
              @endif
                       
                      </tbody>
                    </table>
                  </div>
                  {{$candidatures->links('vendor.pagination.custom')}}
                </div>
              </div>
            </div>
  </div>
  
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function () {
          $('.status-checkbox').change(function () {
              $('#statusForm').submit();
          });
      });
  </script>
  
  @endsection