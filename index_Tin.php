<?php 
include("include/common.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Danh sách lớp</title>
	<link rel="stylesheet" href="<?php asset("css/style.css") ?> ">
	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		}
		.container{
			max-width: 1200px;
			margin: 30px auto;
		}
		table{
			width: 100%;
			border-collapse: collapse;
		}
		td, th{
			border: 1px solid gray;
			padding: 5px;
		}
		.btn{
			padding: 5px 10px;
			border: 1px solid grey;
			display: inline-block;
			border-radius: 5px;
			background-color: rgb(212, 212, 212);
			color: dimgray;
			text-decoration: none;
		}

		.btn.btn-a{
			background-color: rgb(83, 45, 237);
			color: rgb(248, 248, 248);
			border-color: blueviolet;
		}
		.btn.btn-b{
			background-color: rgb(45, 179, 237);
			color: rgb(248, 248, 248);
			border-color: rgb(43, 107, 226);
		}
		.btn.btn-c{
			background-color: rgb(237, 157, 45);
			color: rgb(248, 248, 248);
			border-color: rgb(226, 83, 43);
		}
		.mb-3{
			margin-bottom: 15px;
		}

	</style>
</head>
<body>
	<div class="container">
		<div class="mb-3">
			<a href="" class="btn btn-a">Thêm mới lớp</a>
		</div>

		<table>
			<col style="width: 10%;" />
			<col style="width: 70%;" />
			<col style="width: 20%;" />
			<thead>
				<tr>
					<th>ID</th>
					<th>Lớp</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>3</td>
					<td>DH19TIN02</td>
					<td>
						<a href="#" class="btn btn-a">Chi tiêt</a>
						<a href="#" class="btn btn-b">Sửa</a>
						<a href="#" class="btn btn-c">Xóa</a>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>DH18TIN06</td>
					<td>
						<a href="#" class="btn btn-a">Chi tiêt</a>
						<a href="#" class="btn btn-b">Sửa</a>
						<a href="#" class="btn btn-c">Xóa</a>
					</td>
				</tr>
				<tr>
					<td>1</td>
					<td>DH20OTO03</td>
					<td>
						<a href="#" class="btn btn-a">Chi tiêt</a>
						<a href="#" class="btn btn-b">Sửa</a>
						<a href="#" class="btn btn-c">Xóa</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>