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
            elseif($usertype==1 || $usertype==4){
                $_SESSION['name']=$row['Name'];
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
            if ($row['message'] != 'already_registred') {
                sendemail($row['Vcode'],$email);
            }
            
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
    $logo=$_FILES['logo'];
    $logoname=$logo['name'];
    $ext=explode(".",$logoname);
    // print_r($ext[count($ext)-1]);
    $dest="../logos/".$company_name."-".uniqid().".".$ext[count($ext)-1];
 $file="";
    if(move_uploaded_file($logo['tmp_name'],$dest)){
        
    $query = "CALL Companyregistration($userid,'$company_name','$comp_type','$enit_num','$cont_num','$com_email','$dest','$file','$passconde','$stree_add','$city','$state','$dire_name','$id_num','$profession','$academy_level','$director_email','$Pass')";

    $result = $conn->query($query);
    } 

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

function searchCompany($conn){
    extract($_POST);

    $query = "call searchCompany('$q')";

    $res = $conn->query($query);
    $data = [];
    $rows=[];
    if ($res) {
       
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $rows[]=$row;
            }
            $data = array("status" => true, "data" => $rows);
        } else {
            $data = array("status" => false, "data" => "No Company Founded");            
        }
    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function sendemail($code,$email){
    $to = $email;
    $subject = "CIPRA Email Verification";
    $year=date("Y");
    $message = "
    <!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>CIPRA - Companies And Intellectual Property Registration Agency</title>
  </head>
  <body style='margin: 0;
  padding: 0;
  font-family:Tahoma, Geneva, Verdana, sans-serif;'>
    <header style='padding: 5px; padding-left:25px;
    background-color: #17b978;
    color: white;'>
      <h5 style='font-size: 30px;'>CIPRA</h5>
      <p style='font-size: 20px;'>Companies And Intellectual Property Registration Agency</p>
    </header>
    <div style=' height: 100%;
    margin: 15px;
    margin-top: 10%;
    font-size: 20px;
    font-weight: 500;
    text-align: center;'>
      <p>
        Verification Code is <br /><br />
        <span style='font-size: 30px;
        color: blue;
        border-bottom: 2px dashed orange;'>$code</span>
      </p>
      <br />
      <p>For More Info About CIPRA, Contact us info@srs.so</p>
      <br />
    </div>
    <footer
      style='
        padding: 25px;
        background-color: #17b978;
        color: white;
        position: fixed;
        bottom: 0;
        width: 100%;
        font-size: 20px;
      '
    >
      <div style=' display: flex;
      justify-content: space-around;'>
        <p>&copy; 2020-${year} CIPRA</p>
        <h5>Developed by <a href='javascript:' style='color: inherit;
            text-decoration: none;'>Hantech</a></h5>
      </div>
    </footer>
  </body>
</html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <noreplay@srs.so>' . "\r\n";


    mail($to,$subject,$message,$headers);

}

function getCompanies($conn){
    $uid=$_SESSION['userid'];

    $query = "call show_comp_regis('$uid')";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();
        while($row = $res->fetch_assoc()){
            $data[]=$row;
        }
        if ($res->num_rows>0) {
            $data = array("status" => true, "data" => $data);
        }
        else {
            $data = array("status" => false, "data" => "No Data Found"); 
        }
        
    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function gettrademark($conn){
    $uid=$_SESSION['userid'];
    $trade="trademark";

    $query = "call show_intellec_reg('$uid','$trade')";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();
        while($row = $res->fetch_assoc()){
            $data[]=$row;
        }
        if ($res->num_rows>0) {
            $data = array("status" => true, "data" => $data);
        }
        else {
            $data = array("status" => false, "data" => "No Data Found"); 
        }
        
    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}


function getcopyright($conn){
    $uid=$_SESSION['userid'];
    $copy="copyright";

    $query = "call show_intellec_reg('$uid','$copy')";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();
        while($row = $res->fetch_assoc()){
            $data[]=$row;
        }
        if ($res->num_rows>0) {
            $data = array("status" => true, "data" => $data);
        }
        else {
            $data = array("status" => false, "data" => "No Data Found"); 
        }
        
    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}



function getpatent($conn){
    $uid=$_SESSION['userid'];
    $copy="patent";

    $query = "call show_intellec_reg('$uid','$copy')";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();
        while($row = $res->fetch_assoc()){
            $data[]=$row;
        }
        if ($res->num_rows>0) {
            $data = array("status" => true, "data" => $data);
        }
        else {
            $data = array("status" => false, "data" => "No Data Found"); 
        }
        
    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}