<form action="{{ url('/editPoject/'.$projekt->id) }}" method="POST">

    @method('PUT')
    @csrf
    <input type="hidden" name="projekt_id" id="projekt_id">

    <div class="form-header">
        <h3>Adatok módosítása</h3>
    </div>

    <div class="sor">
        <div class="inputfield">
            <label for="nev">Név:</label>
            <br />
            <input type="text" name="nev" class="nev" value="{{ old('nev') ?? $projekt->nev }}" />
        </div>

        <div class="inputfield">
            <label for="leiras">Leírás:</label>
            <br />
            <input type="text" name="leiras" class="leiras" value="{{ old('leiras') ?? $projekt->leiras }}" /><br />
        </div>
    </div>

    <div class="sor">
        <div class="inputfield">
            <label for="statusz">Státusz:</label>
            <br />
            <input type="text" name="statusz" class="statusz" value="{{ old('statusz') ?? $projekt->statusz }}">
        </div>

        <div class="inputfield">
            <label for="kapcsolat_id">Kapcsolatok:</label>
            <br />
            <input type="text" name="kapcsolat_id" class="kapcsolat_id" value="{{ old('kapcsolat_id') ?? $projekt->kapcsolat_id }}">
            {{dd(old('kapcsolat_id') ?? $projekt->kapcsolat_id)}}
            <br>
            <select select class="form-select" aria-label="Default select example" name="kapcsolatok">
                <option value="">Kapcsolattartó</option>
                @foreach($kapcsolatok as $kapcs)
                <option value="{{$projekt->nev}}">{{$kapcs->nev}}</option>
                @endforeach
            </select>
        </div>
    </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Mentés</button>
    </div>
</form>

<a href="{{ url('/') }}">Vissza a főoldalra</a>