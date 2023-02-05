<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <graphics />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import graphics from "../../components/graphics/all.vue";
export default {
  name: "graphicsPage",
  components: { navbar, sidebar, graphics },
};
</script>

<style></style>
