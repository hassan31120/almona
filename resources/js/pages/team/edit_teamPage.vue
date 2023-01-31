<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <edit_team />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import edit_team from "../../components/team/edit.vue";
export default {
  name: "edit_teamPage",
  components: { navbar, sidebar, edit_team },
};
</script>

<style></style>
