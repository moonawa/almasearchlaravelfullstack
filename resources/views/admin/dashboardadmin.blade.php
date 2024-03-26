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
    <div class="card ">
      <div class="card-header ">
        <h5 class="card-title"> Statistique </h5>
      </div>
      <div class="card-body ">
        <!--   <canvas id="chartEmail"></canvas> -->
<div class="col-md-12" >
  <div class="row" style="display: flex; align-items: flex-end;">
  

        <div class="bar col-md-2" style=" margin:2px; background-color: #004C50; width: 5px; height: {{ $candidatcount * 5 }}px;"></div>
        <div class="bar col-md-2" style=" margin:2px; background-color: #00939C; width:  5px; height: {{ $candidatvipcount * 5 }}px;"></div>
        
        <div class="bar col-md-2" style="margin:2px; background-color: #10ABB4; width: 5px; height: {{ $cabinetcount * 5 }}px;"></div>
        <div class="bar col-md-2" style="margin:2px; background-color: #9C3E00; width: 5px; height: {{ $entreprisecount * 5 }}px;"></div>
        <div class="bar col-md-2" style="margin:2px; background-color: #502000; width: 5px; height: {{ $offrecount * 5 }}px;"></div>
        
      </div>
      </div>
      </div>
      <div class="card-footer ">
        <div class="legend">
          <i class="fa fa-circle" style="color:#004C50"></i> Candidats
          <i class="fa fa-circle" style="color:#00939C"></i> Candidats VIP
          <i class="fa fa-circle" style="color:#10ABB4"></i> Cabinets
          <i class="fa fa-circle" style="color:#9C3E00"></i> Entreprises
          <i class="fa fa-circle" style="color: #502000"></i> Offres
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