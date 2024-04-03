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
                        <h6 class="card-title">Add Employee</h6>
                            <form method="POST" action="{{ route('store.employee')}}" class="forms_sample" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Name : </label>
                                            <input type="text" name="name1" class="form-control @error('name1') is-invalid @enderror" >
                                            @error('name1')
                                                <span class="text_danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">idNumber : </label>
                                            <input type="text" name="idNumber" class="form-control @error('idNumber') is-invalid @enderror" >
                                            @error('idNumber')
                                                <span class="text_danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">AccountNo : </label>
                                            <input type="text" name="accountNo" class="form-control @error('accountNo') is-invalid @enderror" >
                                            @error('accountNo')
                                                <span class="text_danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Status : </label>
                                            <select name="status" class="form-select">
                                                <option value="active" >Active</option>
                                                <option value="inactive" >Inactive</option>
                                                <option value="onLeave" >On Leave</option>
                                            </select>
                                        </div>
                                        
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Hire Date : </label>
                                            {{-- <input type="text" name="dateOfBirth" class="form-control" value="{{ $profileData->dateOfBirth }}"> --}}
                                            <input type="text" id="hireDate" name="hireDate" class="form-control bg-transparent border-primary flatpickr-input " placeholder="Select date" data-input="" readonly="readonly">

                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Date of birth : </label>
                                            {{-- <input type="text" name="dateOfBirth" class="form-control" value="{{ $profileData->dateOfBirth }}"> --}}
                                            <input type="text" id="dateOfBirth" name="dateOfBirth" class="form-control bg-transparent border-primary flatpickr-input " placeholder="Select date" data-input="" readonly="readonly">

                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->
                                
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Gender : </label>
                                        <div>
                                            
                                            

                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender" id="gender1" value="male">
                                                <label class="form-check-label" for="gender1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender" id="gender2" value="female">
                                                <label class="form-check-label" for="gender2">
                                                    Female
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender" id="gender3" value="other">
                                                <label class="form-check-label" for="gender3">
                                                    Other
                                                </label>
                                            </div>
                                            
                                            
                                        </div>
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->



                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Role : </label>
                                        <div>
                                            
                                            

                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="role" id="role1" value="admin">
                                                <label class="form-check-label" for="role1">
                                                    Admin
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="role" id="role2" value="user">
                                                <label class="form-check-label" for="role2">
                                                    User
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="role" id="role3" value="other">
                                                <label class="form-check-label" for="role3">
                                                    Other
                                                </label>
                                            </div>
                                            
                                            
                                        </div>
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                {{-- <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Department :</label>

                                            <select class="form-select" name="departmentName" id="roleSelect">
                                                <option disabled>Select your Department</option>
                                                @php
                                                    $selectedDepartmentName = $departments->isNotEmpty() ? $departments->first()->departmentName : null;
                                                @endphp
                                                @foreach($allDepartments as $department)
                                                    <option {{ $department->departmentName === $selectedDepartmentName ? 'selected' : '' }}>
                                                        {{ $department->departmentName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                                                                     
                                            
                                            
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row --> --}}


                                {{-- <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Role :</label>

                                            
                                            
                                            <select class="form-select" name="roleName" id="roleSelect">
                                                <option disabled>Select your role</option>
                                                @php
                                                    $selectedRoleName = $roles->isNotEmpty() ? $roles->first()->roleName : null;
                                                @endphp
                                                @foreach($allRoles as $role)
                                                    <option{{ $role->roleName === $selectedRoleName ? 'selected' : '' }}>
                                                        {{ $role->roleName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            
                                            
                                       
                                            
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row --> --}}

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Email address:</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" >
                                            @error('email')
                                                <span class="text_danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Address :</label>
                                            <input type="text" name="address" class="form-control">
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Contact Information :</label>
                                            <input type="text" name="contactInformation" class="form-control @error('contactInformation') is-invalid @enderror" >
                                            @error('contactInformation')
                                                <span class="text_danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                {{-- <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Photo : </label>
                                            <input class="form-control" name="photo" type="file" id="image">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"></label>
                                            <img id="showImage" class="wd-80 rounded-circle" src="{{ url('upload/no_image.jpg') }}" alt="profile">                                    </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->
                                --}}
                    
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


{{-- for the date  --}}
<script>
    // Initialize flatpickr without inline mode
    flatpickr('#dateOfBirth', {
        dateFormat: 'Y-m-d', // Set the date format
        defaultDate: new Date(), // Set the default date
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
        defaultDate: new Date(), // Set the default date
        onChange: function(selectedDates, dateStr, instance) {
            // Update the input field value with the selected date
            instance.element.value = dateStr;
        }
    });
</script>

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

@endsection