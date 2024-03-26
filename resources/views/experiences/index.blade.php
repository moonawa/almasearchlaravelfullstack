@extends('layouts.appcandidatvip')
  
  
@section('contents')
  <div class="row">
  <div class="col-md-12">
  <div class="card">
   <div class="row p-4" >
    <div class="col-md-2"><a href="{{ route('formations') }}" style=" color:black; text-decoration: none;">Formations</a></div>
    <div class="col-md-2"><a href="{{ route('experiences') }}" style="background-color: #ef882b; color:white; padding-left: 15px; padding-right: 15px; padding-top: 5px; padding-bottom: 5px; border-radius:20px; text-decoration: none;">Expériences</a></div>
    <div class="col-md-2"><a href="{{ route('competences') }}" style=" color:black;  text-decoration: none;">Compétences</a> </div>
    <div class="col-md-2"> <a href="{{ route('references') }}" style=" color:black; text-decoration: none;">Références</a></div>
    <div class="col-md-2"> <a href="{{ route('langues') }}" style=" color:black; text-decoration: none;">Langues</a></div>
    <div class="col-md-2"><a   style="background-color: #325fa6; padding-left: 15px;  padding-right: 15px; padding-top: 5px; padding-bottom: 5px; color:white; border-radius:20px; text-decoration: none;  text-decoration: none;" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
    <br><br>
      <a  style="background-color: #ef882b; padding-left: 15px;  padding-right: 15px; padding-top: 5px; padding-bottom: 5px; color:white; border-radius:20px; text-decoration: none;  text-decoration: none;" href="{{ route('cvdetaillecandidat', auth()->user()->candidat->id) }}">CV </a>
  </div>
  
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une expérience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('experiences.store') }}">
                @csrf
                <label>Poste</label>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="posteexperience" placeholder="intitulé du poste">
                    </div>
                    <label>Mission</label>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="missionexperience" placeholder="mission">
                    </div>
                  
                    <label>Entreprise </label>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="entrepriseexperience" placeholder="nom de l'entreprise">
                    </div>
                   
                    <label>Date Début</label>
                    <div class="form-group">
                        <input type="date" required class="form-control" name="datedebutexperience">
                    </div>
                    <label>Date fin</label>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="datefinexperience" placeholder="2023 ou  Jusqu'à aujourd'hui">
                    </div>
                   <!--  <div class="card-footer ">
                <button type="submit" class="btn btn-info btn-round" style="background-color: #325fa6;">Ajouter</button>
            </div>
             
                    
                   <div class="card-footer ">
                <button type="submit" class="btn btn-info btn-round" style="background-color: #325fa6;">Ajouter</button>
            </div> -->
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-round"  data-dismiss="modal">Fermer</button>
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
              <br><br>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th style="color:black">
                        #
                      </th>
                      <th style="color:black">
                        Entreprise
                      </th>
                      <th style="color:black">
                        Mission
                      </th>
                      <th style="color:black">
                        Poste
                      </th>
                      <th style="color:black">
                        Début
                      </th>
                      <th style="color:black">
                        Date fin
                      </th>
                      <th class="text-right" style="color:black">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @if($experience->count() > 0)
                @foreach($experience as $rs)
                      <tr>
                      <td>
                      {{ $loop->iteration }}
                        </td>
                        <td>
                        {{ $rs->entrepriseexperience }}
                        </td>
                        <td>
                        {{ $rs->missionexperience }}
                        </td>
                        <td>
                        {{ $rs->posteexperience }}
                        </td>
                        <td>
                        {{ $rs->datedebutexperience }}
                        </td>
                        <td>
                        {{ $rs->datefinexperience }}
                        </td>
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                              <button style=" background: white; border:none" data-toggle="modal" data-target="#exampleModalexp{{$rs->id}}"><i class="fa fa-pencil"></i></button>
                                <!-- Modal -->
<div class="modal fade" id="exampleModalexp{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalexp{{$rs->id}}Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalexp{{$rs->id}}Label">Modifier l'expérience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('experiences.update', $rs->id) }}" method="POST"> 
                @csrf
        @method('PUT')
                <label>Poste</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="posteexperience" placeholder="intitulé du poste" value="{{ $rs->posteexperience }}">
                    </div>
                    <label>Mission</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="missionexperience" placeholder="mission" value="{{ $rs->missionexperience }}">
                    </div>
                  
                    <label>Entreprise </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="entrepriseexperience" placeholder="nom de l'entreprise" value="{{ $rs->entrepriseexperience }}">
                    </div>
                   
                    <label>Date Début</label>
                    <div class="form-group">
                        <input type="date" class="form-control" name="datedebutexperience" value="{{ $rs->datedebutexperience }}">
                    </div>
                    <label>Date fin</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="datefinexperience" placeholder="2023 ou  Jusqu'à aujourd'hui" value="{{ $rs->datefinexperience }}">
                    </div>
                    
               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary  btn-round " data-dismiss="modal">Fermer</button>
        <button type="subimit" class="btn btn-primary  btn-round" style="background-color: #325fa6;">Modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>
                                <form action="{{ route('experiences.destroy', $rs->id) }}" method="POST" type="button"  onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="5">La liste des experiences est vide</td>
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