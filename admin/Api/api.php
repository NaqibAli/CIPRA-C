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
            $_SESSION['usertype'] = $row['usertype'];
            getUserIfo($row['id'], $row['usertype'], $conn);

        }
    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);

}
function OwnerReg($conn)
{
    $code = random_int(10000, 999999);
    extract($_POST);
    $query = "call ownerRegistration1('$email','$password','$phone','$name',$code)";
    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();
        if ($row['message']) {
            $data = array("status" => true, "data" => $row['message']);
            $_SESSION['email'] = $email;
            if ($row['message'] != 'already_registred') {
                sendemail($row['Vcode'], $email);
            }

        } else {
            $data = array("status" => false, "data" => "error");

        }
    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);

}
function verifyemail($conn)
{
    extract($_POST);

    $query = "call verifyemail('$email','$code')";
    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();
        if ($row['message']) {
            $data = array("status" => true, "data" => $row['message']);
            if ($row['message'] == "verified") {
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

function Profile($conn)
{
    $userid = $_SESSION['userid'];
    extract($_POST);
    $address = $Country . "/" . $State . "/" . $City;
    $profile = "";
    $Date_of_birth = date("Y/m/d", strtotime($Date_of_birth));
    $query = "call CompeteOwnerInfo('$userid','$Full_Name','$nationality','$Date_of_birth','$gender','$idtype','$ID_Number','$Race','$Phone_Number','$Home_Number','$Office_Number','$address','$profile')";
    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();
        if (isset($row['message'])) {
            $data = array("status" => true, "data" => $row['message']);
            getUserIfo($userid, $_SESSION['usertype'], $conn);
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);

}

function getApplications($conn)
{

    $query = "CALL getApplications()";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }

        if ($res->num_rows > 0) {
            $data = array("status" => true, "data" => $data);
        } else {
            $data = array("status" => false, "data" => "No Data Found");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function newIp($conn)
{

    extract($_POST);
    $userid = $_SESSION['userid'];
    $picture = "";
    $documentsa = "";
    $data = [];
    $date = date("Y/m/d", strtotime($date));

    $ipdocument = $_FILES['document'];
    $symbol = $_FILES['symbol'];

// ip symbol
    $symbolname = $symbol['name'];
    $ext = explode(".", $symbolname);
    $picture = $ip_type . "-" . $_SESSION['name'] . "-" . $ext[0] . "-" . uniqid() . "." . $ext[count($ext) - 1];
    $sdest = "../uploads/ip_pictures/" .$picture;
    if (move_uploaded_file($symbol['tmp_name'], $sdest)) {

    } else {
        $data = array("status" => false, "data" => "Symbol Upload Failed");
        echo json_encode($data);
        return;
    }


    // ip symbol ended
// Ip Documents

$lgdest = "";
$docnames = [];
// Ip documents Ended

if ($proc_type == 1) {
    $query = "call CipRegistration('$type','$applic_type','$ip_type','$date','$tile_work','$picture','',$mycompanies);";
} else {
    // logo upload
    $logo = $_FILES['logo'];
    $logoname = $logo['name'];
    $ext = explode(".", $logoname);
    $logocompany = $comp_name . "-" . uniqid() . "." . $ext[count($ext) - 1];
    $dest = "../uploads/logos/" . $logocompany;
    $lgdest=$dest;
    if (move_uploaded_file($logo['tmp_name'], $dest)) {
    } else {
        $data = array("status" => false, "data" => "Logo Upload Failed");
        echo json_encode($data);
        return;
    }
// logo upload ended
    $query = "call ipRegistration($userid,'$applic_type','$ip_type','$date','$tile_work','$picture','','$comp_name','$comp_type','$enty_num','$cont_num','$email','$logocompany','','$comp_add','$city','$state','$passcode','$type');";

    $cdocuments = $_FILES['files'];
    
for ($i = 0; $i < count($cdocuments['name']); $i++) {
    $ext1 = explode(".", $cdocuments['name'][$i]);
    $docname = $ext1[0] . '-' . $comp_name . "-" . uniqid() . "." . $ext1[count($ext1) - 1];
    $dest = '../uploads/documents/' . $docname;
    $docnames[$i] = $dest;
    if (!move_uploaded_file($cdocuments['tmp_name'][$i], $dest)) {
        $data = array("status" => false, "data" => "Document Upload Failed");
        echo json_encode($data);
        return;
    } else {
        $query .= "\nCALL AddDocs('$docname',getCompanyID($userid,'$email'),'','insert','company');";
    }
}

}

for ($i = 0; $i < count($ipdocument['name']); $i++) {
    $ext1 = explode(".", $ipdocument['name'][$i]);
    $docname = $ext1[0] . '-' . $ip_type . "-" . uniqid() . "." . $ext1[count($ext1) - 1];
    $dest = '../uploads/documents/' . $docname;
    $docnames[$i] = $dest;
    if (!move_uploaded_file($ipdocument['tmp_name'][$i], $dest)) {
        $data = array("status" => false, "data" => "Document Upload Failed");
        echo json_encode($data);
        return;
    } else {
        if ($proc_type == 1) {
            $c=$mycompanies;
        }
        else{
            $c="getCompanyID($userid,'$email')";
        }
        $query .= "\nCALL AddDocs('$docname',".$c.",'','insert','$type');";
    }
}
$singleP = explode(';', $query);

    $m = "";
    for ($j = 0; $j < count($singleP) - 1; $j++) {
        $result = $conn->query($singleP[$j]);
        if ($result) {
            if ($j == 0) {
                $row = $result->fetch_assoc();
                if ($row['message'] == "copyrightregistered") {
                    $m .= $type." Submitted Successfully";
                } elseif ($row['message'] == "alreadyexistc") {
                    $data = array("status" => false, "data" => "Company With This Name Already Exist");
                    echo json_encode($data);
                    unlink($lgdest);
                    for ($i = 0; $i < count($docnames); $i++) {
                        unlink($docnames[$i]);
                    }
                    $result->close();
                    $conn->next_result();
                    return;
                }
                $result->close();
            }

        } else {
            $data = array("status" => false, "data" => $conn->error);
            echo json_encode($data);
            unlink($lgdest);
            for ($i = 0; $i < count($docnames); $i++) {
                unlink($docnames[$i]);
            }
            return;
            $result->close();
            $conn->next_result();
            

        }

        $conn->next_result();

    }
    $data = array("status" => true, "data" => $m);
    echo json_encode($data);
}

function registerCompany($conn)
{
    $userid = $_SESSION['userid'];
    extract($_POST);
    $data = [];
    $logo = $_FILES['logo'];
    $logoname = $logo['name'];
    $ext = explode(".", $logoname);
    $logocompany = $company_name . "-" . uniqid() . "." . $ext[count($ext) - 1];
    $dest = "../uploads/logos/" . $logocompany;
    $lgdest = $dest;
    $files = $_FILES['docs'];
    $docnames = [];
    if (move_uploaded_file($logo['tmp_name'], $dest)) {

        $query = "CALL Companyregistration($userid,'$company_name','$comp_type','$enit_num','$cont_num','$com_email','$logocompany','','$passconde','$stree_add','$city','$state','$dire_name','$id_num','$profession','$academy_level','$director_email','$Pass');";

    } else {
        $data = array("status" => false, "Message" => "Logo Upload Failed");
        echo json_encode($data);
        return;
    }
    for ($i = 0; $i < count($files['name']); $i++) {
        $ext1 = explode(".", $files['name'][$i]);
        $docname = $ext1[0] . '-' . $company_name . "-" . uniqid() . "." . $ext1[count($ext1) - 1];
        $dest = '../uploads/documents/' . $docname;
        $docnames[$i] = $dest;
        if (!move_uploaded_file($files['tmp_name'][$i], $dest)) {
            $data = array("status" => false, "Message" => "Document Upload Failed");
            echo json_encode($data);
            return;
        } else {
            $query .= "\nCALL AddDocs('$docname',getCompanyID($userid,'$com_email'),'','insert','company');";
        }
    }

    $singleP = explode(';', $query);

    $m = "";
    for ($j = 0; $j < count($singleP) - 1; $j++) {
        $result = $conn->query($singleP[$j]);
        if ($result) {

            if ($j == 0) {
                $row = $result->fetch_assoc();
                if ($row['message'] == "companyregistered") {
                    $m .= "Application Submitted Successfully";
                } elseif ($row['message'] == "emailIsInuse") {
                    $data = array("status" => false, "Message" => "Director Email already registred As Account");
                    echo json_encode($data);
                    unlink($lgdest);
                    for ($i = 0; $i < count($docnames); $i++) {
                        unlink($docnames[$i]);
                    }
                    $result->close();
                    $conn->next_result();
                    return;
                } elseif ($row['message'] == "alreadyexistc") {
                    $data = array("status" => false, "Message" => "Company With This Name Already Exist");
                    echo json_encode($data);
                    unlink($lgdest);
                    for ($i = 0; $i < count($docnames); $i++) {
                        unlink($docnames[$i]);
                    }
                    $result->close();
                    $conn->next_result();
                    return;
                }
                $result->close();
            }

        } else {
            $data = array("status" => false, "Message" => $conn->error);
            echo json_encode($data);
            unlink($lgdest);
            for ($i = 0; $i < count($docnames); $i++) {
                unlink($docnames[$i]);
            }
            $result->close();
            $conn->next_result();
            return;

        }

        $conn->next_result();

    }
    $data = array("status" => true, "Message" => $m);
    echo json_encode($data);

}

function searchCompany($conn)
{
    extract($_POST);

    $query = "call searchCompany('$q')";

    $res = $conn->query($query);
    $data = [];
    $rows = [];
    if ($res) {

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $rows[] = $row;
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

function sendemail($code, $email)
{
    $to = $email;
    $subject = "CIPRA Email Verification";
    $year = date("Y");
    $message = "
    <!DOCTYPE html>
    <html lang='en'>
  <head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>CIPRA - Companies And Intellectual Property Registration Agency</title>
  </head>
  <body>
    <header>
      <h5 style='font-size: 30px;'>CIPRA</h5>
      <p style='font-size: 20px;'>Companies And Intellectual Property Registration Agency</p>
    </header>
    <div>
      <p>
        Verification Code is <br /><br />
        <strong><span>$code</span></strong>
      </p>
      <br />
      <p>For More Info About CIPRA, Contact us <b> info@srs.so </b> </p>
      <br />
    </div>
    <footer>
      <div>
        <p>&copy; 2020 - ${year} CIPRA</p>
        <h5>Developed by <b> <a href='_blank'>Hantech</a> </b></h5>
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

    mail($to, $subject, $message, $headers);

}

function getCompanies($conn)
{
    $uid = $_SESSION['userid'];

    $query = "call show_comp_regis('$uid')";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        if ($res->num_rows > 0) {
            $data = array("status" => true, "data" => $data);
        } else {
            $data = array("status" => false, "data" => "No Data Found");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function gettrademark($conn)
{
    $uid = $_SESSION['userid'];
    $trade = "trademark";

    $query = "call show_intellec_reg('$uid','$trade')";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        if ($res->num_rows > 0) {
            $data = array("status" => true, "data" => $data);
        } else {
            $data = array("status" => false, "data" => "No Data Found");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function getcopyright($conn)
{
    $uid = $_SESSION['userid'];
    $copy = "copyright";

    $query = "call show_intellec_reg('$uid','$copy')";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        if ($res->num_rows > 0) {
            $data = array("status" => true, "data" => $data);
        } else {
            $data = array("status" => false, "data" => "No Data Found");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function getpatent($conn)
{
    $uid = $_SESSION['userid'];
    $copy = "patent";

    $query = "call show_intellec_reg('$uid','$copy')";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        if ($res->num_rows > 0) {
            $data = array("status" => true, "data" => $data);
        } else {
            $data = array("status" => false, "data" => "No Data Found");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function getcompanyname($conn)
{
    $uid = $_SESSION['userid'];

    $query = "SELECT company_registration.id,company_registration.C_name FROM company_registration WHERE company_registration.ownerid=$uid and company_registration.pending=0";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        if ($res->num_rows > 0) {
            $data = array("status" => true, "data" => $data);
        } else {
            $data = array("status" => false, "data" => "No Data Found");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function modip($conn)
{
    extract($_POST);

    if ($mode == "update") {
        $query = "call modifyip('update','$ip_type','$id','$applic_type','$siptype','$mycompanies','$tile_work')";
    } elseif ($mode == "delete") {
        $query = "call modifyip('delete','$ip_type',$id,'','','','')";
    }

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            if ($row['message']) {
                $data = array("status" => true, "data" => $row['message']);
            } else {
                $data = array("status" => false, "data" => "error");

            }
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function AdminGetIp($conn)
{
    extract($_POST);

    $query = "call admin_getIps('$opt')";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        if ($res->num_rows > 0) {
            $data = array("status" => true, "data" => $data);
        } else {
            $data = array("status" => false, "data" => "No Data Found");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function getDirectorCompanies($conn)
{
    $uid = $_SESSION['userid'];

    $query = "call directorCompany($uid)";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();

        if ($res->num_rows > 0) {
            $data = array("status" => true, "data" => $row);
            $_SESSION['isactivecompany'] = true;
            $_SESSION['companyname'] = $row['C_name'];
        } else {
            $data = array("status" => false, "data" => "NoDataFound");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function approve($conn)
{
    extract($_POST);
    $uid = $_SESSION['userid'];
    $issuedate = date("Y/m/d", strtotime($issuedate));

    if ($type == "company") {
        $expiredate = date("Y/m/d", strtotime($expiredate));
        $query = "call approveCompanyApplication('','$issuedate','$expiredate','$id','$comp_id','company')";
    } else {
        $query = "call approveCompanyApplication('$lno','$issuedate','','$id','','$type')";
    }

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $data = array("status" => true, "data" => $row['message']);
        } else {
            $data = array("status" => false, "data" => "NoDataFound");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);

}

function ReadUser($conn)
{
    $uid = $_SESSION['userid'];
    extract($_POST);
    if (isset($opt)) {
        $query = "call ReadUser($id,'single')";
    } else {
        $query = "call ReadUser('','')";
    }

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        // $row = $res->fetch_assoc();
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        if ($res->num_rows > 0) {
            $data = array("status" => true, "data" => $data);
        } else {
            $data = array("status" => false, "data" => "No Data Found");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}
function updateUser($conn)
{
    extract($_POST);
    $data = [];
    $logo = $_FILES['profile_picture2'];
    if (!($logo['error'] == 4)) {
        $logoname = $logo['name'];
        $ext = explode(".", $logoname);
        $profile_picture = $name2 . "-" . uniqid() . "." . $ext[count($ext) - 1];
        $dest = "../profile_images/" . $profile_picture;
        if (move_uploaded_file($logo['tmp_name'], $dest)) {
            unlink("../profile_images/" . $prevlogo);
        } else {
            return;
        }
    } else {
        $profile_picture = $prevlogo;
    }

    $query = "CALL userregsitration($id,'$name2','','$password2','$status2','update','$profile_picture')";
    $result = $conn->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        if ($row['message'] == "userupdated") {
            $data = array("status" => true, "Message" => "user Rupdated Successfully");
        }
    } else {
        $data = array("status" => false, "Message" => $conn->error);
    }

    echo json_encode($data);
}

function userRegistration($conn)
{
    extract($_POST);
    $data = [];
    $logo = $_FILES['profile_picture'];
    $logoname = $logo['name'];
    $ext = explode(".", $logoname);
    // print_r($ext[count($ext)-1]);
    $profile_picture = $name . "-" . uniqid() . "." . $ext[count($ext) - 1];
    $dest = "../uploads/profile_images/" . $profile_picture;

    if (move_uploaded_file($logo['tmp_name'], $dest)) {

        $query = "CALL userregsitration('','$name','$email','$password','','insert','$profile_picture')";

        $result = $conn->query($query);
    }

    if ($result) {
        $row = $result->fetch_assoc();
        if ($row['message'] == "userRegistered") {
            $data = array("status" => true, "Message" => " user Registered Successfully");
        } elseif ($row['message'] == "Emailinuse") {
            $data = array("status" => false, "Message" => " Email already registred As Account");
        }

    } else {
        $data = array("status" => false, "Message" => $conn->error);
    }
    echo json_encode($data);
}

function deleteUser($conn)
{
    extract($_POST);

    $query = "CALL userregsitration($id,'','','','','delete','')";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();

        if ($res->num_rows > 0) {
            $data = array("status" => true, "data" => $row['message']);
        } else {
            $data = array("status" => false, "data" => "NoDataFound");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}
function getCompany($conn)
{

    extract($_POST);

    $query = "call GetCompany($id)";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();

        if ($res->num_rows > 0) {
            $data = array("status" => true, "data" => $row);
            $_SESSION['isactivecompany'] = true;

            $_SESSION['companyname'] = $row['C_name'];
        } else {
            $data = array("status" => false, "data" => "NoDataFound");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}
function getUserIfo($id, $usertype, $conn)
{
    $conn->next_result();
    $_SESSION['isloged'] = 1;
    $q = "select * from "; //owner where owner.id=$id";
    $s = "";
    if ($usertype == 1) {
        $s = "admin";
    } elseif ($usertype == 2) {
        $s = "owner";
    } elseif ($usertype == 3) {
        $s = "director";
    } elseif ($usertype == 4) {
        $s = "users";
    }

    $q .= $s . " where " . $s . ".id=$id";
    $res = $conn->query($q);
    if ($res) {
        $row = $res->fetch_assoc();
        if ($usertype == 2) {
            $_SESSION['name'] = $row['Fullname'];
            $_SESSION['phone'] = $row['phonenumber'];
            $_SESSION['iscompleted'] = $row['iscompleted'];
            $_SESSION['isverified'] = $row['isverified'];
        } elseif ($usertype == 3) {
            $_SESSION['name'] = $row['fullname'];
            $_SESSION['proffession'] = $row['proffession'];
        } elseif ($usertype == 1 || $usertype == 4) {
            $_SESSION['name'] = $row['Name'];
        }
        $_SESSION['userid'] = $row['id'];
        $_SESSION['email'] = $row['email'];
    } else {
        echo "error" . $res;
    }
}

function updatecompany($conn)
{
    extract($_POST);
    $newlogo = $_FILES['logo'];
    if ($newlogo['error'] == 4) {
        $logo = $previouslogo;
    } else {
        $nlogo = $_FILES['logo'];
        $logoname = $nlogo['name'];
        $ext = explode(".", $logoname);
        $logo = $compnayname . "-" . uniqid() . "." . $ext[count($ext) - 1];
        $dest = "../uplods/logos/" . $logo;
        if (move_uploaded_file($nlogo['tmp_name'], $dest)) {
            unlink("../uploads/logos/" . $previouslogo);
        } else {
            echo json_encode(array("status" => false, "data" => "Failed To Upload Logo"));
            return;
        }
    }

    $query = "call updateCompany('$compnayname','$companyType','$enitiynum','$Contnum','$Stadd','$city','$state','$passcode','$logo','$Email','$id')";
    $res = $conn->query($query);
    $data = [];
    if ($res) {
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $data = array("status" => true, "data" => $row['message']);
        } else {
            $data = array("status" => false, "data" => "No Data Found");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function getDocs($conn)
{

    extract($_POST);

    if (isset($isd) && $isd == 1) {
        $uid = $_SESSION['userid'];
        $query = "call getDocs(0,$type,$isd,$uid)";
    } else {
        $query = "call getDocs($id,$type,0,0)";
    }
    $res = $conn->query($query);
    $data = [];
    if ($res) {
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $data[] = $row;
            }
            $data = array("status" => true, "data" => $data);
        } else {
            $data = array("status" => false, "data" => "NoDataFound");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);
}

function updateDoc($conn)
{
    extract($_POST);
    $data = [];
    if ($type == 1) {
        $doc = $_FILES['docname'];
        $ext = explode(".", $doc['name']);
        $cname = "";
        if ($c_name == null) {
            // echo "if";
            $cname = $c_name;
        } else {
            // echo "else";
            $cname = $_SESSION['companyname'];
        }
        // echo $cname;

        $docname = $ext[0] . '-' . $cname . "-" . uniqid() . "." . $ext[count($ext) - 1];

        $dest = '../uploads/documents/' . $docname;

        if ($doc['error'] == 4) {
            $data = array("status" => false, "data" => "Please Choose File");
            echo json_encode($data);
            return;
        }
        if (move_uploaded_file($doc['tmp_name'], $dest)) {
            $query = "call editdocs($docid,'$docname',1)";
            unlink('../uploads/documents/' . $odocname);
        } else {
            echo "error";
        }
    } else if ($type == 2) {
        $query = "call editdocs($docid,'',2)";
        unlink('../uploads/documents/' . $odocname);
    }

    $res = $conn->query($query);

    if ($res) {
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();

            if ($row['Message'] == 'updated') {
                $data = array("status" => true, "data" => "New Document Uploaded");
            } else {
                $data = array("status" => true, "data" => "Document Deleted");
            }

        } else {
            $data = array("status" => false, "data" => "Error Occured");
        }

    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);

}
