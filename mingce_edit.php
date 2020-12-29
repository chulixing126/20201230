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
            background-color: #D0D0D0;
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
            width: 1200px;
            border-width: 0px;
            padding: 8px;
            border-style: solid;
            border-color: black;
            background-color: white;
        }

        th {
            color: dodgerblue;
            height: 35px;
            text-align: right;
            font-size: 14px;
            background-color: #f0f0f0;
        }

        td {
            height: 35px;
            text-align: left;
            font-size: 14px;
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <!--输出定制表单-->
    <div class="box">
        <h1>职工信息维护</h1>
        <p style="color: dodgerblue">-------名册核对内容-------</p>
        <form action="mingce_edit_action.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>档案号：</th>
                    <td><input type="text" name="档案号" size="20" value="<?php echo $arr["档案号"] ?>" style="color:red"></td>
                    <th>姓名：</th>
                    <td><input type="text" name="姓名" size="20" value="<?php echo $arr["姓名"] ?>"></td>
                    <th>身份证号码：</th>
                    <td><input type="text" name="身份证号码" size="20" value="<?php echo $arr["身份证号码"] ?>"></td>
                    <th>人员类别：</th>
                    <td><input type="text" name="人员类别" size="20" value="<?php echo $arr["人员类别"] ?>" style="color:red" list="leibielist"></td>
                    <datalist id="leibielist">
                        <option>正式职工</option>
                        <option>事业编人员</option>
                        <option>试用期</option>
                        <option>聘用人员</option>
                        <option>临时</option>
                        <option>--</option>
                    </datalist>
                </tr>

                <tr>
                    <th>档案状态：</th>
                    <td><input type="text" name="档案状态" size="20" value="<?php echo $arr["档案状态"] ?>" style="color:red" list="zhuangtailist"></td>
                    <datalist id="zhuangtailist">
                        <option>存档-在职</option>
                        <option>存档-离职</option>
                        <option>已提档、转移</option>
                        <option>存档-退休</option>
                        <option>存档-国资委</option>
                        <option>--</option>
                    </datalist>
                    <th>提档时间：</th>
                    <td><input type="date" name="提档时间" size="20" value="<?php echo $arr["提档时间"] ?>"></td>
                    <th>提档备注：</th>
                    <td><input type="text" name="提档备注" size="20" value="<?php echo $arr["提档备注"] ?>"></td>
                </tr>

                <input type="button" onClick="javascript :history.back(-1);" value="返回">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="提交">
                <p></p>
                </td>
                </tr>
            </table>
        </form>
    </div>

    <p></p>

    <div class="box">
        <p style="color: dodgerblue">-------参照信息内容-------</p>
        <form action="mingce_edit_action.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>档案号：</th>
                    <td><input type="text" name="档案号" size="20" value="<?php echo $arr["档案号"] ?>" style="color:red"></td>
                    <th>姓名：</th>
                    <td><input type="text" name="姓名" size="20" value="<?php echo $arr["姓名"] ?>"></td>
                    <th>身份证号码：</th>
                    <td><input type="text" name="身份证号码" size="20" value="<?php echo $arr["身份证号码"] ?>"></td>
                    <th>人员类别：</th>
                    <td><input type="text" name="人员类别" size="20" value="<?php echo $arr["人员类别"] ?>" style="color:red" list="leibielist"></td>
                    <datalist id="leibielist">
                        <option>正式职工</option>
                        <option>事业编人员</option>
                        <option>试用期</option>
                        <option>聘用人员</option>
                        <option>临时</option>
                        <option>--</option>
                    </datalist>
                </tr>

                <tr>
                    <th>档案状态：</th>
                    <td><input type="text" name="档案状态" size="20" value="<?php echo $arr["档案状态"] ?>" style="color:red" list="zhuangtailist"></td>
                    <datalist id="zhuangtailist">
                        <option>存档-在职</option>
                        <option>存档-离职</option>
                        <option>已提档、转移</option>
                        <option>存档-退休</option>
                        <option>存档-退休</option>
                        <option>--</option>
                    </datalist>
                    <th>提档时间：</th>
                    <td><input type="date" name="提档时间" size="20" value="<?php echo $arr["提档时间"] ?>"></td>
                    <th>提档备注：</th>
                    <td><input type="text" name="提档备注" size="20" value="<?php echo $arr["提档备注"] ?>"></td>
                </tr>

                <p></p>
                </td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>