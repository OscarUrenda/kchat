<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>@yield('title') :: KChat</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="csrf_token" content="{{ csrf_token() }}" />
      @yield('header')
	  <!--script src="js/jquery.cookie.min.js"></script-->
   </head>
   <body>
	  <script> user_id = {{ auth()->id() }}; </script>
      <div class="container-fluid height100">
         <div class="content-wrapper full-height">
            <div class="email-wrapper wrapper full-height">
               <div class="row align-items-stretch full-height">
                  <div class="mail-sidebar col-12 col-md-2 pt-3 bg-white height10">
                     <div class="menu-bar">
                        <ul class="menu-items">
                           <li class="compose mb-3">
                              <img src="/logo/KChat_Logo.svg" />
                           </li>
                           <li class="{{ request()->is('/') ? 'active' : '' }}">
                              <a href="/">
                              <i class="fa fa-area-chart"></i> Dashboard </a>
                           </li>
                           <li class="{{ request()->is('messages') ? 'active' : '' }}">
                              <a href="/messages">
                              <i class="fa fa-envelope"></i> Messages </a>
                              <!--span class="badge badge-pill badge-success">{{ $status['message'] }}</span-->
                           </li>
                           <li class="{{ request()->is('members') ? 'active' : '' }}">
                              <a href="/members">
                              <i class="fa fa-users"></i> Members </a>
                           </li>
                           <li class="{{ request()->is('settings') ? 'active' : '' }}">
                              <a href="/settings">
                              <i class="fa fa-cog"></i> Settings </a>
                           </li>
                           <li class="{{ request()->is('notification') ? 'active' : '' }}">
                              <a href="/notification">
                              <i class="fa fa-exclamation-circle"></i> Notification </a>
                              <span class="badge badge-pill badge-success">{{ $status['notification'] }}</span>
                           </li>
                           <li class="{{ request()->is('activity') ? 'active' : '' }}">
                              <a href="/activity">
                              <i class="fa fa-list"></i> Activity </a>
                           </li>
                           <li class="{{ request()->is('profile') ? 'active' : '' }}">
                              <a href="/profile">
                              <i class="fa fa-user-circle"></i> Profile </a>
                           </li>
                           <li>
                              <a action="/logout" form="logout" ajax_post>
                              <i class="fa fa-power-off"></i> Logout </a>
                           </li>
                        </ul>
                     </div>
                  </div>
				  @yield('body')
               </div>
            </div>
         </div>
      </div>
      <!-- Alert Modal -->
      <input type="hidden" id="alertmodel" data-toggle="modal" data-target="#alert-model" />
      <div class="modal fade" id="alert-model" tabindex="-1" role="dialog" aria-labelledby="alertModel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Alert</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <p class="p-3" id="alertbody"></p>
          <div class="modal-footer">
            <button type="button" id="alert-ok" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
      @yield('script')
	  <script src="/js/kchat.js"></script>
      @yield('javascript')
   </body>
</html>
