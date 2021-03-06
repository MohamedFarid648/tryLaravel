@extends('layout.admin')
@section('content')

@include('partial.check_errors')

<div class="row">

    <div class="col-4">



    </div>
    <div class="col-8">

            <form action="{{route('create_student')}}" method="POST">

                    <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name"  />
                    </div>

                    <div class="form-group">
                    <label for="Notes">Notes</label>
                    <input type="text" class="form-control" name="Notes" />
                    </div>

                    <div class="form-group">
                    <label for="imgURL">Img Url</label>
                    <input type="text" class="form-control" name="imgURL" value="https://homepages.cae.wisc.edu/~ece533/images/fruits.png" />
                    </div>


                    Courses

                    @foreach($courses as $course)

                    <div class="form-check">
                      <input class="form-check-input" name="student_courses[]" type="checkbox" value="{{$course->id}}" >
                      <label class="form-check-label" for="defaultCheck1">
                        {{$course->Name}}
                      </label>
                    </div>
                    @endforeach
                      {{csrf_field()}}
                      <input type="submit"  value="Create" class="btn btn-primary">

                      
                    
                    </form>
    </div>
        
</div>
@endsection