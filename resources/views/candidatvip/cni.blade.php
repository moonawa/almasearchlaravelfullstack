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
    <a class="nav-link active" aria-current="page"  href="{{ route('cni') }}" style="color:#035874;">CNI/Passeport/Casier</a>
  </li>
      <li class="nav-item">
    <a class="nav-link " href="{{ route('attestations') }}" style="color:black;" >Bac</a>
    </li>
  <li class="nav-item">
    <a class="nav-link "  href="{{ route('documents') }}" style="color:black;">Licence</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('masters') }}" style="color:black;">Master</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('doctorats') }}" style="color:black;">Doctorat</a>
  </li>
 
    <li class="nav-item">
    <a class="nav-link " href="{{ route('certificats') }}" style="color:black;" >Certification</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('autres') }}" style="color:black; " >Autres</a>
  </li>
 
  
</ul>
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
     
        <div class="row">
          <div class="col-md-4">
  <button class=" nav-link " style="background-color: #7ac9e8; border:#7ac9e8; color:white;" data-toggle="modal" data-target="#exampleModal">Ajouter  votre CNI</button> 
  </div> 
  <div class="col-md-4">
  <button class=" nav-link " style="background-color: #7ac9e8; border:#7ac9e8; color:white;" data-toggle="modal" data-target="#exampleModalpass">Ajouter  votre Passeport</button> 
  </div> 
  <div class="col-md-4">
  <button class=" nav-link " style="background-color: #7ac9e8; border:#7ac9e8; color:white;" data-toggle="modal" data-target="#exampleModalcasier">Ajouter  votre Casier</button> 
  </div> 
</div>

  <!-- Modal cni-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter votre CNI</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('storeCNI') }}" enctype="multipart/form-data">
                @csrf
                <label>Carte Nationale d'identité</label>
                <div class="form-group">
                  <input type="text" class="form-control"  disabled placeholder="Carte Nationale d'identité">
                </div>

                <label>Fichier(max 2mo)  </label>
                  <input type="file" class="form-control" required name="cni" >
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-info btn-round" style="background-color: #035874;">Ajouter </button>
            </div>
            </form>
          </div>
        </div>
      </div>
      </div>
 <!-- fin Modal -->
  <!-- Modal passeport-->
  <div class="modal fade" id="exampleModalpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalpassLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalpassLabel">Ajouter votre Passeport</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('storePasseport') }}" enctype="multipart/form-data">
                @csrf
                <label>Passeport</label>
                <div class="form-group">
                  <input type="text" class="form-control"  disabled placeholder="Passeport">
                </div>

                <label>Fichier(max 2mo)  </label>
                  <input type="file" class="form-control" required name="passeport" >
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-info btn-round" style="background-color: #035874;">Ajouter </button>
            </div>
            </form>
          </div>
        </div>
      </div>
      </div>
 <!-- fin Modal -->
  <!-- Modal casier-->
  <div class="modal fade" id="exampleModalcasier" tabindex="-1" role="dialog" aria-labelledby="exampleModalcasierLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalcasierLabel">Ajouter votre Casier</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('storeCasier') }}" enctype="multipart/form-data">
                @csrf
                <label>Casier Judiciaire</label>
                <div class="form-group">
                  <input type="text" class="form-control"  disabled placeholder="Casier Judiciaire">
                </div>

                <label>Fichier(max 2mo)  </label>
                  <input type="file" class="form-control" required name="casier" >
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-info btn-round" style="background-color: #035874;">Ajouter </button>
            </div>
            </form>
          </div>
        </div>
      </div>
      </div>
 <!-- fin Modal -->
        <div class="table-responsive p-3">
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
             
             
                <tr>
                <td>
                Carte Nationale d'identité
                </td>
                <td>
                @if($candidat->cni)
               <a href="/uploads/{{ $candidat->cni }}" class="btn btn-info btn-round" target="_blank" style="background-color: #035874;">Voir</a>
                @else
                --
                @endif
                </td>
                <td class="text-right">
                     @if($candidat->cni)
                  <div class="btn-group" role="group" aria-label="Basic example">
                 
                    <form action="{{ route('destroyAttestation', $candidat->id) }}" method="POST" type="button" onsubmit="return confirm('Delete?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-round" >Supprimer</button>
                    </form>
                  </div>
                   @else
                --
                @endif
                </td>
                </tr>
                <tr>
                <td>
                Passeport
                </td>
                <td>
                    @if($candidat->passeport)
               <a href="/uploads/{{ $candidat->passeport }}" class="btn btn-info btn-round" target="_blank" style="background-color: #035874;">Voir</a>
                @else
                --
                @endif
                </td>
                <td class="text-right">
                @if($candidat->passeport)
                  <div class="btn-group" role="group" aria-label="Basic example">
                 
                    <form action="{{ route('destroyAttestation', $candidat->id) }}" method="POST" type="button" onsubmit="return confirm('Delete?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-round" >Supprimer</button>
                    </form>
                  </div>
                  @else
                --
                @endif
                </td>
                </tr>
                <tr>
                <td>
               Casier Judiciaire
                </td>
                <td>
                     @if($candidat->casier)
               <a href="/uploads/{{ $candidat->casier }}" class="btn btn-info btn-round" target="_blank" style="background-color: #035874;">Voir</a>
                @else
                --
                @endif
</td>
                <td class="text-right">
                @if($candidat->casier)
                  <div class="btn-group" role="group" aria-label="Basic example">
                 
                    <form action="{{ route('destroyAttestation', $candidat->id) }}" method="POST" type="button" onsubmit="return confirm('Delete?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-round" >Supprimer</button>
                    </form>
                  </div>
                  @else
                --
                @endif
                </td>
              </tr>
            

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection