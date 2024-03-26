@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Ajouter une langue </h4>
            </div>
            <div class="card-body ">
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
                            <option value="Excellent"> Excellent</option>
                            <option value="Moyen">Moyen</option>
                            <option value="Academique"> Academique</option>
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