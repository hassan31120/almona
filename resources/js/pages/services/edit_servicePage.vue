<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <edit_service />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import edit_service from "../../components/services/edit.vue";
export default {
  name: "edit_servicePage",
  components: { navbar, sidebar, edit_service },
};
</script>

<style></style>
