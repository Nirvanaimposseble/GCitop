<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GC ITOP | Dashboard</title>
    <!--Feater-->
    <link rel="stylesheet" href="{{asset('assets/vendors/feather/feather.css')}}">
    <!--Themify-->
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <!--Vendor Bundle-->
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!--Bootstrap-->
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!--Datatables-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/select.dataTables.min.css')}}">
    <!--End plugins css for this page-->
    <link rel="stylesheet" href="{{asset('assets/css/vertical-layout-light/style.css')}}">
    <!--endiject-->
    <link rel="shortcut icon" href="/assets/images/favicon.png">
    <!--Icon-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<style>
    .dl-horizontal dt {
        float: left;
        width: auto;
        clear: left;
        text-align: left;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-weight: bold;
    }

    .dl-horizontal dd {
        margin-left: 0;
        margin-right: 0;
    }
</style>
<body>
    {{-- Sweet alert --}}
    <script src="{{asset('assets/js/cdn.jsdelivr.net.js')}}"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: '{{ session('success') }}',
                icon: 'success',
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                showConfirmButton: false
            });
        </script>
    @endif

    <div class="container-sroller">
        @include('layouts.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.sidebar')

            @yield('content')
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function handleSelectChange() {
            var kategoriId = $('#kategoriTicket').val();
            if (kategoriId) {
                $.ajax({
                    url: '{{ route("getSubcategories") }}',
                    type: 'GET',
                    data: { kategoriId: kategoriId },
                    dataType: 'json',
                    success: function(data) {
                        $('#subKategori').empty();
                        $.each(data, function(key, value) {
                            $('#subKategori').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#subKategori').empty();
            }
        }

        $(document).ready(function() {
            $('#kategoriTicket').on('change', handleSelectChange);
        });
    </script>

    <!-- partial:partials/_footer.html -->
        <footer class="footer bg-white">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.<a href="" target="_blank"></a>All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>

    <!--Plugins JS-->
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!--endinject-->
    <!--Plugin js for page-->
    <script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
    <!--End plugins js for page-->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/template.js')}}"></script>

    <!--Endject-->
    <script src="{{asset('assets/js/jquery.cookie.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/Chart.roundedBarCharts.js')}}"></script>

    <script src="{{asset('assets/js/data-table.js')}}"></script>

</body>
</html>
