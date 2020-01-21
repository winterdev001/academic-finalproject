// Application module
var crudApp = angular.module('crudApp',[]);
crudApp.controller("DbController", function($scope,$http){

// Function to get employee details from the database
getInfo();
function getInfo(){
// Sending request to EmpDetails.php files
$http.get('empDetails.php').then(function(Response){
    console.log(Response);
// Stored the returned data into scope
$scope.details = Response.data;
})}
})

