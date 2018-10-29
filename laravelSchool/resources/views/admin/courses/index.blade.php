
@extends ('layout.admin')
@section('content')

    @if (Session::has('course_information'))
            <div class ="row">
            <p class ="bg-primary text-center"> 
                {{Session::get('course_information')}}
            </p>
            
            </div>
    @endif
    <div class ="row">

    <div class ="col-4"></div>
    <div class ="col-8">
    @if (count($courses))


            <table class ="table table-striped">
                <thead>
                <tr>
                    <th> Name </th>
                    <th> Quantity </th>
                    <th> Grade </th>
                    <th> Description </th>
                    <th> Actions </th>
                </tr>
                </thead>
                <tbody>
                    
                @foreach ($courses as $course)
                <tr>
                        <td>{{$course->Name}} </td>
                        <td>{{$course->Quantity}} </td>
                        <td>{{$course->Grade}} </td>
                        <td>{{$course->Description}} </td>

                        <td>
                        <a href = "{{route('edit_course',['id'=> $course->id])}}"> Edit </a> |
                        <a href = "{{route('delete_course',['id'=> $course->id])}}"> Delete </a>


                        </td>
                </tr>
                @endforeach
                </tbody>
                </table>

                {{$courses->links()}}

    
    @else
    <h1> There are not any courses till now </h1>
    @endif

    <p>
        <h3 class="text-danger">
                Deleted Courses
        </h3>
    </p>

    @if (count($deletedCourses))


    <table class ="table table-striped">
        <thead>
        <tr>
            <th> Name </th>
            <th> Quantity </th>
            <th> Grade </th>
            <th> Description </th>
            <th> Actions </th>
        </tr>
        </thead>
        <tbody>
            
        @foreach ($deletedCourses as $course)
        @if($course->trashed())
        <tr>
                <td>{{$course->Name}} </td>
                <td>{{$course->Quantity}} </td>
                <td>{{$course->Grade}} </td>
                <td>{{$course->Description}} </td>

                <td>
                <a href = "{{route('undelete_course',['id'=> $course->id])}}"> UnDelete </a>|
                <a href = "{{route('force_delete_course',['id'=> $course->id])}}"> Force Delete </a>


                </td>
        </tr>
        @endif
        @endforeach
        </tbody>
        </table>

        @else
        <h1> There are not any deleted courses till now </h1>
        @endif


    </div>

    </div>


    <div class="row">



    </div>
    @endsection