    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="posts">Blog</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="{{url('statistics')}}">Statistics</a>
                    </li>
                     @if(Auth()->check())
                     @if(Auth()->user()->hasRole('admin'))
                    <li>
                        <a href="{{url('admin')}}">Admin</a>
                    </li>
                     @endif
                     <li>
                        <a>{{Auth()->user()->name}}</a>
                    </li>
                    <li>
                        <a href="{{url('logout')}}">Logout</a>
                    </li>
                    @else
                     <li>
                        <a href="{{url('register')}}">Sign Up</a>
                    </li>
                     <li>
                        <a href="{{url('login')}}">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>