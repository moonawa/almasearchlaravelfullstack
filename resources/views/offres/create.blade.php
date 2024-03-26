@extends('layouts.app')


@section('contents')
<div class="row">
    <div class="col-md-8">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Ajouter une offre </h4>
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
                <form method="POST" action="{{ route('offres.store') }}">
                @csrf
                <div class="row">
                <div class="col-md-6 pr-1">
                <label>Nom poste</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nomposte" placeholder="Developpeur web H/F">
                    </div>
                    </div>
                    <div class="col-md-6 px-1">
                    <label>Nombre de poste </label>
                    <div class="form-group">
                        <input type="number" class="form-control" name="nombredeposte" placeholder="5">
                    </div>
                    </div>
                    </div>
                    <label>Description</label>
                    <div class="form-group">
                        <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                  
                   
                    <label>Compétences Requises   </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="competenceoffre" >
                    </div>

                    <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Année d'expérience </label>
                    <div class="form-group">
                        <select name="annexperience" id="annexperience" class="form-control">
                        <option value="Pas d'expérience requise">Pas d'expérience requise</option>
                            <option value="-1an">-1an</option>
                            <option value="+1ans">+1an</option>
                            <option value="+2ans">+2ans</option>
                            <option value="+3ans">+3ans</option>
                            <option value="+4ans">+4ans</option>
                            <option value="+5ans">+5ans</option>
                            <option value="+10ans">+10ans</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6 pr-1">
                    <label>Salaire  </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="salaire" placeholder="500000">
                    </div>
                    </div>
                    </div>
                   

                    <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Date de prise de fonction  </label>
                    <div class="form-group">
                        <input type="date" class="form-control" name="datedebut" >
                    </div>
                   
                    </div>
                    <div class="col-md-6 pr-1">
                    <label>Date Clôture  </label>
                    <div class="form-group">
                        <input type="date" class="form-control" name="datecloture" >
                    </div>
                    </div>
                    </div>
                    <div class="row">
                <div class="col-md-6 pr-1">
                    <label>Type de contrat </label>
                    <div class="form-group">
                        <select name="typecontrat" id="typecontrat" class="form-control">
                        <option value="Stage">Stage</option>
                            <option value="CDD">CDD</option>
                            <option value="CDI">CDI</option>
                            <option value="Prestation">Prestation</option>
                           
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6 pr-1">
                    <label>Lieu   </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lieu" placeholder="Dakar, remote" >
                    </div>
                    </div>
                    </div>
                    
                    
               
                    <div class="card-footer ">
                <button type="submit" class="btn btn-info btn-round" style="background-color: #325fa6;">Ajouter</button>
            </div>
                </form>
            </div>
           
        </div>
    </div>

</div>

 
    @endsection