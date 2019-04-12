<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Projects<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('admin.projects.create')}}">Create a Project</a>
                    </li>
                    <li>
                        <a href="{{route('admin.projects.index')}}">All Projects</a>
                    </li>
                    <li>
                        <a href="{{route('admin.comments.index')}}">Project Workspaces</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>


            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Admin Centre<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.roles.index')}}">Roles</a>
                    </li>
                    <li>
                        <a href="{{route('admin.departments.index')}}">Departments</a></a>
                    </li>
                    <li>
                        <a href="{{route('admin.drivers.index')}}">Strategic Drivers</a>
                    </li>
                    <li>
                        <a href="{{route('admin.rags.index')}}">RAG Statuses</a>
                    </li>
                    <li>
                        <a href="{{route('admin.projectmanager.index')}}">Project Managers</a>
                    </li>
                    <li>
                        <a href="{{route('admin.status.index')}}">Project Statuses</a>
                    </li>
                    <li>
                        <a href="#">Users <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{route('admin.users.index')}}">View All</a>
                            </li>
                            <li>
                                <a href="{{route('admin.users.create')}}">Create</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>


    </div>
    <!-- /.sidebar-collapse -->
</div>