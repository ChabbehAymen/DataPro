import axios from 'axios';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;

function throwError(error) {
    console.error('[GET DATA]:: Something Went Wrong', error);
}
export function addProductToCard(id, user) {
    if (user.bool) {
        try {
            axios.post(`/cart/${id}`).then(response => {
                console.log(response.data);
            });
        } catch (error) {
            throwError(error);
        }
    } else window.location.href = '/login';
}

export async function fetchTags()
{
    try {
        const response = await axios.get('/tags');
        return response.data;
    } catch (e) {
        throwError(e);
        return [];
    }
}

export async function fetchProducts()
{
    try {
        const response = await axios.get('/products');
        return response.data;
    } catch (e) {
        throwError(e);
        return [];
    }
}

export async function fetchProductsByTag(id)
{
    try {
        const response = await axios.get(`/products/tag/${id}`);
        return response.data;
    } catch (e) {
        throwError(e);
        return [];
    }
}

export async function fetchProductById(id)
{
    try {
        const response = await axios.get(`/products/${id}`);
        return response.data;
    } catch (e) {
        throwError(e);
        return [];
    }
}
//frtct user data
export async function fetchUser() {
    try {
        const response = await axios.get('/user');
        return response.data;
    } catch (error) {
        throwError(error);
        return [];
    }
}
//update user data
export async function updateUser(userData) {
    try {
        const response = await axios.put('/user/update', userData, {
            headers: { 'Content-Type': 'application/json' }
        });
        return response.data;
    } catch (error) {
        console.error("Error updating profile:", error.response?.data || error);
        return [];
    }
}
// update password for user
export async function updatePassword(passwordData){
    try {
        const response = await axios.put('/user/update-password', passwordData, {
            headers: { 'Content-Type': 'application/json' }
        });
        return response.data;
    } catch (error) {
        throwError(error);
        return [];
    }
}
