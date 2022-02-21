<?php

$data = $_GET['data'];

$student = json_decode($data,true);

$countries = ['Egy' => "Egypt", 'UK' => "UK", 'USA' => "USA", 'UAE' => "UAE"];
$gender = ['Male' => "Male", 'Female' => "Female"];
$type = $student['gender'];
$skill = explode(" ",$student['skills']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>

<body>
<form method="get" action="studentControl.php">
        <input type="hidden" name="id" value="<?= $student['id'] ?>">
        <label for="fname">First Name: </label>
        <input type="text" name="fname" value="<?= $student['fname'] ?>"><br>
        <label for="lname">Last Name: </label>
        <input type="text" name="lname" value="<?= $student['lname'] ?>"><br>
        <label for="address">address: </label>
        <input type="text" name="address" value="<?= $student['address'] ?>"><br>
        <label for="country">Country</label>
        <select name="country" id="country">
            <option name="country" value="" selected>Select Your Country</option>
            <?php
            foreach ($countries as $value) {
                if ($student['country'] == $value) {
                    echo "<option name='country' value='$value' selected>{$student['country']}</option>" . $key;
                    continue;
                }
                echo "<option name='country' value='$value' >$value</option>";
            }

            ?>

        </select><br>
        <label for="sex">Gender: </label>
        <?php
        foreach ($gender as $key => $sex) {
            if ($student['gender'] == $sex) {
                echo "<input type='radio' name='sex' value='$sex' checked> $sex";
                continue;
            }
            echo "<input type='radio' name='sex' value='$sex' > $sex";
        }
        echo "<br>";
        ?>
        <!-- <input type='radio' name='sex' value="Male" <?php echo ($student['gender'] == 'Male') ?  "checked" : "";  ?>>Male
        <input type='radio' name='sex' value="Female" <?php echo ($type == 'Female') ?  "checked" : "";  ?>>Female<br> -->
        <label for="skills">skills: </label>
        <input type="checkbox" name="skills[]" value="PHP" <?php echo (in_array('PHP',$skill)) ?  "checked" : "";  ?>>PHP
        <input type="checkbox" name="skills[]" value="JS" <?php echo (in_array('JS',$skill)) ?  "checked" : "";  ?>>JS <br><br>
        <input type="checkbox" name="skills[]" value="CSS" <?php echo (in_array('CSS',$skill)) ?  "checked" : "";  ?>>CSS
        <input type="checkbox" name="skills[]" value="SQL" <?php echo (in_array('SQL',$skill)) ?  "checked" : "";  ?>>SQL 
        <input type="checkbox" name="skills[]" value="Other" <?php echo (in_array('Other',$skill)) ?  "checked" : "";  ?>>Other <br><br>
        <label for="username">Email</label>
        <input type="email" value="<?= $student['email'] ?>" name="email"><br>
        <label for="password">Password</label>
        <input type="password" value="<?= $student['password'] ?>" name="password"><br>
        <label for="department">Department</label>
        <input type="text" value="<?= $student['department'] ?>" name="department"><br>
        <input type="submit" name="update" value=" Update Student">
        <a href="list.php">Back To Student List</a>
</body>

</html>