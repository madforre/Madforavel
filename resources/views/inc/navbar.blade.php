<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/">{{config('app.name', 'Madforavel')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">

            <!-- Left Side Of Navbar -->

            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="/">홈 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/posts">포스트</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">References</a>
                  <div class="dropdown-menu" aria-labelledby="references">
                    <a class="dropdown-item" href="https://www.lesstif.com/pages/viewpage.action?pageId=28606603">lessif.com</a>
                    <a class="dropdown-item" href="https://laravel.kr/docs">laravel.kr</a>
                    <a class="dropdown-item" href="https://stackoverflow.com/">stackoverflow.com</a>
                  </div>
                </li>
              </ul>

            <!-- Right Side Of Navbar -->
         
            <ul class="navbar-nav navbar-right ml-auto">
                <li><a href="/posts/create"><button class="btn mr-sm-2 my-2 btn-success">포스팅하기</button></a></li>
                
            <!-- Authentication Links -->
            
            @guest
                <li>
                    <a href="{{ route('register') }}"><button class="btn mr-sm-2 my-2 bg-success bg-light">{{ __('Join Us') }}</button></a>
                </li>
                <li>
                    <a class="btn bg-light mr-sm-2 my-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @else
                <li class="dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle mr-sm-2 my-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="/dashboard" class="dropdown-item">작성한 글 관리</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('로그아웃') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
 