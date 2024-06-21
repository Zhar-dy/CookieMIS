// Running code
let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCart = document.querySelector('.listCart');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let totaldiv = document.querySelector('total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
});
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
});
// totaldiv.addEventListener('click', ()=>{
//     // Go to this location
//     alert(" Your Order has been placed! ");
//     window.location("index.php");
// });

// This is for fetching data from php file

function fetchData() {
    console.log("App started...")
    return new Promise((resolve, reject) => {
        console.log("Trying to fetch data...")
        $.ajax({
            
            url: 'fetchData.php',  // The PHP file that runs the SQL query
            dataType: 'json',  // Expect a JSON response
            success: function(response) {
                console.log("Got Data!");

                // Split the data into many arrays
                let arrayOfArray = response.split("+");
                let products = [];  // Initialize 'products' as an array
                for(i=0;i<arrayOfArray.length;i++){
                    let array = arrayOfArray[i].split("|");
                    let product = {
                        name: array[0],
                        highlight: array[1],
                        description: array[2],
                        available: array[3],
                        stock: array[4],
                        image: array[6],
                        price: array[5]
                    };
                    products.push(product);
                }
                resolve(products);  // Resolve the promise with 'products'
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // This function runs if the request fails
                console.error('Error: ' + errorThrown);
                
            }
        });
    }
)};
    


/*
0) ID
1) Name
3) Highlight
2) Description
4) Available X
5) Stock X
6) price
7) picture
*/

/*
// This is to arrange data
function test(){
    fetchData(function(products) {
        print (products);  // Now you can access 'products' outside of the AJAX call
    });
}
test();
*/

/*
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
*/



let listCarts  = [];

function initApp(products){
    let productHTML = products.map(product => {
        return `<p>Name: ${product.name}</p>
                <p>Highlight: ${product.highlight}</p>
                <p>Description: ${product.description}</p>
                <p>Available: ${product.available}</p>
                <p>Stock: ${product.stock}</p>
                <p>Image: ${product.image}</p>
                <p>Price: ${product.price}</p>`;
    }).join('');
    let productContainer = document.getElementById('productContainer');
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('box');
        if(value.stock < 1){
            newDiv.innerHTML = `
            <div class="img-box">
                <img src="images/cookies/${value.image}" alt="${value.name}">
            </div>
            <div class="detail-box">
                <h6>${value.name} <span>${value.highlight}</span></h6>
                <p class="long_text">${value.description}</p>
                <h5>RM${value.price}</h5>
                <a style="background-color:red">Sold Out!</a>
            </div>`;
        }else{
            newDiv.innerHTML = `
            <div class="img-box">
                <img src="images/cookies/${value.image}" alt="${value.name}">
            </div>
            <div class="detail-box">
                <h6>${value.name} <span>${value.highlight}</span></h6>
                <p class="long_text">${value.description}</p>
                <h5>RM${value.price}</h5>
                <a href="#" onclick="addToCart(${key})">BUY NOW</a>
            </div>`;
        }
        
        productContainer.appendChild(newDiv);
    });
}
let product = "";
fetchData().then(products => {
    console.log("Preparing Data...");
    initApp(products);  // Now 'products' is available here
    product = products;
}).catch(error => {
    console.error(error);  // Log any errors
});

function addToCart(key){
    if(listCarts[key] == null){
        // copy product from list to list cart
        listCarts[key] = JSON.parse(JSON.stringify(product[key])); // Error. product is not defined
        listCarts[key].quantity = 1;

        // Ensure price is an integer
        listCarts[key].price = parseInt(listCarts[key].price);
    }
    reloadCart();
}


function reloadCart(){
    listCart.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCarts.forEach((value, key)=>{
        if(value != null){
            console.log("start price:",value.price);
            totalPrice = totalPrice + (value.price);
            console.log("Start quantity",value.quantity);
            console.log("Total in Total",value.price * value.quantity);
            count += value.quantity;
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="images/cookies/${value.image}"/></div>
                <div>${value.name} ${value.highlight}</div>
                <div>${value.price}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
            listCart.appendChild(newDiv);
        }
    });
    total.innerText = totalPrice;
    console.log("First input is: ", totalPrice);
    quantity.innerText = count;
}

function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCarts[key];
    }else{
        console.log("Old Quantity is:",listCarts[key].quantity);
        listCarts[key].quantity = quantity;
        console.log("New Quantity is:",quantity);
        listCarts[key].price = product[key].price * quantity;
        console.log("Price is:",listCarts[key].price);
        console.log("Total Price is:",listCarts[key].price);
    }
    reloadCart();
}