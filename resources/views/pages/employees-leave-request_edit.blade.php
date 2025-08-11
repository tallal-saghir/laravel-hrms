@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'leave-request'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
      <h4 class="font-weight-bold">Employees' Leave Requests</h4>
      <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <h5 class="text-center font-weight-bold mb-3">Create A New Employee Leave Request</h5>
      <form action="{{ route('employees-leave-request.update', ['employeeLeaveRequest' => $employeeLeaveRequest->id ]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="employee_id" value="{{ auth()->user()->employee->id }}">
        <input type="hidden" name="type" value="edit">
        <div class="mb-3">
          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="from">From:</label>
                <input type="date" name="from" id="from" class="form-control @error('from') is-invalid @enderror" value="{{ $employeeLeaveRequest->from }}" placeholder="Enter start of contract date" required>
              </div>
              @error('from')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="to">To:</label>
                <input type="date" name="to" id="to" class="form-control @error('to') is-invalid @enderror" value="{{ $employeeLeaveRequest->to }}" placeholder="Enter end of contract date" required>
              </div>
              @error('to')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="leave_type">Leave Type:</label>
                <select name="leave_type" id="leave_type" class="form-control @error('leave_type') is-invalid @enderror" required>
                  <option value="">Select Leave Type</option>
                  <option value="PTO" {{ $employeeLeaveRequest->leave_type == 'PTO' ? 'selected' : '' }}>PTO</option>
                  <option value="Sick" {{ $employeeLeaveRequest->leave_type == 'Sick' ? 'selected' : '' }}>Sick</option>
                  <option value="Maternity" {{ $employeeLeaveRequest->leave_type == 'Maternity' ? 'selected' : '' }}>Maternity</option>
                  <option value="Paternity" {{ $employeeLeaveRequest->leave_type == 'Paternity' ? 'selected' : '' }}>Paternity</option>
                  <option value="Marriage" {{ $employeeLeaveRequest->leave_type == 'Marriage' ? 'selected' : '' }}>Marriage</option>
                  <option value="Death" {{ $employeeLeaveRequest->leave_type == 'Death' ? 'selected' : '' }}>Death</option>
                  <option value="Urgent-Work" {{ $employeeLeaveRequest->leave_type == 'Urgent-Work' ? 'selected' : '' }}>Urgent Work</option>
                  <option value="Other" {{ $employeeLeaveRequest->leave_type == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
              </div>
              @error('leave_type')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>


          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="message">Reason:</label>
                <input type="text" name="message" id="message" class="form-control @error('message') is-invalid @enderror" value="{{ $employeeLeaveRequest->message }}" placeholder="Enter message" required>
              </div>
              @error('message')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
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