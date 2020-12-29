<?php
//连接数据库
include 'conn_rh2019.php';

//编写查询sql语句
$sql = 'SELECT * FROM `干部任免信息`ORDER BY`干部任免信息`.`ID` ASC';
//执行查询操作、处理结果集
$result = mysqli_query($link, $sql);
if (!$result) {
	exit('查询sql语句执行失败。错误信息：' . mysqli_error($link));  // 获取错误信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//编写查询数量sql语句
$sql = 'SELECT COUNT(*) FROM `干部任免信息`';
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
	<title>干部任免信息</title>
	<link rel="icon" href="logo.ico" type="image/x-icon">
	<link rel="shortcut icon" href="logo.ico" type="image/x-icon">

</head>
<style type="text/css">
	body {
		/*引入背景图片*/
		background-color: #D0D0D0;
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
			<a href="addStudent.html">添加人员</a>&nbsp;&nbsp;&nbsp;
			<a href="searchStudent.html">查找人员</a>&nbsp;&nbsp;&nbsp;
			数据库中共有&nbsp&nbsp<?php echo $num; ?>&nbsp&nbsp个人员记录&nbsp;&nbsp;&nbsp
		</div>
		<table>
			<tr>
			    <th style="width:4%">类别</th>
				<th style="width:5%">姓名</th>
				<th style="width:4%">性别</th>
				<th style="width:10%">身份证号码</th>
				<th style="width:8%">政治面貌</th>
				<th style="width:8%">现任职务</th>
				<th style="width:6%">任现职时间</th>
				<th style="width:15%">任职依据文件</th>
				<th style="width:8%">任职部门或大队</th>
				<th style="width:8%">联系电话</th>				
				<th style="width:5%">履职标记</th>
				<th style="width:auto">备注</th>
				<th style="width:4%">操作</th>
			</tr>

			<?php
			foreach ($data as $key => $value) {
				foreach ($value as $k => $v) {
					$arr[$k] = $v;
				}
				echo "<tr>";
				echo "<td>{$arr['类别']}</td>";
				echo "<td>{$arr['姓名']}</td>";
				echo "<td>{$arr['性别']}</td>";
				echo "<td>{$arr['身份证号码']}</td>";
				echo "<td>{$arr['政治面貌']}</td>";
				echo "<td>{$arr['现任职务']}</td>";
				echo "<td>{$arr['任现职时间']}</td>";
				echo "<td>{$arr['任职依据']}</td>";
				echo "<td>{$arr['任现职部门大队']}</td>";
				echo "<td>{$arr['联系电话']}</td>";
				echo "<td>{$arr['履职标记']}</td>";
				echo "<td>{$arr['备注']}</td>";
				echo "<td>
						<a href='javascript:del({$arr['ID']})'></a> 
						<a href='edit_dangyuan.php?id={$arr['ID']}'>修改</a>
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
			if (confirm("确定删除这条信息吗？")) {
				window.location = "action_del.php?id=" + id;
			}
		}
	</script>

</body>

</html>