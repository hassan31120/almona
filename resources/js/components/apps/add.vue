<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <form @submit.prevent="saveForm">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">إضافة تطبيق جديد</strong>
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
                  <label for="body">الوصف</label>
                  <textarea
                    name="body"
                    id="body"
                    cols="30"
                    rows="8"
                    class="form-control"
                    v-model="form.body"
                    required
                  ></textarea>
                  <span class="text-danger" v-if="errors.body">{{ errors.body[0] }}</span>
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
                    required
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
                <div class="form-group mb-3 row">
                  <div class="form-group col-3">
                    <label for="pages">صفحات مكتملة</label>
                    <input
                      type="number"
                      id="pages"
                      class="form-control"
                      v-model="form.pages"
                    />
                    <span class="text-danger" v-if="errors.pages">{{
                      errors.pages[0]
                    }}</span>
                  </div>
                  <div class="form-group col-3">
                    <label for="downlaods">التنزيلات</label>
                    <input
                      type="number"
                      id="downlaods"
                      class="form-control"
                      v-model="form.downlaods"
                    />
                    <span class="text-danger" v-if="errors.downlaods">{{
                      errors.downlaods[0]
                    }}</span>
                  </div>
                  <div class="form-group col-3">
                    <label for="customers">العملاء</label>
                    <input
                      type="number"
                      id="customers"
                      class="form-control"
                      v-model="form.customers"
                    />
                    <span class="text-danger" v-if="errors.customers">{{
                      errors.customers[0]
                    }}</span>
                  </div>
                  <div class="form-group col-3">
                    <label for="country">البلاد</label>
                    <input
                      type="number"
                      id="country"
                      class="form-control"
                      v-model="form.country"
                    />
                    <span class="text-danger" v-if="errors.country">{{
                      errors.country[0]
                    }}</span>
                  </div>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- <img src="@/assets/UsabilityTesting.gif" alt="" /> -->
                <div class="form-group mb-3">
                  <label for="b_head">عنوان الفائدة</label>
                  <input
                    type="text"
                    id="b_head"
                    class="form-control"
                    v-model="form.b_head"
                    required
                  />
                  <span class="text-danger" v-if="errors.b_head">{{
                    errors.b_head[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="b_body">نص الفائدة</label>
                  <textarea
                    name="b_body"
                    id="b_body"
                    cols="30"
                    rows="8"
                    class="form-control"
                    v-model="form.b_body"
                    required
                  ></textarea>
                  <span class="text-danger" v-if="errors.b_body">{{
                    errors.b_body[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="logo">صورة الفائدة</label>
                  <input
                    type="file"
                    id="logo"
                    name="logo"
                    class="form-control"
                    ref="benefit"
                    @change="selectBenefit"
                    required
                  />
                  <span class="text-danger" v-if="errors.image">{{
                    errors.image[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="c_name">اسم العميل</label>
                  <input
                    type="text"
                    id="c_name"
                    class="form-control"
                    v-model="form.c_name"
                    required
                  />
                  <span class="text-danger" v-if="errors.c_name">{{
                    errors.c_name[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="c_body">رأي العميل</label>
                  <textarea
                    name="c_body"
                    id="c_body"
                    cols="30"
                    rows="8"
                    class="form-control"
                    v-model="form.c_body"
                    required
                  ></textarea>
                  <span class="text-danger" v-if="errors.c_body">{{
                    errors.c_body[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="logo">لوجو العميل</label>
                  <input
                    type="file"
                    id="logo"
                    name="logo"
                    class="form-control"
                    ref="logo"
                    @change="selectLogo"
                    required
                  />
                  <span class="text-danger" v-if="errors.image">{{
                    errors.image[0]
                  }}</span>
                </div>
              </div>
              <button
                type="submit"
                class="btn"
                style="
                  background-color: #ff7c00;
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
  name: "add_app",
  components: { loadingPage },
  data() {
    return {
      loading: false,
      form: {
        title: "",
        body: "",
        image: "",
        price: "",
        ref1: "",
        ref2: "",
        ref3: "",
        b_head: "",
        b_body: "",
        b_image: "",
        pages: "",
        downlaods: "",
        customers: "",
        country: "",
        c_name: "",
        c_body: "",
        c_logo: "",
        cat_id: "",
      },
      errors: [],
      cats: [],
    };
  },
  mounted() {
    this.fetchCats();
  },
  methods: {
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
        title: "تم إضافة التطبيق بنجاح",
      });
    },
    async saveForm() {
      this.loading = true;
      await axios
        .post(`api/dash/app/store`, this.form, {
          headers: {
            Accept: "application/json",
            "Content-Type": "multipart/form-data",
          },
        })
        .then(() => {
          this.$router.push({ name: "apps" });
          this.alert();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
      this.loading = false;
    },

    async fetchCats() {
      this.loading = true;
      await axios
        .get(`/api/dash/Appcats`)
        .then((res) => {
          this.cats = res.data.cats;
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
      this.loading = false;
    },

    selectImage() {
      this.form.image = this.$refs.image.files[0];
    },
    selectBenefit() {
      this.form.b_image = this.$refs.benefit.files[0];
    },
    selectLogo() {
      this.form.c_logo = this.$refs.logo.files[0];
    },
  },
};
</script>

<style></style>
