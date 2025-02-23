<div wire:ignore.self>
    @if ($currentPage == PAGECREATEFORM)
    @include("livewire.projet.create")    
    @endif
  
    @if ($currentPage == PAGEEDITFORM)
       @include("livewire.projet.edit") 
    @endif
  
    @if ($currentPage == PAGELIST)
    @include("livewire.projet.liste")   
    @endif
    {{-- @if ($currentPage == PAGETACHEFORM)
    @include("livewire.projet.tache")   
    @endif --}}
  </div>


  