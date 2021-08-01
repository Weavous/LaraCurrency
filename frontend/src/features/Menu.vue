
<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light py-0">
    <div class="container-fluid">
      <router-link class="navbar-brand" to="/"> <CurrencyBagLogo></CurrencyBagLogo> LaraVueCurrency</router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <router-link class="nav-link" to="/">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/currencies">Currencies</router-link>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item d-flex align-items-center">
            <router-link class="nav-link" to="/profile"><i class="bi bi-person-fill"></i> Profile</router-link>
          </li>
          <li class="nav-item">
            <div class="nav-link">
              <div class="collapse navbar-collapse">
                <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-box-arrow-right"></i> Login / Sign Up</a>

                  <ul class="dropdown-menu dropdown-menu-light bg-light">
                    <li>
                      <a class="dropdown-item border-bottom" href="/register">Register</a>
                    </li>
                    <li>
                      <a class="dropdown-item border-bottom" href="/login">Login</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/logout">Logout</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import CurrencyBagLogo from "../components/CurrencyBagLogo.vue";

export default {
  name: "Menu",
  data() {
    return {};
  },
  components: {CurrencyBagLogo}
};
</script>