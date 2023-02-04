<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">كل طلبات التواصل</h2>

      <table class="table mt-5 table-hover">
        <thead style="background-color: #ff7c00">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الإسم</th>
            <th scope="col">البريد الالكتروني</th>
            <th scope="col">الرقم</th>
            <th scope="col">الموضوع</th>
            <th scope="col">الرسالة</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(contact, index) in contacts" :key="contact.id">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ contact.name }}</td>
            <td>{{ contact.email }}</td>
            <td>{{ contact.number }}</td>
            <td>{{ contact.subject }}</td>
            <td>{{ contact.message }}</td>
            <td class="actions">
              <button type="button" @click="delCat(contact.id)">
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
  name: "contacts",
  components: { loadingPage },
  data() {
    return {
      contacts: [],
      loading: false,
    };
  },
  mounted() {
    this.fetchcontacts();
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
            axios.post(`/api/dash/contact/destroy/${id}`);
            this.$swal.fire("تم!", "تم الحذف بنجاح", "success");
            this.fetchcontacts();
          }
        });
    },

    async fetchcontacts() {
      this.loading = true;
      await axios
        .get(`api/dash/contacts`)
        .then((res) => {
          this.contacts = res.data.contacts;
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
