<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">أعضاء الفريق</h2>

      <table class="table mt-5 table-hover">
        <thead style="background-color: #e4b75d">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الإسم</th>
            <th scope="col">الصورة</th>
            <th scope="col">الوظيفة</th>
            <th scope="col">لينكد ان</th>
            <th scope="col">فيسبوك</th>
            <th scope="col">انستاجرام</th>
            <th scope="col">تويتر</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(team, index) in teams" :key="team.id">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ team.name }}</td>
            <td>
              <img :src="team.image" width="100" height="70" alt="" />
            </td>
            <td>{{ team.job }}</td>
            <td v-if="team.linkedin">
              <a :href="team.linkedin" target="_blank">إضغط هنا</a>
            </td>
            <td v-if="!team.linkedin">لا يوجد</td>
            <td v-if="team.facebook">
              <a :href="team.facebook" target="_blank">إضغط هنا</a>
            </td>
            <td v-if="!team.facebook">لا يوجد</td>

            <td v-if="team.instagram">
              <a :href="team.instagram" target="_blank">إضغط هنا</a>
            </td>
            <td v-if="!team.instagram">لا يوجد</td>

            <td v-if="team.twitter">
              <a :href="team.twitter" target="_blank">إضغط هنا</a>
            </td>
            <td v-if="!team.twitter">لا يوجد</td>

            <td class="actions">
              <router-link :to="{ name: 'edit_team', params: { id: team.id } }">
                <button type="button"><i class="fe fe-edit fe-16"></i></button
              ></router-link>
              <button type="button" @click="delCat(team.id)">
                <i class="fe fe-trash fe-16"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- pagination -->
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <li
            class="page-item"
            v-for="link in pagination.links"
            :key="link"
            v-bind:class="[{ disabled: !link.url }, { haha: link.active }]"
          >
            <a
              class="page-link"
              href="#"
              v-html="link.label"
              @click="fetchTeam(link.url)"
            ></a>
          </li>
        </ul>
      </nav>
    </div>
  </main>
</template>

<script>
import loadingPage from "../layouts/laoding.vue";
import axios from "axios";

export default {
  name: "team",
  components: { loadingPage },
  data() {
    return {
      teams: [],
      loading: false,
      pagination: {},
    };
  },
  mounted() {
    this.fetchTeam();
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
            axios.post(`/api/dash/team/destroy/${id}`);
            this.$swal.fire("تم!", "تم الحذف بنجاح", "success");
            this.fetchTeam();
          }
        });
    },

    async fetchTeam(page_url) {
      this.loading = true;
      page_url = page_url || `api/dash/team`;
      await axios
        .get(page_url)
        .then((res) => {
          this.teams = res.data.data;
          this.makePagination(res.data.meta);
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
      this.loading = false;
    },

    async makePagination(meta) {
      let pagination = {
        links: meta.links,
      };
      this.pagination = pagination;
    },
  },
};
</script>

<style></style>
