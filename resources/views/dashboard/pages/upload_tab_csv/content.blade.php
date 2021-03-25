<div class="col-md-6">
    <form method="POST" action="{{ url("upload_tab_csv") }}" enctype="multipart/form-data">
        {{ @csrf_field() }}
        <input type="file" class="btn btn-primary" id="customFile" name="file">
        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
    </form>
    @if(session()->has('message'))
        <div class="alert alert-success mt-2">
            {{ session()->get('message') }}
        </div>
    @endif
    <a class="btn btn-success mt-2" href="/feedtabsdata">Add to Tabs DB</a>
    @if(session()->has('feedtabsdata_msg'))
        <div class="alert alert-success mt-2">
            {{ session()->get('feedtabsdata_msg') }}
        </div>
    @endif
</div>
