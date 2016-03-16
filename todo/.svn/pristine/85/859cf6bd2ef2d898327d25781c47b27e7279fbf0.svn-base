var login = function(){
    var getLoginInfo = function(){
        $('.login-btn').on('click',function(e){
            var account = $('input[name="account"]').val();
            var key = $('input[name="password"]').val();
            $.post($.U('User/ajax_deal_login'), {account: account, key:key},function(r){
                console.log(r);
                $('.login').jquery_modal({
                    modal_title : '操作提醒',
                    modal_content : r.info,
                    modal_btn : {
                        confirm_finish : {color:'#61BB61' , content:'确定'}
                    }
                });

                $('.modal-box-btn').on('click','.modal-btn-confirm_finish',function(){
                    $('.modal-mask').fadeOut();
                    $('.modal-main').slideUp();
                });
                if(r.status){
                    // console.log(11);
                    location.href = '?m=Home&c=Index&a=index';
                }
            });
        });
    }

    return{
        init:function(){
            getLoginInfo();
        }
    };
}();