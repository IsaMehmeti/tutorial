<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{ asset('../assets/img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo" style="text-align: center;">
        <a href="#" class="simple-text logo-normal">
          @yield('page_name')
        </a></div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            @if(isset(Auth::user()->image))
            <img {{-- src="../assets/img/faces/avatar.jpg" --}} src="{{asset('/storage/'.Auth::user()->image)}}" />
            @else
               <img src="{{ asset('../../assets/img/faces/marc.jpg')}}"  />
            @endif
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                {{Auth::user()->name}} @if(Auth::user()->type == '1') - Admin @elseif(Auth::user()->type == '2') - Blogger @else @endif
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse {{ Request::is('profile*') ? 'show' : '' }}" id="collapseExample">
              <ul class="nav">
                <li class="nav-item {{ Request::is('profile/show') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('showProfile') }}">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li>
                @if(Auth::user()->completion < 100)
                <li class="nav-item {{ Request::is('profile/complete') ? 'active' : '' }}">
                  <a class="nav-link" href="{{route('profile')}}">
                    <span class="sidebar-mini"> CP </span>
                    <span class="sidebar-normal"> Complete Profile </span>
                  </a>
                </li>
                @endif
              </ul>
            </div>
          </div>
        </div>

        @if(Auth::user()->type == '1')
        <ul class="nav">
          <li class="nav-item {{ Request::is('/*') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
              <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
              <i class="material-icons">article</i>
              <p> Blogs
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse {{ Request::is('blog*') ? 'show' : '' }} " id="pagesExamples">
              <ul class="nav">
                <li class="nav-item {{ Request::is('blogger/blog') ? 'active' : '' }} ">
                  <a class="nav-link" href="{{ route('bloggerblog.index')}}">
                    <span class="sidebar-mini"> Bl </span>
                    <span class="sidebar-normal"> My Blogs </span>
                  </a>
                </li>
                <li class="nav-item {{ Request::is('blogger/blog/create') ? 'active' : '' }}">
                  <a class="nav-link" href="{{route('bloggerblog.create')}}">
                    <span class="sidebar-mini"> Cr </span>
                    <span class="sidebar-normal"> Create </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
              <ul class="nav">

          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
              <i class="material-icons">account_circle</i>
              <p> Users
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse  {{ Request::is('admin/user*') ? 'show' : '' }} " id="componentsExamples">
              <ul class="nav">
                <li class="nav-item {{ Request::is('admin/user') ? 'active' : '' }}">
                  <a class="nav-link" href="{{route('adminuser.index')}}">
                    <span class="sidebar-mini"> VU </span>
                    <span class="sidebar-normal"> View All Users </span>
                  </a>
                </li>
                <li class="nav-item {{ Request::is('admin/user/favorite') ? 'active' : '' }}">
                  <a class="nav-link" href="{{route('adminuser.favoriteUser')}}">
                    <span class="sidebar-mini"> VFU </span>
                    <span class="sidebar-normal"> View Favorite Users </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" data-toggle="collapse" href="#componentsCollapse">
                    <span class="sidebar-mini"> U </span>
                    <span class="sidebar-normal"> Create Users
                      <b class="caret"></b>
                    </span>
                  </a>
                  <div class="collapse" id="componentsCollapse">
                    <ul class="nav">
                      <li class="nav-item ">
                        <a class="nav-link" href="#0">
                          <span class="sidebar-mini"> A </span>
                          <span class="sidebar-normal"> Create Admins   </span>
                        </a>
                      </li>
                       <li class="nav-item ">
                        <a class="nav-link" href="#0">
                          <span class="sidebar-mini"> B </span>
                          <span class="sidebar-normal"> Create Bloggers </span>
                        </a>
                      </li>
                       <li class="nav-item ">
                        <a class="nav-link" href="#0">
                          <span class="sidebar-mini"> C </span>
                          <span class="sidebar-normal"> Create Users </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li> 
                
              </ul>
            </div>
          </li>
        </ul>

      </ul>
      @elseif(Auth::user()->type == '2')
      <ul class="nav">
          <li class="nav-item {{ Request::is('/*') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
              <i class="material-icons">article</i>
              <p> Blogs
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse {{ Request::is('blog*') ? 'show' : '' }} " id="pagesExamples">
              <ul class="nav">
                <li class="nav-item {{ Request::is('blogger/blog') ? 'active' : '' }} ">
                  <a class="nav-link" href="{{ route('bloggerblog.index')}}">
                    <span class="sidebar-mini"> Bl </span>
                    <span class="sidebar-normal"> My Blogs </span>
                  </a>
                </li>
                <li class="nav-item {{ Request::is('blogger/blog/create') ? 'active' : '' }}">
                  <a class="nav-link" href="{{route('bloggerblog.create')}}">
                    <span class="sidebar-mini"> Cr </span>
                    <span class="sidebar-normal"> Create </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
      </ul>
      @else
      <ul class="nav">
          <li class="nav-item {{ Request::is('/*') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li> 
           <li class="nav-item {{-- {{ Request::is('/*') ? 'active' : '' }}  --}}">
            <a class="nav-link" href="">
              <i class="material-icons">article</i>
              <p> Bloggs </p>
            </a>
          </li> 
      </ul>
      @endif
      </div>
    </div>