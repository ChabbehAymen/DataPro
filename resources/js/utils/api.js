import axios from 'axios';
import { getcsrfToken, getUser } from './utils';

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
 * Fetch products by a specific title.
 *
 * @param {string} title - The title of the product.
 * @return {Promise<Array>} An array of products associated with the title.
 */
export async function fetchProductsByTitle(title) {
    try {
        const response = await axios.get(`/products/title/${title}`);
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
    if(!getUser().bool) return;
    try {
        const csrfToken = getcsrfToken(); // Get the CSRF token
        const response = await axios.post('/basket', { product_id: id }, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
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
        const response = await axios.get('/basket', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
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

/**
 * Fetch the user data from the server.
 *
 * @return {Promise<Object>} The user data.
 */
export async function fetchUser() {
    try {
        const response = await axios.get('/user', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        return response.data;
    } catch (error) {
        throwError(error);
        return [];
    }
}
/**
 * Update the user's data.
 *
 * @param {Object} userData - The user data.
 * @return {Promise<Object>} The user data.
 */

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
/**
 * Update the user's password.
 *
 * @param {Object} passwordData - The password data.
 * @return {Promise<Object>} The user data.
 */
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
