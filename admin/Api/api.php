<?php
session_start();
include "../config/conn.php";
header("Content-Type:Application/Json");

if (isset($_POST['method'])) {
    $_POST['method']($conn);

}

function login($conn)
{
    extract($_POST);
    $query = "call Login('$username','$password')";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();
        if (isset($row['message'])) {
            $data = array("status" => false, "data" => $row['message']);
        } else {
            $data = array("status" => true, "data" => "loggedIn");
            $usertype=$row['usertype'];
            $_SESSION['isloged'] = 1;
            if($usertype == 2){
                $_SESSION['name'] = $row['Fullname'];
                $_SESSION['phone']= $row['phonenumber'];
                $_SESSION['iscompleted'] = $row['iscompleted'];
                $_SESSION['isverified'] = $row['isverified'];
            }
            elseif($usertype==3){
                $_SESSION['name'] = $row['fullname'];
                $_SESSION['proffession'] = $row['proffession'];
            }
            
            $_SESSION['usertype']=$usertype;
            $_SESSION['userid'] = $row['id'];
            $_SESSION['email'] = $row['email'];
           
            
        }
    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);

}
function OwnerReg($conn){
    $code=random_int(10000,999999);
    extract($_POST);
    $query = "call ownerRegistration1('$email','$password','$phone','$name',$code)";
    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();
        if ($row['message']) {
            $data = array("status" => true, "data" => $row['message']);
            $_SESSION['email']=$email;
        } else {
            $data = array("status" => false, "data" => "error");
            
        }
    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);

}
function verifyemail($conn){
    extract($_POST);
    
    $query = "call verifyemail('$email','$code')";
    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();
        if ($row['message']) {
            $data = array("status" => true, "data" => $row['message']);
            if ($row['message']=="verified") {
                $_SESSION['isverified'] = 1;
            }
        } else {
            $data = array("status" => false, "data" => "error");
            
        }
    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);

}

function Profile($conn){
    $userid= $_SESSION['userid'];
    extract($_POST);
    $address=$Country."/".$State."/".$City;
    $profile="";
    $Date_of_birth=date("Y/m/d",strtotime($Date_of_birth));
    $query = "call CompeteOwnerInfo('$userid','$Full_Name','$nationality','$Date_of_birth','$gender','$idtype','$ID_Number','$Race','$Phone_Number','$Home_Number','$Office_Number','$address','$profile')";
    $res = $conn->query($query);
     $data = [];
     if ($res) {
         $row = $res->fetch_assoc();
         if (isset($row['message'])) {
             $data = array("status" => true, "data" => $row['message']);
         }
     } else {
         $data = array("status" => false, "data" => $res);
     }
 
     echo json_encode($data);

}


function newIp($conn){
    extract($_POST);
    $userid=$_SESSION['userid'];
    $picture="";
    $documents="";
    $date=date("Y/m/d",strtotime($date));
    if ($proc_type == 1) {
        $query = "call CipRegistration('$type','$appl_num','$applic_type','$ip_type','$date','$tile_work','$picture','$documents',$mycompanies)";
    } else {
        $logo="";
        $cdocuments="";
        $query = "call ipRegistration($userid,'$appl_num','$applic_type','$ip_type','$date','$tile_work','$picture','$documents','$comp_name','$comp_type','$enty_num','$cont_num','$email','$logo','$cdocuments','$comp_add','$city','$state','$passcode','$type')";
    }

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();
        if ($row['message']) {
            $data = array("status" => true, "data" => $row['message']);
        } else {
            $data = array("status" => false, "data" => "error");
            
        }
    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function registerCompany($conn){
    $userid=$_SESSION['userid'];
    extract($_POST);
    $data = [];
    $logo="";
    $file="";
    $query = "CALL Companyregistration($userid,'$company_name','$comp_type','$enit_num','$cont_num','$com_email','$logo','$file','$passconde','$stree_add','$city','$state','$dire_name','$id_num','$profession','$academy_level','$director_email','$Pass')";

    $result = $conn->query($query);
    if($result){
       $row = $result->fetch_assoc(); 
       //key value 
       //as Message successuflllll
       if($row['message'] == "companyregistered"){
        $data = array("status"=> true, "Message"=> "Registered Successfully");
       }
       elseif($row['message'] == "emailIsInuse"){
        $data = array("status"=> false, "Message"=> "Director Email already registred As Account");
       }
       elseif($row['message'] == "alreadyexistc"){
        $data = array("status"=> false, "Message"=> "Company With This Name Already Exist");
       }

    }else{
       $data = array("status"=>false,"Message"=>$conn->error); 
    }
    echo  json_encode($data);

}