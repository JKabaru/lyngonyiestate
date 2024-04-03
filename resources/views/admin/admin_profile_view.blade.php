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
          <!-- left wrapper start -->
          <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                 

                  <div>
                    <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ?  url('upload/admin_images/'.$profileData->photo) 
                    : url('upload/no_image.jpg') }}" alt="profile">
                    <div class="profile-info">
                        <h2>{{ $profileData->name }}</h2>
                        <span class="statusLoad {{ $profileData->status === 'active' ? 'active' : ($profileData->status === 'inactive' ? 'inactive' : 'on-leave') }}">
                            {{ ucfirst($profileData->status) }}
                        </span>
                        
                    </div>
                    
                  </div>

                  
                </div>
                
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                  <p class="text-muted">{{ $profileData->hireDate}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">IdNumber :</label>
                  <p class="text-muted">{{ $profileData->idNumber}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">AccountNo:</label>
                  <p class="text-muted">{{ $profileData->accountNo}}</p>
                </div>
                <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Department:</label>
                    <p class="text-muted">
                        @php
                            // Retrieve the departments associated with the profile data
                            $departments = $profileData->departments;

                            // If there are departments associated with the profile data
                            if ($departments->isNotEmpty()) {
                                // Assuming the user is associated with only one department, you can use first()
                                $departmentName = $departments->first()->departmentName;
                                
                                // Output the departmentName
                                echo "$departmentName";
                            } else {
                                // Output a message indicating that the user has no department
                                echo "User has no department";
                             }
                        @endphp
                        

                    </p>
                  </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Role :</label>
                  <p class="text-muted">

                    <p class="text-muted">{{ $profileData->role}}</p>
                </p>
                </div>
                
                <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Address :</label>
                    <p class="text-muted">{{ $profileData->address }}
                    </p>
                </div>
                <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Gender :</label>
                    <p class="text-muted">{{ $profileData->gender}}</p>
                </div>
                <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Contact information :</label>
                    <p class="text-muted">{{ $profileData->contactInformation}}</p>
                </div>
                <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Email  :</label>
                    <p class="text-muted">{{ $profileData->email}}</p>
                </div>
                {{-- <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Emergency Contact :</label>
                    <p class="text-muted">{{ $profileData->department->name }}
                    </p>
                </div> --}}
                
              </div>
            </div>
          </div>
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Update Admin Profile</h6>
                            <form method="POST" action="{{ route('admin.profile.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Name : </label>
                                            <input type="text" name="name" class="form-control" value="{{ $profileData->name }}">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">idNumber : </label>
                                            <input type="text" name="idNumber" class="form-control" value="{{ $profileData->idNumber }}">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Status : </label>
                                            <input type="text" name="status" class="form-control" value="{{ $profileData->status }}">
                                        </div>
                                    </div><!-- Col -->

                                    
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Hire Date : </label>
                                            {{-- <input type="text" name="dateOfBirth" class="form-control" value="{{ $profileData->dateOfBirth }}"> --}}
                                            <input type="text" id="hireDate" name="hireDate" class="form-control bg-transparent border-primary flatpickr-input " placeholder="Select date" data-input="" readonly="readonly">

                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Date of birth : </label>
                                            {{-- <input type="text" name="dateOfBirth" class="form-control" value="{{ $profileData->dateOfBirth }}"> --}}
                                            <input type="text" id="dateOfBirth" name="dateOfBirth" class="form-control bg-transparent border-primary flatpickr-input " placeholder="Select date" data-input="" readonly="readonly">

                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">

                                        {{-- <div class="mb-3">
                                            <label class="form-label">Gender : </label>
                                            <input type="text" name="gender" class="form-control" value="{{  $profileData->gender }}">
                                        </div> --}}
                                        <label class="form-label">Gender : </label>
                                        <div>
                                            
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender" id="gender1" value="male" {{ $profileData->gender === 'male' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender" id="gender2" value="female" {{ $profileData->gender === 'female' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender2">
                                                    Female
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender" id="gender3" value="other" {{ $profileData->gender === 'other' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender3">
                                                    Other
                                                </label>
                                            </div>
                                        </div>
                                        


                                    </div>
                                    
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">AccountNo : </label>
                                            <input type="text" name="accountNo" class="form-control" value="{{  $profileData->accountNo }}">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Department :</label>

                                            <select class="form-select" name="departmentName" id="roleSelect">
                                                <option disabled>Select your Department</option>
                                                @php
                                                    $selectedDepartmentName = $departments->isNotEmpty() ? $departments->first()->departmentName : null;
                                                @endphp
                                                @foreach($allDepartments as $department)
                                                    <option value="{{ $department->departmentName }}" {{ $department->departmentName === $selectedDepartmentName ? 'selected' : '' }}>
                                                        {{ $department->departmentName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                                                                     
                                            
                                            
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Role :</label>

                                            
                                            
                                            <div>
                                            
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="roleName" id="role1" value="admin" {{ $profileData->role === 'admin' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="role1">
                                                        Admin
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="roleName" id="role2" value="user" {{ $profileData->role === 'user' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="role2">
                                                        User
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="roleName" id="role3" value="other" {{ $profileData->role === 'other' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="role3">
                                                        Other
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            
                                       
                                            
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Email address:</label>
                                            <input type="email" name="email" class="form-control" value="{{  $profileData->email }}">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Address :</label>
                                            <input type="text" name="address" class="form-control" value="{{  $profileData->address  }}">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Contact Information :</label>
                                            <input type="text" name="contactInformation" class="form-control" value="{{  $profileData->contactInformation  }}">
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                                
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Photo : </label>
                                        <input class="form-control" name="photo" type="file" id="image"  value="{{  $profileData->photo }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"></label>
                                        <img id="showImage" class="wd-80 rounded-circle" src="{{ (!empty($profileData->photo)) ?  url('upload/admin_images/'.$profileData->photo) 
                                        : url('upload/no_image.jpg') }}" alt="profile">                                    </div>
                                    
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

            {{-- For the image  --}}
<script type="text/javascript"> 
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

{{-- for the date  --}}
<script>
    // Initialize flatpickr without inline mode
    flatpickr('#dateOfBirth', {
        dateFormat: 'Y-m-d', // Set the date format
        defaultDate: "{{ $profileData->dateOfBirth }}", // Set the default date
        onChange: function(selectedDates, dateStr, instance) {
            // Update the input field value with the selected date
            instance.element.value = dateStr;
        }
    });
</script>
{{-- for the Hire date  --}}
<script>
    // Initialize flatpickr without inline mode
    flatpickr('#hireDate', {
        dateFormat: 'Y-m-d', // Set the date format
        defaultDate: "{{ $profileData->hireDate }}", // Set the default date
        onChange: function(selectedDates, dateStr, instance) {
            // Update the input field value with the selected date
            instance.element.value = dateStr;
        }
    });
</script>

@endsection