<?php
//连接数据库
include 'conn_rh2019.php';

//编写查询sql语句
$sql = 'SELECT * FROM `职工分配调转`ORDER BY`职工分配调转`.`分配调转时间` DESC';
//执行查询操作、处理结果集
$result = mysqli_query($link, $sql);
if (!$result) {
    exit('查询sql语句执行失败。错误信息：' . mysqli_error($link));  // 获取错误信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//编写查询数量sql语句
$sql = 'SELECT COUNT(*) FROM `职工分配调转`';
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
    <title></title>
    <style type="text/css">
        .wrap {
            width: 550px;
            margin: 100px auto;
        }

        button {
            width: 90px;
            height: 30px;
        }

        table {
            width: 500px;
            border: 1px solid #ccc;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            height: 35px;
            text-align: center;
        }

        th {
            background-color: dodgerblue;
        }

        .bgc {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: gray;
            opacity: 0.5;
            display: none;
        }

        .newData {
            background-color: white;
            position: absolute;
            left: 50%;
            top: 50%;
            width: 408px;
            height: 326px;
            margin-left: -204px;
            margin-top: -150px;
            display: none;

        }

        .title {
            width: 408px;
            height: 40px;
            background-color: #ccc;
        }

        .title span {
            height: 40px;
            line-height: 40px;
        }

        #span2 {
            padding-right: 10px;
            float: right;
            cursor: pointer;
        }

        .bottom {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 408px;
            height: 40px;
            background-color: #ccc;
            text-align: center;
        }

        .bottom button {
            margin-top: 5px;
        }

        .center {
            height: 246px;
            width: 408px;
            text-align: center;
            padding-top: 60px;
        }

        .center input {
            width: 200px;
            height: 30px;
        }
    </style>

    <script src="jquery-3.3.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".button1").click(function() {
                $(".bgc").show();
                $(".newData").show();
            });


            $("#span2").click(function() {
                $(".newData").hide();
                $(".bgc").hide();

            });


            $("a").click(function() {
                $(this).parent("td").parent("tr").remove();
            });


            $("#button2").click(function() {

                if ($(".center #input1").val() === "") {
                    alert("输入值不能为空");
                    return;
                }
                var td1 = $(".center #input1").val();
                var td2 = $(".center #input2").val();
                var tr = $("<tr></tr>");
                tr.html("<td>" + td1 + "</td><td>" + td2 + "</td>" + "<td><a href='javascript:void(0)'>GET</a></td>");
                $("tbody").append(tr);
                tr.find("a").click(function() {
                    $(this).parent("td").parent("tr").remove();
                });


                $(".center #input1").val("");

                $(".newData").hide();
                $(".bgc").hide();
            });
        });
    </script>
</head>

<body>
    <div class="wrap">
        <button class="button1">addData</button>
        <table>
            <thead>
                <tr>
                    <th>调转编号</th>
                    <th>姓名</th>
                    <th>身份证号码</th>
                    <th>原部门或大队</th>
                    <th>原岗位</th>
                    <th>分配调转部门或大队</th>
                    <th>分配调转后岗位</th>
                    <th>分配调转时间</th>
                    <th>分配调转原因</th>
                    <th>备注</th>
                    <th>已学习</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="javascript:void(0)">GET</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="javascript:void(0)">GET</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="javascript:void(0)">GET</a></td>
                </tr>
            </tbody>
        </table>

    </div>


    <div class="bgc">
    </div>

    <div class="newData">
        <div class="title">
            <span id="span1">添加标题</span>
            <span id="span2">x</span>
        </div>

        <div class="center">
            课程名称:&nbsp;<input type="text" name="" id="input1" value="" placeholder="请输入课程名称" />
            <br /><br /><br />
            所属院校:&nbsp;<input type="text" name="" id="input2" value="未来学院" />
        </div>

        <div class="bottom">
            <button id="button2">提交</button>
        </div>
    </div>
</body>

</html>