<template>
  <div class="home">
    <HeroComponent/>
    <PostGrid/>
 <Cards msg="Welcome to Your Vue.js App"/>
    
  </div>
</template>

<script>
// @ is an alias to /src
import Cards from '@/components/CardsComponent.vue'
import HeroComponent from '@/components/HeroComponent.vue'
import PostGrid from '@/components/PostGrid.vue';
export default {
  name: 'HomeView',
  components: {
    Cards,
    HeroComponent,
    PostGrid,
 
}
}
</script>
