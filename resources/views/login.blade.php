<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>PetFinder</title>
</head>

<body class="text-center">
    <nav class="navbar navbar-expand-xl bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link text-white" href="{{route('index')}}">Ínicio &nbsp;<span
                        class="fas fa-home"></span>
                </a>
            </li>
            <li class="nav-item"><a class="nav-link text-white" href="{{route('login_page')}}">Entrar &nbsp;<span
                        class="fas fa-door-open"></span>

                </a>
            </li>
            <li class="nav-item"><a href="{{route('sign_up')}}" class="nav-link text-white">Cadastre-se &nbsp;<span
                        class="fas fa-clipboard-list"></span>

                </a>
            </li>
        </ul>
    </nav>
    <main>
        <h1><img src="images/logo.png" alt="Logo do site" style="height: 250px;"></h1>
        <form action="{{route('login_user')}}" method="POST" class="form-group w-50 mx-auto">
            @csrf
            <div class="card w-50 mx-auto border-dark">
                <div class="card-header bg-dark text-white font-weight-bolder">
                    Usuário &nbsp; <span class="fas fa-user-circle"></span>
                </div>
                <div class="">
                    <input type="text" name="username" placeholder="" class="form-control border-0" required>
                </div>
            </div>
            <div class="card w-50 mx-auto mt-2 border-dark">
                <div class="card-header bg-dark text-white font-weight-bolder">
                    Senha &nbsp; <span class="fas fa-key"></span>
                </div>
                <div>
                    <input type="password" name="password" placeholder="" class="form-control border-0" required>
                </div>
            </div>
            <div class="mt-2 custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                <label for="remember" class="custom-control-label">Lembrar de Mim</label>
            </div>
            <button type="submit" class="mt-3 btn btn-dark">Entrar &nbsp;<span class="fas fa-door-open"></span></button>
        </form>
        <div class="col-3 mx-auto">
            @if (Session::exists('error'))
            <p class="alert alert-danger"><strong>{{Session::get('error')}}</strong></p>
            @endif
        </div>
    </main>
</body>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>