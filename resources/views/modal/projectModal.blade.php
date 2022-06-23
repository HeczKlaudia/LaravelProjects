<!-- Új projekt Modal -->
<div class="modal fade" id="ujProjektModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Új projekt felvétele</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Projekt név" aria-label="Projekt név">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Leírás" aria-label="Leírás">
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Státusz" aria-label="Státusz">
                    </div>
                    <div class="col">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>-- Kapcsolattartó --</option>
                            <option value="1">One</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
                <button type="button" class="btn btn-primary">Mentés</button>
            </div>
        </div>
    </div>
</div>