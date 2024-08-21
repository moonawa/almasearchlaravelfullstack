@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">

  <div class="col-md-6">
    <div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
      <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
        <i class="nc-icon nc-simple-remove"></i>
      </button>
      <span data-notify="icon" class="nc-icon nc-bell-55"></span>
      <span data-notify="message">Votre profil (CV détaillé) a été vu {{ $candidat->views_count }} fois par les entreprises.
        Veullez le completer d'avantage.
      </span>
    </div>
  </div>
  <div class="col-md-6">
    @if(session('warning'))

    <div class="alert alert-danger alert-with-icon alert-dismissible fade show" data-notify="container">
      <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
        <i class="nc-icon nc-simple-remove"></i>
      </button>
      <span data-notify="icon" class="nc-icon nc-bell-55"></span>
      <span data-notify="message">{{ session('warning') }}
      </span>
    </div>

    @endif
  </div>

</div>
 <!--<div class="row">
 <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-hat-3 text-warning "></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Formations</p>
              <p class="card-title"> {{ $nombreformation }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i>
          <a href="{{ route('formations') }}" style="color: #9A9A9A; text-decoration: none;">Ajouter</a>
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
              <i class="nc-icon nc-money-coins text-success"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Expériences</p>
              <p class="card-title">{{ $nombreexperience }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-plus"></i>
          <a href="{{ route('experiences') }}" style="color: #9A9A9A; text-decoration: none;">Ajouter</a>
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
              <i class="nc-icon nc-chart-bar-32 text-danger"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Compétences</p>
              <p class="card-title">{{ $nombrecompetence }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i>
          <a href="{{ route('competences') }}" style="color: #9A9A9A; text-decoration: none;">Ajouter</a>
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
              <i class="nc-icon nc-world-2  text-primary"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Langues</p>
              <p class="card-title">{{ $nombrelangue }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-plus"></i>
          <a href="{{ route('langues') }}" style="color: #9A9A9A; text-decoration: none;">Ajouter</a>

        </div>
      </div>
    </div>
  </div>
</div>
!-->
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-paper text-danger "></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Offres</p>
              <p class="card-title"> {{ $candidatures }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i>
          <a href="{{ route('showcandidat') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a>

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
              <i class="nc-icon nc-refresh-69 text-red"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">En Cours</p>
              <p class="card-title">{{ $encours }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-calendar-o"></i>
          <a href="{{ route( 'offreencourscandidat') }}" style="text-decoration: none; color: #9A9A9A">Voir</a>
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
              <i class="nc-icon nc-satisfied text-warning"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Acceptées</p>
              <p class="card-title">{{ $recrute }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-eye"></i>
          <a href="{{ route( 'offrerecrutecandidat') }}" style="text-decoration: none; color: #9A9A9A">Voir</a>
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
              <i class="nc-icon nc-simple-remove text-secondary"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Déclinées</p>
              <p class="card-title">{{ $decline }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-eye"></i>
          <a href="{{ route( 'offredeclinecandidat') }}" style="text-decoration: none; color: #9A9A9A">Voir</a>
        </div>
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

  </div>
</div>
@endsection