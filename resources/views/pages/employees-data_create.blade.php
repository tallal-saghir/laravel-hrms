@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'data'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
      <h4 class="font-weight-bold">Employees' Data</h4>
      <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <h5 class="text-center font-weight-bold mb-3">Create A New Employee</h5>
      <form action="{{ route('employees-data.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <h6 class="font-weight-bold">Account Information</h6>
          <hr>

          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter name" required>
              </div>
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email" required>
              </div>
              @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter password" required>
              </div>
              @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="password_confirmation">Confirmation Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" placeholder="Enter password again" required>
              </div>
              @error('password_confirmation')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="role_id">Role:</label>
                <select id="role_id" class="form-control @error('role_id') is-invalid @enderror" name="role_id" required>
                  <option value="">Choose...</option>
                  @foreach ($roles as $role)
                  <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected': '' }}>
                    {{ $role->name }}
                  </option>
                  @endforeach
                </select>
              </div>
              @error('role_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="mb-3">
          <h6 class="font-weight-bold">Employee Information</h6>
          <hr>

          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="start_of_contract">Date of Joining:</label>
                <input type="date" name="start_of_contract" id="start_of_contract" class="form-control @error('start_of_contract') is-invalid @enderror" value="{{ old('start_of_contract') }}" placeholder="Enter start of contract date" required>
              </div>
              @error('start_of_contract')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="end_of_contract">Date of Resigning:</label>
                <input type="date" name="end_of_contract" id="end_of_contract" class="form-control @error('end_of_contract') is-invalid @enderror" value="{{ old('end_of_contract') }}" placeholder="Enter end of contract date">
              </div>
              @error('end_of_contract')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="department_id">Department:</label>
                <select id="department_id" class="form-control @error('department_id') is-invalid @enderror" name="department_id" required>
                  <option value="">Choose...</option>
                  @foreach ($departments as $department)
                  <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected': '' }}>
                    {{ $department->name }}
                  </option>
                  @endforeach
                </select>
              </div>
              @error('department_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="position_id">Position:</label>
                <select id="position_id" class="form-control @error('position_id') is-invalid @enderror" name="position_id" required>
                  <option value="">Choose...</option>
                  @foreach ($positions as $position)
                  <option value="{{ $position->id }}" {{ old('position_id') == $position->id ? 'selected': '' }}>
                    {{ $position->name }}
                  </option>
                  @endforeach
                </select>
              </div>
              @error('position_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                  <option selected value="">Choose...</option>
                  <option value="M" {{ old('gender') == "M" ? 'selected': '' }}>Male</option>
                  <option value="F" {{ old('gender') == "F" ? 'selected': '' }}>Female</option>
                </select>
              </div>
              @error('gender')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="date_of_birth">Date Of Birth:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') }}" placeholder="Enter date of birth" required>
              </div>
              @error('date_of_birth')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

          </div>

          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="identity_number">CNIC:</label>
                <input type="text" name="identity_number" id="identity_number" class="form-control @error('identity_number') is-invalid @enderror" value="{{ old('identity_number') }}" placeholder="Enter identity number" required>
              </div>
              @error('identity_number')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="phone">Phone Numbers:</label>

                <div id="phone-container">
                  @php
                  $oldLabels = old('phone_label', ['']);
                  $oldNumbers = old('phone_number', ['']);
                  @endphp

                  @foreach($oldLabels as $index => $label)
                  <div class="input-group mb-2">
                    <input type="text" name="phone_label[]" class="form-control"
                      placeholder="Label (e.g. Personal)"
                      value="{{ $label }}" required>
                    <input type="text" name="phone_number[]" class="form-control"
                      placeholder="Phone Number"
                      value="{{ $oldNumbers[$index] ?? '' }}" required>

                    @if($loop->first)
                    <button type="button" class="btn btn-success add-phone">+</button>
                    @else
                    <button type="button" class="btn btn-danger remove-phone">-</button>
                    @endif
                  </div>
                  @endforeach
                </div>

                @error('phone_number.*')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('phone_label.*')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Enter address" required>
              </div>
              @error('address')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="work_experience_in_years">Work Experience (in years):</label>
                <input type="number" name="work_experience_in_years" id="work_experience_in_years" class="form-control @error('work_experience_in_years') is-invalid @enderror" value="{{ old('work_experience_in_years') }}" placeholder="Enter work experience in years" required>
              </div>
              @error('work_experience_in_years')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

          </div>

          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" name="photo" id="photo" class="form-control-file @error('photo') is-invalid @enderror" required>
              </div>
              @error('photo')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="cv">CV:</label>
                <input type="file" name="cv" id="cv" class="form-control-file @error('cv') is-invalid @enderror">
              </div>
              @error('cv')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="marital_status">Marital Status:</label>
                <select id="marital_status" class="form-control @error('marital_status') is-invalid @enderror" name="marital_status" required>
                  <option value="">Choose...</option>
                  <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Single</option>
                  <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married</option>
                  <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                  <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                </select>
              </div>
              @error('marital_status')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="employment_type_id">Employment Type:</label>
                <select id="employment_type_id"
                  class="form-control @error('employment_type_id') is-invalid @enderror"
                  name="employment_type_id" required>
                  <option value="">Choose...</option>
                  @foreach($employmentTypes as $type)
                  <option value="{{ $type->id }}" {{ old('employment_type_id') == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                  </option>
                  @endforeach
                </select>
                @error('employment_type_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="reporting_to">Reporting To:</label>
                <select id="reporting_to" class="form-control @error('reporting_to') is-invalid @enderror" name="reporting_to">
                  <option value="">Choose...</option>
                  @foreach($employees as $emp)
                  <option value="{{ $emp->id }}" {{ old('reporting_to') == $emp->id ? 'selected' : '' }}>
                    {{ $emp->name }}
                  </option>
                  @endforeach
                </select>
                @error('reporting_to')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

          </div>



        </div>

        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <button type="submit" class="btn btn-primary px-5">Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('phone-container');

    container.addEventListener('click', function(e) {
      if (e.target.classList.contains('add-phone')) {
        let newField = document.createElement('div');
        newField.classList.add('input-group', 'mb-2');
        newField.innerHTML = `
                <input type="text" name="phone_label[]" class="form-control" placeholder="Label (e.g. Emergency)" required>
                <input type="text" name="phone_number[]" class="form-control" placeholder="Phone Number" required>
                <button type="button" class="btn btn-danger remove-phone">-</button>
            `;
        container.appendChild(newField);
      }

      if (e.target.classList.contains('remove-phone')) {
        e.target.closest('.input-group').remove();
      }
    });
  });
</script>