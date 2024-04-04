<style>
  .animated-hr {
    border: 0;
    height: 3px;
    background: linear-gradient(90deg, #00ff00, #0000ff, #FFC700, #F7418F, #0D9276, #76ABAE, #B80000, #4D2DB7);
    background-size: 200% 100%;
    animation: animatedHr 2s infinite alternate;
  }

  @keyframes animatedHr {
    0% {
      background-position: 0 0;
    }

    100% {
      background-position: 100% 0;
    }
  }

  #gradient {
    background: hsla(197, 16%, 78%, 1);
    background: linear-gradient(315deg, hsla(197, 16%, 78%, 1) 0%, hsla(192, 17%, 94%, 1) 53%);
    background: -moz-linear-gradient(315deg, hsla(197, 16%, 78%, 1) 0%, hsla(192, 17%, 94%, 1) 53%);
    background: -webkit-linear-gradient(315deg, hsla(197, 16%, 78%, 1) 0%, hsla(192, 17%, 94%, 1) 53%);
    filter: progid: DXImageTransform.Microsoft.gradient(startColorstr="#BFCCD1", endColorstr="#eef2f3", GradientType=1);
  }

  #gradient:hover {
    background: linear-gradient(90deg, hsla(176, 73%, 88%, 1) 0%, hsla(45, 80%, 85%, 1) 100%);
    background: -moz-linear-gradient(90deg, hsla(176, 73%, 88%, 1) 0%, hsla(45, 80%, 85%, 1) 100%);
    background: -webkit-linear-gradient(90deg, hsla(176, 73%, 88%, 1) 0%, hsla(45, 80%, 85%, 1) 100%);
    filter: progid: DXImageTransform.Microsoft.gradient(startColorstr="#6699CC", endColorstr="#FFCC66", GradientType=1);
    transition: background 2.3s ease;

  }
</style>
@extends('layout.master')

@push('plugin-styles')
<!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')

<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <a href="{{ url('/supplier') }}">
        <div class="card-body" id="gradient">
          <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
            <div class="float-left">
            <img src="{{ url('assets/images/sidenav/dasSup.png') }}" alt="profile image">
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Total Supplier</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">{{ \App\PosAddSupplier::count() }}</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
            <hr class="animated-hr">
          </p>
        </div>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <a href="{{ url('/purchase') }}">
        <div class="card-body" id="gradient">
          <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
            <div class="float-left">
              <img src="{{ url('assets/images/sidenav/order.png') }}" alt="profile image">
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Purchase</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">{{ \App\PosPurchaseAdd::count() }}</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
            <hr class="animated-hr">
          </p>
        </div>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <a href="{{ url('/salesReturn') }}">
        <div class="card-body" id="gradient">
          <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
            <div class="float-left">
              <img src="{{ url('assets/images/sidenav/sales.png') }}" alt="profile image">
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Sales</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">{{ \App\PosPurchaseAdd::count() }}</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
            <hr class="animated-hr">
          </p>
        </div>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <a href="{{ url('/stockSummery') }}">
        <div class="card-body" id="gradient">
          <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
            <div class="float-left">
            <img src="{{ url('assets/images/sidenav/average.png') }}" alt="profile image">
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Stock</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">{{ \App\PosPurchaseAdd::count() }}</h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
            <hr class="animated-hr">
          </p>
        </div>
      </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Orders</h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> First name </th>
                <th> Progress </th>
                <th> Amount </th>
                <th> Sales </th>
                <th> Deadline </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="font-weight-medium"> 1 </td>
                <td> Herman Beck </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 77.99 </td>
                <td class="text-danger"> 53.64% <i class="mdi mdi-arrow-down"></i>
                </td>
                <td> May 15, 2015 </td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 2 </td>
                <td> Messsy Adam </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $245.30 </td>
                <td class="text-success"> 24.56% <i class="mdi mdi-arrow-up"></i>
                </td>
                <td> July 1, 2015 </td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 3 </td>
                <td> John Richards </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $138.00 </td>
                <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i>
                </td>
                <td> Apr 12, 2015 </td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 4 </td>
                <td> Peter Meggik </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 77.99 </td>
                <td class="text-danger"> 53.45% <i class="mdi mdi-arrow-down"></i>
                </td>
                <td> May 15, 2015 </td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 5 </td>
                <td> Edward </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 160.25 </td>
                <td class="text-success"> 18.32% <i class="mdi mdi-arrow-up"></i>
                </td>
                <td> May 03, 2015 </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row d-none">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
          <h2 class="card-title mb-0">Product Analysis</h2>
          <div class="wrapper d-flex">
            <div class="d-flex align-items-center mr-3">
              <span class="dot-indicator bg-success"></span>
              <p class="mb-0 ml-2 text-muted">Product</p>
            </div>
            <div class="d-flex align-items-center">
              <span class="dot-indicator bg-primary"></span>
              <p class="mb-0 ml-2 text-muted">Resources</p>
            </div>
          </div>
        </div>
        <div class="chart-container">
          <canvas id="dashboard-area-chart" height="80"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-6 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Schedules</h4>
        <div class="shedule-list d-flex align-items-center justify-content-between mb-3">
          <h3>27 Sep 2018</h3>
          <small>21 Events</small>
        </div>
        <div class="event border-bottom py-3">
          <p class="mb-2 font-weight-medium">Skype call with alex</p>
          <div class="d-flex align-items-center">
            <div class="badge badge-success">3:45 AM</div>
            <small class="text-muted ml-2">London, UK</small>
            <div class="image-grouped ml-auto">
              <img src="{{ url('assets/images/faces/face10.jpg') }}" alt="profile image">
              <img src="{{ url('assets/images/faces/face13.jpg') }}" alt="profile image">
            </div>
          </div>
        </div>
        <div class="event py-3 border-bottom">
          <p class="mb-2 font-weight-medium">Data Analysing with team</p>
          <div class="d-flex align-items-center">
            <div class="badge badge-warning">12.30 AM</div>
            <small class="text-muted ml-2">San Francisco, CA</small>
            <div class="image-grouped ml-auto">
              <img src="{{ url('assets/images/faces/face20.jpg') }}" alt="profile image">
              <img src="{{ url('assets/images/faces/face17.jpg') }}" alt="profile image">
              <img src="{{ url('assets/images/faces/face14.jpg') }}" alt="profile image">
            </div>
          </div>
        </div>
        <div class="event py-3">
          <p class="mb-2 font-weight-medium">Meeting with client</p>
          <div class="d-flex align-items-center">
            <div class="badge badge-danger">4.15 AM</div>
            <small class="text-muted ml-2">San Diego, CA</small>
            <div class="image-grouped ml-auto">
              <img src="{{ url('assets/images/faces/face21.jpg') }}" alt="profile image">
              <img src="{{ url('assets/images/faces/face16.jpg') }}" alt="profile image">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-4 grid-margin stretch-card">
    <div class="row flex-grow">
      <div class="col-md-6 col-xl-12 grid-margin grid-margin-md-0 grid-margin-xl stretch-card">
        <div class="card card-revenue">
          <div class="card-body d-flex align-items-center">
            <div class="d-flex flex-grow">
              <div class="mr-auto">
                <p class="highlight-text mb-0 text-white">$168.90</p>
                <p class="text-white">This Month</p>
                <div class="badge badge-pill">18%</div>
              </div>
              <div class="ml-auto align-self-end">
                <!-- Use the data from the controller in the spark chart -->
                <div id="revenue-chart" sparkType="bar" sparkBarColor="#e6ecf5" barWidth="2">{{ $dataString }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-12 stretch-card">
        <div class="card card-revenue-table">
          <div class="card-body">
            <div class="revenue-item d-flex">
              <div class="revenue-desc">
                <h6>Member Profit</h6>
                <p class="font-weight-light"> Average Weekly Profit </p>
              </div>
              <div class="revenue-amount">
                <p class="text-primary"> +168.900 </p>
              </div>
            </div>
            <div class="revenue-item d-flex">
              <div class="revenue-desc">
                <h6>Total Profit</h6>
                <p class="font-weight-light"> Weekly Customer Orders </p>
              </div>
              <div class="revenue-amount">
                <p class="text-primary"> +6890.00 </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="col-md-12 grid-margin">
  <div class="card">
    <div class="p-4 border-bottom bg-light">
      <h4 class="card-title mb-0">Mixed Chart</h4>
    </div>
    <div class="card-body">
      <canvas id="mixed-chart" height="100"></canvas>
      <div class="mr-5" id="mixed-chart-legend"></div>
    </div>
  </div>
</div>

@endsection

@push('plugin-scripts')
{!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
{!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
{!! Html::script('/assets/js/dashboard.js') !!}
@endpush
@push('custom-scripts')
{!! Html::script('/assets/js/chart.js') !!}
@endpush