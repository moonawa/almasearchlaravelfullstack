@extends('layouts.appcabinet')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
   <div class="row p-4" >
   <div class="col-md-2"> <a href="{{ route('candidatcabinet') }}" style=" color:black; text-decoration: none; ">Viviers</a></div>
   <div class="col-md-2"> <a href="{{ route('proposition') }}" style="color:black; text-decoration: none; ">Proposés</a></div>
   <div class="col-md-2"> <a href="{{ route('selec') }}" style="  background-color: #ef882b; color:white; padding-left: 15px; padding-right: 15px; padding-top: 5px; padding-bottom: 5px; color:white; border-radius:20px; text-decoration: none;">Sélectionnés</a></div>
   <div class="col-md-2"> <a href="{{ route('recru') }}" style=" color:black; text-decoration: none;">Recrutés</a></div>
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
                        
                      </th>
                      <th style="color:black">
                        Nom
                      </th>
                     
                      <th style="color:black">
                        Téléphone
                      </th>
                      <th style="color:black">
                        Disponibilité
                      </th>
                      <th style="color:black">
                        CV
                      </th>
                      <th style="color:black">
                        Offres
                      </th>
                      <th  style="color:black">
                        Entreprises
                      </th>
                    </thead>
                    <tbody>
                    @if($selection->count() > 0)
                @foreach($selection as $rs)
                      <tr>
                      <td>
                      {{ $loop->iteration }}
                        </td>
                        <td>
                        {{ $rs->candidat->user->name }}
                        </td>
                       
                        <td>
                        {{ $rs->candidat->user->telephone }} <br>
                        {{ $rs->candidat->user->email  }}
                        </td>
                        <td>
                        {{ $rs->candidat->disponibilite  }}
                        </td>
                        <td>
                        <a href="/uploads/{{ $rs->candidat->cv }}" style="color: #325fa6;">Voir</a>
                        </td>
                       
                        <td >
                        {{ $rs->offre->nomposte  }}
                        </td>
                        <td >
                        {{ $rs->offre->entreprise->user->name  }}
                        </td>
                      </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des candidats  Proposés est vide</td>
                </tr>
            @endif
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
</div>
@endsection