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
            <li class="nav-item"><a href="" class="nav-link text-white">Cadastre-se &nbsp;<span
                        class="fas fa-clipboard-list"></span>

                </a>
            </li>
        </ul>
    </nav>
    <main>
        <h1><img src="images/logo.png" alt="Logo do site" style="height: 250px;"></h1>
        <form action="{{route('store_user')}}" method="post" class="form-group w-50 mx-auto">
            @csrf
            <div class="card w-50 mx-auto border-dark">
                <div class="card-header bg-dark text-weight-bolder text-white">
                    Usuário &nbsp;<span class="fas fa-user-circle"></span>
                </div>
                <div>
                    <input type="text" name="username" class="form-control border-0" required>
                </div>
            </div>
            <div class="card w-50 mx-auto mt-2 border-dark">
                <div class="card-header bg-dark text-weight-bolder text-white">
                    Senha &nbsp;<span class="fas fa-key"></span>
                </div>
                <div>
                    <input type="password" name="password" class="form-control border-0" required>
                </div>
            </div>
            <div class="card w-50 mx-auto mt-2 border-dark">
                <div class="card-header bg-dark text-white text-weight-bolder">
                    Telefone &nbsp;<span class="fas fa-phone"></span>
                </div>
                <div>
                    <input type="text" name="telephone" minlength="11" maxlength="11" placeholder="DDD Obrigatório"
                        class="border-0 form-control" required>
                </div>
            </div>
            <div class="card w-50 mx-auto mt-2 border-dark">
                <div class="card-header bg-dark text-white text-weight-bolder">
                    Estado &nbsp;<span class="fas fa-map-marker-alt"></span>
                </div>
                <div><select name="state" class="form-control border-0" required>
                        <option value="" selected disabled>...</option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                        <option value="DF">DF</option>
                    </select></div>
            </div>
            <button type="submit" class="btn btn-dark mt-2">Cadastrar &nbsp;<span
                    class="fas fa-clipboard-list"></span></button>
        </form>
        <div class="col-3 mx-auto">
            @if (Session::exists('error'))
            <p class="alert alert-danger"><strong>{{Session::get('error')}}</strong></p>
            @endif
        </div>
        <div class="col-3 mx-auto">
            @if (Session::exists('success'))
            <p class="alert alert-success"><strong>{{Session::get('success')}}</strong></p>
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