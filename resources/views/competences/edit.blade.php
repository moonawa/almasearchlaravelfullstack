@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Modifier  </h4>
            </div>
            <div class="card-body ">
                <form method="POST" action="{{ route('competences.update', $competence->id) }}" method="POST"> 
                @csrf
        @method('PUT')
                <label>Nom de la compétence</label>
                    <div class="form-group">
                        <input type="text"  class="form-control" name="nomcompetence" placeholder="intitulé de la compétence" value="{{ $competence->nomcompetence }}">
                    </div>
                    <label>Niveau</label>
                    <div class="form-group">
                        <select name="niveaucompetence"  class="form-control" value="{{ $competence->niveaucompetence }}">
                            <option value="Bon">Bon</option>
                            <option value="Maitrisé">Maitrisé</option>
                            <option value="Moyen">Moyen</option>
                        </select>
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