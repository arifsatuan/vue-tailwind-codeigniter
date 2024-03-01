d<template>
  <div class="lapsat-news-container bg-blue-700 p-5">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
      <!-- Featured News Post on the Left -->
      <div class="featured-post bg-transparent p-4">
        <div class="flex flex-col">
          <div class="bg-gray-200 relative w-full overflow-hidden rounded-lg" style=""> <!-- Adjust padding-top for aspect ratio -->
            <img :src="posts[0].imgpost" alt="Featured Post"  rel="preload" as="image"
            class="w-full h-64 object-cover mb-4 rounded-lg"
            @load="handleImageLoad($event)" style="opacity: 0;"> <!-- Initial opacity set to 0 -->
          </div>
          <div class="text-gray-200">
            <h2 class="text-2xl font-bold mb-2">{{ posts[0].title }}</h2>
            <p class="mb-2">{{ posts[0].date }}</p>
            <p>{{ posts[0].post.substring(0, 200) }}...</p>
          </div>
        </div>
      </div>

      <!-- Other News Posts on the Right -->
      <div class="news-posts space-y-4">
        <div v-for="(post, index) in posts.slice(1)" :key="post.slug" class="news-post flex bg-transparent p-4">
          <div class="bg-gray-200 relative w-full mr-4  h-24 rounded-sm" style=""> 
          <img :src="post.imgpost" alt="News Post" rel="preload" as="image" class="w-1/3 h-24 w-full object-cover mr-4 rounded-sm"
          @load="handleImageLoad($event)">
          </div>
            <div class="text-gray-100">
              <h3 class="text-lg font-bold mb-1">{{ post.title }}</h3>
              <p class="text-sm mb-1">{{ post.date }}</p>
              <p class="text-sm">{{ post.post.substring(0, 200) }}...</p>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'PostGrid',
  methods: {handleImageLoad(event) {
      event.target.style.opacity = 1; // Change the opacity to 1 when the image is loaded
    },
    handleImageLoadNew(event, postIndex) {
  if (postIndex === 0) {
    const largeImage = new Image();
    largeImage.src = this.posts[postIndex].imgpost; // Set source to larger image
    largeImage.onload = () => {
      if (this.$refs.featuredImage) { // Access the ref directly
        this.$refs.featuredImage.src = largeImage.src;
        this.$refs.featuredImage.style.opacity = 1;
      }
    };
  } else {
    event.target.style.opacity = 1;
  }
}
},
  data() {
    return {
      posts: [
        {
          slug: "post-1",
          title: "Post One",
          post: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ante massa, porttitor eget urna non, facilisis dictum ante. Donec vel commodo mauris. Etiam pharetra erat sem, a sodales lorem elementum ac. Nam dui odio, fringilla id eros non, finibus mattis odio. Nunc nisl sem, lacinia ac nulla ut, egestas mollis velit. Morbi sed nulla sit amet sapien gravida tristique. Praesent et condimentum justo, eget gravida felis. Aenean eros nibh, cursus vel finibus ut, tempus non felis. Ut cursus vestibulum diam sed imperdiet. Phasellus lobortis nulla leo, sed egestas tortor maximus ac. Nunc quis nibh ut turpis hendrerit egestas. Cras suscipit.",
          imgpost_s: "/img/postsimage/post1_s.webp", // Smaller version of the image
        imgpost: "/img/postsimage/post1.webp", // Larger version of the image
          date: "March 1, 2024"
        },
        {
          slug: "post-1",
          title: "Post One",
          post: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ante massa, porttitor eget urna non, facilisis dictum ante. Donec vel commodo mauris. Etiam pharetra erat sem, a sodales lorem elementum ac. Nam dui odio, fringilla id eros non, finibus mattis odio. Nunc nisl sem, lacinia ac nulla ut, egestas mollis velit. Morbi sed nulla sit amet sapien gravida tristique. Praesent et condimentum justo, eget gravida felis. Aenean eros nibh, cursus vel finibus ut, tempus non felis. Ut cursus vestibulum diam sed imperdiet. Phasellus lobortis nulla leo, sed egestas tortor maximus ac. Nunc quis nibh ut turpis hendrerit egestas. Cras suscipit.",
          imgpost: "/img/postsimage/post2.webp", 
          date: "March 2, 2024"
        },
        {
          slug: "post-1",
          title: "Post One",
          post: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ante massa, porttitor eget urna non, facilisis dictum ante. Donec vel commodo mauris. Etiam pharetra erat sem, a sodales lorem elementum ac. Nam dui odio, fringilla id eros non, finibus mattis odio. Nunc nisl sem, lacinia ac nulla ut, egestas mollis velit. Morbi sed nulla sit amet sapien gravida tristique. Praesent et condimentum justo, eget gravida felis. Aenean eros nibh, cursus vel finibus ut, tempus non felis. Ut cursus vestibulum diam sed imperdiet. Phasellus lobortis nulla leo, sed egestas tortor maximus ac. Nunc quis nibh ut turpis hendrerit egestas. Cras suscipit.",
          imgpost: "/img/postsimage/post3.webp", 
          date: "March 3, 2024"
        },
        // ... Add more posts with different sig values for images
        {
          slug: "post-6",
          title: "Post Six",
          post: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ante massa, porttitor eget urna non, facilisis dictum ante. Donec vel commodo mauris. Etiam pharetra erat sem, a sodales lorem elementum ac. Nam dui odio, fringilla id eros non, finibus mattis odio. Nunc nisl sem, lacinia ac nulla ut, egestas mollis velit. Morbi sed nulla sit amet sapien gravida tristique. Praesent et condimentum justo, eget gravida felis. Aenean eros nibh, cursus vel finibus ut, tempus non felis. Ut cursus vestibulum diam sed imperdiet. Phasellus lobortis nulla leo, sed egestas tortor maximus ac. Nunc quis nibh ut turpis hendrerit egestas. Cras suscipit..",
          imgpost: "/img/postsimage/post4.webp", 
          date: "March 6, 2024"
        }
        // Your dummy data array of posts
      ]
    };
  },
  created() {
    // Fetch the real posts when you're ready
  },
  // Methods, etc.
};
</script>
  
<style scoped>
.lapsat-news-container {
  max-width: 1200px; /* or any maximum width that suits your design */
  margin: 0 auto; /* This centers the container if there's space on the sides */
  /* Assuming your build setup allows you to resolve paths from the public folder */
  background-image: url('@/assets/pattern.webp');
  background-size: 100% auto;
  background-position: bottom;
  background-repeat: no-repeat;

}
</style> 
  