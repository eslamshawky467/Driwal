<html>
    <form method="post" action="{{route('create')}}" enctype="multipart/form-data">
        @csrf
       

        <div class="form-group ">
            <label>location</label>
            <input type="text" name="location" autofocus class="form-control" required>
        </div>
        <div class="form-group ">
            <label>lat</label>
            <input type="text" name="lat" autofocus class="form-control" required>
        </div>
        <div class="form-group ">
            <label>long</label>
            <input type="text" name="long" autofocus class="form-control" required>
        </div>
        <div class="form-group ">
           
            <input type="hidden" name="id" autofocus value="16" class="form-control" required>
        </div>
        {{-- <a href="{{route('create')}}"></a> --}}
        {{-- <div class="form-group ">
            <label>start_cost</label>
            <input type="number" name="start_cost" autofocus class="form-control" required>
        </div>
        <div class="form-group ">
            <label>email</label>
            <input type="text" name="email" autofocus class="form-control" required>
        </div> --}}
        <div class="form-group ">
            <button type="submit" class="btn btn-primary">button</button>
        </div>
     
</form>

    