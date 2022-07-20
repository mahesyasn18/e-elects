<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="navbar-nav">
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <div class="navbar-collapse-header">
            <div class="row">
                <div class="col-7 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
        <ul class="navbar-nav d-flex align-items-center">
            <li class="nav-item">
                <a class="nav-link {{ request()->is("ordered") ? "active btn btn-primary" : "" }}" id="nav-link"
                    href="/ordered">Ordered
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link  {{ request()->is("confirmed") ? "active btn btn-primary" : "" }}" id="nav-link"
                    href="/confirmed">Confirmed</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link  {{ request()->is("packing") ? "active btn btn-primary" : "" }}" id="nav-link"
                    href="/packing">Packing</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link  {{ request()->is("sent") ? "active btn btn-primary" : "" }}" id="nav-link"
                    href="/sent">Sent</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link  {{ request()->is("completed") ? "active btn btn-primary" : "" }}" id="nav-link"
                    href="/completed">Completed</a>
            </li>

        </ul>
    </div>
</nav>