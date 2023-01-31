<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <edit_partner />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import edit_partner from "../../components/partners/edit.vue";
export default {
  name: "edit_partnerPage",
  components: { navbar, sidebar, edit_partner },
};
</script>

<style></style>
