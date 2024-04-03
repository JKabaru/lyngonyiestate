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
                    {{ $profileData->role }}
                    
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
                        <h6 class="card-title">Admin Confirm Password</h6>
                            <form method="POST" action="{{ route('admin.update.password')}}" enctype="multipart/form-data" class="forms_sample">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Old Password : </label>
                                            <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id= "old_password">
                                            @error('old_password')
                                                <span class="text_danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                    
                                                                        
                                </div><!-- Row -->
                               
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">New Password : </label>
                                            <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id= "new_password">
                                            @error('new_password')
                                                <span class="text_danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                    
                                                                        
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Confirm New Password : </label>
                                            <input type="password" name="new_password_confirmation" class="form-control" id= "new_password_confirmation">
                                            
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