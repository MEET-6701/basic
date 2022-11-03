<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "test";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $db);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";

?>
  
<form action="" method="post">
<lable>name</lable>
<input type="text" name="name" id=""><br>
<lable>point</lable>
<input type="text" name="point" id=""><br>
<lable>wins</lable>
<input type="text" name="wins" id=""><br>
<input type="submit" value="Submit" name="submit" />
</form>

<?php
if(isset($_POST['submit'])){ 
$name = $_REQUEST["name"];
$point = $_REQUEST["point"];
$wins = $_REQUEST["wins"];

$sql = "INSERT INTO score (name, point, wins)
VALUES ('$name', '$point', '$wins')";
}
if ($mysqli->query($sql) === TRUE) {
echo "<script> alert('success');
window.location.href = 'config.php' </script>";

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}