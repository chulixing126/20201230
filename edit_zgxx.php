<?php
//连接数据库
include 'conn_rh2019.php';

//获取id
$id = $_GET['id'];
//编写查询sql语句
$sql = "SELECT * FROM `职工基本信息` WHERE `id`=$id";
//执行查询操作、处理结果集
$result = mysqli_query($link, $sql);
if (!$result) {
    exit('查询sql语句执行失败。错误信息：' . mysqli_error($link));  // 获取错误信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//将二维数数组转化为一维数组
foreach ($data as $key => $value) {
    foreach ($value as $k => $v) {
        $arr[$k] = $v;
    }
}

// echo "<pre>";
// var_dump($arr);
// echo "</pre>";

?>

<html>

<head>
    <meta charset="UTF-8">
    <title>职工信息管理系统</title>
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

        .box {
            display: table;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            font-family: simhei;
            color: dodgerblue;
        }

        .add {
            margin-bottom: 20px;
            border-radius: 5px 0;
            ；
        }

        table {
            width: auto;
            border-width: 0px;
            padding: 8px;
            border-style: solid;
            border-color: black;
            background-color: white;
        }

        th {
            color: dodgerblue;
            height: 35px;
            width: 40px;
            text-align: center;
            font-size: 14px;
            background-color: white;
        }

        td {
            height: 35px;
            width: 40px;
            text-align: left;
            font-size: 14px;
            background-color: white;
        }
    </style>
</head>

<body>
    <h1>职工信息维护</h1>
    <!--输出定制表单-->
    <div class="box">

        <div class="add">
            <form action="action_edit_zgxx.php" method="post" enctype="multipart/form-data">
                <input type="button" onClick="javascript :history.back(-1);" value="返回">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="提交">
                <p></p>
                <table>
                    <tr>
                        <th>人员类别：</th>
                        <td><input type="text" name="人员类别" size="20" value="<?php echo $arr["人员类别"] ?>" list="rylblist" style="color:red"></td>
                        <datalist id="rylblist">
                            <option>正式职工</option>
                            <option>事业编人员</option>
                            <option>试用期</option>
                            <option>聘用人员</option>
                            <option>临时</option>
                        </datalist>
                        <th>在职状态：</th>
                        <td><input type="text" name="在职状态" size="20" value="<?php echo $arr["在职状态"] ?>" list="zzztlist" style="color:red"></td>
                        <datalist id="zzztlist">
                            <option>在职</option>
                            <option>离职</option>
                            <option>退休</option>
                            <option>病亡</option>
                            <option>长期病号</option>
                            <option>长期工伤</option>
                        </datalist>
                        <th>档案编号：</th>
                        <td><input type="text" name="档案号" size="20" value="<?php echo $arr["档案号"] ?>" style="color:red"></td>
                        <th>档案状态：</th>
                        <td><input type="text" name="档案状态" size="20" value="<?php echo $arr["档案状态"] ?>" list="daztlist" style="color:red"></td>
                        <datalist id="daztlist">
                            <option>存档</option>
                            <option>存档-国资委</option>
                            <option>存档-离职</option>
                            <option>存档-退休</option>
                            <option>已提档、转移</option>
                            <option>存档-病号</option>
                            <option>存档-工伤</option>
                        </datalist>
                        <th>提档备注：</th>
                        <td><input type="text" name="提档备注" size="20" value="<?php echo $arr["提档备注"] ?>" style="color:red"></td>
                    </tr>
                </table>
                <hr>
                <table>
                    <tr>
                        <th>姓名：</th>
                        <td><input type="text" name="姓名" value="<?php echo $arr["姓名"] ?>"></td>
                        <th>曾用名：</th>
                        <td><input type="text" name="曾用名" size="20" value="<?php echo $arr["曾用名"] ?>"></td>
                        <th>身份证号码：</th>
                        <td><input type="text" name="身份证号码" size="20" value="<?php echo $arr["身份证号码"] ?>"></td>
                        <th>联系方式1：</th>
                        <td><input type="text" name="联系方式1" size="20" value="<?php echo $arr["联系方式1"] ?>"></td>
                    </tr>
                    <tr>
                        <th>出生年：</th>
                        <td><input type="text" name="出生年" size="20" value="<?php echo $arr["出生年"] ?>"></td>
                        <th>出生月：</th>
                        <td><input type="text" name="出生月" size="20" value="<?php echo $arr["出生月"] ?>"></td>
                        <th>出生日：</th>
                        <td><input type="text" name="出生日" size="20" value="<?php echo $arr["出生日"] ?>"></td>
                        <th>性别：</th>
                        <td><input type="text" name="性别" size="20" value="<?php echo $arr["性别"] ?>" list="sexlist"></td>
                        <datalist id="sexlist">
                            <option>男</option>
                            <option>女</option>
                        </datalist>
                    </tr>
                    <tr>
                        <th>婚否：</th>
                        <td><input type="text" name="婚否" size="20" value="<?php echo $arr["婚否"] ?>" list="hunfoulist"></td>
                        <datalist id="hunfoulist">
                            <option>已婚</option>
                            <option>未婚</option>
                        </datalist>
                        <th>民族：</th>
                        <td><input type="text" name="民族" size="20" value="<?php echo $arr["民族"] ?>"></td>
                        <th>籍贯：</th>
                        <td><input type="text" name="籍贯" size="20" value="<?php echo $arr["籍贯"] ?>"></td>
                    </tr>
                    <tr>
                        <th>户籍地址：</th>
                        <td><input type="text" name="户籍地址" size="20" value="<?php echo $arr["户籍地址"] ?>"></td>
                        <th>现住址：</th>
                        <td><input type="text" name="现住址" size="20" value="<?php echo $arr["现住址"] ?>"></td>
                    </tr>
                    <tr>
                        <th>备注：</th>
                        <td><input type="text" name="备注" size="20" value="<?php echo $arr["备注"] ?>"></td>
                    </tr>
                    <tr>
                        <th>政治面貌：</th>
                        <td><input type="text" name="政治面貌" size="20" value="<?php echo $arr["政治面貌"] ?>" list="zzmmlist"></td>
                        <datalist id="zzmmlist">
                            <option>中共党员</option>
                            <option>群众</option>
                        </datalist>

                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</body>

</html>