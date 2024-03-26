@extends('layouts.appcandidatvip')
  
  
@section('contents')
  <div class="row">
  <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Liste des Candidats </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        #
                      </th>
                      <th>
                        Nom
                      </th>
                      <th>
                        Fonction
                      </th>
                      <th>
                        CV
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @if($candidat->count() > 0)
                @foreach($candidat as $rs)
                      <tr>
                      <td>
                      {{ $loop->iteration }}
                        </td>
                        <td>
                        {{ $rs->user->name }}
                        </td>
                        <td>
                        {{ $rs->nationnalite }}
                        </td>
                        <td>
                        {{ $rs->cv }}
                        </td>
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('candidatvip.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('candidatvip.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('candidatvip.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                      </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des candidats est vide</td>
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