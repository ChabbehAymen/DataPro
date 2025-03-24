
const user = document.querySelector('meta[name="user"]').getAttribute('content');

export function getUser() {
    if(user) return {bool: true, user: JSON.parse(user)};
    return {bool: false, user: null};
}

export function toggleSidebar(ref) {
    console.log(ref);
    if (ref && typeof ref.value === 'boolean') { 
        ref.value = !ref.value;
        return;
    }
    throw new Error('toggleSidebar() expects a ref with a boolean value.');
}