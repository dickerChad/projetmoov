<?php

namespace App\Http\Livewire;

use App\Models\Departement;
use App\Models\Projet;
use App\Models\Statut;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Dashbord extends Component
{
    public $isBtn= false;
    public $isBtnD= false;
    Use WithPagination;
    public $currentPage;
    public $currentStatut_id;
    public $currentDepartement_id;
    public $currentStatut_name;
    protected $paginationTheme= "bootstrap";
    public $search= "";
    public function render()
    {
        $searchCritaria = "%".$this->search."%";
        $sumTache=DB::table('taches')->select('projet_id',DB::raw('SUM(valeur) as valeurProjet'))->where('Estrealisee','1')->groupBy('projet_id');
       
        // $sum=DB::table('projets')->select('departement_id',DB::raw(' COUNT(*) as total, departement_id from projets'));
        // $results = Departement::leftjoinSub($sum,"sum",function($join){
        //     $join->on('id','=','sum.departement_id'); });
         
        //   $results =DB::select(DB::raw("SELECT COUNT(*) as total, statut_id FROM projets GROUP BY statut_id"));
        $results =DB::table("projets")->select("statut_id",DB::raw("COUNT(*) as total"))->groupBy(("statut_id"));
        $depart =DB::table("projets")->select("departement_id",DB::raw("COUNT(*) as tota"))->groupBy(("departement_id"));
        
        
           
        return view('livewire.dashbord',[
         
            "projets" => Projet::leftjoinSub($sumTache,"sumTache",function($join){
                $join->on('id','=','sumTache.projet_id'); })->where("statut_id",$this->currentStatut_id)->where("nom", "like",  $searchCritaria)->latest()->paginate(10),  
            "projet" => Projet::leftjoinSub($sumTache,"sumTache",function($join){
               $join->on('id','=','sumTache.projet_id'); })->where("departement_id",$this->currentDepartement_id)->where("nom", "like",  $searchCritaria)->latest()->paginate(10), 
            "currentStatut" => Statut::select("nom")->where("id",$this->currentStatut_id)->first(),
            "statuts" => Statut::joinSub($results,"count",function($join){
                $join->on('id','=','count.statut_id'); })->get(),
             "departements" => Departement::joinSub($depart,"coun",function($join){
                $join->on('id','=','coun.departement_id'); })->get(),
            ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function goToProjetEncours(int $statut_id){
        
        $this->currentStatut_id=$statut_id;
        $this->isBtn= true;

    }
    public function goToProjetDepart(int $departement_id){
        
        $this->currentDepartement_id=$departement_id;
        $this->isBtnD= true;

    }
    public function showDesc(int $departement_id){
        $this->currentDepartement_id=$departement_id;
       $this->dispatchBrowserEvent("showModal", []);
   }
}
