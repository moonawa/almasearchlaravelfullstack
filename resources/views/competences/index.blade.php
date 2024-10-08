@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="row p-4">
      <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('formations') }}" style="color:black;">Formations</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('experiences') }}" style="color:black ;">Expériences</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('competences') }}" style="color:#035874;">Compétences</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('references') }}" style="color:black;" >Références</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="{{ route('langues') }}" style="color:black;" >Langues</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('cvdetaillecandidat', auth()->user()->candidat->id) }}" style="color:#7ac9e8; " >CV Complet</a>
  </li>
  <li class="nav-item">
  <button class=" nav-link " style="background-color: #035874; color:white;" data-toggle="modal" data-target="#exampleModal">Ajouter une Compétence</button> 

  </li>
  
</ul>

      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter une Compétence</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('competences.store') }}">
                @csrf
                <label>Nom de la compétence</label>
               
                <div class="form-group">
    <input type="text" class="form-control" required placeholder="Compétence" name="nomcompetence" list="list-timezone" id="input-datalist">
    <datalist id="list-timezone">
        <option>Php</option>
        <option>Java</option>
        <option>Devops</option>
        <option>Photoshop</option>
        <option>Wordpress</option>
        <option>Microsoft Office</option>
        
    </datalist>
</div>
                <label>Niveau</label>
                <div class="form-group"> 
                  <select name="niveaucompetence" class="form-control" required>
                    <option value="Bon">Bon</option>
                    <option value="Maitrisé">Maitrisé</option>
                    <option value="Moyen">Moyen</option>
                    <option value="Intermédaire">Intermédaire</option>
                    <option value="Débutant">Débutant</option>
                  </select>
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
                Nom
              </th>
              <th style="color:black">
                Niveau
              </th>

              <th class="text-right" style="color:black">
                Action
              </th>
            </thead>
            <tbody>
              @if($competence->count() > 0)
              @foreach($competence as $rs)
              <tr>
              
                <td>
                  {{ $rs->nomcompetence }}
                </td>
                <td>
                  {{ $rs->niveaucompetence }}
                </td>

                <td class="text-right">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button style=" background: white; border:none" data-toggle="modal" data-target="#exampleModalcom{{$rs->id}}" ><i class="fa fa-pencil"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalcom{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalcom{{$rs->id}}Label" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalcom{{$rs->id}}Label">Modifier la compétence</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form  method="POST" action="{{ route('competences.update', $rs->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <label>Nom de la compétence</label>
                              <div class="form-group">
                                <input type="text" class="form-control" name="nomcompetence" placeholder="intitulé de la compétence" value="{{ $rs->nomcompetence }}">
                              </div>
                              <label>Niveau</label>
                              <div class="form-group">
                                <select name="niveaucompetence" class="form-control" value="{{ $rs->niveaucompetence }}">
                                  <option value="{{ $rs->niveaucompetence }}">{{ $rs->niveaucompetence }}</option>
                                  <option value="Bon">Bon</option>
                                  <option value="Maitrisé">Maitrisé</option>
                                  <option value="Moyen">Moyen</option>
                                  <option value="Intermédaire">Intermédaire</option>
                    <option value="Débutant">Débutant</option>
                                </select>
                              </div>



                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary  btn-round" data-dismiss="modal">Fermer</button>

                            <button type="submit" class="btn btn-round btn-update-competence"  style="background-color: #035874;" data-id="{{ $rs->id }}">
                              Modifier
                            </button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <form action="{{ route('competences.destroy', $rs->id) }}" method="POST" type="button" onsubmit="return confirm('Delete?')">
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
                <td class="text-center" colspan="5">La liste des competences est vide</td>
              </tr>
              @endif

            </tbody>
          </table>
        </div>
        {{$competence->links('vendor.pagination.custom')}}
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


<script>
    document.addEventListener('DOMContentLoaded', e => {
        $('#input-datalist').autocomplete()
    }, false);
</script>



@endsection