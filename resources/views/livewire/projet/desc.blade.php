<div>

    <div class="modal fade" id="modalDesc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Description de  "{{  optional($selectedprojet)->nom}}"</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {{ optional($selectedprojet)->description}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
          </div>
        </div>
      </div>
    </div>
  
  
  </div>
  