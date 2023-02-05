<template>
  <div class="wrapper vh-100" style="overflow: hidden; background-color: #333333">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="row align-items-center d-felx justify-content-center h-100">
      <div class="col-lg-6">
        <div class="w-50 mx-auto">
          <form @submit.prevent="saveForm" class="mx-auto text-center">
            <a
              class="navbar-brand mx-auto mt-2 flex-fill text-center"
              href="./index.html"
            >
              <img src="@/assets/logoGold.png" alt="" style="width: 300px" />
            </a>
            <div class="form-group">
              <input
                type="email"
                class="form-control form-control-lg"
                placeholder="الإيميل"
                required=""
                autofocus=""
                v-model="form.email"
                style="border-radius: 10px"
              />
              <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
            </div>
            <div class="form-group">
              <input
                type="password"
                class="form-control form-control-lg"
                placeholder="الرقم السري"
                required=""
                v-model="form.password"
                style="border-radius: 10px"
              />
              <span class="text-danger" v-if="errors.password">{{
                errors.password[0]
              }}</span>
            </div>
            <!-- <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me" /> Stay logged in
              </label>
            </div> -->
            <button
              class="btn btn-lg btn-block"
              style="
                background-color: #e4b75d;
                border-radius: 10px;
                color: #333333;
                font-weight: 700 !important;
              "
              type="submit"
            >
              تسجيل الدخول
            </button>
          </form>
        </div>
        <!-- .card -->
      </div>
      <!-- ./col -->
    </div>
    <!-- .row -->
  </div>
</template>

<script>
import loadingPage from "../layouts/laoding.vue";

export default {
  name: "login",
  components: { loadingPage },
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      errors: [],
      loading: false,
    };
  },

  methods: {
    async saveForm() {
      this.loading = true;
      await axios
        .post(`api/dashLogin`, this.form)
        .then(() => {
          this.$router.push({ name: "home" });
        })
        .catch((error) => {
          this.errors = error.response.data;
        });
      this.loading = false;
    },
  },
};
</script>

<style></style>
