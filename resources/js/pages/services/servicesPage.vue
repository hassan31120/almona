<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <services />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import services from "../../components/services/all.vue";
export default {
  name: "catsPage",
  components: { navbar, sidebar, services },
};
</script>

<style></style>
