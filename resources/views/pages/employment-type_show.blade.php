@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'accounts'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Employment Types</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12">
      <h5 class="text-center font-weight-bold mb-3">Employment Type Details</h5>
      <div class="mb-3">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" id="name" class="form-control-plaintext" readonly value="{{ $employmentType->name }}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if (collect($accesses)->where('menu_id', 9)->first()->status == 2)
    <div class="row">
      <div class="col-12">
        <form action="{{ route('employment-type.edit', ['employmentType' => $employmentType->id]) }}" class="d-inline-block">
          <button type="submit" class="btn btn-warning mr-2 px-5">Edit</button>
        </form>
        <form action="{{ route('employment-type.destroy', ['employmentType' => $employmentType->id]) }}" method="POST" class="d-inline-block">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger mr-2 px-5" onclick="return confirm('Are you sure you want to delete this employment type?')">Delete</button>
        </form>
      </div>
    </div>
  @endif
</div>
@endsection
