@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class=" p-4">
      <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('formations') }}" style="color:#325fa6;">Formations</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('experiences') }}" style="color:black;">Expériences</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('competences') }}" style="color:black;">Compétences</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('references') }}" style="color:black;" >Références</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="{{ route('langues') }}" style="color:black;" >Langues</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('cvdetaillecandidat', auth()->user()->candidat->id) }}" style="color:#ef882b; " >CV Complet</a>
  </li>
  <li class="nav-item">
  <button class=" nav-link " style="background-color: #325FA6; color:white;" data-toggle="modal" data-target="#exampleModal">Ajouter une Formation</button> 

  </li>
  
</ul>
</div>

      <!-- Button trigger modal -->


      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter une formation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('formations.store') }}">
                @csrf
                <label>Nom de la formation</label>
                <div class="form-group">
                  <input type="text" class="form-control" required name="nomformation" placeholder="intitulé de la formation">
                </div>
                <label>Etablissement</label>
                <div class="form-group">
                  <input type="text" class="form-control" required name="etablissementformation" placeholder="Ecole">
                </div>

                <label>Année académique </label>
                <div class="form-group">
                  <input type="text" class="form-control" required name="anneeacademique" placeholder="Ex: 2023/2024">
                </div>

                <label> Niveau</label>
                <div class="form-group">
                  <select name="niveauformation" class="form-control" required>
                    <option value="BFEM">BFEM</option>
                    <option value="BAC">BAC</option>
                    <option value="Certification">Certification</option>
                    <option value="Licence">Licence</option>
                    <option value="Master">Master</option>
                    <option value="Doctorat">Doctorat</option>


                  </select>
                </div>


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
                Etablissement
              </th>
              <th style="color:black">
                Année Académique
              </th>
              <th style="color:black">
                Niveau
              </th>

              <th class="text-right" style="color:black">
                Action
              </th>
            </thead>
            <tbody>
              @if($formation->count() > 0)
              @foreach($formation as $rs)
              <tr>
                <td>
                  {{ $loop->iteration }}
                </td>
                <td>
                  {{ $rs->nomformation }}
                </td>
                <td>
                  {{ $rs->etablissementformation }}
                </td>
                <td>
                  {{ $rs->anneeacademique }}
                </td>
                <td>
                  {{ $rs->niveauformation }}
                </td>

                <td class="text-right">
                  <div class="btn-group" role="group" aria-label="Basic example">
                <button style=" background: white; border:none" data-toggle="modal" data-target="#exampleModalformation{{$rs->id}}"><i class="fa fa-pencil"></i></button>
                    <div class="modal fade" id="exampleModalformation{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalformation{{$rs->id}}Label" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalformation{{$rs->id}}Label">Modifier la formation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="{{ route('formations.update', $rs->id) }}">
                              @csrf
                              @method('PUT')
                              <label>Nom de la formation</label>
                              <div class="form-group">
                                <input type="text" class="form-control" name="nomformation" placeholder="intitulé de la formation" value="{{ $rs->nomformation }}">
                              </div>
                              <label>Etablissement</label>
                              <div class="form-group">
                                <input type="text" class="form-control" name="etablissementformation" placeholder="Ecole" value="{{ $rs->etablissementformation }}">
                              </div>

                              <label>Année académique </label>
                              <div class="form-group">
                                <input type="text" class="form-control" name="anneeacademique" placeholder="Ex: 2023/2024" value="{{ $rs->anneeacademique }}">
                              </div>

                              <label> Niveau</label>
                              <div class="form-group">
                                <select name="niveauformation" class="form-control" value="{{ $rs->niveauformation }}">
                                  <option value="{{ $rs->niveauformation }}"> {{ $rs->niveauformation }}</option>
                                  <option value="BFEM">BFEM</option>
                                  <option value="BAC">BAC</option>
                                  <option value="Certification">Certification</option>
                                  <option value="Licence">Licence</option>
                                  <option value="Master">Master</option>
                                  <option value="Doctorat">Doctorat</option>


                                </select>
                              </div>

                              <!-- <div class="card-footer ">
                <button type="submit" class="btn btn-info btn-round" style="background-color: #325fa6;">Ajouter</button>
            </div> -->

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-info btn-round" style="background-color: #325fa6;">Modifier </button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <form action="{{ route('formations.destroy', $rs->id) }}" method="POST" type="button" onsubmit="return confirm('Delete?')">
                      @csrf
                      @method('DELETE')
                      <button class="" style="margin:5px;  background: white; border:none"><i class="fa fa-trash" style="color: red; "></i></button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td class="text-center" colspan="5">La liste des formations est vide</td>
              </tr>
              @endif

            </tbody>
          </table>
        </div>
        {{$formation->links('vendor.pagination.custom')}}
      </div>
    </div>
  </div>
</div>
@endsection