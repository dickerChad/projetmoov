<div class="row p-4 pt-5">
    <!-- left column -->
  <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"> <i class="fas fa-user-plus fa-2x"></i> Formulaire de Création d'un utilisateur</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" wire:submit.prevent="addUser()">
          <div class="card-body">
            <div class="row">
               <div class="col-6">

                    <div class="form-group">
                      <label>Nom</label>
                      <input type="text"  wire:model="newUser.nom" class="form-control"  @error('newUser.nom') is-invalid  @enderror>
                      @error('newUser.nom') <span  class="text-danger">{{ $message}}</span>  @enderror
                    </div>


               </div>
               <div class="col-6">

                <div class="form-group">
                  <label>Prenom</label>
                  <input type="text" wire:model="newUser.prenom"  class="form-control" @error('newUser.prenom') is-invalid  @enderror>
                  @error('newUser.prenom') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div>
                
              </div>
            </div>

            <div class="form-group">
              <label>Sexe</label>
              <select class="form-control" wire:model="newUser.sexe"  >
                  <option value="">------- </option>
                  <option value="H">Homme </option>
                  <option value="F">Femme </option>
              </select>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control"  wire:model="newUser.email" @error('newUser.email') is-invalid  @enderror>
              @error('newUser.email') 
              <span class="text-danger">{{ $message}}</span> 
               @enderror
            </div>

            {{-- <div class="form-group">
              <label for="exampleInputFile">photo</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" wire:model="newUser.photo" >
                  <label class="custom-file-label" for="exampleInputFile">Choisir un fichier</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div> --}}

            <div class="form-group">
              <label >Mot de passe</label>
              <input type="password" class="form-control" disabled placeholder="Mot de passe">
            </div>
            
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">enregistrer</button>
            <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retourner a la liste des users</button>
          </div>
        </form>
      </div>
      <!-- /.card -->


  </div>
</div>
