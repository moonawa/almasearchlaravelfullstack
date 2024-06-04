@extends('layouts.app')
  
  
@section('contents')
<div class="row">
  <div class="col-md-12">
  <div class="card">
  <div class="row p-4" >

  <ul class="nav nav-tabs ">
  <li class="nav-item">
    <a class="nav-link "  href="{{ route('offres') }}"style="color:black;" >Toutes les Offres  ({{$offrecount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link "  href="{{ route('offreencoursentreprise') }}" style="color:black;">Offres En Cours ({{$encourscount}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ route('offreexpireentreprise') }}" style="color:#325fa6;">Offres Expirées ({{$expirescount}})</a>
  </li>
</ul>
  
</div>
            
             <br><br>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                  
                      <th style="color:black">
                        Nom 
                      </th>
                      <th style="color:black">
                         Poste
                      </th>
                      <th style="color:black">
                          Contrat
                      </th>
                      <th style="color:black">
                        Date de Cloture
                      </th>
                      <th style="color:black">
                        Salaire
                      </th>
                      <th class="text-right" style="color:black">
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @if($expires->count() > 0)
                @foreach($expires as $rs)
                      <tr>
                    
                        <td>
                        {{ $rs->nomposte }}
                        </td>
                        <td>
                        {{ $rs->nombredeposte  }}
                        </td>
                        <td>
                        {{ $rs->typecontrat }}
                        </td>
                        <td>
                        {{ $rs->datecloture  }}
                        </td>
                        <td>
                        {{ $rs->salaire  }}
                        
                      </td>
                        <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('offres.show', $rs->id)}}" style="color: #ef882b; text-decoration:none;">Détails</a>
                        &nbsp;|
                                <form action="{{ route('offres.duplicate', $rs->id) }}" method="post">
                @csrf
                <button type="submit"  style="background-color: #FFF; color:#325fa6; border:none;">Dupliquer</button>
            </form>
                            </div>
                        </td>
                      </tr>
                      @endforeach
                      @else
                <tr>
                    <td class="text-center" colspan="5">La liste des offres est vide</td>
                </tr>
            @endif
                     
                    </tbody>
                  </table>
                </div>
                {{$expires->links('vendor.pagination.custom')}}
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