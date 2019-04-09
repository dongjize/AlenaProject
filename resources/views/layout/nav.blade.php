<div class="blog-masthead">
    <div class="container">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <a class="blog-nav-item " href="/posts">Home</a>
            </li>
            <li>
                <a class="blog-nav-item" href="/posts/create">Write Articles</a>
            </li>
            <li>
                <a class="blog-nav-item" href="/notices">Notification</a>
            </li>
            <li>
                <input name="query" type="text" value="" class="form-control" style="margin-top:10px"
                       placeholder="Search">
            </li>
            <li>
                <button class="btn btn-default" style="margin-top:10px" type="submit">Go!</button>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <div>
                    <img src="{{Auth::user()->avatar}}"
                         alt="" class="img-rounded" style="border-radius:500px; height: 30px">
                    <a href="#" class="blog-nav-item dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">{{ \Auth::user()->name }} <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/user/{{\Auth::id()}}">My Homepage</a></li>
                        <li><a href="/user/me/setting">Settings</a></li>
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>