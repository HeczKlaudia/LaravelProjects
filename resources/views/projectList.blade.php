<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    <div class="container">

        <form class="d-flex" role="search" method="GET" action="{{ route('search') }}">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>

        <div class="table-responsive">
            <h3>Projekt lista</h3>

            @if (session('status'))
            <div class="aler alert-success">{{ session('status') }}</div>
            @endif

            <a type="button" class="btn btn-outline-primary btn-sm" href="{{ url('/add-project') }}" data-bs-toggle="modal" data-bs-target="#ujProjektModal">Új projekt</a>

            @if($project_search->isNotEmpty())
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
                    @foreach($project_search as $projekt)
                    <tr>
                        <th scope="row">{{$projekt->id}}</th>
                        <td>{{$projekt->nev}}</td>
                        <td>{{$projekt->leiras}}</td>
                        <td>{{$projekt->statusz}}</td>
                        <td>
                            {{$projekt->osszes}}
                        </td>
                        <td>
                            <button type="button" value="{{$projekt->id}}" class="editbtn">Edit</button>

                        </td>
                        <td><a href="/delete/{{$projekt['id']}}">Delete</a></td>
                    </tr>
                    @endforeach
                    @else
                    <div>
                        <h2>No posts found</h2>
                    </div>
                    @endif
                </tbody>
            </table>
        </div>
        
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $project_search->links() !!}
        </div>

        @include('modal.szerkModal')
        @include('modal.projectModal')

    <!--     <script>
            $(document).ready(function() {

                $(document).on('click', '.editbtn', function() {

                    var projekt_id = $(this).val();
                    $("#szerkesztesModal").modal('show');

                    $.ajax({
                        type: "GET",
                        url: "/projectEdit/" + projekt_id,
                        success: function(response) {
                            //  console.log(response);
                            $('.nev').val(response.projekt.nev);
                            $('.leiras').val(response.projekt.leiras);
                            $('.statusz').val(response.projekt.statusz);
                            $('.kapcsolat_id').val(response.projekt.kapcsolat_id);
                        }
                    })
                });

            });
        </script> -->
    </div>
</body>

</html>