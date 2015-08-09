<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Tutorage</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-right">

                <ul class="nav navbar-nav">
                    @if(Auth::check())
                        <li><a href="/logout">Log out</a></li>
                    @else
                        <li><a href="/register">Register as a Student</a></li>
                        <li><a href="/register">Register as a Tutor</a></li>
                        <li><a href="/login">Log in</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</header>
