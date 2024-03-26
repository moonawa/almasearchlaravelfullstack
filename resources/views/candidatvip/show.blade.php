@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
  <div class="col-md-4">
    <div class="card card-user">
      <div class="image">
        <img src="{{ asset('admin/img/bg5.jpg') }}" alt="...">
      </div>
      <div class="card-body">
        <div class="author">
          @if (!Auth::user()->avatar)
          <img class="avatar border-gray" src=" {{ asset('admin/img/default-avatar.png') }}" alt="...">

          @else ( Auth::user()->avatar)
          <img class="avatar border-gray" src=" /avatars/{{ Auth::user()->avatar }}">
          @endif

          <form action="{{ route('candidatvip.shows') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
            @endif
            <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" required autocomplete="avatar">


            <button type="submit" class="btn  btn-round" style="background-color: #325fa6;">
              {{ __('Télécharger') }}
            </button>
          </form>

          <p class="description">
            @ {{ $can->user->name }}
          </p>
          <p>
            {{ $can->genre }}
          </p>
          <p>
            {{ $can->nationnalite }}
          </p>
          <p>
            Tel: {{ $can->user->telephone }}
          </p>
        </div>

      </div>
      <div class="card-footer">
        <hr>
        <div class="button-container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-6 ml-auto">
              <h5>CV<br> <a href="/uploads/{{ $can->cv }}"><i class="fa fa-eye" style="color: #ef8938"></i></a></h5>
            </div>
            <div class="col-lg-6 col-md-6 col-6 ml-auto mr-auto">
              <h5>Motivation<br><a href="/uploads/{{ $can->motivation }}"><i class="fa fa-eye" style="color: #ef8938"></i></a></h5>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Fichiers</h4>
      </div>

      <div class="card-body">

        <form action="{{ route('candidatvip.cvs') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @endif
          <label for="cv"> CV</label>
          <input id="cv" type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" autocomplete="cv">

          <label for="motivation">Lettre de motivation </label>
          <input id="motivation" type="file" class="form-control @error('motivation') is-invalid @enderror" name="motivation" autocomplete="motivation">

          <button type="submit" class="btn btn-round" style="background-color: #325fa6;">
            {{ __('Télécharger') }}
          </button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title"> Profil</h5>
      </div>
      <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('candidatvip.update', $can->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-5 pr-1">
              <div class="form-group">
                <label>Nom </label>
                <input type="text" class="form-control" disabled="" placeholder="Nom" value="{{ $can->user->name }}">
              </div>
            </div>
            <div class="col-md-2 px-1">
              <div class="form-group">
                <label>Age</label>
                @php
                $birthday = $can->birthday;
                $age = $birthday ? \Carbon\Carbon::parse($birthday)->age : null;
                @endphp
                <input type="text" class="form-control" placeholder="Age" disabled="" value="{{ $age }}ans">
              </div>
            </div>
            <div class="col-md-5 pl-1">
              <div class="form-group">
                <label for="exampleInputEmail1">Email </label>
                <input type="email" class="form-control" disabled="" value="{{ $can->user->email }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Permis de Conduire </label>
                <input type="text" class="form-control" name="permisconduire" placeholder="A1, B" value="{{ $can->permisconduire }}">
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Handicap /Maladie </label>
                <input type="text" class="form-control" placeholder="Handicap /Maladie" name="handicap" value="{{ $can->handicap }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Adresse</label>
                <input type="text" class="form-control" placeholder=" residence" name="residence" value="{{ $can->residence }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <label>Fonction</label>
                <input type="text" class="form-control" placeholder="Fonction" name="fonction" value="{{ $can->fonction }}">
              </div>
            </div>
            <div class="col-md-4 px-1">
              <div class="form-group">
                <label>Disponibilité</label>
                <select name="disponibilite" class="form-control">
                  <option value="{{ $can->disponibilite }}">{{ $can->disponibilite }}</option>
                  <option value="Immédiate">Immédiate</option>
                  <option value="Négociable">Négociable</option>
                  <option value="Dans un mois">Dans un mois</option>
                  <option value="Dans trois mois">Dans trois mois</option>

                </select>
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label>Situation Matrimonaile </label>
                <input type="text" class="form-control" placeholder="Situation Matrimonaile" name="situationmatrimonaile" value="{{ $can->situationmatrimonaile }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Lieu de Mobilité</label>
                <input type="text" class="form-control" placeholder=" Dakar, Saint-louis, France" name="lieudemobilite" value="{{ $can->lieudemobilite }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Accroche </label>
                <textarea name="accroche" placeholder="Oh so, your weak rhyme You doubt I'll bother, reading into it" class="form-control textarea">{{ $can->accroche }}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="update ml-auto mr-auto">
              <button class="btn  btn-round" type="submit" style="background-color: #325fa6;">Modifier </button>
            </div>
          </div>
        </form>



      </div>

    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Modifier le Mot de passe</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('cabinets.update') }}" method="POST">
          @csrf
          @method('PUT')

          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Mot de passe actuel</label>
                <input type="password" class="form-control" name="current_password">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nouveau mot de passe</label>
                <input type="password" class="form-control" name="password">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Confirmer le nouveau mot de passe</label>
                <input type="password" class="form-control" name="password_confirmation">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="update ml-auto mr-auto">
              <button class="btn  btn-round" type="submit" style="background-color: #325fa6;">Modifier </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection