@extends('layout.admin')
@section('content')

@include('partial.check_errors')
@if($student)
<div class="row">

    <div class="col-4">



    </div>
    <div class="col-8">

            <form  action="{{route('post_edit_student')}}" method="POST">

                    <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name"  value="{{$student->Name}}" />
                    </div>

                  
                    <div class="form-group">
                    <label for="Notes">Notes</label>
                    <input type="text" class="form-control" name="Notes" value="{{$student->Notes}}" />
                    </div>

  
                    <div class="form-group">
                      <label for="imgURL">Img Url</label>
                      <input type="text"   class="form-control" name="imgURL" value="{{$student->imgURL}}" />
                      </div>

                      @foreach($courses as $course)

                      <div class="form-check">
                        <input class="form-check-input" 
                        name="student_courses[]" type="checkbox"
                        {{$student->courses->contains($course->id)?'checked':''}}
                        value="{{$course->id}}" >
                        <label class="form-check-label" for="defaultCheck1">
                          {{$course->Name}}
                        </label>
                      </div>
                      @endforeach



                    <input type="hidden"  name="id" value="{{$studentId}}" />

                      {{csrf_field()}}
                      <input type="submit"  class="btn btn-primary">

                      
                    
                    </form>
    </div>
        
</div>

@else
@include('errors.admin_error')

@endif

@endsection