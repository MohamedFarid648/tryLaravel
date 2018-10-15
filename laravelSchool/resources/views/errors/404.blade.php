@extends('layout.master')
@section('content')

<div class="row">
        <div class="col-4">
        
        </div>
        
        <div class="col-8">
         
                <h2>{{ $exception->getMessage() }}</h2>


            <h1> Some thing is wrong , please try again or go to
                    <a class="btn btn-primary" href="{{route('userHome')}}">Home</a>
            </h1>
        
        </div>
        
        <div class="col-4">
        
        </div>
        </div>

@endsection