<div class="deznav">
	<div class="deznav-scroll">
		<ul class="metismenu" id="menu">
			<li class="nav-label first">Main Menu</li>
			<li><a class="has-arrow" href="{{route('admin.dashboard')}}" aria-expanded="false">
					<i class="la la-home"></i>
					<span class="nav-text">Dashboard</span>
				</a>
			</li>
			<li><a class="ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="la la-calendar"></i>
					<span class="nav-text">Event Management</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{route('program.All')}}">All Program & Othes</a></li>
					<li><a href="{{route('program.Add')}}">Add Program</a></li>
					
				</ul>
			</li>
			<li><a class="has-arrow" href="{{route('teacher.list')}}" aria-expanded="false">
					<i class="la la-user"></i>
					<span class="nav-text">Teacher</span>
				</a>
			
			</li>
			<li><a class="has-arrow" href="{{('student.list')}}" aria-expanded="false">
					<i class="la la-users"></i>
					<span class="nav-text">Students</span>
				</a>
	
			</li>
			<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
					<i class="la la-graduation-cap"></i>
					<span class="nav-text">Courses</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{route('course.All')}}">All Courses</a></li>
					<li><a href="{{route('course.Add')}}">Add Courses</a></li>
					{{-- <li><a href="edit-courses.html">Edit Courses</a></li>
					<li><a href="about-courses.html">About Courses</a></li> --}}
				</ul>
			</li>
		
			<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
					<i class="la la-building"></i>
					<span class="nav-text">Departments</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{route('dept.All')}}">All Departments</a></li>
					<li><a href="{{route('dept.Add')}}">Add Departments</a></li>
					
				</ul>
			</li>
			<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
					<i class="la la-users"></i>
					<span class="nav-text">Staff</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="all-staff.html">All Staff</a></li>
					<li><a href="add-staff.html">Add Staff</a></li>
					<li><a href="edit-staff.html">Edit Staff</a></li>
					<li><a href="staff-profile.html">Staff Profile</a></li>
				</ul>
			</li>
			<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
					<i class="la la-gift"></i>
					<span class="nav-text">Holiday</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="all-holiday.html">All Holiday</a></li>
					<li><a href="add-holiday.html">Add Holiday</a></li>
					<li><a href="edit-holiday.html">Edit Holiday</a></li>
					<li><a href="holiday-calendar.html">Holiday Calendar</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
</div>