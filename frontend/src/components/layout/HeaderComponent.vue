<template>
    <header class="bg-transparent  py-3 absolute w-full top-0 left-0 flex items-center z-[9999]">
      <div class="container mx-auto">
        <div class="flex items-center justify-between relative">
          <div class="px-4">
            <router-link to="/" class="font-bold text-lg text-primary block py-0">
              <img src="img/logo_81_web.svg" rel="preload" as="image"  class="h-12" alt="Logo">
            </router-link>
          </div>
          <div class="flex items-center px-4">
            <button @click="toggleMenu" id="hamburger" name="hamburger" class="block absolute right-4 lg:hidden" aria-label="Menu">
              <span :class="{'hamburger-line origin-top-left transition duration-300 ease-in-out': true, 'transform rotate-45': isOpen}"></span>
              <span :class="{'hamburger-line transition duration-300 ease-in-out': true, 'opacity-0': isOpen}"></span>
              <span :class="{'hamburger-line origin-bottom-left transition duration-300 ease-in-out': true, 'transform -rotate-45': isOpen}"></span>
            </button>
            <nav :class="{ 'hidden': !isOpen, 'absolute py-3 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none': true }" id="nav-menu">
              <ul class="block lg:flex">
                <li class="group">
                  <router-link to="/"
                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">SMAN 81 Jakarta</router-link>
                </li>
                <li class="group">
                  <router-link to="/about"
                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Calculator PPDB</router-link>
                </li>
                <!-- More links -->
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
      };
    },
    methods: {
      toggleMenu() {
        this.isOpen = !this.isOpen;
      }
    },
    mounted() {
      window.addEventListener('scroll', this.handleScroll);
    },
    beforeDestroy() {
      window.removeEventListener('scroll', this.handleScroll);
    },
    methods: {
      handleScroll() {
        const header = document.querySelector('header');
        if (window.pageYOffset > 0) {
          header.classList.add('navbar-fixed');
        } else {
          header.classList.remove('navbar-fixed');
        }
      },
      toggleMenu() {
        this.isOpen = !this.isOpen;
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your styles for navbar-fixed and hamburger lines here */
  .navbar-fixed {
    position: fixed;
    z-index: 9999;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity));
    --tw-bg-opacity: 0.4;
    -webkit-backdrop-filter: blur(5px);
            backdrop-filter: blur(5px);
    box-shadow: inset 0 -1px 0 0 rgba(0,0,0,0.2);
  }
  .hamburger-line {
    display: block;
    width: 30px;
    height: 3px;
    background-color: #333; /* Hamburger line color */
    margin: 5px 0;
    transition: all 0.3s ease-in-out;
  }
  </style>