@extends('layouts.appadmin')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
  <div class=" p-4" >
  @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('admin.listcandidatadmin') }}" style="color: #035874;">Tous les Candidats ({{$candidatscount }})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.listvipadmin') }}" style="color:black;">Candidats VIP ({{$vipcount }})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.listnonvipadmin') }}" style="color:black;">Candidats Simples ({{$nonvipcount }})</a>
  </li>
  <li class="nav-item">
  <form action="{{ route('candidats.import.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
            <input type="file" name="file" id="file" required>
     
       
        <button type="submit">Imp</button>
    </form>
  </li>
</ul>
   
</div>
           
             <br>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
               
                   
                  
                      <th style="color:black">
                        Nom 
                      </th>
                      <th style="color:black">
                        Tel/Email 
                      </th>
                      
                    
                      
                      <th style="color:black">
                      Age/ Fonction 
                      </th>
                    
                      <th style="color:black">
                        Sélection
                      </th>
                      <th class="text-right" style="color:black">
                        CV
                      </th>
                      <th class="text-right" style="color:black">
                        VIP
                      </th>
                      <th class="text-right" style="color:black"> Connexion</th>
                    </thead>
                    <tbody>
                    @if($candidats->count() > 0)
                @foreach($candidats as $rs)
                      <tr>
                     
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
                       
                      
                        <td >
                        @php
                $birthday = $rs->birthday;
                $age = $birthday ? \Carbon\Carbon::parse($birthday)->age : null;
                @endphp
                {{ $age  }} ans
                <br>
                          @if($rs->fonction)
                        {{ $rs->fonction  }}
                        @else
                --
                @endif
                        </td>
                      
                      
                      <td style="color: #7ac9e8">
                        {{ $rs->candidatures_count  }}
                        </td>
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('cvdetaille', $rs->id)}}" style="color: #035874;">Voir</a>

                                
                            </div>
                        </td>
                        <td>
                        <form class="statusForm" method="post" action="{{ route('admin.updatevip', $rs->id)}}">
                          @csrf

                          @method('PUT')
                          <div  class="form-group">
                     <select name="vip" class="status-checkbox form-control" id="status-select" data-offre-id="{{ $rs->id }}">

                      <option   id="flexSwitchCheck{{$rs->id}}" value="non" {{ $rs->vip == "non"  ? 'selected' : '' }} >Non</option>
                      <option id="flexSwitchCheck{{$rs->id}}" value="oui" {{ $rs->vip == "oui"  ? 'selected' : '' }}>Oui</option>

                    
                     </select>
                     </div>
                         
                          </form>
                   
                      </td>
                      <td class="text-right">
        @if( $rs->user->last_login_at)
        @php
                $date = date('Y-m-d', strtotime($rs->user->last_login_at));
                $heure = date('H:i', strtotime($rs->user->last_login_at));
                @endphp
                {{ $date }} <br> à  {{ $heure }}
                @else
              <span style="color:red"> Jamais </span> 
                @endif
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
  $(document).ready(function() {
    $('.status-button').change(function() {
      $('#statusForm').submit();
    });
  });
</script>
<script>
    $(document).ready(function () {
        $('.status-checkbox').change(function () {
            $(this).closest('form').submit();
        });
    });
</script>
@endsection