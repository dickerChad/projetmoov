<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
    
    
           
          @can("manager")

           <li class="nav-item  {{ setMenuClass('manager.tableaudebord.','menu-open')}}">
            <a href="#" class="nav-link {{ setMenuClass('manager.tableaudebord.','active')}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('manager.tableaudebord.dashbord') }}" class="nav-link active">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Vue globale</p>
                </a>
              </li>
            </ul>
            </li>
            @endcan
        
        
          
            
        
         
         @can("employe")
        <li class="nav-item {{ setMenuClass('employe.gestionprojet.','menu-open')}}">
          <a href="#" class="nav-link {{ setMenuClass('employe.gestionprojet.','active')}}  ">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                Gestion projets
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item   ">
                <a
                href="{{ route('employe.gestionprojet.projets') }}"
                class="nav-link active"
                >

                  <i class=" nav-icon fas fa-users-cog"></i>
                  <p>projets</p>
                </a>
              </li>
            </ul>
        </li>
        @endcan
        
     
       
        @can("Admin")
        <li class="nav-item {{ setMenuClass('admin.habilitations.','menu-open')}}">
          <a href="#" class="nav-link {{ setMenuClass('admin.habilitations.','active')}}">
            <i class=" nav-icon fas fa-user-shield"></i>
            <p>
              Habilitations
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item   ">
              <a
              href="{{ route('admin.habilitations.users.index') }}"
              class="nav-link active"
              >
                <i class=" nav-icon fas fa-users-cog"></i>
                <p>Utilisateurs</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-fingerprint"></i>
                <p>Roles et permissions</p>
              </a>
            </li> --}}
          </ul>
          </li>
          @endcan
        
     
    </ul>
  </nav>