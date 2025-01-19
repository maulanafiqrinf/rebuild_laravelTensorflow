<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Basic Elements') | Portofolio</title>
    <link rel="shortcut icon" type="image/png"
        href="https://sitedashseo.netlify.app/assets/images/logos/seodashlogo.png" />
    <link rel="stylesheet" href="https://sitedashseo.netlify.app/assets/css/styles.min.css" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('templates.components.sidemenu')
        <div class="body-wrapper">
            @include('templates.components.topbar')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script> --}}
    {{-- <script src="https://sitedashseo.netlify.app/assets/libs/jquery/dist/jquery.min.js"></script> --}}
    <script src="https://sitedashseo.netlify.app/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://sitedashseo.netlify.app/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="https://sitedashseo.netlify.app/assets/libs/simplebar/dist/simplebar.js'"></script>
    <script src="https://sitedashseo.netlify.app/assets/js/sidebarmenu.js"></script>
    <script src="https://sitedashseo.netlify.app/assets/js/app.min.js"></script>
    <script src="https://sitedashseo.netlify.app/assets/js/dashboard.js"></script>
</body>

</html>
