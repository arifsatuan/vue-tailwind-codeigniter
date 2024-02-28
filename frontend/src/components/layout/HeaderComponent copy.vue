<template>
  <header class="bg-transparent py-3 absolute w-full top-0 left-0 flex items-center z-[9999]">
    <div class="container mx-auto px-4 lg:px-0">
      <div class="flex items-center justify-between relative">
        <div class="px-4">
          <router-link to="/" class="font-bold text-lg text-primary block py-0">
            <img src="img/logo_81_web.svg" rel="preload" as="image" class="h-12" alt="Logo">
          </router-link>
        </div>
        <div class="flex items-center px-4">
          <button @click="toggleMenu" id="hamburger" ref="hamburger" name="hamburger"
            class="block absolute right-4 lg:hidden" aria-label="Menu">
            <span
              :class="{ 'hamburger-line origin-top-left transition duration-300 ease-in-out': true, 'transform rotate-45': isOpen }"></span>
            <span :class="{ 'hamburger-line transition duration-300 ease-in-out': true, 'opacity-0': isOpen }"></span>
            <span
              :class="{ 'hamburger-line origin-bottom-left transition duration-300 ease-in-out': true, 'transform -rotate-45': isOpen }"></span>
          </button>
          <nav
            :class="{ 'hidden': !isOpen, 'absolute py-3 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none': true }"
            id="nav-menu" ref="menu">
            <ul class="block lg:flex">
              <li v-for="item in menuItems" :key="item.name" class="group" :class="{ 'relative': item.submenu }">
                <router-link :to="item.path"
                  class="text-base text-dark p-2 mx-1 flex group-hover:text-primary hover:bg-blue-700 hover:rounded-lg hover:text-gray-100"
                  v-if="!item.submenu">
                  {{ item.name }}
                </router-link>
                <div  v-if="item.submenu" @click="item.submenu ? toggleSubmenu(item) : ''"
                  class="text-base text-dark p-2 mx-1 flex group-hover:text-primary hover:bg-blue-700 hover:rounded-lg hover:text-gray-100 cursor-pointer">
                  {{ item.name }}
                </div>
                <div v-if="item.isOpen && item.submenu" class="absolute left-0 mt-1 bg-white shadow-lg rounded-lg">
                  <ul class="py-1">
                    <li v-for="subitem in item.submenu" :key="subitem.name">
                      <router-link :to="subitem.path"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:rounded-lg hover:text-gray-100">
                        {{ subitem.name }}
                      </router-link>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: 'AppHeader',
  data() {
    return {
      isOpen: false,
      isTouchDevice: false,
      menuItems: [
        { path: '/', name: 'Home' },
        { path: '/about', name: 'Siswa' },
        {
          name: 'Profile',
          submenu: [
            { path: '/kesiswaan', name: 'Kesiswaan' },
            { path: '/sejarah', name: 'Sejarah' },
            { path: '/visi-misi', name: 'Visi Misi' },
          ],
          isOpen: false,
        },
        {
          name: 'Bidang',
          submenu: [
            { path: '/kurikulum', name: 'Kurikulum' },
            { path: '/tu', name: 'Tata Usaha' },
            { path: '/dapodik', name: 'Dapodik' },
          ],
          isOpen: false,
        },
        // More menu items if needed
      ],
    };
  },
  mounted() {
    this.isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;
    document.addEventListener('click', this.handleClickOutside, true);
    window.addEventListener('scroll', this.handleScroll);
  },
  beforeDestroy() {
    document.removeEventListener('click', this.handleClickOutside, true);
    window.removeEventListener('scroll', this.handleScroll);
  },
  methods: {
    toggleMenu() {
      this.isOpen = !this.isOpen;
    },
    toggleSubmenu(item) {
      if (item.submenu) {
        item.isOpen = !item.isOpen;
        // Close other open submenus
        this.menuItems.forEach((menuItem) => {
          if (menuItem !== item && menuItem.submenu) {
            menuItem.isOpen = false;
          }
        });
      }
    },
    handleScroll() {
      const header = document.querySelector('header');
      if (window.pageYOffset > 0) {
        header.classList.add('navbar-fixed');
      } else {
        header.classList.remove('navbar-fixed');
      }
    },
    handleClickOutside(event) {
      const menu = this.$refs.menu; // Assuming you've added a `ref="menu"` to the <nav> element
      const hamburger = this.$refs.hamburger; // Assuming you've added a `ref="hamburger"` to the hamburger button
      if (!menu.contains(event.target) && !hamburger.contains(event.target)) {
        this.isOpen = false;
        // Close all open submenus
        this.menuItems.forEach((menuItem) => {
          if (menuItem.submenu) {
            menuItem.isOpen = false;
          }
        });
      }
    }
  },
};
</script>

<style scoped>
.header-container {

  margin-left: auto;
  margin-right: auto;
  width: 100%;
}

.container {
  max-width: 1200px;
}

/* Add your styles for navbar-fixed and hamburger lines here */
.navbar-fixed {

  position: fixed;
  z-index: 9999;
  background-color: rgb(255 255 255 / var(--tw-bg-opacity));
  --tw-bg-opacity: 0.4;
  -webkit-backdrop-filter: blur(5px);
  backdrop-filter: blur(5px);
  box-shadow: inset 0 -1px 0 0 rgba(0, 0, 0, 0.2);
}

.hamburger-line {
  display: block;
  width: 30px;
  height: 3px;
  background-color: #333;
  margin: 5px 0;
  /* Hamburger line color */
  margin: 5px 0;
  transition: all 0.3s ease-in-out;
}</style>