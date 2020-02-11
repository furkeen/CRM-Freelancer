        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $basic_report['completed_project']['total_sum']; ?></span><?php echo $currency; ?></div>
                                            <div class="stat-heading">Completed Project ( <?php echo $basic_report['completed_project']['count']; ?> )</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $basic_report['started_project']['total_sum']; ?></span><?php echo $currency; ?></div>
                                            <div class="stat-heading">Started Projects ( <?php echo $basic_report['started_project']['count']; ?> )</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $basic_report['draft_project']['total_sum']; ?></span><?php echo $currency; ?></div>
                                            <div class="stat-heading">Draft Project ( <?php echo $basic_report['draft_project']['count']; ?> )</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $basic_report['customer_report']['total_customer']; ?></span></div>
                                            <div class="stat-heading">Customer Debt <span class="font-weight-bold text-danger">(<?php echo $basic_report['customer_report']['total_debt']; ?> <?php echo $currency; ?>)<span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Active Project Customers </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th>Customer Name</th>
                                                    <th>Customer Mobile</th>
                                                    <th class="text-center">Remaining Stages</th>
                                                    <th class="text-center">Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($active_customer as $value): ?>
                                                <tr>
                                                    <td>#<?php echo $value['customer_id']; ?></td>
                                                    <td><span class="name"><?php echo $value['customer_name'].' '.$value['customer_surname']; ?></span></td>
                                                    <td><span class="product"><?php echo $value['customer_mobile']; ?></span> </td>
                                                    <td class="text-center"><span class="count"><?php echo $value['active_stages']; ?></span></td>
                                                    <td class="text-center">
                                                        <span class="badge badge-danger"><?php echo $value['customer_debt']; ?> <?php echo $currency; ?></span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                        <div class="col-md-12 col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="box-title">Chandler</h4> -->
                                <div class="calender-cont widget-calender">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    </div>
                </div>
                <!-- /.orders -->
                <!-- To Do and Live Chat -->
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title box-title">In 7 Days Deadline Stages To Do List</h4>
                                <div class="card-content">
                                    <div class="todo-list">
                                        <div class="tdl-holder">
                                            <div class="tdl-content">
                                                <ul>
                                                <?php foreach($last_stages as $value): ?>
                                                    <li>
                                                        <label>
                                                            <input type="checkbox" class="todo-check" id="<?php echo $value['stages_id']; ?>" <?php echo ($value['stages_status']==1 ? 'checked' : ''); ?> ><i class="check-box"></i>
                                                            <span>
                                                                <span class="text-danger">
                                                                <?php echo $value['stages_deadline']; ?>
                                                                </span>
                                                            <?php echo ' - '.$value['stages_detail'];   ?>
                                                            </span>
                                                            <a href='<?php echo URL; ?>post/deleteStage/<?php echo $value['stages_id']; ?>' class="fa fa-times text-danger"></a>
                                                            <a href='<?php echo URL; ?>post/changeStageStatusTrue/<?php echo $value['stages_id']; ?>' class="fa fa-check text-success"></a>
                                                        </label>
                                                    </li>
                                                <?php endforeach; ?>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div> <!-- /.todo-list -->
                                </div>
                            </div> <!-- /.card-body -->
                        </div><!-- /.card -->
                    </div>

                </div>
                <!-- /To Do and Live Chat -->

                <!-- Modal - Calendar - Add New Event -->
                <div class="modal fade none-border" id="event-modal">
                    <form action="<?php echo URL; ?>post/addEvent" method="post" id="addEventForm">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><strong>Add New Event</strong></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="form-label">
                                            Event Detal    
                                            </label>
                                            <input type="text" class="form-control" name="event_content">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="form-label">
                                            Event Date    
                                            </label>
                                            <input type="date" class="form-control" name="event_date" id="date_event" readonly="true">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="form-label">
                                            Event Date    
                                            </label>
                                            <select class="form-control" name="event_color" id="color">
                                                <option value="success">Green</option>
                                                <option value="danger">Red</option>
                                                <option value="info">Light Blue</option>
                                                <option value="pink">Pink</option>
                                                <option value="primary">Blue</option>
                                                <option value="warning">Yellow</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="form-label">
                                            Event Time    
                                            </label>
                                            <input type="time" class="form-control" name="event_time">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Create event</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /#event-modal -->
                <!-- Modal - Calendar - Add New Event -->
                <div class="modal fade none-border" id="event-edit-modal">
                    <form action="<?php echo URL; ?>post/editEvent" method="post" id="addEventForm">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><strong>Edit Event</strong></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="form-label">
                                            Event Detal    
                                            </label>
                                            <input type="text" class="form-control" name="event_content" id='edit_content'>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="form-label">
                                            Event Date    
                                            </label>
                                            <input type="date" class="form-control" name="event_date" id="edit_date" >
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="form-label">
                                            Event Date    
                                            </label>
                                            <select class="form-control" name="event_color" id="edit_color">
                                                <option value="success">Green</option>
                                                <option value="danger">Red</option>
                                                <option value="info">Light Blue</option>
                                                <option value="pink">Pink</option>
                                                <option value="primary">Blue</option>
                                                <option value="warning">Yellow</option>
                                                <option value="dark">Black</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="form-label">
                                            Event Time    
                                            </label>
                                            <input type="time" class="form-control" name="event_time" id="edit_time">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Edit event</button>
                                    <a id="delete_event" href="<?php echo URL; ?>post/deleteEvent/" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="event_id" value="" id="edit_id">
                    </form>
                </div>
                <!-- /#event-modal -->
      
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->


<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script><script>

!function($) {
    "use strict";

    var CalendarApp = function() {
        this.$body = $("body")
        this.$modal = $('#event-modal'),
        this.$event = ('#external-events div.external-event'),
        this.$calendar = $('#calendar'),
        this.$saveCategoryBtn = $('.save-category'),
        this.$categoryForm = $('#add-category form'),
        this.$extEvents = $('#external-events'),
        this.$calendarObj = null
    };



    CalendarApp.prototype.enableDrag = function() {
        //init events
        $(this.$event).each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });
    }
    /* Initializing */
    CalendarApp.prototype.init = function() {
        this.enableDrag();
        /*  Initialize the calendar  */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());

        var jsonDataBase = <?php echo json_encode($event_list); ?>;
        // var arrayJson = JSON.parse(jsonDataBase);
        Date.createFromMysql = function(mysql_string)
        { 
        var t, result = null;

        if( typeof mysql_string === 'string' )
        {
            t = mysql_string.split(/[- :]/);

            //when t[3], t[4] and t[5] are missing they defaults to zero
            result = new Date(t[0], t[1] - 1, t[2], t[3] || 0, t[4] || 0, t[5] || 0);          
        }

        return result;   
        }
        var testDate = new Date.createFromMysql(jsonDataBase[0]['event_date']);
        console.log(testDate);

        var defaultEvents = [];
        var eventFromDatabase;
        jsonDataBase.forEach(element => {
            console.log('foeach =>'+new Date(element['event_date']));
            var dateFromData = new Date(element['event_date']);
            defaultEvents.push({
                id: element['event_id'],
                title: element['event_detail'],
                start: dateFromData,
                className: 'bg-'+element['event_color'],
             });
            });

        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
            slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
            minTime: '08:00:00',
            maxTime: '19:00:00',  
            defaultView: 'month',  
            handleWindowResize: true,   
            height: $(window).height() - 200,   
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: defaultEvents,
            timeFormat: 'H:mm', // uppercase H for 24-hour clock
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            eventDrop: function(calEvent, jsEvent, view) {
                var id = calEvent.id;
                var newDate = moment(calEvent.start).format('YYYY-MM-DD H:mm:ss');
                // alert(calEvent.id + " was dropped on " + );
                $.ajax({
                    type: "post",
                    url: "<?php echo URL; ?>post/ajaxEventEdit/"+id,
                    data: 'new_date='+newDate,
                    success: function (response) {
                        // console.log(response);
                    }
                });

            },
            // drop: function(date) { $this.onDrop($(this), date); },
            // select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
            eventClick: function(calEvent, jsEvent, view) {
                // info.jsEvent.preventDefault(); // don't let the browser navigate
                // console.log('event_id : '+calEvent.id);
                // console.log('event_title : '+calEvent.title);
                // console.log('event_date : '+moment(calEvent.start).format('YYYY-MM-DD'));
                // console.log('event_time : '+moment(calEvent.start).format('H:mm:ss'));
                // console.log('event_color : '+calEvent.className);
               
                var content = calEvent.title;
                var id      = calEvent.id;
                var date    = moment(calEvent.start).format('YYYY-MM-DD');
                var time    = moment(calEvent.start).format('H:mm:ss');
                var color   = calEvent.className.toString();
                var deleteHref = $('#delete_event').attr('href')+id
                $('#event-edit-modal').modal('show');
                $('#delete_event').attr('href',deleteHref);
                $('#edit_id').val(id);
                $('#edit_content').val(content);
                $('#edit_date').val(date);
                $('#edit_time').val(time);
                $('#edit_color').val(color.replace('bg-',''));
              
            },
            eventAfterRender:function( event, element, view ) { 
            $(element).attr("event_id", event._id.replace('_fc', ''));
        },
        });

        //on new event
        this.$saveCategoryBtn.on('click', function(){
            var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
            var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
            if (categoryName !== null && categoryName.length != 0) {
                $this.$extEvents.append('<div class="external-event bg-' + categoryColor + '" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-move"></i>' + categoryName + '</div>')
                $this.enableDrag();
            }

        });
    },

   //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
    
}(window.jQuery),

//initializing CalendarApp
function($) {
    "use strict";
    $.CalendarApp.init()
}(window.jQuery);

</script>

<script>
jQuery(document).ready(function () {
    jQuery('.fc-day-top').click(function (e) { 
        e.preventDefault();
        console.log(jQuery(this).data('date'));
        var date = jQuery(this).data('date');
        jQuery('#event-modal').modal('show');
        jQuery('#date_event').val(date);

    });
    jQuery('.todo-check').change(function (e) { 
        e.preventDefault();
        console.log('değişti');
        var id = jQuery(this).attr('id');
        console.log(id);
        console.log(jQuery(this).is(':checked'));
        if(jQuery(this).is(':checked')){
        jQuery.ajax({
            type: "post",
            url: '<?php echo URL;?>post/changeStageStatusTrue/'+id,
            success: function (response) {
                
            }
            });
        }else{
            jQuery.ajax({
            type: "post",
            url: '<?php echo URL;?>post/changeStageStatusFalse/'+id,
            success: function (response) {
                
            }
            });

        }

    });
});
</script>