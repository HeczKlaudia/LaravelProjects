<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projektlista</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

</head>

<body>
    <select class="form-select" aria-label="Default select example">
        <option selected>-- Szűrés státusz szerint --</option>
        <option value="1">One</option>
    </select>

    <div class="table-responsive">
        <h3>Projekt lista</h3>
        <a type="button" class="btn btn-outline-primary btn-sm" href="{{ url('/add-project') }}" data-bs-toggle="modal" data-bs-target="#ujProjektModal">Új projekt</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">név</th>
                    <th scope="col">leírás</th>
                    <th scope="col">státusz</th>
                    <th scope="col">kapcsolattartók száma</th>
                    <th scope="col">szerkesztés</th>
                    <th scope="col">törlés</th>
                </tr>

            </thead>
            <tbody>
                @foreach($projektek as $projekt)
                <tr>
                    <th scope="row">{{$projekt->id}}</th>
                    <td>{{$projekt->nev}}</td>
                    <td>{{$projekt->leiras}}</td>
                    <td>{{$projekt->statusz}}</td>
                    <td>
                        {{$projekt->osszes}}
                    </td>
                    <td>
                        <button href="{{url('/projectEdit/'.$projekt->id)}}" class="btn btn-primary">Szerkesztés</button>
                    </td>
                    <td><a href="/delete/{{$projekt['id']}}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</body>

</html>