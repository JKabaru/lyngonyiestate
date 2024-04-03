@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style>
    .statusLoad {
        display: block;
        margin-top: 5px;
        font-weight: bold;
    }

    .active {
        color: green;
    }

    .inactive {
        color: red;
    }

    .on-leave {
        color: orange;
    }
</style>


<div class="page-content">

        
        <div class="row profile-body">
          
         
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Admin</h6>
                            <form method="POST" action="{{ route('update.admin', $user->employeeId)}}" class="forms_sample">
                                @csrf


                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Admin Name : </label>
                                            <input type="text" name="name1" class="form-control @error('name1') is-invalid @enderror"
                                            value="{{ $user->name }}" >
                                            @error('name1')
                                                <span class="text_danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Department :</label>

                                            <select class="form-select" name="departmentName" id="roleSelect">
                                                <option disabled>Select your Department</option>
                                                @php
                                                    $selectedDepartmentName = $departments->isNotEmpty() ? $departments->first()->departmentName : null;
                                                @endphp
                                                @foreach($allDepartments as $department)
                                                    <option value="{{ $department->departmentName }}"{{ $department->departmentName === $selectedDepartmentName ? 'selected' : '' }}>
                                                        {{ $department->departmentName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                                                                     
                                            
                                            
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Email address:</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                            value="{{ $user->email }}">
                                            @error('email')
                                                <span class="text_danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Contact Information :</label>
                                            <input type="text" name="contactInformation" class="form-control @error('contactInformation') is-invalid @enderror"
                                            value="{{ $user->contactInformation }}" >
                                            @error('contactInformation')
                                                <span class="text_danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Address :</label>
                                            <input type="text" name="address" class="form-control"
                                            value="{{ $user->address }}">
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                               
                                
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <select  name="roles" class="form-select">
                                                <option selected="" disabled=""  >Select Role</option>

                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }} > {{ $role->name }} </option>
                                                @endforeach

                                                @error('roles')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    
                                                                        
                                </div><!-- Row -->
                               
                    
                                <button type="submit" class="btn btn-primary submit">Save Changes</button>

                            </form>
                    </div>
                </div>
              
            </div>
          </div>
          <!-- middle wrapper end -->
         
        </div>

			</div>



@endsection