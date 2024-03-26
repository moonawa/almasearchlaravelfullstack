@extends('layouts.appadmin')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
  
           
              <div class="card-header">
                
              <div class="row">
                <div class="col-md-10">
                <h5 class="card-title">Liste des Membres</h5>
                </div>
                <div class="col-md-2">
               <a  style="background-color: #325fa6; padding-left: 15px;  padding-right: 15px; padding-top: 5px; padding-bottom: 5px; color:white; border-radius:20px; text-decoration: none;  text-decoration: none;" data-toggle="modal" data-target="#exampleModal">Ajouter</a> 

                </div>
                  <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un membre</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('registeradmin.save') }}">
                @csrf
                <label>Nom </label>
                <div class="form-group">
                  <input type="text" required class="form-control" name="name" placeholder="Nom" >
                </div>
                <label>Téléphone</label>
                <div class="form-group">
                  <input type="text" required class="form-control" name="telephone" placeholder="Téléphone ">
                </div>
                <label>Email</label>
                <div class="form-group">
                  <input type="email" required class="form-control" name="email" placeholder="Email">
                </div>
                <label>Fonction</label>
                <div class="form-group">
                  <input type="text" required class="form-control" name="posteuser" placeholder="Consutant">
                </div>
                <label>Mot de passe</label>
                <div class="form-group">
                  <input type="password" required class="form-control" name="password"  placeholder="Mot de passe" >
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-nfo btn-round" style="background-color: #325fa6;">Ajouter </button>
            </div>
            </form>
          </div>
        </div>
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
                        Tel
                      </th>
                      <th style="color:black">
                       Email 
                      </th>
                  
                      
                      <th style="color:black">
                        Fonction 
                      </th>
                      <th style="color:black">
                         Status
                      </th>
                      
                   
                    </thead>
                    <tbody>
                    @if($admin->count() > 0)
                @foreach($admin as $rs)
                      <tr>
                      <td>
                      {{ $loop->iteration }}
                        </td>
                        <td>
                        @if (!$rs->avatar)
                        <img class="avatar border-gray" width="75px" src="{{ asset('admin/img/default-avatar.png') }}" alt="...">

                        @else ( $rs->avatar)
                        <img class="avatar border-gray" width="75px" src="/avatars/{{ $rs->avatar }}">
                        @endif
                        {{ $rs->name }}
                        </td>
                      
                        <td>
                        {{ $rs->telephone }}
                        </td>
                        <td>
                      
                        {{ $rs->email }}
                        </td>
                       
                        <td>
                       
                        {{ $rs->posteuser  }}
                      
                        </td>
                      
                        <td>

                        <form class="statusForm" method="post" action="{{ route('updateStatusadmin', $rs->id)}}">
                          @csrf

                          @method('PUT')
                     
                          <div class="form-check">
                          <label class="form-check-label">
                          <input class="form-check-input status-checkbox" type="checkbox" id="flexSwitchCheck{{$rs->id}}"   {{ $rs->status == 1  ? 'checked' : '' }} >
                          <span class="form-check-sign"></span>
                          </label>
                          </div>
                          </form>

        </td>
                     
                       
                      </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des candidats  est vide</td>
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