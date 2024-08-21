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
                @if (!auth()->user()->avatar)
                <img class="avatar border-gray" src=" {{ asset('admin/img/default-avatar.png') }}" alt="...">
                @elseif(auth()->user()->avatar)
                <img class="avatar border-gray" src="/avatars/{{ auth()->user()->avatar }}"  >
                @endif
                <form action="{{ route('candidatvip.shows') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (session('success'))
                            <div class="alert alert-success" role="alert">
                              {{ session('success') }}
                            </div>
                        @endif
                        <label for="logo"> Photo</label>
                    <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar"  required autocomplete="avatar">
                  

                    <button type="submit" class="btn btn-round" style="background-color: #035874;">
                                    {{ __('Photo De Profil ') }}
                                </button>
                  </form>
                
                  
                </div>

              </div>
              <div class="card-footer">
            
                <div class="button-container">
                  <div class="row">
                    
                   
                  </div>
                </div>
              </div>
            </div>
          
          
            
          </div>
          <div class="col-md-8">
         
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title"> Modifier vos informations </h5>
              </div>
              <div class="card-body">
              <form action="{{ route('cabinets.updateIntercbt' , $cabinet->id) }}" method="POST" enctype="multipart/form-data"> 
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
                        <label>Nom  </label>
                        <input type="text" class="form-control"  placeholder="Nom" value="{{ $cabinet->user->last_name }}" name="last_name">
                      </div>
                    </div>
                  
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Prénom </label>
                        <input type="text" class="form-control"  value="{{ $cabinet->user->first_name }}" name="first_name">
                      </div>
                    </div>
                  </div>
               
                 
                
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Téléphone </label>
                        <input type="text" class="form-control"  value="{{ $cabinet->user->telephone }}" name="telephone">
                      </div>
                      </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Fonction  </label>
                        <input type="text" class="form-control"  name="fonctioncbt" value="{{ $cabinet->fonctioncbt }}">
                      </div>
                      </div>
                     
                      </div>

                      <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email"  class="form-control"  name="email" value="{{ $cabinet->user->email }}">

                      </div>
                    </div>
                  </div>
                
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button class="btn btn-round" type="submit" style="background-color:#035874;">Modifier </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
           
          </div>
        </div>
@endsection