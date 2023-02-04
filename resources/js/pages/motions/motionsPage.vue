<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <motions />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import motions from "../../components/motions/all.vue";
export default {
  name: "motionsPage",
  components: { navbar, sidebar, motions },
};
</script>

<style></style>
