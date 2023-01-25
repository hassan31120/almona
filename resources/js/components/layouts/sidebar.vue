<template>
  <aside
    class="sidebar-left border-right bg-white shadow"
    id="leftSidebar"
    data-simplebar
  >
    <a
      href="#"
      class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3"
      data-toggle="toggle"
    >
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
          <img src="@/assets/faf.png" alt="logo" width="220" height="60" />
        </a>
      </div>

      <p class="text-muted nav-heading mt-4 mb-1">
        <span>Almona</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a
            href="#members"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-user fe-16"></i>
            <span class="ml-3 item-text">الأعضاء</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="members">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'users' }"
                ><span class="ml-1 item-text">كل الأعضاء</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_user' }"
                ><span class="ml-1 item-text">إضافة عضو جديد</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#data"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-database fe-16"></i>
            <span class="ml-3 item-text">البيانات</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="data">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">عرض البيانات</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">تعديل البيانات</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#team"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-users fe-16"></i>
            <span class="ml-3 item-text">أعضاء الفريق</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="team">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">كل الأعضاء</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">إضافة عضو جديد</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#partners"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-user-plus fe-16"></i>
            <span class="ml-3 item-text">الشركاء</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="partners">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">كل الشركاء</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">إضافة شريك جديد</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#apps"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-code fe-16"></i>
            <span class="ml-3 item-text">البرمجة</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="apps">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">كل الأقسام</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">إضافة قسم جديد</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">كل المشاريع البرمجية</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">إضافة مشروع جديد</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#motion"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-video fe-16"></i>
            <span class="ml-3 item-text">الموشن</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="motion">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">كل الأقسام</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">إضافة قسم جديد</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">عرض الفيديوهات</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">إضافة فيديو جديد</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#graphics"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-figma fe-16"></i>
            <span class="ml-3 item-text">التصاميم</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="graphics">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">كل الأقسام</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">إضافة قسم جديد</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">كل التصاميم</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">إضافة تصميم جديد</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#products"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-star fe-16"></i>
            <span class="ml-3 item-text">المنتجات</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="products">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">كل الأقسام</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">إضافة قسم جديد</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">كل المنتجات</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">إضافة منتج جديد</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#services"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-server fe-16"></i>
            <span class="ml-3 item-text">الخدمات</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="services">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">كل الخدمات</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">إضافة خدمة جديدة</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#orders"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-git-pull-request fe-16"></i>
            <span class="ml-3 item-text">الطلبات</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="orders">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">كل الطلبات</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#contact"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-wifi fe-16"></i>
            <span class="ml-3 item-text">التواصل</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="contact">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">كل طلبات التواصل</span>
              </router-link>
            </li>
          </ul>
        </li>
      </ul>
      <div class="btn-box w-100 mt-4 mb-1" v-if="log == 1">
        <button
          @click.prevent="logout"
          class="btn mb-2 btn-lg btn-block text-white"
          style="background-color: #ff7c00; border-radius: 50px"
        >
          <i class="fe fe-log-out fe-12 mr-2"></i><span class="small">تسجيل الخروج</span>
        </button>
      </div>
    </nav>
  </aside>
</template>

<script>
export default {
  name: "sidebar",
  data() {
    return {
      log: "",
    };
  },
  mounted() {
    this.auth();
  },
  methods: {
    logout() {
      axios.post(`api/logout`).then(() => {
        this.$router.push({ name: "login" });
      });
    },
    auth() {
      axios.get(`api/authenticated`).then((res) => {
        this.log = res.data;
      });
    },
  },
};
</script>

<style></style>
