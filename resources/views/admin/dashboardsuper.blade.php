@extends('layouts.appadmin')


@section('contents')
<div class="row">
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
              <p class="card-category">Entreprises</p>
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
         <a href="{{ route('formations.create') }}" style="color: #9A9A9A; text-decoration: none;">Ajouter</a> 
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
              <p class="card-category">Cabinets</p>
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
          <a href="{{ route('experiences.create') }}" style="color: #9A9A9A; text-decoration: none;">Ajouter</a> 
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
              <p class="card-category">Candidats</p>
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
          <a href="{{ route('competences.create') }}" style="color: #9A9A9A; text-decoration: none;">Ajouter</a> 
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
              <i class="nc-icon nc-satisfied text-primary"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Offres</p>
              <p class="card-title">{{ $nombrereference }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-plus"></i>
          <a href="{{ route('references.create') }}" style="color: #9A9A9A; text-decoration: none;">Ajouter</a> 

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
              <i class="nc-icon nc-world-2 text-primary "></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Langues</p>
              <p class="card-title"> {{ $nombrelangue }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i>
          <a href="{{ route('langues.create') }}" style="color: #9A9A9A; text-decoration: none;">Ajouter</a> 

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
              <i class="nc-icon nc-money-coins text-red"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Offres </p>
              <p class="card-title">{{ $candidatures }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-calendar-o"></i>
          <a href="{{ route( 'showcandidat') }}" style="text-decoration: none; color: #9A9A9A">Voir</a> 
        </div>
      </div>
    </div>
  </div>
<!-- <div class="col-lg-3 col-md-6 col-sm-6">
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
          <i class="fa fa-clock-o"></i>
          Ajouter
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
              <i class="nc-icon nc-satisfied text-primary"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Références</p>
              <p class="card-title">{{ $nombrereference }}
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i>
          Ajouter
        </div>
      </div>
    </div>
  </div>   --->
</div>

<div class="row">
  <div class="col-md-4">
    <div class="card ">
      <div class="card-header ">
        <h5 class="card-title"> Statistique CV</h5>
        <p class="card-category"> Performance</p>
      </div>
      <div class="card-body ">
        <!--   <canvas id="chartEmail"></canvas> -->

        <div class="bar" style="  background-color: green; width: {{ $nombreformation * 50 }}px; height: {{ $nombreformation * 10 }}px;"></div>
        <div class="bar" style="  background-color: blue; width: {{ $nombreexperience * 50 }}px; height: {{ $nombreexperience * 10 }}px;"></div>
        <div class="bar" style=" background-color: red; width: {{ $nombrecompetence * 50 }}px; height: {{ $nombrecompetence * 10 }}px;"></div>
        <div class="bar" style=" background-color: gray; width: {{ $nombrelangue * 50 }}px; height: {{ $nombrecompetence * 10 }}px;"></div>

      </div>

      <div class="card-footer ">
        <div class="legend">
          <i class="fa fa-circle" style="color:green"></i> Formations
          <i class="fa fa-circle" style="color:blue"></i> Expériences
          <i class="fa fa-circle" style="color:red"></i> Compétences
          <i class="fa fa-circle text-gray"></i> Langues
        </div>
        <hr>
        <div class="stats">
          <i class="fa fa-calendar"></i> Number of emails sent
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-title">NASDAQ: AAPL</h5>
        <p class="card-category">Line Chart with Points</p>
      </div>
      <div class="card-body">
        <canvas id="speedChart" width="400" height="100"></canvas>
      </div>
      <div class="card-footer">
        <div class="chart-legend">
          <i class="fa fa-circle text-info"></i> Tesla Model S
          <i class="fa fa-circle text-warning"></i> BMW 5 Series
        </div>
        <hr />
        <div class="card-stats">
          <i class="fa fa-check"></i> Data information certified
        </div>
      </div>
    </div>
  </div>
</div>
@endsection