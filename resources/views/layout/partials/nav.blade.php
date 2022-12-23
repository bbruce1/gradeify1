<?php error_reporting(0);?>
<!-- Sidebar -->
	<div class="sidebar" id="sidebar">
		<div class="sidebar-inner slimscroll">
			<div id="sidebar-menu" class="sidebar-menu">
				<ul>
					<li class="menu-title"> 
						<span>Main Menu</span>
					</li>

					<li class="submenu {{ Request::is(['home','teacher','admin']) ? 'active' : '' }}">
						<a href="#"><i class="fas fa-user-graduate"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
						<ul>
							@if(Auth::user()->usertype == 2)
								<li><a class="{{ Request::is('admin') ? 'active' : '' }}" href="/admin">Admin Dashboard</a></li>
							@elseif(Auth::user()->usertype == 0)
								<li><a class="{{ Request::is('teacher') ? 'active' : '' }}" href="/teacher">Teacher Dashboard</a></li>
							@elseif(Auth::user()->usertype == 1)
								<li><a class="{{ Request::is('home') ? 'active' : '' }}" href="/home" >Student Dashboard</a></li>
							@endif
						</ul>
					</li>

					<li class="{{ Request::is(['sets','teacher-dashboard','student-dashboard']) ? 'active' : '' }}">
						<a href="/sets"><i class="fas fa-user-graduate"></i> <span>Study Guides</span></span></a>
					</li>
					@if(Auth::user()->usertype == 2)
						<li class="{{ Request::is(['teacherlist','teacherdetails','addteacher', 'editteacher']) ? 'active' : '' }}">
							<a href="/teacherlist"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span></a>
						</li>
					@elseif(Auth::user()->usertype == 0)
						<li class="{{ Request::is(['teacherlist','teacherdetails','addteacher', 'editteacher']) ? 'active' : '' }}">
							<a href="/teacherlist"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span></a>
						</li>
					@endif


					<li class="menu-title"> 
						<span>Management</span>
					</li>

					<li class="{{ Request::is(['holidayedit','holidayadd', 'holidays', 'subjectlist', 'subjectadd', 'subjectedit']) ? 'active' : '' }}">
						<a href="#"><i class="fas fa-book-reader"></i> <span>Your Schedule</span> <span class="menu-arrow"></span></a>
						<ul>
							<li><a class="{{ Request::is('subjectlist') ? 'active' : '' }}" href="/subjectlist">Subject List</a></li>
							<li><a class="{{ Request::is('subjectadd') ? 'active' : '' }}" href="subjectadd">Subject Add</a></li>
							<li class="submenu">
								<a class="{{ Request::is(['holidays', 'hoidayedit', 'holidayadd']) ? 'active' : '' }}" href="javascript:void(0);"> <span>Holidays</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a class="{{ Request::is('holidays') ? 'active' : '' }}"href="holidays"> <span>Holiday List</span></a></li>
									<li><a class="{{ Request::is('holidayadd') ? 'active' : '' }}"href="holidayadd"> <span>Add Holidays</span></a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="{{ Request::is('event','add-events','edit-events') ? 'active' : '' }}"> 
						<a href="/calendar"><i class="fas fa-calendar-day"></i> <span>Calendar</span></a>
					</li>
					<li class="{{ Request::is('exam','add-exam','edit-exam') ? 'active' : '' }}"> 
						<a href="/examlist"><i class="fas fa-clipboard-list"></i> <span>Exam list</span></a>
					</li>

					<li class="menu-title"> 
						<span>Subscription</span>
					</li>
					<li class="submenu {{ Request::is(['premium','basic']) ? 'active' : '' }}">
						<a href="#"><i class="fas fa-dollar-sign"></i> <span> Plans</span> <span class="menu-arrow"></span></a>
						<ul>
							<li><a class="{{ Request::is('premium') ? 'active' : '' }}" href="/premium">Premium</a></li>
							<li><a class="{{ Request::is('basic') ? 'active' : '' }}" href="/basic" >Basic</a></li>
						</ul>
					</li>

					<!-- <li class="menu-title"> 
						<span>Pages</span>
					</li>

					<li class="submenu <?php if($page=="login" || $page=="register" || $page=="forgot-password" || $page=="error-404") { echo 'active'; } ?>">
						<a href="#"><i class="fas fa-shield-alt"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
						<ul>
							<li><a class="<?php if($page=="login") { echo 'active'; } ?>" href="login">Login</a></li>
							<li><a class="<?php if($page=="register") { echo 'active'; } ?>" href="register">Register</a></li>
							<li><a class="<?php if($page=="forgot-password") { echo 'active'; } ?>" href="forgot-password">Forgot Password</a></li>
							<li><a class="<?php if($page=="error-404") { echo 'active'; } ?>" href="error-404">Error Page</a></li>
						</ul>
					</li>
					<li class="{{ Request::is('blankpage') ? 'active' : '' }}"> 
						<a href="blankpage"><i class="fas fa-file"></i> <span>Blank Page</span></a>
					</li>
					<li class="menu-title"> 
						<span>UI Interface</span>
					</li>
					<li class="{{ Request::is('components') ? 'active' : '' }}"> 
						<a href="components"><i class="fas fa-vector-square"></i> <span>Components</span></a>
					</li>
					<li class="submenu <?php if($page=="form-basic-inputs" || $page=="form-input-groups" || $page=="form-horizontal" || $page=="form-vertical" || $page=="form-mask" || $page=="form-validation") { echo 'active'; } ?>">
						<a href="#"><i class="fas fa-columns"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
						<ul>
							<li><a class="<?php if($page=="form-basic-inputs") { echo 'active'; } ?>" href="form-basic-inputs">Basic Inputs </a></li>
							<li><a class="<?php if($page=="form-input-groups") { echo 'active'; } ?>" href="form-input-groups">Input Groups </a></li>
							<li><a class="<?php if($page=="form-horizontal") { echo 'active'; } ?>" href="form-horizontal">Horizontal Form </a></li>
							<li><a class="<?php if($page=="form-vertical") { echo 'active'; } ?>" href="form-vertical"> Vertical Form </a></li>
							<li><a class="<?php if($page=="form-mask") { echo 'active'; } ?>" href="form-mask"> Form Mask </a></li>
							<li><a class="<?php if($page=="form-validation") { echo 'active'; } ?>" href="form-validation"> Form Validation </a></li>
						</ul>
					</li>
					<li class="submenu <?php if($page=="tables-basic" || $page=="data-tables") { echo 'active'; } ?>">
						<a href="#"><i class="fas fa-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
						<ul>
							<li><a class="<?php if($page=="tables-basic") { echo 'active'; } ?>" href="tables-basic">Basic Tables </a></li>
							<li><a class="<?php if($page=="data-tables") { echo 'active'; } ?>" href="data-tables">Data Table </a></li>
						</ul>
					</li>
					<li class="submenu">
						<a href="javascript:void(0);"><i class="fas fa-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
						<ul>
							<li class="submenu">
								<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
									<li class="submenu">
										<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
										<ul>
											<li><a href="javascript:void(0);">Level 3</a></li>
											<li><a href="javascript:void(0);">Level 3</a></li>
										</ul>
									</li>
									<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0);"> <span>Level 1</span></a>
							</li>
						</ul>
					</li> -->
				</ul>
			</div>
		</div>
	</div>
<!-- /Sidebar -->