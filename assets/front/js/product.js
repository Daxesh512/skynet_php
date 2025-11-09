$(function ($) {
    ("use strict");

    // message show sweet alert
    const Toast2 = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    function success(message) {
            Toast2.fire({
                icon: 'success',
                title: message
            })
    };
    function error(message) {
            Toast2.fire({
                icon: 'error',
                title: message
            })
    };

    // message show sweet alert end


// product quintity select js

$(document).on('click','.subclick',function(){
    let current_qty = parseInt($('.cart-amount').val());
    if(current_qty>1){
        $('.cart-amount').val(current_qty-1);
    }else{
        error('Minumum Quantity Must Be 1');
    }
    
})


$(document).on('click','.addclick',function(){
    let current_stock = parseInt($('#current_stock').val());
    let current_qty = parseInt($('.cart-amount').val());
    if(current_qty < current_stock){
        $('.cart-amount').val(current_qty+1);
    }else{
        error('Product Quantity Maximum ' + current_stock);
    }
})

$(document).on('keyup','.cart-amount',function(){
    let current_stock = parseInt($('#current_stock').val());
    let key_val = parseInt($(this).val());

    if(key_val > current_stock){
        error('Product Maximum Quantity '+current_stock);
        $('.cart-amount').val(current_stock);
    }
    if(key_val <= 0){
        $('.cart-amount').val(1);
        error('Product Minimum Quantity'+1);
    }
    if(key_val > 0 && key_val < current_stock ){
        $('.cart-amount').val(key_val);
    }

})

// product quintity select js



// ============== add to cart js start =======================//

$(document).on('click','.cart-link',function() {
    let cartUrl = $(this).attr('data-href');
    let cartItemCount = $('.cart-amount').val();
    if(typeof cartItemCount === 'undefined'){
        cartItemCount = 1;
    }
    console.log(cartItemCount);
    $.get(cartUrl+',,,'+cartItemCount,function(res){
        if(res.message){
            getCartQty();
            success(res.message);
            $('.cart-amount').val(1);
        }else{
            error(res.error)
            $('.cart-amount').val(1);
        }  
    })
});

// ============== add to cart js end =======================//

// =============== header cart view js =======================//

$(document).on('mouseover','#view_cart_ajax',function(){
    loadCart();
})
$(document).on('mouseover','#cart-count',function(){
    loadCart();
})


// load header cart 
function loadCart(){
    let mainurl = $('#main_url').val();
     let getUrl = $('#view_cart_ajax').attr('data-target');
    $.get(getUrl,function(res){
        $('#cart-items').html('');
        $('#cart-items').html(res);
    });
}

// show cart quintity 

function getCartQty(){
    let get_qty_url = $('#cart-count').attr('data-target');
    $.get(get_qty_url,function(qty){
        $('.cart-count').html(qty);
    }); 
}


// =========== Cart Qty Update ============ //


$(".cart_qty_update").bind('keyup mouseup', function () {
    let stock = parseInt($(this).attr('aria-details'));
    let qty = parseInt($(this).val());
    if(0 >= qty ){
        error('Product Minimum Quantity '+1);
        $(this).val(1);
    }
    if(stock < qty){
        error('Product Maximum Quantity '+stock);
        $(this).val(stock); 
    }
});



// ================ cart item remove js start =======================//

$(document).on('click','.item-remove',function(){
   
    let removeItem = $(this).attr('rel');
    let removeItemUrl = $(this).attr('data-href');
    $.get(removeItemUrl,function(res){
        if(res.message){
            success(res.message);
            getCartQty();
            if(res.count == 0){
                $(".total-item-info").remove();
                $(".cart-table").remove();
                $(".cart-middle").remove();
                $('.remove_before').html( `
                    <div class="bg-light py-5 text-center">
                        <h3 class="text-uppercase">Cart is empty!</h3>
                    </div>`
                );
            }
            $('.cart-item-view').text(res.count);
            $('.cart-total-view').text(res.total);
            $('.remove'+removeItem).remove(); 
        }else{
            error(res.error);
        }
      
    });
  
});


// ================ cart item remove js start =======================//


//=============== cart update js start ==========================//

$(document).on('click','#cart_update',function(){
    $(this).text($(this).attr('rel'));
    $(this).prop('disabled',true);
    let cartqty = [];
    let cartprice = [];
    let cartproduct = [];
    let cartUpdateUrl = $(this).attr('data-href');
    
    $(".quantity").each(function() {
        cartqty.push($(this).val());
    })
    
    $("span.cart_price").each(function() {
        cartprice.push(parseFloat($(this).text()));
    });
    
    $(".product_id").each(function() {
        cartproduct.push($(this).val());
    });
    
    let formData = new FormData();
    let x = 0;
    for(x=0; x<cartqty.length; x++) {
        formData.append('qty[]', cartqty[x]);
        formData.append('cartprice[]', cartprice[x]);
        formData.append('product_id[]', cartproduct[x]);
    }
    
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });
    
    $.ajax({
               type: "POST",
               url: cartUpdateUrl,
               data: formData,
               processData: false,
               contentType:false,
               success: function(data)
               {
                if(data.message){
                    let cartPriceUpdate = [];
                    $(".cart_price").each(function() {
                        cartPriceUpdate.push(parseFloat($(this).text()));
                    });
                    $('.cart-total-view').text(data.total);
                    $('#cart_update').text($('#cart_update').attr('rel2'));
                    $('#cart_update').prop('disabled',false);
                    success(data.message);
                    if(data.count){
                        $('.cart-item-view').text(data.count);
                        $('.cart-total-view').text(data.total);
                    }
                }else{
                    error(data.error);
                }
                    
            }
        });
    })
    
    
//================= cart update js end ==========================//

//================= Header cart item remove ======================//
// ================ cart item remove js start =======================//

$(document).on('click','.header_item_remove',function(){
   
    let removeItem = $(this).attr('rel');
    let removeItemUrl = $(this).attr('data-href');
    $.get(removeItemUrl,function(res){
        if(res.message){
            $('.product_remove'+removeItem).remove(); 
            loadCart();
            getCartQty();
            success(res.message);
        }else{
            error(res.error);
        }
      
    });
  
});


// ================ cart item remove js start =======================//
//================= Header cart item remove ======================//

//================== shipping charge js =========================//
 
$(document).on('click','.shipping-charge',function(){
    let cost = parseFloat($(this).attr('data'));
    let grand_total = parseFloat($('.grand_total').attr('data'));
    let new_total = grand_total + cost;
    $('.grand_total').html(parseFloat(new_total).toFixed(2));
    $('.shipping_cost').html(cost);
    
});

$(document).on('change','#change_address',function(){
    if($(this).is(':checked')){
        $('#shipping-area').removeClass('d-none');
    }else{
        $('#shipping-area').addClass('d-none');
    }
})
//================== shipping charge js =========================//


});