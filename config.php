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



$sql = "SELECT * FROM score";
$result = $mysqli -> query($sql);

if ($result->num_rows > 0) 
{
    // OUTPUT DATA OF EACH ROW
    while($row = $result->fetch_assoc())
    {
       $data[] = $row;
    }
} 
else {
    echo "0 results";
}



usort($data, function($a, $b) {
    $retval = $b['point'] <=> $a['point'];
    if ($retval == 0) {
        $retval = $b['wins'] <=> $a['wins'];
    }
    return $retval;
});

?>
<table>
<thead>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>points</td>
        <td>wins</td>

    </tr>
</thead>
    <?php
foreach($data as $d){
    ?>
    <tr>
    <td><?php echo  $d["id"]."<br>"; ?></td>
    <td><?php echo  $d["name"]."<br>"; ?></td>
    <td><?php echo  $d["point"]."<br>"; ?></td>
    <td><?php echo  $d["wins"]."<br>"; ?></td>
    </tr>
    <?php
}
    ?>
</table>

<a href="insert.php"><button>insert</button></a>
<?php
// Free result set
$result -> free_result();
?>

