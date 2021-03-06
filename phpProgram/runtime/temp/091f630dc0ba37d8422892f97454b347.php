<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"F:\phpStudy\PHPTutorial\WWW\signIn\public/../application/admin\view\coursetable\mycoursetable.html";i:1554811265;}*/ ?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="Bookmark" href="/favicon.ico">
	<link rel="Shortcut Icon" href="/favicon.ico" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="/signIn/public/static/admin/h-ui.admin/lib/html5shiv.js"></script>
	<script type="text/javascript" src="/signIn/public/static/admin/h-ui.admin/lib/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="/signIn/public/static/admin/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="/signIn/public/static/admin/h-ui.admin/css/H-ui.admin.css" />
	<link rel="stylesheet" type="text/css" href="/signIn/public/static/admin/h-ui.admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="/signIn/public/static/admin/h-ui.admin/skin/default/skin.css" id="skin" />
	<link rel="stylesheet" type="text/css" href="/signIn/public/static/admin/h-ui.admin/css/style.css" />
	<!--[if IE 6]>
	<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('*');</script>
	<![endif]-->
	<title>课程表列表</title>
</head>
<body>
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span> 课程表管理
	<span class="c-gray en">&gt;</span> 我的课程表
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"
	   title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<!--<div class="text-c"> 日期范围：-->
	<!--<input type="text" class="input-text" style="width:250px" placeholder="输入课程表名称" id="" name="">-->
	<!--<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>-->
	<!--</div>-->

	<div class="signInLeft">
		<ul id="week">
			<li class="active" data-week="Mon" data-weekNum="1">周一</li>
			<li data-week="Tues" data-weekNum="2">周二</li>
			<li data-week="Wed" data-weekNum="3">周三</li>
			<li data-week="Thur" data-weekNum="4">周四</li>
			<li data-week="Fri" data-weekNum="5">周五</li>
		</ul>
		<div class="timetable">
			<div class="classList"></div>
			<div id='qr'></div>
			<h2 class="title"></h2>
			<p class="overTime"></p>
		</div>

		<div class="signInRight">
			<table border="1" cellspacing="0" cellpadding="0">
				<tr>
					<th width="10%">编号</th>
					<th width="20%">学号</th>
					<th width="15%">姓名</th>
					<th width="10%">状态</th>
					<th>操作</th>
				</tr>
				<tbody class="signList">
				<tr>
					<td colspan="5" style="padding:20px 0;color:red;">暂无数据</td>
				</tr>
				</tbody>


			</table>

		</div>
	</div>

</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/signIn/public/static/admin/h-ui.admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type='text/javascript' src='http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js'></script>
<script type="text/javascript" src="/signIn/public/static/admin/h-ui.admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/signIn/public/static/admin/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/signIn/public/static/admin/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->

<script type="text/javascript" src="/signIn/public/static/admin/h-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/signIn/public/static/admin/h-ui.admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/signIn/public/static/admin/h-ui.admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="http://cdn.staticfile.org/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
<script type="text/javascript">
    var global_qrData = '';
    var stopTime = null; //全局定时器
    var stopGetStudentData = null; //全局获取学生定时器
    var NowWeek = new Date().getDay(); //当前星期几



    //自动定位日期获取数据
    $(function() {
        $('.signInLeft,.signInRight').css({
            height: $(window).height() - 100 + 'px'
        });
        switch (NowWeek) {
            case 1:
                $('#week li').eq(0).addClass('active').siblings('li').removeClass('active');
                timetable('Mon');
                break;
            case 2:
                $('#week li').eq(1).addClass('active').siblings('li').removeClass('active');
                timetable('Tues');

                break;
            case 3:
                $('#week li').eq(2).addClass('active').siblings('li').removeClass('active');
                timetable('Wed');
                break;
            case 4:
                $('#week li').eq(3).addClass('active').siblings('li').removeClass('active');
                timetable('Thur');
                break;
            case 5:
                $('#week li').eq(4).addClass('active').siblings('li').removeClass('active');
                timetable('Fri');
                break;
            default:
                $('#week li').eq(0).addClass('active').siblings('li').removeClass('active');
                timetable('Mon');
                break;
        }
        $('#week li').click(function() {

            var weekName = $(this).attr('data-week');
            $(this).addClass('active').siblings('li').removeClass('active');
            $("#qr").html('').hide().next('h2').html('');
            $('.signList').html("<tr><td colspan='5' style='padding:20px 0;color:red;'>暂无数据</td></tr>");
            $(".overTime").html('');
            timetable(weekName);
            clearInterval(stopGetStudentData);
            clearInterval(stopTime);
        });
    });

    // 获取星期对应的课程数据

    function timetable(week) {
        $("#qr").html('').hide().next('h2').html('');
        $.ajax({
            url: 'http://localhost/signin/public/admin/coursetable/ajaxGetCourse',
            type: 'post',
            data: {},
            success(res) {
                //console.log(res);
                var classList = '';
                res.data.forEach(item => {
                    if (item.week == week) {
                        classList += " <ul>"
                        classList += " <li>" + item.starttime + "节-" + item.endtime + "节</li>";
                        if (+item.subname.length > 15) {
                            classList += " <li title='" + item.subname + "'>" + item.subname.substring(0, 15) + "...</li>";
                        } else {
                            classList += " <li title='" + item.subname + "'>" + item.subname + "</li>";
                        }

                        classList += " <li>" + item.cname + "</li>";
                        classList += " <li>" + item.classroom + "</li>";
                        classList += " <li><a href='#' onclick='qr(" + JSON.stringify(item) + ")'>签到</a></li>";
                        classList += "</ul>";
                        return;
                    }

                });
                $('.timetable').find('div.classList').html(classList);

            }
        });
    }


    /*弹出二维码*/
    function qr(qrData) {
        global_qrData = qrData;
		//console.log(global_qrData);
        if ($('#week li.active').attr('data-weekNum') != NowWeek) {
            alert('日期错误-禁止签到');
            return;
        }
        clearInterval(stopGetStudentData);
        clearInterval(stopTime);
        overTime();
        var qrData = JSON.stringify(qrData);
        var str = "签到课程：《" + JSON.parse(qrData).subname + "》--班级：" + JSON.parse(qrData).cname;
        $("#qr").html('').show().next('h2').html(str);
        $("#qr").qrcode({
            render: "canvas", // 渲染方式有table方式和canvas方式
            width: 256, //默认宽度
            height: 256, //默认高度
            text: utf16to8(qrData), //二维码内容
            typeNumber: -1, //计算模式一般默认为-1
            correctLevel: 2, //二维码纠错级别
            background: "#ffffff", //背景颜色
            foreground: "#000000", //二维码颜色

        });
        getStudentData(JSON.parse(qrData)); //获取
        stopGetStudentData = window.setInterval(function() {
            getStudentData(JSON.parse(qrData));
        }, 2500);
    }

    /*
     获取实时签到数据并初始化数据
     */
    function getStudentData(signInData) {
        console.log('1');
        let studentList = [];
        let nowDate = new Date().getFullYear() + '-' + (new Date().getMonth() + 1) + '-' + new Date().getDate();
        $.ajax({
            url: 'http://localhost/signin/public/admin/students/ajaxGetAll',
            type: 'post',
            async: true,
            data: {
                cid: signInData.cid,
                starttime: signInData.starttime,
                creattime: nowDate
            },
            success: function(res) {

                if (res.code == 200) {
                    var noSignStu = [];

                    for (var i = 0; i < res.data.length; i++) {
                        var isExist = false;
                        for (var j = 0; j < res.siginlist.length; j++) {
                            if (res.siginlist[j].sname == res.data[i].name) {
                                isExist = true;
                                break;
                            }
                        }
                        if (!isExist) {
                            noSignStu.push(res.data[i]);
                        }
                    }

                    if(noSignStu.length==0){
                        clearInterval(stopGetStudentData);
                    }
                    let list = '';
                    let studentList = res.siginlist.concat(noSignStu);
                    studentList.sort(function(a,b){
                        a.id-b.id
                    })
                    studentList.map((item, index) => {
                        if (item.status == 0) {
                            list += `<tr><td>${index+1}</td><td>${item.code}</td><td>${item.name}</td>`;
                            if (item.status == 0) {
                                list += `<td>未签到</td>`;
                            } else if (item.status == 1) {
                                list += `<td style="color:#fff;background:#1ead4a;">签到成功</td>`;
                            } else if (item.status == 2) {
                                list += `<td style="color:#fff;background:#cacf3f;">迟到</td>`;
                            } else if (item.status == 3) {
                                list += `<td style="color:#fff;background:#e43a3a;">旷课</td>`;
                            } else if (item.status == 4) {
                                list += `<td style="color:#fff;background:#4782dc;">请假</td>`;
                            }
                            list +=
                                `<td>
												<button onclick='setStatus(${JSON.stringify(signInData)},${item.code},1,"${item.name}",${item.status})'>签到</button>
												<button onclick='setStatus(${JSON.stringify(signInData)},${item.code},2,"${item.name}",${item.status})'>迟到</button>
												<button onclick='setStatus(${JSON.stringify(signInData)},${item.code},4,"${item.name}",${item.status})'>请假</button>
												<button onclick='setStatus(${JSON.stringify(signInData)},${item.code},3,"${item.name}",${item.status})'>旷课</button>
											</td>`
                            list += `</tr>`;
                        } else {
                            list +=
                                `<tr>
											<td>${index+1}</td>
											<td>${item.scode}</td>
											<td>${item.sname}</td>`
                            if (item.status == 0) {
                                list += `<td>未签到</td>`;
                            } else if (item.status == 1) {
                                list += `<td style="color:#fff;background:#1ead4a;">签到成功</td>`;
                            } else if (item.status == 2) {
                                list += `<td style="color:#fff;background:#cacf3f;">迟到</td>`;
                            } else if (item.status == 3) {
                                list += `<td style="color:#fff;background:#e43a3a;">旷课</td>`;
                            } else if (item.status == 4) {
                                list += `<td style="color:#fff;background:#4782dc;">请假</td>`;
                            }
                            list +=
                                `<td>
												<button onclick='setStatus(${JSON.stringify(signInData)},${item.scode},1,"${item.sname}",${item.status})'>签到</button>
												<button onclick='setStatus(${JSON.stringify(signInData)},${item.scode},2,"${item.sname}",${item.status})'>迟到</button>
												<button onclick='setStatus(${JSON.stringify(signInData)},${item.scode},4,"${item.sname}",${item.status})'>请假</button>
												<button onclick='setStatus(${JSON.stringify(signInData)},${item.scode},3,"${item.sname}",${item.status})'>旷课</button>
											</td>`
                            list += `</tr>`;
                        }




                    });
                    $('.signList').html(list);
                }
                if (res.code == 200 && res.data.length == 0) {
                    $('.signList').html("<tr><td colspan='5' style='padding:20px 0;color:red;'>暂无数据</td></tr>");
                }
            }
        });

    }

    /* 教师手动修改学生特殊状态 */
    function setStatus(signInData, stuCode, getstatus, sName,nowStatus) {

        //console.log(nowStatus);
        if (nowStatus == 0) {
            let nowDate = new Date().getFullYear() + '-' + (new Date().getMonth() + 1) + '-' + new Date().getDate();
            $.ajax({
                url: 'http://localhost/signin/public/admin/students/ajaxSaveStatistics',
                type: 'post',
                async: true,
                data: {
					tea_id:signInData.tea_id,
                    cid: signInData.cid,
                    classroom: signInData.classroom, //教室
                    week: signInData.week, //星期
                    starttime: signInData.starttime, //开始时间
                    endtime: signInData.endtime, //结束时间
                    cname: signInData.cname, //班级名称
                    subname: signInData.subname, //课程名称
                    scode: stuCode, //学号
                    sname: sName, //姓名
                    status: getstatus, //状态码（说明见备注）
                    creattime: nowDate //学生签到时间
                },
                success: function(res) {

                    if (res.code == 200) {
						 getStudentData(global_qrData);
                        alert('修改成功');
                    }else{
                        alert('修改失败');
                    }
                }
            });
        }else{
            let nowDate = new Date().getFullYear() + '-' + (new Date().getMonth() + 1) + '-' + new Date().getDate();
            $.ajax({
                url: 'http://localhost/signin/public/admin/students/ajaxSetStatus',
                type: 'post',
                async: true,
                data: {
                    starttime: signInData.starttime, //开始时间
                    scode: stuCode, //学号
                    status: getstatus, //状态码（说明见备注）
                    creattime: nowDate //学生签到时间
                },
                success: function(res) {
                    if (res.code == 200) {
						 getStudentData(global_qrData);
                        alert('修改成功');
                    }else{
                        alert('修改失败');
                    }
                    //console.log(res);
                }
            });
        }

    }


    /*
     倒计时
     */
    function overTime() {
        var minute = 4;
        var second = 60;
        stopTime = window.setInterval(function() {
            second--;
            if (second == 00 && minute == 00) {
                $("#qr").html('').hide().next('h2').html('');
                $(".overTime").html('');
                clearInterval(stopTime);
                return;
            }; //当分钟和秒钟都为00时，重新给值
            if (second == 00) {
                second = 60;
                minute--;
            }; //当秒钟为00时，秒数重新给值
            if (second < 10) second = "0" + second;
            $(".overTime").html("结束时间：" + minute + "分:" + second + "秒");
        }, 1000);
    }
    //二维码数据转换
    function utf16to8(str) {
        var out, i, len, c;
        out = "";
        len = str.length;
        for (i = 0; i < len; i++) {
            c = str.charCodeAt(i);
            if ((c >= 0x0001) && (c <= 0x007F)) {
                out += str.charAt(i);
            } else if (c > 0x07FF) {
                out += String.fromCharCode(0xE0 | ((c >> 12) & 0x0F));
                out += String.fromCharCode(0x80 | ((c >> 6) & 0x3F));
                out += String.fromCharCode(0x80 | ((c >> 0) & 0x3F));
            } else {
                out += String.fromCharCode(0xC0 | ((c >> 6) & 0x1F));
                out += String.fromCharCode(0x80 | ((c >> 0) & 0x3F));
            }
        }
        return out;
    }
</script>
</body>
</html>
