@extends('layouts.appcandidatvip')
  
  
  @section('contents')
  <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="row p-4" >
    <div class="col-md-2"> <a  href="{{ route('showcandidat') }}" style="color:black; text-decoration: none;">Offres</a></div>
    <div class="col-md-2"> <a href="{{ route('offreencourscandidat') }}" style=" background-color: #325fa6; padding-left: 15px;  padding-right: 15px; padding-top: 5px; padding-bottom: 5px; color:white; border-radius:20px; text-decoration: none;  text-decoration: none;">Encours</a></div>
    <div class="col-md-2"> <a href="{{ route('offrerecrutecandidat') }}" style=" color:black; text-decoration: none;">Recrutés</a></div>
    <div class="col-md-2"> <a href="{{ route('offredeclinecandidat') }}" style=" color:black; text-decoration: none;">Déclinés</a></div>
    <div class="col-md-2"> </div>
  
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
                      @if($encours->count() > 0)
                  @foreach($encours as $rs)
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
                        @if($rs->offre->statusoffre)
                       
                       <p style="color: red">Expirée</p>
                       @else
                       <p style="color: green" >Encours</p>
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
                      <td class="text-center" colspan="5">La liste des offres encours est vide</td>
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