<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <edit_app />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import edit_app from "../../components/apps/edit.vue";
export default {
  name: "edit_appPage",
  components: { navbar, sidebar, edit_app },
};
</script>

<style></style>
