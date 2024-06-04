@extends('layouts.appcandidatvip')
  
  
@section('contents')
  <div class="row">
  <div class="col-md-12">
  <div class="card">
   <div class=" p-4" >
   <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('formations') }}" style="color:black;">Formations</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('experiences') }}" style="color:black ;">Expériences</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('competences') }}" style="color:black;">Compétences</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('references') }}" style="color:black;" >Références</a>
    </li>
    <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('langues') }}" style="color:#325fa6;" >Langues</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('cvdetaillecandidat', auth()->user()->candidat->id) }}" style="color:#ef882b; " >CV Complet</a>
  </li>
  <li class="nav-item">
  <button class=" nav-link " style="background-color: #325FA6; color:white;" data-toggle="modal" data-target="#exampleModal">Ajouter une Langue</button> 

  </li>
  
</ul>
</div>
           <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une Langue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('langues.store') }}">
                    @csrf
                    <label>Nom de la langue </label>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="nomlangue" placeholder="nom langue">
                    </div>
                    <label>Niveau de la langue</label>
                    <div class="form-group">
                        <select name="niveaulangue" id="niveaulangue" class="form-control">
                            <option value="Bon">Bon</option>
                            <option value="Maitrisé"> Maitrisé</option>
                            <option value="Moyen">Moyen</option>
                            <option value="Academique"> Academique</option>
                        </select>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-round"   data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-round" style="background-color: #325fa6;">Ajouter </button>
      </div>
      </form>
    </div>
  </div>
</div><br>
        
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
                    @if($langue->count() > 0)
                @foreach($langue as $rs)
                      <tr>
                     
                        <td>
                        {{ $rs->nomlangue }}
                        </td>
                        <td>
                        {{ $rs->niveaulangue }}
                        </td>
                        
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                              <button style="background: white; border:none" data-toggle="modal" data-target="#exampleModalcom{{$rs->id}}"><i class="fa fa-pencil"></i></button>
                                <form action="{{ route('langues.destroy', $rs->id) }}" method="POST" type="button" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="" style="margin:5px; background: white; border:none"><i class="fa fa-trash" style="color: red; "></i></button>
                                </form>
                            </div>
                             <!-- Modal -->
                    <div class="modal fade" id="exampleModalcom{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalcom{{$rs->id}}Label" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalcom{{$rs->id}}Label">Modifier la  langue</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form  method="POST" action="{{ route('langues.update', $rs->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <label>Nom de la langue</label>
                              <div class="form-group">
                                <input type="text" class="form-control" name="nomlangue" placeholder="intitulé de la compétence" value="{{ $rs->nomlangue }}">
                              </div>
                              <label>Niveau</label>
                              <div class="form-group">
                                <select name="niveaulangue" class="form-control" value="{{ $rs->niveaulangue }}">
                                  <option value="{{ $rs->niveaulangue }}">{{ $rs->niveaulangue }}</option>
                                  <option value="Bon">Bon</option>
                                  <option value="Maitrisé">Maitrisé</option>
                                  <option value="Moyen">Moyen</option>
                                  <option value="Académique">Académique</option>
                   
                                </select>
                              </div>



                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary  btn-round" data-dismiss="modal">Fermer</button>

                            <button type="submit" class="btn btn-round btn-update-competence"  style="background-color: #325fa6;" data-id="{{ $rs->id }}">
                              Modifier
                            </button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                        </td>
                      </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des langues est vide</td>
                </tr>
            @endif
                     
                    </tbody>
                  </table>
                </div>
                {{$langue->links('vendor.pagination.custom')}}
              </div>
            </div>
          </div>
</div>
@endsection