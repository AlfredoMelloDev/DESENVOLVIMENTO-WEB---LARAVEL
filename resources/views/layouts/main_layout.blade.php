<!DOCTYPE html>
<html lang="Pt-Br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Página Principal do Projeto</title>                  <!-- View principal que através do yield trará o conteúdo dos outros arquivos para cá -->
    </head>
    <body>

        <p>Text from the layout - TOP</p>

        <hr>

        @yield('conteudo')

        <hr>

        <p>Texto from the layout - BOTTOM</p>

    </body>
</html>
