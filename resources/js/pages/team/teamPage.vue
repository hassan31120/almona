<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <team />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import team from "../../components/team/all.vue";
export default {
  name: "teamPage",
  components: { navbar, sidebar, team },
};
</script>

<style></style>
