<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" href="{{ route('admin.dashboard') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">dashboard</span>
        <span class="sidebar-menu-text">Dashboard</span>
    </a>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" href="">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">class</span>
        <span class="sidebar-menu-text">Classrooms</span>
    </a>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" data-toggle="collapse" href="#course_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">library_books</span>
        Course
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="course_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{ route('admin.course.categories.index') }}">
                <span class="sidebar-menu-text">Manage Categories</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{ route('admin.courses.index') }}">
                <span class="sidebar-menu-text">Manage Courses</span>
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#student_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">school</span>
        Users
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="student_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="">
                <span class="sidebar-menu-text">Enroll Users</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="">
                <span class="sidebar-menu-text">Manage Students</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="">
                <span class="sidebar-menu-text">Manage Instructors</span>
            </a>
        </li>
    </ul>
</li>
