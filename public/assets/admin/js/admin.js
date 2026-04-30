/**
 * POS Server — Admin Panel JS
 * Handles: sidebar navigation, active states, page titles
 */

const PAGE_TITLES = {
    dashboard:    'Dashboard',
    orders:       'Orders',
    receipts:     'Receipts',
    sells:        'Sells',
    items:        'Items',
    stock:        'Stock',
    categories:   'Categories',
    partners:     'Partners',
    prices:       'Prices',
    abc:          'ABC Analysis',
    fiscal:       'Fiscals',
    apilogs:      'API Logs',
    pricechecker: 'Price Checkers',
    shops:        'Shops',
    cashdesk:     'Cash Desk (POS)',
    settings:     'Settings',
};

/**
 * Navigate to a section by ID.
 * @param {string} id - Section key (matches data-section on nav items and id="section-{id}" on sections)
 */
function navigateTo(id) {
    // Hide all sections
    document.querySelectorAll('.section').forEach(el => el.classList.remove('active'));

    // Deactivate all nav items
    document.querySelectorAll('.nav-item').forEach(el => el.classList.remove('active'));

    // Show target section
    const section = document.getElementById('section-' + id);
    if (section) section.classList.add('active');

    // Activate matching nav item
    const navItem = document.querySelector(`.nav-item[data-section="${id}"]`);
    if (navItem) navItem.classList.add('active');

    // Update topbar title
    const titleEl = document.getElementById('topbar-title');
    if (titleEl) titleEl.textContent = PAGE_TITLES[id] || id;

    // Persist in URL hash (no full reload)
    history.replaceState(null, '', '#' + id);
}

/**
 * Read URL hash on load and navigate to that section.
 * Falls back to 'dashboard'.
 */
function initNavigation() {
    const hash = window.location.hash.replace('#', '');
    const target = PAGE_TITLES[hash] ? hash : 'dashboard';
    navigateTo(target);
}

// Wire up all nav items via data-section attribute
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.nav-item[data-section]').forEach(item => {
        item.addEventListener('click', () => {
            navigateTo(item.dataset.section);
        });
    });

    initNavigation();
});
