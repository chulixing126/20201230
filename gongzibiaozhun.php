<?php
//连接数据库
include 'conn_wenjian.php';

//编写查询sql语句
$sql = 'SELECT * FROM `工资标准报告`ORDER BY`工资标准报告`.`批示日期` DESC';
//执行查询操作、处理结果集
$result = mysqli_query($link, $sql);
if (!$result) {
	exit('查询sql语句执行失败。错误信息：' . mysqli_error($link));  // 获取错误信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//编写查询数量sql语句
$sql = 'SELECT COUNT(*) FROM `工资标准报告`';
//执行查询操作、处理结果集
$n = mysqli_query($link, $sql);
if (!$n) {
	exit('查询数量sql语句执行失败。错误信息：' . mysqli_error($link));  // 获取错误信息
}
$num = mysqli_fetch_assoc($n);
//将一维数组的值转换为一个字符串
$num = implode($num);
?>

<html>

<head>
	<meta charset="UTF-8">
	<title>工资标准报告</title>
	<link rel="icon" href="logo.ico" type="image/x-icon">
	<link rel="shortcut icon" href="logo.ico" type="image/x-icon">

</head>
<style type="text/css">
	body {
		/*引入背景图片*/
		background-image: url(beijing03.jpg);
		/*background-size: 100%;*/
		/*北景图片固定*/
		/*background-attachment: fixed;*/
		/*北景图片平铺*/
		background-repeat: repeat;
		/*居中*/
		background-position: center 0px;
	}

	.wrapper {
		display: table;
		margin: 20px;
		float: left;
	}

	h1 {
		font-family: simhei;
		text-align: left;
		color: dodgerblue;
		/*text-shadow: 5px 5px 5px #000;*/
	}

	.add {
		margin-bottom: 20px;
	}

	.add a {
		text-decoration: none;
		color: #fff;
		background-color: dodgerblue;
		padding: 6px;
		border-radius: 5px;
	}

	table {
		width: 1500px;
		border-width: 0px;
		padding: 8px;
		border-style: solid;
		border-color: black;
		background-color: white;
		font-family: SimSun;
	}

	th {
		color: #f0f0f0;
		height: 35px;
		text-align: center;
		font-size: 14px;
		background-color: dodgerblue;
	}

	td {
		height: 35px;
		text-align: center;
		font-size: 14px;
		background-color: #f0f0f0;
	}
</style>

<body>
	<div class="wrapper">

		<div class="add">
			&nbsp;&nbsp;&nbsp;
			<a href="addStudent.html">添加报告</a>&nbsp;&nbsp;&nbsp;
			<a href="searchStudent.html">查找报告</a>&nbsp;&nbsp;&nbsp;
			数据库中共有&nbsp&nbsp<?php echo $num; ?>&nbsp&nbsp个工资标准报告&nbsp;&nbsp;&nbsp
		</div>
		<table>
			<tr>
				<th style="width:4%">编号</th>
				<th style="width:8%">提交部门</th>
				<th style="width:8%">批示日期</th>
				<th style="width:60%">内容简要</th>
				<th style="width:auto">备注</th>
				<th style="width:3%">操作</th>
			</tr>

			<?php
			foreach ($data as $key => $value) {
				foreach ($value as $k => $v) {
					$arr[$k] = $v;
				}
				echo "<tr>";
				echo "<td>{$arr['编号']}</td>";
				echo "<td>{$arr['提交部门']}</td>";
				echo "<td>{$arr['批示日期']}</td>";
				echo "<td>{$arr['内容简要']}</td>";
				echo "<td>{$arr['备注']}</td>";
				echo "<td>
						<a href='javascript:del({$arr['ID']})'></a> 
						<a href='edit_gongzibiaozhun.php?id={$arr['ID']}'>修改</a>
					  </td>";
				echo "</tr>";
				// echo "<pre>";
				// print_r($arr);
				// echo "</pre>";
			}
			// 关闭连接
			mysqli_close($link);
			?>
		</table>
	</div>

	<script type="text/javascript">
		function del(id) {
			if (confirm("确定删除这个职工吗？")) {
				window.location = "action_del.php?id=" + id;
			}
		}
	</script>

</body>

</html>