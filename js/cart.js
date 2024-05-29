// Get the cart list and total price elements
const cartList = document.querySelector('.cart_list');
const totalPriceElement = document.querySelector('#total-price');

// Define the cart items and their prices
const cartItems = [
  { id: 1, name: 'Cookie of Creativity', price: 5, image: 'images/jumbo.jpg' },
  { id: 2, name: 'Chocolate Chip Cookie', price: 3, image: 'images/choccookie.jpg' },
  { id: 3, name: 'Cookie of Chewy', price: 7, image: 'images/chewy.jpg' },
  { id: 4, name: 'Peanut Cookie', price: 2, image: 'images/peanut.jpg' },
];

// Initialize the total price
let totalPrice = 0;

// Add event listeners to the remove item buttons
cartList.addEventListener('click', (e) => {
  if (e.target.classList.contains('remove-item')) {
    const itemId = e.target.parentNode.parentNode.querySelector('h4').textContent;
    const itemIndex = cartItems.findIndex((item) => item.name === itemId);
    if (itemIndex !== -1) {
      totalPrice -= cartItems[itemIndex].price;
      totalPriceElement.textContent = totalPrice;
      cartList.removeChild(e.target.parentNode.parentNode);
    }
  }
});

// Add event listeners to the add item buttons (not shown in the HTML code)
// You can add buttons to add items to the cart and use the following code to handle the event
// document.addEventListener('click', (e) => {
//   if (e.target.classList.contains('add-item')) {
//     const itemId = e.target.dataset.itemId;
//     const itemIndex = cartItems.findIndex((item) => item.id === parseInt(itemId));
//     if (itemIndex !== -1) {
//       totalPrice += cartItems[itemIndex].price;
//       totalPriceElement.textContent = totalPrice;
//       const cartItemHTML = `
//         <li>
//           <div class="cart_img">
//             <img src="${cartItems[itemIndex].image}" alt="${cartItems[itemIndex].name}">
//           </div>
//           <div class="cart_info">
//             <h4>${cartItems[itemIndex].name}</h4>
//             <p>PRICE RM ${cartItems[itemIndex].price}</p>
//             <button class="btn btn-danger remove-item">Remove</button>
//           </div>
//         </li>
//       `;
//       cartList.insertAdjacentHTML('beforeend', cartItemHTML);
//     }
//   }
// });