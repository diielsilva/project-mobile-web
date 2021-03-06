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
                        class="fas fa-home"></span></a></li>
            <li class="nav-item dropdown">
                <a href="" class="text-white nav-link dropdown-toggle" data-toggle="dropdown" id="navPost"
                    aria-expanded="false" aria-haspopup="true" role="button">Publicações&nbsp;<span
                        class="fas fa-tags"></span>&nbsp;</a>
                <div class="dropdown-menu" aria-labelledby="navPost">
                    <a href="{{route('page_store')}}" class="dropdown-item">Adicionar Publicação&nbsp;<span
                            class="fas fa-plus"></span></a>
                    <a href="{{route('show_myPosts')}}" class="dropdown-item">Minhas Publicações&nbsp;<span
                            class="fas fa-user-tag"></span></a>
                </div>
            </li>
            <li class="nav-item dropdown"><a href="#" class="nav-link text-white dropdown-toggle" data-toggle="dropdown"
                    role="button" aria-expanded="false" aria-haspopup="true" id="navPerfil">Perfil&nbsp;<span
                        class="fas fa-user-circle">&nbsp;</span></a>
                <div class="dropdown-menu" aria-labelledby="navPerfil">
                    <a href="{{route('details_user')}}" class="dropdown-item">Ver Perfil &nbsp;<span class="far fa-eye"></span></a>
                    <a href="{{route('edit_page')}}" class="dropdown-item">Editar Perfil &nbsp;<span class="far fa-edit"></span></a>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('logout_user')}}" class="dropdown-item">Sair &nbsp;<span
                            class="fas fa-power-off"></span></a>
                </div>
            </li>
        </ul>
    </nav>
    <main>
        <h1><img src="../../images/logo.png" alt="" style="height: 250px;"></h1>
        <section>
            <form action="{{route('store_post')}}" method="POST" class="form-group w-50 mx-auto"
                enctype="multipart/form-data">
                @csrf
                <div class="card w-50 border-dark mx-auto">
                    <div class="card-header bg-dark text-white font-weight-bolder">
                        Título &nbsp;<span class="fas fa-thumbtack"></span>
                    </div>
                    <div>
                        <input type="text" name="title" class="form-control border-0" required>
                    </div>
                </div>
                <div class="card w-50 border-dark mx-auto mt-2">
                    <div class="card-header bg-dark text-white font-weight-bolder">
                        Descrição &nbsp;<span class="fas fa-file-alt"></span>
                    </div>
                    <div class="">
                        <textarea name="description" maxlength="350" id="" cols="30" rows="10" class="form-control border-0"
                            required></textarea>
                    </div>
                </div>
                <div class="card w-50 border-dark mt-2 mx-auto">
                    <div class="card-header text-white font-weigh-bolder bg-dark">
                        Foto &nbsp;<span class="fas fa-image"></span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" class="form-control border-0" id="customFileUpload"
                            lang="pt-br" required>
                        <label for="customFileUpload" class="custom-file-label">Escolha sua Imagem</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark mt-2">Publicar &nbsp;<span
                        class="fas fa-tags"></span></button>
            </form>
        </section>
        @if (Session::exists('error'))
        <div class="col-3 mx-auto">
            <p class="alert alert-danger"><strong>{{Session::get('error')}}</strong></p>
        </div>
        @endif
        @if (Session::exists('success'))
        <div class="col-3 mx-auto">
            <p class="alert alert-success"><strong>{{Session::get('success')}}</strong></p>
        </div>
        @endif
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