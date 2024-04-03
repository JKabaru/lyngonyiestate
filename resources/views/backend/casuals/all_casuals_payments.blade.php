@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          {{-- <a href="{{ route('add.casual.payment') }}" class="btn btn-inverse-primary" >Add Casual</a> --}}

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">All Casual Payments </h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th> SI </th>
            <th>Casual Name </th>
            <th>Department Name </th>
            <th>Work Date </th>
            <th>Amount </th>
            <th>Payment status </th>
            <th>Payment Date </th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($casualpayments as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
               
                            {{ $item->casualWorker->name }}
                       
              </td>  
              <td>{{ $item->department->departmentName }}</td>
              <td>{{ $item->date }}</td>
              <td>{{ $item->amount }}</td>
              <td>{{ $item->payment_status }}</td>
              <td>{{ $item->payment_date }}</td>
              
              <td>
                @php
                    $id = $item->id;
                    $casual_workers_id = $item->casualWorker->casual_workers_id;
                    $department_id = $item->department->department_id;
                @endphp
                <a href="{{ route('edit.casual.payment', [
                  'id' => $id,
                  'casual_workers_id' => $casual_workers_id,
                  'department_id' => $department_id
                ]) }}" class="btn btn-inverse-warning">Edit</a>
                              
                    {{-- <a href="{{ route('add.casual.payment', $item->casual_workers_id)}}" class="btn btn-inverse-primary" >Payment</a> --}}

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

