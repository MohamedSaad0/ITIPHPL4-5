<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>

<body>
    <h2>
        <?php
        require("db.php");

        // $cols = "*";
        // $table = "student";
        ?>
    </h2>
    <div>
        <a href="register.php"> ADD STUDENT</a>
    </div>
    <table border="2px">

        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Address</th>
            <th>Country</th>
            <th>Gender</th>
            <th>Skills</th>
            <th>Email</th>
            <th>Password</th>
            <th>Department</th>
            <th colspan=3>User Options</th>
        </tr>
        <?php
        

        $connection = new PDO("mysql:host=localhost:3306;dbname=mydata", "root", "");

        $query = $connection->query("select * from student");

        $data = $query->fetchAll(PDO::FETCH_ASSOC);



        // $data = $_GET['data'];

        // $data = json_decode($_GET['data']);


        // echo var_dump($_GET['data']);

        foreach ($data as $arr) {
            echo "<tr>";
            foreach ($arr as $key => $value) {
                echo "<td>$value</td>";
            }
            echo "<td><a href='studentControl.php?id={$arr['id']}&show'>Show</a></td>";
            echo "<td><a href='studentControl.php?id={$arr['id']}&edit'>Edit</a></td>";
            echo "<td><a href='studentControl.php?id={$arr['id']}&delete'>Delete</a></td>";
            echo "</tr>";
        }
        // echo "<pre>";
        // echo var_dump($data);
        // echo var_dump($data[0]['fname']);
        // echo count($data);
        // echo "</pre>";





        // while ($data=$query->fetch(PDO::FETCH_ASSOC)) {
        //     echo "<tr>";
        //     echo "<td>{$data['id']}</td>";
        //     echo "<td>{$data['fname']}</td>";
        //     echo "<td>{$data['lname']}</td>";
        //     echo "<td>{$data['address']}</td>";
        //     echo "<td>{$data['country']}</td>";
        //     echo "<td>{$data['gender']}</td>";
        //     echo "<td>{$data['skills']}</td>";
        //     echo "<td>{$data['username']}</td>";
        //     echo "<td>{$data['password']}</td>";
        //     echo "<td>{$data['department']}</td>";

        //     echo "<td><a href='studentControl.php?id={$data['id']}&show'>Show</a></td>";
        //     echo "<td><a href='studentControl.php?id={$data['id']}&edit'>Edit</a></td>";
        //     echo "<td><a href='studentControl.php?id={$data['id']}&delete'>Delete</a></td>";
        //     echo "</tr>";
        // }

        $connection = null;

        ?>

    </table>
</body>

</html>