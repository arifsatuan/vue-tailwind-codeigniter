// src/axios.js
import axios from 'axios';

const axiosInstance = axios.create({
  //baseURL: 'http://localhost:8081', 
  baseURL: 'http://192.168.8.101:8081', // Your API base URL
  // Any other configurations here
});

export default axiosInstance;
