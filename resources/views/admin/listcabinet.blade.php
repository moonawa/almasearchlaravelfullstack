@extends('layouts.appadmin')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
           
              <div class="card-header">
              <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent" style="border:none">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" >Liste des Cabinets ({{$cabinetscount}})</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form action="{{ route('admin.listcabinetadmin') }}">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Recherche par nom" name="search" >
                <div class="input-group-append">
                  <div class="input-group-text">
                   <button style="background-color: gray-light; border:none;" type="submit"> <i class="nc-icon nc-zoom-split"></i></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </nav>
           

              </div>
              <br>
              <div class="card-body mt-5">
              @if (session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
            @endif
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                  
                    
                      <th style="color:black">
                        Cabinets 
                      </th>
                     
                      <th style="color:black">
                        Tel/Email 
                      </th>
                      <th style="color:black">
                      Description 
                      </th>
                      <th style="color:black">
                         Activité
                      </th>
                      <th style="color:black">
                         NINEA
                      </th>
                      <th style="color:black">
                        RC
                      </th>
                    
                     
                      <th style="color:black">
                        Détails
                      </th>
                    
                      <th style="color:black">
                        Status
                      </th>
                    </thead>
                    <tbody>
                    @if($cabinets->count() > 0)
                @foreach($cabinets as $rs)
                      <tr>
                     
                        <td>
                        @if (!$rs->logocbt)
                        <img class="avatar border-gray" width="75px" src="{{ asset('admin/img/default-avatar.png') }}" alt="...">

                        @else ( $rs->logocbt)
                        <img class="avatar border-gray" width="75px" src="/uploads/{{ $rs->logocbt }}">
                        @endif
                        {{ $rs->nomcabinet }}
                        </td>
                      
                        <td>
                        {{ $rs->telcbt }} <br>
                        {{ $rs->emailcbt }}
                        </td>
                        <td>
                        <button type="button" style="border: none; background:white; color:#7ac9e8" data-toggle="modal" data-target="#cabinetDescription{{$rs->id}}">
                       Voir
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="cabinetDescription{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="cabinetDescription{{$rs->id}}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cabinetDescription{{$rs->id}}Label">Description</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            {{ $rs->descabinet }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        </td>
                        <td>
                        {{ $rs->secteuractivitecabinet  }}
                        </td>
                        <td>
                        <a href="/uploads/{{ $rs->nineacabinet }}" style="color: #035874">Voir</i></a>

                        </td>
                        <td>
                        <a href="/uploads/{{ $rs->rccabinet }}" style="color: #035874">Voir</a>

                        </td>
                        <td >
                        <a href="{{ route('admin.listintercabinetadmin', $rs->id)}}" style="color:#7ac9e8;">Voir</a>


                        </td>
                       
                        <td>
                        <form class="statusForm" method="post" action="{{ route('updateStatusCabinet', $rs->id)}}">
                          @csrf

                          @method('PUT')
                          <div  class="form-group">
                     <select name="status" class="status-checkbox form-control" data-offre-id="{{ $rs->id }}">

                      <option   id="flexSwitchCheck{{$rs->id}}" value="1" {{ $rs->interlocuteurcbts->first()->user->status == 1  ? 'selected' : '' }} >Activé</option>
                      <option id="flexSwitchCheck{{$rs->id}}" value="0" {{ $rs->interlocuteurcbts->first()->user->status == 0  ? 'selected' : '' }}>Bloqué</option>

                    
                     </select>
                     </div>

                          
                          </form>
                      </td>
                       
                      </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des cabinets est vide</td>
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
            $(this).closest('form').submit();
        });
    });
</script>
@endsection