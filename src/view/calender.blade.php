<link rel="stylesheet" href="{{ asset('vendor/pratik/todocalender/plugins/bootstrap/css/bootstrap.min.css') }}">
	<link href="{{asset('vendor/pratik/todocalender/plugins/fullcalendar/fullcalendar.min.css')}}" rel='stylesheet' />
	<link href="{{asset('vendor/pratik/todocalender/plugins/daterangepicker/daterangepicker.css')}}" rel='stylesheet' />
	<link href="{{asset('vendor/pratik/todocalender/plugins/fullcalendar/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />
	<style type="text/css">
		.label{ color: #000; }
		.error{ color: #f00;
			font-size: 10px;
		}
	</style>


			<div class="col-md-12">
				<div id='calendar'></div>
			</div>



<script src="{{asset('vendor/pratik/todocalender/plugins/fullcalendar/lib/moment.min.js')}}"></script>
<script src="{{asset('vendor/pratik/todocalender/plugins/fullcalendar/lib/jquery.min.js')}}"></script>
<script src="{{asset('vendor/pratik/todocalender/plugins/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('vendor/pratik/todocalender/plugins/bootstrap/js/bootstrap-tooltip.js')}}"></script>
<script src="{{asset('vendor/pratik/todocalender/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('vendor/pratik/todocalender/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
{{-- <script src="{{asset('plugin/jquery.validate/jquery.validate.js')}}"></script> --}}
{{-- <script src="{{asset('plugin/jquery.validate/jquery.form.js')}}"></script> --}}
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script>



	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '2017-05-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
			{	id:5,
				title: 'All Day Event',
				start: '2017-05-01',
				description:'asdfdsafsdafdsafdsafsdafdsafdsaf sadf sdafs sad sdaf sdaf sadfsadf sad s sadf'
			},
			{
				title: 'Long Event',
				start: '2017-05-07T10:15',
				end: '2017-05-10T20:15'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: '2017-05-09T16:00:00'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: '2017-05-16T16:00:00'
			},
			{
				title: 'Conference',
				start: '2017-05-11',
				end: '2017-05-13'
			},
			{
				title: 'Meeting',
				start: '2017-05-12T10:30:00',
				end: '2017-05-12T12:30:00'
			},
			{
				title: 'Lunch',
				start: '2017-05-12T12:00:00'
			},
			{
				title: 'Meeting',
				start: '2017-05-12T14:30:00'
			},
			{
				title: 'Happy Hour',
				start: '2017-05-12T17:30:00'
			},
			{
				title: 'Dinner',
				start: '2017-05-12T20:00:00'
			},
			{
				title: 'Birthday Party',
				start: '2017-05-13T07:00:00'
			},
			{
				title: 'Click for Google',
				url: 'http://google.com/',
				start: '2017-05-28'
			}
			],
			eventRender: function(event, element) {
		 //      $(element).tooltip({title: event.title});       
		 element.find("div.fc-content").prepend("+");      
		},
		 // eventClick: function(data, event, view) {
   //         alert(data.start);
   //      },
	   eventClick:  function(event, jsEvent, view) {
	   	$('#modalTitle').html(event.title);
	   	$('#modalBody').html(event.description);
	   	$('#eventUrl').attr('href',event.url);
	   	$('#calendarModal').modal();
	   },
	   dayClick:  function(date,event, jsEvent, view) {

			  	   // alert('Clicked on: ' + date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear());  
			  	   
			  	   $('#modalTitle').html('New Event Form');

			  	   var new_form_code ="";
			  	    $.ajax({
				        method: "POST",
				        url: "{{url('/calender/getfrm')}}",
				        data:{
				        	 "_token": "{{ csrf_token() }}"
				        }
				        }).done(function( data ) {

				        if(data.status == 1){
				           
				             $('#modalBody').html(data.frm);
						            // $('#eventUrl').attr('href',event.url);
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
					        var formData = new FormData($("#image")[0]);
					        // $(form).ajaxSubmit({
					        //     url:"action.php",
					        //     type:"post",
					        //     success: function(data,status){
					        //       alert(data);
					        //     }
					        // });
					    }
		});
			  	 
		
	});</script>