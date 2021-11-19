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
      <h1 class="display-4">Project Details</h1>
      <a    href="report.php" class="btn btn-primary">View Report</a>
      <hr>
      <!-- <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
   -->
 <div class="input-group mb-3" style="padding-left:200px;padding-right:200px;">
  <input type="text" style="height:60px" class="form-control" ng-model="search" name="searchs" placeholder="Search Scientist By Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
  
</div>
    </div>

    <div class="container">
      <div class=" mb-3 ">

      <div class="card" >
  <h5 class="card-header" style="background-color:#11c9cf; color:white">PROJECTS</h5>
       <div class="card-body">
        <h3  ng-If="scientists.length==0">NO RESULUT FOUND</h3>

        <div class="box-body">
              
        
           <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SNO</th>
                  <th>Project Name</th>
                  <th>Month Name</th>
                  <th>Week Name</th>
                  <th>Description</th>
                  <th>Files</th>
                 
                </tr>
                </thead>
               
                <tr ng-repeat="S in scientists  | filter : search track by $index">
                     <td>{{$index+1}}</td>
                     <td>{{S.ProjectName}}</td>
                     <td>{{S.MonthName}}</td>
                     <td>{{S.WeekName}}</td>
                     <td>{{S.description}}</td>
                     <td>
                       <a ng-if="S.ppt_name.length>0"  class="btn btn-primary"  href="admin/uploads/{{S.ppt_name}}">View PPT </a>
                       <a ng-if="S.filename.length>0"  class="btn btn-primary"  href="admin/uploads/{{S.filename}}">View FILE </a>
                       <span ng-if="S.ppt_name.length==0 && S.filename.length==0" >No files uploaded</span>
                    </td>
                </tr>
           </table>
       

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
 
     $http.get('admin/controllers/GetScientists.php').then(function(data){
         $scope.scientists = data.data;
         console.log($scope.scientists)
         console.log("data loaded")
        });

    });


    </script>