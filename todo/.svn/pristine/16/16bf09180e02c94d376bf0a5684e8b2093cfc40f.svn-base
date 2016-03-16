/*
 author zsy
 time 2015.11.06
 */
var DoStatistics = function(){
	var select = function(){
		$(".body-table .th2,.tr2").hide();
		$(".body-select1 select").change(function(){
			$select1 = $(".body-select1 select").val();
			if($select1 != "seven"){
				$(".body-table .th1,.tr1").hide();
				$(".body-table .th2,.tr2").show();
				$.post($.U('Statistics/ajax_year'),{year:$select1},function(data){
					var html = '';
					var html1 = '';
					$.each(data.info,function(k,v){
						html += '<tr class="tr2" >'
							+"<td> &nbsp;"+k+"</td>"
							+"<td> &nbsp;"+v.finish+"</td>"
							+"<td> &nbsp;&nbsp;"+v.egg+"</td>"
							+"<td> &nbsp;"+v.hatch+" %</td>"
							+"</tr>";
					});
					html1 += '<tr class="tr2 sum" >'
						+"<td> 合计&nbsp;</td>"
						+"<td> &nbsp;"+data.sum.finish+"&nbsp;</td>"
						+"<td> &nbsp;&nbsp;"+data.sum.egg+"&nbsp;</td>"
						+"<td> &nbsp;"+data.sum.hatch+" %</td>"
						+"</tr>";
					$(".body-table .tr2").hide();
					$(".body-table table .sum1").before(html);
					$(".body-table table .sum1").after(html1);
					/*传值给controller,接收ajaxReturn, div输出html*/
				});
			}else{
				$(".body-table .th2,.tr2").hide();
				$(".body-table .th1,.tr1").show();
			}

		});
	}
	return {
		init: function(){
			select();
		}
	};
}();