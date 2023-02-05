<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <form @submit.prevent="saveForm">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">تعديل التصميم </strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 align-self-center">
                <div class="form-group mb-3">
                  <label for="title">العنوان</label>
                  <input
                    type="text"
                    id="title"
                    class="form-control"
                    v-model="form.title"
                  />
                  <span class="text-danger" v-if="errors.title">{{
                    errors.title[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="image">الصورة</label>
                  <input
                    type="file"
                    id="image"
                    name="image"
                    class="form-control"
                    ref="image"
                    @change="selectImage"
                  />
                  <span class="text-danger" v-if="errors.image">{{
                    errors.image[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="cat_id">القسم</label>
                  <select v-model="form.cat_id" class="form-control" id="cat_id" required>
                    <option :value="cat.id" v-for="cat in cats" :key="cat.id">
                      {{ cat.name }}
                    </option>
                  </select>
                  <span class="text-danger" v-if="errors.cat_id">{{
                    errors.cat_id[0]
                  }}</span>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6 align-self-center">
                <img :src="form.image" class="img-thumbnail" alt="" />
              </div>
              <button
                type="submit"
                class="btn"
                style="
                  background-color: #e4b75d;
                  color: aliceblue;
                  width: 100px;
                  font-weight: 600;
                "
              >
                تأكيد
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
</template>

<script>
import loadingPage from "../layouts/laoding.vue";

export default {
  name: "edit_graphic",
  components: { loadingPage },
  data() {
    return {
      loading: false,
      form: {
        title: "",
        image: "",
        cat_id: "",
      },
      errors: [],
      cats: [],
      id: this.$route.params.id,
    };
  },
  mounted() {
    this.fetchmotion();
    this.fetchCats();
  },
  methods: {
    async fetchmotion() {
      this.loading = true;
      await axios
        .get(`/api/dash/graphic/show/${this.id}`)
        .then((res) => {
          this.form = res.data.graphic;
        })
        .catch(() => {
          this.$router.push({ name: "error404" });
        });
      this.loading = false;
    },
    alert() {
      var toastMixin = this.$swal.mixin({
        toast: true,
        icon: "success",
        title: "General Title",
        animation: false,
        position: "top-right",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener("mouseenter", this.$swal.stopTimer);
          toast.addEventListener("mouseleave", this.$swal.resumeTimer);
        },
      });
      toastMixin.fire({
        animation: true,
        title: "تم تعديل الفيديو بنجاح",
      });
    },

    async fetchCats() {
      this.loading = true;
      await axios
        .get(`/api/dash/graphiccats`)
        .then((res) => {
          this.cats = res.data.cats;
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
      this.loading = false;
    },

    async saveForm() {
      this.loading = true;
      await axios
        .post(`/api/dash/graphic/update/${this.id}`, this.form, {
          headers: {
            Accept: "application/json",
            "Content-Type": "multipart/form-data",
          },
        })
        .then(() => {
          this.$router.push({ name: "graphics" });
          this.alert();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
      this.loading = false;
    },

    selectImage() {
      this.form.image = this.$refs.image.files[0];
    },
  },
};
</script>

<style></style>
