<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
          <a href="@yield('title-link')">@yield('title')</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
          <a href="@yield('action-link')">@yield('action')</a>
      </li>
  </ol>
</nav>
