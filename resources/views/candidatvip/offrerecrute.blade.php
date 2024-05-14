@extends('layouts.appcandidatvip')
  
  
  @section('contents')
  <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class=" p-4" >
    <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('showcandidat') }}" style="color:black;">Toutes Les Offres</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('offreencourscandidat') }}" style="color:black;">Offres En Cours</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('offrerecrutecandidat') }}" style="color:#325fa6;">Offres Recrutées</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('offredeclinecandidat') }}"  style="color:black;">Offres Déclinées</a>
  </li>
  </ul>
  
</div>
      
  

  
                <div class="card-header">
                <div class="row">
                  <div class="col-md-10">
                  </div>
                  <div class="col-md-2">
  
                  </div>
                </div>
  
                </div>
                <br><br>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                      <th style="color:black">
                          #
                        </th>
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
                      @if($recrutes->count() > 0)
                  @foreach($recrutes as $rs)
                        <tr>
                        <td>
                        {{ $loop->iteration }}
                          </td>
                          <td>
                          {{ $rs->offre->entreprise->user->name  }}
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
                       
                       
                       <p style="color: red">Expirée</p>
                     
                     
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