<?php 
include("../../include/common.php");

$id = $_GET["id"] ?? -1;

if (is_method_get()){
	// Lấy dữ liệu hiển thị ra màn hình cho thao tác update
	$sql = "select * from classes where id=?";
	$data = db_select($sql, [$id]);
	if (empty($data)){
		// quay về trang chủ nếu không có dữ liệu
		redirect_to("/");
	}
	$data = $data[0];
}else if (is_method_post()){
	// Cập nhật dữ liệu
	$name = $_POST["class_name"];
	$sql = "update classes set class_name=? where id=?";
	db_execute($sql, [$name, $id]);
	js_alert("Cập nhật thành công");
	js_redirect_to("/");	// chuyển hướng về trang chủ
}
$_title = "cap nhat lop";
include("../_header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cập nhật lớp</title>
</head>
<body>

	<h2>Cập nhật lớp</h2>
	<form method="post">
		<label>Tên lớp: </label>
		<input type="text" name="class_name" required value="<?php echo $data["class_name"]; ?>" />
		<input type="submit" value="Cập nhật lớp" />
	</form>
<?php include("../_footer.php") ?>;

</body>
</html>