@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          <a href="{{ route('add.casual.employee') }}" class="btn btn-inverse-primary" >Add Casual</a>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">All Casuals</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Casual Id</th>
            <th>Casual Name</th>
            <th>Department Name</th>
            <th>Hire Date</th>
            {{-- <th>Date Of Birth</th> --}}
            {{-- <th>Gender</th> --}}
            <th>Status</th>
            <th>contact Information</th>
            {{-- <th>Email</th> --}}
            {{-- <th>Address</th> --}}
            {{-- <th>Description</th> --}}
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($casualemployees as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $item->name }}</td>
              <td>
                @foreach( $item->departments as $department )

                        <span class="badge badge-pill bg-danger">
                            {{ $department->departmentName }}
                        </span>

                @endforeach
            </td>          
              <td>{{ $item->hireDate }}</td>
              {{-- <td>{{ $item->dateOfBirth }}</td> --}}
              {{-- <td>{{ $item->gender }}</td> --}}
              <td>{{ $item->status }}</td>
              <td>{{ $item->contactInformation }}</td>
              {{-- <td>{{ $item->email }}</td> --}}
              {{-- <td>{{ $item->address }}</td> --}}
              {{-- <td>{{ $item->description }}</td> --}}
              <td>
                <a href="{{ route('edit.casual.employee', $item->casual_workers_id)}}" class="btn btn-inverse-warning" >Edit</a>
                <a href="{{ route('add.casual.payment', $item->casual_workers_id)}}" class="btn btn-inverse-primary" >Payment</a>

                {{-- <a href="{{ route('delete.employee', $item->casual_workers_id)}}" class="btn btn-inverse-danger" id="delete">Delete</a> --}}
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

