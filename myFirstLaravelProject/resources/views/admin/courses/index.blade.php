
@extends ('layout.admin')
@section('content')

    @if (Session::has('create_course_information'))
            <div class ="row">
            <p class ="bg-primary text-center"> 
                {{Session::get('create_course_information')}}
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
                        <a href = "{{route('edit_course',['id'=> $course->id])}}"> Edit </a>

                        </td>
                </tr>
                @endforeach
                </tbody>
                </table>

    @else
    <h1> There are not any courses till now </h1>
    @endif
    </div>

    </div>
    @endsection