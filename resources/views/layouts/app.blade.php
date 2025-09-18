<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded m-3">
    <div class="container">
        <a class="navbar-brand " href="/users">Users</a>
    </div>

    <form action="{{route("logout")}}" method="post">
        @csrf
        @method('POST')
        <button type="submit" class="btn btn-info" onclick="confirm('Haqiqatdan ham tizimdan chiqishni hohlaysizmi')">
            Logout
        </button>
    </form>
</nav>
<div class="">
    @yield('content')
</div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
