import axios from "axios";

const axiosClient = axios.create({
    baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`
})

axiosClient.interceptors.request.use(config => {
    // TODO Set Authorization Header
    // config.headers.Authorization = `Bearer ${store.state.user.token}`
    return config;
})

axiosClient.interceptors.response.use(response => {
    return response;
}, error => {
    if (error.response.status === 401) {
        //TODO logout mechanism or Unauthorized Page
    } else if (error.response.status === 404) {
        //TODO 404 page redirection
    }
    return error;
})

export default axiosClient;
