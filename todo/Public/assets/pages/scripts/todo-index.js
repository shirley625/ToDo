
$(function(){
	var listLen = $(".pic li").length, i=0,setInter,speen = 150,speen1 = 1000;
/*图片轮播*/
	$(".pic li:first").show(); //第一张图片一开始就是出现的
 	outPlay = function(){
		setInter = setInterval("out_fun()",speen); //setInterval间隔指定的毫秒数不停地执行指定的代码
				  //设置时间控制器					   //out_fun()方法进行轮播
	}
	outPlay(); //一定需要这一句话，这是方法的执行
	out_fun = function(){
		if(i < listLen){
			i++;
		}else{
			i=0;
		}
		$(".pic li").eq(i).animate({opacity:"show"},10).siblings()
						  .animate({opacity:"hide"},10);
				    //eq为遍历，对eq指定的那个元素（从0开始）进行操作
				    //siblings() 默认拿和它自己相同的兄弟元素，即为选出所有的$(".pic li")
		$(".title_div .titlel").animate({opacity:1},500)
							   .animate({opacity:0.1});
	$(".title_div .titler").animate({opacity:0.1},500)
						   .animate({opacity:1});
	}
})