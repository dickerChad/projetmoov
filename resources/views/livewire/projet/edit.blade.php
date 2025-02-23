<div class="row p-4 pt-5">
  <!-- left column -->
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"> <i class="fas fa-user-plus fa-2x"></i> Edition d'un projet</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form", wire:submit.prevent="updateProjet()">
        <div class="card-body">
          <div class="row ">
            <div class="col-md-6">
            <div class="card card-primary">
                
                <div class="card-body ">
                <div class="form-group">
                    <label for="inputName"> Nom du Projet</label>
                    <input type="text" id="inputName" wire:model="editProjet.nom" class="form-control" @error('editProjet.nom') is-invalid  @enderror>
                    @error('editProjet.nom') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div>
                <div class="form-group">
                    <label for="inputDescription"> Description du projet</label>
                    <textarea id="inputDescription"  wire:model="editProjet.description" class="form-control" rows="4"  @error('editProjet.description') is-invalid  @enderror> </textarea>
                        @error('editProjet.description') <span  class="text-danger">{{ $message}}</span>  @enderror

                    
                </div>
                {{-- <div class="form-group">
                    <label for="inputStatut">Status</label>
                    <select id="inputStatut"  wire:model="editProjet.statut_id" class="form-control custom-select"  @error('editProjet.statut_id') is-invalid  @enderror>
                       
                    <option selected="" disabled="">Select un</option>
                 
                    @foreach ($statuts as $statut)
                        <option value="{{$statut->id}}"> {{ $statut->nom}} </option>
                    @endforeach
                    </select>
                    @error('editProjet.statut_id"') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div> --}}
                <div class="form-group">
                    <label for="inputStatus">Departement</label>
                    <select id="departement_id"  wire:model="editProjet.departement_id" class="form-control custom-select" @error('editProjet.departement_id') is-invalid  @enderror>
                       
                    <option selected="" disabled="">Select un</option>
                
                    @foreach ($departements as $departement)
                        <option value="{{$departement->id}}"> {{ $departement->nom}} </option>
                    @endforeach
                    </select>
                     @error('editProjet.departement_id') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div>
              

                <div class="form-group">
                    <label for="inputStatus">leader du projet</label>
                    <select id="editProjet.user_id"  wire:model="editProjet.user_id" class="form-control custom-select" @error('editProjet.user_id') is-invalid  @enderror>
                       
                    <option selected="" disabled="">Select un</option>
                  
                    @foreach ($users as $user)
                        <option value="{{$user->id}}"> {{ $user->nom}} </option>
                    @endforeach
                    </select>
                     @error('editProjet.user_id') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <div class="col-md-6">
            <div class="card card-secondary">
                
                <div class="card-body">
              
    

                <div class="form-group">

                    <label for="inputdate_debut">Date debut</label>
                    <input type="date" id="inputdate_debut"  wire:model="editProjet.date_debut" class="form-control"   @error('editProjet.date_debut') is-invalid  @enderror>
                    @error('editProjet.date_debut') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div>
                <div class="form-group">
                    <label for="inputdate_fin">Date de fin</label>
                    <input type="date" id="inputdate_fin"  wire:model="editProjet.date_fin" class="form-control"  @error('editProjet.date_fin') is-invalid  @enderror>
                    @error('editProjet.date_fin') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="inputEstimatedDuration">duree</label>
                    <input type="number" id="inputEstimatedDuration"  wire:model="editProjet.duree" class="form-control"  @error('editProjet.duree') is-invalid  @enderror>
                    @error('editProjet.duree') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div> --}}

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>

          
         

          
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Appliquer</button>
          <button type="button" wire:click="goToListProjet()" class="btn btn-danger">Retourner a la liste des users</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
</div>

</div>
