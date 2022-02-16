<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item {{is_active('home')}}  ">
            <a class="nav-link" href="{{route('admin')}}">
                <i class="material-icons"> dashboard </i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item {{is_active('users')}}   ">
            <a class="nav-link" href="{{route('users.index')}}">
                <i class="material-icons">person</i>
                <p> Users</p>

            </a>
        </li>
        <li class="nav-item {{is_active('categories')}}   ">
            <a class="nav-link" href="{{route('categories.index')}}">
                <i class="material-icons">bubble_chart</i>
                <p> Categories</p>

            </a>
        </li>
        <li class="nav-item {{is_active('skills')}}   ">
            <a class="nav-link" href="{{route('skills.index')}}">
                <i class="material-icons">content_paste</i>
                <p> Skills</p>

            </a>
        </li>
        <li class="nav-item {{is_active('tags')}}   ">
            <a class="nav-link" href="{{route('tags.index')}}">
                <i class="material-icons">turned_in_not</i>
                <p> Tags</p>

            </a>
        </li>
        <li class="nav-item {{is_active('pages')}}   ">
            <a class="nav-link" href="{{route('pages.index')}}">
                <i class="material-icons">turned_in_not</i>
                <p> Pages</p>

            </a>
        </li>
        <li class="nav-item {{is_active('videos')}}   ">
            <a class="nav-link" href="{{route('videos.index')}}">
                <i class="material-icons">video_call</i>
                <p> Videos</p>

            </a>
        </li>
        <li class="nav-item {{is_active('message')}}   ">
            <a class="nav-link" href="{{route('messages.index')}}">
                <i class="material-icons">cloud</i>
                <p> Message</p>

            </a>
        </li>
        <!-- your sidebar here -->
    </ul>
</div>
