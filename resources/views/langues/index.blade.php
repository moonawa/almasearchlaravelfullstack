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
    <a class="nav-link active" aria-current="page" href="{{ route('langues') }}" style="color:#035874;" >Langues</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('cvdetaillecandidat', auth()->user()->candidat->id) }}" style="color:#7ac9e8; " >CV Complet</a>
  </li>
  <li class="nav-item">
  <button class=" nav-link " style="background-color: #035874; color:white;" data-toggle="modal" data-target="#exampleModal">Ajouter une Langue</button> 

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
                        <select id="language" required class="form-control" name="nomlangue">
    <option value="">Sélectionner une langue</option>
    <option value="Afrikaans">Afrikaans</option>
    <option value="Albanais">Albanais</option>
    <option value="Allemand">Allemand</option>
    <option value="Amharique">Amharique</option>
    <option value="Anglais">Anglais</option>
    <option value="Arabe">Arabe</option>
    <option value="Arménien">Arménien</option>
    <option value="Assamais">Assamais</option>
    <option value="Azerbaïdjanais">Azerbaïdjanais</option>
    <option value="Basque">Basque</option>
    <option value="Bengali">Bengali</option>
    <option value="Biélorusse">Biélorusse</option>
    <option value="Birman">Birman</option>
    <option value="Bosniaque">Bosniaque</option>
    <option value="Bulgare">Bulgare</option>
    <option value="Catalan">Catalan</option>
    <option value="Cebuano">Cebuano</option>
    <option value="Chichewa">Chichewa</option>
    <option value="Chinois">Chinois</option>
    <option value="Coréen">Coréen</option>
    <option value="Corse">Corse</option>
    <option value="Créole haïtien">Créole haïtien</option>
    <option value="Croate">Croate</option>
    <option value="Danois">Danois</option>
    <option value="Espagnol">Espagnol</option>
    <option value="Espéranto">Espéranto</option>
    <option value="Estonien">Estonien</option>
    <option value="Filipino">Filipino</option>
    <option value="Finnois">Finnois</option>
    <option value="Français">Français</option>
    <option value="Frison">Frison</option>
    <option value="Galicien">Galicien</option>
    <option value="Gallois">Gallois</option>
    <option value="Géorgien">Géorgien</option>
    <option value="Grec">Grec</option>
    <option value="Gujarati">Gujarati</option>
    <option value="Hausa">Hausa</option>
    <option value="Hawaïen">Hawaïen</option>
    <option value="Hébreu">Hébreu</option>
    <option value="Hindi">Hindi</option>
    <option value="Hongrois">Hongrois</option>
    <option value="Islandais">Islandais</option>
    <option value="Igbo">Igbo</option>
    <option value="Indonésien">Indonésien</option>
    <option value="Irlandais">Irlandais</option>
    <option value="Italien">Italien</option>
    <option value="Japonais">Japonais</option>
    <option value="Javanais">Javanais</option>
    <option value="Kannada">Kannada</option>
    <option value="Kazakh">Kazakh</option>
    <option value="Khmer">Khmer</option>
    <option value="Kirghiz">Kirghiz</option>
    <option value="Kurde">Kurde</option>
    <option value="Laotien">Laotien</option>
    <option value="Latin">Latin</option>
    <option value="Letton">Letton</option>
    <option value="Lituanien">Lituanien</option>
    <option value="Luxembourgeois">Luxembourgeois</option>
    <option value="Macédonien">Macédonien</option>
    <option value="Malais">Malais</option>
    <option value="Malayalam">Malayalam</option>
    <option value="Maltais">Maltais</option>
    <option value="Maori">Maori</option>
    <option value="Marathi">Marathi</option>
    <option value="Mongol">Mongol</option>
    <option value="Néerlandais">Néerlandais</option>
    <option value="Népalais">Népalais</option>
    <option value="Norvégien">Norvégien</option>
    <option value="Ouzbek">Ouzbek</option>
    <option value="Pachto">Pachto</option>
    <option value="Persan">Persan</option>
    <option value="Polonais">Polonais</option>
    <option value="Portugais">Portugais</option>
    <option value="Roumain">Roumain</option>
    <option value="Russe">Russe</option>
    <option value="Samoan">Samoan</option>
    <option value="Serbe">Serbe</option>
    <option value="Shona">Shona</option>
    <option value="Sindhi">Sindhi</option>
    <option value="Slovaque">Slovaque</option>
    <option value="Slovène">Slovène</option>
    <option value="Somali">Somali</option>
    <option value="Soundanais">Soundanais</option>
    <option value="Suédois">Suédois</option>
    <option value="Swahili">Swahili</option>
    <option value="Tadjik">Tadjik</option>
    <option value="Tamoul">Tamoul</option>
    <option value="Tchèque">Tchèque</option>
    <option value="Télougou">Télougou</option>
    <option value="Thaï">Thaï</option>
    <option value="Turc">Turc</option>
    <option value="Ukrainien">Ukrainien</option>
    <option value="Ourdou">Ourdou</option>
    <option value="Vietnamien">Vietnamien</option>
    <option value="Xhosa">Xhosa</option>
    <option value="Yiddish">Yiddish</option>
    <option value="Yoruba">Yoruba</option>
    <option value="Zoulou">Zoulou</option>
</select>

                    </div>
                    <label>Niveau de la langue</label>
                    <div class="form-group">
                        <select name="niveaulangue" id="niveaulangue" class="form-control">
                            <option value="Débutant">Débutant</option>
                            <option value="Intermédiaire"> Intermédiaire</option>
                            <option value="Courant">Courant</option>
                            <option value="Avancé"> Avancé</option>
                        </select>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-round"   data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-round" style="background-color: #035874;">Ajouter </button>
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
                                  <option value="Débutant">Débutant</option>
                                  <option value="Intermédiaire">Intermédiaire</option>
                                  <option value="Courant">Courant</option>
                                  <option value="Avancé">Avancé</option>
                   
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