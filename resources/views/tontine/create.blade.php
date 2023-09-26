<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
            <form id="" action="{{route('tontine.store')}}">

                <div class="row row-cols-2">
                <div class="col mb-2">
                    <input name="name" type="text" placeholder="nom" class="form-control">
                </div>
                <div class="col mb-2">
                    <input name="" type="number" placeholder="benefice" class="form-control">
                </div>
                <div class="col mb-2">
                    <input name="" type="text" placeholder="delai" class="form-control">
                </div>
                <div class="col mb-2">
                    <select name="periode" id="" class="form-select">
                        <option value="day">Jour</option>
                        <option value="week">semaine</option>
                        <option value="mont">mois</option>
                        <option value="year">annee</option>
                    </select>
                    
                </div>
                <div class="col mb-2">
                    <input name="" type="number" placeholder="montant">
                </div>
                <div class="col mb-2">
                    <input name="" type="number" placeholder="nombre de membre">
                </div>
                <div>
                <textarea name="description" id="" class="form-control" rows="2">description</textarea>

                </div>
             </div>
             <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
        </form>    
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->