<form action="{{url('/projectEdit/'.$projekt->id)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-header">
        <h3>Adatok módosítása</h3>
    </div>

    <div class="sor">
        <div class="inputfield">
            <label for="alvazSzam">Alvázszám:</label>
            <br />
            <input type="text" name="alvazSzam" class="alvazSzam" value="{{ old('alvazSzam') ?? $projekt->alvazSzam }}" />

        </div>

        <div class="inputfield">
            <label for="statusz">Státusz:</label> <br />
            <input type="text" name="statusz" class="statusz" value="{{ old('statusz') ?? $projekt->statusz }}">
        </div>
    </div>

    <div class="sor">
        <div class="inputfield">
            <label for="telephely">Telephely (1-Budapest, 2-Székesfehérvár):</label>

            <br />
            <input type="text" name="telephely" class="telephely" value="{{ old('telephely') ?? $projekt->telephely }}" /><br />
        </div>

        <div class="inputfield">
            <label for="napiAr">Napi ár:</label> <br />
            <input type="text" class="napiAr" name="napiAr" value="{{ old('napiAr') ?? $projekt->napiAr }}" />
        </div>
    </div>

    <input type="submit" value="Adatok mentése" id="adatotMent" />

</form>