<?php
include("../../include/common.php");

$id = $_GET["id"] ?? -1;

if (is_method_get()) {
	// Lấy dữ liệu hiển thị ra màn hình cho thao tác update
	$sql = "select * from students where id=?";
	$data = db_select($sql, [$id]);
	if (empty($data)) {
		// quay về trang chủ nếu không có dữ liệu
		redirect_to("/admin/student");
	}
	$data = $data[0];
} else if (is_method_post()) {
	// Cập nhật dữ liệu
	$name = $_POST["fullname"];
	$dob = $_POST["dob"];
	$gender = $_POST["gender"];
	$address = $_POST["address"];
	$class_id = $_POST["class_id"];
	$img_path = upload_and_return_filename("img_path", "students/img");
	$sql = "update students set fullname=?,dob=?,gender=?,address=?,class_id=? where id=?";
	db_execute($sql, [$name, $dob, $gender, $address, $class_id, $id]);
	js_alert("Cập nhật thành công");
	js_redirect_to("/Test.php"); // chuyển hướng về trang chủ
}
$_title = "cap nhat lop";
include("../_header.php");
?>


<h2>Sửa lớp</h2>
<form method="post" enctype="multipart/form-data">
	<?php if (!empty($data["img_path"])) { ?>
		<img src="<?php upload($data["img_path"]); ?>" alt="" width="100px">
		<br />
	<?php } ?>
	<label>Tên: </label>
	<input type="text" name="fullname" required value="<?php echo $data["fullname"]; ?>" />
	<br>
	<label>Ngay Sinh: </label>
	<input type="date" name="dob" required value="<?php echo $data["dob"]; ?>" />
	<br>
	<label>gioi tinh: </label>
	<label>
		<?php if ($data["gender"] = "0") { ?>
			<input type="radio" name="gender" value="0" checked />
		<?php } else { ?>
			<input type="radio" name="gender" value="1" checked />
		<?php } ?>
		Nam
	</label>
	<label>
		<?php if ($data["gender"] = "1") { ?>
			<input type="radio" name="gender" value="1" checked />
		<?php } else { ?>
			<input type="radio" name="gender" value="0" checked />
		<?php } ?>
		Nu

	</label>
	<br>
	<label>địa chỉ: </label>
	<input type="text" name="address" required value="<?php echo $data["address"]; ?>" />
	<br>
	<label>chọn lớp: </label>
	<select name="class_id" required>
		<option value="">---chọn một lớp---</option>
		<?php
		gen_option_ele("classes", "id", "class_name", $data["class_id"]);
		?>

	</select>
	<br>
	<label>chọn ảnh đại diện: </label>
	<input type="file" name="img_path" accept=".png, .jpg, .jpeg" />
	<br>
	<input type="submit" value="Cập nhật lớp" />
</form>
<?php include("../_footer.php") ?>