@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Ajouter une compétence </h4>
            </div>
            <div class="card-body ">
                <form method="POST" action="{{ route('competences.store') }}">
                @csrf
                <label>Nom de la compétence</label>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="nomcompetence" placeholder="intitulé de la compétence">
                    </div>
                    <label>Niveau</label>
                    <div class="form-group">
                        <select name="niveaucompetence" required class="form-control">
                            <option value="Bon">Bon</option>
                            <option value="Maitrisé">Maitrisé</option>
                            <option value="Moyen">Moyen</option>
                        </select>
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