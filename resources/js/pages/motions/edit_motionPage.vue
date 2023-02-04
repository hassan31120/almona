<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <edit_motion />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import edit_motion from "../../components/motions/edit.vue";
export default {
  name: "edit_motionPage",
  components: { navbar, sidebar, edit_motion },
};
</script>

<style></style>
