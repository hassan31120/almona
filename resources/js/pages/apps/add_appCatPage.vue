<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <add_cat />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import add_cat from "../../components/apps/add_cat.vue";
export default {
  name: "add_appCatPage",
  components: { navbar, sidebar, add_cat },
};
</script>

<style></style>
