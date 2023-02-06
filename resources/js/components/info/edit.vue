<template>
  <main role="main" class="main-content" style="">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <form @submit.prevent="saveForm">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">تعديل البيانات</strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 align-self-center">
                <div class="form-group mb-3">
                  <label for="simpleinput">المشاهدات</label>
                  <input
                    type="number"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.views"
                    required
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">العملاء</label>
                  <input
                    type="number"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.customers"
                    required
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">الموظفين</label>
                  <input
                    type="number"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.employees"
                    required
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">المشاريع</label>
                  <input
                    type="number"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.projects"
                    required
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">البريد الالكتروني</label>
                  <input
                    type="email"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.email"
                    required
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">الرقم</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.number"
                    required
                  />
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
              <!-- /.col -->
              <div class="col-md-6 align-self-center">
                <img src="@/assets/logo.png" class="img-thumbnail" alt="" />
              </div>
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
  name: "edit_info",
  components: { loadingPage },
  data() {
    return {
      loading: false,
      form: {
        views: "",
        customers: "",
        employees: "",
        projects: "",
        email: "",
        number: "",
      },
      errors: [],
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
          this.form = res.data.info;
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
        title: "تم تعديل البيانات بنجاح",
      });
    },
    async saveForm() {
      this.loading = true;
      await axios
        .post(`/api/dash/info/update`, this.form, {
          headers: {
            Accept: "application/json",
            "Content-Type": "multipart/form-data",
          },
        })
        .then(() => {
          this.fetchInfo();
          this.alert();
        })
        .catch((error) => {
          console.log(error);
        });
      this.loading = false;
    },
  },
};
</script>

<style scoped>
.main-content {
  display: flex;
  align-items: center;
}
</style>
