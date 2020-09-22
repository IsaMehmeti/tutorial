<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x material-icons">settings</i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" onclick="changeColor({{Auth::user()->id}}, 'purple')" data-color="purple"></span>
              <span class="badge filter badge-azure" onclick="changeColor({{Auth::user()->id}}, 'azure')" data-color="azure"></span>
              <span class="badge filter badge-green" onclick="changeColor({{Auth::user()->id}}, 'green')" data-color="green"></span>
              <span class="badge filter badge-warning" onclick="changeColor({{Auth::user()->id}}, 'orange')" data-color="orange"></span>
              <span class="badge filter badge-danger" onclick="changeColor({{Auth::user()->id}}, 'danger')" data-color="danger"></span>
              <span class="badge filter badge-rose " onclick="changeColor({{Auth::user()->id}}, 'rose')" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="ml-auto mr-auto">
              <span id="black" class="badge filter badge-black " onclick="changeBackground({{Auth::user()->id}}, 'black')" data-background-color="black"></span>
              <span id="white" class="badge filter badge-white" onclick="changeBackground({{Auth::user()->id}}, 'white')" data-background-color="white"></span>
              <span id="red" class="badge filter badge-red" onclick="changeBackground({{Auth::user()->id}}, 'red')" data-background-color="red"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger">
            <p>Sidebar Mini</p>
            <label class="ml-auto">
              <div class="togglebutton switch-sidebar-mini">
                <label>
                  <input type="checkbox">
                  <span class="toggle"></span>
                </label>
              </div>
            </label>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger">
            <p>Sidebar Images</p>
            <label class="switch-mini ml-auto">
              <div class="togglebutton switch-sidebar-image">
                <label>
                  <input type="checkbox" checked="">
                  <span class="toggle"></span>
                </label>
              </div>
            </label>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="{{ asset('../assets/img/sidebar-1.jpg')}}" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="{{ asset('../assets/img/sidebar-2.jpg')}}" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="{{ asset('../assets/img/sidebar-3.jpg')}}" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="{{ asset('../assets/img/sidebar-4.jpg')}}" alt="">
          </a>
        </li>
      </ul>
    </div>
  </div>
