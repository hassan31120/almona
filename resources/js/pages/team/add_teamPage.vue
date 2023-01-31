<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <add_team />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import add_team from "../../components/team/add.vue";
export default {
  name: "add_teamPage",
  components: { navbar, sidebar, add_team },
};
</script>

<style></style>
