<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">كل التصاميم</h2>

      <table class="table mt-5 table-hover">
        <thead style="background-color: #e4b75d">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الإسم</th>
            <th scope="col">التصميم</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(graphic, index) in graphics" :key="graphic.id">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ graphic.title }}</td>
            <td>
              <img :src="graphic.image" width="100" height="70" alt="" />
            </td>
            <td class="actions">
              <router-link :to="{ name: 'edit_graphic', params: { id: graphic.id } }">
                <button type="button"><i class="fe fe-edit fe-16"></i></button
              ></router-link>
              <button type="button" @click="delCat(graphic.id)">
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
  name: "graphics",
  components: { loadingPage },
  data() {
    return {
      graphics: [],
      loading: false,
    };
  },
  mounted() {
    this.fetchgraphics();
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
            axios.post(`/api/dash/graphic/destroy/${id}`);
            this.$swal.fire("تم!", "تم الحذف بنجاح", "success");
            this.fetchgraphics();
          }
        });
    },

    async fetchgraphics() {
      this.loading = true;
      await axios
        .get(`api/dash/graphics`)
        .then((res) => {
          this.graphics = res.data.graphics;
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
