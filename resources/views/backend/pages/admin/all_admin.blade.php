@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          <a href=" {{ route('add.admin') }}" class="btn btn-inverse-primary" >Add Admin</a>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">All Admin</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>S1</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Role</th>
            <th>Department</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($alladmin as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td><img class="wd-100 rounded-circle" src="{{ (!empty($item->photo)) ?  url('upload/admin_images/'.$item->photo) 
                : url('upload/no_image.jpg') }}" alt="profile">

              </td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->contactInformation }}</td>
              
              <td>
                @foreach( $item->roles as $role )

                        <span class="badge badge-pill bg-danger">
                            {{ $role->name }}
                        </span>

                @endforeach
            </td>

            <td>
                @foreach( $item->departments as $department )

                        <span class="badge badge-pill bg-danger">
                            {{ $department->departmentName }}
                        </span>

                @endforeach
            </td>

              <td>
                <a href="{{ route('edit.admin', $item->employeeId)}}" class="btn btn-inverse-warning" >Edit</a>
                {{-- <a href="{{ route('delete.role', $item->id)}}" class="btn btn-inverse-danger" id="delete">Delete</a> --}}
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

