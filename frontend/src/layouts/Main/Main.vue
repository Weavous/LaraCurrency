<template>
  <div>
    <Menu></Menu>
    <slot></slot>
    <Footer></Footer>
  </div>
</template>

<script>
import Menu from "../Shared/Menu.vue";
import Footer from "../Shared/Footer.vue";

export default {
  name: "Main",
  data() {
    return {};
  },
  components: { Menu, Footer },
};
</script>