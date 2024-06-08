let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
});
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
});

let products = [
    {
        id: 1,
        name: 'Cookie of Creativity',
        image: 'jumbo.png',
        price: 5
    },
    {
        id: 2,
        name: 'Cookie of Chewy',
        image: 'chewy.png',
        price: 8
    },
    {
        id: 3,
        name: 'Chocolate Chip Cookie',
        image: 'choccookie.png',
        price: 7
    },
    {
        id: 4,
        name: 'Peanut Cookie',
        image: 'peanut.png',
        price: 3
    }
];
let listCards  = [];

function initApp(){
    let productContainer = document.getElementById('productContainer');
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('box');
        newDiv.innerHTML = `
            <div class="img-box">
                <img src="../images/cookies/${value.image}" alt="${value.name}">
            </div>
            <div class="detail-box">
                <h6>${value.name} <span></span></h6>
                <p class="long_text">Only cookie created with passions</p>
                <h5>RM${value.price.toLocaleString()}</h5>
                <a href="#" onclick="addToCard(${key})">BUY NOW</a>
            </div>`;
        productContainer.appendChild(newDiv);
    });
}
initApp();

function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}

function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        if(value != null){
            totalPrice += value.price * value.quantity;
            count += value.quantity;
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="../images/cookies/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${(value.price * value.quantity).toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
            listCard.appendChild(newDiv);
        }
    });
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}

function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = products[key].price * quantity;
    }
    reloadCard();
}
