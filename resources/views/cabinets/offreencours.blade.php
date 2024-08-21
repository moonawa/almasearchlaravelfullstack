@extends('layouts.appcabinet')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
  <div class=" p-4" >
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('indexcabinet') }}" style="color:black;">Toutes les Offres ({{$offrescount }})</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link active" aria-current="page" href="{{ route('offreencourscabinet') }}" style="color:#035874;">Offres En cours ({{$offresencours }})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('offreexpirecabinet') }}" style="color:black;">Offres Cloturées({{$offresexpire }})</a>
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
                        Entreprise 
                      </th>
                      <th style="color:black">
                        Poste 
                      </th>
                      <th style="color:black">
                        Nombre 
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
                        Détails
                      </th>
                    </thead>
                    <tbody>
                    @if($offres->count() > 0)
                @foreach($offres as $rs)
                      <tr>
                     
                        <td>
                        {{ $rs->entreprise->nomentreprise }}
                        </td>
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
                        <td style="color: green">
                         
                     Encours
                      
                      </td>
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('showcabinet', $rs->id)}}" style="color: #035874;">Voir</a>

                               
                            </div>
                        </td>
                      </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des offres En Cours est vide</td>
                </tr>
            @endif
                     
                    </tbody>
                  </table>
                </div>
                {{$offres->links('vendor.pagination.custom')}}

              </div>
            </div>
          </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.status-checkbox').change(function () {
            $(this).closest('form').submit();
        });
    });
</script>
@endsection