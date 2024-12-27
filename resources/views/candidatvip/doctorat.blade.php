@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
  <div class="col-md-12">
    <div class="card">
    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div>
                    @endif
                    @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif

      <div class=" p-4">
      <ul class="nav nav-tabs">
      <li class="nav-item">
    <a class="nav-link "  href="{{ route('cni') }}" style="color:black;">CNI/Passeport/Casier</a>
  </li>
      <li class="nav-item">
    <a class="nav-link " href="{{ route('attestations') }}" style="color:black;" >Bac</a>
    </li>
  <li class="nav-item">
    <a class="nav-link "  href="{{ route('documents') }}" style="color:black;">Licence</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  " href="{{ route('masters') }}" style="color:black;">Master</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('doctorats') }}" style="color:#035874;">Doctorat</a>
  </li>
 
    <li class="nav-item">
    <a class="nav-link " href="{{ route('certificats') }}" style="color:black;" >Certification</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('autres') }}" style="color:black; " >Autres </a>
  </li>
  <li class="nav-item">
  <button class=" nav-link " style="background-color: #035874; color:white;" data-toggle="modal" data-target="#exampleModal">Ajouter un Doctorat</button> 

  </li>
  
</ul>
</div>

      <!-- Button trigger modal -->


      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un Doctorat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('storeDoctorat') }}" enctype="multipart/form-data">
                @csrf
                <label>Nom du doctorat</label>
                <div class="form-group">
                  <input type="text" class="form-control" required name="nomdoctorat" placeholder="intitulé du doctorat">
                </div>

                <label>Fichier(max 2mo)  </label>
                  <input type="file" class="form-control" required name="doctorat" >

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-info btn-round" style="background-color: #035874;">Ajouter </button>
            </div>
            </form>
          </div>
        </div>
      </div>
      </div>
      <div class="card-header">
        <div class="row">
          <div class="col-md-10">
          </div>
          <div class="col-md-2">

          </div>
        </div>

      </div>
     
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
           
              <th style="color:black">
                Nom
              </th>
              <th style="color:black">
                fichier
              </th>
             

              <th class="text-right" style="color:black">
                Action
              </th>
            </thead>
            <tbody>
              @if($doctorats->count() > 0)
              @foreach($doctorats as $rs)
              <tr>
             
                <td>
                  {{ $rs->nomdoctorat }}
                </td>
                @if($rs->doctorat)
                <td><a href="/uploads/{{ $rs->doctorat }}" class="btn btn-info btn-round" target="_blank" style="background-color: #035874;">Voir</a></td>
                @else
                --
                @endif
               

                <td class="text-right">
                  <div class="btn-group" role="group" aria-label="Basic example">
                 
                    <form action="{{ route('destroyDoctorat', $rs->id) }}" method="POST" type="button" onsubmit="return confirm('Delete?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-round" >Supprimer</button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td class="text-center" colspan="5">La liste des doctorats est vide</td>
              </tr>
              @endif

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection