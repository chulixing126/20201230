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
        <div class="add">
            <form action="action_edit_zgxx.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <th>ID：</th>
                        <td><input type="text" name="ID" size="30" value="<?php echo $arr["ID"] ?>" readonly="readonly"></td>
                        <th>姓名：</th>
                        <td><input type="text" name="姓名" size="30" value="<?php echo $arr["姓名"] ?>"></td>
                        <th>人员类别：</th>
                        <td><input type="text" name="人员类别" size="30" value="<?php echo $arr["人员类别"] ?>" style="color:red"></td>
                    </tr>
                    <tr>
                        <th>曾用名：</th>
                        <td><input type="text" name="曾用名" size="30" value="<?php echo $arr["曾用名"] ?>"></td>
                        <th>性别：</th>
                        <td><input type="text" name="性别" size="30" value="<?php echo $arr["性别"] ?>" list="sexlist"></td>
                        <datalist id="sexlist">
                            <option>男</option>
                            <option>女</option>
                        </datalist>
                        <th>身份证号码：</th>
                        <td><input type="text" name="身份证号码" size="30" value="<?php echo $arr["身份证号码"] ?>"></td>
                    </tr>
                    <tr>
                        <th>婚否：</th>
                        <td><input type="text" name="婚否" size="30" value="<?php echo $arr["婚否"] ?>" list="hunfoulist"></td>
                        <datalist id="hunfoulist">
                            <option>已婚</option>
                            <option>未婚</option>
                        </datalist>
                        <th>民族：</th>
                        <td><input type="text" name="民族" size="30" value="<?php echo $arr["民族"] ?>"></td>
                        <th>籍贯：</th>
                        <td><input type="text" name="籍贯" size="30" value="<?php echo $arr["籍贯"] ?>"></td>
                    </tr>
                    <tr>
                        <th>户籍地址：</th>
                        <td><input type="text" name="户籍地址" size="30" value="<?php echo $arr["户籍地址"] ?>"></td>
                        <th>现住址：</th>
                        <td><input type="text" name="现住址" size="30" value="<?php echo $arr["现住址"] ?>"></td>

                    </tr>
                    <tr>
                        <th>联系方式1：</th>
                        <td><input type="text" name="联系方式1" size="30" value="<?php echo $arr["联系方式1"] ?>"></td>
                        <th>联系方式2：</th>
                        <td><input type="text" name="联系方式2" size="30" value="<?php echo $arr["联系方式2"] ?>"></td>
                        <th>联系电话3：</th>
                        <td><input type="text" name="联系方式3" size="30" value="<?php echo $arr["联系方式3"] ?>"></td>
                    </tr>
                    <tr>
                        <th>备注：</th>
                        <td><input type="text" name="备注" size="30" value="<?php echo $arr["备注"] ?>"></td>
                    </tr>

                    <tr>
                        <th>政治面貌：</th>
                        <td><input type="text" name="政治面貌" size="30" value="<?php echo $arr["政治面貌"] ?>" list="zzmmlist"></td>
                        <datalist id="zzmmlist">
                            <option>中共党员</option>
                            <option>群众</option>
                        </datalist>
                        <th>入党时间：</th>
                        <td><input type="date"" name=" 入党时间" size="30" value="<?php echo $arr["入党时间"] ?>"></td>
                        <th>党内职务：</th>
                        <td><input type="text" name="党内职务" size="30" value="<?php echo $arr["党内职务"] ?>"></td>
                    </tr>
                    <tr>
                        <th>参加工作时间：</th>
                        <td><input type="date" name="参加工作时间" size="30" value="<?php echo $arr["参加工作时间"] ?>"></td>
                        <th>进入本单位时间：</th>
                        <td><input type="date" name="进入本单位时间" size="30" value="<?php echo $arr["进入本单位时间"] ?>"></td>
                    </tr>


                    <tr>
                        <th>全日制学历：</th>
                        <td><input type="text" name="全日制学历" size="30" value="<?php echo $arr["全日制学历"] ?>"></td>
                        <th>全日制学历毕业院校：</th>
                        <td><input type="text" name="全日制学历毕业院校" size="30" value="<?php echo $arr["全日制学历毕业院校"] ?>"></td>
                        <th>全日制学历专业：</th>
                        <td><input type="text" name="全日制学历专业" size="30" value="<?php echo $arr["全日制学历专业"] ?>"></td>
                    </tr>
                    <tr>
                        <th>后续学历：</th>
                        <td><input type="text" name="后续学历" size="30" value="<?php echo $arr["后续学历"] ?>"></td>
                        <th>后续学历毕业院校：</th>
                        <td><input type="text" name="后续学历毕业院校" size="30" value="<?php echo $arr["后续学历毕业院校"] ?>"></td>
                        <th>后续学历专业：</th>
                        <td><input type="text" name="后续学历专业" size="30" value="<?php echo $arr["后续学历专业"] ?>"></td>
                    </tr>
                    <tr>
                        <th>学历备注：</th>
                        <td><input type="text" name="学历备注" size="30" value="<?php echo $arr["学历备注"] ?>"></td>
                    </tr>


                    <tr>
                        <th>岗位及职务：</th>
                        <td><input type="text" name="岗位及职务" size="30" value="<?php echo $arr["岗位及职务"] ?>"></td>
                        <th>任职时间：</th>
                        <td><input type="date" name="任职时间" size="30" value="<?php echo $arr["任职时间"] ?>"></td>
                        <th>技术职称：</th>
                        <td><input type="text" name="技术职称" size="30" value="<?php echo $arr["技术职称"] ?>"></td>
                    </tr>


                    <tr>
                        <th>档案号：</th>
                        <td><input type="text" name="档案号" size="30" value="<?php echo $arr["档案号"] ?>" style="color:red"></td>
                        <th>档案状态：</th>
                        <td><input type=" text" name="档案状态" size="30" value="<?php echo $arr["档案状态"] ?>" list="danganztlist" style="color:red"></td>
                        <datalist id="danganztlist">
                            <option>正常存档</option>
                            <option>个人已提取</option>
                            <option>辞职未提取</option>
                            <option>退休未提取</option>
                        </datalist>
                    </tr>
                    <tr>
                        <th>档案操作：</th>
                        <td><input type="text" name="档案操作" size="30" value="<?php echo $arr["档案操作"] ?>"></td>
                        <th>操作时间：</th>
                        <td><input type="date" name="操作时间" size="30" value="<?php echo $arr["操作时间"] ?>"></td>
                    </tr>
                    <tr>
                        <th>档案备注：</th>
                        <td><input type="text" name="档案备注" size="30" value="<?php echo $arr["档案备注"] ?>"></td>
                    </tr>

                    <tr>
                        <th>用工起始日期：</th>
                        <td><input type="date" name="用工起始日期" size="30" value="<?php echo $arr["用工起始日期"] ?>"></td>
                        <th>用工起始依据：</th>
                        <td><input type="text" name="用工起始依据" size="30" value="<?php echo $arr["用工起始依据"] ?>"></td>
                    </tr>
                    <tr>
                        <th>合同开始日期：</th>
                        <td><input type="date" name="合同开始日期" size="30" value="<?php echo $arr["合同开始日期"] ?>"></td>
                        <th>合同到期日期：</th>
                        <td><input type="date" name="合同到期日期" size="30" value="<?php echo $arr["合同到期日期"] ?>"></td>
                    </tr>
                    <tr>
                        <th>合同状态：</th>
                        <td><input type="text" name="合同状态" size="30" value="<?php echo $arr["合同状态"] ?>" style="color:red"></td>
                        <th>合同解除日期：</th>
                        <td><input type="date" name="合同解除日期" size="30" value="<?php echo $arr["合同解除日期"] ?>"></td>
                    </tr>
                    <tr>
                        <th>合同备注：</th>
                        <td><input type="text" name="合同备注" size="30" value="<?php echo $arr["合同备注"] ?>"></td>
                    </tr>


                    <input type="button" onClick="javascript :history.back(-1);" value="返回">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="提交">
                    <p></p>
                    </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>