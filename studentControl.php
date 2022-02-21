<?php

$ID = $_GET['id'];

require_once("db.php");

// 1st Connection

$db = new DB();
$connection = $db->get_connection();

////////////  ADD  ///////////

if (isset($_POST['add'])) {
    $fname = validation($_POST["fname"]);
    $lname = validation($_POST["lname"]);
    $address = validation($_POST["address"]);
    $country = validation($_POST["country"]);
    $gender = validation($_POST["sex"]);
    $skills = $_POST["skills"];
    $email = validation($_POST["email"]);
    $password = validation($_POST["password"]);
    $department = validation($_POST["department"]);

    $cols = ['fname' => $fname,
    'lname' => $lname,
    'address' => $address,
    'country' => $country,
    'sex' => $gender,
    'skills' => $skills,
    'email' => $email,
    'password' => $password,
    'department' => $department];
    $skill = "";
    $errors = [];
    $approved = ['fname' => "", 'lname' => "", 'address' => "", 'country' => "", 'sex' => "", 'skills' => "", 'email' => "", 'password' => "", 'department' => ""];
    $required = ['fname', 'lname', 'address', 'country', 'sex', 'skills', 'email', 'password', 'department'];


    foreach ($skills as $value) {
        $skill .= $value . " ";
    }
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = "This Field is required";
        } else {
            $approved[$field] = $_POST[$field];
        }
    }
    if (count($errors)) {
        $errors = json_encode($errors);
        $approved = json_encode($approved);
        header("location:register.php?error=$errors&app=$approved");
    } else {
        
            
        // $db->insert("student",$_POST);

        $connection->query("insert into student set 
        fname = '$fname',
        lname = '$lname',
        address = '$address',
        country = '$country',
        gender = '$gender',
        skills = '$skill',
        email = '$email',
        password = '$password',
        department = '$department'
        ");
        $db = null;
        header("location:list.php?data=$data");
    }
}
////////////////////////////////////////////////////////////////////////////

if (isset($_GET['delete'])) {
    $ID = $_GET['id'];
    // $connection->query("delete from student where ID = $ID");
    $db->delete("student","id = $ID");
    // $db->delete("student", "id = $ID");
    header("Location:list.php");
    $db = null;
}

//////////////////////////////////////////////////////////////////////////////

if (isset($_GET['show'])) {
    // $query = $connection->query("
    //     SELECT * FROM student WHERE ID = $ID");
    $data = $db->select(" * ", " student ", " id = $ID ");
    $data = $data->fetch(PDO::FETCH_ASSOC);
    $data = json_encode($data);
    header("Location:show.php?data=$data");
}

////////////////////////////////////////////////////////////////////////////////

if (isset($_GET['edit'])) {
    // $query = $connection->query("
    //     SELECT * FROM student WHERE ID = $ID");
    $query = $db->select(" * ", "student", " id = $ID ");
    $data = $query->fetch(PDO::FETCH_ASSOC);
    $data = json_encode($data);
    header("Location:edit.php?data=$data");
}

///////////////////////////////////////////////////////////////////////////////

if (isset($_GET['update'])) {
    $fname = validation($_GET["fname"]);
    $lname = validation($_GET["lname"]);
    $address = validation($_GET["address"]);
    $country = validation($_GET["country"]);
    $gender = validation($_GET["sex"]);
    $skills = $_GET["skills"];
    $email = validation($_GET["email"]);
    $password = validation($_GET["password"]);
    $department = validation($_GET["department"]);
    $id = $_GET["id"];
    $skill = "";

    foreach ($skills as $value) {
        $skill .= $value . " ";
    }

    $query = $connection->query("
        update student
        set fname='$fname',lname='$lname',address='$address',country='$country',gender='$gender',skills='$skill',email='$email',
        password='$password',department='$department'
        where ID = $id
        ");
    
    // header("Location:studentControl.php?id=$id&edit");
    header("refresh:5;url=studentControl.php?id=$id&edit");
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="list.php">Here</a>. to go to list page';
    // echo "<a href='header('refresh:5;url=studentControl.php?id=$id&edit')'></a>";
}

///////// Login////////
if (isset($_POST['login'])) {

    $data = $db->select("*", "student", "email='{$_POST['email']}' and password='{$_POST['password']}'");
    // $data = $connection->query("
    // select * from student where email='{$_POST['email']}' and password='{$_POST['password']}'
    // ");
    var_dump($data);
    if ($data) {
        $studentInfo = $data->fetch(PDO::FETCH_ASSOC);
        var_dump($studentInfo);
        // setcookie('fname', $studentInfo['fname']);
        // header("Location:ListStudent.php?fname={$StudentInfo['fname']}");
        header("Location:list.php");
    } else {
        header("Location:login.php");
    }
}


// Close Connection

$connection = null;


function validation($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    // same code but shortend
    // $data = htmlspecialchars(stripslashes(trim($data)));
    return $data;
}
