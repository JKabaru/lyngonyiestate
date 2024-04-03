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
                        <h6 class="card-title">Edit Permission</h6>
                            <form method="POST" action="{{ route('update.permission')}}" class="forms_sample">
                                @csrf

                                {{-- the id is hidden --}}
                                <input type="hidden" name="id" value="{{ $permissions->id}}"> 

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Permission Name : </label>
                                            <input type="text" name="name1" value="{{ $permissions->name }}" class="form-control  @error('name1') is-invalid @enderror" >
                                            @error('name1')
                                                <span class="text_danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Group Name : </label>
                                            <select  name="group_name" class="form-select">
                                                <option selected="" disabled=""  >Select Group</option>
                                                <option value="departments" {{ $permissions->group_name == 'departments' ?
                                                'selected': '' }} >Departments</option>
                                                <option value="permanentEmployees" {{ $permissions->group_name == 'permanentEmployees' ?
                                                    'selected': '' }} >Permanent Employees</option>
                                                <option value="casualEmployees" {{ $permissions->group_name == 'casualEmployees' ?
                                                    'selected': '' }}> Casual Employees</option>
                                                <option value="rolesPermission" {{ $permissions->group_name == 'rolesPermission' ?
                                                    'selected': '' }}> Roles & Permissions</option>

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