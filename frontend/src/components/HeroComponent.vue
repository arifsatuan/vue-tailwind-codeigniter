<template>
    <div class="hero-container mt-20 bg-blue-700">
      <h1>Welcome to Our Site!</h1>
      <p>Explore our services and products.</p>
    </div>
  </template>
  
  <script>
  export default {
    name: 'HeroComponent',
  }
  </script>
  
  <style scoped>
  .hero-container {
    color: #fff; /* Adjust text color as needed */
   
    padding: 50px 20px;
    position: relative;
    /* SVG Background */
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%230099ff" fill-opacity="1" d="M0,96L60,85.3C120,75,240,53,360,42.7C480,32,600,32,720,58.7C840,85,960,139,1080,144C1200,149,1320,107,1380,85.3L1440,64L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>');
    background-repeat: no-repeat;
    background-position: bottom;
    background-size: 100% auto;
  }
  </style>
  