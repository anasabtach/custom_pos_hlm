
    <div class="col-md-12">
        <input class="form-control" type="file" id="{{ $id }}" onchange="singleImagePreview('#{{ $id }}','#{{ $preview }}')" name="{{ $name }}">
    </div>
    <div class="col-md-12">
        <img src="{{ @$image }}" id="{{ $preview }}" width="100px" height="100px" @if(!isset($is_update)) style="display:none" @endif>
    </div>
