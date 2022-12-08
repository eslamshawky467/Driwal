<html>
    <form method="post" action="{{route('edit')}}" enctype="multipart/form-data">
        @csrf
       @method('put')

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
            <label>id</label>
            <input type="number" name="id" autofocus class="form-control" required>
        </div>
       
        <div class="form-group ">
            <button type="submit" class="btn btn-primary">button</button>
        </div>
     
</form>

    