 //declare application
var app = angular.module("index",[]);

//creating a controler
app.controller("indexCtrl",function($scope,$http,$window){

	//function declaration
	$scope.getfeed=()=>{

		//making a request to the backend
        $http.get("php/connect.php").then((Response)=>{
        	//storing returned data
	        $scope.data = Response.data;
	           console.log(Response);
            })
		}
	$scope.viewProfile=()=>{

		//making a request to the backend
        $http.get("php/viewprofile.php").then((Response)=>{
        	//storing returned data
	        $scope.dataz = Response.data;
	           console.log(Response);
            })
        }	
    $scope.getdata=()=>{

		//making a request to the backend
	    $http.get("php/userdashadmin.php").then((Response)=>{
	    	//storing returned data
	        $scope.datas = Response.data;
	     
        })
	}
	
	
       

    //calling the function
	$scope.getfeed();
	$scope.getdata();
	$scope.viewProfile();
	
	 
	$scope.selected_post=(project_name,user_name)=>{
    info_object={
    	method:'POST',
    	url:'php/submit.php',
    	data:{
    		'name':project_name,
    		'creator':user_name
    	}
    };
    let post_object=$http(info_object);
    post_object.then((response)=>{
    	if(response.data=='proceed'){
    		$window.locattion.href="index.html";    	
    	}
    	else{
    		consol.log(response.data);
    	}
    });
	}

	
})

//appp 2
var app2 = angular.module("hired",[]);

//creating a controler
app2.controller("hiredCtrl",function($scope,$http,$window){

	//function declaration
	$scope.getinfo=()=>{

		//making a request to the backend
        $http.get("php/hired.php").then((Response)=>{
        	//storing returned data
	        $scope.dataz = Response.data;
	           console.log(Response);
            })
		}
		$scope.getinfo();

		
	})



 