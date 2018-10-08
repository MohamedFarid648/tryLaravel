
@extends ('layout.admin')
@section('content')

    @if (Session::has('create_student_information'))
            <div class ="row">
            <p class ="bg-primary text-center"> 
                {{Session::get('create_student_information')}}
            </p>
            
            </div>
    @endif
    <div class ="row">

    <div class ="col-4"></div>
    <div class ="col-8">
    @if (count($students))


            <table class ="table table-striped">
                <thead>
                <tr>
                    <th> Name </th>
                    <th> Notes </th>
                    <th> Actions </th>
                </tr>
                </thead>
                <tbody>
                    
                @foreach ($students as $student)
                <tr>
                        <td>{{$student['Name']}} </td>
                        <td>{{$student['Notes']}} </td>
                        <td>
                        <a href = "{{route('edit_student',['id'=> $student['Id']])}}"> Edit </a>

                        </td>
                </tr>
                @endforeach
                </tbody>
                </table>

    @else
    <h1> There are not any students till now </h1>
    @endif
    </div>

    </div>
    @endsection