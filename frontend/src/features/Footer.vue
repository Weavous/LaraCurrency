<template>
  <footer class="footer mt-auto py-3 bg-light fixed-bottom">
    <div class="container d-flex justify-content-center">
      <span class="text-muted">
        {{  `Copyright @${new Date().getFullYear()} LaraVueMarvel All Rights Reserved` }}
      </span>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer",
  data() {
    return {};
  },
};
</script>