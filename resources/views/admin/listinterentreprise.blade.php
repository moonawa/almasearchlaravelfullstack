@extends('layouts.appadmin')


@section('contents')
<div class="row">
  <div class="col-md-6">
    <div class="card card-user">
    <div class="card-header">
        <h4 class="card-title">Liste des Agents ({{$interscount}})</h4>
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
                     
                      <th  style="color:black">
                        Fonction
                      </th>
                      <th style="color:black">Connexion</th>
                    </thead>
                    <tbody>
                    @if($inters->count() > 0)
                @foreach($inters as $rs)
                <tr>
                    
                        <td>
                        {{ $rs->user->name }}
                        </td>
                        <td>
                        {{ $rs->user->telephone }} <br>
                        {{ $rs->user->email }}
                        </td>
                        <td>
                        {{ $rs->fonction }}
                        </td>
                        <td>
        @if( $rs->user->last_login_at)
        @php
                $date = date('Y-m-d', strtotime($rs->user->last_login_at));
                $heure = date('H:i', strtotime($rs->user->last_login_at));
                @endphp
                {{ $date }} à  {{ $heure }}
                @else
              <span style="color:red"> Jamais </span> 
                @endif
        </td>
                        </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des Interlocuteurs est vide</td>
                </tr>
            @endif
            </tbody>
                  </table>
      </div>
      {{$inters->links('vendor.pagination.custom')}}
      </div>
 
    </div>
  
  </div>
  <div class="col-md-6">
    
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Liste des Offres ({{$offrescount}})</h4>
      </div>
      <div class="card-body">
      <div class="table-responsive">
      <table class="table">
                    <thead class=" text-primary">
                  
                      <th style="color:black">
                        Nom
                      </th>
                      <th style="color:black">
                        Status
                      </th>
                     
                      <th  style="color:black">
                        Détails
                      </th>
                    </thead>
                    <tbody>
                    @if($offres->count() > 0)
                @foreach($offres as $rs)
                <tr>
                   
                        <td>
                        {{ $rs->nomposte }}
                        </td>
                        @if($rs->offrestatu == "Cloturée")
                        <td style="color:red">
                       Cloturée
                        </td>
                        @else
                        <td style="color:green">En Cours</td>
                        @endif 
                        <td>
                        <a href="{{ route('showoffreadmin', $rs->id)}}" style="color: #325fa6;">Voir</a>

                        </td>
                        </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des Offres est vide</td>
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
@endsection