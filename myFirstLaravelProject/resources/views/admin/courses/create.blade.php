@extends('layout.admin')
@section('content')

@include('partial.check_errors')

<div class="row">

    <div class="col-4">



    </div>
    <div class="col-8">

            <form>

                    <div class="form-group">
                    <label for="Id">ID</label>
                    <input type="number" class="form-control" name="Id" />
                    </div>


                    <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="Name"  />
                    </div>

                    <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="number" class="form-control" name="Price" />
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
                    <label for="imgUrl">Img Url</label>
                    <input type="text" class="form-control" name="imgUrl" value="https://homepages.cae.wisc.edu/~ece533/images/fruits.png" />
                    </div>

                      <input type="submit"  class="btn btn-primary">

                      
                    
                    </form>
    
        </div>
        
</div>
@endsection