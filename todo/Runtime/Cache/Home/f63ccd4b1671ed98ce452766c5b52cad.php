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
        
    <link href="/todo-11-18/Public/assets/pages/styles/backwards.css" rel="stylesheet" type="text/css"/>

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
        
    <div class="backwards">

        <div class="current-backward" data-id=<?php echo ($last['id']); ?>>
            <div class="current-text"><?php if(empty($last)): else: ?>距离<?php echo (mb_substr($last['name'],'0,7,UTF-8')); ?>..<?php endif; ?></div>
            <div class="backward-day"><?php if(($last['b_days'] == 0)): ?>今 <?php else: echo ($last['b_days']); endif; ?></div>
            <div class="current-text up"><?php if(empty($last)): ?>无倒数<?php else: ?>天<?php endif; ?></div>
        </div>

        <div id="ca-container" class="ca-container other-backwards ">
            <div class="ca-nav"><span class="ca-nav-prev"></span><span class="ca-nav-next"></span></div>
            <div class="ca-wrapper" style="overflow: hidden;">
               <?php if(is_array($b_info)): $i = 0; $__LIST__ = $b_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="ca-item">
                       <div class="calendar ca-item-main" data-id=<?php echo ($vo['id']); ?>>
                           <div class="s-day"><?php if(empty($vo)): ?><i style="font-size: medium">暂无倒数</i><?php else: echo ($vo['b_days']); ?> <span>天</span><?php endif; ?></div>
                           <div class="s-text"><p><?php echo (mb_substr($vo['name'],'0,7,UTF-8')); ?></p></div>
                       </div>
                   </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="add-btn">
            <a href="javascript:;"><img src="/todo-11-18/Public/assets/pages/img/backwards/chick-add.png" alt="" ondragstart="return false"/></a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">土豆鸡快-倒数日</h4>
                    </div>
                    <div id="tip"></div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <input type="hidden" name="id" id="edit_id"/>
                                <lable for="name">倒数事项</lable><input id="name" class="form-control" name="name" type="text" placeholder="不多于7个字最优"/>
                            </div>
                            <div class="form-group">
                                <lable for="remark">备注</lable>
                                <textarea class="form-control" name="remark" id="remark" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <lable for="deadline">到期时间</lable><input id="deadline" class="form-control" name="deadline" type="text" placeholder="点击选择" onfocus="WdatePicker({dateFmt:'yyyy-M-d H:mm:ss'})"/>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" id="btn-confirm">确定</button>
                    </div>
                </div>
            </div>
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
            _ACTION_ = '/todo-11-18/index.php/Home/List/backwards',
            _MODULE_ = '/todo-11-18/index.php/Home',
            _CONTROLLER_ = '/todo-11-18/index.php/Home/List';
    window._ROOT_='/todo-11-18';
    window._APP_='/todo-11-18/index.php';
    window._ACTION_='<?php echo U("");?>';
    window._SELF_='<?php echo urldecode("/todo-11-18/index.php/Home/List/backwards");?>';
</script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
    
    <script src="/todo-11-18/Public/assets/global/plugins/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="/todo-11-18/Public/assets/global/plugins/My97DatePicker/WdatePicker.js" type="text/javascript"></script>
    <script src="/todo-11-18/Public/assets/pages/scripts/backwards.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->





</body>
</html>