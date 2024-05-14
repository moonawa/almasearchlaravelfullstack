@extends('layouts.app')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
   <div class="row p-4" >
   <div class="col-md-10">
    <ul class="nav nav-tabs ">
  <li class="nav-item">
    <a class="nav-link "  href="{{ route('offres') }}"style="color:black;" >Toutes les Offres</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('offreencoursentreprise') }}" style="color:#325fa6;">Offres En Cours</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('offreexpireentreprise') }}" style="color:black;">Offres Expirées</a>
  </li>
</ul>
    </div>
  <div class="col-md-2">
    <button class="btn btn-round" style="background-color: #325fa6;" data-toggle="modal" data-target="#exampleModal">Ajouter</button>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une offre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <form method="POST" action="{{ route('offres.store') }}">
                @csrf
                <div class="row">
                <div class="col-md-6 pr-1">
                <label>Nom poste</label>
                    <div class="form-group">
                        <input type="text" class="form-control" required name="nomposte" placeholder="Developpeur web H/F">
                    </div>
                    </div>
                    <div class="col-md-6 px-1">
                    <label>Nombre de poste </label>
                    <div class="form-group">
<input type="number" class="form-control" required name="nombredeposte" placeholder="5">
                    </div>
                    </div>
                    </div>
                    <label>Description</label>
                    <div class="form-group">
                        <textarea name="description" id="description" required class="form-control" cols="30" rows="10"></textarea>
                    </div>
                  
                   
                    <label>Compétences Requises   </label>
                    <div class="form-group">
                        <input type="text" class="form-control" required name="competenceoffre" >
                    </div>

                    <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Année d'expérience </label>
                    <div class="form-group">
                        <select name="annexperience" id="annexperience" class="form-control" required>
                            <option value="0 à 3 ans">	0 à 3 ans</option>
                            <option value="3 à 5 ans">3 à 5 ans</option>
                            <option value="5 à 10 ans">5 à 10 ans</option>
                            <option value="+ de 10 ans">+ de 10 ans</option>
                            <option value="+ de 20 ans">+ de 20 ans</option>
                           
                        </select>
                    </div>
                    </div>
<div class="col-md-6 pr-1">
                    <label>Salaire  </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="salaire" required placeholder="500000">
                    </div>
                    </div>
                    </div>
                   

                    <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Date de prise de fonction  </label>
                    <div class="form-group">
                        <input type="date" class="form-control" name="datedebut" >
                        @error('datedebut')
              <div class="text-danger">{{ $message }}</div>
            @enderror
                      </div>
                   
                    </div>
                    <div class="col-md-6 pr-1">
                    <label>Date Clôture  </label>
                    <div class="form-group">
                        <input type="date" class="form-control"  name="datecloture" >
                        @error('datecloture')
              <div class="text-danger">{{ $message }}</div>
            @enderror
                      </div>
                    </div>
                    </div>
                    <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Type de contrat </label>
                    <div class="form-group">
                        <select name="typecontrat" id="typecontrat" class="form-control" required>
                        <option value="Stage">Stage</option>
                            <option value="CDD">CDD</option>
                            <option value="CDI">CDI</option>
                            <option value="Prestation">Prestation</option>
                           
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6 pr-1">
                    <label>Lieu   </label>
                    <div class="form-group">
                        <input type="text" class="form-control" required name="lieu" placeholder="Dakar, remote" >
                    </div>
                    </div>
                    </div>
             
                     <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Avantage </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="typeoffre" placeholder="13eme mois">
                    </div>
                    </div>
                    <div class="col-md-6 pr-1">
                   
                    </div>
                    </div>
                    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-round"   data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-round" style="background-color: #325fa6;">Ajouter </button>
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
                          Poste
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
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @if($encours->count() > 0)
                @foreach($encours as $rs)
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
                          <div  class="form-group form-outline mb-0">
                          <select name="statusoffre" class="status-checkbox form-control" data-offre-id="{{ $rs->id }}">
                            <option   id="flexSwitchCheck{{$rs->id}}" value="{{ $rs->statusoffre}}" {{ $rs->statusoffre == 0  ? 'selected' : '' }} >En cours</option>
                            <option id="flexSwitchCheck{{$rs->id}}" value="1" {{ $rs->statusoffre == 1  ? 'selected' : '' }}>Expirée</option>
                          </select>
                          </div>
                          
                          </form>
                      </td>
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('offres.show', $rs->id)}}" style="color: #ef882b; text-decoration:none;">Détails</a>
                        &nbsp;|
                                <a href="{{ route('offres.edit', $rs->id)}}" style=""><button style="background: white; border:none; color:#325fa6;">Éditer</button></a>
                               
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