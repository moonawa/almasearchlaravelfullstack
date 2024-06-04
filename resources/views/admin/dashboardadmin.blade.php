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
              <i class="nc-icon nc-refresh-69 text-warning "></i>
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
              <i class="nc-icon nc-simple-remove text-danger "></i>
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
        <h4 class="card-title">Top 10 des Cabinets </h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled team-members">
          @if($topcabinets->count() > 0)
          @foreach($topcabinets as $rss)
          <li>
            <div class="row">
              <div class="col-md-2 col-2">
                <div class="avatar">
                  @if (!$rss->logocbt)
                  <img class="img-circle img-no-padding img-responsive" width="75px" src="{{ asset('admin/img/default-avatar.png') }}" alt="Circle Image">

                  @else ( $rss->logocbt)
                  <img class="img-circle img-no-padding img-responsive" width="75px" src="/uploads/{{ $rss->logocbt }}" alt="Circle Image">
                  @endif
                </div>
              </div>
              <div class="col-md-7 col-7">
                <a href="{{ route('admin.listintercabinetadmin', $rss->id)}}" style="color:#325fa6;">{{$rss->nomcabinet}}</a>


                <br />
                <span class="text-muted"><small>{{ $rss->view_count }} Participation(s)</small></span>
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
        <h4 class="card-title">Top 10 des Entreprises</h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled team-members">
          @if($topentreprises->count() > 0)
          @foreach($topentreprises as $rs)
          <li>
            <div class="row">
              <div class="col-md-2 col-2">
                <div class="avatar">
                  @if (!$rs->logo)
                  <img class="img-circle img-no-padding img-responsive" width="75px" src="{{ asset('admin/img/default-avatar.png') }}" alt="Circle Image">

                  @else ( $rs->logo)
                  <img class="img-circle img-no-padding img-responsive" width="75px" src="/uploads/{{ $rs->logo }}" alt="Circle Image">
                  @endif
                </div>
              </div>
              <div class="col-md-7 col-7">
                <a href="{{ route('admin.listinterentrepriseadmin', $rs->id)}}" style="color:#325fa6;">{{$rs->nomentreprise}}</a>

                <br />
                <span class="text-muted"><small>{{$rs->offres_count}} Offre(s)</small></span>
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
        <h4 class="card-title">VIP Members</h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled team-members">
          @if($vip->count() > 0)
          @foreach($vip as $vips)
          <li>
            <div class="row">
              <div class="col-md-2 col-2">
                <div class="avatar">
                  @if (!$vips->user->avatar)
                  <img class="img-circle img-no-padding img-responsive" width="75px" src="{{ asset('admin/img/default-avatar.png') }}" alt="Circle Image">

                  @else ( $vips->user->avatar)
                  <img class="img-circle img-no-padding img-responsive" width="75px" src="/avatars/{{ $vips->user->avatar }}" alt="Circle Image">
                  @endif
                </div>
              </div>
              <div class="col-md-7 col-7">
                <a href="{{ route('cvdetaille', $vips->id)}}" style="color:#325fa6;">{{$vips->user->name}}</a>

                <br />
                <span class="text-muted"><small>vip</small></span>
              </div>
             <!-- <div class="col-md-3 col-3 text-right">
                <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
              </div> !-->
            </div>
          </li>

          @endforeach
          @else
          <li>
            <td class="text-center" colspan="5">La liste des candidats vip est vide</td>
          </li>
          @endif
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