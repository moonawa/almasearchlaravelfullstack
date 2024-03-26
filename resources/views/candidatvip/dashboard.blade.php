@extends('layouts.appcandidatvip')


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
              <p class="card-category">Encours</p>
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
              <p class="card-category">Recrutés</p>
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
              <p class="card-category">Déclinés</p>
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
      <div class="card-header ">
        <h5 class="card-title"> Statistique CV</h5>
        <p class="card-category"> Performance</p>
      </div>
      <div class="card-body ">
        <!--   <canvas id="chartEmail"></canvas> -->
        <div class="col-md-12" >
  <div class="row" style="display: flex; align-items: flex-end;">
  
        <div class="bar col-md-2" style="margin:2px;  background-color: #004C50;; width: 1px; height: {{ $nombreformation * 30 }}px;"></div>
        <div class="bar col-md-2" style="margin:2px;  background-color: #00939C;; width:1px; height: {{ $nombreexperience * 30 }}px;"></div>
        <div class="bar col-md-2" style="margin:2px; background-color: #10ABB4;; width: 1px; height: {{ $nombrecompetence * 30 }}px;"></div>
        <div class="bar col-md-2" style="margin:2px; background-color: #9C3E00;; width: 1px; height: {{ $nombrelangue * 30 }}px;"></div>
        <div class="bar col-md-2" style="margin:2px; background-color: #502000; width: 1px; height: {{ $candidatures * 30 }}px;"></div>

      </div>
      </div>
      </div>
      <div class="card-footer ">
        <div class="legend">
          <i class="fa fa-circle" style="color:#004C50"></i> Formations
          <i class="fa fa-circle" style="color:#00939C"></i> Expériences
          <i class="fa fa-circle" style="color:#10ABB4"></i> Compétences
          <i class="fa fa-circle" style="color:#9C3E00"></i> Langues
          <i class="fa fa-circle" style="color:#502000"></i> Offres
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
        <canvas id="myChart" width="400" height="200"></canvas>
        <script>
          var ctx = document.getElementById('myChart').getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
              labels: ['Candidatures', 'Encours', 'Déclinés', 'Récrutés'],
              datasets: [{
                data: [{{ $candidatures }}, {{ $encours }}, {{ $decline }}, {{ $recrute }}],
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        </script>
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