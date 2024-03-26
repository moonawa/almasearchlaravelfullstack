@extends('layouts.appcabinet')


@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Ajouter un candidat </h4>
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
                <form method="POST" action="{{ route('cabinets.candidat') }}" enctype="multipart/form-data">
                @csrf
                <label>Nom </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Nom">
                    </div>
                   
                    <label>Genre </label>
                    <div class="form-group">
                    <select name="genre" id="genre" class="form-control">
                            <option value="Homme">Homme</option>
                            <option value="Femme"> Femme</option>
                    </select>
                    </div>
                    <label>Date de naissance </label>
                    <div class="form-group">
                        <input type="date" class="form-control" name="birthday" placeholder="12-12-1998">
                    </div>
                    <label>Mail </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="awandiayesene7@gmail.com">
                    </div>
                  
                    <label>Téléphone </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="telephone" placeholder="+221771301409">
                    </div>
                   
                    <label>Fonction </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="fonction" placeholder="fonction">
                    </div>
                    
                    <label>Disponibilité </label>
                    <div class="form-group">
                    <select name="disponibilite" id="disponibilite" class="form-control">
                            <option value="Immédaite">Immédaite</option>
                            <option value="Dans un mois">Dans un mois</option>
                            <option value="Dans deux mois">Dans deux mois</option>
                        </select>     
                   </div>
                   <label>Nationnalité </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nationnalite" placeholder="nationnalite">
                    </div>
                   <label>CV </label>
                    <input id="cv" type="file" required class="form-control " name="cv"   autocomplete="cv" />
              
                    <div class="card-footer ">
                <button type="submit" class="btn btn-round" style="background-color:  #325fa6;">Ajouter</button>
            </div>
                </form>
            </div>
           
        </div>
    </div>

</div>

 
    @endsection