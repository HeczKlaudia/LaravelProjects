<!--Szerkesztés Modal -->
<div class="modal fade" id="szerkesztesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('/edit/'.$projects->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-header">
                        <h3>Adatok módosítása</h3>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="alvazSzam">Alvázszám:</label>
                            <br />
                            <input type="text" name="alvazSzam" class="alvazSzam" value="{{ old('alvazSzam') ?? $projects->alvazSzam }}" />

                        </div>

                        <div class="inputfield">
                            <label for="statusz">Státusz:</label> <br />
                            <input type="text" name="statusz" class="statusz" value="{{ old('statusz') ?? $projects->statusz }}">
                        </div>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="telephely">Telephely (1-Budapest, 2-Székesfehérvár):</label>

                            <br />
                            <input type="text" name="telephely" class="telephely" value="{{ old('telephely') ?? $projects->telephely }}" /><br />
                        </div>

                        <div class="inputfield">
                            <label for="napiAr">Napi ár:</label> <br />
                            <input type="text" class="napiAr" name="napiAr" value="{{ old('napiAr') ?? $projects->napiAr }}" />
                        </div>
                    </div>

                    <input type="submit" value="Adatok mentése" id="adatotMent" />

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
                <button type="button" class="btn btn-primary">Mentés</button>
            </div>
        </div>
    </div>
</div>