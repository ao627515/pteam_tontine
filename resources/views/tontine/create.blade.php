<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nouvelle tontine</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tontine-form" action="{{ route('tontine.store') }}" method="POST">
                    @csrf
                    <div class="row row-cols-2 text-start">
                        <div class="form-group col-md-6">
                            <label for="name">Nom:</label>
                            <input id="name" name="name" type="text" placeholder="Nom"
                                class="form-control required-field" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="profit">Bénéfice:</label>
                            <input id="profit" name="profit" type="number" placeholder="Bénéfice"
                                class="form-control required-field" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="delay">Délai:</label>
                            <input id="delay" name="delay" type="text" placeholder="Délai"
                                class="form-control required-field" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="periode">Période:</label>
                            <select id="periode" name="periode" class="form-select" required>
                                <option value="day">Jour</option>
                                <option value="week">Semaine</option>
                                <option value="month">Mois</option>
                                <option value="year">Année</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="amount">Montant:</label>
                            <input id="amount" name="amount" type="number" placeholder="Montant"
                                class="form-control required-field" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="number_of_members">Nombre de membres:</label>
                            <input id="number_of_members" name="number_of_members" type="number"
                                placeholder="Nombre de membres" class="form-control required-field" required>
                        </div>
                        <div class="form-group  col-12">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" class="form-control" rows="2" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" id="save-button" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
