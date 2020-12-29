<?php
//连接数据库
include 'conn_rh2019.php';

// 获取修改后的职工信息
$name = $_POST['姓名'];
$leibei = $_POST['人员类别'];
$cengyongming = $_POST['曾用名'];
$xingbei = $_POST['性别'];
$idhaoma = $_POST['身份证号码'];
$hunfou = $_POST['婚否'];
$minzhu = $_POST['民族'];
$jiguan = $_POST['籍贯'];
$xianzhuzhi = $_POST['现住址'];
$lianxi1 = $_POST['联系方式1'];
$lianxi2 = $_POST['联系方式2'];
$lianxi3 = $_POST['联系方式3'];
$beizhu = $_POST['备注'];
$zhengzhimianmao = $_POST['政治面貌'];
$rudangshijian = $_POST['入党时间'];
$dangneizhiwu = $_POST['党内职务'];
$gongzuoshijian = $_POST['参加工作时间'];
$danweishijian = $_POST['进入本单位时间'];
$id = $_POST['ID'];

//编写预处理sql语句
$sql = "UPDATE '职工基本信息' 
			SET 
				'姓名'= ?, 
				'人员类别'= ?, 
				'曾用名'= ?, 
				'性别'= ?, 
				'身份证号码'= ?, 
				'婚否'= ?, 
				'籍贯'= ?, 
				'现住址'= ?, 
				'联系方式1'= ?,
				'联系方式2'= ?,
				'联系方式3'= ?,
				'备注'= ?,
				'政治面貌'= ?, 
				'入党时间'= ?,
				'党内职务'= ?,
				'参加工作时间'= ?,
				'进入本单位时间'= ?
			WHERE 'ID'= ?";

//预处理SQL模板
$stmt = mysqli_prepare($link, $sql);
//参数绑定，并为已经绑定的变量赋值
//参数绑定->给？号赋值 这里类型和顺序要一致,类型、赋值和？？的顺序要一致
//参数有以下四种类型:
//i - integer（整型）
//d - double（双精度浮点型）
//s - string（字符串）
//b - BLOB（binary large object:二进制大对象）
mysqli_stmt_bind_param($stmt, 'sssssssssssssssssi', $name, $leibei, $cengyongming, $xingbei, $idhaoma, $hunfou, $minzhu, $jiguan, $xianzhuzhi, $lianxi1, $lianxi2, $lianxi3, $zhengzhimianmao, $rudangshijian, $dangneizhiwu, $gongzuoshijian, $danweishijian, $id);

if ($name) {
	// 执行预处理（第1次执行）
	$result = mysqli_stmt_execute($stmt);
	//关闭连接
	mysqli_close($link);

	if ($result) {
		//修改信息成功
		//跳转到首页
		header("Location:zhigongxinxi.php");
	} else {
		exit('修改职工信息sql语句执行失败。错误信息：' . mysqli_error($link));
	}
} else {
	//修改职工失败
	//输出提示，跳转到首页
	echo "修改职工失败！<br><br>";
	header('Refresh: 3; url=index.php');  //3s后跳转
}
