<template>
    <InstagramFeed
      :count="12"
      :accessToken="b3fe9a84840ec931a1199ba1be0d8f06"
      :pagination="true"
      :caption="true"
    />
  </template>
  
  <script>
  import InstagramFeed from 'vue3-instagram-feed';
  
  export default {
    components: {
      InstagramFeed // Corrected component name
    },
    props: {
      accessToken: {
        type: String,
        required: true
      },
      // Include other props if needed
    },
    // Custom methods, computed properties, etc. go here
  };
  </script>
  
  <style scoped>
  /* Custom styles for your component here */
  </style>
  