<template>
    <div class="smaga-news-container bg-white p-5">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <!-- Featured News Post on the Left -->
        <div class="featured-post bg-transparent p-4">
          <div class="flex flex-col">
            <img :src="posts[0].imgpost" alt="Featured Post" class="w-full h-64 object-cover mb-4 rounded-lg">
            <div class="text-gray-900">
              <h3 class="text-2xl font-bold mb-2">{{ posts[0].title }}</h3>
              <p class="mb-2">{{ posts[0].date }}</p>
              <p>{{ posts[0].post.substring(0, 200) }}...</p>
            </div>
          </div>
        </div>
        
        <!-- Other News Posts on the Right -->
        <div class="news-posts space-y-4">
          <div v-for="(post, index) in posts.slice(1)" :key="post.slug" class="news-post flex bg-transparent p-4">
            <img :src="post.imgpost" alt="News Post" class="w-1/3 h-24 object-cover mr-4 rounded-lg">
            <div class="text-gray-900">
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
    data() {
      return {
        posts: [
        {
          slug: "post-1",
          title: "Post One",
          post: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ante massa, porttitor eget urna non, facilisis dictum ante. Donec vel commodo mauris. Etiam pharetra erat sem, a sodales lorem elementum ac. Nam dui odio, fringilla id eros non, finibus mattis odio. Nunc nisl sem, lacinia ac nulla ut, egestas mollis velit. Morbi sed nulla sit amet sapien gravida tristique. Praesent et condimentum justo, eget gravida felis. Aenean eros nibh, cursus vel finibus ut, tempus non felis. Ut cursus vestibulum diam sed imperdiet. Phasellus lobortis nulla leo, sed egestas tortor maximus ac. Nunc quis nibh ut turpis hendrerit egestas. Cras suscipit.",
          imgpost: "https://source.unsplash.com/random/200x200?sig=1",
          date: "March 1, 2024"
        },
        {
          slug: "post-1",
          title: "Post One",
          post: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ante massa, porttitor eget urna non, facilisis dictum ante. Donec vel commodo mauris. Etiam pharetra erat sem, a sodales lorem elementum ac. Nam dui odio, fringilla id eros non, finibus mattis odio. Nunc nisl sem, lacinia ac nulla ut, egestas mollis velit. Morbi sed nulla sit amet sapien gravida tristique. Praesent et condimentum justo, eget gravida felis. Aenean eros nibh, cursus vel finibus ut, tempus non felis. Ut cursus vestibulum diam sed imperdiet. Phasellus lobortis nulla leo, sed egestas tortor maximus ac. Nunc quis nibh ut turpis hendrerit egestas. Cras suscipit.",
          imgpost: "https://source.unsplash.com/random/200x200?sig=2",
          date: "March 2, 2024"
        },
        {
          slug: "post-1",
          title: "Post One",
          post: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ante massa, porttitor eget urna non, facilisis dictum ante. Donec vel commodo mauris. Etiam pharetra erat sem, a sodales lorem elementum ac. Nam dui odio, fringilla id eros non, finibus mattis odio. Nunc nisl sem, lacinia ac nulla ut, egestas mollis velit. Morbi sed nulla sit amet sapien gravida tristique. Praesent et condimentum justo, eget gravida felis. Aenean eros nibh, cursus vel finibus ut, tempus non felis. Ut cursus vestibulum diam sed imperdiet. Phasellus lobortis nulla leo, sed egestas tortor maximus ac. Nunc quis nibh ut turpis hendrerit egestas. Cras suscipit.",
          imgpost: "https://source.unsplash.com/random/200x200?sig=3",
          date: "March 3, 2024"
        },
        // ... Add more posts with different sig values for images
        {
          slug: "post-6",
          title: "Post Six",
          post: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ante massa, porttitor eget urna non, facilisis dictum ante. Donec vel commodo mauris. Etiam pharetra erat sem, a sodales lorem elementum ac. Nam dui odio, fringilla id eros non, finibus mattis odio. Nunc nisl sem, lacinia ac nulla ut, egestas mollis velit. Morbi sed nulla sit amet sapien gravida tristique. Praesent et condimentum justo, eget gravida felis. Aenean eros nibh, cursus vel finibus ut, tempus non felis. Ut cursus vestibulum diam sed imperdiet. Phasellus lobortis nulla leo, sed egestas tortor maximus ac. Nunc quis nibh ut turpis hendrerit egestas. Cras suscipit..",
          imgpost: "https://source.unsplash.com/random/200x200?sig=6",
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
  /* Your styling here */
  </style>
  