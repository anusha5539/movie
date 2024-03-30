<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{url('/import')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
