 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <a href="#" class="">{{Auth::user()->name}}
                     <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                         <img src="{{asset('backend/dist/img/icons8-logout-96.png')}}" class="img-circle elevation-2" alt="User Image">
                     </a>
                     <form id="logout-form" action="{{route('logout')}}" method="$_POST" class="d-none">
                         @csrf
                     </form>
                 </a>
             </div>
             <div class="info">

             </div>
         </div>
     </ul>
 </nav>
 <!-- /.navbar -->
 