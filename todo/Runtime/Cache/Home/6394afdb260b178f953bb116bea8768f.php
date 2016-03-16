<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="/todo-11-18/Public/assets/pages/img/index/avatar.jpg"/>
    <title>土豆鸡快</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="author" content="zsy"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link rel="stylesheet" href="/todo-11-18/Public/assets/global/plugins/bootstrap/css/bootstrap.min.css"/>
        <link href="/todo-11-18/Public/assets/global/styles/reset.css" rel="stylesheet" type="text/css"/>
        <link href="/todo-11-18/Public/assets/global/styles/style.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link href="/todo-11-18/Public/assets/global/plugins/icon/style.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGIN STYLES -->

    <!-- BEGIN PAGE STYLES -->
        
    <link href="/todo-11-18/Public/assets/pages/styles/todo-statistics.css" rel="stylesheet" type="text/css"/>

    <!-- END PAGE STYLES -->
</head>

<body>

<!-- BEGIN PAGE-HEADER -->
<section class="page-header">
    <a href="#cd-nav" class="cd-nav-trigger">Menu<span><!-- used to create the menu icon --></span>
    </a>
    <nav class="cd-nav-container" id="cd-nav">
        <header>
            <a href="<?php echo U('Index/index');?>"><span>首页</span></a>
            <?php if(empty($username)): else: ?><a href="<?php echo U('User/logout');?>"><span style="margin-left:30px;">登出</span></a><?php endif; ?>
            <a href="#0" class="cd-close-nav">Close</a>
        </header>

        <ul class="cd-nav">
            <li class="cd-selected" data-menu="task">
                <a href="javascript:;">
                    <i class="glyphicon glyphicon-paperclip i1 i-btn"></i>
                    <em>土土任务</em>
                </a>
            </li>

            <li data-menu="statistics">
                <a href="javascript:;">
                    <i class="glyphicon glyphicon-signal i2 i-btn"></i>
                    <em>豆豆统计</em>
                </a>
            </li>

            <li data-menu="calender">
                <a href="javascript:;">
                    <i class="glyphicon glyphicon-calendar i3 i-btn"></i>
                    <em>小鸡日历</em>
                </a>
            </li>

            <li data-menu="backward">
                <a href="javascript:;">
                    <i class="glyphicon glyphicon-hourglass i4 i-btn"></i>
                    <em>快快倒数</em>
                </a>
            </li>

            <li data-menu="notes" class="easy">
                <a href="javascript:;">
                    <i class="glyphicon glyphicon-list-alt i5 i-btn"></i>
                    <em>便签</em>
                </a>
            </li>

        </ul> <!-- .cd-3d-nav -->
    </nav>
</section>
<!-- END PAGE-HEADER -->

<!-- BEGIN PAGE-BODY -->
    <section class="page-body">
        
    <div class="body">
        <div class="body-accum">
            <div class="prop"><strong>累积：孵蛋数 / 下蛋数 | 孵化率</strong></div>
            <div class="cont">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($sum['finish']); ?>&nbsp;&nbsp;&nbsp;<?php echo ($sum['egg']); ?>&nbsp; &nbsp;&nbsp;<?php echo (round($sum['hatch']*100,2)); ?>%</div>
        </div>
        <div class="body-select1">
            <select>
                <option value="seven">近7天统计</option>
                <?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($key); ?> 年</option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
        <div class="body-table">
            <table>
                <tr id="tr1">
                    <th class="th1">日期&nbsp;</th>
                    <th class="th2">月份&nbsp;</th>
                    <th>孵蛋数&nbsp;</th>
                    <th>/ 下蛋数&nbsp;</th>
                    <th>| 孵化率</th>
                </tr>
                <?php if(is_array($week)): $i = 0; $__LIST__ = $week;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tr1">
                        <td>&nbsp;<?php echo ($key); ?>&nbsp;</td>
                        <td>&nbsp;<?php echo ($vo['finish']); ?>&nbsp;</td>
                        <td>&nbsp;&nbsp;<?php echo ($vo['egg']); ?>&nbsp;</td>
                        <td>&nbsp;<?php echo (round($vo['hatch']*100,2)); ?> %</td>

                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <tr class="sum tr1 sum1">
                    <td>合计&nbsp;</td>
                    <td>&nbsp;<?php echo ($weeksum['finish']); ?>&nbsp;</td>
                    <td>&nbsp;&nbsp;<?php echo ($weeksum['egg']); ?>&nbsp;</td>
                    <td>&nbsp;<?php echo (round($weeksum['hatch']*100,2)); ?>%</td>
                </tr>
            </table>
        </div>
    </div>

    </section>
<!-- END PAGE-BODY -->

<!-- BEGIN CORE PLUGINS -->
    <script src="/todo-11-18/Public/assets/global/plugins/jquery-2.1.1.js" type="text/javascript"></script>
    <script src="/todo-11-18/Public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/todo-11-18/Public/assets/global/plugins/modernizr.js" type="text/javascript"></script>
    <script src="/todo-11-18/Public/assets/global/plugins/main.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN CORE GLOBAL -->
    <script src="/todo-11-18/Public/assets/global/scripts/public.js" type="text/javascript"></script>
<!-- END CORE GLOBAL -->

<script type="text/javascript">
    /* GLOBAL URL */
    var _ROOT_ = '/todo-11-18',
            _PUBLIC_ = '/todo-11-18/Public',
            _INDEX_ = '/todo-11-18/index.php',
            _ACTION_ = '/todo-11-18/index.php/Home/Statistics/statistics',
            _MODULE_ = '/todo-11-18/index.php/Home',
            _CONTROLLER_ = '/todo-11-18/index.php/Home/Statistics';
    window._ROOT_='/todo-11-18';
    window._APP_='/todo-11-18/index.php';
    window._ACTION_='<?php echo U("");?>';
    window._SELF_='<?php echo urldecode("/todo-11-18/index.php/Home/Statistics/statistics");?>';
</script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
    
    <script src="/todo-11-18/Public/assets/pages/scripts/todo-statistics.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->


    <script type="text/javascript">
        $(document).ready(function(){
            DoStatistics.init();
        });
    </script>


</body>
</html>