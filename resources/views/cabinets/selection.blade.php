@extends('layouts.appcabinet')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
   <div class=" p-4" >
   <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('candidatcabinet') }}" style="color:black;">Viviers ({{$candidatcount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('proposition') }}" style="color:black;">Proposés ({{$propositioncount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('selec') }}" style="color:#325FA6;">Sélectionnés ({{$selectioncount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('recru') }}"  style="color:black;">Recrutés ({{$recrutecount}})</a>
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
            
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                 
                      <th style="color:black">
                        Nom
                      </th>
                     
                      <th style="color:black">
                        Téléphone
                      </th>
                      <th style="color:black">
                        Fonction
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
                        {{ $rs->candidat->user->name }}
                        </td>
                       
                        <td>
                        {{ $rs->candidat->user->telephone }} <br>
                        {{ $rs->candidat->user->email  }}
                        </td>
                        <td>
                        {{ $rs->candidat->fonction  }}
                        </td>
                        <td>
                        <a href="/uploads/{{ $rs->candidat->cv }}" style="color: #ef882b;">Voir</a>
                        </td>
                       
                        <td >
                        {{ $rs->offre->nomposte  }}
                        </td>
                        <td >
                        {{ $rs->offre->entreprise->nomentreprise  }}
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
                {{$selection->links('vendor.pagination.custom')}}

              </div>
            </div>
          </div>
</div>
@endsection