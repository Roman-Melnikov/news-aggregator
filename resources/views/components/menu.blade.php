<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('home')) active @endif" href="{{route('home')}}">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('news.index')) active @endif" href="{{route('news.index')}}">Новости</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('categories.index')) active @endif" href="{{route('categories.index')}}">Категории</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('info')) active @endif" href="{{route('info')}}">О проекте</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.index')) active @endif" href="{{route('admin.index')}}">Админка</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('feedback.create')) active @endif" href="{{route('feedback.create')}}">Оставить отзыв</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('subscription.create')) active @endif" href="{{route('subscription.create')}}">Подписка</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
