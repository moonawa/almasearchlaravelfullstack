@extends('layouts.app')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
  
           
              <div class="card-header">
                
              <div class="row">
                <div class="col-md-10">
                <h5 class="card-title">Liste des Interlocuteurs ({{$interlocuteurcount}})</h5>
                </div>
                <div class="col-md-2">
               <button class="btn btn-round" style="background-color: #035874;" data-toggle="modal" data-target="#exampleModal">Ajouter</button>

                </div>
                  <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un Interlocuteur</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('registerInterlo') }}">
                @csrf
                <label>Nom <span style="color:red;">*</span></label>
                <div class="form-group">
                  <input type="text" required class="form-control" name="name" placeholder="Nom" >
                </div>
                <label>Téléphone <span style="color:red;">*</span></label>
                <div class="form-group">
                  <input type="text" required class="form-control" name="telephone" placeholder="Téléphone ">
                </div>
                <label>Email <span style="color:red;">*</span></label>
                <div class="form-group">
                  <input type="email" required class="form-control" name="email" placeholder="Email">
                </div>
                <label>Fonction <span style="color:red;">*</span></label>
                <div class="form-group">
                  <input type="text" required class="form-control" name="fonction" placeholder="Consutant">
                </div>
                <label>Mot de passe <span style="color:red;">*</span></label>
                <div class="form-group">
                  <input type="password" required class="form-control" name="password"  placeholder="Mot de passe" >
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-nfo btn-round" style="background-color: #035874;">Ajouter </button>
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
                        Dernière Connexion
                      </th>
                   
                    </thead>
                    <tbody>
                    @if($interlocuteur->count() > 0)
                @foreach($interlocuteur as $rs)
                      <tr>
                   
                        <td>
                        @if (!$rs->user->avatar)
                        <img class="avatar border-gray" width="75px" src="{{ asset('admin/img/default-avatar.png') }}" alt="...">

                        @else ( $rs->user->avatar)
                        <img class="avatar border-gray" width="75px" src="/avatars/{{ $rs->user->avatar }}">
                        @endif
                        {{ $rs->user->name }}
                        </td>
                      
                        <td>
                        {{ $rs->user->telephone }}
                        </td>
                        <td>
                      
                        {{ $rs->user->email }}
                        </td>
                       
                        <td>
                       
                        {{ $rs->fonction  }}
                      
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
                    <td class="text-center" colspan="5">La liste des Interlocuteurs  est vide</td>
                </tr>
            @endif
                     
                    </tbody>
                  </table>
                </div>
                {{$interlocuteur->links('vendor.pagination.custom')}}
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