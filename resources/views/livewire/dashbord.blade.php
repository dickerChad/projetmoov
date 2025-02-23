
<div wire:ignore.self>
  @include("livewire.show")
@if($isBtn)
@include("livewire.projetencours") 
@else
<div class="row">


 <div class="col-lg-3 col-12">
  <html>
    <head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
  
          var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day']
            <?php
            foreach($statuts as $statut)
              echo ",['$statut->nom', $statut->total ]"; 
            ?>

          ]);
  
          var options = {
            title: 'PROJET PAR STATUT',
            is3D: true,
            
          };
  
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  
          chart.draw(data, options);
        }
      </script>
    </head>
    <body>
      <div id="piechart" style="width: 900px; height: 500px;"></div>
    </body>
  </html>
  
 </div>
 <div class="col-lg-3 col-2">
</div>
<div class="col-lg-3 col-10">
  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day']
          <?php
            foreach($departements as $departement)
              echo ",['$departement->nom', $departement->tota ]"; 
            ?>
        ]);

        var options = {
          title: 'Projet Par Departement',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
</div>
</div>
<h3>Statut<sup style="font-size: 20px"></sup></h3>
<div class="row">
 
@foreach ($statuts as $stat)

  <div class="col-lg-4 col-12">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
       
        <h2>{{$stat->nom}}</h2>
        <h3>{{$stat->total}}<sup style="font-size: 20px"></sup></h3>
        
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToProjetEncours({{$stat->id}})"><i class="fas fa-tasks"> </i> Voir Plus </a>
     
    </div>
  </div>

@endforeach
</div>


<div class="row">
  @foreach ($departements as $dep)

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
       
        <h4>{{$dep->nom}}</h4>
        <h3>{{$dep->tota}}<sup style="font-size: 20px"></sup></h3>
        
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
       
       <button class="btn btn-link text-white mr-4 d-block"  wire:click="showDesc({{$dep->id}})"><i class="fas fa-tasks" >  Voir Plus</i> </button>
     
    </div>
  </div>

@endforeach
</div>
</div>
 

@endif


</div>
<script>
  window.addEventListener("showModal", event=>{
       $("#modalShow").modal({
         "show": true
        // "backdrop": "static"
       })
 
    })

  window.addEventListener("showModal", event=>{
     $("#modalShow").modal("hide")

  })
</script> 