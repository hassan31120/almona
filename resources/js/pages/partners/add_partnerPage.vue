<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <add_partner />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import add_partner from "../../components/partners/add.vue";
export default {
  name: "add_partnerPage",
  components: { navbar, sidebar, add_partner },
};
</script>

<style></style>
