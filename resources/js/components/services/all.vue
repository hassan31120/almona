<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">كل الخدمات</h2>

      <table class="table mt-5 table-hover">
        <thead style="background-color: #e4b75d">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الإسم</th>
            <th scope="col">الوصف</th>
            <th scope="col">الصورة</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(service, index) in services" :key="service.id">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ service.name }}</td>
            <td>
              <img :src="service.image" width="100" height="70" alt="" />
            </td>
            <td>{{ service.desc }}</td>

            <td class="actions">
              <router-link :to="{ name: 'edit_service', params: { id: service.id } }">
                <button type="button"><i class="fe fe-edit fe-16"></i></button
              ></router-link>
              <button type="button" @click="delCat(service.id)">
                <i class="fe fe-trash fe-16"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</template>

<script>
import loadingPage from "../layouts/laoding.vue";
import axios from "axios";

export default {
  name: "services",
  components: { loadingPage },
  data() {
    return {
      services: [],
      loading: false,
    };
  },
  mounted() {
    this.fetchservices();
  },
  methods: {
    delCat(id) {
      this.$swal
        .fire({
          title: "هل انت متأكد؟",
          text: "لن تتمكن من إعادة هذه الخطوة!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "نعم إحذف",
          cancelButtonText: "الغاء",
        })
        .then((result) => {
          if (result.isConfirmed) {
            axios.post(`/api/dash/service/destroy/${id}`);
            this.$swal.fire("تم!", "تم الحذف بنجاح", "success");
            this.fetchservices();
          }
        });
    },

    async fetchservices() {
      this.loading = true;
      await axios
        .get(`api/dash/services`)
        .then((res) => {
          this.services = res.data.services;
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
