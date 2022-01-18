@extends('layouts.admin')
@section('title','Dashboard')
@section('nav-title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">group</i>
                        </div>
                        <p class="card-category">Users</p>
                        <h3 class="card-title">{{ $user_count }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">supervised_user_circle</i>
                        </div>
                        <p class="card-category">Seller Profiles</p>
                        <h3 class="card-title">{{ $car_part_count }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">electric_car</i>
                        </div>
                        <p class="card-category">Car Parts</p>
                        <h3 class="card-title">{{ $car_part_count }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">commute</i>
                        </div>
                        <p class="card-category"> Scrap Yards</p>
                        <h3 class="card-title">{{ $scrap_yard_count }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">monetization_on</i>
                        </div>
                        <p class="card-category">Subscriptions</p>
                        <h3 class="card-title">{{ $subscription_count }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">card_membership</i>
                        </div>
                        <p class="card-category">Plans</p>
                        <h3 class="card-title">{{ $plan_count }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">store</i>
                        </div>
                        <p class="card-category">Total Pay</p>
                        <h3 class="card-title">{{ number_format($count_total_payment) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
              <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-rose" data-header-animation="true">
                    <div class="ct-chart" id="carPartChart"></div>
                  </div>
                  <div class="card-body">
                    <div class="card-actions">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <!-- <i class="material-icons">build</i> Fix Header! -->
                      </button>
                      <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                        <!-- <i class="material-icons">refresh</i> -->
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                        <!-- <i class="material-icons">edit</i> -->
                      </button>
                    </div>
                    <h4 class="card-title">Car Part Advertisements</h4>
                    <p class="card-category"></p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">access_time</i> campaign sent 2 days ago -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-success" data-header-animation="true">
                    <div class="ct-chart" id="scrapYardChart"></div>
                  </div>
                  <div class="card-body">
                    <div class="card-actions">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <!-- <i class="material-icons">build</i> Fix Header! -->
                      </button>
                      <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                        <!-- <i class="material-icons">refresh</i> -->
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                        <!-- <i class="material-icons">edit</i> -->
                      </button>
                    </div>
                    <h4 class="card-title">Scrap Yard Advertisements</h4>
                    <p class="card-category">
                      <!-- <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales. -->
                  </p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">access_time</i> updated 4 minutes ago -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-info" data-header-animation="true">
                    <div class="ct-chart" id="subscriptionChart"></div>
                  </div>
                  <div class="card-body">
                    <div class="card-actions">
                      <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <!-- <i class="material-icons">build</i> Fix Header! -->
                      </button>
                      <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                        <!-- <i class="material-icons">refresh</i> -->
                      </button>
                      <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                        <!-- <i class="material-icons">edit</i> -->
                      </button>
                    </div>
                    <h4 class="card-title">Income</h4>
                    <p class="card-category"></p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <!-- <i class="material-icons">access_time</i> campaign sent 2 days ago -->
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        
        $(document).ready(function() {
            scrapYardChart();
            carPartChart();
            subscriptionChart();
        });

        function scrapYardChart()
        {
            dataChart = {
            labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
            series: [[
                <?php for($i = 0;$i < $limit;$i++): ?>
                    <?php echo count($scrap_yards->where('day' , $i)); ?>
                <?php if($i < ($limit-1)): ?> , <?php endif;endfor; ?>
            ]]
          };

          optionsChart = {
            lineSmooth: Chartist.Interpolation.cardinal({
              tension: 0
            }),
            low: '{{ $min_scrap_yard }}',
            high: '{{ $max_scrap_yard }}', // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            chartPadding: {
              top: 0,
              right: 0,
              bottom: 0,
              left: 0
            },
          }

          var OutputChart = new Chartist.Line('#scrapYardChart', dataChart, optionsChart);

          md.startAnimationForLineChart(OutputChart);
        }

        function carPartChart()
        {
            dataChart = {
                labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
                series: [[
                    <?php for($i = 0;$i < $limit;$i++): ?>
                        <?php echo count($car_parts->where('day' , $i)); ?>
                    <?php if($i < ($limit-1)): ?> , <?php endif;endfor; ?>
                ]]
            };

          optionsChart = {
            lineSmooth: Chartist.Interpolation.cardinal({
              tension: 0
            }),
            low: '{{ $min_car_part }}',
            high: '{{ $max_car_part }}', // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            chartPadding: {
              top: 0,
              right: 0,
              bottom: 0,
              left: 0
            },
          }

          var OutputChart = new Chartist.Line('#carPartChart', dataChart, optionsChart);

          md.startAnimationForLineChart(OutputChart);
        }

        function subscriptionChart()
        {
            dataChart = {
            labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
            series: [[
                <?php for($i = 0;$i < $limit;$i++): ?>
                    <?php echo $subscriptions->where('day' , $i)->sum('total'); ?>
                <?php if($i < ($limit-1)): ?> , <?php endif;endfor; ?>
            ]]
          };

          optionsChart = {
            lineSmooth: Chartist.Interpolation.cardinal({
              tension: 0
            }),
            low: '{{ $min_subscription }}',
            high: '{{ $max_subscription }}', // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            chartPadding: {
              top: 0,
              right: 0,
              bottom: 0,
              left: 0
            },
          }

          var OutputChart = new Chartist.Line('#subscriptionChart', dataChart, optionsChart);

          md.startAnimationForLineChart(OutputChart);
        }
  </script>
@endsection
