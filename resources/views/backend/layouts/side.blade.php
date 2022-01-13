<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">Navigation</li>

        <li>
            <a href="index.html">
                <i class="mdi mdi-view-dashboard"></i>
                <span> Dashboard </span>
            </a>
        </li>

        <li class="menu-title">Manual Data</li>
        <li>
            <a href="{{ route('backend.clubs.index') }}">
                <i class="mdi mdi-shield"></i>
                <span> Clubs / Teams </span>
            </a>
        </li>
        <li>
            <a href="{{ route('backend.players.index') }}">
                <i class="mdi mdi-star-off"></i>
                <span> Players </span>
            </a>
        </li>

        <li class="menu-title">Accounts</li>


        <li>
            <a href="javascript: void(0);">
                <i class="mdi mdi-shield-account"></i>
                <span> Admins </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level nav" aria-expanded="false">
                <li>
                    <a href="{{ route('backend.admins.index') }}">View</a>
                </li>
                <li>
                    <a href="{{ route('backend.admins.create') }}">Create</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="mdi mdi-account-multiple-outline"></i>
                <span> Users </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level nav" aria-expanded="false">
                <li>
                    <a href="{{ route('backend.users.index') }}">View</a>
                </li>
            </ul>
        </li>
    </ul>

</div>
