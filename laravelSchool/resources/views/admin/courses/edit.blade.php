@extends('layout.admin')
@section('content')

@include('partial.check_errors')

<div class="row">

    <div class="col-4">



    </div>
    <div class="col-8">

            <form  action="{{route('post_edit_course')}}" method="POST">

                    <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name"  value="{{$course->Name}}" />
                    </div>

                    <div class="form-group">
                    <label for="Grade">Grade</label>
                    <input type="number" class="form-control" name="Grade" value="{{$course->Grade}}" />
                    </div>
                  
                    <div class="form-group">
                    <label for="Description">Description</label>
                    <input type="text" class="form-control" name="Description" value="{{$course->Description}}" />
                    </div>

                   <div class="form-group">
                    <label for="Quantity">Quantity</label>
                    <input type="number" class="form-control" name="Quantity" value="{{$course->Quantity}}" />
                    </div>


                    <div class="form-group">
                      <label for="imgURL">Img Url</label>
                      <input type="text"   class="form-control" name="imgURL" value="{{$course->imgURL}}" />
                      </div>


                      <div class="form-group">
                        <img  src="{{$course->imgURL}}" />
                      </div>


                    <input type="hidden"  name="id" value="{{$courseId}}" />

                      {{csrf_field()}}
                      <input type="submit"  class="btn btn-primary">

                      
                    
                    </form>
    </div>
        
</div>
@endsection