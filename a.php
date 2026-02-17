<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>

<h1>66010914015 ภาคภูมิ วรรณชัย (แมนนนน)<h1>

<form method="post" action="">
    ชื่อภาค<input type="text" name="rname" autofocus require>
    <button type="submit" name="Submit">บันทึก</button>

</form><br><br>

<?php
if(isset($_POST['Submit'])){
    include_once("conectdb.php");
    $rname = $_POST['rname'];
    $sql2 = "INSERT INTO `regions` (`r_id`, `r_name`) VALUES (NULL, '{$rname}')";
    mysqli_query($conn,$sql2) or die ("ไม่ได้");

}
?>

<table border="1">
    <tr>
        <th>รหัสภาค</th>
        <th>ชื่อภาค</th>
        <th>ลบ</th>

    </tr>
<?php
include_once("conectdb.php");
$sql = "SELECT * FROM `regions`";
$rs = mysqli_query($conn,$sql);
while ($data = mysqli_fetch_array($rs)){

?>
    <tr>
        <td><?php echo $data['r_id']; ?></td>
        <td><?php echo $data['r_name']; ?></td>
        <td width="80" align="center"><a href="delete_region.php?id=<?php echo $data['r_id']; ?>"onClick="return confirm('ยืนยันการลบ?');"><img src="img/2.jpg" width="80"></a></td>

    </tr>
<?php } ?>
</table>
</body>
</html>
<?php
mysqli_close($conn);
?>