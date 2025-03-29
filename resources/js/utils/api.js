import axios from 'axios';
import { getcsrfToken } from './utils';

function throwError(error) {
    console.error('[GET DATA]:: Something Went Wrong', error);
}

/**
 * Fetch all tags from the server.
 *
 * @return {Promise<Array>} An array of tags.
 */
export async function fetchTags() {
    try {
        const response = await axios.get('/tags');
        return response.data;
    } catch (e) {
        throwError(e);
        return [];
    }
}


/**
 * Fetch all categories from the server.
 *
 * @return {Promise<Array>} An array of categories.
 * */
export async function fetchCategories() {
    try {
        const response = await axios.get('/categories');
        return response.data;
    } catch (e) {
        throwError(e);
        return [];
    }
}

/**
 * Fetch all products from the server.
 *
 * @return {Promise<Array>} An array of products.
 */
export async function fetchProducts() {
    try {
        const response = await axios.get('/products');
        return response.data;
    } catch (e) {
        throwError(e);
        return [];
    }
}

/**
 * Fetch products by a specific tag ID.
 *
 * @param {number} id - The ID of the tag.
 * @return {Promise<Array>} An array of products associated with the tag.
 */
export async function fetchProductsByTag(id) {
    try {
        const response = await axios.get(`/products/tag/${id}`);
        return response.data;
    } catch (e) {
        throwError(e);
        return [];
    }
}

/**
 * Fetch a product by its ID.
 *
 * @param {number} id - The ID of the product.
 * @return {Promise<Object>} The product data.
 */
export async function fetchProductById(id) {
    try {
        const response = await axios.get(`/products/${id}`);
        return response.data;
    } catch (e) {
        throwError(e);
        return [];
    }
}

/**
 * Add a product to the user's cart.
 *
 * @param {number} id - The ID of the product.
 * @param {Object} user - The user object.
 */
export async function addProductToCard(id) {
    try {
        const csrfToken = getcsrfToken(); // Get the CSRF token
        const response = await axios.post('/basket', { product_id: id }, {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        return response.data;
    } catch (error) {
        throwError(error);
    }
}

/**
 * Get all commands from the server.
 *
 * @return {Promise<Array>} An array of commands.
 * 
 * */
export async function fetchCommands()
{
    try {
        const response = await axios.get('/basket');
        return response.data;
    } catch (error) {
        throwError(error);
        return [];
    }
}
/**
 * Login the user out
 *
 * */
export async function logout() {
    try {
        const response = await axios.post('/logout');
        return response.data;
    } catch (error) {
        throwError(error);
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
