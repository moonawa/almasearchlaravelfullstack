@extends('layouts.app')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
   <div class="row p-4" >
    <div class="col-md-2"> <a  href="{{ route('offres') }}" style="background-color: #325fa6; padding-left: 15px;  padding-right: 15px; padding-top: 5px; padding-bottom: 5px; color:white; border-radius:20px; text-decoration: none;  text-decoration: none;">Offres</a></div>
    <div class="col-md-2"> <a href="{{ route('offreencoursentreprise') }}" style=" color:black; text-decoration: none;">Encours</a></div>
    <div class="col-md-2"> <a href="{{ route('offreexpireentreprise') }}" style=" color:black; text-decoration: none;">Expirés</a></div>
    <div class="col-md-2"> </div>
    <div class="col-md-2"> </div>
    <div class="col-md-2"><a   style="background-color: #ef882b; padding-left: 15px;  padding-right: 15px; padding-top: 5px; padding-bottom: 5px; color:white; border-radius:20px; text-decoration: none;  text-decoration: none;" data-toggle="modal" data-target="#exampleModal">Ajouter</a>  </div>
  
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
                        <input type="number" class="form-control" name="nombredeposte" placeholder="5">
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
                        <option value="Pas d'expérience requise">Pas d'expérience requise</option>
                            <option value="-1an">-1an</option>
                            <option value="+1ans">+1an</option>
                            <option value="+2ans">+2ans</option>
                            <option value="+3ans">+3ans</option>
                            <option value="+4ans">+4ans</option>
                            <option value="+5ans">+5ans</option>
                            <option value="+10ans">+10ans</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6 pr-1">
                    <label>Salaire  </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="salaire" placeholder="500000">
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
                        <input type="date" class="form-control" required name="datecloture" >
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
                    @if($offre->count() > 0)
                @foreach($offre as $rs)
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


<script>
    $(document).ready(function () {
        $('#exampleModal').on('hidden.bs.modal', function (e) {
            // Vérifiez s'il y a des erreurs de validation dans le modal
            if ($('#exampleModal .is-invalid').length > 0) {
                // Si des erreurs sont présentes, empêchez le modal de se fermer
                e.preventDefault();
                e.stopPropagation();
            }
        });
    });
</script>
@endsection