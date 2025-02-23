<div class="row p-4 pt-5">
  {{-- <div class="dark-mode"> --}}
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-gradient-primary align-items-center">
          <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i>Listes des utilisateurs</h3>

          <div class="card-tools d-flex align-items-center">
              <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddUser()"><i class="fas fa-user-plus"> </i> Nouvel utilisateur </a>
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
                <th style="width:5%;"></th>
                <th style="width:25%;">Utilisateur</th>
                <th style="width:20%;">Role</th>
                <th style="width:20%;" class="text-center">Ajouté</th>
                <th style="width:30%;" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              
            @foreach ($users as $user)
              <tr>
                <td>
                    @if( $user->sexe == "F")
                       <img src="{{asset('image/woman.png')}}" width="24"/>
                    @else
                        <img src="{{asset('image/man.png')}}" width="24"/>
                   @endif

                </td>
                <td >{{ $user->nom }}</td>
                <td>  <span class="badge rounded-pill bg-success text-dark">{{ $user->roles->implode("nom") }}</span></td>
                <td>
                <span class="badge rounded-pill bg-warning text-dark">{{ $user->created_at->diffForHumans() }}</span> </td>
                {{-- <td class="text-center"><span class="tag tag-success">{{ $user->created_at->diffForHumans() }}</span></td> --}}
                <td class="text-center">
                    <button class="btn btn-link"  wire:click="goToEditUser({{$user->id}})"><i class="far fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Editer"></i> </button>
                    <button class="btn btn-link" wire:click="confirmDelete('{{ $user->prenom }} {{ $user->nom }}', {{$user->id}})"> <i class="far fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer"></i> </button>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <div class="float-right">
            {{ $users->links() }}
        </div>
           
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>

 