function initAddToCart(){
    // let product = "{{ $product['name'] }}"
    let addToCartBtn = document.getElementById('addToCart')

    if(addToCartBtn){
        addToCartBtn.addEventListener('click', function (event) {
            let quantityInput = document.querySelector('input[name="quantity"]')
            let quantity = parseInt(Cookies.get('quantity')) || 0
            let addQuantity = parseInt(quantityInput.value) || 0
            let allQuantity = quantity + addQuantity

            Cookies.set('quantity', allQuantity)

            // alert('add ' + addQuantity + ' ' + product + ', In Cart : ' + allQuantity)
        })
    }
}

export {initAddToCart}
