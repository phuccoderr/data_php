<?php
include("../../include/common.php");
$_title = "Thêm Học Sinh";
include("../_header.php");
//xu ly them
if(is_method_post()) {
    //upload va nhan lai filename
    $filename = upload_and_return_filename("img_path","student");
    

    //dung file name nhan duoc de luu vao db
    $fullname = $_POST["fullname"] ?? "";
    $dob = $_POST["dob"] ?? "";
    $gender = $_POST["gender"] ?? "";
    $address = $_POST["address"] ?? "";
    $class_id = $_POST["class_id"] ?? "";
    $img_path = upload_and_return_filename("img_path","students/img");
    

    $sql = "insert into students(fullname,dob,gender,address,class_id,img_path) values(?,?,?,?,?,?)";
    $param = array($fullname,$dob,$gender,$address,$class_id,$img_path);
    db_execute($sql,$param);
    
    js_alert("them thanh cong");
    js_redirect_to("/");
}
$title = "them hoc sinh";
include("../_header.php")
?>

<form method="post" enctype="multipart/form-data">
    <label>Họ tên: </label>
    <input type="text" name="fullname" />
    <br>
    <label>ngày sinh: </label>
    <input type="date" name="dob" />
    <br>
    <label>giới tính: </label>
    <label >
        <input type="radio" name="gender" value = "0">
        Nam
    </label>
    <label >
        <input type="radio" name="gender" value = "1">
        Nữ
    </label>
    <br>
    <label>địa chỉ: </label>
    <input type="text" name="address" />
    <br>
    <label>chọn lớp: </label>
    <select name="class_id" required>
        <option value="">---chọn một lớp---</option>
        <?php
            gen_option_ele("classes","id","class_name");
        ?>

    </select>
    <br>
    <label>chọn ảnh đại diện: </label>
    <input type="file" name="img_path[]" multiple accept=".png, .jpg, .jpeg" />
    <br>

    <input type="submit" value="thêm học sinh" />
</form>
<?php include("../_footer.php") ?>