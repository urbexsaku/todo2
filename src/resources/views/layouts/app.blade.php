<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDo</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>
<body>

<header class="header">
  <div class="header__inner">
    <div class="header__utilities">
      <a class="header__logo" href="/">Todo</a>
      <nav>
        <ul class="header-nav">
          @if(Auth::check())
          <li class="header-nav__item">
            <span class="header-nav__name">{{ Auth::user()->name }}のマイページ</span>
          </li>
          <li class="header-nav__item">
            <form class="form" action="/logout" method="post">
              @csrf
              <button class="header-nav__button">ログアウト</button>
            </form>
          </li>
          @endif
        </ul>
      </nav>
    </div>
  </div>
</header>

<main>
@yield('content')
</main>
</body>
</html>