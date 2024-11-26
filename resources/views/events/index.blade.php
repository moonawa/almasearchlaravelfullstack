@extends('layouts.appadmin')
@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8">
                  <h4 class="card-title">Liste des évennements</h4>
                </div>
                <div class="col-md-4">
                  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
  Ajouter un évennement
</button>
                </div>
              </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  Ajouter un évennement</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('events.store') }}"   enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
     
      <label>Nom de l'évennement <span class="text-danger">*</span></label>
                    <div class="form-group">
                        <input type="text" required name="nomevent" class="form-control">
                    </div>
                    <label>Description de l'évennement  <span class="text-danger">*</span></label>
                    <div class="form-group">
                    <textarea id="editor" name="description"  required></textarea>
                    </div>
                    <label>Lieu de l'évennement  <span class="text-danger">*</span></label>
                    <div class="form-group">
                        <input type="text" required name="lieuevent" class="form-control">
                    </div>
                    <label>Date de l'évennement <span class="text-danger">*</span></label>
                    <div class="form-group">
                        <input type="datetime-local" required name="dateevennement" class="form-control">
                    </div>
                    <label>Photo de Couverture de l'évennement</label>
                    
                        <input type="file" name="photo" class="form-control">
                  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer </button>
      </div>
      </form>
    </div>
  </div>
</div>

               
            </div>
            <div class="col-md-12 pt-4">
                <div class="row">
           
            @if($events->count() > 0)
            @foreach($events as $event)
            <div class="col-md-4">
                <div class="card">
                    @if(!$event->photo)
                    <img src="{{ asset('admin/img/almafond3.jpg') }}" style ="width: 300px; height: 150px;" alt="...">
                    @else
                    <img src="/uploads/{{ $event->photo}} " style ="width: 300px; height: 150px;" alt="...">

                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->nomevent }}</h5>
                      
                        <p class="card-text">{!! $event->description !!}</p>
                   
                        <p class="card-text">{{ $event->lieuevent }}</p>
                        <p class="card-text">{{ $event->dateevennement }}</p>
                        <p>
                        <a href="{{ route('events.show', $event->id) }}" class="btn " style="background: #035874;">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('events.show', $event->id) }}" class="btn " style="background: #035874;">
                        <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('events.destroy', $event->id) }}" class="btn " style="background: #035874;">
                        <i class="fa fa-trash"></i>
                        </a>
                        </p>
            </div>
            </div>
            </div>
            @endforeach
            @else
            <p class="text-center" colspan="5">La liste des évennements est vide</p>
            @endif
      
     
        </div>
    </div>
</div>
<!-- Dans le <head> ou avant la fermeture du <body> -->
<script src="https://cdn.ckeditor.com/4.22.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
@endsection