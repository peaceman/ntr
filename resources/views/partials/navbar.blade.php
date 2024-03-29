<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">nTimeRec</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            @if(Auth::check())
                <li>
                    <a href="{{ route('events.index') }}">Time Tracking</a>
                </li>
                <li>
                    <a href="{{ route('reports.index') }}">Time Tracking Report</a>
                </li>
            @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <li>
                    <a href="{{ route('auth.logout') }}">Logout</a>
                </li>
            @else
                <li>
                    <a href="{{ route('auth.register') }}">Register</a>
                </li>
                <li>
                    <a href="{{ route('auth.login') }}">Login</a>
                </li>
            @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
