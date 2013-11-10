<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Home Igniter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <!-- {{ HTML::style("assets/css/bootstrap.css")}} -->
    {{ HTML::style("css/app.v1.css")}}
    {{ HTML::style("css/sidebar.css")}}
    {{ HTML::style("css/style3.css")}}

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      {{ HTML::script("assets/js/html5shiv.js")}}
    <![endif]-->

    <style type="text/css">
        body{
            background-color: #FFFFFF;
        }
        .content{
          width: 1020px;
          float: right;
          padding: 15px;
        }
    </style>

    @yield('style')

  </head>

  <body>

        @if(Auth::check())
        <div id="sidebar-wrapper">

           <div class=" nav-user"> 
              <div class="nav-avatar"> 
                <a href="#" id="user_photo" class="avatar animated rollIn"> 
                <img src="{{Auth::user()->photo}}" style="width: 150px">
                </a>
                <div id="user-tools">
                  <a href="#">
                    <i class="icon-cogs"></i>
                  </a>
                </div>
              </div>
            </div>  

            <div class="sidebar-menus">
              <ul class="ca-menu">
                  <li>
                    <a href="{{URL::to_route('todos')}}" class = "ca-main">
                      <span class="ca-icon">p</span>
                      <div class="ca-content">
                        <h2 class="ca-main">
                          Tasks
                        </h2>
                      </div>
                    </a>
                  </li>
                  <li>
                      <a href="#">
                          <span class="ca-icon">E</span>
                          <div class="ca-content">
                              <h2 class="ca-main">Events</h2>
                          </div>  
                      </a>
                  </li>
                  <li>
                      <a href="#">
                          <span class="ca-icon">c</span>
                          <div class="ca-content">
                              <h2 class="ca-main">Reminders</h2>
                          </div>  
                      </a>
                  </li>
                  <li>

                    <a href="{{URL::to('logout')}}" class = "ca-main">
                      <span class="ca-icon">X</span>
                      <div class="ca-content">
                        <h2 class="ca-main">
                          Logout
                        </h2>
                      </div>
                    </a>

                  </li>
              </ul>
            </div>

        </div>
      @endif