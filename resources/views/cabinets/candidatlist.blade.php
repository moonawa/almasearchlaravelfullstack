@extends('layouts.appcabinet')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
   <div class=" p-4" >
   <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('candidatcabinet') }}" style="color:#325FA6;">Viviers ({{$candidatcount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('proposition') }}" style="color:black;">Proposés ({{$propositioncount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('selec') }}" style="color:black;">Sélectionnés ({{$selectioncount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('recru') }}"  style="color:black;">Recrutés ({{$recrutecount}})</a>
  </li>
  <li class="nav-item">
  <button class=" nav-link " style="background-color: #325FA6; color:white;" data-toggle="modal" data-target="#exampleModal">Ajouter un vivier</button> 

  </li>
</ul>
  
</div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un Candidat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
         
            <div class="modal-body">
              <form method="POST" action="{{ route('cabinets.candidat') }}"  enctype="multipart/form-data">
                @csrf
                <label>Nom </label>
                    <div class="form-group">
                        <input type="text" class="form-control" required name="name" placeholder="Nom">
                    </div>
                    <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Genre </label>
                    <div class="form-group">
                    <select name="genre" id="genre" class="form-control" required>
                            <option value="Homme">Homme</option>
                            <option value="Femme"> Femme</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-md-6 pr-1">
                    <label>Date de naissance </label>
                    <div class="form-group">
                        <input type="date" class="form-control" name="birthday" placeholder="12-12-1998">
                        @error('birthday')
              <div class="text-danger">{{ $message }}</div>
            @enderror
                      </div>
                    </div>
                    </div>
                    
                    <label>Mail </label>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="email" placeholder="awandiayesene7@gmail.com">
                    </div>
                    <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Téléphone </label>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="telephone" placeholder="+221771301409">
                    </div>
                    </div>
                    <div class="col-md-6 pr-1">
                    <label>Nationnalité </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nationnalite" placeholder="nationnalite">
                    </div>
                    </div>
                    </div>
                    <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Genre </label>
                    <label>Fonction </label>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="fonction" placeholder="fonction">
                    </div>
                    </div>
                    <div class="col-md-6 pr-1">
                    <label>Disponibilité </label>
                    <div class="form-group">
                    <select name="disponibilite" id="disponibilite" required class="form-control">
                            <option value="Immédiate">Immédiate</option>
                            <option value="Dans un mois">Dans un mois</option>
                            <option value="Négociable">Négociable</option>
                            <option value="Dans trois mois">Dans trois mois</option>

                        </select>     
                   </div>
                    </div>
                    </div>
                   
                  
                   <label>CV </label>
                    <input id="cv" type="file" required class="form-control " name="cv"   autocomplete="cv" />
              
                    </div> 
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-info btn-round" style="background-color: #325fa6;">Ajouter </button>
            </div>
            </form>
          </div>
        </div>
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
              @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                   
                      <th style="color:black">
                        Nom
                      </th>
                      <th style="color:black">
                        Mail
                      </th>
                      <th style="color:black">
                        Fonction
                      </th>
                      <th style="color:black">
                        Disponibilité
                      </th>
                      <th style="color:black">
                        CV
                      </th>
                      <th class="text-right" style="color:black">
                        Modifier
                      </th>
                    </thead>
                    <tbody>
                    @if($candidat->count() > 0)
                @foreach($candidat as $rs)
                      <tr>
                    
                        <td>
                        {{ $rs->user->name }}
                        </td>
                        <td>
                        {{ $rs->user->telephone }} <br>
                        {{ $rs->user->email  }}
                        </td>
                        <td>
                        {{ $rs->fonction  }}
                        </td>
                        <td>
                        {{ $rs->disponibilite  }}
                        </td>
                        <td>
                        <a href="/uploads/{{ $rs->cv }}" style="color: #ef882b;">Voir</a>
                        </td>
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('references.edit', $rs->id)}}" style="margin:5px;"><button style="border:none; background:white;"><i class="fa fa-pencil"></i></button></a>
                               
                        </td>
                      </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des candidats est vide</td>
                </tr>
            @endif
                     
                    </tbody>
                  </table>
                </div>
                {{$candidat->links('vendor.pagination.custom')}}

              </div>
            </div>
          </div>
</div>
@endsection