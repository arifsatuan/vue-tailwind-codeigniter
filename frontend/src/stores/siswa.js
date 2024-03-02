// src/stores/students.js
import { defineStore } from 'pinia';
import axiosInstance from '../axiosConfig'; // Adjust the path as necessary

export const useStudentsStore = defineStore('students', {
  state: () => ({
    students: [],
  }),
  actions: {
    fetchStudents() {
    if (this.students.length) return; // Don't fetch if already have the students
   /* if (this.students.length) {
      console.log("Using cached students data", this.students);
      return; // Don't fetch if already have the students
    }*/
      return axiosInstance.get('/siswa')
        .then(response => {
          this.students = response.data;
         // console.log("Fetched students data", this.students); // Log fetched data
        })
        .catch(error => {
          console.error('There was an error fetching the students:', error);
        });
    }
  }
});
