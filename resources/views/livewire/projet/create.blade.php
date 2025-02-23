<div class="row p-4 pt-5">
  <div class="col-md-100">
    <!-- Content Header (Page header) -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> <i class="fas fa-user-plus fa-2x"></i> Formulaire de Création d'un projet</h3>
        </div>

        <!-- Main content -->
     <form role="form" wire:submit.prevent="addProjet()">
        <section class="content">
        <div class="row ">
            <div class="col-md-6">
            <div class="card card-primary">
                
                <div class="card-body ">
                <div class="form-group">
                    <label for="inputName"> Nom du Projet </label>
                    <input type="text" id="inputName" wire:model="newprojet.nom" class="form-control" @error('newprojet.nom') is-invalid  @enderror>
                    @error('newprojet.nom') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div>
                <div class="form-group">
                    <label for="inputDescription"> Description du projet</label>
                    <textarea id="inputDescription"  wire:model="newprojet.description" class="form-control" rows="4"  @error('newprojet.description') is-invalid  @enderror> </textarea>
                        @error('newprojet.description') <span  class="text-danger">{{ $message}}</span>  @enderror

                    
                </div>
                {{-- <div class="form-group">
                    <label for="inputStatut">Status</label>
                    <select id="inputStatut"  wire:model="newprojet.statut_id" class="form-control custom-select"  @error('newprojet.statut_id') is-invalid  @enderror>
                       
                    <option selected="" disabled="">Select un</option>
                    {{-- <option>Non demarré</option>
                    <option>En cours</option>
                    <option>Terminé</option> --}} 
                    {{-- @foreach ($statuts as $statut)
                        <option value="{{$statut->id}}"> {{ $statut->nom}} </option>
                    @endforeach
                    </select>
                    @error('newprojet.statut_id"') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div> --}}
                
                <div class="form-group">
                    <label for="inputStatus">Departement</label>
                    <select id="departement_id"  wire:model="newprojet.departement_id" class="form-control custom-select" @error('newprojet.departement_id') is-invalid  @enderror>
                       
                    <option >Select un</option>
                    {{-- <option>Commerciale</option>
                    <option>RS et IT</option>
                    <option>DRF</option>
                    <option>Audit</option>
                    <option>Direction Generale</option> --}}
                    @foreach ($departements as $departement)
                        <option value="{{$departement->id}}"> {{ $departement->nom}} </option>
                    @endforeach
                    </select>
                     @error('newprojet.departement_id') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="inputProjectLeader">Leader du projet</label>
                    <input type="text" id="inputProjectLeader"  wire:model="newprojet.user_id" class="form-control" @error('newprojet.user_id') is-invalid  @enderror>


                    @error('newprojet.user_id') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div> --}}
                {{-- <div class="form-group">
                    <label for="inputProjectLeader">Leader du projet</label>
                       {{auth()->user()->id}} 
                </div> --}}

                {{-- <div class="form-group">
                    <label for="inputStatus">leader du projet</label>
                    <select id="newprojet.user_id"  wire:model="newprojet.user_id" class="form-control custom-select" @error('newprojet.user_id') is-invalid  @enderror>
                       
                    <option selected="" disabled="">Select un</option>
                  
                    @foreach ($users as $user)
                        <option value="{{$user->id}}"> {{ $user->nom}} </option>
                    @endforeach
                    </select>
                     @error('newprojet.user_id') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div> --}}


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <div class="col-md-6">
            <div class="card card-secondary">
                
                <div class="card-body">
                    {{-- <div class="form-group">
                        <label for="inputProjectTache">Tache du projet</label>
                        <input type="text" id="inputProjectTache"  wire:model="newprojet.taches.nom" class="form-control"  @error('newprojet.taches.nom') is-invalid  @enderror>
                        @error('newprojet.taches.nom') <span  class="text-danger">{{ $message}}</span>  @enderror
                    </div>   --}}

                    {{-- <div class="form-group">
                        <label for="inputProjectTache">Tache</label>
                        <select id="newprojet.tache_id"  wire:model="newprojet.tache_id" class="form-control custom-select" @error('newprojet.tache_id') is-invalid  @enderror>
                           
                        <option selected="" disabled="">Select un</option>
                      
                        @foreach ($taches as $tache)
                            <option value="{{$tache->id}}"> {{ $tache->nom}} </option>
                        @endforeach
                        </select>
                         @error('newprojet.tache_id') <span  class="text-danger">{{ $message}}</span>  @enderror
                    </div> --}}
    

                <div class="form-group">

                    <label for="inputdate_debut">Date debut</label>
                    <input type="date" id="inputdate_debut"  wire:model="newprojet.date_debut" class="form-control"   @error('newprojet.date_debut') is-invalid  @enderror>
                    @error('newprojet.date_debut') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div>
                <div class="form-group">
                    <label for="inputdate_fin">Date de fin</label>
                    <input type="date" id="inputdate_fin"  wire:model="newprojet.date_fin" class="form-control"  @error('newprojet.date_fin') is-invalid  @enderror>
                    @error('newprojet.date_fin') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="inputEstimatedDuration">duree</label>
                    <input type="number" id="inputEstimatedDuration"  wire:model="newprojet.duree" class="form-control"  @error('newprojet.duree') is-invalid  @enderror>
                    @error('newprojet.duree') <span  class="text-danger">{{ $message}}</span>  @enderror
                </div> --}}

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="button" wire:click="goToListProjet()" class="btn btn-danger">Retourner a la liste des projets</button>
            {{-- <a href="#" class="btn btn-secondary">Cancel</a> --}}
            <input type="submit" value="Créer nouveau projet" class="btn btn-success float-right">
            </div>
        </div>
        </section>
     </form> 
        <!-- /.content -->
    </div>
   </div>
  </div>