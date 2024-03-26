@extends('layouts.appadmin')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
  
           
              <div class="card-header">
                <h5 class="card-title">Liste des Candidats VIP</h5>
              <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">

                </div>
              </div>

              </div>
              <br><br>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th style="color:black">
                        #
                      </th>
                   
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
                      <th class="text-right" style="color:black">
                        Détails
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
                        @if (!$rs->user->avatar)
                        <img class="avatar border-gray" width="75px" src="{{ asset('admin/img/default-avatar.png') }}" alt="...">

                        @else ( $rs->user->avatar)
                        <img class="avatar border-gray" width="75px" src="/avatars/{{ $rs->user->avatar }}">
                        @endif
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
                        @php
                $birthday = $rs->birthday;
                $age = $birthday ? \Carbon\Carbon::parse($birthday)->age : null;
                @endphp
                {{ $age  }} ans
                        </td>
                        <td>
                        {{ $rs->fonction  }}
                        </td>
                      
                        <td>
                        {{ $rs->nationnalite  }}
                      </td>
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('cvdetaille', $rs->id)}}" style="margin:5px;"><button style="border: none; background:white;"><i class="fa fa-eye"></i></button></a>

                                
                            </div>
                        </td>
                      </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des candidats VIP est vide</td>
                </tr>
            @endif
                     
                    </tbody>
                  </table>
                </div>
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