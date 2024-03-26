@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Modifier  </h4>
            </div>
            <div class="card-body ">
                <form method="POST" action="{{ route('experiences.update', $experience->id) }}" method="POST"> 
                @csrf
        @method('PUT')
                <label>Poste</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="posteexperience" placeholder="intitulé du poste" value="{{ $experience->posteexperience }}">
                    </div>
                    <label>Mission</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="missionexperience" placeholder="mission" value="{{ $experience->missionexperience }}">
                    </div>
                  
                    <label>Entreprise </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="entrepriseexperience" placeholder="nom de l'entreprise" value="{{ $experience->entrepriseexperience }}">
                    </div>
                   
                    <label>Date Début</label>
                    <div class="form-group">
                        <input type="date" class="form-control" name="datedebutexperience" value="{{ $experience->datedebutexperience }}">
                    </div>
                    <label>Date fin</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="datefinexperience" placeholder="2023 ou  Jusqu'à aujourd'hui" value="{{ $experience->datefinexperience }}">
                    </div>
                    <div class="card-footer">
                <button type="submit" class="btn btn-info btn-round">Modifier</button>
            </div>
                </form>
            </div>
           
        </div>
    </div>

</div>

 
    @endsection