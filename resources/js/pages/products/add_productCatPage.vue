<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <add_cat />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import add_cat from "../../components/products/add_cat.vue";
export default {
  name: "add_productCatPage",
  components: { navbar, sidebar, add_cat },
};
</script>

<style></style>
