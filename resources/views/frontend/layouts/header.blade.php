<header>
  <nav id="nav">
     <div class="container d-flex items-center justify-between">
        <div class="logo"> <!-- Navbar Logo -->
           <a href="{{ url('/') }}">
               <img src="frontend/assets/images/again-logo.png" width="50" alt="Logo">
           </a>
        </div>
        <div class="RightSide d-flex items-center z-up">
           <!-- Button -->
           <a href="{{url('contact')}}" class="btn-primary hideOnMobile">
              <h6>Let's Talk</h6>
              <i class="fa-solid fa-arrow-right-long"></i>
           </a>
           <button class="MenuButton">
              <div class="sidebar_icon"></div>
           </button>
        </div>

        <div class="sidebar">
           <!-- Navbar Menu-->
            <ul class="nav_menu">
            <li><a href="{{ url('/#hero') }}" class="nav_link">Home</a></li>
            <li><a href="{{ url('/#services') }}" class="nav_link">Services</a></li>
            <li><a href="{{ url('/#projects') }}" class="nav_link">Projects</a></li>
            <li><a href="{{ url('/#about') }}" class="nav_link">About</a></li>
            </ul>
            <!-- END:: Navbar Menu -->
           <div>
              <div class="personal-info">
                 <h5>Bara Dharmapur, Lalmai-3500<br>Cumilla, Bangladesh.</h5>
                 <a href="tel:+8801874316920">+8801874316920</a>
                 <a href="mailto:hr.rahman678@gmail.com">hr.rahman678@gmail.com</a>
              </div>
              <div class="social-media">
                 <a href="https://web.facebook.com/hr.rahman.678" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                 <a href="https://www.linkedin.com/in/habibur-rahman-aa1bba277/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                 <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
              </div>
           </div>
        </div>
     </div>
  </nav>
</header>
