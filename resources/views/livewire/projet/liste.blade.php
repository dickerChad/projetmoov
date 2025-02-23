{{-- 
 @include("livewire.projet.edit") --}}
<div>

@include("livewire.projet.tachemodal")

@include("livewire.projet.desc")


<div class="row p-2 pt-2">
 
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header  bg-gradient-primary">
          <h3 class="card-title flex-grow-1"> <i class="fas fa-tasks"></i> Projets</h3>

          <div class="card-tools d-flex align-items-center">
               <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddProjet()"><i class="fas fa-tasks"> </i>Nouveau projet </a>
                <div class="input-group input-group-md" style="width: 250px;">
                  <input type="text" name="table_search"  wire:model.debounce='search' class="form-control float-right" placeholder="recherche">

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
                          Nom du projet
                      </th>
                      <th style="width: 05%">
                          Porteur du projet
                      </th>
                      <th style="width: 10%">
                          Date debut
                      </th>
                      <th style="width: 10%">
                        Date fin
                    </th>
                    <th style="width: 05%">
                      Durée
                   </th>
                    <th style="width: 10%">
                        Description
                    </th>
                      <th  style="width: 10%">
                          Evolution
                      </th>
                      <th style="width: 10%" class="text-center">
                          Status
                      </th>
                      <th style="width: 10%">
                         Departement
                    </th>
                    <th style="width: 10%">
                      Tache
                    </th>
                    <th style="width: 20%">
                      Retard
                </th>

                      <th style="width: 20%">
                            Action
                      </th>
                     
                      
                  </tr>
              </thead>
              <tbody>
               
                 
              
                 
                
                 @foreach ($projets as $projet)
                     {{-- @if ($projet->user->id ==  auth()->user()->id ) --}}
                       
                     
                  
                  <tr>
                      <td>
                        <span class="badge rounded-pill bg-primary">{{$projet->nom}}</span>
                        
                      </td>
                      <td>
                          <a>
                            {{ $projet->user->nom}}
                          </a>
                          <br>
                          <small>
                              
                          </small>
                      </td>
                      <td>
                          
                          {{ $projet->date_debut}}
                      </td>
                      <td >
                        {{ $projet->date_fin}}
                      </td>
                      <td >
                        <span class="badge rounded-pill bg-warning text-dark">{{ (abs(strtotime($projet->date_fin)-strtotime($projet->date_debut)))/86400}} jours</span>
                        
                       
                      </td>
                      <td>
                        <button class="btn btn-link"  wire:click="showDesc({{$projet->id}})"><i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Description"></i> </button>
                        {{-- Description --}}
                      </td>
                      {{-- @php
                        $som= somme();
                      @endphp --}}
                           
                      <td class="project_progress" >
                   
                        {{-- <div class="progress progress-sm">  --}}
                          
                              {{-- <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:{{$projet->valeurProjet}}%">
                            </div>  --}}
                            {{-- {{ \Illuminate\Support\Facades\DB::table('taches')->where("projet_id",$projet->id)
                              ->where('Estrealisee', '1')
                              ->sum('valeur') 
                             }}
                             --}}
                             
                             <div class="progress">
                              <div class="progress-bar " role="progressbar" style="width: {{$projet->valeurProjet}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$projet->valeurProjet}}%</div>
                              
                            </div>
                           
                        </div>

                       
                        {{-- {{ \App\Models\Tache::where('Estrealisee', '1')->where('projet_id','=','7')->sum("valeur") }} --}}
                      
                        {{-- <div class="progress">
                          <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                          
                        </div> --}}
                        
                        
                       
                        
                        
                        {{-- <div class="progress">

                          <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> --}}
                    
                        {{-- <small>
                            57% Complete
                        </small> --}}
                      </td>
                      <td >
                        {{-- <span class="badge badge-success">Success</span> --}}

                        {{-- <span class="badge badge-success">  {{ $projet->statut->nom}}</span> --}}
                       

                              @if($projet->statut_id == 1)
                              <span class="badge rounded-pill bg-warning "> {{$projet->statut->nom}} </span> 
                              
                              @elseif ($projet->statut_id == 2)
                              <span class="badge rounded-pill badge-success"> {{$projet->statut->nom}}</span>
                              
                              @elseif($projet->statut_id == 3)
                              <span class="badge rounded-pill badge-danger"> {{$projet->statut->nom}}</span>
                              @endif 
                              
                      </td>
                      <td>
                        <span class="badge rounded-pill bg-info"> {{ $projet->departement->nom}}</span>
                       
                      </td>
                      <td>
                        {{-- {{ $projet->tache_id}} --}}
                        <button class="btn btn-link"  wire:click="showProp({{$projet->id}})"><i class="fas fa-folder-open" data-bs-toggle="tooltip" data-bs-placement="top" title="Editer Tache"></i>
                        {{-- <a class="btn btn-primary btn-sm" href="#"  wire:click="goToAddTache({{ $projet->id }})">
                          <i class="fas fa-folder">
                          </i> --}}
                          {{-- Gestion tache --}}
                      
                      </td>
                      <td>
                        @if ($projet->date_fin <= Date('Y-m-d') and $projet->valeurProjet < 100 )
                        <span class="badge rounded-pill bg-danger text-dark">Retard</span>
                        @endif
                      </td>
                      
                      <td>
                        <button class="btn btn-link"  wire:click="goToEditProjet({{$projet->id}})"><i class="fas fa-pencil-alt" data-bs-toggle="tooltip" data-bs-placement="top" title="Editer"> </i>  </button>
                        <button class="btn btn-danger btn-sm"  wire:click="deleteProjet({{$projet->id}})"><i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer"></i>  </button>
                    
                      </td>
                      
                  </tr>
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
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
 
</div>

  <script>
  window.addEventListener("showModal", event=>{
       $("#modalProp").modal({
         "show": true
        //  "backdrop": "static"
       })
 
    })

  window.addEventListener("closeModal", event=>{
     $("#modalProp").modal("hide")

  })

  
</script> 

<script>
  window.addEventListener("showModalDesc", event=>{
       $("#modalDesc").modal({
         "show": true
        // "backdrop": "static"
       })
 
    })

  window.addEventListener("closeModalDesc", event=>{
     $("#modalDesc").modal("hide")

  })
</script> 


<script>
  window.addEventListener("showSuccessMessage", event=>{
      Swal.fire({
              position: 'top-end',
              icon: 'success',
              toast:true,
              title: event.detail.message || "Opération effectuée avec succès!",
              showConfirmButton: false,
              timer: 5000
              }
          )
  })
</script>


<script>
  window.addEventListener("showWarningMessage", event=>{
      Swal.fire({
              position: 'top-end',
              icon: 'warning',
              toast:true,
              title: event.detail.message || "Opération échoué !",
              showConfirmButton: false,
              timer: 5000
              }
          )
  })
</script>



<script>
  window.addEventListener("showConfirmMessage", event=>{
     Swal.fire({
      title: event.detail.message.title,
      text: event.detail.message.text,
      icon: event.detail.message.type,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuer',
      cancelButtonText: 'Annuler'
      }).then((result) => {
      if (result.isConfirmed) {
          if(event.detail.message.data){
              @this.deleteTache(event.detail.message.data.tache_id)
        
        }
        }
})

  })
</script> 
