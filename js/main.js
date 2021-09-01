// Start Shop Functions

$('.btn-sh-filter').click(function () {
    $('.categories').slideToggle();
});

$('nav ul li:nth-of-type(2) a').click(function () {
    $('.notifications').fadeToggle();
});

$('.notifications .content i').click(function () {
    $(this).parent().parent().fadeOut();
});

// End Shop Functions

// Start User Cart Functions

// Calc Single Item Total Price
var itemTotalPrice = document.querySelectorAll('.ittopr');
var quantity = document.querySelectorAll('.itqu');
var singlePrice = document.querySelectorAll('.itpr');

for (let i = 0; i < itemTotalPrice.length; i++) {
    itemTotalPrice[i].innerHTML = parseFloat(quantity[i].innerHTML) * parseFloat(singlePrice[i].innerHTML);
}

// Calc Total Items Price

var itemsTotalPrice = document.querySelector('.ftprice');
var calculatedPrice = 0;

for (let i = 0; i < itemTotalPrice.length; i++) {
    calculatedPrice += parseFloat(itemTotalPrice[i].innerHTML);
}

itemsTotalPrice.innerHTML = calculatedPrice;
// End User Cart Functions

