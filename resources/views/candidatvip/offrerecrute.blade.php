@extends('layouts.appcandidatvip')
  
  
  @section('contents')
  <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class=" p-4" >
    <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('showcandidat') }}" style="color:black;">Toutes Les Offres ({{$candidaturescount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('offreencourscandidat') }}" style="color:black;">Offres En Cours ({{$encourscount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('offrerecrutecandidat') }}" style="color:#325fa6;">Offres Recrutées ({{$recrutescount}})</a>
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
                           Expérience
                        </th>
                        <th class="text-right" style="color:black">
                          Détails
                        </th>
                      </thead>
                      <tbody>
                      @if($recrutes->count() > 0)
                  @foreach($recrutes as $rs)
                        <tr>
                     
                          <td>
                          {{ $rs->offre->entreprise->nomentreprise }}
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
                       
                       
                        {{ $rs->offre->annexperience  }}
                     
                     
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
                      <td class="text-center" colspan="5">La liste des offres recrutées est vide</td>
                  </tr>
              @endif
                       
                      </tbody>
                    </table>
                  </div>
                  {{$recrutes->links('vendor.pagination.custom')}}
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