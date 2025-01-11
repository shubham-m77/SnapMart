<?php 
require "db.php";
$password=mysqli_real_escape_string($db,md5($_POST['password']));
$email=mysqli_real_escape_string($db,$_POST['email']);
// Prepare a SQL statement to prevent SQL injection
$stmt = $db->prepare("SELECT * FROM register WHERE email = ?");
$stmt->bind_param("s",$email); // 's' stands for string
$stmt->execute();
$result = $stmt->get_result();
// Check if email and password are empty
if (empty($_POST['email']) || empty($_POST['password'])) {
    echo "Please fill in both email and password!";
    exit;
}
else{
    // Check if the user exists and if the password is correct
if ($result->num_rows != 0) {
    $user = $result->fetch_assoc();
    
    // Verify the entered password with the hashed password stored in the database
    if ($user['password'] === $password) {
        $en_email=base64_encode($email);
        $expire=time()+(86400 * 30);
        setcookie('sm_auth_ui',$en_email,$expire,'/',$_SERVER['HTTP_HOST'], true, true);
        echo "User found";
    } else {
        echo "Entered wrong Id or Password !!";
    }
} else {
    echo "Entered wrong Id or Password !!";
}
}

?>