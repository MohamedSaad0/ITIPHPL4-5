<?php

// if ($_COOKIE['fname']) {
//     echo "<h2> Welcome {$_COOKIE['fname']}</h2>";
// } else {
//     header("Location:login.php");
// }

$ID = $_GET["id"];

echo "<a href='list.php'> Back to student list</a>";

$data = json_decode($_GET['data']);

// 1- Connect with Pdo

foreach ($data as $key => $value) {
    echo "<li>";
    echo "$key : $value";
    echo "</li>";
}
echo "<ul>";
