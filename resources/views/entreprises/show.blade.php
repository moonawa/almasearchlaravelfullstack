@extends('layouts.app')
  
  
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
                  

                    <button type="submit" class="btn btn-round" style="background-color: #325fa6;">
                                    {{ __('Télécharger') }}
                                </button>
                  </form>
                
                  <p class="title">
                    {{ $entreprise->user->name }}
                  </p>
               
                
                  <p >
                  Tel:    {{ $entreprise->user->telephone }}
                  </p>
                  <p >
                  Tel:    {{ $entreprise->user->email }}
                  </p>
                </div>

              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-6 ml-auto">
                      <h5>NINEA<br> <a href="/uploads/{{ $entreprise->ninea }}"><i class="fa fa-eye" style="color: #ef882b;"></i></a></h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 ml-auto mr-auto">
                      <h5>RC<br><a href="/uploads/{{ $entreprise->rc }}"><i class="fa fa-eye" style="color:#ef882b"></i></a></h5>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
              @if($entreprise->entreprise->logo)
                <img class="avatar border-gray" src=" /uploads/{{$entreprise->entreprise->logo }}" >
@endif
                <h4 class="card-title">Fichiers </h4>
               
              </div>
              
              <div class="card-body">
             
                <form action="{{ route('entreprises.rc') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <label for="ninea"> NINEA</label>
                    <input id="ninea" type="file" class="form-control @error('ninea') is-invalid @enderror" name="ninea"   autocomplete="ninea">
                  
                    <label for="rc">Régistre de Commerce </label>
                    <input id="rc" type="file" class="form-control @error('rc') is-invalid @enderror" name="rc"   autocomplete="rc">
                  
                    <button type="submit" class="btn btn-round" style="background-color:#325fa6;">
                                    {{ __('Télécharger') }}
                                </button>
                  </form>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title"> Modifier Votre mot de passe</h5>
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
                      <button class="btn btn-round" type="submit" style="background-color:#325fa6;">Modifier </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title"> Modifier les informations de l'entreprise</h5>
              </div>
              <div class="card-body">
              <form action="{{ route('entreprises.update' ) }}" method="POST" enctype="multipart/form-data"> 
                              @csrf
                      @method('PUT')
                            
                      @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
                <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nom de l' entreprise </label>
                        <input type="text" class="form-control"  placeholder="Nom" value="{{ $entreprise->entreprise->nomentreprise }}" name="nomentreprise">
                      </div>
                    </div>
                  
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" class="form-control"  value="{{ $entreprise->entreprise->emailese }}" name="emailese">
                      </div>
                    </div>
                  </div>
               
                 
                
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Téléphone </label>
                        <input type="text" class="form-control"  value="{{ $entreprise->entreprise->tel }}" name="tel">
                      </div>
                      </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Secteur d'activité </label>
                        <input type="text" class="form-control"  name="secteuractivite" value="{{ $entreprise->entreprise->secteuractivite }}">
                      </div>
                      </div>
                     
                      </div>

                      <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control"  name="des" > {{ $entreprise->entreprise->des }} </textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="logo"> Logo</label>
                        <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo"   autocomplete="logo">


                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button class="btn btn-round" type="submit" style="background-color:#325fa6;">Modifier </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection