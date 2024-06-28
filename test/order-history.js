document.addEventListener('DOMContentLoaded', () => {
    const orderHistory = document.getElementById('order-history');
    const loadMoreButton = document.getElementById('load-more');

    let orders = [
        { id: '001', date: '2024-01-01', items: 3, total: '$100', status: 'Delivered' },
        { id: '002', date: '2024-01-05', items: 2, total: '$50', status: 'Shipped' },
        // Add more orders for demonstration
    ];
    let currentPage = 0;
    const itemsPerPage = 5;

    function renderOrders() {
        const start = currentPage * itemsPerPage;
        const end = start + itemsPerPage;
        const currentOrders = orders.slice(start, end);

        currentOrders.forEach(order => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="py-2 px-4 border-b">${order.id}</td>
                <td class="py-2 px-4 border-b">${order.date}</td>
                <td class="py-2 px-4 border-b">${order.items}</td>
                <td class="py-2 px-4 border-b">${order.total}</td>
                <td class="py-2 px-4 border-b">${order.status}</td>
            `;
            orderHistory.appendChild(row);
        });

        if (end >= orders.length) {
            loadMoreButton.style.display = 'none';
        } else {
            loadMoreButton.style.display = 'inline-block';
        }
    }

    loadMoreButton.addEventListener('click', () => {
        currentPage++;
        renderOrders();
    });

    renderOrders();
});
