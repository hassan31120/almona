<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <add_motion />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import add_motion from "../../components/motions/add.vue";
export default {
  name: "add_motionPage",
  components: { navbar, sidebar, add_motion },
};
</script>

<style></style>
