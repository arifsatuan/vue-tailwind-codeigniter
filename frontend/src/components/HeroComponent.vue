<template>
    <div class="hero-container mt-20 text-white bg-gray-900">
      <h1>Welcome to Our Site!</h1>
      <p>Explore our services and products.</p>
    </div>
    <div class="spacer layer1"></div>
  </template>
  
  <script>
  export default {
    name: 'HeroComponent',
  }
  </script>
  
  <style scoped>
  .spacer {
  width: 100%;
  height: 0; /* Initially set to 0 to remove space */
  padding-bottom: calc(100% * (13 / 96)); /* This will maintain the aspect ratio of the SVG */
  background-image: url('@/assets/wave.svg');
  background-repeat: no-repeat;
  background-position: center bottom; /* Adjust to 'center top' if the wave should be at the top */
  background-size: 100% auto;
  display: block;
}

.layer1 {
  /* If you need any additional styles for .layer1, add them here */
}

.hero-container {
  display: block; /* 'display: relative;' is not valid. You likely mean 'position: relative;' */
  padding: 50px 20px;
  position: relative;
  /* Make sure there's no additional margin causing space */
}



  </style>
  