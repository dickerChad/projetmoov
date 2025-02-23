<div>
  

 @include('livewire.projet.editTache')



    <div class="modal fade " id="modalProp"  tabindex="-1" role="dialog"  wire:ignore.self aria-labelledby="myExtraLargeModalLabel"      aria-hidden="true" >
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Gestion des taches de "{{  optional($selectedprojet)->nom}}"</h5>
                  
                </div>
                <div  class="modal-body">
  
                  <div class="d-flex m-4 bg-gray-light p-3">
                    <div class="d-flex flex-grow-1 mr-2">
                      <div class="flex-grow-1">
                      <input type="text" placeholder="nom" wire:model='newTacheModel.nom' class="form-control" @error('newTacheModel.nom') is-invalid  @enderror>
                      @error('newTacheModel.nom') 
                      <span class="text-danger">{{ $message}}</span> 
                       @enderror
                      
                    </div>
                    <div class="flex-grow-1">
                      <input type="date" placeholder="datedebut" wire:model='newTacheModel.dateDebut'  class="form-control" @error('newTacheModel.dateDebut') is-invalid  @enderror>
                      @error('newTacheModel.dateDebut') 
                      <span class="text-danger">{{ $message}}</span> 
                       @enderror
                    </div>
                    <div class="flex-grow-1">
                      <input type="date" placeholder="datefin" wire:model='newTacheModel.dateFin' class="form-control" @error('newTacheModel.dateFin') is-invalid  @enderror>
                      @error('newTacheModel.dateFin') 
                      <span class="text-danger">{{ $message}}</span> 
                       @enderror
                    </div>
                    <div>
                      <input type="number" min="0" placeholder="valeur" wire:model='newTacheModel.valeur' class="form-control" @error('newTacheModel.valeur') is-invalid  @enderror>
                      @error('newTacheModel.valeur') 
                      <span class="text-danger">{{ $message}}</span> 
                       @enderror
                    </div>
                    {{-- <div>
                      <select class="form-control" wire:model='newTacheModel.Estrealisee'  class="form-control" @error('newTacheModel.Estrealisee') is-invalid  @enderror>
                        @error('newTacheModel.Estrealisee') 
                        <span class="text-danger">{{ $message}}</span> 
                         @enderror
                        <option >--Champ requis--</option>
                        <option value="0" > NON</option>
                        <option value="1"> OUI</option>
  
                      </select>
                      </div> --}}
                    </div >
                    <button class="btn btn-success" wire:click='addTache'>Ajouter</button>
  
  
                  </div>
  
                <table class="table table-bordered">
                  <thead class="bg-primary">
                      <th> Nom</th>
                      <th> Date debut</th>
                      <th> Date fin</th>
                      <th> Poids</th>
                      <th> Est Realise</th>
                      <th> Action</th>
                  </thead>
                  <tbody>
                    
                    @forelse ($taches as $tache )
                      <tr>
  
                        <td> {{$tache->nom}} </td>
                        <td> {{$tache->dateDebut}}</td>
                        <td> {{$tache->dateFin}}</td>
                        <td> {{$tache->valeur}}</td>
                        {{-- <td>
                           {{-- {{$tache->Estrealisee == 0 ? "NON":"OUI" }} --}}
                           {{-- @if ($tache->Estrealisee)
                           <span class="badge badge-success"> OUI</span>
                           @else
                           <span class="badge badge-danger"> NON</span>

                           @endif
                          </td> --}}
                          <td>
                            <div id="accordion">
                            
                                  
                              
                              <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title flex-grow-1">
                                  <a data-parent="#accordion" href="#" aria-expanded="true">
                                      
                                  </a>
                                </h4>
                               
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"  >
                                      <input type="checkbox" class="custom-control-input"
                                      @if ($tache->Estrealisee == '1') checked @endif
                                      id="customSwitch{{$tache->id}}">
                                      <label class="custom-control-label" for="customSwitch{{$tache->id}}"></label>
                                      {{-- @json($tache->Estrealisee) --}}
                                </div>
                              

                                {{-- <div class="form-group">
                                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch{{$tache->Estrealisee}}">
                                    <label class="custom-control-label" for="customSwitch{{$tache->Estrealisee}}"></label>
                                  </div>
                                </div> --}}
                                {{-- <input type="checkbox" class="toggle-class" data-id="{{$tache->id}}" data-toggle="toggle" data-on="Enabled" data-off="Disabled" {{$tache->Estrealisee ==true ? 'checked' :'' }} >
                               --}}
                               
                            </div> 
                        
                           
                          </div>
                          </td>
                        <td> 
                          <button class="btn btn-link" wire:click="editTache({{$tache->id}})" ><i class="far fa-edit"></i> </button>
                          <button class="btn btn-link" wire:click="confirmDeleteTache('{{$tache->nom}}',{{$tache->id}})"> <i class="far fa-trash-alt"></i> </button>
                        </td>
  
  
                      </tr>
                    @empty
                    <span class="badge badge-warning"> ce projet n'a pas encore de tache</span> 
                    @endforelse 
                    
  
                  </tbody>
  
                </table>
                  </div>
                </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-danger" wire:click="closeModal">Fermer</button>
  
          </div>
        </div>
      </div>
  </div>


<script> 

  window.addEventListener("showEditModal", event=>{
    $("#EditModalTache").modal({
      "show": true
     //  "backdrop": "static"
    })

 })

window.addEventListener("closeEditModal", event=>{
  $("#EditModalTache").modal("hide")

})
</script> 
