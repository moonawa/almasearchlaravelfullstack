@extends('layouts.appcabinet')
  
  
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
                <img class="avatar border-gray" src=" /avatars/{{ Auth::user()->avatar }}" >
                @endif
                
                <form action="{{ route('candidatvip.shows') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar"  required autocomplete="avatar">
                  

                    <button type="submit" class="btn  btn-round" style="background-color: #325fa6;">
                                    {{ __('Télécharger') }}
                                </button>
                  </form>
                
                  <p class="title">
                    {{ $cabinet->user->name }}
                  </p>
               
                
                  <p >
                  Tel:    {{ $cabinet->user->telephone }}
                  </p>
                  <p >
                  Tel:    {{ $cabinet->user->email }}
                  </p>
                </div>

              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-6 ml-auto">
                      <h5>NINEA<br> <a href="/uploads/{{ $cabinet->nineacabinet }}"><i class="fa fa-eye" style="color: #ef882b;"></i></a></h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 ml-auto mr-auto">
                      <h5>RC<br><a href="/uploads/{{ $cabinet->rccabinet }}"><i class="fa fa-eye" style="color: #ef882b;"></i></a></h5>
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
             
                <form action="{{ route('cabinets.ninea') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <label for="nineacabinet"> NINEA</label>
                    <input id="nineacabinet" type="file" class="form-control @error('nineacabinet') is-invalid @enderror" name="nineacabinet"   autocomplete="nineacabinet">
                  
                    <label for="rccabinet">Régistre de Commerce </label>
                    <input id="rccabinet" type="file" class="form-control @error('rccabinet') is-invalid @enderror" name="rccabinet"   autocomplete="rccabinet">
                  
                    <button type="submit" class="btn  btn-round" style="background-color: #325fa6;">
                                    {{ __('Télécharger') }}
                                </button>
                  </form>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title"> Modifier le mot de passe</h5>
              </div>
              <div class="card-body">
             
<div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Nom du cabinet </label>
                        <input type="text" class="form-control" disabled="" placeholder="Nom" value="{{ $cabinet->user->name }}">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Téléphone</label>
                       
                        <input type="text" class="form-control" placeholder="771301409" disabled="" value="{{ $cabinet->user->telephone }}">
                      </div>
                    </div>
                    <div class="col-md-5 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" class="form-control" disabled="" value="{{ $cabinet->user->email }}">
                      </div>
                    </div>
                  </div>
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
                        <input type="password" class="form-control"  name="current_password" >
                      </div>
                    </div>
                  </div>
                
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nouveau mot de passe</label>
                        <input type="password" class="form-control"  name="password" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Confirmer le nouveau mot de passe</label>
                        <input type="password" class="form-control"  name="password_confirmation" >
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