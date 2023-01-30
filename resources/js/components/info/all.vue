<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">كل البيانات</h2>

      <table class="table mt-5 table-hover">
        <thead style="background-color: #ff7c00">
          <tr>
            <th scope="col">#</th>
            <th scope="col" class="text-center">المشاهدات</th>
            <th scope="col" class="text-center">العملاء</th>
            <th scope="col" class="text-center">الموظفين</th>
            <th scope="col" class="text-center">المشاريع</th>
            <th scope="col" class="text-center">البريد الالكتروني</th>
            <th scope="col" class="text-center">الرقم</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td class="text-center">{{ info.views }}</td>
            <td class="text-center">{{ info.customers }}</td>
            <td class="text-center">{{ info.employees }}</td>
            <td class="text-center">{{ info.projects }}</td>
            <td class="text-center">{{ info.email }}</td>
            <td class="text-center">{{ info.number }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</template>

<script>
import axios from "axios";
import loadingPage from "../layouts/laoding.vue";

export default {
  name: "info",
  components: { loadingPage },
  data() {
    return {
      info: [],
      loading: false,
    };
  },

  mounted() {
    this.fetchInfo();
  },

  methods: {
    async fetchInfo() {
      this.loading = true;
      await axios
        .get(`/api/dash/info`)
        .then((res) => {
          this.info = res.data.info;
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
      this.loading = false;
    },
  },
};
</script>

<style></style>
