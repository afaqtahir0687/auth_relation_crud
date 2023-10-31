<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" style="background: blueviolet;" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Relation<sup>sms</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->


  <li class="nav-item" style="font-weight: bold; font-style: italic;">
    <a class="nav-link" href="{{ url('/') }}">
      <i class="fas fa-fw fa-graduation-cap" style="color:black"></i>
      <span>Students</span>
    </a>
  </li>

  <li class="nav-item" style="font-weight: bold; font-style: italic;">
    <a class="nav-link" href="{{ url('teachers') }}">
      <i class="fas fa-user-graduate" style="color:black"></i>
      <span>Teachers</span>
    </a>
  </li>
  
  
    <li class="nav-item" style="font-weight: bold; font-style: italic;">
      <a class="nav-link" href="{{ url('classes') }}">
        <i class="fas fa-chalkboard-teacher" style="color:black"></i>
        <span>Classes</span>
      </a>
    </li>
  
    <li class="nav-item" style="font-weight: bold; font-style: italic;">
      <a class="nav-link" href="{{ url('attendance') }}">
        <i class="far fa-clock" style="color: black;"></i>
        <span>Attendance</span>
      </a>
    </li>
  
    <li class="nav-item" style="font-weight: bold; font-style: italic;">
      <a class="nav-link" href="{{ url('subject') }}">
        <i class="fas fa-book" style="color: black;"></i> 
        <span>Subjects</span>
      </a>
    </li>

  
    <li class="nav-item" style="font-weight: bold; font-style: italic;">
      <a class="nav-link" href="{{ url('exams') }}">
        <i class="fas fa-pencil-alt" style="color: black;"></i>
        <span>Exams</span>
      </a>
    </li>


    <li class="nav-item" style="font-weight: bold; font-style: italic;">
      <a class="nav-link" href="{{ url('results') }}">
        <i class="fas fa-chart-bar" style="color: black;"></i>
        <span>Results</span>
      </a>
    </li>
  

    <li class="nav-item" style="font-weight: bold; font-style: italic;">
      <a class="nav-link" href="{{ url('fees') }}">
        <i class="fas fa-dollar-sign" style="color: black;"></i>
        <span>Fees</span>
      </a>
    </li>
  
  

    <li class="nav-item" style="font-weight: bold; font-style: italic;">
      <a class="nav-link" href="{{ url('parents') }}">
        <i class="fas fa-heart" style="color: black;"></i>
        <span>Parents</span>
      </a>
    </li>

    <li class="nav-item" style="font-weight: bold; font-style: italic;">
      <a class="nav-link" href="{{ url('courses') }}">
        <i class="fas fa-graduation-cap" style="color: black;"></i> 
        <span>Courses</span>
      </a>
    </li>
  
    <li class="nav-item" style="font-weight: bold; font-style: italic;">
      <a class="nav-link" href="{{ url('assignments') }}">
        <i class="fas fa-tasks" style="color: black;"></i>
        <span>Assignments</span>
      </a>
    </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>


</ul>