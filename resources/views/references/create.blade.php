@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Ajouter une reference </h4>
            </div>
            <div class="card-body ">
                <form method="POST" action="{{ route('references.store') }}">
                @csrf
                <label>Nom du referent</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nomreferent" placeholder="Nom">
                    </div>
                    <label>Mail du referent</label>
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
                    <div class="card-footer ">
                <button type="submit" class="btn btn-info btn-round" style="background-color: blue;">Ajouter</button>
            </div>
                </form>
            </div>
           
        </div>
    </div>

</div>

 
    @endsection