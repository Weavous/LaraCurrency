<template>
  <div>
    <Menu></Menu>
    <div class="container">
      <slot></slot>
    </div>
    <Footer></Footer>
  </div>
</template>

<script>
import Menu from "../Shared/Menu.vue";
import Footer from "../Shared/Footer.vue";

export default {
  name: "Main",
  components: { Menu, Footer },
};
</script>