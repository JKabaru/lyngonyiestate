@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          <a href="{{ route('add.employee') }}" class="btn btn-inverse-primary" >Add Employee</a>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">All Employees</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Employee Id</th>
            <th>Employee Name</th>
            <th>Employee idNumber</th>
            <th>Employee accountNo</th>
            <th> Role </th>
            <th>Date Of Birth</th>
            <th>Gender</th>
            <th>Status</th>
            <th>contact Information</th>
            <th>Email</th>
            <th>Address</th>
            <th>Hire Date</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($employees as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->idNumber }}</td>
              <td>{{ $item->accountNo }}</td>
              <td>{{ $item->role }}</td>
              <td>{{ $item->dateOfBirth }}</td>
              <td>{{ $item->gender }}</td>
              <td>{{ $item->status }}</td>
              <td>{{ $item->contactInformation }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->address }}</td>
              <td>{{ $item->hireDate }}</td>
              <td>
                <a href="{{ route('edit.employee', $item->employeeId)}}" class="btn btn-inverse-warning" >Edit</a>
                {{-- <a href="{{ route('delete.employee', $item->employeeId)}}" class="btn btn-inverse-danger" id="delete">Delete</a> --}}
              </td>
              
            </tr>
          @endforeach
    
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div>


@endsection

