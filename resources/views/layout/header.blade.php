<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="{{ url('/') }}">
      <img src="{{ url('assets/images/favicon.png') }}" alt="logo" />
    </a>
    <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
      <img src="{{ url('assets/images/logo-mini.svg') }}" alt="logo" />
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>

    <!-- Display current time and date here -->
    <div id="currentDateTime" class="ml-auto text-white"></div>

    <ul class="navbar-nav navbar-nav-right">
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <span class="profile-text d-none d-md-inline-flex">{{ Auth::user()->name }}</span>
          <img class="img-xs rounded-circle" src="https://media2.giphy.com/avatars/Quillustration/6xXKKQCvUcMA.png" alt="Profile image">
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <a class="dropdown-item mt-2" href="{{ route('manageAccount') }}">Manage Accounts</a>
          <a class="dropdown-item" href="#">Change Password</a>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{ url('assets/images/exit.png') }}" alt="logo" /> Sign Out</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </li>
      @endauth
    </ul>

  </div>
</nav>

<script>
  function displayDateTime() {
    const now = new Date();
    const options = {
      hour: 'numeric',
      minute: 'numeric',
      second: 'numeric',
      hour12: true,
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    };
    const dateTimeString = now.toLocaleString('en-US', options);
    document.getElementById('currentDateTime').innerText = dateTimeString;
  }

  displayDateTime();

  setInterval(displayDateTime, 1000);
</script>