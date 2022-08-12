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
        addToCartBtn.addEventListener('click', function(event) {
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
function initCartDeleteButton(actionUrl){
    let dels = document.querySelectorAll('.delete')
    for(let index = 0; index < dels.length; index++){
        let del = dels[index]
        del.addEventListener('click', function(e){
            let btn = e.target
            let dataId = btn.getAttribute('data-id')
            let formData = new FormData()
            formData.append('_method', 'DELETE')
            let csrfTokenMeta = document.querySelector('meta[name="csrf-token"]')
            let csrfToken = csrfTokenMeta.content
            formData.append('_token', csrfToken)
            formData.append('id', dataId)
            let request = new XMLHttpRequest()
            request.open("POST", actionUrl)
            request.onreadystatechange = function(){
                if(request.readyState === XMLHttpRequest.DONE && request.status === 200 && request.responseText === "success"){
                    console.log(request.responseText)
                    window.location.reload()
                }
            }
            request.send(formData)
        })
    }
}

export { initAddToCart, initCartDeleteButton }
