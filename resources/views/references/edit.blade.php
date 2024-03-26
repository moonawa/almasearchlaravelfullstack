@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Modifier  </h4>
            </div>
            <div class="card-body ">
                <form method="POST" action="{{ route('references.update', $reference->id) }}" method="POST"> 
                @csrf
        @method('PUT')
                <label>Nom du referent</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nomreferent" placeholder="Nom"  value="{{ $reference->nomreferent }}">
                    </div>
                    <label>Mail du referent</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mailreferent" placeholder="awandiayesene7@gmail.com"  value="{{ $reference->mailreferent }}">
                    </div>
                  
                    <label>Téléphone </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="telephonereferent" placeholder="+221771301409"  value="{{ $reference->telephonereferent }}">
                    </div>
                   
                    <label>Poste </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="posteoccupereferent" placeholder="PDG"  value="{{ $reference->posteoccupereferent }}">
                    </div>
                    <label>Entreprise </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="entreprisereferent" placeholder="Entreprise"  value="{{ $reference->entreprisereferent }}">
                    </div>
                    <div class="card-footer ">
                <button type="submit" class="btn btn-info btn-round">Modifer</button>
            </div>
                </form>
            </div>
           
        </div>
    </div>

</div>

 
    @endsection