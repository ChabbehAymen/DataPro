
const user = document.querySelector('meta[name="user"]').getAttribute('content');

export function getUser() {
    if(user) return {bool: true, user: JSON.parse(user)};
    return {bool: false, user: null};
}

/**
 * Retrieve the CSRF token from the meta tag.
 *
 * @return {string|null} The CSRF token or null if not found.
 */
export function getcsrfToken() {
    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    return token || null;
}

export function toggleSidebar(ref) {
    console.log(ref);
    if (ref && typeof ref.value === 'boolean') { 
        ref.value = !ref.value;
        return;
    }
    throw new Error('toggleSidebar() expects a ref with a boolean value.');
}

export function navigate(url = '/')
{
    window.location.href = url;
}