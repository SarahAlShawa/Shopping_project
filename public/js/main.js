const url = 'http://localhost:8000/cartItems';
let csrfTokenElement = "";
function updateCart(){
    fetch(url).then(response => response.json())
        .then(data => {
            // Convert JSON response to JavaScript object
            let obj = JSON.parse(JSON.stringify(data));
            handleCart(obj);

        });
}
updateCart();

const tokenUrl = "http://localhost:8000/token";
fetch(tokenUrl).then(response => response.json())
    .then(data=>{
        let obj = JSON.parse(JSON.stringify(data));
        csrfTokenElement = obj.token;
    })

function handleCart(obj){
    let cartItems = document.querySelector("#cart_count");
    cartItems.innerText = obj.numberOfCartItems;
}

window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        updateCart();
    }
});
let countValue = null
let minusButtons = document.querySelectorAll('.minuss-cart-button');
let plusButtons = document.querySelectorAll('.plusCartButton');
minusButtons.forEach((item)=>{
    item.addEventListener("click",(e)=>{
        let countValue = item.nextElementSibling;
        if(countValue.value > 1){
            removeOneElementOfThisProduct(item,countValue);
        }
    })
});
plusButtons.forEach((item)=>{
    item.addEventListener("click",(e)=>{
        let countValue = item.previousElementSibling;
        addOneElementOfThisProduct(item,countValue);
    })
});

async function removeOneElementOfThisProduct(item,countValue){
    console.log(countValue);
    const url = "http://localhost:8000/cart/decrease/" + item.value;
    try{
        const response = await fetch(url);
        if(response.ok){
            countValue.value -= 1;
            updateCartTotalDetails()
        }
    }
    catch(err){

    }

}
function addOneElementOfThisProduct(item,countValue){
    console.log(countValue.value);
    console.log(item);
    const url = "http://localhost:8000/cart/increase/" + item.value;
    fetch(url).then(async response=>{
        if(response.ok){
            console.log(countValue.value);
            let currentValue = parseInt(countValue.value, 10);
            currentValue++;
            countValue.value = currentValue;
            updateCartTotalDetails();
        }
    })
}

async function updateCartTotalDetails(){
    const url = "http://localhost:8000/cart/info";
    try{
        let data = await fetch(url);
        data = await data.json();
        let obj = JSON.parse(JSON.stringify(data));
        handleCartTotalDetails(obj);
    }
    catch(err){
        console.log(err.message);
    }
}
function handleCartTotalDetails(obj){
    let cartPrice = document.querySelector("#cart-price span");
    console.log(cartPrice);
    cartPrice.innerText = obj.totalCount;
    let price = document.querySelectorAll(".cart-total-price span");
    price.forEach(price =>{
        price.innerText = obj.totalPrice;
    });
}
