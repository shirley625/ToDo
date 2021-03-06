var DoDetail = function(){
    var eggColor=function(){
        $('.modal-box-message').on('click','.red',function () {
            $('.modal-main').css("border-color", "#d84a38");
            $('.modal-box-title').css("background-color", "#d84a38")
        });
        $('.modal-box-message').on('click','.orange', function () {
            $('.modal-main').css("border-color", "#f2784b");
            $('.modal-box-title').css("background-color", "#f2784b")
        });
        $('.modal-box-message').on('click','.blue',function () {
            $('.modal-main').css("border-color", "#32A1CE");
            $('.modal-box-title').css("background-color", "#32A1CE")
        });
        $('.modal-box-message').on('click','.green',function () {
            $('.modal-main').css("border-color", "#35aa47");
            $('.modal-box-title').css("background-color", "#35aa47")
        })
    }
    var showTC = function(info){
        if (!info) return false;
        $(document).jquery_modal({
            modal_title : "操作提醒",
            modal_content : info,
            modal_btn : {
                confirm_check : {color:'#61BB61' , content:'确定'}
            }
        });
        $(".modal-box-btn").on('click','.modal-btn-confirm_check',function(){
            $(".modal-mask").hide();
            $(".modal-main").hide();
        });
    }
    var addEvent=function(){
        $('.modal-box-btn').on('click','.modal-btn-confirm',function(){
            var $message = $('.modal-box-message');
            var title = $.trim($message.find('#title').val());
            var category_id = $.trim($message.find('#category option:selected').val());
            var content = $.trim($message.find('#content').val());
            var level = $('.modal-box-title').css('background-color');
            var create_time = $message.find('#create-time').val();
            var do_time = $message.find('#do-time').val();
            var l_id;

            //console.log(title);
            //console.log(category_id);
            //console.log(content);
            //console.log(level);
            //console.log(create_time);
            //console.log(do_time);
            switch ( level ){
                case "rgb(216, 74, 56)":l_id=1;
                    break;
                case "rgb(242, 120, 75)":l_id=2;
                    break;
                case "rgb(50, 161, 206)":l_id=3;
                    break;
                case "rgb(53, 170, 71)":l_id=4;
                    break;
                default : l_id = 0;
            }
            if(title.length == 0 || title.length < 2 || title.length > 15){
                showTC("请输入2-15个字的标题"); return false;
            }else if(category_id == '' ){
                showTC("请选择任务的分类"); return false;
            }else if(content.length >= 50 ){
                showTC("请输入50个字以内的内容"); return false;
            }else if(do_time.length == 0 ){
                showTC("请选择孵化时间"); return false;
            }else if(create_time.length == 0){
                showTC("请选择下蛋时间"); return false;
            }else if(l_id == 0){
                showTC("请选择紧急程度"); return false;
            }
            $.post($.U('detail/ajax_add_event'),{
                title : title,
                category_id : category_id,
                content : content,
                level_id : l_id,
                create_time: create_time,
                do_time: do_time
            },function(r){
                //console.log(r);
                $(this).jquery_modal({
                    modal_title : "操作提醒",
                    modal_content : r.info,
                    modal_btn : {
                        confirm_finish : {color:'#61BB61' , content:'确定'}
                    }
                });
                $(".modal-box-btn").on('click','.modal-btn-confirm_finish',function(){
                    $(".modal-mask").fadeOut();
                    $(".modal-main").slideUp();
                    $.get($.U('list/ajax_todo_list'),function(r){
                        //console.log(r);
                        if(!r.status) return false;
                        listPackage(r.data);
                        do_egg_img();
                    });

                });
            })
        })
    }
    var do_egg_img = function(){
        var color = ['','red','orange','blue','green'];
        $(".list-main .list-pic").each(function(){
            var is_finished = $(this).attr('data-finish');
            var level_id = $(this).attr('data-level');
            if(is_finished == 0) {
                $(this).css({
                    "background":'url('+_PUBLIC_+'/assets/pages/img/list/'+color[level_id]+'.png) no-repeat',
                    "background-size" : 'contain',
                    "marginLeft" : '10px'
                });
            }else {
                $(this).css({
                    "background":'url('+_PUBLIC_+'/assets/pages/img/list/'+color[level_id]+'-egg.png) no-repeat',
                    "background-size" : 'contain',
                    "marginLeft" : '10px'
                });
            }
        });
    }
    var listPackage = function(data){
        if (!data) return false;
        var tpl = ""
            +'<div class="list-input">'
            +'<div class="list-pic" data-finish={:is_finished} data-id={:id} data-level={:level_id}>'
            +'</div>'
            +'<div class="list-inp">'
            +'<input type="text" class="list-title" id="list-title" value={:title}>'
            +'<button type="button" class="btn-input-close">×</button>'
            +'</div>'
            +'<div class="clear-fix"></div>'
            +'</div>';
        var html = "";
        //console.log(data);
        var do_time = '';
        $.each( data , function(k , v){
            do_time = v['do_time'] || '';
            html += tpl.replace(/\{:(\w+)}/g , function(k1 , v1){
                if(v1 === 'title'){
                    return v[v1].substr(0,7) +"-|-"+do_time || '';
                }
                return v[v1] || '';
            });
        });
        $(".list-main").html( html );
    }
    var updateEvent=function(){
        $('.modal-box-btn').on('click','.modal-btn-update',function(){
            var id =$('.modal-box-title > .caption').attr('data-id');
            var $message = $('.modal-box-message');
            var title = $message.find('#title').val();
            var category_id = $message.find('#category option:selected').val();
            var content = $message.find('#content').val();
            var level = $('.modal-box-title').css('background-color');
            var create_time = $message.find('#create-time').val();
            var do_time = $message.find('#do-time').val();
            var l_id;
            switch (level){
                case "rgb(216, 74, 56)":l_id=1;
                    break;
                case "rgb(242, 120, 75)":l_id=2;
                    break;
                case "rgb(50, 161, 206)":l_id=3;
                    break;
                case "rgb(53, 170, 71)":l_id=4;
                    break;
            }
            if(title.length == 0 || title.length < 2 || title.length > 15){
                showTC("请输入2-15个字的标题"); return false;
            }else if(category_id == '' ){
                showTC("请选择任务的分类"); return false;
            }else if(content.length >= 50 ){
                showTC("请输入50个字以内的内容"); return false;
            }else if(do_time.length == 0 ){
                showTC("请选择孵化时间"); return false;
            }else if(create_time.length == 0){
                showTC("请选择下蛋时间"); return false;
            }else if(l_id == 0){
                showTC("请选择紧急程度"); return false;
            }
            $.post($.U('detail/ajax_update_event'),{
                id:id,
                title : title,
                category_id : category_id,
                content : content,
                level_id : l_id,
                create_time: create_time,
                do_time: do_time
            },function(e){
                $(this).jquery_modal({
                    modal_title : "操作提醒",
                    modal_content : e.info,
                    modal_btn : {
                        confirm_finish : {color:'#61BB61' , content:'确定'}
                    }
                });
                $(".modal-box-btn").on('click','.modal-btn-confirm_finish',function(){
                    $(".modal-mask").fadeOut();
                    $(".modal-main").slideUp();
                    $.get($.U('list/ajax_todo_list'),function(r){
                        //console.log(r);
                        if(!r.status) return false;
                        listPackage(r.data);
                        do_egg_img();
                    });
                });
            });

        })
    }
    var cancel = function (){
        $('.modal-box-btn').on('click','.modal-btn-cancel',function(){
            $(".modal-mask").fadeOut();
            $(".modal-main").slideUp();
        })
    }
    return{
        init: function () {
            eggColor();
            addEvent();
            updateEvent();
            cancel();
        }
    };

}();