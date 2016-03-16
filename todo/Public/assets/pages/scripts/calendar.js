var Calendar = function() {

    var height=document.documentElement.clientHeight-60;
    var width=document.documentElement.clientWidth;
    return {
        //main function to initiate the module
        init: function() {
            Calendar.initCalendar();
        },

        initCalendar: function() {

            if (!jQuery().fullCalendar) {
                return;
            }

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            var h = {};
            $('table .fc-header').css({width:width});
            $('#calendar').css({height:height,width:width}).addClass('mobile');
            h = {
                left: 'prev,next',
                center: 'title',
                right: 'today,month,agendaWeek,agendaDay'
            }

            //var initDrag = function(el) {
            //    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            //    // it doesn't need to have a start or end
            //    var eventObject = {
            //        title: $.trim(el.text()),// use the element's text as the event title
            //    };
            //    // store the Event Object in the DOM element so we can get to it later
            //    el.data('eventObject', eventObject);
            //    // make the event draggable using jQuery UI
            //    el.draggable({
            //        zIndex: 999,
            //        revert: true, // will cause the event to go back to its
            //        revertDuration: 0 //  original position after the drag
            //
            //    });
            //
            //};

            //var addEvent = function(title) {
            //    title = title.length === 0 ? "Untitled Event" : title;
            //    var html = $('<div class="external-event label label-default">' + title + '</div>');
            //    jQuery('#event_box').append(html);
            //    initDrag(html);
            //};
            //
            //$('#external-events div.external-event').each(function() {
            //    initDrag($(this));
            //});

            $('#calendar').fullCalendar('destroy'); // destroy the calendar
            $('#calendar').fullCalendar({ //re-initialize the calendar
                is_RTL:false,
                //theme:true,
                width:width,
                height:height,
                prev: 'left-single-arrow',
                next: 'right-single-arrow',
                header: h,
                titleFormat: {
                    month: 'yyyy年MM月',
                    week: "MM月d{ '-' d}日",
                    day: 'yy年MM月 dd'
                },
                defaultView: 'agendaDay', // change default view with available options from http://arshaw.com/fullcalendar/docs/views/Available_Views/
                slotMinutes: 15,
                eventLimit: true,
                editable: true,//可编辑的表格？
                droppable: false, // this allows things to be dropped onto the calendar !!!
                //drop: function(date, allDay) { // this function is called when something is dropped
                //
                //    // retrieve the dropped element's stored Event Object
                //    var originalEventObject = $(this).data('eventObject');
                //    // we need to copy it, so that multiple events don't have a reference to the same object
                //    var copiedEventObject = $.extend({}, originalEventObject);
                //
                //    // assign it the date that was reported
                //    copiedEventObject.start = date;
                //    copiedEventObject.allDay = allDay;
                //    copiedEventObject.className = $(this).attr("data-class");
                //    //$.post($.U('Calendar/ajax?q=AddEvent'),{'addEvent':copiedEventObject},function(data){
                //    //    //console.log(data);
                //    //});
                //
                //    // render the event on the calendar
                //    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                //    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                //    // is the "remove after drop" checkbox checked?
                //    if ($('#drop-remove').is(':checked')) {
                //        // if so, remove the element from the "Draggable Events" list
                //        $(this).remove();
                //    };
                //
                //},
                events: function(start, end,callback){
                    $.ajax({
                        url: $.U('Calendar/ajax_AllEvent'),
                        dataType:'json',
                        success: function(data) {
                            var events = [];
                           $(data.event).each(function(e,a) {
                               events.push({
                                   id: a.id,
                                   title: a.title,
                                   start: a.create_time,
                                   backgroundColor: a.backgroundColor,
                                   end:a.end,
                                   allDay:a.allDay,
                                   a: a.allDay,
                                   className: a.is_finished
                               });

                           });
                            callback(events);
                            //console.log(events);

                        }
                    });
                },
                eventClick: function(calEvent) {
                    var the=$(this);
                    //console.log(the);
                    //console.log(calEvent);

                }
                //eventDrop:function( event){
                //  //  console.log(event);
                //    if(event.allDay) {
                //        $.ajax({
                //            url: $.U('Calendar/ajax?q=RemoveTime'),
                //            data: {
                //                start: event.start,
                //                id: event._id,
                //                end: event.end
                //            },
                //            dataType: 'json',
                //            success: function (item) {
                //              //  console.log('removeTime');
                //            }
                //        })
                //    }
                //    else{
                //        $.ajax({
                //            url: $.U('Calendar/ajax?q=RemoveDayTime'),
                //            data: {
                //                allDay: event.allDay,
                //                start: event.start,
                //                end: event.end,
                //                id: event.id
                //            },
                //            dataType: 'json',
                //            success: function (item) {
                //              //  console.log('removeDayTime');
                //            }
                //        })
                //    }
                //},
                //eventDragStop:function(event,jsEvent,ui,view){
                //    //$('#event_delete').droppable({
                //    //    drop:function(){
                //    //       // console.log(event);
                //    //        var the=$('#calendar');
                //    //        $.ajax({
                //    //            url: $.U('Calendar/ajax?q=deleteEvent'),
                //    //            data:{
                //    //                id:event.id
                //    //            },
                //    //            dataType:'json',
                //    //            success: function(item){
                //    //               // console.log(event.id);
                //    //                 the.fullCalendar( 'removeEvents',event.id );
                //    //            }
                //    //        })
                //    //}});
                //
                //   //if(!!$(this).draggable({ snap: "#event_delete",snapMode:'inner'}))
                //   //{
                //   //    var the=$('#calendar');
                //   //    $.ajax({
                //   //        url: $.U('Calendar/ajax?q=deleteEvent'),
                //   //        data:{
                //   //            id:event.id
                //   //        },
                //   //        dataType:'json',
                //   //        success: function(item){
                //   //            console.log('deleteEvent');
                //   //            // the.fullCalendar( 'removeEvents',event.id );
                //   //        }
                //   //    })
                //   //}
                //},
                //eventResize:function( event){
                //    //$.ajax({
                //    //    url: $.U('Calendar/ajax?q=ResizeTime'),
                //    //    data:{
                //    //        time:event.end,
                //    //        id:event._id
                //    //    },
                //    //    dataType:'json',
                //    //    success: function(item){
                //    //        //console.log('resizeTime');
                //    //    }
                //    //})
                //}
            });

        }

    };;

}();