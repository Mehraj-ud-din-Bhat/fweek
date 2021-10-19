<?php 
include_once('common/header.php');

include('admin/controllers/AdminController.php');

$admin=new AdminManager();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Aroma</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">

 
  </head>

  <body ng-app="App" ng-controller="appController">

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3  border-bottom box-shadow"  style="background-color: #11a9cf;" >
      <h5 class="my-0 mr-md-auto font-weight-normal" style="color:white">{NAME GOES HERE}}</h5>
    
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Scientist Details</h1>
      <hr>
      <!-- <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
   -->

</div>
    </div>

    <div class="container">
     
    <div class=" mb-3 ">

      <div class="card" >
  <h5 class="card-header" style="background-color:#11c9cf; color:white">Report</h5>


       <div class="card-body">
       
       <h3  ng-If="scientists.length==0">NO REPORT FOUND </h3>
         
       <table class="table">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Project Name</th>
      <th scope="col">Month Name</th>
      <th scope="col">Week Name</th>
      <th scope="col">Report Submitted</th>
      
   
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="p in scientists   track by $index">
      <th scope="row">{{$index+1}}</th>
      <td>{{p.projectName}} </td>
      
      <td> 
      {{p.MonthName}}
    </td>
    
    
    <td> 
    {{p.WeekName}}
    </td>
    
    <td><span ng-if="p.status>0">YES</span>
      <span ng-if="p.status==null">No</span> 
    
    </td>
    </tr>
    
  </tbody>
</table>
       
    </div>
        
    
    
    </div>
         </div>
         </div>
       
      
      </div>



      </div>
     
      </div>

    







      <footer class="pt-4 my-md-5 pt-md-5 border-top">
       
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   
   
  
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<!-- ANGULAR SECTION -->
<script type="text/javascript">
   

    var app = angular.module("App", []);

    app.controller("appController", function ($scope, $http) {
      $scope.scientists=[];
      $scope.search = '';
    // console.log("Working")

     $http.get('admin/controllers/GetReport.php').then(function(data){
        $scope.scientists = data.data;
         console.log(data.data)
         console.log("Working")
        });
        $scope.search=function(arr,id)
      {
        let index =-1
        console.log(arr)
        console.log(id);
         index = arr.findIndex(obj => obj.id == id);
        
         if(index==-1)
         return false


         return true;
      }
    });


    


    </script>