@if(count($errors->all()))
   <ul>
        //errors is a helper object send from web.php to view 
        //all() these are all message  errors   //you can see all error messages in resources->lang->validation.php 
       @foreach($errors->all() as $error)
           <li>{{$error}}</li>
       @endforeach
   </ul>
@endif