@extends('layouts.appadmin')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
  
           
              <div class="card-header">
                <h5 class="card-title">Liste des Candidats des Cabinets ({{$candidatscount}})</h5>

              </div>
             <br>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th style="color:black">
                        #
                      </th>
                      <th style="color:black">
                        Cabinet
                      </th>
                      <th style="color:black">
                        Nom 
                      </th>
                      <th style="color:black">
                        Tel/Email 
                      </th>
                      <th style="color:black">
                        Genre
                      </th>
                      <th style="color:black">
                         Âge
                      </th>
                      
                      <th style="color:black">
                        Fonction 
                      </th>
                      <th style="color:black">
                        Nationnalité
                      </th>
                      <th style="color:black">
                        CV
                      </th>
                   
                    </thead>
                    <tbody>
                    @if($candidats->count() > 0)
                @foreach($candidats as $rs)
                      <tr>
                      <td>
                      {{ $loop->iteration }}
                        </td>
                        <td>
                        @if (!$rs->cabinet->logocbt)
                        <img class="avatar border-gray" width="75px" src="{{ asset('admin/img/default-avatar.png') }}" alt="...">

                        @else ( $rs->cabinet->logocbt)
                        <img class="avatar border-gray" width="75px" src="/avatars/{{ $rs->cabinet->logocbt }}">
                        @endif
                        {{ $rs->cabinet->nomcabinet }}
                        </td>
                        <td>
                        {{ $rs->user->name }}
                        </td>
                        <td>
                        {{ $rs->user->telephone }} <br>  
                        {{ $rs->user->email }}
                        </td>
                        <td>
                        {{ $rs->genre  }}
                        </td>
                        <td>
@if($rs->birthday)
                        @php
                $birthday = $rs->birthday;
                $age = $birthday ? \Carbon\Carbon::parse($birthday)->age : null;
                @endphp
                {{ $age  }} ans
                @else
                --
                @endif
                        </td>
                        <td>
                        @if($rs->fonction)
                        {{ $rs->fonction  }}
                        @else
                --
                @endif
                        </td>
                      
                        <td>
                        @if($rs->nationnalite)
                        {{ $rs->nationnalite  }}
                        @else
                --
                @endif
                      </td>
                     
                        <td >
                        <a href="/uploads/{{ $rs->cv }}" style="color: #325fa6;">Voir</i></a>
                        </td>
                      </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des candidats  est vide</td>
                </tr>
            @endif
                     
                    </tbody>
                  </table>
                </div>
                {{$candidats->links('vendor.pagination.custom')}}
              </div>
            </div>
          </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.status-checkbox').change(function () {
            $(this).closest('form').submit();
        });
    });
</script>
@endsection