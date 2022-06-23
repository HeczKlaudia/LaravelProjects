<!--Szerkesztés Modal -->
<div class="modal fade" id="szerkesztesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/edit-project/'.$projekt->id) }}" method="POST">
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
                            <input type="text" name="nev" class="nev" />
                        </div>

                        <div class="inputfield">
                            <label for="leiras">Leírás:</label>
                            <br />
                            <input type="text" name="leiras" class="leiras" /><br />
                        </div>
                    </div>

                    <div class="sor">
                        <div class="inputfield">
                            <label for="statusz">Státusz:</label>
                            <br />
                            <input type="text" name="statusz" class="statusz">
                        </div>

                        <div class="inputfield">
                            <label for="kapcsolat_id">Kapcsolatok:</label>
                            <br />
                            <input type="text" class="kapcsolat_id" name="kapcsolat_id" />
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Mentés</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
            </div>
            </form>
        </div>
    </div>
</div>