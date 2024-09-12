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
                @if (!auth()->user()->interlocuteurcbt->cabinet->logocbt)
                <img class="avatar border-gray" src=" {{ asset('admin/img/default-avatar.png') }}" alt="...">
            
                @else (auth()->user()->interlocuteurcbt->cabinet->logocbt)
                <img class="avatar border-gray" src=" /uploads/{{ auth()->user()->interlocuteurcbt->cabinet->logocbt }}" >
                @endif
                
                <form action="{{ route('cabinets.logocbt') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <label for="logocbt"> Logo</label>
                    <input id="logocbt" type="file" class="form-control @error('logocbt') is-invalid @enderror" name="logocbt"  required autocomplete="logocbt">
                  

                    <button type="submit" class="btn  btn-round" style="background-color: #035874;">
                                    {{ __('Logo') }}
                                </button>
                  </form>
                
                 
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
          
          
          </div>
          <div class="col-md-8">
           
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
                      <button class="btn  btn-round" type="submit" style="background-color: #035874;">Modifier </button>
                    </div>
                  </div>
                </form>
               
              </div>
            </div>
          </div>
        </div>
@endsection