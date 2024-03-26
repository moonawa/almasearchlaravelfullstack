@extends('layouts.app')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
  <div class="row p-4" >
   <div class="col-md-2"> <a href="{{ route('offres') }}" style=" color:black; text-decoration: none;">Offres</a></div>
    <div class="col-md-2"> <a href="{{ route('offreencoursentreprise') }}" style=" color:black; text-decoration: none;">Encours</a></div>
    <div class="col-md-2">  <a  href="{{ route('offreexpireentreprise') }}" style="background-color: #325fa6; padding-left: 15px;  padding-right: 15px; padding-top: 5px; padding-bottom: 5px; color:white; border-radius:20px; text-decoration: none;  text-decoration: none;">Expirés</a></div>
    <div class="col-md-2"> </div>
    <div class="col-md-2"> </div>
  
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
                        Nombre de Poste
                      </th>
                      <th style="color:black">
                        Type de Contrat
                      </th>
                      <th style="color:black">
                        Date de Cloture
                      </th>
                      <th style="color:black">
                        Status
                      </th>
                      <th class="text-right" style="color:black">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @if($expires->count() > 0)
                @foreach($expires as $rs)
                      <tr>
                      <td>
                      {{ $loop->iteration }}
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
                        <td>
                        <form class="statusForm" method="post" action="{{ route('updateStatus', ['id' => $rs->id]) }}">
                          @csrf

                          @method('PUT')
                     
                          <div class="form-check">
                          <label class="form-check-label">
                          <input class="form-check-input status-checkbox" type="checkbox" id="flexSwitchCheck{{$rs->id}}"   {{ $rs->statusoffre == 1  ? 'checked' : '' }} >
                          <span class="form-check-sign"></span>
                          </label>
                          </div>
                          </form>
                      </td>
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('offres.show', $rs->id)}}" style="margin:5px;"><button style="background: white; border:none;"><i class="fa fa-eye"></i></button></a>

                                <a href="{{ route('offres.edit', $rs->id)}}" style="margin:5px;"><button style="background: white; border:none;"><i class="fa fa-pencil"></i></button></a>
                                <form action="{{ route('offres.destroy', $rs->id) }}" method="POST" type="button"  onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="" style="margin:5px; background: white; border:none;"><i class="fa fa-trash" style="color: red; "></i></button>
                                </form>
                            </div>
                        </td>
                      </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des offres est vide</td>
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