@include('component.helper')
@php
    requireAdmin();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<!-- Thêm thư viện Chart.js từ CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
</head>
<body>
<header>
    <h1>@yield('title')</h1>
</header>

@include('component.navad')

@yield('contentad')

@include('component.script')

</body>
</html>
