<div class="row p-6 pt-2">
     
              
              
    <!-- Default box -->
    <div class="card">
      <div class="card-header  bg-gradient-primary">
        <h3 class="card-title flex-grow-1"> <i class="fas fa-tasks"></i> <span class="badge rounded-pill bg-warning">{{$currentStatut->nom}}</span> </h3>

        <div class="card-tools d-flex align-items-center">
              <div class="input-group input-group-md" style="width: 250px;">
                <input type="text" name="table_search"  wire:model.debounce='search' class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                </div>
        </div>

      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 10%">
                        nom du projet
                    </th>
                    <th style="width: 05%">
                        porteur du projet
                    </th>
                    <th style="width: 10%">
                      date_fin
                  </th>
                  <th style="width: 05%">
                    Durée
                  </th>
                  <th style="width: 10%">
                      description
                  </th>
                    <th  style="width: 10%">
                        Evolution
                    </th>
                  <th style="width: 10%">
                    Tache
                  </th>
              
                </tr>
            </thead>
            <tbody>
              
                @foreach ($projets as $projet)
                  
        {{-- @if ($projet->statut_id == 2) --}}
                <tr>
                    <td>
                      <span class="badge rounded-pill bg-primary">{{$projet->nom}}</span>
                      
                    </td>
                    <td>
                        <a>
                          {{ $projet->user->nom}}
                        </a>
                    </td>
                    
                    <td >
                      {{ $projet->date_fin}}
                    </td>
                    <td >
                      <span class="badge rounded-pill bg-warning text-dark">{{ (abs(strtotime($projet->date_fin)-strtotime($projet->date_debut)))/86400}} jours</span>
                    
                    </td>
                    <td>
                      <button class="btn btn-link"  wire:click="showDesc({{$projet->id}})"><i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Description"></i> </button>
                      
                    </td>
                  
                          
                    <td class="project_progress" >
                  
                          <div class="progress">
                            <div class="progress-bar " role="progressbar" style="width: {{$projet->valeurProjet}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$projet->valeurProjet}}%</div>
                            
                          </div>
                          
                      </div>

                      
                    </td>
                  
                    <td>
                      {{-- {{ $projet->tache_id}} --}}
                      <button class="btn btn-link"  wire:click="showProp({{$projet->id}})"><i class="fas fa-folder-open" data-bs-toggle="tooltip" data-bs-placement="top" title="Editer Tache"></i>
      
                    </td>
                    
                </tr>
                {{-- @endif --}}
                {{-- @endif  --}}
              @endforeach
              
            </tbody>
        </table>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
          <div class="float-right">
              {{ $projets->links() }}
          </div>
              
          </div>
      
        <!-- /.card -->
  <!-- /.content -->
  </div>
