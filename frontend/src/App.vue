<template>
  <div>
    <AppHeader />
    <router-view />
  </div>
</template>

<script>
import AppHeader from './components/layout/HeaderComponent.vue';

export default {
  name: 'App',
  components: {
    AppHeader
  }
};
</script>

<style>
/* Global styles if needed */
</style>
