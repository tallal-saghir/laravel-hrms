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
      <h5 class="text-center font-weight-bold mb-3">Editing Employment Type</h5>
      <form action="{{ route('employment-type.update', ['employmentType' => $employmentType->id ]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="name">Employment Type Name:</label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       class="form-control @error('name') is-invalid @enderror" 
                       value="{{ old('name', $employmentType->name) }}" 
                       placeholder="Enter employment type name" 
                       required>
              </div>
              @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <button type="submit" class="btn btn-primary px-5">Save</button>
              <a href="{{ route('employment-type') }}" class="btn btn-secondary px-5">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
</div>
@endsection
