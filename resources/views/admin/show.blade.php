@extends('layouts.appadmin')


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
              {{ __('Photo de Profil') }}
            </button>
          </form>

          <p class="title">
             {{ $user->name }}
          </p>
          <p>
            {{ $user->telephone }}
          </p>
          <p>
            {{ $user->email }}
          </p>
          <p>
            Tel: {{ $user->telephone }}
          </p>
          <p>
            Fonction: {{ $user->posteuser }}
          </p>
        </div>

      </div>
  <!--    <div class="card-footer">
        <hr>
        <div class="button-container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-6 ml-auto">
              <h5>CV<br> <a href="/uploads/{{ $user->cv }}"><i class="fa fa-eye" style="color:#ef8938"></i></a></h5>
            </div>
            <div class="col-lg-6 col-md-6 col-6 ml-auto mr-auto">
              <h5>Motivation<br><a href="/uploads/{{ $user->motivation }}"><i class="fa fa-eye" style="color:#ef8938"></i></a></h5>
            </div>

          </div>
        </div>
      </div> -->
    </div>
   <!--   <div class="card">
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

          <button type="submit" class="btn  btn-round" style="background-color: #325fa6;">
            {{ __('Télécharger') }}
          </button>
        </form>
      </div>
    </div>-->
  </div>
  <div class="col-md-8">
    
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