<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{auth()->user()->getAvatar()}}" alt="">{{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a href="/profile" class="dropdown-item" href="javascript:;"> Profile</a>
                        <a class="dropdown-item" href="javascript:;">Help</a>
                        <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                    @php
                    $data = \App\Models\Task::where('user_id',auth()->user()->id)->count()
                    @endphp
                    @php
                    $task = \App\Models\Task::where('user_id',auth()->user()->id)->latest()->get()
                    @endphp
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">{{$data}}</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        @foreach($task as $task)
                        <li class="nav-item bt-3">
                            <a class="dropdown-item">
                                <span class="image"><img src="{{$task->user->getAvatar()}}" alt="Profile Image" /></span>
                                <span>
                                    <span>{{$task->user->name}}</span>
                                    <span class="time">{{$task->created_at->diffForHumans()}}</span>
                                </span>
                                <span class="message">
                                    {{$task->task}}
                                </span>
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</div>