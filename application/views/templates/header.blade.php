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
    {{ HTML::style("css/bootstrap-responsive.css")}}
    {{ HTML::style("css/font-awesome/css/font-awesome.min.css")}}
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
        #profile{
          padding: 16px 0 0 20px;
        }
    </style>

    @yield('style')

  </head>

  <body>
        <div id="wrapper">
          @if(Auth::check())
          <div id="sidebar-wrapper">
              <div class="sidebar-menus">
                <ul class="ca-menu">
                    <li>
                      <div id="profile" class="clearfix m-b"> 
                        <a href="#" class="pull-left thumb m-r"> 
                          <img src="{{Auth::user()->photo}}" class="img-circle"> 
                        </a> 
                        <div class="clear"> 
                          <div class="h3 m-t-xs m-b-xs">
                            {{Auth::user()->name}}
                          </div> 
                          <small class="text-muted">
                            <i class="icon-map-marker"></i> 
                            São Luís, MA
                          </small> 
                        </div> 
                      </div>
                    </li>
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