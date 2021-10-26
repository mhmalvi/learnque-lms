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
        Student
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="student_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="">
                <span class="sidebar-menu-text">Enroll Student</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="">
                <span class="sidebar-menu-text">Manage Students</span>
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#instructor_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
        Instructor
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="instructor_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="">
                <span class="sidebar-menu-text">Add New Instructor</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="">
                <span class="sidebar-menu-text">Manage Instructors</span>
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" data-toggle="collapse" href="#productivity_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">access_time</span>
        Productivity
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="productivity_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="projects.html">
                <span class="sidebar-menu-text">Projects</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="tasks-board.html">
                <span class="sidebar-menu-text">Tasks Board</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="tasks-list.html">
                <span class="sidebar-menu-text">Tasks List</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="kanban.html">
                <span class="sidebar-menu-text">Kanban</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="task-details.html">
                <span class="sidebar-menu-text">Task Details</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="team-members.html">
                <span class="sidebar-menu-text">Team Members</span>
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" data-toggle="collapse" href="#ecommerce_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">shopping_cart</span>
        eCommerce
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="ecommerce_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="ecommerce.html">
                <span class="sidebar-menu-text">Shop Dashboard</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="edit-product.html">
                <span class="sidebar-menu-text">Edit Product</span>
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" data-toggle="collapse" href="#messaging_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">message</span>
        Messaging
        <span class="sidebar-menu-badge badge badge-accent badge-notifications ml-auto">2</span>
        <span class="sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="messaging_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="messages.html">
                <span class="sidebar-menu-text">Messages</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="email.html">
                <span class="sidebar-menu-text">Email</span>
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" data-toggle="collapse" href="#cms_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">content_copy</span>
        CMS
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="cms_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="cms-dashboard.html">
                <span class="sidebar-menu-text">CMS Dashboard</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="posts.html">
                <span class="sidebar-menu-text">Posts</span>
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" data-toggle="collapse" href="#community_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">people_outline</span>
        Community
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="community_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="teachers.html">

                <span class="sidebar-menu-text">Browse Teachers</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-profile.html">

                <span class="sidebar-menu-text">Student Profile</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="teacher-profile.html">

                <span class="sidebar-menu-text">Teacher Profile</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="blog.html">

                <span class="sidebar-menu-text">Blog</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="blog-post.html">

                <span class="sidebar-menu-text">Blog Post</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="faq.html">
                <span class="sidebar-menu-text">FAQ</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="help-center.html">
                <!--  -->
                <span class="sidebar-menu-text">Help Center</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="discussions.html">
                <span class="sidebar-menu-text">Discussions</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="discussion.html">
                <span class="sidebar-menu-text">Discussion Details</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="discussions-ask.html">
                <span class="sidebar-menu-text">Ask Question</span>
            </a>
        </li>
    </ul>
</li>
