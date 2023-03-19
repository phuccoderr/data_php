<?php
include("include/common.php");


$data = db_select("SELECT st.*,cls.class_name from data_php.students st
left join classes cls on st.class_id = cls.id;");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp</title>
    <link rel="stylesheet" href="<?php asset("css/style.css") ?>">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid gray;
            padding: 5px;
        }

        .btn {
            padding: 5px 10px;
            border: 1px solid grey;
            display: inline-block;
            border-radius: 5px;
            background-color: rgb(212, 212, 212);
            color: dimgray;
            text-decoration: none;
        }

        .btn.btn-a {
            background-color: rgb(83, 45, 237);
            color: rgb(248, 248, 248);
            border-color: blueviolet;
        }

        .btn.btn-b {
            background-color: rgb(45, 179, 237);
            color: rgb(248, 248, 248);
            border-color: rgb(43, 107, 226);
        }

        .btn.btn-c {
            background-color: rgb(237, 157, 45);
            color: rgb(248, 248, 248);
            border-color: rgb(226, 83, 43);
        }

        .mb-3 {
            margin-bottom: 15px;
        }
        .footer {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="mb-3">
            <a href="../data_php/admin/class/create.php" class="btn btn-a">Thêm mới lớp</a>
        </div>

        <table>
          

            <thead>
                <tr>
                    <th>ID</th>
                    <th>fullname</th>
                    <th>dob</th>
                    <th>gender</th>
                    <th>address</th>
                    <th>class_id</th>
                    <th>img_path</th>
                    <th>lop</th>
                    <th>chuc nang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $item) {
                    $id = $item["id"];
                    $name = $item["fullname"];
                    $dob = $item["dob"];
                    $gender = $item["gender"];
                    $address = $item["address"];
                    $class_id = $item["class_id"];
                    $img_path = upload($item["img_path"],true);
                    $class_name = $item["class_name"];

                    echo <<<TINNQ
                        <tr>
                            <td>$id</td>
                            <td>$name</td>
                            <td>$dob</td>
                            <td>$gender</td>
                            <td>$address</td>
                            <td>$class_id</td>
                            <td>$img_path</td>
                            <td>$class_name</td>
                            <td>
                                <a href="#" class="btn btn-a">Chi tiết</a>
							    <a href="admin/student/edit.php?id=$id" class="btn btn-b">Sửa</a>
							    <a href="admin/student/delete.php?id=$id" class="btn btn-c">Xóa</a>
						    </td>
                        </tr>
TINNQ;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>