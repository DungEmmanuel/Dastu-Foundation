<!-- NAVBAR
================================================== -->
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"> Dastu Foundation</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/contact">Contact</a></li>
                 <li class="dropdown">
                   <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Member 
                    <span class="caret"></span></a> -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Member <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        
                        @if (Auth::check()) 
                            @if(Auth::user()->hasRole('manager'))
                                <li><a href="/admin">Admin</a></li>
                            @endif
                            <li><a href="/users/logout">Logout</a></li> 
                        @else
                            <li><a href="/users/register">Register</a></li> 
                            <li><a href="/users/login">Login</a></li>
                        @endif
                      
                    </ul>
                </li>

               <!--  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">What We Do <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li> -->
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>