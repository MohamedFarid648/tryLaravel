@extends('layout.admin')
@section('content')

@include('partial.check_errors')

<div class="row">

    <div class="col-4">



    </div>
    <div class="col-8">

            <form  action="{{route('post_delete_student')}}" method="POST">

                    <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" readonly class="form-control" name="Name"  value="{{$student->Name}}" />
                    </div>

                  
                    <div class="form-group">
                    <label for="Notes">Notes</label>
                    <input type="text" readonly class="form-control" name="Notes" value="{{$student->Notes}}" />
                    </div>

                     <div class="form-group">
                      <label for="imgURL">Img Url</label>
                      <input type="text" readonly  class="form-control" name="imgURL" value="{{$student->imgURL}}" />
                      </div>


                      <div class="form-group">
                        <img  src="{{$student->imgURL}}" />
                      </div>

                    <input type="hidden"  name="id" value="{{$studentId}}" />

                      {{csrf_field()}}
                      <input type="submit"  value="Delete" class="btn btn-danger">

                      
                    
                    </form>
    </div>
        
</div>
@endsection