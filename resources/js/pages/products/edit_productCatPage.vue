<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <edit_cat />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import edit_cat from "../../components/products/edit_cat.vue";
export default {
  name: "edit_productCatPage",
  components: { navbar, sidebar, edit_cat },
};
</script>

<style></style>
