<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <edit_graphic />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import edit_graphic from "../../components/graphics/edit.vue";
export default {
  name: "edit_graphicPage",
  components: { navbar, sidebar, edit_graphic },
};
</script>

<style></style>
