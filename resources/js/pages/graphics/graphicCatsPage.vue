<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <all_cats />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import all_cats from "../../components/graphics/all_cats.vue";
export default {
  name: "graphicCatsPage",
  components: { navbar, sidebar, all_cats },
};
</script>

<style></style>
