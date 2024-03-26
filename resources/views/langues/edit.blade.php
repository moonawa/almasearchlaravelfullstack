@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Modifer  </h4>
            </div>
            <div class="card-body ">
                <form method="POST" action="{{ route('langues.update', $langue->id) }}" method="POST"> 
                @csrf
        @method('PUT')
                    <label>Nom de la langue </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nomlangue" placeholder="nom langue" value="{{ $langue->nomlangue }}">
                    </div>
                    <label>Niveau de la langue</label>
                    <div class="form-group">
                        <select name="niveaulangue" id="niveaulangue" class="form-control" value="{{ $langue->niveaulangue }}">
                            <option value="bon">Bon</option>
                            <option value="excellent"> Excellent</option>
                            <option value="moyen">Moyen</option>
                            <option value="academique"> Academique</option>
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