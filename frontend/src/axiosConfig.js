// src/axios.js
import axios from 'axios';

const axiosInstance = axios.create({
  //baseURL: 'http://localhost:8081', 
  baseURL: 'http://localhost:8081', // Your API base URL
  // Any other configurations here
});

export default axiosInstance;
