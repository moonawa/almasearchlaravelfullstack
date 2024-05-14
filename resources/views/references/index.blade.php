@extends('layouts.appcandidatvip')
  
  
@section('contents')
  <div class="row">
  <div class="col-md-12">
  <div class="card">
   <div class="row p-4" >
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
    <a class="nav-link active" aria-current="page" href="{{ route('references') }}" style="color:#325fa6;" >Références</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="{{ route('langues') }}" style="color:black;" >Langues</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('cvdetaillecandidat', auth()->user()->candidat->id) }}" style="color:#ef882b; " >CV Complet</a>
  </li>
  <li class="nav-item">
  <button class=" nav-link " style="background-color: #325FA6; color:white;" data-toggle="modal" data-target="#exampleModal">Ajouter une Référence</button> 

  </li>
  
</ul>
  
</div>
           <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une Référence</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('references.store') }}">
                @csrf
                <label>Nom de la reference</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nomreferent" placeholder="Nom">
                    </div>
                    <label>Mail de la reference</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mailreferent" placeholder="awandiayesene7@gmail.com">
                    </div>
                  
                    <label>Téléphone </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="telephonereferent" placeholder="+221771301409">
                    </div>
                   
                    <label>Poste </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="posteoccupereferent" placeholder="PDG">
                    </div>
                    <label>Entreprise </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="entreprisereferent" placeholder="Entreprise">
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-round" style="background-color: #325fa6;"> Ajouter</button>
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
                        Mail
                      </th>
                      <th style="color:black">
                        Téléphone
                      </th>
                      <th style="color:black">
                        Poste
                      </th>
                      <th style="color:black">
                        Entreprise
                      </th>
                      <th class="text-right" style="color:black">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @if($reference->count() > 0)
                @foreach($reference as $rs)
                      <tr>
                      <td>
                      {{ $loop->iteration }}
                        </td>
                        <td>
                        {{ $rs->nomreferent }}
                        </td>
                        <td>
                        {{ $rs->mailreferent }}
                        </td>
                        <td>
                        {{ $rs->telephonereferent }}
                        </td>
                        <td>
                        {{ $rs->posteoccupereferent }}
                        </td>
                        <td>
                        {{ $rs->entreprisereferent }}
                        </td>
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                               <button style="background: white; border:none" data-toggle="modal" data-target="#exampleModalcom{{$rs->id}}"><i class="fa fa-pencil"></i></button>
                                <form action="{{ route('references.destroy', $rs->id) }}" method="POST" type="button"  onsubmit="return confirm('Delete?')">
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
                            <h5 class="modal-title" id="exampleModalcom{{$rs->id}}Label">Modifier la référence</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form  method="POST" action="{{ route('references.update', $rs->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <label>Nom de la reference</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nomreferent" placeholder="Nom" value="{{$rs->nomreferent}}">
                    </div>
                    <label>Mail de la reference</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mailreferent" placeholder="awandiayesene7@gmail.com" value="{{$rs->mailreferent}}">
                    </div>
                  
                    <label>Téléphone </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="telephonereferent" placeholder="+221771301409" value="{{$rs->telephonereferent}}">
                    </div>
                   
                    <label>Poste </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="posteoccupereferent" placeholder="PDG" value="{{$rs->posteoccupereferent}}">
                    </div>
                    <label>Entreprise </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="entreprisereferent" placeholder="Entreprise" value="{{$rs->entreprisereferent}}">
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
                    <td class="text-center" colspan="5">La liste des réferences est vide</td>
                </tr>
            @endif
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
</div>
@endsection