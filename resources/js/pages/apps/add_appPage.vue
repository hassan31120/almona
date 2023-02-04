<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <add_app />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import add_app from "../../components/apps/add.vue";
export default {
  name: "add_appPage",
  components: { navbar, sidebar, add_app },
};
</script>

<style></style>
