<?php 
include 'header.php';
include 'config.php';
include "Database.php";
?>

<?php 
$db = new Database();
// post the data to db 
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    $email = mysqli_real_escape_string($db->link,$_POST['email']);
    $skill = mysqli_real_escape_string($db->link,$_POST['skill']);


    // input validation 
    if($name == ''|| $email == '' || $skill == ''){
        $error ="field must be not empty";
    }else{
        $query = "INSERT INTO php_user(name,email,skill) VALUES ('$name','$email','$skill')";
        $create = $db->insert($query);
    }
}
?>
<?php 
if(isset($error)){
    echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="create.php" method="post">
<table>
<tr>
<td>Name</td>
<td><input type="text" name="name" placeholder="enter your name"></td>
</tr>

<tr>
    <td>Email</td>
    <td><input type="email" name="email" placeholder="enter your email"></td>
</tr>

<tr>
    <td>Skill</td>
    <td><input type="text" name="skill" placeholder="enter your skill"></td>
</tr>

<tr>
    <td></td>
    <td><input type="submit" value="submit" name="submit">
    <input type="reset" value="Cancel"></td>
</tr>
</table>
</form>

<a href="index.php">Back</a>

<?php include 'footer.php' ?>