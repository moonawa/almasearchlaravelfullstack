@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Ajouter une expérience </h4>
            </div>
            <div class="card-body ">
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
                    <div class="card-footer ">
                <button type="submit" class="btn btn-info btn-round" style="background-color: blue;">Ajouter</button>
            </div>
                </form>
            </div>
           
        </div>
    </div>

</div>

 
    @endsection