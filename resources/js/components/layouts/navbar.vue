<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light navHassan">
    <div class="w-99 mb-4 d-flex">
      <router-link
        class="navbar-brand mx-auto mt-3 flex-fill text-center"
        :to="{ name: 'home' }"
      >
        <img src="@/assets/logo.png" alt="logo" width="150" />
      </router-link>
    </div>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
              <router-link class="nav-link pl-3" :to="{ name: 'info' }"
                ><span class="ml-1 item-text">عرض البيانات</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'edit_info' }"
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
              <router-link class="nav-link pl-3" :to="{ name: 'team' }"
                ><span class="ml-1 item-text">كل الأعضاء</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_team' }"
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
              <router-link class="nav-link pl-3" :to="{ name: 'partners' }"
                ><span class="ml-1 item-text">كل الشركاء</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_partner' }"
                ><span class="ml-1 item-text">إضافة شريك جديد</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#articles"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-book-open fe-16"></i>
            <span class="ml-3 item-text">المقالات</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="articles">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'articles' }"
                ><span class="ml-1 item-text">كل المقالات</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_article' }"
                ><span class="ml-1 item-text">إضافة مقال جديد</span>
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
              <router-link class="nav-link pl-3" :to="{ name: 'app_cats' }"
                ><span class="ml-1 item-text">كل الأقسام</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_app_cat' }"
                ><span class="ml-1 item-text">إضافة قسم جديد</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'apps' }"
                ><span class="ml-1 item-text">كل المشاريع البرمجية</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_app' }"
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
              <router-link class="nav-link pl-3" :to="{ name: 'motion_cats' }"
                ><span class="ml-1 item-text">كل الأقسام</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_motion_cat' }"
                ><span class="ml-1 item-text">إضافة قسم جديد</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'motions' }"
                ><span class="ml-1 item-text">عرض الفيديوهات</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_motion' }"
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
              <router-link class="nav-link pl-3" :to="{ name: 'graphic_cats' }"
                ><span class="ml-1 item-text">كل الأقسام</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_graphic_cat' }"
                ><span class="ml-1 item-text">إضافة قسم جديد</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'graphics' }"
                ><span class="ml-1 item-text">كل التصاميم</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_graphic' }"
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
              <router-link class="nav-link pl-3" :to="{ name: 'product_cats' }"
                ><span class="ml-1 item-text">كل الأقسام</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_product_cat' }"
                ><span class="ml-1 item-text">إضافة قسم جديد</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'products' }"
                ><span class="ml-1 item-text">كل المنتجات</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_product' }"
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
              <router-link class="nav-link pl-3" :to="{ name: 'services' }"
                ><span class="ml-1 item-text">كل الخدمات</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_service' }"
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
              <router-link class="nav-link pl-3" :to="{ name: 'orders' }"
                ><span class="ml-1 item-text">كل الطلبات</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#contacts"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-wifi fe-16"></i>
            <span class="ml-3 item-text">التواصل</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="contacts">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'contacts' }"
                ><span class="ml-1 item-text">كل طلبات التواصل</span>
              </router-link>
            </li>
          </ul>
        </li>
      </ul>
      <div class="btn-box w-100 mt-4 mb-1" v-if="log == 1">
        <button
          @click.prevent="logout"
          class="btn mb-2 btn-lg btn-block"
          style="
            background-color: #e4b75d;
            border-radius: 50px;
            color: #333333 !important;
          "
        >
          <i class="fe fe-log-out fe-12 mr-2" style="font-weight: 700 !important"></i
          ><span class="small" style="font-weight: 700 !important">تسجيل الخروج</span>
        </button>
      </div>
    </div>
  </nav>

  <nav class="topnav navbar navbar-light">
    <!-- <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button> -->
    <!-- <form class="form-inline mr-auto searchform text-muted">
      <input
        class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted"
        type="search"
        placeholder="Type something..."
        aria-label="Search"
      />
    </form> -->
    <ul class="nav">
      <!-- <li class="nav-item">
        <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
          <i class="fe fe-sun fe-16"></i>
        </a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link text-muted my-2"
          href="./#"
          data-toggle="modal"
          data-target=".modal-shortcut"
        >
          <span class="fe fe-grid fe-16"></span>
        </a>
      </li>
      <li class="nav-item nav-notif">
        <a
          class="nav-link text-muted my-2"
          href="./#"
          data-toggle="modal"
          data-target=".modal-notif"
        >
          <span class="fe fe-bell fe-16"></span>
          <span class="dot dot-md bg-success"></span>
        </a>
      </li> -->
      <!-- <li class="nav-item dropdown">
        <i class="fe fe-user"></i>
        {{ this.user.name }}
      </li> -->
    </ul>
  </nav>
</template>

<script>
export default {
  name: "navbar",
  data() {
    return {
      user: {},
      log: "",
    };
  },
  mounted() {
    this.auth();
  },
  methods: {
    getUser() {
      axios
        .get(`api/user`)
        .then((res) => {
          this.user = res.data;
        })
        .catch(() => {
          this.$router.push({ name: "error500" });
        });
    },
    auth() {
      axios.get(`api/authenticated`).then((res) => {
        this.log = res.data;
      });
    },
    async logout() {
      await axios.post(`api/logout`).then(() => {
        this.$router.push({ name: "login" });
      });
    },
  },
};
</script>

<style>
/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 992px) {
  .navHassan {
    display: none;
  }
}
</style>
