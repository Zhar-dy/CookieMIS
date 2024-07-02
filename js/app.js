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
                    console.log(array);
                    let product = {
                        name: array[0],
                        highlight: array[1],
                        description: array[2],
                        available: array[3],
                        stock: array[4],
                        image: array[6],
                        price: array[5],
                        cookieID: array[7]
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




function initApp(products){
    let productHTML = products.map(product => {
        return `<p>ID: ${product.id}</p>
                <p>Name: ${product.name}</p>
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
        if(value.available == 0){
            newDiv.innerHTML = `
            <div class="img-box">
                <img src="images/cookies/${value.image}" alt="${value.name}">
            </div>
            <div class="detail-box">
                <h6>${value.name} <span>${value.highlight}</span></h6>
                <p class="long_text">${value.description}</p>
                <h5>RM${value.price}</h5>
                <a style="background-color:red">Not Available!</a>
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
                <input type="hidden" name="cookieID" value="${value.id}">
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
        console.log("Current Key: "+ listCarts[key]);
        listCarts[key] = JSON.parse(JSON.stringify(product[key])); // Error. product is not defined
        listCarts[key].quantity = 1;
        console.log("added "+ listCarts);
        // Ensure price is an integer
        listCarts[key].price = parseInt(listCarts[key].price);
    }
    console.log(listCarts);
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
                    <button class="buttonC" onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button class="buttonC" onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
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
function help() {
    // Convert the object to a JSON string
    console.log("Data "+listCarts);
    const nonNullCarts = listCarts.filter(obj => obj !== null);
    // Custom replacer function to filter out empty values
    const cartListString = JSON.stringify(nonNullCarts);
    // cartListString.forEach(obj => {
    //     console.log(`ID: ${obj.cookieID}, Name: ${obj.name}${obj.highlight}`);
    // });
    console.log("Json "+cartListString);
    // Save the string in sessionStorage
    sessionStorage.setItem('cartList', cartListString);
    
    fetch('ReusableCodes/processOrders.php', {
        method: 'POST',
        body: JSON.stringify({ data: listCarts }),
    })
    .then(response => response.text())
    .then(result => {
        // Handle the response from PHP (if needed)
        console.log(result);

        // Redirect to another page (after processing the response)
        //window.location.href = 'confirmOrder.php?data='+cartListString;
        window.location.href = 'confirmOrder.php';
    })
    .catch(error => {
        console.error('Error:', error);
    });

    // Redirect to another page
    //window.location.href = 'confirmOrder.php';
}

// function help() {
//     const cartListString = JSON.stringify(listCarts);

//     // Save the string in sessionStorage
//     sessionStorage.setItem('cartList', cartListString);

//     fetch('confirmOrder.php', {
//         method: 'POST',
//         body: JSON.stringify({ data: cartListString }),
//     })
//     .then(response => response.text())
//     .then(result => {
//         // Handle the response from PHP (if needed)
//         console.log(result);

//         // Redirect to another page (after processing the response)
//         window.location.href = 'confirmOrder.php';
//     })
//     .catch(error => {
//         console.error('Error:', error);
//     });
// }