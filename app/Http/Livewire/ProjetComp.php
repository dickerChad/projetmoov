<?php

namespace App\Http\Livewire;

use App\Models\Departement;
use App\Models\Projet;
use App\Models\Statut;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;


class ProjetComp extends Component
{
    public $selectprojet;
    public $newTacheModel= [];
    public $search= "";

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editUser['id'])
            return [
                'editProjet.nom' => 'required',
            'editProjet.description' => 'required',
            'editProjet.date_debut' => 'required|date',
            'editProjet.date_fin' => 'required|date',
            // 'editProjet.duree' => 'required| numeric',
            
            // 'editProjet.statut_id' => 'required',
            'editProjet.user_id' => 'required',
            'editProjet.departement_id' => 'required',
            ];
        }

        return [
            'newprojet.nom' => 'required',
            'newprojet.description' => 'required',
            'newprojet.date_debut' => 'required|date|after_or_equal:today',
            'newprojet.date_fin' => 'required|date|after_or_equal:newprojet.date_debut',
            // 'newprojet.duree' => 'required| numeric',
            
            // 'newprojet.statut_id' => 'required',
            // 'newprojet.user_id' => 'required',
            'newprojet.departement_id' => 'required',
        ];
    }
//  protected $rules = [
       
//             'newprojet.nom' => 'required',
//             'newprojet.description' => 'required',
//             'newprojet.date_debut' => 'required|date|after:tomorrow',
//             'newprojet.date_fin' => 'required|date|after:start_date',
//             'newprojet.duree' => 'required| numeric',
            
//             'newprojet.statut_id' => 'required',
//             'newprojet.user_id' => 'required',
//             'newprojet.departement_id' => 'required',
//  ];


    Use WithPagination;
    public $currentPage = PAGELIST;
    protected $paginationTheme= "bootstrap";
    public $newprojet = [];
    public $editProjet =[];
    public $editTacheModal =[];
    public $selectedprojet;


   
    public function render()
    {   
        
       
         $searchCritaria = "%".$this->search."%";
         $sumTache=DB::table('taches')->select('projet_id',DB::raw('SUM(valeur) as valeurProjet'))->where('Estrealisee','1')->groupBy('projet_id');
      //dump($sumTache);
      
        return view('livewire.projet.index', [
            //  "projets" => Projet::where("nom", "like",  $searchCritaria)->latest()->paginate(5),
            
             "projets" => Projet::leftjoinSub($sumTache,"sumTache",function($join){
                 $join->on('id','=','sumTache.projet_id'); })->where("user_id",auth()->user()->id)->where("nom", "like",  $searchCritaria)->latest()->paginate(5),
        
            "departements" => Departement::select("id", "nom")->get(),
            "statuts" => Statut::select("id", "nom")->get(),
            "users" => User::select("id", "nom")->get(),
        // "users" => DB::table("users")->where("id", auth()->user()->id)->get(),
            //  "taches" => Tache::select("id", "nom","dateDebut","dateFin","valeur","Estrealisee")->get()
            "taches" => Tache::where("projet_id", optional($this->selectedprojet)->id)->get(),
            // "somme"=> DB::table("taches")->sum("valeur")
           
            
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }


    public function goToAddProjet(){
        $this->currentPage= PAGECREATEFORM;
        $this->resetErrorBag();

    }
    public function goToEditProjet($id){
        $this->editProjet = Projet::find($id)->toArray();
        $this->currentPage= PAGEEDITFORM;
    }
    public function addProjet(){
        // dump($this->newprojet);
        $validationAtrribute = $this->validate();
      
        $validationAtrribute["newprojet"]["user_id"]=auth()->user()->id ;
        $validationAtrribute["newprojet"]["statut_id"]=1 ;
      
        Projet::create( $validationAtrribute["newprojet"]);
 //vider le formulaire
 $this->newprojet = [];

//  $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!"]);
}
public function goToListProjet(){
    $this->currentPage= PAGELIST;
    // $this->editp = [];
    $this->newprojet = [];

}
// public function goToAddTache(){
//     $this->currentPage= PAGETACHEFORM;
// }
public function showProp(Projet $projet ){
    $this->selectedprojet = $projet;
    $this->dispatchBrowserEvent("showModal", []);
    $this->resetErrorBag();
}

// public function editProjet( Projet $projet){
//    $this->dispatchBrowserEvent("editModalProjet", []);
// }

public function updateProjet(){

    $validationAttributes = $this->validate();


    Projet::find($this->editProjet["id"])->update($validationAttributes["editProjet"]);

    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"projet mis à jour avec succès!"]);

}


public function showDesc( Projet $projet){
     $this->selectedprojet = $projet;
    $this->dispatchBrowserEvent("showModalDesc", []);
}


public function confirmDeleteTache($name, $id){
    $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
        "text" => "Vous êtes sur le point de supprimer $name de la liste des tache. Voulez-vous continuer?",
        "title" => "Êtes-vous sûr de continuer?",
        "type" => "warning",
        "action" => "delete",
        "data" => [

            "tache_id" => $id,
            
        ]
    ]]);
    

 
}
public function deleteTache(Tache $taches){
    $taches->delete();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Tache supprimé avec succès!"]);

    $sumEstRealisee =DB::table("taches")->where("projet_id", $this->selectedprojet->id)->where("Estrealisee","1")->sum('valeur');
    if($sumEstRealisee == 0){
        Projet::find($this->selectedprojet->id)->update([

            "statut_id" => 1,
          
    
        ]);
    }
    elseif($sumEstRealisee < 100){
        Projet::find($this->selectedprojet->id)->update([

            "statut_id" => 2,
          
    
        ]);
    }
    else{
        Projet::find($this->selectedprojet->id)->update([

            "statut_id" => 3,
          
    
        ]);


}

}


public function addTache(){
   $validated =  $this->validate([
        "newTacheModel.nom" => "required |unique:taches,nom",
        
        "newTacheModel.dateDebut" => "required |date|after_or_equal:today",
        "newTacheModel.dateFin" => "required |date|after_or_equal:newTacheModel.dateDebut",
        "newTacheModel.valeur" => "required | numeric | min:0 | max:100",
        // "newTacheModel.Estrealisee" => "required"
        

    ]);

    //controle sum
   
     $sum =DB::table("taches")->where("projet_id", $this->selectedprojet->id)->sum('valeur');
   
    if(($sum + $this->newTacheModel["valeur"]) <= 100){
        $validated["newTacheModel"]["Estrealisee"]=0 ;
    Tache::create([
        "nom" => $this->newTacheModel["nom"],
        "dateDebut" => $this->newTacheModel["dateDebut"],
        "dateFin" => $this->newTacheModel["dateFin"],
        "valeur" => $this->newTacheModel["valeur"],
        // "Estrealisee" => (int) $this->newTacheModel["Estrealisee"],
        "projet_id" =>$this->selectedprojet->id,




    ]);
    $this->newTacheModel=[];
    $this->resetErrorBag();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Tache créé avec succès!"]);
}
else{
    $this->dispatchBrowserEvent("showWarningMessage", ["message"=>"Opération échouée! Valeur supérieur à 100%"]);
}
}

public function closeModal(){
    $this->dispatchBrowserEvent("closeModal", []);
    
}

public function editTache(Tache $tache){
   
    $this->editTacheModal["nom"]= $tache->nom;
    $this->editTacheModal["dateDebut"]= $tache->dateDebut;
    $this->editTacheModal["dateFin"]= $tache->dateFin;
    $this->editTacheModal["valeur"]= $tache->valeur;
    $this->editTacheModal["Estrealisee"]= $tache->Estrealisee;
    $this->editTacheModal["id"]= $tache->id;
    $this->editTacheModal["projet_id"]= $tache->projet_id;
    // dd($this->editTacheModal);
    $this->dispatchBrowserEvent("showEditModal", []);
}
 
public function updateTache(){
    $validated =  $this->validate([
        "editTacheModal.nom" => "required",
        "editTacheModal.dateDebut" => "required |date  ",
        "editTacheModal.dateFin" => "required |date ",
        "editTacheModal.valeur" => "required | numeric | min:0 | max:100",
        "editTacheModal.Estrealisee" => "required"
        

    ]);
    $sum =DB::table("taches")->where("projet_id", $this->editTacheModal["projet_id"])->where("id", "<>", $this->editTacheModal["id"])->sum('valeur');
    
    if(($sum + $this->editTacheModal["valeur"]) <= 100){
    
        Tache::find($this->editTacheModal["id"])->update([

            "nom" => $this->editTacheModal["nom"],
            "dateDebut" => $this->editTacheModal["dateDebut"],
            "dateFin" => $this->editTacheModal["dateFin"],
            "valeur" => $this->editTacheModal["valeur"],
            "Estrealisee" => (int) $this->editTacheModal["Estrealisee"]
    
        ]);
        $sumEstRealisee =DB::table("taches")->where("projet_id", $this->editTacheModal["projet_id"])->where("Estrealisee","1")->sum('valeur');
    if($sumEstRealisee == 0){
        Projet::find($this->editTacheModal["projet_id"])->update([

            "statut_id" => 1,
          
    
        ]);
    }
    elseif($sumEstRealisee < 100){
        Projet::find($this->editTacheModal["projet_id"])->update([

            "statut_id" => 2,
          
    
        ]);
    }
    else{
        Projet::find($this->editTacheModal["projet_id"])->update([

            "statut_id" => 3,
          
    
        ]);
    }
        
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"tache mis a jour avec succès!"]);
        $this->closeEditModal();
    }
    else{
        $this->dispatchBrowserEvent("showWarningMessage", ["message"=>"Opération échouée! Valeur supérieur à 100%"]);
    }

  
    
}
public function closeEditModal(){
    $this->editTacheModal=[];
    $this->resetErrorBag();
    $this->dispatchBrowserEvent("closeEditModal", []);
   
}

public function deleteProjet($id){
    
    Projet::destroy($id);

   $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur supprimé avec succès!"]);
}


// public function valida(){
//         if($this->editTacheModal["Estrealisee"] = 0)
//         Tache::find($this->editTacheModal["id"])->update([

//             "Estrealisee" => 1,
    
//         ]);

//  if($this->editTacheModal["Estrealisee"] = 1)
//         Tache::find($this->editTacheModal["id"])->update([

//             "Estrealisee" => 0,
    
//         ]);




}

