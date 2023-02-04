<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <add_service />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import add_service from "../../components/services/add.vue";
export default {
  name: "add_servicePage",
  components: { navbar, sidebar, add_service },
};
</script>

<style></style>
