<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">كل الشركاء</h2>

      <table class="table mt-5 table-hover">
        <thead style="background-color: #ff7c00">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الإسم</th>
            <th scope="col">الصورة</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(partner, index) in partners" :key="partner.id">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ partner.name }}</td>
            <td>
              <img :src="partner.image" width="100" height="70" alt="" />
            </td>
            <td class="actions">
              <router-link :to="{ name: 'edit_partner', params: { id: partner.id } }">
                <button type="button"><i class="fe fe-edit fe-16"></i></button
              ></router-link>
              <button type="button" @click="delCat(partner.id)">
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
  name: "partners",
  components: { loadingPage },
  data() {
    return {
      partners: [],
      loading: false,
    };
  },
  mounted() {
    this.fetchpartners();
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
            axios.post(`/api/dash/partner/destroy/${id}`);
            this.$swal.fire("تم!", "تم الحذف بنجاح", "success");
            this.fetchpartners();
          }
        });
    },

    async fetchpartners() {
      this.loading = true;
      await axios
        .get(`api/dash/partners`)
        .then((res) => {
          this.partners = res.data.partners;
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
