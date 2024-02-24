<template>
  <div class="p-4">
    <h1 class="text-2xl font-bold mb-4">{{ msg }}</h1>
    <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-5 gap-4">
      <!--  <div v-for="n in 6" :key="n" class="max-w-sm rounded overflow-hidden shadow-lg">-->
      <div
      v-for="(student, index) in students.slice(0, cardsToShow)"
      :key="student.peserta_didik_id"
        class="max-w-sm rounded overflow-hidden shadow-lg"
      >
        <!-- Responsive container maintaining a square aspect ratio -->
        <div
          class="bg-gray-200 relative w-full overflow-hidden"
          style="padding-top: 100%"
        >
          <!-- :src="`https://source.unsplash.com/random/50x50?sig=${n}`" --><img
            class="absolute top-0 left-0 w-full h-full object-cover"
           
            :src="`img/webp/${index + 1}.webp`" rel="preload" as="image" 
            alt="Image student" loading="lazy" 
            @load="handleImageLoad($event)"
          />
        </div>
        <div class="px-6 py-4">
          <div class="font-bold text-sm  sm:text-base md:text-sm mb-2">Card Title</div>
          <p class="text-gray-700 text-sm   ">
        ID: {{ student.nipd }} / {{ student.nama_rombel }}<br>
        Nama :  {{ student.nama }}
      </p>
        </div>
        <div class="px-6 pt-4 pb-2">
          <button
            class="bg-blue-700 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 text-white font-bold py-2 px-4 rounded"
            aria-label="Submit form" >
            Read Mode
          </button>
        </div>
      </div>
    </div>
    <!-- Load More Trigger -->
    <div ref="loadMoreTrigger" class="observer-element"></div>
  </div>
</template>

<script>
import axiosInstance from '../axiosConfig'; // Adjust the path as necessary

export default {
  name: "Cards",
  data() {
    return {
      cardsToShow: 6,
    //  cards: Array.from({ length: 1000 }, (_, i) => i + 1),
      students: []
    };
  },
  mounted() {

  this.fetchStudents(); // Call fetchStudents to load the data
    this.$nextTick(() => {
      this.observeLastCard();
    });
  },
  methods: {
    fetchStudents() {
      // Replace 'localhost:8081/siswa' with the actual URL of your API
      axiosInstance.get('/siswa')
        .then(response => {
          this.students = response.data; // Assign the fetched data to students array
// If you want tossign the fetched data to students array
        })
        .catch(error => {
          console.error('There was an error fetching the students data:', error);
        });
    },
    handleLoad(event, n) {
      // Replace the src with the high-resolution image
      event.target.src = `https://source.unsplash.com/random/400x400?sig=${n}`;
    },
    loadMoreCards() {
      this.cardsToShow += 6;
      this.$nextTick(() => {
        // Ensure the DOM is updated before re-calling observeLastCard
        this.observeLastCard();
      });
    },
    handleImageLoad(event) {
      event.target.style.opacity = 1;
    },
    observeLastCard() {
      const options = {
        root: null,
        rootMargin: "0px",
        threshold: 0.1,
      };
      const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            this.loadMoreCards();
            // Optional: You might want to unobserve the current element
            // observer.unobserve(entry.target);
          }
        });
      }, options);

      const lastCard = this.$refs.loadMoreTrigger;
      if (lastCard) {
        observer.observe(lastCard);
      }
    },
  },
};
</script>

<!-- Tailwind CSS scoped styling -->
<style scoped>
img {
  opacity: 0; /* Make image initially invisible */
  transition: opacity 0.5s ease-in-out; /* Smooth transition for loading effect */
}
.observer-element {
  width: 100%;
  height: 20px; /* Minimal height to ensure it's in the document flow */
}
.button:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(15, 58, 93, 0.6); /* Focus ring for better visibility */
}
</style>
