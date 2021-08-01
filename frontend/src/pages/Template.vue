<template>
  <div>
    <Menu></Menu>
    <router-view class="container"></router-view>
    <Footer></Footer>
  </div>
</template>

<script>
import Menu from "../features/Menu.vue";
import Footer from "../features/Footer.vue";

export default {
  name: "Template",
  data() {
    return {};
  },
  components: { Menu, Footer },
};
</script>

<style>
</style>