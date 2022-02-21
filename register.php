<?php

$error = json_decode($_GET['error'],true);
$approved = json_decode($_GET['app'],true);
// echo "<pre>";
// echo var_dump($error);
// echo var_dump(array($approved['skills']))."<br>";
// if(empty($approved['skills'])){echo var_dump($approved['skills'])."<br> this is if";}else{echo "this else";}
// echo var_dump($approved);
// if(isset($approved['skills'])){
//     echo "hi";
// }else{
//     echo "bye";
// }
// echo var_dump($_GET['app']['skills'][0]);
// echo "</pre>";



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="studentControl.php">
    <label for="fname">First Name: </label>
        <input type="text" name="fname" <?php if(isset($_GET['app'])){echo "value=".$approved['fname'];} ?>><?php if(isset($error['fname'])){echo "<span style='color:red';>{$error['fname']}</span>";}?><br><br>
        <label for="lname">Last Name: </label>
        <input type="text" name="lname" <?php if(isset($_GET['app'])){echo "value=".$approved['lname'];} ?> ><?php if(isset($error['lname'])){echo "<span style='color:red';>{$error['lname']}</span>";}?><br><br>
        <label for="address">address: </label>
        <input type="text" name="address" <?php if(isset($_GET['app'])){echo "value=".$approved['address'];} ?>><?php if(isset($error['address'])){echo "<span style='color:red';>{$error['address']}</span>";}?><br><br>
        <label for="country">Country</label>
        <select name="country" id="country">
            <option name="" value="" selected>Selet Your Country</option>
            <option name="country" value="Egypt" <?php if(isset($approved)&&in_array("Egypt",$approved)){echo "selected";}?> >Egypt</option>
            <option name="country" value="UK" <?php if(isset($approved)&&in_array("UK",$approved)){echo "selected";}?> >Uk</option>
            <option name="country" value="USA" <?php if(isset($approved)&&in_array("USA",$approved)){echo "selected";}?> >USA</option>
            <option name="country" value="UAE" <?php if(isset($approved)&&in_array("UAE",$approved)){echo "selected";}?> >UAE</option>
        </select><?php if(isset($error['country'])){echo "<span style='color:red';>{$error['country']}</span>";}?><br><br>
        <label for="sex">Gender: </label>
        <input type="radio" value="Male" name="sex"  <?php if(isset($approved)&&in_array("Male",$approved)){echo "checked";}?>>Male
        <input type="radio" value="Female" name="sex" <?php if(isset($approved)&&in_array("Female",$approved)){echo "checked";}?>>Female<?php if(isset($error['sex'])){echo " <span style='color:red';>{$error['sex']}</span>";}?><br><br>
        <label for="skills">skills:<?php if(isset($error['skills'])){echo "<span style='color:red';>{$error['skills']}</span>";}?></label>
        <input type="checkbox" name="skills[]" value="PHP" <?php if(($approved['skills'])&&in_array("PHP",$approved['skills'])){echo "checked";}?> >PHP
        <input type="checkbox" name="skills[]" value="JS" <?php if(($approved['skills'])&&in_array("JS",$approved['skills'])){echo "checked";}?>>JS <br><br>
        <input type="checkbox" name="skills[]" value="CSS" <?php if(($approved['skills'])&&in_array("CSS",$approved['skills'])){echo "checked";}?>>CSS
        <input type="checkbox" name="skills[]" value="SQL" <?php if(($approved['skills'])&&in_array("SQL",$approved['skills'])){echo "checked";}?>>SQL
        <input type="checkbox" name="skills[]" value="Other" <?php if(($approved['skills'])&&in_array("Other",$approved['skills'])){echo "checked";}?>>Other <br><br>
        <label for="username">Email: </label>
        <input type="email" name="email" <?php if(isset($_GET['app'])){echo "value=".$approved['email'];} ?>><?php if(isset($error['email'])){echo "<span style='color:red';>{$error['email']}</span>";}?><br><br>
        <label for="password">Password: </label>
        <input type="password" name="password" <?php if(isset($_GET['app'])){echo "value=".$approved['password'];} ?>><?php if(isset($error['password'])){echo "<span style='color:red';>{$error['password']}</span>";}?><br><br>
        <label for="department">Department: </label>
        <input type="text" name="department" <?php if(isset($_GET['app'])){echo "value=".$approved['department'];} ?>><?php if(isset($error['department'])){echo "<span style='color:red';>{$error['department']}</span>";}?><br><br>
        <label for="img">Upload File: </label>
        <input type="submit" name="add" value="Add Student">
        <input type="reset"> 
    </form>
</body>
</html>