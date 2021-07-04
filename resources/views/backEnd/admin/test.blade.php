<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</a> <br><a href="gsg"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
<form id="logout-form" action="{{ route(''admin.logout'') }}" method="POST" style="display: none;">
                                        @csrf
                        </form> </body>
</html>