<?php
//连接数据库
include 'conn_rh2019.php';

//编写查询sql语句
$sql = 'SELECT
rh2019.`职工基本信息`.ID,
rh2019.`职工基本信息`.`档案号`,
rh2019.`职工基本信息`.`姓名`,
rh2019.`职工基本信息`.`身份证号码`,
rh2019.`职工基本信息`.`人员类别`,
rh2019.`职工基本信息`.`档案状态`,
rh2019.`职工基本信息`.`提档时间`,
rh2019.`职工基本信息`.`提档备注`,
rh2019.`职工基本信息`.`合同开始日期`,
rh2019.`职工基本信息`.`合同到期日期`,
rh2019.`职工辞职辞退`.`报告编号`,
rh2019.`职工辞职辞退`.`辞职辞退日期`,
rh2019.`职工辞职辞退`.`辞职辞退原因`,
rh2019.`职工辞职辞退`.`所属大队`,
baoxian.`医疗202003月`.`个人工资`
FROM
rh2019.`职工基本信息`
LEFT JOIN rh2019.`职工辞职辞退` ON rh2019.`职工辞职辞退`.`身份证号码` = rh2019.`职工基本信息`.`身份证号码`
LEFT JOIN baoxian.`医疗202003月` ON baoxian.`医疗202003月`.`个人编号` = rh2019.`职工基本信息`.`身份证号码`
ORDER BY
rh2019.`职工基本信息`.`档案号` ASC
';
//执行查询操作、处理结果集
$result = mysqli_query($link, $sql);
if (!$result) {
	exit('查询sql语句执行失败。错误信息：' . mysqli_error($link));  // 获取错误信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//编写查询数量sql语句
$sql = 'SELECT COUNT(*) FROM `职工基本信息`';
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
	<title>职工信息管理</title>
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
			<a href="addStudent.html">添加职工</a>&nbsp;&nbsp;&nbsp;
			<a href="searchStudent.html">查找职工</a>&nbsp;&nbsp;&nbsp;
			数据库中共有&nbsp&nbsp<?php echo $num; ?>&nbsp&nbsp个职工信息&nbsp;&nbsp;&nbsp
		</div>
		<table>
			<tr>
				<th style="width:4%">档案号</th>
				<th style="width:4%">姓名</th>
				<th style="width:6%">人员类别</th>
				<th style="width:8%">身份证号码</th>
				<th style="width:6%">人员类别</th>
				<th style="width:6%">档案状态</th>
				<th style="width:6%">提档时间</th>
				<th style="width:10%">提档备注</th>
				<th style="width:6%">合同开始日期</th>
				<th style="width:6%">合同到期日期</th>
				<th style="width:4%">报告编号</th>
				<th style="width:6%">辞职辞退日期</th>
				<th style="width:auto">辞职辞退原因</th>
				<th style="width:6%">所属大队</th>
				<th style="width:4%">个人工资</th>
				<th style="width:3%">操作</th>
			</tr>

			<?php
			foreach ($data as $key => $value) {
				foreach ($value as $k => $v) {
					$arr[$k] = $v;
				}
				echo "<tr>";
				echo "<td>{$arr['档案号']}</td>";
				echo "<td>{$arr['姓名']}</td>";
				echo "<td>{$arr['人员类别']}</td>";
				echo "<td>{$arr['身份证号码']}</td>";
				echo "<td>{$arr['人员类别']}</td>";
				echo "<td>{$arr['档案状态']}</td>";
				echo "<td>{$arr['提档时间']}</td>";
				echo "<td>{$arr['提档备注']}</td>";
				echo "<td>{$arr['合同开始日期']}</td>";
				echo "<td>{$arr['合同到期日期']}</td>";
				echo "<td>{$arr['报告编号']}</td>";
				echo "<td>{$arr['辞职辞退日期']}</td>";
				echo "<td>{$arr['辞职辞退原因']}</td>";
				echo "<td>{$arr['所属大队']}</td>";
				echo "<td>{$arr['个人工资']}</td>";
				echo "<td>
						<a href='javascript:del({$arr['ID']})'></a> 
						<a href='mingce_edit.php?id={$arr['ID']}'>修改</a>
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