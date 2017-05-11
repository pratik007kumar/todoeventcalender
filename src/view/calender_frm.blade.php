 <div class="form-group">
 <input type="hidden" name=" _token" value="{{ csrf_token() }}">
 
 @if(isset($event))
 <input type="hidden" name="id" value="{{ $event->id }}">


<lable class="label">Title</lable> 
 <input type="text" id="title" name="title" value="{{ $event->title }}"  class="form-control" required />
 </div> 
 <div class="form-group"><lable class="label">Start and End Date Time</lable> 
 <input type="text" name="daterange" id="daterange" required value="
  {{date("d/m/Y H:i A",strtotime($event->start_dt))}} - {{date("d/m/Y H:i A",strtotime($event->end_dt))}} " class="form-control" />
 </div>
 <div class="form-group">
 <lable class="label">Description</lable> 
 <textarea  name="description" id="description" class="form-control">{{$event->description}}</textarea>
 </div>

 @else

 <lable class="label">Title</lable> 
 <input type="text" id="title" name="title" value=""  class="form-control" required />
 </div> 
 <div class="form-group"><lable class="label">Start and End Date Time</lable> 
 <input type="text" name="daterange" id="daterange" required value="
  {{date("d/m/Y H:i A",strtotime($dt))}} - {{date("d/m/Y H:i A",strtotime($dt."+30 minutes"))}} " class="form-control" />
 </div>
 <div class="form-group">
 <lable class="label">Description</lable> 
 <textarea  name="description" id="description" class="form-control"/>
 </div> 
 
 @endif