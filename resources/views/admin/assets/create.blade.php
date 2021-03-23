@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.asset.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.assets.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="asset_branch_id">{{ trans('cruds.asset.fields.asset_branch') }}</label>
                <select class="form-control select2 {{ $errors->has('asset_branch') ? 'is-invalid' : '' }}" name="asset_branch_id" id="asset_branch_id" required>
                    @foreach($asset_branches as $id => $asset_branch)
                        <option value="{{ $id }}" {{ old('asset_branch_id') == $id ? 'selected' : '' }}>{{ $asset_branch }}</option>
                    @endforeach
                </select>
                @if($errors->has('asset_branch'))
                    <span class="text-danger">{{ $errors->first('asset_branch') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.asset_branch_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.asset.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="asset_type_id">{{ trans('cruds.asset.fields.asset_type') }}</label>
                <select class="form-control select2 {{ $errors->has('asset_type') ? 'is-invalid' : '' }}" name="asset_type_id" id="asset_type_id">
                    @foreach($asset_types as $id => $asset_type)
                        <option value="{{ $id }}" {{ old('asset_type_id') == $id ? 'selected' : '' }}>{{ $asset_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('asset_type'))
                    <span class="text-danger">{{ $errors->first('asset_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.asset_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="serial_number">{{ trans('cruds.asset.fields.serial_number') }}</label>
                <input class="form-control {{ $errors->has('serial_number') ? 'is-invalid' : '' }}" type="text" name="serial_number" id="serial_number" value="{{ old('serial_number', '') }}">
                @if($errors->has('serial_number'))
                    <span class="text-danger">{{ $errors->first('serial_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.serial_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.asset.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photos">{{ trans('cruds.asset.fields.photos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}" id="photos-dropzone">
                </div>
                @if($errors->has('photos'))
                    <span class="text-danger">{{ $errors->first('photos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.photos_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status_id">{{ trans('cruds.asset.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="location_id">{{ trans('cruds.asset.fields.location') }}</label>
                <select class="form-control select2 {{ $errors->has('location') ? 'is-invalid' : '' }}" name="location_id" id="location_id" required>
                    @foreach($locations as $id => $location)
                        <option value="{{ $id }}" {{ old('location_id') == $id ? 'selected' : '' }}>{{ $location }}</option>
                    @endforeach
                </select>
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.asset.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes') }}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="assigned_to_id">{{ trans('cruds.asset.fields.assigned_to') }}</label>
                <select class="form-control select2 {{ $errors->has('assigned_to') ? 'is-invalid' : '' }}" name="assigned_to_id" id="assigned_to_id">
                    @foreach($assigned_tos as $id => $assigned_to)
                        <option value="{{ $id }}" {{ old('assigned_to_id') == $id ? 'selected' : '' }}>{{ $assigned_to }}</option>
                    @endforeach
                </select>
                @if($errors->has('assigned_to'))
                    <span class="text-danger">{{ $errors->first('assigned_to') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.assigned_to_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="asset_year">{{ trans('cruds.asset.fields.asset_year') }}</label>
                <input class="form-control {{ $errors->has('asset_year') ? 'is-invalid' : '' }}" type="text" name="asset_year" id="asset_year" value="{{ old('asset_year', '') }}" required>
                @if($errors->has('asset_year'))
                    <span class="text-danger">{{ $errors->first('asset_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.asset_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_purchased">{{ trans('cruds.asset.fields.date_purchased') }}</label>
                <input class="form-control date {{ $errors->has('date_purchased') ? 'is-invalid' : '' }}" type="text" name="date_purchased" id="date_purchased" value="{{ old('date_purchased') }}">
                @if($errors->has('date_purchased'))
                    <span class="text-danger">{{ $errors->first('date_purchased') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.date_purchased_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cost">{{ trans('cruds.asset.fields.cost') }}</label>
                <input class="form-control {{ $errors->has('cost') ? 'is-invalid' : '' }}" type="number" name="cost" id="cost" value="{{ old('cost', '') }}" step="0.01">
                @if($errors->has('cost'))
                    <span class="text-danger">{{ $errors->first('cost') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="value">{{ trans('cruds.asset.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="number" name="value" id="value" value="{{ old('value', '') }}" step="0.01">
                @if($errors->has('value'))
                    <span class="text-danger">{{ $errors->first('value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_value">{{ trans('cruds.asset.fields.date_value') }}</label>
                <input class="form-control date {{ $errors->has('date_value') ? 'is-invalid' : '' }}" type="text" name="date_value" id="date_value" value="{{ old('date_value') }}">
                @if($errors->has('date_value'))
                    <span class="text-danger">{{ $errors->first('date_value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.date_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rep_value_date">{{ trans('cruds.asset.fields.rep_value_date') }}</label>
                <input class="form-control date {{ $errors->has('rep_value_date') ? 'is-invalid' : '' }}" type="text" name="rep_value_date" id="rep_value_date" value="{{ old('rep_value_date') }}">
                @if($errors->has('rep_value_date'))
                    <span class="text-danger">{{ $errors->first('rep_value_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.rep_value_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rep_value">{{ trans('cruds.asset.fields.rep_value') }}</label>
                <input class="form-control {{ $errors->has('rep_value') ? 'is-invalid' : '' }}" type="number" name="rep_value" id="rep_value" value="{{ old('rep_value', '') }}" step="0.01">
                @if($errors->has('rep_value'))
                    <span class="text-danger">{{ $errors->first('rep_value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.rep_value_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('admin.assets.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
      uploadedPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotosMap[file.name]
      }
      $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($asset) && $asset->photos)
          var files =
            {!! json_encode($asset->photos) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection