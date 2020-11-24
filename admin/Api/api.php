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
            $_SESSION['isloged'] = 1;
            $_SESSION['userid'] = $row['id'];
            $_SESSION['name'] = $row['Fullname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone']= $row['phonenumber'];
            $_SESSION['iscompleted'] = $row['iscompleted'];
            $_SESSION['isverified'] = $row['isverified'];
            
        }
    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);

}
function OwnerReg($conn){
    extract($_POST);
    $query = "call ownerRegistration1('$email','$password','$phone','')";

    $res = $conn->query($query);
    $data = [];
    if ($res) {
        $row = $res->fetch_assoc();
        if (isset($row['message'])) {
            $data = array("status" => false, "data" => $row['message']);
        } else {
            $data = array("status" => true, "data" => $row);
            $_SESSION['isloged'] = 1;
            $_SESSION['userid'] = $row['id'];
            $_SESSION['name'] = $row['Fullname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['iscompleted'] = $row['iscompleted'];
            $_SESSION['isverified'] = $row['isverified'];
            // header("Location:./index.php");
        }
    } else {
        $data = array("status" => false, "data" => $res);
    }

    echo json_encode($data);

}
