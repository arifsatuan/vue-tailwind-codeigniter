<template>
    <div class="hero-container mt-20 mx-auto text-white bg-gray-900">
     <div class="pt-16 px-16"><h1>Welcome to Our Site!</h1>
      <p>Explore our services and products.</p>
    </div> 
      <div class="spacer"></div>
    </div>

  </template>
  
  <script>
  export default {
    name: 'HeroComponent',
  }
  </script>
  
  <style scoped>
  .spacer {
 max-width: 1200px;
  margin: 0 auto; /* Remove top margin if there was any */
  width: 100%;
  height:0; /* Initially set to 0 to remove space */
  padding-bottom: calc(100% * (15 / 96)); /* This will maintain the aspect ratio of the SVG */
  background-image: url('@/assets/wave.svg');
  background-repeat: no-repeat;
  background-position: center bottom; /* Adjust to 'center top' if the wave should be at the top */
  background-size: 100% ;
  display: block;
}


.hero-container {
  max-width: 1200px; /* or any maximum width that suits your design */
  margin-top: 80px; 
  margin-bottom: 0px; /* Remove bottom margin */
  display: block; /* 'display: relative;' is not valid. You likely mean 'position: relative;' */
  padding: 0;
  position: relative;
  /* Make sure there's no additional margin causing space */
}



  </style>
  