<!DOCTYPE html>

@if (\Request::is('rtl'))
<html dir="rtl" lang="ar">
@else
<html lang="en">
@endif

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @if (env('IS_DEMO'))
  <x-demo-metas></x-demo-metas>
  @endif

  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/img/kominfo.png')}}">
  <title>
    DISKOMINFO Salatiga
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">

  @auth
  @yield('auth')
  @endauth
  @guest
  @yield('guest')
  @endguest

  @if(session()->has('success'))
  <div x-data="{ show: true}"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
    class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
    <p class="m-0">{{ session('success')}}</p>
  </div>
  @endif
  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/datatables.js')}}"></script>


  @stack('rtl')
  @stack('dashboard')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const frequencyInput = document.getElementById('frequency');
      const impactInput = document.getElementById('impact');
      const levelInput = document.getElementById('level');


      function calculateLevel() {
        const frequency = parseInt(frequencyInput.value) || 0;
        const impact = parseInt(impactInput.value) || 0;
        const result = frequency + impact;

        let level = '';
        if (result >= 1 && result <= 4) {
          level = 'Low';
        } else if (result >= 5 && result <= 7) {
          level = 'Medium';
        } else if (result >= 8 && result <= 10) {
          level = 'High';
        }
        levelInput.value = level;
      }

      // Attach event listeners to update level when frequency or impact changes
      frequencyInput.addEventListener('input', calculateLevel);
      impactInput.addEventListener('input', calculateLevel);
    });
  </script>
  <script>
    // JavaScript untuk menghitung level berdasarkan frequency dan impact
    document.getElementById('frequency').addEventListener('change', updateLevel);
    document.getElementById('impact').addEventListener('change', updateLevel);

    function updateLevel() {
      var frequency = parseInt(document.getElementById('frequency').value);
      var impact = parseInt(document.getElementById('impact').value);
      var level = frequency + impact;
      var levelText = '';

      // Tentukan level berdasarkan hasil perhitungan
      if (level >= 1 && level <= 4) {
        levelText = 'Low';
      } else if (level >= 5 && level <= 7) {
        levelText = 'Medium';
      } else if (level >= 8 && level <= 10) {
        levelText = 'High';
      }

      // Set level pada input yang readonly
      document.getElementById('level').value = levelText;
    }

    // Jalankan fungsi pertama kali saat halaman di-load
    updateLevel();
  </script>

</body>

</html>