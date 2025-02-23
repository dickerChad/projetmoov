<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateurs extends Component
{
    Use WithPagination;
    public $currentPage = PAGELIST;

    protected $paginationTheme= "bootstrap";
    public $newUser = [];
    public $editUser = [];

    public $roleAttr = [];
    public $search= "";


    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editUser['id'])
            return [
                'editUser.nom' => 'required',
                'editUser.prenom' => 'required',
                'editUser.email' => ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id']) ] ,
                'editUser.sexe' => 'required',
            ];
        }

        return [
            'newUser.nom' => 'required',
            'newUser.prenom' => 'required',
            'newUser.email' => 'required|email|unique:users,email',
            'newUser.sexe' => 'required',
        ];
    }


    protected $messages =[
        'newUser.nom.required'=> 'le nom d\'utilisateur est requis',
        'newUser.prenom.required'=> 'le prenom d\'utilisateur est requis',
        'newUser.email.required'=> 'l\'email d\'utilisateur est requis'
    ];

    public function render()
    {
        Carbon::setLocale("fr");
        $searchCritaria = "%".$this->search."%";
        return view('livewire.utilisateurs.index', [
            "users" => User::where("nom", "like",  $searchCritaria)->latest()->paginate(5)
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }

    public function goToAddUser(){
        $this->currentPage= PAGECREATEFORM;

    }
    public function goToEditUser($id){
        $this->editUser = User::find($id)->toArray();
        $this->currentPage= PAGEEDITFORM;

    $this->populateRole();

    }

    public function populateRole(){
        $this->roleAttr["roles"] = [];

        $mapForCB = function($value){
            return $value["id"];
        };


    $roleIds = array_map($mapForCB, User::find($this->editUser["id"])->roles->toArray());

    foreach(Role::all() as $role){
        if(in_array($role->id, $roleIds)){
            array_push($this->roleAttr["roles"], ["role_id" =>$role->id, "role_nom" =>$role->nom, "active"=> true]);
        } else{
            array_push($this->roleAttr["roles"], ["role_id" =>$role->id, "role_nom" =>$role->nom, "active"=> false]);
        }
    }
        // dump($this->roleAttr);
    }

    public function updateRole(){
        DB::table("user_role")->where("user_id", $this->editUser["id"])->delete();

        foreach($this->roleAttr["roles"] as $role){
            if($role["active"]){

                User::find($this->editUser["id"])->roles()->attach($role["role_id"]);

            }
            
        }
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"role mis ajour avec succès!"]);
    }
    
    public function goToListUser(){
        $this->currentPage= PAGELIST;
        $this->editUser = [];

    }
    public function addUser(){
        // dump($this->newUser);
        $validationAtrribute = $this->validate();
        $validationAtrribute["newUser"]["password"]=  Hash::make("Moov2021");
        // dump($validationAtrribute["newUser"]);
        User::create( $validationAtrribute["newUser"]);
 //vider le formulaire
 $this->newUser = [];

 $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!"]);
}
    public function updateUser(){
         // Vérifier que les informations envoyées par le formulaire sont correctes
         $validationAttributes = $this->validate();


         User::find($this->editUser["id"])->update($validationAttributes["editUser"]);
 
         $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur mis à jour avec succès!"]);

    }

    public function confirmPsswordReset(){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de renitialiser  le mot de passe d'un utilisateurs. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "action" => "reset"
            
        ]]);
    }

    public function resetPassword(){

        User::find($this->editUser["id"])->update(["password" => Hash::make(DEFAULTPASSWORD)]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Mot de passe utilisateur réinitialisé avec succès!"]);
    }

    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des utilisateurs. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "action" => "delete",
            "data" => [

                "user_id" => $id, 
                
            ]
        ]]);
    }

    public function deleteUser($id){
    
         User::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur supprimé avec succès!"]);
    }
}



