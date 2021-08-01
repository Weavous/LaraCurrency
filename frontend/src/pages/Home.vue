<template>
  <Main>
    <div class="d-flex justify-content-center align-items-center">
      <div class="bd-intro ps-lg-4">
        <div class="d-md-flex align-items-center">
          <h1 class="bd-title">Simple Application Using <VueLogo></VueLogo> + <LaravelLogo></LaravelLogo></h1>
        </div>
        <p class="bd-lead">Application responsible for listing and filtering exchanges currencies.</p>
      </div>
    </div>
  </Main>
</template>

<script>
import Main from "../layouts/Main/Main.vue";

import VueLogo from "../components/DOM/VueLogo.vue";
import LaravelLogo from "../components/DOM/LaravelLogo.vue";

export default {
  name: "Home",
  components: { Main, VueLogo, LaravelLogo },
};
</script>
