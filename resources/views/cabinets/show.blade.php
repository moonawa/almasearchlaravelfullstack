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
                                    {{ __('Photo de Profil') }}
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
                <h5 class="card-title"> Logo du cabinet</h5>
              </div>
              <div class="card-body">
              <form action="{{ route('cabinets.logocbt' ) }}" method="POST" enctype="multipart/form-data"> 
                              @csrf
                      @method('PUT')
                            
                      @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
              <div class="row">
                    <div class="col-md-12">
                      <div class="">
                        <label for="logocbt"> Logo </label>
                        <input id="logocbt" type="file" class="form-control" name="logocbt" autocomplete="logocbt" value="{{ $cabinet->cabinet->logocbt }}">
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
                        <label for="nineacabinet"> NINEA (max 2mo)</label>
                    <input id="nineacabinet" type="file" class="form-control @error('nineacabinet') is-invalid @enderror" name="nineacabinet"   autocomplete="nineacabinet">
                  
                    <label for="rccabinet" class="mt-3">Régistre de Commerce (max 2mo)</label>
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
                <h5 class="card-title"> Modifier Votre mot de passe</h5>
              </div>
              <div class="card-body">
             
                <form action="{{ route('cabinets.update') }}" method="POST" > 
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
                        <label>Mot de passe actuel <span style="color:red;">*</span></label>
                        <input type="password" class="form-control"  name="current_password" >
                      </div>
                    </div>
                  </div>
                
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nouveau mot de passe <span style="color:red;">*</span></label>
                        <input type="password" class="form-control"  name="password" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Confirmer le nouveau mot de passe <span style="color:red;">*</span></label>
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
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title"> Modifier les informations du Cabinet </h5>
              </div>
              <div class="card-body">
             
                <form action="{{ route('cabinets.updateinfo') }}" method="POST" enctype="multipart/form-data"> 
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
                        <label>Nom du cabinet </label>
                        <input type="text" class="form-control"  placeholder="Nom" value="{{ $cabinet->cabinet->nomcabinet }}" name="nomcabinet">
                      </div>
                    </div>
                  
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" class="form-control"  value="{{ $cabinet->cabinet->emailcbt }}" name="emailcbt">
                      </div>
                    </div>
                  </div>
                
              
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Téléphone </label>
                        <input type="text" class="form-control"  value="{{ $cabinet->cabinet->telcbt }}" name="telcbt">
                      </div>
                      </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Secteur d'activité </label>
                        <input type="text" class="form-control"  name="secteuractivitecabinet" value="{{ $cabinet->cabinet->secteuractivitecabinet }}">
                      </div>
                      </div>
                     
                      </div>

                      <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control"  name="descabinet" > {{ $cabinet->cabinet->descabinet }} </textarea>
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