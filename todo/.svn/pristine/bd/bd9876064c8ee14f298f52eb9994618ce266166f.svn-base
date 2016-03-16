/**
 * Created by ZQX on 2015/9/23.
 */
(function ($) {
    $.fn.extend({
        jquery_modal : function(options){
            options=$.extend({
                modal_title : "",
                modal_content : "",
                modal_btn : {
                    confirm:{color:'#61BB61' , content:'确定'},
                    cancel:{color:'#818481' , content:'取消'}
                }
            },options);

            //console.log(options);

            //var modal_mask = '<div class="modal-mask"></div>';
            //var modal_main = '<div class="modal-main">'
            //                    +'<div class="modal_box">'
            //                        +'<button type="button" class="modal-close"><span>×</span></button>'
            //                        +'<div class="modal-box-title">标题</div>'
            //                        +'<div class="modal-box-message">内容</div>'
            //                        +'<div class="modal-box-btn">'
            //                            //+'<div class="modal-btn-confirm">确定</div>'
            //                            //+'<div class="modal-btn-cancel">取消</div>'
            //                            +'<div class="clear-fix"></div>'
            //                        +'</div>'
            //                    +'</div>'
            //                +'</div>';
            //var modal_css = ".modal-mask{background-color: #000;position: absolute;top: 0px;left: 0px;width: 100%;height: 100%;opacity: 0.5;filter: alpha(opacity=50);text-align: center;display: none;}"
            //        +".modal-main{position: absolute;z-index: 2;line-height: 16px; top:40px;width: 100%;display: none;}"
            //        +".modal-box{background: #FFF;border-radius: 5px; min-width:300px; margin-left: 30%; margin-right: 30%;-moz-box-shadow:0 5px 15px rgba(0,0,0,.5);-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow: 0 5px 15px rgba(0,0,0,.5); }"
            //        +".modal-close{opacity: .2; float: right; margin-top: 10px;margin-right: 16px;font-size: 21px;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;filter: alpha(opacity=20);-webkit-appearance: none;padding: 0;cursor: pointer;background: 0 0;border: 0;}"
            //        +".modal-close:focus, .modal-close:hover {color: #000;text-decoration: none;cursor: pointer;filter: alpha(opacity=50);opacity: .5;}"
            //        +".modal-box-title{padding: 20px;border-bottom: 1px solid #e5e5e5;  font-weight: 600; font-size: larger;}"
            //        +".modal-box-message{padding: 30px;border-bottom: 1px solid #e5e5e5;}"
            //        +".modal-box-btn{padding: 14px;}";
            //if($(".modal-mask").length == 0){
            //    //$("head").append("<style type='text/css'>" + modal_css + "</style>");
            //    $(".modal-start").append(modal_mask + modal_main);
            //}
            $(".modal-box-title").html(options.modal_title || '标题');
            $(".modal-box-message").html(options.modal_content || '内容');

            if(!$.isEmptyObject( options.modal_btn )){
                $('.modal-box-btn').html('<div class="clear-fix"></div>');
                $.each(options.modal_btn , function( k , v ){
                    //console.log(v);
                    var btn_tpl = "<div class='modal-btn-"+ k +"'>"+ v.content+"</div>";
                    var btn_css = ".modal-btn-"+ k +"{opacity: .8;padding: 10px 26px;float:right;margin-right:10px;cursor:pointer;}"
                                 +".modal-btn-"+ k +":hover{opacity: 1;}"
                                 +".modal-btn-"+ k +"{background-color: "+ v.color +";}";
                    if($("style").length == 0)
                        $("head").append("<style type='text/css'>" + btn_css + "</style>");
                    else
                        $("style").append(btn_css);
                    $('.modal-box-btn').prepend(btn_tpl);
                });
            }

            $(".modal-mask").show();
            $(".modal-main").show();

            $(".modal-main .modal-close").on('click',function(){
                $(".modal-mask").fadeOut();
                $(".modal-main").slideUp();
            });
            //
            //$(".modal-box-btn").on('click','.modal-btn-cancel',function(){
            //
            //    $(".modal-mask").fadeOut();
            //    $(".modal-main").slideUp();
            //});
            //
            //$(".modal-box-btn").on('click','.modal-btn-confirm',function(){
            //
            //    $(".modal-mask").fadeOut();
            //    $(".modal-main").slideUp();
            //});
        }
    });
})(jQuery);




