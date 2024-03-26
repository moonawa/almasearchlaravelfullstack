@extends('layouts.appcabinet')
  
  
@section('contents')
  <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-single-02 text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Interlocuteurs</p>
                      <p class="card-title">7 <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Voir
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
                      <p class="card-category">Viviers</p>
                      <p class="card-title"> {{ $candidat }} <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-eye"></i>
                  <a href="{{ route('candidatcabinet') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 
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
                      <i class="nc-icon  nc-paper text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Offres </p>
                      <p class="card-title"> {{ $offre}}<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-eye"></i>
                  <a href="{{ route('indexcabinet') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 

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
                      <i class="nc-icon nc-album-2 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category"> Proposés</p>
                      <p class="card-title"> {{ $candidatureprop }}<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-eye"></i>
                  <a href="{{ route('proposition') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 

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
                      <i class="nc-icon nc-refresh-69 text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Sélectionnés</p>
                      <p class="card-title"> {{ $candidatureselec }} <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-eye"></i>
                  <a href="{{ route('selec') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 

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
                      <i class="nc-icon nc-check-2 text-secondary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category"> Recrutés</p>
                      <p class="card-title"> {{ $candidaturerecru }} <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-eye"></i>
                  <a href="{{ route('recru') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 

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
                      <i class="nc-icon nc-refresh-69  text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">O. Encours </p>
                      <p class="card-title"> {{ $offreencours }}<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i>
                  <a href="{{ route('offreencourscabinet') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 

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
                      <p class="card-category">O. Expirés</p>
                      <p class="card-title">{{ $offreexpire }} <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  <a href="{{ route('offreexpirecabinet') }}" style="color: #9A9A9A; text-decoration: none;">Voir</a> 
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="row">
          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title"> Statistiques</h5>
              </div>
              <div class="card-body ">
        <!--   <canvas id="chartEmail"></canvas> -->
        <div class="col-md-12" >
  <div class="row" style="display: flex; align-items: flex-end;">
  
        <div class="bar col-md-2" style="margin:2px;  background-color: #004C50;; width: 1px; height: {{ $candidat * 30 }}px;"></div>
        <div class="bar col-md-2" style="margin:2px;  background-color: #00939C;; width:1px; height: {{ $offre * 30 }}px;"></div>
        <div class="bar col-md-2" style="margin:2px; background-color: #10ABB4;; width: 1px; height: {{ $candidatureselec * 30 }}px;"></div>
        <div class="bar col-md-2" style="margin:2px; background-color: #9C3E00;; width: 1px; height: {{ $candidaturerecru * 30 }}px;"></div>

      </div>
      
      </div>
      </div>
              <div class="card-footer ">
                <div class="legend">
                  <i class="fa fa-circle" style="color:#004C50"></i> Candidats
                  <i class="fa fa-circle" style="color:#00939C"></i> Offres
                  <i class="fa fa-circle"  style="color:#10ABB4"></i> Candidats Sélectionnés
                  <i class="fa fa-circle" style="color:#9C3E00"></i> Candidats Recrutés
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