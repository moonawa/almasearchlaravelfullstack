@extends('layouts.app')


@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Modifier  </h4>
            </div>
            <div class="card-body ">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form method="POST" action="{{ route('offres.update', $offre->id) }}" method="POST"> 
                @csrf
        @method('PUT')
        @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @endif
                <label>Nom </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nomposte" placeholder="Nom du poste"  value="{{ $offre->nomposte }}">
                    </div>
                    <label>Description</label>
                    <div class="form-group">
                      <textarea class="form-control" name="description" id="description" cols="30" rows="10"  value="{{ $offre->description }}"> </textarea> 
                    </div>
                  
                    <label>Nombre de poste </label>
                    <div class="form-group">
                        <input type="number" class="form-control" name="nombredeposte" placeholder="1"  value="{{ $offre->nombredeposte }}">
                    </div>
                   
                    <label>Année d'experience </label>
                    <div class="form-group">
                        <input type="number" class="form-control" name="annexperience" placeholder="2"  value="{{ $offre->annexperience }}">
                    </div>
                    <label>Salaire </label>
                    <div class="form-group">
                        <input type="number" class="form-control" name="salaire" placeholder="200000"  value="{{ $offre->salaire }}">
                    </div>
                    <label>Date debut </label>
                    <div class="form-group">
                        <input type="date" class="form-control" name="datedebut"   value="{{ $offre->datedebut }}">
                    </div>
                    <label>Lieu  </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lieu"   value="{{ $offre->lieu }}">
                    </div>
                    <label>Type de Contrat  </label>
                    <div class="form-group">
                        <select name="typecontrat" id="typecontrat"  class="form-control" value="{{ $offre->typecontrat }}">
                        <option value="Stage">Stage</option>
                            <option value="CDD">CDD</option>
                            <option value="CDI">CDI</option>
                            <option value="Prestation">Prestation</option>
                        </select>  
                  </div>
                  <label>Date de clôture  </label>
                    <div class="form-group">
                        <input type="date" class="form-control" name="datecloture"   value="{{ $offre->datecloture }}">
                    </div>
                    <label>Compétences Requises </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="competenceoffre"   value="{{ $offre->competenceoffre }}">
                    </div>
                    <div class="card-footer ">
                <button type="submit" class="btn btn-round" style="background: #325fa6;">Modifer</button>
            </div>
                </form>
            </div>
           
        </div>
    </div>

</div>

 
    @endsection