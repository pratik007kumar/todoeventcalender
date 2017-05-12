# todoeventcalender
Laravel 5.4 Todo Event Calender
This is simple event calender.which is developed using <a href="https://fullcalendar.io/" target="_blank" >fullcalender  </a>
## Following are the step to use this calender


#### Step 1:copy vender using composer

    composer require pratik007kumardev/todoeventcalender:"dev-master"
    or
    "require": {
       
        "pratik007kumardev/todoeventcalender": "dev-master"
    }

    and run composer update
#### step 2:Copy providers to config/app.php
'providers' => [

  Pratik\ToDoEventCalender\TodoEventCalenderServiceProvider::class,

]

#### step 3: Run  php artisan vendor:publish

#### step 4: Run  php artisan migrate
#### step 5: copy following css file in head tag

	<link rel="stylesheet" href="{{ asset('vendor/pratik/todocalender/plugins/bootstrap/css/bootstrap.min.css') }}">
	<link href="{{asset('vendor/pratik/todocalender/plugins/fullcalendar/fullcalendar.min.css')}}" rel='stylesheet' />
	<link href="{{asset('vendor/pratik/todocalender/plugins/daterangepicker/daterangepicker.css')}}" rel='stylesheet' />
	<link href="{{asset('vendor/pratik/todocalender/plugins/fullcalendar/fullcalendar.print.min.css')}}" rel='stylesheet' media="print" />
	
	<style type="text/css">
		.label{ color: #000; }
		.error{ color: #f00;
			font-size: 10px;
		}
	</style>
#### step 6: copy html code where you want to display Todo Calender

    <div class="container">
    	<div class="col-md-12">
		<div id='calendar'></div>
		</div>
	</div>
	<div id="calendarModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
			<form id="calender_frm" action="#" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
					<h4 id="modalTitle" class="modal-title"></h4>
					</div>
					<div id="modalBody" class="modal-body"> </div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success" >Save</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>	
	</div>

#### step 7: Copy all js file before closing html tag 
    <script src="{{asset('vendor/pratik/todocalender/plugins/fullcalendar/lib/moment.min.js')}}"></script>
    <script src="{{asset('vendor/pratik/todocalender/plugins/fullcalendar/lib/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/pratik/todocalender/plugins/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('vendor/pratik/todocalender/plugins/bootstrap/js/bootstrap-tooltip.js')}}"></script>
    <script src="{{asset('vendor/pratik/todocalender/plugins/daterangepicker/daterangepicker.js')}}"></script>
    
    <script src="{{asset('vendor/pratik/todocalender/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('vendor/pratik/todocalender/plugins/jquery.validate/jquery.validate.js')}}"></script>
     <script  >
		$(document).ready(function() {
			$.ajaxSetup(
			{
				headers:
				{
					'X-CSRF-Token': $('input[name="_token"]').val()
				}
			});
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				timezone: 'Asia/Kolkata',
				defaultDate: '{{date("Y-m-d")}}',
				editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: function(start, end, timezone, callback) {
				$.ajax({
					url: '{{url('/calender/getcalender')}}',
					dataType: 'json',
					data: {
		                // our hypothetical feed requires UNIX timestamps
		                start: start.unix(),
		                end: end.unix()
		            },
		            success: function(obj) {
		            	var events = [];
		            	$.each(obj, function(index, value) {
		            		events.push({
		            			id: value['id'],
		            			start: value['start'],
		            			title: value['title'],
		            			end: value['end'],
		            			description: value['description'],
			              //all data
			          });
			        });
		            	callback(events);

		            }
		        });
			},
            eventClick:  function(event, jsEvent, view) {
                	    $('#modalTitle').html('Update Event ');
                	   	$.ajax({
                	   		method: "POST",
                	   		url: "{{url('/calender/getfrm')}}",
                	   		data:{
                	   			_token: "{{ csrf_token() }}",
                	   			id:event.id
                	   		}
                	   	}).done(function( data ) {
                
                	   		if(data.status == 1){
                
                	   			$('#modalBody').html(data.frm);
                
                		            $('input[name="daterange"]').daterangepicker({
                		            	timePicker: true,
                		            	timePickerIncrement: 30,
                		            	locale: {
                		            		format: 'DD/MM/YYYY h:mm A'
                		            	}
                		            });
                		            $('#calendarModal').modal();
                
                		        }else{
                		        	alert(data.message);
                	            
                	        }
                	    });
                	   },
                     dayClick:  function(date,event, jsEvent, view) {
                                 date_o=  new Date(date)
                                 dt=date.toString("Y/m/d hh:mm.ss");
                                 $('#modalTitle').html('New Event Form');
                                    $.ajax({
                                	method: "POST",
                                	url: "{{url('/calender/getfrm')}}",
                                	data:{
                                		_token: "{{ csrf_token() }}",
                                		cal_date:dt,
                                		dat:date_o.getFullYear()+"-"+(date_o.getMonth()+1)+"-"+date_o.getDate(),
                                	        	  // tm:date.getTime()
                                	        	}
                                	        }).done(function( data ) {
                                
                                	        	if(data.status == 1){
                                
                                	        		$('#modalBody').html(data.frm);
                                			             
                                			            $('input[name="daterange"]').daterangepicker({
                                			            	timePicker: true,
                                			            	timePickerIncrement: 30,
                                			            	locale: {
                                			            		format: 'DD/MM/YYYY h:mm A'
                                			            	}
                                			            });
                                			            $('#calendarModal').modal();
                                
                                			        }else{
                                			        	alert(data.message);
                                	            //$('.error-favourite-message').html(msg.message);
                                	        }
                                	    });
                                	    },
                                	    eventResize: function(event, delta, revertFunc) {
                                        	$.ajax({
                                        		method: "POST",
                                        		url: "{{url('/calender/resize')}}",
                                        		data:{
                                        			_token: "{{ csrf_token() }}",
                                        			id:event.id,
                                        			start_dt:event.start.format(),
                                        			end_dt:event.end.format(),
                                				        	  // tm:date.getTime()
                                				        	},
                                				        	success: function (data) {
                                				        		if(data.status){
                                				        			$('#calendar').fullCalendar( 'refetchEvents' )

                                				        		} 
                                				        	}
                                				        });


                                    },
                                    eventDrop: function(event, delta, revertFunc) {
                                
                                        // alert(event.title + " was dropped on " + event.start.format()+' to '+event.end.format());
                                
                                        $.ajax({
                                        	method: "POST",
                                        	url: "{{url('/calender/resize')}}",
                                        	data:{
                                        		_token: "{{ csrf_token() }}",
                                        		id:event.id,
                                        		start_dt:event.start.format(),
                                        		end_dt:event.end.format(),
                                				        	  // tm:date.getTime()
                                				        	},
                                				        	success: function (data) {
                                				        		if(data.status){
                                				        			$('#calendar').fullCalendar( 'refetchEvents' )
                                
                                				        		} 
                                				        	}
                                				        });
                                
                                    }
    });


    $("#calender_frm").validate({
    	rules: {
    		title: {
    			required: true,
    		},
    		daterange: {
    			required: true,
    		},          
    
    	},
    	messages: {
    		title: {
    			required: "Please enter Todo Title",
    		},
    		daterange: {
    			required: "Please enter Select Date and Time",
    		},          
    
    	},
    	submitHandler: function(form) {
    		$.ajax({
    			method: "POST",
    			url: "{{url('/calender/save')}}",
    			data:$(form).serialize(),
    			success: function (data) {
    				if(data.status){
    					alert(data.msg);
    								 	// make_calender();
    								 	$('#calendar').fullCalendar( 'refetchEvents' )
    								 	$('#calendarModal').modal('hide');
    									// make_calender();
    								}else{
    									alert(data.msg);
    
    								}
    							}
    						});
    
    
    
    	},
    });
    

    });

    </script>

#### step end: you can use calender. for demo you can www.yourdomain.com/calender or localhost/yourapp/calender

