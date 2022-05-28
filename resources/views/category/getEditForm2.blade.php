<form method="POST" action="{{url('kategori/'.$data->id)}}">
  <div class="modal-header">
    <button type="button" class="close" 
      data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Edit Category</h4>
  </div>

  <div class="modal-body">
      @csrf
      @method("PUT")

    <div class="mb-3">
    <label for="eName" class="form-label">Category Name</label>
    <input type="text" class="form-control" id="eName" name="nameCategory" value="{{$data->name}}" requaired>
  </div><br><br>
  <div class="mb-3">
    <label for="eDescription" class="form-label">Description of Category</label>
    <textarea name="description" rows="10" cols="30" class="form-control" id="eDescription"> {{$data->description}}</textarea>
  </div><br><br>
  </div>

  <div class="modal-footer">
      <button type="button" onclick="saveDataUpdateTD({{$data->id}})" class="btn btn-info" data-dismiss="modal">Submit</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  </div>
</form>