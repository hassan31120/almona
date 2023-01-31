<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <partners />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import partners from "../../components/partners/all.vue";
export default {
  name: "catsPage",
  components: { navbar, sidebar, partners },
};
</script>

<style></style>
