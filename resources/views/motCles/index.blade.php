@extends('layouts.appcandidatvip')
@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="card">


            <div class="card-header">
                <div class="row">
                    <div class="col-md-10 mb-3">
                        <h5 class="card-title">Liste des Mots Clés ({{$motClescount}})</h5>
                        <p>(Ajouter des  Mots clés pour faciliter les recherches dans la base et les matching pour les entreprises)</p>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-round" style="background-color: #035874;" data-toggle="modal" data-target="#exampleModal">Ajouter</button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un Mot Clé</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('motCles.store') }}">
                                        @csrf
                                        <label>Mot Clé </label>
                                        <div class="form-group">
    <input type="text" class="form-control" required placeholder="mot cle" name="mot" list="list-timezone" id="input-datalist">
    <datalist id="list-timezone">
        <option>Php</option>
        <option>Java</option>
        <option>Devops</option>
        <option>Photoshop</option>
        <option>Wordpress</option>
        <option>Microsoft Office</option>
        
    </datalist>
</div>
                                      
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-nfo btn-round" style="background-color: #035874;">Ajouter </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                   
                    <div class="tag-container">
    @if($motCles->count() > 0)
        @foreach($motCles as $rs)
        <div class="tag">
            <span class="tag-text">{{ $rs->mot }}</span>
            <form action="{{ route('motCles.destroy', $rs->id) }}" method="POST" class="delete-form" onsubmit="return confirm('Delete?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button" style="background: none; border: none;">
                    <i class="fa fa-times"></i>
                </button>
            </form>
        </div>
        @endforeach
    @else
        <div class="no-tags">
            Vous n'avez pas encore ajouté de mot clé
        </div>
    @endif
</div>

                </div>



            </div>
        </div>
    </div>
    <style>
        .awatrash:hover{
color: red;
        }
        .tag-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.tag {
    display: flex;
    align-items: center;
    background-color: #f1f1f1;
    border-radius: 25px;
    padding: 5px 10px;
    position: relative;
}

.tag-text {
    margin-right: 10px;
}

.delete-button {
    display: none;
    cursor: pointer;
    color: red;
}

.tag:hover .delete-button {
    display: inline;
}

.no-tags {
    color: #999;
}

    </style>
<script>
    document.addEventListener('DOMContentLoaded', e => {
        $('#input-datalist').autocomplete()
    }, false);
</script>
<script>
$(document).ready(function() {
    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        if (confirm('Delete?')) {
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    form.closest('.tag').remove();
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }
    });
});
</script>

                @endsection