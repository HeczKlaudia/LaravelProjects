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
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
    <div class="container">

        <div class="adatokMod">
            <form action="{{ url('/editPoject/'.$projekt->id) }}" method="POST">
                <div class="form-group">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="projekt_id" id="projekt_id">

                    <div class="form-header">
                        <h3>Adatok módosítása</h3>
                    </div>
                    <br>
                    <div class="sor">
                        <div class="form-group">
                            <label for="nev">Név:</label>
                            <br />
                            <input class="form-control" type="text" name="nev" class="nev" value="{{ old('nev') ?? $projekt->nev }}" />
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="leiras">Leírás:</label>
                            <br />
                            <input class="form-control" type="text" name="leiras" class="leiras" value="{{ old('leiras') ?? $projekt->leiras }}" /><br />
                        </div>
                    </div>

                    <div class="sor">
                        <div class="form-group">
                            <br />
                            <label for="">Jelenlegi státusz:</label>
                            <input disabled="false" type="text" value="{{ old('statusz') ?? $projekt->statusz }}">
                            <br><br>
                            <select select class="form-select" aria-label="Default select example" name="statusz">
                                <option name="statusz">-- Státusz --</option>
                                <option name="statusz">folyamatban</option>
                                <option name="statusz">kész</option>
                                <option name="statusz">fejlesztésre vár</option>
                            </select>
                        </div>
                        <br />
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Mentés</button>
                    <br>
                    <br>
                </div>
            </form>
        </div>

        <div class="jelenlegiKapcsolatok">
            <h3>Jelenlegi kapcsolatok</h3>
            <form action="{{ url('/editPoject/'.$projekt->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <br>
                    <label for="kapcsolat_id">Kapcsolatok:</label>
                    <br />
                    <div class="row">
                        @foreach($projekt_kapcs as $kapcs)
                        <div class="col-auto my-1">
                            <input disabled="false" class="form-control" type="text" value="{{ old('kapcs->nev') ?? $kapcs->nev }}">
                        </div>
                        <div class="col-auto my-1">
                            <form action="{{ url('/deleteKapcsolat/'.$kapcs->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn bg-transparent">
                                    <i class="fa fa-times" style="color: red;">X</i>
                                </button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
                <br>
            </form>
        </div>

        <div class="kapcsolatHozzaad">
            <h3>Kapcsolatok hozzáadása</h3>
            <form action="{{ url('/add_kapcsolat/'.$projekt->id) }}" method="POST">
                <div class="form-group">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="projekt_id" id="projekt_id">
                    <br>
                    <label for="">Kapcsolat hozzáadása:</label>
                    <select select class="form-select" aria-label="Default select example" name="kapcsolatok">
                        <option value="">Kapcsolattartó</option>
                        @foreach($addKapcsolat as $kapcs)
                        <option value="{{$kapcs->id}}">{{$kapcs->nev}}</option>
                        @endforeach
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary">Hozzáadás</button>
                    <br>
                    <br>
                </div>
            </form>
        </div>

        <div class="ujKapcsolat">
            <h3>Új kapcsolattartó létrehozása</h3>
            <form action="{{ route('uj_kapcsolat') }}" method="POST">
                @csrf
                <div class="form-group">
                    <br>
                    <label for="">Új kapcsolattartó felvétele:</label>
                    <div class="row g-3">
                        <div class="col">
                            <input type="text" name="nev" class="form-control" placeholder="Kapcsolattartó neve" aria-label="Kapcsolattartó neve név">
                        </div>
                        <div class="col">
                            <input type="text" name="email" class="form-control" placeholder="Kapcsolattartó email címe" aria-label="Kapcsolattartó email címe">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Hozzáadás</button>

                </div>

                <br>
            </form>
        </div>
        <a href="{{ url('/') }}">Vissza a főoldalra</a>

    </div>
</body>

</html>