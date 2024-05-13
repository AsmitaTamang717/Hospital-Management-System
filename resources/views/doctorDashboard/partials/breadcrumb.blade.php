<nav aria-label="breadcrumb breadcrumb-container">
  <ol class="breadcrumb breadcrumb-hospital">
      <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
          <a href="@yield('title-link')">@yield('title')</a>
      </li>
      @if (!empty(trim($__env->yieldContent('action'))))
      <li class="breadcrumb-item active" aria-current="page">
          <a href="@yield('action-link')">@yield('action')</a>
      </li>
      @endif
  </ol>
</nav>
