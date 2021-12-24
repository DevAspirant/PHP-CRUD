<?php 
include 'header.php';
include 'config.php';
include "Database.php";
?>

<?php 
$id = $_GET['id'];
$db = new Database();
$query = "SELECT * FROM php_user WHERE id=$id";
$getData = $db->select($query)->fetch_assoc();
// post the data to db 
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    $email = mysqli_real_escape_string($db->link,$_POST['email']);
    $skill = mysqli_real_escape_string($db->link,$_POST['skill']);


    // input validation 
    if($name == ''|| $email == '' || $skill == ''){
        $error ="field must be not empty";
    }else{
        $query = "UPDATE php_user SET 
                  name='$name',
                  email='$email',
                  skill='$skill'
                  WHERE id = $id";
        $update = $db->update($query);
    }
}
?>
<!-- delete an information -->
<?php 
if(isset($_POST['delete'])){
    $query = "DELETE FROM php_user WHERE id=$id";
    $deleteData = $db->delete($query);
}
?>

<!-- show msg in error -->
<?php 
if(isset($error)){
    echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="update.php?id=<?php echo $id ?>" method="post">
<table>
<tr>
<td>Name</td>
<td><input type="text" name="name" value="<?php echo $getData['name']; ?>"></td>
</tr>

<tr>
    <td>Email</td>
    <td><input type="email" name="email" value="<?php echo $getData['email']; ?>"></td>
</tr>

<tr>
    <td>Skill</td>
    <td><input type="text" name="skill" value="<?php echo $getData['skill']; ?>"></td>
</tr>

<tr>
    <td></td>
    <td>
        <input type="submit" value="update" name="submit">
        <input type="reset" value="Cancel">
        <input type="submit" value="delete" name="delete">
    </td>
</tr>
</table>
</form>

<a href="index.php">Back</a>

<?php include 'footer.php' ?>