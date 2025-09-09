<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOTES</title>

    <!-- A forma certa de carregar o conteúdo de usar uma pasta é usando o double-mustache com a função asset e dentro dela o path da pasta com o conteúdo -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
</head>

{{-- Dentro da Tag body haverá o arroba yield que trará o conteúdo de outros arquivos para serem apresentados dentro do body --}}
<body>
    
    @yield('conteudo')
    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
