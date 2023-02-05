<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <edit_cat />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import edit_cat from "../../components/graphics/edit_cat.vue";
export default {
  name: "edit_graphicCatPage",
  components: { navbar, sidebar, edit_cat },
};
</script>

<style></style>
