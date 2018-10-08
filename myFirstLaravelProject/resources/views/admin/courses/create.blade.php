@extends('layout.admin')
@section('content')

@include('partial.check_errors')

<div class="row">

    <div class="col-4">



    </div>
    <div class="col-8">

            <form action="{{route('create_course')}}" method="POST">

                    <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name"  />
                    </div>

                    <div class="form-group">
                    <label for="Grade">Grade</label>
                    <input type="number" class="form-control" name="Grade" />
                    </div>
                  
                    <div class="form-group">
                    <label for="Description">Description</label>
                    <input type="text" class="form-control" name="Description" />
                    </div>

                   <div class="form-group">
                    <label for="Quantity">Quantity</label>
                    <input type="number" class="form-control" name="Quantity" />
                    </div>

                    <div class="form-group">
                    <label for="imgURL">Img Url</label>
                    <input type="text" class="form-control" name="imgURL" value="https://homepages.cae.wisc.edu/~ece533/images/fruits.png" />
                    </div>

                      {{csrf_field()}}
                      <input type="submit"  class="btn btn-primary">

                      
                    
                    </form>
    </div>
        
</div>
@endsection