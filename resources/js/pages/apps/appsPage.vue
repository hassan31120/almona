<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <apps />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import apps from "../../components/apps/all.vue";
export default {
  name: "appsPage",
  components: { navbar, sidebar, apps },
};
</script>

<style></style>
