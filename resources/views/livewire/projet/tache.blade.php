<div>
  
  
  <div class="row p-4 pt-5">

        
          
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-gradient-primary align-items-center">
                  <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i>Tache du projet 
                      {{-- @foreach ($taches as $tache)
                      {{ $tache->projet_id }}
                      @endforeach --}}
                  </h3> 
        
                  <div class="card-tools d-flex align-items-center">
                      {{-- <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddTache()"><i class="fas fa-user-plus"> </i> Nouvel utilisateur </a> --}}
                    <div class="input-group input-group-md" style="width: 250px;">
                      <input type="text" name="table_search" wire:model.debounce='search' class="form-control float-right" placeholder="Search">
        
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th style="width:20%;">nom</th>
                        <th style="width:15%;">Date debut</th>
                        <th style="width:15%;" class="text-center">Date fin</th>
                        <th style="width:10%;" class="text-center">Valeur</th>
                        <th style="width:10%;" class="text-center">Estrealisee</th>
                        <th style="width:30%;" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($taches as $tache)
                      <tr>
                      <td> {{$tache->nom}} </td>  
                      
                      <td> {{$tache->dateDebut }} </td>  

                      <td> {{ $tache->dateFin }} </td>  

                      <td> {{ $tache->valeur }} </td>  

                      {{-- <td> {{ $tache->Estrealisee }} </td>   --}}
                        <td>
                          <div id="accordion">
                          
                                
                            
                            <div class="card-header d-flex justify-content-between">
                              <h4 class="card-title flex-grow-1">
                                <a data-parent="#accordion" href="#" aria-expanded="true">
                                    
                                </a>
                              </h4>
                              <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input"
                                    id="customSwitch">
                                    <label class="custom-control-label" for="customSwitch"></label>
      
                              </div>
                          </div> 
                      
                         
                        </div>
                        </td>
                      <td>
                        <button class="btn btn-link"  wire:click=""><i class="far fa-edit"></i> </button>
                            <button class="btn btn-link" wire:click=""> <i class="far fa-trash-alt"></i> </button>
                      </td>  

                          
                      </tr>  
                      

                      @endforeach
                    
                            

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <div class="float-right">
                    
                </div>
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
     </div>
</div>
   