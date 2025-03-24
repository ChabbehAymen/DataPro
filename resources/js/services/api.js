import axios from 'axios';

const api = axios.create({
    baseURL: import.meta.env.VITE_APP_API_URL || 'http://127.0.0.1:8000',
    headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
    },
    withCredentials: true, // Ensures cookies are sent with requests
});

// Add CSRF Token Interceptor
api.interceptors.request.use(config => {
    const token = document.head.querySelector('meta[name="csrf-token"]');
    if (token) {
        config.headers['X-CSRF-TOKEN'] = token.content;
    }
    return config;
});

// Add response interceptor for better error handling
api.interceptors.response.use(
    response => response,
    error => {
        console.error('API Error:', error.response || error);
        if (error.response && error.response.status === 401) {
            // Redirect to login page if unauthenticated
            window.location.href = '/login';
        }
        return Promise.reject(error);
    }
);

export default {
    // Try both endpoints to see which one works
    async getProfile() {
        try {
            return await api.get('/profile');
        } catch (error) {
            if (error.response && error.response.status === 404) {
                // Fallback to /user endpoint if /profile returns 404
                return api.get('/user');
            }
            throw error;
        }
    },

    updateProfile(userData) {
        return api.put('/profile', userData);
    },

    uploadAvatar(formData) {
        return api.post('/profile/avatar', formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        });
    },

    updatePassword(passwordData) {
        return api.put('/profile/password', passwordData);
    },

    getUserProfile(userId) {
        return api.get(`/users/${userId}`);
    },
};
