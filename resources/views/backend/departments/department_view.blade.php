@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          {{-- <a href=" {{ route('add.admin') }}" class="btn btn-inverse-primary" >Add Admin</a> --}}

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Department Allocation</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>S1</th>
            <th>Department Name</th>
            <th>Managers</th>
            <th>Casual Employees</th>
                        
          </tr>
        </thead>
        <tbody>
          @foreach($allDepartments as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>           
              <td>{{ $item->departmentName }}</td>
                           
              <td>
                @foreach( $item->managers as $manager )

                        <span class="badge border border-primary text-success">
                            {{ $manager->name }}
                        </span>

                @endforeach
            </td>

            <td>
                @foreach( $item->casualEmployees as $casualEmployee )

                        <span class="badge border border-primary text-warning">
                            {{ $casualEmployee->name }}
                        </span>

                @endforeach
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

