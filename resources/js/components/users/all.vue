<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">كل الأعضاء</h2>

      <table class="table mt-5 table-hover">
        <thead style="background-color: #e4b75d">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الإسم</th>
            <th scope="col">رقم الهاتف</th>
            <th scope="col">الإيميل</th>
            <th scope="col">نوع المستخدم</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(user, index) in users" :key="user.id">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ user.name }}</td>
            <td>{{ user.number }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.userType }}</td>
            <td class="actions">
              <router-link :to="{ name: 'edit_user', params: { id: user.id } }">
                <button type="button"><i class="fe fe-edit fe-16"></i></button
              ></router-link>
              <button type="button" @click="delUser(user.id)">
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

export default {
  name: "users",
  components: { loadingPage },
  data() {
    return {
      users: [],
      loading: false,
    };
  },
  mounted() {
    this.fetchUsers();
  },
  methods: {
    delUser(id) {
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
            axios.post(`api/dash/user/del/${id}`);
            this.$swal.fire("تم!", "تم الحذف بنجاح", "success");
            this.fetchUsers();
          }
        });
    },
    async fetchUsers() {
      this.loading = true;
      await axios
        .get(`api/dash/users`)
        .then((res) => {
          this.users = res.data.users;
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
