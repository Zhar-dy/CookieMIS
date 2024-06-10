// Running code
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

// This is for fetching data from php file

function fetchData() {
    return new Promise((resolve, reject) => {
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
                console.error('Error: ' + textStatus + ', ' + errorThrown);
                
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



let listCards  = [];

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
                <a href="#" onclick="addToCard(${key})">BUY NOW</a>
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

function addToCard(key){
    if(listCards[key] == null){
        // copy product from list to list card
        listCards[key] = JSON.parse(JSON.stringify(product[key])); // Error. product is not defined
        listCards[key].quantity = 1;

        // Ensure price is an integer
        listCards[key].price = parseInt(listCards[key].price);
    }
    reloadCard();
}


function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        if(value != null){
            console.log("start price:",value.price);
            totalPrice = totalPrice + (value.price);
            console.log("Start quantity",value.quantity);
            console.log("Total in Total",value.price * value.quantity);
            count += value.quantity;
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="images/cookies/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
            listCard.appendChild(newDiv);
        }
    });
    total.innerText = totalPrice;
    console.log("First input is: ", totalPrice);
    quantity.innerText = count;
}

function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        console.log("Old Quantity is:",listCards[key].quantity);
        listCards[key].quantity = quantity;
        console.log("New Quantity is:",quantity);
        listCards[key].price = product[key].price * quantity;
        console.log("Price is:",listCards[key].price);
        console.log("Total Price is:",listCards[key].price);
    }
    reloadCard();
}
