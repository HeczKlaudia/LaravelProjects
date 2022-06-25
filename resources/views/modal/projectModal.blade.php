<!-- Új projekt Modal -->
<div class="modal fade" id="ujProjektModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Új projekt felvétele</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addform" action="{{ route('new_project') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row g-3">
                        <div class="col">
                            <input type="text" name="nev" class="form-control" placeholder="Projekt név" aria-label="Projekt név">
                        </div>
                        <div class="col">
                            <input type="text" name="leiras" class="form-control" placeholder="Leírás" aria-label="Leírás">
                        </div>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col">
                            <select select class="form-select" aria-label="Default select example" name="statusz">
                                <option name="statusz">-- Státusz --</option>
                                <option name="statusz">folyamatban</option>
                                <option name="statusz">kész</option>
                                <option name="statusz">fejlesztésre vár</option>
                            </select>
                        </div>
                        <div class="col">
                            <select select class="form-select" aria-label="Default select example" name="kapcsolatok">
                                <option value="">Kapcsolattartó</option>
                                @foreach($kapcsolatok as $kapcs)
                                <option value="{{$kapcs->id}}">{{$kapcs->nev}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
                    <button type="submit" class="btn btn-primary">Mentés</button>
                </div>
            </form>
        </div>
    </div>
</div>