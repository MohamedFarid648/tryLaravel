@extends('layout.admin')
@section('content')

@if(Session::has('create_course_information'))
        <div class="row">
                <p class="bg-primary">
                        
                    {{Session::get('create_course_information')}}

                </p>
        </div>
@endif
<div class="row">

    <div class="col-4">



    </div>
    <div class="col-4">


            <p>AllCourses</p>
    
        </div>
        <div class="col-4">


        
            </div>
</div>
@endsection