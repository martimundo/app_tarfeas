<!DOCTYPE html>
<html lang="pt-BR">


    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sem acesso</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>


    <body>
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">404</h1>
                <p class="fs-3"> <span class="text-danger">Opps!</span>Você não esta logado.</p>
                <p class="lead">
                    Faça Login para Acessar a Aplicação
                  </p>
                <a href="{{route('login')}}" class="btn btn-primary">Acessar Sistema</a>
            </div>
        </div>
    </body>


</html>