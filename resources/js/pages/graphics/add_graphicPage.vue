<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <add_graphic />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import add_graphic from "../../components/graphics/add.vue";
export default {
  name: "add_graphicPage",
  components: { navbar, sidebar, add_graphic },
};
</script>

<style></style>
