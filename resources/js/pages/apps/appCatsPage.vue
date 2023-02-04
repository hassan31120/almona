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
import all_cats from "../../components/apps/all_cats.vue";
export default {
  name: "appCatsPage",
  components: { navbar, sidebar, all_cats },
};
</script>

<style></style>
