<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Manajemen Marketing</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href='/gambar/favicons/apple-touch-icon.png'>
    <link rel="icon" type="image/png" sizes="32x32" href='/gambar/favicons/favicon-32x32.png'>
    <link rel="icon" type="image/png" sizes="16x16" href='/gambar/favicons/favicon-16x16.png'>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.css">
    <link rel="stylesheet" href="/css/owl.transitions.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/meanmenu.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/educate-custon-icon.css">
    <link rel="stylesheet" href="/css/morrisjs/morris.css">
    <link rel="stylesheet" href="/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="/css/metisMenu/metisMenu-vertical.css">
    <link rel="stylesheet" href="/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/css/calendar/fullcalendar.print.min.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/style.css">

    <link rel="stylesheet" type="text/css" href="/js/DataTables/datatables.css">

    <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- Sidebar Left-->
    @include('layout.sidebar')

    <!-- Main Content -->
    <main style="padding: 40px;">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layout.footer')

    @stack('script')
</body>

</html>
