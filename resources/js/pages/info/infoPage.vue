<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <info />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import info from "../../components/info/all.vue";
export default {
  name: "infoPage",
  components: { navbar, sidebar, info },
};
</script>

<style></style>
