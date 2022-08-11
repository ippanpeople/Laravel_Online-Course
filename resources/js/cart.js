function initCart(){
    return getCart()
}

function getCart(){
    let cart = Cookies.get('cart')
    return (!cart) ? {} : JSON.parse(cart)
}

function addProductToCart(productId, quantity){
    let cart = getCart()
    let currentQuantity = parseInt(cart[productId]) || 0
    let addQuantity = parseInt(quantity) || 0
    let allQuantity = currentQuantity + addQuantity
    updateProductToCart(productId, allQuantity)

}

function updateProductToCart(productId, allQuantity){
    let cart = getCart()
    cart[productId] = allQuantity
    saveCart(cart)
}


function alertProductQuantity(productId){
    let cart = getCart()
    let quantity = parseInt(cart[productId]) || 0
    alert(quantity)
}

function saveCart(cart){
    Cookies.set('cart', JSON.stringify(cart))
}

function initAddToCart(productId){
    // let product = "{{ $product['name'] }}"
    let addToCartBtn = document.getElementById('addToCart')

    if(addToCartBtn){
        addToCartBtn.addEventListener('click', function (event) {
            let quantityInput = document.querySelector('input[name="quantity"]')
            addProductToCart(productId, quantityInput.value)
            alertProductQuantity(productId)
            // let quantity = parseInt(Cookies.get('quantity')) || 0
            // let addQuantity = parseInt(quantityInput.value) || 0
            // let allQuantity = quantity + addQuantity

            // Cookies.set('quantity', allQuantity)

            // alert('add ' + addQuantity + ', In Cart : ' + allQuantity)
        })
    }
}

export { initAddToCart }
