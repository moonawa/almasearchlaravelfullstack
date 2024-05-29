@extends('layouts.appadmin')


@section('contents')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Liste des Entreprises ({{$entreprisescount}})</h5>
        
      </div>
      <br>
      <div class="card-body">
      @if (session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
            @endif
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th style="color:black">
              </th>
              <th style="color:black">
                Entreprises
              </th>
              <th style="color:black">
                Tel/Email
              </th>
              <th style="color:black">
                Description
              </th>
              <th style="color:black">
                Activité
              </th>
              <th style="color:black">
                NINEA
              </th>
              <th style="color:black">
                RC
              </th>
              <th style="color:black">
                Détails
              </th>
              <th style="color:black">
                Status
              </th>
            </thead>
            <tbody>
              @if($entreprises->count() > 0)
              @foreach($entreprises as $rs)
              <tr>
                <td>
                  {{ $loop->iteration }}
                </td>
                <td>
                  @if (!$rs->logo)
                  <img class="avatar border-gray" width="75px" src="{{ asset('admin/img/default-avatar.png') }}" alt="...">

                  @else ( $rs->logo)
                  <img class="avatar border-gray" width="75px" src="/avatars/{{ $rs->logo }}">
                  @endif
                  {{ $rs->nomentreprise }}
                </td>
                <td>
                  {{ $rs->tel }} <br>
                  {{ $rs->emailese }}
                </td>
                <td>
                  <button type="button" style="border: none; background:white; color: #ef882b;" data-toggle="modal" data-target="#entrepriseDescription{{$rs->id}}">
                    Voir
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="entrepriseDescription{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="entrepriseDescription{{$rs->id}}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="entrepriseDescription{{$rs->id}}Label">Description</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          {{ $rs->des }}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  {{ $rs->secteuractivite  }}
                </td>
                <td>
                  <a href="/uploads/{{ $rs->ninea }}" style="color: #325fa6">Voir</i></a>
                </td>
                <td>
                  <a href="/uploads/{{ $rs->rc }}" style="color: #325fa6">Voir</i></a>
                </td>
                <td>
                  <a href="{{ route('admin.listinterentrepriseadmin', $rs->id)}}" style="color:#ef882b;">Voir</a>
                </td>
                <td>
                  <form class="statusForm" method="post" action="{{ route('updateStatusentreprise', $rs->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <select name="status" class="status-checkbox form-control" data-offre-id="{{ $rs->id }}">
                        <option id="flexSwitchCheck{{$rs->id}}" value="1" {{ $rs->interlocuteureses->first()->user->status == 1  ? 'selected' : '' }}>Activé</option>
                        <option id="flexSwitchCheck{{$rs->id}}" value="0" {{ $rs->interlocuteureses->first()->user->status == 0  ? 'selected' : '' }}>Bloqué</option>
                      </select>
                    </div>
                  </form>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td class="text-center" colspan="5">La liste des entreprises est vide</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
        {{$entreprises->links('vendor.pagination.custom')}}
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#myModal').modal(options)
</script>
<script>
  $(document).ready(function() {
    $('.status-checkbox').change(function() {
      $(this).closest('form').submit();
    });
  });
</script>
@endsection