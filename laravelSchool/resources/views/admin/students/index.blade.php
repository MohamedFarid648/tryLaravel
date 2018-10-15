
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
                        <td>{{$student->Name}} </td>
                        <td>{{$student->Notes}} </td>
                        <td>
                        <a href = "{{route('edit_student',['id'=> $student->id])}}"> Edit </a> |
                        <a href = "{{route('delete_student',['id'=> $student->id])}}"> Delete </a>


                        </td>
                </tr>
                @endforeach
                </tbody>
                </table>

    @else
    <h1> There are not any students till now </h1>
    @endif


    <p>
            <h3 class="text-danger">
                    Deleted Students
            </h3>
        </p>
    
        @if (count($deletedStudents))
    
    
        <table class ="table table-striped">
            <thead>
            <tr>
                <th> Name </th>
                <th> Notes </th>
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>
                
            @foreach ($deletedStudents as $student)
            @if($student->trashed())
            <tr> 
                
                
                    <td>{{$student->Name}} </td>
                    <td>{{$student->Notes}} </td>
    
                    <td>
                    <a href = "{{route('undelete_student',['id'=> $student->id])}}"> UnDelete </a>|
                    <a href = "{{route('force_delete_student',['id'=> $student->id])}}"> Force Delete </a>
    
    
                    </td>
            </tr>
            @endif
            @endforeach
            </tbody>
            </table>
    
            @else
            <h1> There are not any deleted students till now </h1>
            @endif
    
    </div>

    </div>
    @endsection