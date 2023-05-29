<?php 
$target = "images/"; 
$target = $target . basename( $_FILES['photo']['name']); 
$name=$_POST['name']; 
$email=$_POST['email']; 
$phone=$_POST['phone']; 
$pic=($_FILES['photo']['name']);

$servername = getenv('DB_SERVER');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASS');
$dbname = getenv('DB_NAME');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO visitors (name , email, phone, photo)
VALUES ('$name', '$email', '$phone', '$pic')";

if ($conn->query($sql) === TRUE) {
    echo "registration has been created ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)) 
{ 
echo "Dosya ". basename( $_FILES['uploadedfile']
['name']). " It is successfully uploaded to the server, and other records are also successfully entered into the database."; 
 } 
 else { 
 
echo "
An error occurred while uploading the file"; 
 } 
?>
<p>
<a href="view.php">View the records</a>