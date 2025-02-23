<div class="row p-4 pt-5">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"> <i class="fas fa-user-plus fa-2x"></i> Edition d'un utilisateur</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form", wire:submit.prevent="updateUser()">
          <div class="card-body">
            <div class="row">
               <div class="col-6">

                <div class="form-group">
                  <label>Nom</label>
                  <input type="text"  wire:model="editUser.nom" class="form-control"  @error('editUser.nom') is-invalid  @enderror>
                  @error('editUser.nom') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div>


               </div>
               <div class="col-6">

                <div class="form-group">
                  <label>Prenom</label>
                  <input type="text" wire:model="editUser.prenom"  class="form-control" @error('editUser.prenom') is-invalid  @enderror>
                  @error('editUser.prenom') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div>
                
              </div>
            </div>

            <div class="form-group">
              <label>Sexe</label>
              <select class="form-control" wire:model="editUser.sexe"  >
                  <option value="">------- </option>
                  <option value="H">Homme </option>
                  <option value="F">Femme </option>
              </select>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control"  wire:model="editUser.email" @error('editUser.email') is-invalid  @enderror>
              @error('editUser.email') 
              <span class="text-danger">{{ $message}}</span> 
               @enderror
            </div>

            <div class="form-group">
              <label for="exampleInputFile">photo</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" wire:model="editUser.photo" >
                  <label class="custom-file-label" for="exampleInputFile">Choisir un fichier</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>

            
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Appliquer</button>
            <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retourner a la liste des users</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
  </div>

    <div class="col-md-6">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"> <i class="fas fa-key fa-2x"></i>Renitialisation de mot de passe</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
              
                  <div class="card-body">
                      <ul>
                        <li>
                            <a href="#" class="btn btn-link" wire:click.prevent="resetPassword()">Réinitialiser le mot de passe</a>
                            <span>(par défaut: "password") </span>
                        </li>
                    </ul>
      
                  
                  </div>
              <!-- /.card-body -->
    
              
           </div>
            <div class="col-md-12 mt-4">
              <div class="card card-primary">
                  <div class="card-header d-flex align-items-center">
                    <h3 class="card-title flex-grow-1"> <i class="fas fa-fingerprint fa-2x"></i>Role et permissions</h3>
                    <button class="btn bg-gradient-success" wire:click="updateRole"><i class="fas fa-check"></i> Appliquer les modif</button>
                  </div>
                    <!-- /.card-header -->
                    <!-- form start -->
             
                  <div class="card-body">
                    <div id="accordion">
                      @foreach ($roleAttr["roles"] as $role)
                          
                      
                      <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title flex-grow-1">
                          <a data-parent="#accordion" href="#" aria-expanded="true">
                              {{$role["role_nom"]}}
                          </a>
                        </h4>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                              <input type="checkbox" class="custom-control-input" wire:model.lazy="roleAttr.roles.{{$loop->index}}.active"
                              @if($role["active"]) checked @endif
                              id="customSwitch{{$role['role_id']}}">
                              <label class="custom-control-label" for="customSwitch{{$role['role_id']}}"> {{$role["active"]? "Activé" : "Desactivé" }}</label>

                        </div>
                    </div> 
                    @endforeach
                    {{-- @json($roleAttr["roles"]) --}}
                  </div>
                   <!-- /.card-body -->
      
                
              </div>
           </div>

          </div>
        </div> 


    </div>
</div>
