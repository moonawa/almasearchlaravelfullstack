@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Modifer  </h4>
            </div>
            <div class="card-body ">
                <form method="POST" action="{{ route('formations.update' , $formation->id) }}" method="POST"> 
                @csrf
        @method('PUT')
                <label>Nom de la formation</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nomformation" placeholder="intitulé de la formation"  value="{{ $formation->nomformation }}">
                    </div>
                    <label>Etablissement</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="etablissementformation" placeholder="Ecole" value="{{ $formation->etablissementformation }}">
                    </div>
                  
                    <label>Année académique </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="anneeacademique" placeholder="Ex: 2023/2024" value="{{ $formation->anneeacademique }}">
                    </div>
                   
                    <label> Niveau</label>
                    <div class="form-group">
                        <select name="niveauformation" class="form-control"  value="{{ $formation->niveauformation }}">
                        <option value="BFEM">BFEM</option>  
                        <option value="BAC">BAC</option>                  
                        <option value="Licence">Licence</option>                  
                        <option value="Master">Master</option>                  
                        <option value="Doctorat">Doctorat</option>                  
                

                        </select>
  </div>
                    
                    <div class="card-footer ">
                <button type="submit" class="btn btn-info btn-round">Modifier</button>
            </div>
                </form>
            </div>
           
        </div>
    </div>

</div>

 
    @endsection