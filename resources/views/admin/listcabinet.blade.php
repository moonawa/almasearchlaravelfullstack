@extends('layouts.appadmin')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
  
           
              <div class="card-header">
                <h5 class="card-title">Liste des Cabinets</h5>
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
                        Nom 
                      </th>
                      <th style="color:black">
                        Tel/Email 
                      </th>
                      <th style="color:black">
                        Situation 
                      </th>
                      <th style="color:black">
                        S. Activité
                      </th>
                      <th style="color:black">
                         NINEA
                      </th>
                      <th style="color:black">
                        RC
                      </th>
                    
                      <th style="color:black">
                        Status
                      </th>
                      <th class="text-right" style="color:black">
                        Détails
                      </th>
                    </thead>
                    <tbody>
                    @if($cabinets->count() > 0)
                @foreach($cabinets as $rs)
                      <tr>
                      <td>
                      {{ $loop->iteration }}
                        </td>
                        <td>
                        @if (!$rs->user->avatar)
                        <img class="avatar border-gray" width="75px" src="{{ asset('admin/img/default-avatar.png') }}" alt="...">

                        @else ( $rs->user->avatar)
                        <img class="avatar border-gray" width="75px" src="/avatars/{{ $rs->user->avatar }}">
                        @endif
                        {{ $rs->user->name }}
                        </td>
                       
                        <td>
                        {{ $rs->user->telephone }} <br>
                        {{ $rs->user->email }}
                        </td>
                        <td>
                        {{ $rs->situationcabinet  }}
                        </td>
                        <td>
                        {{ $rs->secteuractivitecabinet  }}
                        </td>
                        <td>
                        <a href="/uploads/{{ $rs->nineacabinet }}" style="color: #325fa6">Voir</i></a>

                        </td>
                        <td>
                        <a href="/uploads/{{ $rs->rccabinet }}" style="color: #325fa6">Voir</a>

                        </td>
                      
                        <td>
                        <form class="statusForm" method="post" action="{{ route('updateStatusCabinet', $rs->id)}}">
                          @csrf

                          @method('PUT')
                     
                          <div class="form-check">
                          <label class="form-check-label">
                          <input class="form-check-input status-checkbox" type="checkbox" id="flexSwitchCheck{{$rs->id}}"   {{ $rs->user->status == 1  ? 'checked' : '' }} >
                          <span class="form-check-sign"></span>
                          </label>
                          </div>
                          </form>
                      </td>
                        <td class="text-right">
                        <button type="button" style="border: none; background:white;" data-toggle="modal" data-target="#cabinetDescription{{$rs->id}}">
                        <i class="fa fa-eye" style=" color:#325fa6;"></i>
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