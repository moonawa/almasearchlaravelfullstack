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
            <a class="navbar-brand" style="color: #035874;" >Liste des Admins ({{$admincount}})</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form action="{{ route('admin.admin') }}">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Recherche par nom" name="search" >
                <div class="input-group-append">
                  <div class="input-group-text">
                   <button style="background-color: gray-light; border:none;" type="submit"> <i class="nc-icon nc-zoom-split"></i></button>
                  </div>
                </div>
              </div>
            </form>
            <button class="btn btn-round" style="background-color: #035874;" data-toggle="modal" data-target="#exampleModal">Ajouter</button>
          </div>
        </div>
      </nav><br><br>
              <div class="row ">
                
                  <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un Membre</h5>
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
              @if (session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
            @endif
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
                         Status
                      </th>
                      <th style="color:black">
                          Connexion
                      </th>
                   
                    </thead>
                    <tbody>
                    @if($admin->count() > 0)
                @foreach($admin as $rs)
                      <tr>
                    
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
                          <div  class="form-group">
                     <select name="status" class="status-checkbox form-control" data-offre-id="{{ $rs->id }}">

                      <option   id="flexSwitchCheck{{$rs->id}}" value="{{ $rs->status}}" {{ $rs->status == 1  ? 'selected' : '' }} >Activé</option>
                      <option id="flexSwitchCheck{{$rs->id}}" value="1" {{ $rs->status == 0  ? 'selected' : '' }}>Bloqué</option>

                    
                     </select>
                     </div>
                         
                          </form>

        </td>
        <td>
        @if( $rs->last_login_at)
        @php
                $date = date('Y-m-d', strtotime($rs->last_login_at));
                $heure = date('H:i', strtotime($rs->last_login_at));
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
                    <td class="text-center" colspan="5">La liste des candidats  est vide</td>
                </tr>
            @endif
                     
                    </tbody>
                  </table>
                </div>
                {{$admin->links('vendor.pagination.custom')}}
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
<script>
  // Initialization for ES Users
import { Input, Ripple, initMDB } from "mdb-ui-kit";

initMDB({ Input, Ripple });
</script>
@endsection