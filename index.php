
<?php 
include 'header.php';
include 'config.php';
include 'Database.php';
?>
<?php 

$db = new Database();
$query = "SELECT * FROM php_user";
$read = $db->select($query);
$sl = 1;

?>

<?php 
if(isset($_GET['msg'])){
    echo "<span style='color:green'>".$_GET['msg']."</span>";
}
?>
<table class="tmain"> 
    <tr>
        <th>SL</th>
        <th>name</th>
        <th>email</th>
        <th>skill</th>
        <th>action</th>
    </tr>

    <?php if($read) { ?>
    <?php while($row = $read->fetch_assoc()){ ?>
    <tr>
        <td><?php echo $sl++; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['skill']; ?></td>
        <td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a></td>
    </tr>

    <?php } ?>
    <?php } else {?>
    <p> There is no data </p>
    <?php } ?>
    </table>
<a href="create.php">Create</a>

<?php include_once 'footer.php'; ?>