<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield("title")</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="icon" href="{{ asset('images/logo-trans.png') }}" type="image/png">
</head>
<body>
  @include('components.navbar')
  @include('components.footer')
</body>
<script src="{{ asset('js/bootstrap.js') }}"></script>
</html>