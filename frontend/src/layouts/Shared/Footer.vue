<template>
  <footer class="footer mt-auto py-3 bg-light fixed-bottom">
    <div class="container d-flex justify-content-center">
      <span class="text-muted">
        <TradeMark></TradeMark>
      </span>
    </div>
  </footer>
</template>

<script>
import TradeMark from "../../components/DOM/TradeMark.vue";

export default {
  name: "Footer",
  components: { TradeMark },
};
</script>