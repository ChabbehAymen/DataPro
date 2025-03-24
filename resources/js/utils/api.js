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