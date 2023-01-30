<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <edit_info />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import edit_info from "../../components/info/edit.vue";
export default {
  name: "edit_infoPage",
  components: { navbar, sidebar, edit_info },
};
</script>

<style></style>
