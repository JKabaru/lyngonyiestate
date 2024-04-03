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

<style type="text/css">

/* for making them capital */
    .form-check-label{
        text-transform: capitalize;
    }
</style>



<div class="page-content">

        
        <div class="row profile-body">
          
         
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Roles in Permission</h6>
                            <form method="POST" action="{{ route('admin.roles.update', $role->id )}}" class="forms_sample">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            {{-- <label class="form-label">Role Name : </label> --}}
                                            <h3>{{ $role->name }}</h3>
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row -->

                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefaultmain">
                                                          <label class="form-check-label" for="checkDefault">
                                                              All Permissions
                                                          </label>
                                </div>

                                <hr>

                                @foreach( $permission_groups as $group)

                               <div class="row">
                                    <div class="col-5">

                                    @php
                                        $permissions = App\Models\User::getPermissionByGroupName(
                                            $group->group_name
                                        )
                                    @endphp
                                        
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="checkDefault"
                                                {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="checkDefault">
                                                                        {{ $group->group_name}}
                                                                    </label>
                                            </div>

                                    </div>

                                    <div class="col-7">
                                        
                                       
                                        
                                        @foreach ($permissions as $permission )

                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="checkDefault{{ $permission->id }}" name="permission[]"
                                            value="{{ $permission->id }}"
                                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : ''}}>
                                                                <label class="form-check-label" for="checkDefault{{ $permission->id }}">
                                                                    {{ $permission->name }}
                                                                </label>
                                        </div>

                                        @endforeach
                                        <br>

                                    </div>
                               </div> 
                               {{-- Endrow --}}
                               
                              @endforeach


                                <button type="submit" class="btn btn-primary submit">Save Changes</button>

                            </form>
                    </div>
                </div>
              
            </div>
          </div>
          <!-- middle wrapper end -->
         
        </div>

			</div>



<script type="text/javascript">

    $('#checkDefaultmain').click(function(){

        if ($(this).is(':checked'))
        {
            $('input[type = checkbox]').prop('checked', true);
        }else
        {
            $('input[type = checkbox]').prop('checked', false);
        }
    });


</script>

@endsection