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
  <h5 class="card-header" style="background-color:#11c9cf; color:white">Scientists</h5>
       <div class="card-body">
        <h3  ng-If="scientists.length==0">NO RESULUT FOUND</h3>
       <div class="card" style="margin-bottom: 10px;"   ng-repeat="S in scientists  | filter : search track by $index">
         <h5 class="card-header " style="background-color: #A9E8F3;" > [{{$index+1}}] {{S.name}} </h5>
         <div class="card-body">
         <div class="card" style="margin: 50px;"   ng-repeat="Q in S.quaters">
         <h5 class="card-header" > {{Q.name}} </h5>
         <div class="card-body"  >
          <p>{{Q.description}}</p>
          <a  ng-If="Q.filename.length>0"   href="admin/uploads/{{Q.filename}}" class="btn btn-primary">view Pdf</a>
          <a  ng-If="Q.pptname.length>0"   href="admin/uploads/{{Q.pptname}}" class="btn btn-primary">view PPT {{Q.pptname.length}}</a>
       
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
     console.log("Working")

     $http.get('admin/controllers/GetScientists.php').then(function(data){
         $scope.scientists = data.data;
         console.log(data)
         console.log("Working")
        });

    });


    </script>