# todoeventcalender
Laravel 5.4 Todo Event Calender
This is simple event calender.which is developed using <a href="https://fullcalendar.io/" target="_blank" >fullcalender  </a>
## Following are the step to use this calender
####Step 1:copy vender using composer

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

#### step end: you can use calender.

