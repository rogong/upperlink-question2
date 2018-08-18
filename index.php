<!DOCTYPE html>
<html>
 <head>
  <title> Online Application</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:750px;">
   <h3 align="center">Online Job Application</h3>
<!-- 
    <div class="row">

                  <div class="col-md-4">
                     

                    <image-upload
                    [max]="1"
                    [buttonCaption]="'select Photo'"
                    [dropBoxMessage]="''"
                    [extensions]="['jpg','jpeg','gif','png']"
                    (isPending)="disableSendButton($event)"
                    (uploadFinished)="imageUploaded($event)"
                    (removed)="imageRemoved($event)">

                    </image-upload>
                    <img src="{{  file_src }}" height="180px" width="200px">

                   

                  </div>
             <div class="col-md-6" >   -->  

   <br /><br />
   <div ng-app="myapp" ng-controller="formcontroller">
    <form name="userForm" ng-submit="insertData()" enctype="multipart/form-data">
     <label class="text-success" ng-show="successInsert">{{successInsert}}</label>
     <div class="form-group">
      <label>First Name <span class="text-danger">*</span></label>
      <input type="text" name="first_name" ng-model="insert.first_name" class="form-control" />
      <span class="text-danger" ng-show="errorFirstname">{{errorFirstname}}</span>
     </div>
     <div class="form-group">
      <label>Last Name <span class="text-danger">*</span></label>
      <input type="text" name="last_name" ng-model="insert.last_name" class="form-control" />
      <span class="text-danger" ng-show="errorLastname">{{errorLastname}}</span>
     </div>

     <div class="form-group">
      <label>Phone <span class="text-danger">*</span></label>
      <input type="text" name="phone" ng-model="insert.phone" class="form-control" />
      <span class="text-danger" ng-show="errorPhone">{{errorPhone}}</span>
     </div>

     <div class="form-group">
      <label>Email <span class="text-danger">*</span></label>
      <input type="text" name="email" ng-model="insert.email" class="form-control" />
      <span class="text-danger" ng-show="errorEmail">{{errorEmail}}</span>
     </div>

      <div class="form-group">
      <label>Cover Letter<span class="text-danger">*</span></label>
      <textarea type="text" name="cover_letter" ng-model="insert.cover_letter" class="form-control"></textarea>
      <span class="text-danger" ng-show="errorCoverletter">{{errorCoverletter}}</span>
     </div>

      <div class="form-group">
      <label for="image">Upload Passport</label>
                        <input type="file" name="image" id="fileToUpload" file-model="myFile" accept="image/*" />
     
     </div>


      <div class="form-group">
      <label>Upload Resume<span class="text-danger">*</span></label>
       <input type="file" file-input="files" id="resume"/> 
      <span class="text-danger" ng-show="errorCoverletter">{{errorCoverletter}}</span>
     </div>

     


     <br />
     <div class="form-group">
      <input type="submit" name="insert" class="btn btn-info" value="Insert"/>

       </div>
     </div>
    </form>
   </div>
  </div>
 </body>
</html>



<script>
var application = angular.module("myapp", []);
application.controller("formcontroller", function($scope, $http){
 $scope.insert = {};
 $scope.insertData = function(){
  $http({
   method:"POST",
   url:"insert.php",
   data:$scope.insert,
  }).success(function(data){
   if(data.error)
   {
    $scope.errorFirstname = data.error.first_name;
    $scope.errorLastname = data.error.last_name;
    $scope.errorPhone = data.error.phone;
    $scope.errorEmail = data.error.email;
    $scope.errorCoverLetter = data.error.cover_letter;
    $scope.successInsert = null;
   }
   else
   {
    $scope.insert = null;
    $scope.errorFirstname = null;
    $scope.errorLastname = null;
    $scope.errorPhone = null;
    $scope.errorEmail = null;
    $scope.errorCoverletter = null;
    $scope.successInsert = data.message;
   }
  });
 }
});



</script>

  <script>
  app.controller("myController", function($scope){
  $scope.onFileSelected = function(event){

  console.log(event);
}
}
  </script>
