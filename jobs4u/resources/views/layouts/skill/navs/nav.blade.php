<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container-fluid px-md-4	">
      <a class="navbar-brand" href="{{ route('welcome') }}">
          <img class="w-50" src="{{ asset('argon') }}/img/brand/white.png" />
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item cta mr-md-1"><a href="{{ route('register') }}" class="nav-link">Criar Conta</a></li>
        <li class="nav-item cta cta-colored"><a href="{{ route('login') }}" class="nav-link">Login</a></li>

      </ul>
    </div>
  </div>
</nav>