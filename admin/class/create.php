<?php
include("../../include/common.php");

if (is_method_post()) {
	$name = $_POST["class_name"];
	$sql = "insert into classes values(default, ?)";

	db_execute($sql, [$name]);
	redirect_to("index.php");
}
$_tiltle = "tao moi lop";
include("../_header.php");
?>

<!-- Tạo form POST có 1 thẻ input chứa class name và 1 button submit -->
<h2>Thêm mới lớp</h2>
<form method="post">
	<label>Tên lớp: </label>
	<input type="text" name="class_name" required />
	<input type="submit" value="Thêm lớp" />
</form>
<?php include(("../_footer.php")) ?>