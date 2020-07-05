//store the number of items available
let carts = document.querySelectorAll('.add-cart');

//store the products name and price
let productImage = document.getElementsByClassName('proddes');
let productsName = document.getElementsByClassName('card-title');
let productsPrice = document.getElementsByClassName('price');

//put the products name and price in an array with a new variable incart
let products = [];

for ( let i = 0; i<carts.length; i++ ){
    products.push( { tag: productImage[i].getAttribute("src"), name: productsName[i].innerHTML, price: parseFloat(productsPrice[i].innerHTML), inCart: 0 });
}
for ( let i = 0; i < carts.length; i++ ){
    carts[i].addEventListener( 'click', () => {
        cartNumbers( products[i] );
        totalCost( products[i] );
    });
}

function onLoadCartNumbers() {

    let productNumbers = localStorage.getItem('cartNumbers');
    if ( productNumbers ){
        document.querySelector('.cart span').textContent = productNumbers;
    }
}

//this function get the number of items there are in a cart
function cartNumbers( product, action ) {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);

    let cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);

    if ( action ){
        localStorage.setItem( "cartNumbers", productNumbers - 1 );
        document.querySelectorAll('.cart span' ).textContent = productNumbers - 1;
    } else if ( productNumbers ){
        localStorage.setItem('cartNumbers', productNumbers + 1 );
        document.querySelector('.cart span').textContent = productNumbers + 1;
    }else {
        localStorage.setItem('cartNumbers', 1 );
        document.querySelector('.cart span').textContent = 1;
    }
    setItems(product);
}

//this function add multiple items to the cart and we can know which item is in the cart
function setItems( product ) {

    let cartItems = localStorage.getItem( "productInCart");
    cartItems = JSON.parse( cartItems);

    if ( cartItems != null ){
        if ( cartItems[ product.tag ] === undefined ){
            cartItems = {
                ...cartItems,
                [product.tag]: product
            }
        }
        cartItems[product.tag].inCart += 1;
    } else {
        product.inCart = 1;
        cartItems = {
            [product.tag]: product
        }
    }
    localStorage.setItem("productInCart", JSON.stringify( cartItems ) );
}

//this function calculate the total cost of the cart
function totalCost(product, action ) {

    let cartCost = localStorage.getItem( 'totalCost' );
    if ( action ){
        cartCost = parseFloat( cartCost );
        localStorage.setItem("totalCost", cartCost - product.price );
    } else if ( cartCost ){
        cartCost = parseFloat( cartCost );
        localStorage.setItem( 'totalCost', cartCost + product.price );
    } else {
        localStorage.setItem( 'totalCost', product.price );
    }
}

function displayCart() {
    let cartItems = localStorage.getItem("productInCart");
    cartItems = JSON.parse( cartItems );
    let productContainer = document.querySelector(".products");
    let cartCost = localStorage.getItem( 'totalCost' );
    if ( cartItems && productContainer ){
        productContainer.innerHTML = '';
        Object.values(cartItems).map(item => {
           productContainer.innerHTML +=
               '<tbody class="products">' +
                   '<tr>' +
                       '<td>' +
                           '<a href="#" class="deleteProduct">' +
                               '<i class="far fa-window-close"></i>' +
                           '</a> ' +
                           '<img src="'+item.tag+'" width="70" height="70">' +
                           ''+item.name+'' +
                       '</td>' +
                       '<td class="price">' +
                            ''+item.price+'€' +
                       '</td>' +
                       '<td class="quantity">' +
                            '<a href="#" class="lessQuantity">' +
                                '<i class="fas fa-arrow-circle-left"></i>' +
                            '</a> ' +
                            '<span class="itemQuantity">' +
                                ''+item.inCart+'' +
                            '</span> ' +
                            '<a href="#" class="addQuantity">' +
                                '<i class="fas fa-arrow-circle-right"></i>' +
                            '</a> ' +
                       '</td>' +
                       '<td>' +
                            ''+item.price * item.inCart+'€'+
                       '</td>' +
                   '</tr>'+
               '</tbody>'
        });

        productContainer.innerHTML +=
            '<div class="basketTotalContainer">' +
                '<h4 class="basketTotalTitle">' +
                    'Total ' +
                '</h4>' +
                '<h4 class="basketTotal">' +
                    ''+cartCost+'€' +
                '</h4>' +
            '</div>'
        ;
        manageQuantity();
    }
}

function manageQuantity() {
    //store the clicks for the product quantity
    let deleteProduct = document.querySelectorAll('.deleteProduct');
    let addQuantity = document.querySelectorAll('.addQuantity');
    let lessQuantity = document.querySelectorAll('.lessQuantity');


    let productInCart = localStorage.getItem('productInCart');
    productInCart = JSON.parse( productInCart );

    if ( productInCart ){
        let productTagInCart = Object.keys(productInCart);

        for ( let i = 0; i < addQuantity.length; i++ ){
            addQuantity[i].addEventListener( 'click', () => {
                addQuantityToProduct( productTagInCart[i] );
            });
        }

        for ( let i =0; i < lessQuantity.length; i++ ){
            lessQuantity[i].addEventListener( 'click', () =>{
                lessQuantityToProduct( productTagInCart[i] );
            });
        }

        for ( let i = 0; i < deleteProduct.length; i++ ){
            deleteProduct[i].addEventListener( 'click', () => {
                deleteAProduct( productTagInCart[i] );
            });
        }
    }
}



function addQuantityToProduct( product ) {
    let productInCart = localStorage.getItem('productInCart');

    productInCart = JSON.parse( productInCart );

    if ( productInCart[product] ){
        productInCart[product].inCart += 1;
        cartNumbers( productInCart[product] );
        totalCost( productInCart[product] );
        localStorage.setItem( 'productInCart', JSON.stringify(productInCart));
    }
    displayCart();
    onLoadCartNumbers();
}

function lessQuantityToProduct( product ) {
    let productInCart = localStorage.getItem('productInCart');

    productInCart = JSON.parse( productInCart );
    if ( productInCart[product].inCart >= 1 ){
        productInCart[product].inCart -= 1;
        cartNumbers( productInCart[product], "lessQuantity" );
        totalCost( productInCart[product], "lessQuantity");
        localStorage.setItem('productInCart', JSON.stringify(productInCart));
    }
    displayCart();
    onLoadCartNumbers();
}

function deleteAProduct( product ) {
    let productInCart = localStorage.getItem('productInCart');
    let totalCost = localStorage.getItem("totalCost");
    let cartNumber = localStorage.getItem("cartNumbers");
    productInCart = JSON.parse( productInCart );
    localStorage.setItem("cartNumbers", cartNumber - productInCart[product].inCart);
    localStorage.setItem("totalCost", totalCost - (productInCart[product].price * productInCart[product].inCart));

    delete productInCart[product];
    localStorage.setItem('productInCart', JSON.stringify(productInCart));

    displayCart();
    onLoadCartNumbers();
}

onLoadCartNumbers();
displayCart();
