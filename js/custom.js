//index
var app=angular.module("myApp",[]);
app.controller("myCtrl",function($scope,$http,$window){
    let project_info;
    $scope.getfeed=()=>{
        $http.get("php/feed.php").then((Response)=>{
        $scope.datas = Response.data;
            })
        }
    $scope.selected_post=(project_name,user_name)=>{
        info_object={
            method:'POST',
            url:'php/p_name_store.php',
            data:{
                'name':project_name,
                'creator':user_name
            }
        };
        let post_object = $http(info_object);
        post_object.then((response)=>{
            if(response.data=='proceed'){
                $window.location.href="./details.html";
            }
            else{
                console.log(response.data);
            }
        });
    }
    $scope.confirm=()=>{
        if($scope.user_Fname==null || $scope.user_Sname==null || $scope.phone==null){
        }
        else{
            let config={
                method:'POST',
                url:'php/pending_mode.php',
                data:{
                    'name':$scope.user_Fname,
                    'sname':$scope.user_Sname,
                    'phone':$scope.phone,
                    'email':$scope.email
                }
            };
            let request = $http(config);
            request.then((response)=>{
                if(response.data=='done'){
                    swal({
                        type:'success',
                        confirmButtonColor:'#218838',
                        text: 'We will contact you soon!'
                    }).then((result)=>{
                        if(result.value){
                            $window.location.href="./index.html";
                        }
                    })
                }
                else{
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text:'Something went wrong!',
                        confirmButtonColor:'#b21f2d'                        
                    });
                }
            });
        }
    }
    $scope.kill_process=()=>{
        let config={
            method:'POST',
            url:'php/book_kill_process.php',
            data:{
                'kill':'kill',
            }
        };
        let request = $http(config);
        request.then((response)=>{
            if(response.data=='killed'){
                $window.location.href="./index.html";
            }
            else{
                swal({
                    text:response.data
                })
            }
        })
    }
    let project_id;
    $scope.get_post_id=(id)=>{
        project_id=id;
    }
    $scope.login=()=>{
        if($scope.user_email==null || $scope.user_password==null){

        }
        else{
            let config={
                method:'POST',
                url:'php/login.php',
                data:{
                    'email':$scope.user_email,
                    'password':$scope.user_password
                }
            };
            let request = $http(config);
            request.catch(()=>{
                swal("Connection Error")
            });
            request.then((response)=>{
                if(response.data==="admin"){
                    $window.location.href="./dashboard.html";
                }
                else if(response.data==="user"){
                    $window.location.href="php/usrdshbrd.php";
                }
                else{
                    swal({
                        text:response.data,
                        confirmButtonColor:'#343a40',
                    });
                }
            });
        }
    }
    $scope.getfeed();   
})
//singUp
var app=angular.module("signUp",[]);
app.controller("myCtrl",function($scope,$http,$window){
    let user_type;
    $scope.signup_pic=()=>{
        if($scope.signup_png=="male_signup.png"){
            $scope.signup_png="female_signup.png";
            user_type="female";
        }
        else{
            $scope.signup_png="male_signup.png";
            user_type="male";
        }
    }
    $scope.createAccount=()=>{
        if($scope.user_password==null || $scope.confirm_user_password==null || $scope.user_Fname==null || $scope.user_Sname==null || $scope.user_name==null || $scope.user_phone==null || $scope.user_email==null){

        }
        else if($scope.user_password!=$scope.confirm_user_password){
            swal({
                text:"the passwords must be the same"
            });
        }
        else{
            let config={
                method:'POST',
                url:'php/signup.php',
                data:{
                    'Fname':$scope.user_Fname,
                    'type':user_type,                    
                    'Sname':$scope.user_Sname, 
                    'Uname':$scope.user_name, 
                    'phone':$scope.user_phone,
                    'email':$scope.user_email,                                     
                    'password':$scope.user_password
                }
            };
            let request = $http(config);
            request.then((response)=>{
                if(response.data=='registered'){
                    $window.location.href="./descr.html";                  
                }
                else if(response.data=='empty'){
                    swal({
                        text:response.data
                    })
                }
                else{
                    swal({
                        text:response.data
                    })
                }
            })
        }
    }
    $scope.signup_pic();
});
//description page
var app=angular.module("descr",[]);
app.controller("myCtrl",function($scope,$http,$window){
    $scope.home=()=>{
        let config={
            method:'POST',
            url:'php/kill_process.php',
            data:{
                'id':1
            }
        };
        let request = $http(config);
        request.then((response)=>{
            if(response.data=='killed'){
                $window.location.href="./index.html";
            }
            else{
                swal({
                    text:response.data,
                    confirmButtonColor:'#343a40'
                })
            }
        })
    }
    $scope.done=()=>{
        let config={
            method:'POST',
            url:'php/description.php',
            data:{
                'descr':$scope.description
            }
        };
        let request = $http(config);
        request.then((response)=>{
            if(response.data=="done"){
                $window.location.href="php/usrdshbrd.php";
            }
            else if(response.data=='empty'){

            }
            else{
                swal({
                    text:response.data,
                    confirmButtonColor:'#343a40',
                });
            }
        }); 
    }
    $scope.get_user_info=()=>{
        $http.get("php/userdinfo.php").then((Response)=>{
            data=Response.data;
            if(data[0].auth==0 && data[0].type=='male'){
                $scope.pic="male_user.png";
            }
            else if(data[0].auth==0 && data[0].type=='female'){
                $scope.pic="female_user.png";                
            }
            // console.log(Response.data);
            })
        }
    $scope.get_user_info();
})
//userdashboard
var app=angular.module("userdashboard",[]);
app.controller("myCtrl",function($scope,$http,$window){
    let pname;
    $scope.getfeed=()=>{
        $http.get("php/userdcontent.php").then((Response)=>{
            $scope.datas = Response.data;
                })
        }
    $scope.pending_projects=()=>{
        $http.get("php/userdPendingProjects.php").then((Response)=>{
            data=Response.data;
            if(Response.data==0){
                $scope.animated="not_animated";
                $scope.pending_project="You don't have any pending project!";
                $scope.show_pending_table=false; 
                $scope.show_pending_status=true;            
            }
            else if(data.length==1){
                $scope.animated="animated";
                $scope.pending_project = "you have "+data.length+" pending project!";
                $scope.pending_acc_details=Response.data;
                $scope.show_pending_table=true; 
                $scope.show_pending_status=false;               
            }
            else{
                $scope.animated="animated";
                $scope.pending_project = "you have "+data.length+" pending projects!";
                $scope.pending_acc_details=Response.data;
                $scope.show_pending_table=true; 
                $scope.show_pending_status=false;                                            
            }
        })    
    }
    $scope.getEarnings=()=>{
        $http.get("php/userdEarning.php").then((Response)=>{
            if(Response.data=="empty"){
                $scope.numberOfProjectsSold=0;                
                $scope.project_earning="You haven't sold any project yet";
                $scope.show_earning_table=false; 
                $scope.show_earning_status=true;
            }
            else{
                data=Response.data;
                let amounts=[];
                let amount=0;
                for(a=0;a<data.length;a++){
                    amount+=parseInt(data[a].amount);                    
                }
                $scope.numberOfProjectsSold=data.length;
                if(data.length==1){
                    $scope.project_earning = "you have gained "+"$"+amount+" for selling "+data.length+" project";
                    $scope.earning_acc_details=Response.data;
                    $scope.show_earning_table=true; 
                    $scope.show_earning_status=false;
                }
                else{
                    $scope.project_earning = "you have gained "+"$"+amount+" for selling "+data.length+" projects";
                    $scope.earning_acc_details=Response.data;
                    $scope.show_earning_table=true; 
                    $scope.show_earning_status=false;
                }
            }
                })
        }
    $scope.getNumberOfProjects=()=>{
        $http.get("php/userdAllP.php").then((Response)=>{
            if(Response.data==0){
                $scope.project_number="You haven't posted any project yet!";
            }
            else if(Response.data==1){
                $scope.project_number = "you have posted "+Response.data+" project!";
            }
            else{
                $scope.project_number = "you have posted "+Response.data+" projects!";
            }
                })
        }
    $scope.get_user_info=()=>{
        $http.get("php/userdinfo.php").then((Response)=>{
            data=Response.data;
            $scope.user_name=data[0].username;
            $scope.user_Fname=data[0].Fname;
            $scope.user_Sname=data[0].Sname; 
            $scope.user_name=data[0].username; 
            $scope.user_phone=data[0].phone;                       
            $scope.user_email=data[0].email;                                  
            if(data[0].auth==0 && data[0].type=='male'){
                $scope.pic="male_user.png";
            }
            else if(data[0].auth==0 && data[0].type=='female'){
                $scope.pic="female_user.png";                
            }
            if(data[0].booked=='available'){
                $scope.user_status_animated="not_animated";                
                $scope.user_status_color="bg-success";               
                $scope.user_status=data[0].booked;
            }
            else if(data[0].booked=='booked'){
                $scope.user_status_animated="not_animated";               
                $scope.user_status_color="bg-primary";             
                $scope.user_status=data[0].booked;
            }
            else if(data[0].booked=='pending'){
                $scope.user_status_animated="animated";               
                $scope.user_status_color="bg-danger";             
                $scope.user_status=data[0].booked;
            }
            // console.log(Response.data);
            })
        }
    $scope.selected_post=(project_name,project_description,project_price,project_id)=>{
        $scope.selected_project_name=project_name;
        pname=project_name;
        $scope.selected_project_description=project_description; 
        $scope.selected_project_price=project_price;
    }
    $scope.delp=(id)=>{
        Swal({
            title:'Are you sure?',
            text:"You wont be able to revert this!",
            type:'warning',
            showCancelButton: true,
            confirmButtonColor:'#ed6080',
            cancelButtonColor:'#6884fc',
            confirmButtonText:'delete'
        }).then((result)=>{
            if(result.value){
                let config={
                    method:'POST',
                    url:'php/delp.php',
                    data:{
                        'id':id
                    }
                };
                let request = $http(config);
                request.then((response)=>{
                    $http.get("php/userdcontent.php").then((response)=>{
                        if(response.data==null){
                            $window.location.reload();
                        }
                        else{
                            $scope.getfeed();
                            $scope.getNumberOfProjects();
                        }
                    })
                })
            }
        })
    }
    $scope.update_user_info=()=>{
        let info_object={
            method:'POST',
            url:'php/upd_user_info.php',
            data:{
                'Uname':$scope.user_name,
                'Fname':$scope.user_Fname,
                'Sname':$scope.user_Sname,
                'email':$scope.user_email,
                'phone':$scope.user_phone,
            }
        };
        let send = $http(info_object);
        send.then((response)=>{
            if(response.data=='done'){
                $window.location.reload();
            }
            else{
                swal({
                    text:response.data
                })
            }
        })
    }
    $scope.logout=()=>{
        $window.location.href="php/logout.php";
    }
    $scope.pending_projects();    
    $scope.getEarnings();
    $scope.getNumberOfProjects();    
    $scope.get_user_info();
    $scope.getfeed();
    // $scope.like(name);    
})
//admin dashboard
var app=angular.module("myApp2",[]);
app.controller("myCtrl",function($scope,$http,$window){
    let booked_acs=0,pending_acs;
    $scope.getNames=()=>{
        $http.get("php/dsh.php").then((Response)=>{
        $scope.names = Response.data;
            })
        }
    let active_accounts;
    $scope.get_active_accs=()=>{
        $http.get("php/all_act_acc.php").then((Response)=>{
            $scope.active_accounts = Response.data;
            active_accounts=$scope.active_accounts.length;
            })
        }
    $scope.getAcc=()=>{
        $http.get("php/acc.php").then((Response)=>{
        $scope.acc = Response.data;
            })
        }
    $scope.getBlckdAcc=()=>{
        $http.get("php/All_blo_acc.php").then((Response)=>{
            data=Response.data;
            if(data[0]==0){
                $scope.blocked_Accs="There are no blocked accounts";
                $scope.blocked_Acc_prcnt=0;
                $scope.showBlockedContent=true;
                $scope.showBlockedAccs=false;
            }
            else{
                $scope.showBlockedContent=false; 
                $scope.showBlockedAccs=true;               
                blocked_Acc= (Response.data).length;
                $scope.all_blo_acc=Response.data;
                all_acc=active_accounts+blocked_Acc;
                $scope.blocked_Acc_prcnt=(blocked_Acc/all_acc)*100;
                $scope.blocked_Accs=$scope.blocked_Acc_prcnt+"% of the accounts are blocked";
            }
            })
        }
    $scope.delAcc=(id)=>{
        let config={
            method:'POST',
            url:'php/delAcc.php',
            data:{
                'id':id
            }
        };
        let request = $http(config);
        request.then((response)=>{
            if(response.data=='done'){
                $scope.get_active_accs();
                $scope.getBlckdAcc();
                $scope.getAcc();
            }
            else{
                swal({
                    text:response.data,
                    confirmButtonColor:'#221860'
                })
            }
        })
    }
    $scope.handle=(id)=>{
        let config={
            method:'POST',
            url:'php/handle.php',
            data:{
                'id':id
            }
        };
        let request = $http(config);
        request.then((response)=>{
            if(response.data=='done'){
                $scope.get_active_accs();
                $scope.getBlckdAcc();
            }
            else{
                swal({
                    text:response.data,
                    confirmButtonColor:'#221860'
                })
            }
        })
    }
    $scope.getbookedAcc=()=>{
        $http.get("php/bookedacc.php").then((Response)=>{
            $scope.booked_accs=Response.data;
            if($scope.booked_accs==0){
                $scope.bookedAcc=0;
                $scope.showbooked=false;
            }
            else{
                $scope.bookedAcc = $scope.booked_accs.length;
                booked_acs = $scope.booked_accs.length;
                $scope.showbooked=true;
            }
        })
    }
    $scope.getpendingAcc=()=>{
        $http.get("php/pending_acc.php").then((Response)=>{
            $scope.pending_accs=Response.data;
            if($scope.pending_accs==0){
                $scope.pendingAcc=0;
                $scope.showpending=false;
            }
            else{
                $scope.pendingAcc = $scope.pending_accs.length;
                $scope.showpending=true;                
            }
        })
    }
    $scope.getprojects=()=>{
        $http.get("php/prjcts.php").then((Response)=>{
            data= Response.data;
            if(Response.data==0){
                $scope.prjcts = 0;
            }
            else{
                $scope.prjcts = data.length-1;
            }
            })
    }
    $scope.getearns=()=>{
        $http.get("php/earned.php").then((Response)=>{
            money=0;
            data = Response.data;
            if(Response.data==null){
                $scope.showEarnings=false;
                $scope.showContent_Earnings=true;
                $scope.all_earned_money=money;                
            }
            else{
                $scope.showEarnings=true;                
                data.forEach(element => {
                    money += parseInt(element.earned);
                });
                $scope.showContent_Earnings=false;
                $scope.showEarnings=true;                             
                $scope.all_money_earned=Response.data;
                $scope.all_earned_money=money;
                // console.log(money);                
            }
        })
    }
    $scope.delEarn=(id)=>{
        swal({
            title:'Are you sure?',
            text:"You wont be able to revert this!",
            type:'warning',
            showCancelButton: true,
            confirmButtonColor:'#ed6080',
            cancelButtonColor:'#6884fc',
            confirmButtonText:'delete'
        }).then((result)=>{
            if(result.value){
                let config={
                    method:'POST',
                    url:'php/delEarn.php',
                    data:{
                        'id':id
                    }
                };
                let request = $http(config);
                request.then((response)=>{               
                    if(response.data=='reload'){
                        $window.location.reload();
                    }
                    else if(response.data=='done'){
                        $window.location.reload();                         
                    }
                    else{
                        swal({
                            text:response.data
                        })
                    }
                })
            }
        })
    }
    $scope.get_user_info=()=>{
        $http.get("php/userdinfo.php").then((Response)=>{
            data=Response.data;
            $scope.username=data[0].username;
            $scope.user_Fname=data[0].Fname;
            $scope.user_Sname=data[0].Sname; 
            $scope.user_name=data[0].username; 
            $scope.user_phone=data[0].phone;                       
            $scope.user_email=data[0].email;
            if(data[0].auth==0 && data[0].type=='male'){
                $scope.pic="male_user.png";
            }
            else if(data[0].auth==0 && data[0].type=='female'){
                $scope.pic="female_user.png";                
            }
            else{
                $scope.pic="admin.png";
            }
            // console.log(Response.data);
            })
        }
    $scope.update_user_info=()=>{
        let info_object={
            method:'POST',
            url:'php/upd_user_info.php',
            data:{
                'Uname':$scope.user_name,
                'Fname':$scope.user_Fname,
                'Sname':$scope.user_Sname,
                'email':$scope.user_email,
                'phone':$scope.user_phone,
            }
        };
        let send = $http(info_object);
        send.then((response)=>{
            if(response.data=='done'){
                $window.location.reload();
            }
            else{
                swal({
                    text:response.data
                })
            }
        })
    }
    $scope.logout=()=>{
        $window.location.href="php/logout.php";
    }
    $scope.createAccount=()=>{
        if($scope.user_password==null || $scope.confirm_user_password==null || $scope.user_Fname==null || $scope.user_Sname==null || $scope.user_name==null || $scope.user_phone==null || $scope.user_email==null){

        }
        else if($scope.user_password!=$scope.confirm_user_password){
            swal({
                text:"the passwords must be the same"
            });
        }
        else{
            let config={
                method:'POST',
                url:'php/admin_signup.php',
                data:{
                    'Fname':$scope.user_Fname,
                    'Sname':$scope.user_Sname, 
                    'Uname':$scope.user_name, 
                    'phone':$scope.user_phone,
                    'email':$scope.user_email,                                     
                    'password':$scope.user_password
                }
            };
            let request = $http(config);
            request.then((response)=>{
                if(response.data=='registered'){
                    $window.location.reload();                                
                }
                else if(response.data=='empty'){
                    swal({
                        text:response.data,
                        confirmButtonColor:'#6884fc'                        
                    })
                }
                else{
                    swal({
                        text:response.data,
                        confirmButtonColor:'#6884fc'                        
                    })
                }
            })
        }
    }
    $scope.getselected_user=(name)=>{
        let config={
            method:'POST',
            url:'php/getPendingUsers.php',
            data:{
                'name':name
            }
        };
        let request = $http(config);
        request.then((response)=>{
            if(response.data==null){
                $scope.pendinding_acc_details="There are no pending accounts now";
            }
            else{
                // console.log(response.data);
                $scope.pending_acc_details=response.data;
            }
        })
    }
    $scope.getMoney=(user_name,project_name)=>{
        $scope.dataForMoney=[{
            'user_name':user_name,
            'project_name':project_name
        }]
    }
    $scope.book=(project_name,user_name)=>{
        if($scope.money_gained==null){
        }
        else{
            let config={
                method:'POST',
                url:'php/book.php',
                data:{
                    'project_name':project_name,
                    'user_name':user_name,
                    'money_gained':$scope.money_gained
                }
            };
            let request = $http(config);
            request.then((response)=>{
                if(response.data=='done'){
                    $scope.getpendingAcc();
                    $scope.getbookedAcc();
                    $window.location.reload();
                }
                else{
                    swal({
                        text:response.data,
                        confirmButtonColor:'#221860'
                    })
                }
            })
        }
    }
    $scope.available=(id)=>{
        let config={
            method:'POST',
            url:'php/available.php',
            data:{
                'id':id
            }
        };
        let request = $http(config);
        request.then((response)=>{
            if(response.data=='done'){
                $scope.getpendingAcc();
                $scope.getbookedAcc();
                // $window.location.reload();
            }
            else{
                swal({
                    text:response.data,
                    confirmButtonColor:'#221860'
                })
            }
        })
    }
    $scope.del_deal=(project_name,buyer_Fname)=>{
        swal({
            title:'Are you sure?',
            text:"You wont be able to revert this!",
            type:'warning',
            showCancelButton: true,
            confirmButtonColor:'#ed6080',
            cancelButtonColor:'#6884fc',
            confirmButtonText:'delete'
        }).then((result)=>{
            if(result.value){
                let config={
                    method:'POST',
                    url:'php/del_deal.php',
                    data:{
                        'project_name':project_name,
                        'buyer_Fname':buyer_Fname
                    }
                };
                let request = $http(config);
                request.then((response)=>{               
                    if(response.data=='done update'){
                        $window.location.reload();
                    }
                    else{
                        $window.location.reload();
                    }
                })
            }
        })
    }
    $scope.getselected_user();
    $scope.getpendingAcc();
    $scope.get_active_accs();
    $scope.getearns();
    $scope.getprojects();
    $scope.getbookedAcc();
    $scope.getBlckdAcc();
    $scope.getAcc();
    $scope.get_user_info();
    $scope.getNames();
})
//details
var details=angular.module("details",[]);
details.controller("myCtrl",function($scope,$http,$window){
    $scope.selected_post_details=()=>{
        $http.get("php/get_project_info.php").then((response)=>{
            project_info = response.data;
            $scope.selected_project_name = project_info[0].project_name;
            $scope.selected_project_date = project_info[0].date;
            $scope.selected_project_description = project_info[0].descr;
            $scope.selected_project_price = project_info[0].price;
            $scope.selected_project_image = project_info[0].image;                                                                    
        })
        $http.get("php/get_p_name_store.php").then((Response)=>{
            data = Response.data;
            let photo_object={
                method:'POST',
                url:'php/index_get_photos.php',
                data:{
                    'name':data[0].project_name,
                    'creator':data[0].user_name
                }
            };
            let post_photo_object = $http(photo_object);
            post_photo_object.then((response)=>{
                if(response.data==0){
                    $scope.selected_project_photos="no photos";
                }
                else{
                    $scope.selected_project_photos=response.data;
                }
            });
            let object={
                method:'POST',
                url:'php/get_user_info.php',
                data:{
                    'creator':data[0].user_name
                }
            };
            let post = $http(object);
            post.then((response)=>{
                user_info=response.data;
                $scope.selected_project_creator_username=user_info[0].username;
                $scope.selected_project_creator_description=user_info[0].descr;
                if(user_info[0].type=='female'){
                    $scope.selected_project_creator_type='card_user';
                }
                else if(user_info[0].type=='male'){
                    $scope.selected_project_creator_type='card-dash-user';
                }
                if(user_info[0].booked=='available'){
                    $scope.selected_project_creator_status='available';
                }
                else if(user_info[0].booked=='pending'){
                    $scope.selected_project_creator_status='available';
                }
                else if(user_info[0].booked=='booked'){
                    $scope.selected_project_creator_status='booked';
                }
            });
        })
    }
    $scope.check_if_booked=(p_name,u_name)=>{
        let config={
            method:'POST',
            url:'php/check_if_booked.php',
            data:{
                'name':p_name,
                'creator':u_name
            }
        };
        let request = $http(config);
        request.then((response)=>{
            if(response.data=='stop'){
                swal({
                    text:"This user is booked",
                    confirmButtonColor:"#343a40"
                })
            }
            else{               
                $window.location.href="./book.html";          
            }
        });
    }
    $scope.selected_post_details();
});
// new Chart(document.getElementById("line-chart"),{
//     type:'line',
//     data:{
//         datasets:[
//             {
//                 label:"Earnings",
//                 color:["#d3d2ef"],
//                 borderColor:["#6884fc"],
//                 data:[5378,2267,8983,90,837,67,3,89],
//                 fill: true
//             },
//             {
//                 label:"prices",
//                 color:["#d3d2ef"],
//                 borderColor:["#ed6080"],
//                 data:[1000,6473,923,1345,324,893,8903,22],
//                 fill: true
//             }
//         ],
//         labels:["-jan","feb","march","april","may","june","july","august"]
//     },
//     options:{
//         title:{
//             display:false
//         },
//         legend:{
//             labels:{
//                 fontColor:"#d3d2ef"
//             }
//         },
//         scales:{
//             yAxes:[{
//                 ticks:{
//                     fontColor:"#d3d2ef"
//                 }
//             }],
//             xAxes:[{
//                 ticks:{
//                     fontColor:"#d3d2ef"
//                 }
//             }]
//         }
//     }
// });