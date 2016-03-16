

var Note = function(){
	/*声明变量*/
	var paper_type = ["paper1","paper2","paper3","paper4"];
	var paper_color = ["yellow","red","blue","green"];
	var note_id = "";
	var paper_index = 0;
	var note_paper_style = "";
	var color_index = 0;
	var note_paper_color = "";
	var old_note_color = "";
	var op_type = "add";
	var click_obj = {};
	
	/*声明对象*/
	var main_page_note = $(".notes .main-page-note");
    var note = main_page_note.find(".note");
    //note-details
    var note_details = $("#note-details");
    var note_details_tool = note_details.find(".note-edit-tool");
    var note_details_close = note_details.find(".note-close");
    var note_details_delete = note_details.find(".note-delete");
    //note-edit
    var note_edit = $("#note-edit");
    var note_edit_content = note_edit.find(".note-edit-content");
    var note_edit_tool = note_edit.find(".note-edit-tool");
	
	/*方法*/
	var notesAdd = function(){
		color_index = 0;
		$(".notes-add").on("click",function(){
			op_type = "add";
			note_id = null;
			note_edit_content.removeClass(note_paper_style);
			note_paper_style = paper_type[paper_index];
			paper_index++;
			if(paper_index > paper_type.length - 1)
				paper_index = 0;
			note_paper_color = paper_color[color_index];
			note_edit_content.addClass(note_paper_style).addClass(note_paper_color);
			note_edit_content.find("textarea").val("");
			note_edit.fadeIn(300);
		});
		note_edit_tool.find(".note-close").on("click",function(){
			note_edit.fadeOut(300);
		});
		note_edit_tool.find(".note-clear").on("click",function(){
			note_edit_content.find("textarea").val("");
		});
		note_edit_tool.find(".note-paper-style").on("click",function(){
			color_index++;
			if(color_index > paper_color.length -1)
				color_index = 0;
			note_edit_content.removeClass(note_paper_color).addClass(paper_color[color_index]);
			note_paper_color = paper_color[color_index];
		});
		note_edit_tool.find(".note-add").on("click",function(){
			var note_content = note_edit_content.find("textarea").val();
			var now_time = new Date();
			var now_time_string = now_time.getFullYear()+"-"+(parseInt(now_time.getMonth())+1)+"-"+now_time.getDate();
			var click_obj_clone = {};
			$.post($.U('List/ajax_deal_note'),{id : note_id, content : note_content , paper_type : paper_index , color : note_paper_color},function(r){
                if(r.status){
                	note_edit.fadeOut(300);
                	if(op_type == "add"){
        				var note_str = "";
        				note_str += "<div class='note "+note_paper_style+" "+note_paper_color+" ' note-id='"+r.note_id+"' note-paper='"+paper_index+"' note-color='"+note_paper_color+"'>";
        				note_str += 	"<span class='note-content'>"+note_content+"</span>";
        				note_str += 	"<span class='note-time'>"+now_time_string+"</span>";
        				note_str +=  "</div>";
        				main_page_note.find(".group-note").prepend(note_str);
        			}else if(op_type == "update"){
        				click_obj.removeClass(old_note_color).addClass(paper_color[color_index]);
        				click_obj.find(".note-content").html(note_content);
        				click_obj.find(".note-time").html(now_time_string);
        				click_obj_clone = click_obj.clone();
        				click_obj.remove();
        				main_page_note.find(".group-note").prepend(click_obj_clone);
        			}
                	setTimeout(function(){
    					note = main_page_note.find(".note");
    					handleNoteClick();
    				},200);
                }
			});
		});
	}
	
	var handleNoteClick = function(){
		var mousedown_time = 0;
		var mouseup_time = 0;
		var tap_time = 0;
		note.each(function(k,v){
			/*单击显示详情*/
			$(this).bind("touchstart",function(){
				mousedown_time = new Date().getTime();
			}).bind("touchend",function(){
				click_obj = $(this);
				mouseup_time = new Date().getTime();
				tap_time = mouseup_time - mousedown_time;
				if(tap_time%10000 > 500){
					noteEdit();
				}
				else
					noteDetails();
				 mousedown_time = 0;
				 mouseup_time = 0;
			});
			function noteDetails(){
				note_id = click_obj.attr("note-id");
				note_details.find(".note-time").html(click_obj.find(".note-time").html());
				note_details.find(".content").html(click_obj.find(".note-content").html());
				note_details.css({
					marginTop : - note_details.height()/2 +20
				});
				note_details.fadeIn();
			}
			function noteEdit(){
				op_type = "update";
				note_id = click_obj.attr("note-id");
				old_note_color = click_obj.attr("note-color");
				note_edit_content.removeClass(note_paper_color).removeClass(note_paper_style);
				paper_index = click_obj.attr("note-paper");
				color_index = $.inArray(click_obj.attr("note-color"),paper_color);
				note_paper_style = "paper"+click_obj.attr("note-paper");
				note_paper_color = click_obj.attr("note-color");
				note_edit_content.addClass(note_paper_color).addClass(note_paper_style);
				note_edit_content.find("textarea").val(click_obj.find(".note-content").html());
				note_edit.fadeIn(300);
			}
		});
	}
	/*详情按钮处理*/
	var handleNoteDetails = function(){
		note_details_close.on("click",function(){
			note_details.fadeOut("300");
		});
		note_details_delete.on("click",function(){
			if(confirm("确定删除当前便签？")){
				$.post($.U('List/ajax_delete'),{id:note_id},function(r){
					console.log(r);
                    if(r.status){
                        alert(r.data);
                        note_details.fadeOut();
                        click_obj.remove();
                    }
				});
			}
		});
	}
	
	/*入口*/
	return {
		init : function(){
			handleNoteDetails();
			handleNoteClick();
			notesAdd();
		}
	}
}();

Note.init();
