@extends('layout.admin')
@section('content')

@include('partial.check_errors')

<div class="row">

    <div class="col-4">



    </div>
    <div class="col-8">

            <form  action="{{route('post_edit_student')}}" method="POST">

                    <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name"  value="{{$student['Name']}}" />
                    </div>

                  
                    <div class="form-group">
                    <label for="Notes">Notes</label>
                    <input type="text" class="form-control" name="Notes" value="{{$student['Notes']}}" />
                    </div>

  

                    <input type="hidden"  name="id" value="{{$studentId}}" />

                      {{csrf_field()}}
                      <input type="submit"  class="btn btn-primary">

                      
                    
                    </form>
    </div>
        
</div>
@endsection