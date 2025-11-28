@extends('layouts.user_type.auth')

@section('content')

<div class="row">
  <!-- Card 1: Pengguna -->
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengguna</p>
              <h5 class="font-weight-bolder mb-0">{{ $user }}</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Card 2: Aset -->
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Aset</p>
              <h5 class="font-weight-bolder mb-0">{{ $asset }}</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-vector text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Card 3: Risiko -->
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Risiko</p>
              <h5 class="font-weight-bolder mb-0">{{ $risk }}</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-app text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Card 4: Mitigasi -->
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Mitigasi</p>
              <h5 class="font-weight-bolder mb-0">{{ $mitigation }}</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-xl-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4 class="mb-0">Jumlah Risiko Berdasarkan Level</h4>
      </div>
      <div class="card-body">
        <canvas id="riskLevelChart"></canvas>
      </div>
    </div>
  </div>
</div>
@endsection
@push('dashboard')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById('riskLevelChart').getContext('2d');
  var riskLevelChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Low', 'Medium', 'High'], // Labels for risk levels
      datasets: [{
        label: 'Jumlah Risiko',
        data: [{{ $lowCount }}, {{ $mediumCount }}, {{ $highCount }}], // Data passed from controller
        backgroundColor: [
          'rgba(60, 179, 113, 1)',
          'rgba(255, 165, 0, 1)',
          'rgba(255, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
@endpush
