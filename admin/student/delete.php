<?php
include("../../include/common.php");

$id = $_GET["id"] ?? -1;

$sql_sel = "select * from students where id=?";
$sql_del = "delete from students where id=?"; // Xóa lớp có id = XXX
$data = db_select($sql_sel,[$id]);
if (empty($data)) {
	js_alert("Không có gì để xóa");
	js_redirect_to("/Test.php");
	die;
} 
$data = $data[0];
remove_file($data["img_path"]);

db_execute($sql_del,[$id]);
js_alert("xoa thanh cong");
js_redirect_to("/Test.php");


?>