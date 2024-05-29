@extends('layouts.appadmin')


@section('contents')
<div class="row">
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon  nc-favourite-28  text-danger"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Membres </p>
              <p class="card-title"> {{ $admin }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-eye"></i>
          <a href="{{ route('admin.admin') }}" style="text-decoration: none; color: #9A9A9A">Voir</a> 
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-shop text-primary "></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Entreprises</p>
              <p class="card-title"> {{ $entreprisecount }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-eye"></i>
         <a href="{{ route('admin.listentrepriseadmin') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-shop text-warning"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Cabinets</p>
              <p class="card-title">{{ $cabinetcount }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-eye"></i>
          <a href="{{ route('admin.listcabinetadmin') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-circle-10 text-success"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Candidats VIP</p>
              <p class="card-title">{{ $candidatvipcount }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-eye"></i>
          <a href="{{ route('admin.listcandidatadmin') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 
        </div>
      </div>
    </div>
  </div>
  </div>
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-circle-10 text-info "></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Candidats</p>
              <p class="card-title"> {{ $candidatcount }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-eye"></i>
          <a href="{{ route('admin.listcandidatnonadmin') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 

        </div>
      </div>
    </div>
  </div>
  <!--
    admin
  !-->
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-paper text-danger"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Offres</p>
              <p class="card-title">{{ $offrecount }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-eye"></i>
          <a href="{{ route('admin.listoffreadmin') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 

        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-eye-69 text-warning "></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">O. Encours</p>
              <p class="card-title"> {{ $offreencourscount }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-eye"></i>
          <a href="{{ route('offreencoursadmin') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 

        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-simple-remove text-secondary "></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">O. Expirées</p>
              <p class="card-title">{{ $offreexpirecount }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-eye"></i>
          <a href="{{ route('offreexpireadmin') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 

        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
  <div class="card">
              <div class="card-header">
                <h4 class="card-title">Top 10 des Cabinets <img src="{{ asset('admin/img/top1.png')}}" alt=""></h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                @if($topcabinets->count() > 0)
                @foreach($topcabinets as $rs)
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                        @if (!$rs->user->avatar)
                        <img class="img-circle img-no-padding img-responsive" width="75px" src="{{ asset('admin/img/default-avatar.png') }}" alt="Circle Image">

                        @else ( $rs->user->avatar)
                        <img class="img-circle img-no-padding img-responsive" width="75px" src="/avatars/{{ $rs->user->avatar }}" alt="Circle Image">
                        @endif                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                      {{ $rs->user->name }} ({{ $rs->view_count }})
                        <br/>
                        <span class="text-muted"><small>Offline</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                 
                
                  @endforeach
                      @else
                <li>
                    <td class="text-center" colspan="5">La liste des tops cabinets est vide</td>
</li>
                @endif
                </ul>
              </div>
            </div>
  </div>
  <div class="col-md-4">
  <div class="card">
              <div class="card-header">
                <h4 class="card-title">Top des  Entreprises</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
              
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                     rrr
                        <br />
                        <span class="text-muted"><small>Offline</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../assets/img/faces/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                        Creative Tim
                        <br />
                        <span class="text-success"><small>Available</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-ms-7 col-7">
                        Flume
                        <br />
                        <span class="text-danger"><small>Busy</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                 
                </ul>
              </div>
            </div>
  </div>
  <div class="col-md-4">
  <div class="card">
              <div class="card-header">
                <h4 class="card-title">VIP Members</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                        DJ Khaled
                        <br />
                        <span class="text-muted"><small>Offline</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                        @if (!$rs->user->avatar)
                        <img class="img-circle img-no-padding img-responsive" width="75px" src="{{ asset('admin/img/default-avatar.png') }}" alt="Circle Image">

                        @else ( $rs->user->avatar)
                        <img class="img-circle img-no-padding img-responsive" width="75px" src="/avatars/{{ $rs->user->avatar }}" alt="Circle Image">
                        @endif
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                        Creative Tim
                        <br />
                        <span class="text-success"><small>Available</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-ms-7 col-7">
                        Flume
                        <br />
                        <span class="text-danger"><small>Busy</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="card ">
     
     
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-chart">
     
      
      
    </div>
  </div>
</div>
@endsection