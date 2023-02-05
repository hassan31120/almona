<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <form @submit.prevent="saveForm">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">تعديل التطبيق </strong>
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
                    required
                  />
                  <span class="text-danger" v-if="errors.title">{{
                    errors.title[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="desc">الوصف</label>
                  <textarea
                    name="desc"
                    id="desc"
                    cols="30"
                    rows="8"
                    class="form-control"
                    v-model="form.desc"
                    required
                  ></textarea>
                  <span class="text-danger" v-if="errors.desc">{{ errors.desc[0] }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="ads">المميزات</label>
                  <textarea
                    name="ads"
                    id="ads"
                    cols="30"
                    rows="8"
                    class="form-control"
                    v-model="form.ads"
                    required
                  ></textarea>
                  <span class="text-danger" v-if="errors.ads">{{ errors.ads[0] }}</span>
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
                  <label for="price">السعر</label>
                  <input
                    type="text"
                    id="price"
                    class="form-control"
                    v-model="form.price"
                    required
                  />
                  <span class="text-danger" v-if="errors.price">{{
                    errors.price[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="ref1">لينك الموقع</label>
                  <input type="text" id="ref1" class="form-control" v-model="form.ref1" />
                  <span class="text-danger" v-if="errors.ref1">{{ errors.ref1[0] }}</span>
                </div>
                <div class="row">
                  <div class="form-group mb-3 col-6">
                    <label for="ref2">لينك جوجل بلاي</label>
                    <input
                      type="text"
                      id="ref2"
                      class="form-control"
                      v-model="form.ref2"
                    />
                    <span class="text-danger" v-if="errors.ref2">{{
                      errors.ref2[0]
                    }}</span>
                  </div>
                  <div class="form-group mb-3 col-6">
                    <label for="ref3">لينك اب ستور</label>
                    <input
                      type="text"
                      id="ref3"
                      class="form-control"
                      v-model="form.ref3"
                    />
                    <span class="text-danger" v-if="errors.ref3">{{
                      errors.ref3[0]
                    }}</span>
                  </div>
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
  name: "edit_product",
  components: { loadingPage },
  data() {
    return {
      loading: false,
      form: {
        title: "",
        desc: "",
        image: "",
        price: "",
        ref1: "",
        ref2: "",
        ref3: "",
        ads: "",
        cat_id: "",
      },
      errors: [],
      cats: [],
      id: this.$route.params.id,
    };
  },
  mounted() {
    this.fetchproduct();
    this.fetchCats();
  },
  methods: {
    async fetchproduct() {
      this.loading = true;
      await axios
        .get(`/api/dash/product/show/${this.id}`)
        .then((res) => {
          this.form = res.data.product;
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
        title: "تم تعديل المنتج بنجاح",
      });
    },

    async fetchCats() {
      this.loading = true;
      await axios
        .get(`/api/dash/cats`)
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
        .post(`/api/dash/product/update/${this.id}`, this.form, {
          headers: {
            Accept: "application/json",
            "Content-Type": "multipart/form-data",
          },
        })
        .then(() => {
          this.$router.push({ name: "products" });
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
