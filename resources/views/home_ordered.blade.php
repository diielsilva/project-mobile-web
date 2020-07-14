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
        <h1><img src="../images/logo.png" style="height: 250px;"></h1>
        <div class="w-25 mx-auto">
            <form action="{{route('order_byState')}}" method="get" class="form-group">
                <div class="card border-dark w-50 mx-auto">
                    <div class="card-header bg-dark text-white font-weight-bolder">Filtrar por Estado &nbsp;<span
                            class="fas fa-map-marker-alt"></span></div>
                    <div>
                        <select name="state" class="form-control border-0">
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
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark mt-2">Filtrar &nbsp;<span
                        class="fas fa-filter"></span></button>
            </form>
        </div>
        <div class="w-100 mx-auto">
            @foreach ($res as $item)
            <div class="card w-50 mx-auto border-dark mb-3">
                <div class="card-header bg-dark text-white font-weigh-bolder">
                    <span class="float-left">{{$item->title}}</span><a href="http://localhost/petfinder/details/post/{{$item->id}}" class="float-right text-white">Detalhes
                        &nbsp;<span class="far fa-eye"></span></a>
                </div>
                <div class="card-body">
                    <img src="{{url('public/storage/images')}}/{{$item->photo}}"
                        style="width: 230px; object-fit: cover; height: 240px;" class="img-thumbnail float-left">
                    <h4>Descrição:</h4>
                    <p class="text-center">
                        {{$item->description}}
                    </p>
                    <p class="text-center font-weight-bolder">
                        Estado: <span class="font-weight-normal">{{$item->state}}</span>
                    </p>
                    <p class="text-center font-weight-bolder">
                        Data da Publicação: <span class="font-weight-normal">{{$item->datePost}}</span>
                    </p>
                </div>
            </div>
            @endforeach
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