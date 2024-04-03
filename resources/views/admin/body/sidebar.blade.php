<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        Lyngonyi<span>Farm</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">Lyngonyi Estate</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon mdi mdi-office-building"></i>
            <span class="link-title">Departments</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="emails">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('all.departments')}}" class="nav-link">All Departments</a>
              </li>
              <li class="nav-item">
                <a href=" {{ route('add.department') }}" class="nav-link">Add Department</a>
              </li>
              <li class="nav-item">
                <a href=" {{ route('view.departments') }}" class="nav-link">View Department Users</a>
              </li>
              
            </ul>
          </div>
        </li>
        
        
        
        </li>
        
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#theemployees" role="button" aria-expanded="false" aria-controls="theemployees">
            <i class="mdi mdi-account-multiple"></i>
            <span class="link-title">Permanent Employees</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="theemployees">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('all.employees')}}" class="nav-link">All Employees</a>
              </li>             
              <li class="nav-item">
                <a href="{{ route('add.employee') }}" class="nav-link">Add Employee</a>
              </li>
              
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#casuals" role="button" aria-expanded="false" aria-controls="casuals">
            <i class="mdi mdi-account-multiple"></i>
            <span class="link-title">Casual Employees</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="casuals">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('all.casual.employees')}}" class="nav-link">All Casuals</a>
              </li>             
              <li class="nav-item">
                <a href="{{ route('add.casual.employee') }}" class="nav-link">Add casual</a>
              </li>

              <li class="nav-item">
                <a href="{{ route('all.casual.payments') }}" class="nav-link">All casual Payments</a>
              </li>
              
            </ul>
          </div>
        </li>
        

        <li class="nav-item nav-category">Role & Permission</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#roleper" role="button" aria-expanded="false" aria-controls="roleper">
            <i class="mdi mdi-badge-account"></i>
            <span class="link-title">Roles & Permissions</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="roleper">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('all.permissions') }}" class="nav-link">All Permissions</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('all.roles') }}" class="nav-link">All Roles</a>
              </li>

              <li class="nav-item">
                <a href="{{ route('add.roles.permission') }}" class="nav-link">Role Permissions</a>
              </li>

              <li class="nav-item">
                <a href="{{ route('all.roles.permission') }}" class="nav-link">All Roles Permissions</a>
              </li>

              
            </ul>
          </div>
        </li>
        
        <li class="nav-item nav-category">Manage Users <li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="admin">
            <i class="mdi mdi-badge-account"></i>
            <span class="link-title">Manage Admin</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="admin">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('all.admin') }}" class="nav-link">All Admin</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('add.admin') }}" class="nav-link">Add Admin</a>
              </li>

            

              
            </ul>
          </div>
        </li>
        
        
        
        
        
        
       
        {{-- <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
          <a href="" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i> 
            <span class="link-title">Documentation</span>
          </a>
        </li> --}}
      </ul>
    </div>
  </nav>