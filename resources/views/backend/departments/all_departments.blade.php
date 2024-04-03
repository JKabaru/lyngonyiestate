@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          <a href=" {{ route('add.department') }}" class="btn btn-inverse-primary" >Add Department</a>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">All Departments</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Department Id</th>
            <th>Department Name</th>
            <th>Description</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($departments as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $item->departmentName }}</td>
              <td>{{ $item->description }}</td>
              <td>
                <a href="{{ route('edit.department', $item->department_id)}}" class="btn btn-inverse-warning" >Edit</a>
                <a  href="{{ route('delete.department', $item->department_id)}}" class="btn btn-inverse-danger" id="delete">Delete</a>
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

