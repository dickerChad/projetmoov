<div class="modal fade " id="EditModalTache" style="z-index: 1900;" tabindex="-1" role="dialog" wire:ignore.self aria-labelledby="myExtraLargeModalLabel"  aria-hidden="true" >
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edition de tache</h5>
                
              </div>
              <div  class="modal-body">

                <div class="d-flex m-4 bg-gray-light p-3">
                  <div class="d-flex flex-grow-1 mr-2">
                    <div class="flex-grow-1">
                    <input type="text" placeholder="nom" wire:model='editTacheModal.nom' class="form-control" @error('editTacheModal.nom') is-invalid  @enderror>
                    @error('editTacheModal.nom') 
                    <span class="text-danger">{{ $message}}</span> 
                     @enderror
                    
                  </div>
                  <div class="flex-grow-1">
                    <input type="date" placeholder="datedebut" wire:model='editTacheModal.dateDebut'  class="form-control" @error('editTacheModal.dateDebut') is-invalid  @enderror>
                    @error('editTacheModal.dateDebut') 
                    <span class="text-danger">{{ $message}}</span> 
                     @enderror
                  </div>
                  <div class="flex-grow-1">
                    <input type="date" placeholder="datefin" wire:model='editTacheModal.dateFin' class="form-control" @error('editTacheModal.dateFin') is-invalid  @enderror>
                    @error('editTacheModal.dateFin') 
                    <span class="text-danger">{{ $message}}</span> 
                     @enderror
                  </div>
                  <div>
                    <input type="number" placeholder="valeur" wire:model='editTacheModal.valeur' class="form-control" @error('editTacheModal.valeur') is-invalid  @enderror>
                    @error('editTacheModal.valeur') 
                    <span class="text-danger">{{ $message}}</span> 
                     @enderror
                  </div>
                  <div>
                    <select class="form-control" wire:model='editTacheModal.Estrealisee'  class="form-control" @error('editTacheModal.Estrealisee') is-invalid  @enderror>
                      @error('editTacheModal.Estrealisee') 
                      <span class="text-danger">{{ $message}}</span> 
                       @enderror
                      <option >--Champ requis--</option>
                      <option value="0"> NON</option>
                      <option value="1"> OUI</option>

                    </select>
                    </div>
                  </div >
                  <button class="btn btn-success" wire:click='updateTache'>Confirmer</button>


                </div>

              
                </div>
              </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-danger" wire:click="closeModal">Fermer</button>

        </div>
      </div>
    </div>
