import axios from 'axios';

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