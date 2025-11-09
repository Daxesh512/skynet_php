$(function ($) {
    ("use strict");


    let main_url = $('#main_url').val();


    $('.megamenu-item .megamenu .tabnav a').on('click', function(){
        $('.megamenu-item .megamenu .tabnav a').removeClass('active');
        $(this).addClass('active');
    });


    $(document).on('click','.product_payment_gateway_check',function(){
        let gateway_check = $(this).attr('id');


        $('.product_payment_gateway_check').removeClass('active');
        
        $(this).addClass('active');


        if(gateway_check == 'Paypal'){

            $('#payment_gateway_check').attr('action',$('#product_paypal').val());
            $('.payment_show_check').addClass('d-none');
            $('.payment_show_check input').prop('required',false);
            $('#payment_gateway_check').removeClass('product_paystack');

        }
        else if(gateway_check == 'Stripe'){

            $('#payment_gateway_check').attr('action',$('#product_stripe').val());
            $('.payment_show_check').removeClass('d-none');
            $('.payment_show_check input').prop('required',true);
            $('#payment_gateway_check').removeClass('product_paystack');
            
        }
        else if(gateway_check == 'Paytm'){

            $('#payment_gateway_check').attr('action',$('#product_paytm').val());
            $('.payment_show_check').addClass('d-none');
            $('.payment_show_check input').prop('required',false);
            $('#payment_gateway_check').removeClass('product_paystack');
        }
        else if(gateway_check == 'Cash On Delivery'){

            $('#payment_gateway_check').attr('action',$('#product_cash_on_delivery').val());
            $('.payment_show_check').addClass('d-none');
            $('.payment_show_check input').prop('required',false);
            $('#payment_gateway_check').removeClass('product_paystack');
        }
        else if(gateway_check == 'Paystack'){

            $('#payment_gateway_check').attr('action',$('#product_paystack').val());
            $('.payment_show_check').addClass('d-none');
            $('.payment_show_check input').prop('required',false);
            $('#payment_gateway_check').addClass('product_paystack');
        }

        $('#payment_gateway').val($(this).attr('data-href'));
    })


    // datatables
    // $("#idtable").DataTable({
    //     "responsive": true,
    //     "autoWidth": false,
    //   });


    // donation load ajax js

    $(document).on('mouseenter','#donation_hover',function(){
        let checkData = $(this).attr('data');
        let getUrl = $(this).attr('data-target');
        if(checkData == 0){
            $.ajax({
                type: "GET",
                url: getUrl,
                success: function(data)
                {
                   $('#donation_view_ajax').html(data);
                }
              });
        }
        $(this).attr('data',1);
    });


    // donation load ajax js

    $(document).on('mouseenter','#project_ajax_get',function(){
        let checkData = $(this).attr('data');
        let getUrl = $(this).attr('data-target');
        if(checkData == 0){
            $.ajax({
                type: "GET",
                url: getUrl,
                success: function(data)
                {
                   $('#project_ajax_view').html(data);
                }
              });
        }
        $(this).attr('data',1);
    });


    // donation details page anenumaus checkbox js

    $(document).on('change','#anonymous',function(){
        if($(this).is(':checked')){
            $('.anonymous_view').addClass('d-none');
        }else{
            $('.anonymous_view').removeClass('d-none');
        }
    })


    // donation preloaded amount select js

    $(document).on('click','.single-amount',function(){
        let preloaded = $(this).attr('data');
        $('#donation_amount').val(preloaded);
        console.log($(this));
        $('.active_check').each(function(index,value){
            $(value).removeClass('active');
        });
        $(this).parent().addClass('active');
    })


    // product view layout js

    $(document).on('mouseenter','#product_view',function(){
        let getUrl = $(this).attr('data-name');
        let checkData = $(this).attr('data');
        if(checkData == 0){
            $.ajax({
                type: "GET",
                url: getUrl,
                success: function(data)
                {
                    $('#ajax_product_view').html(data);
                }
            });
            $(this).attr('data',1);
        }   
    });


    $(document).on('click','.view_category_wise_product',function(){
      
        $('#ajax_product_view').html(`<img class="loader_ajax" src="${main_url+'/assets/front/tenor.gif'}" alt="">`);
        let getUrl = $(this).attr('data-name');
            $.ajax({
                type: "GET",
                url: getUrl,
                success: function(data)
                {
                    $('#ajax_product_view').html(data);
                }
            });
    })



    // image preview js
    $(document).on('change','#image',function(event){
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
           $('.image_view').attr('src',e.target.result);
        };
        reader.readAsDataURL(file);
    })
     
    // image preview js

    // event details
    $(document).on('click','.view_attendance_details',function(){
        let viewUrl = $(this).attr('data-href');
        $.get(viewUrl,function(data){
            $('#attendance_info_view').html(data);
        });
    })
 // event details

 $(document).on('click','.view_attendance_details',function(){
    let viewUrl = $(this).attr('data-href');
    $.get(viewUrl,function(data){
        $('#attendance_info_view').html(data);
    });
})

// order details
 $(document).on('click','.view_order_details',function(){
    let viewUrl = $(this).attr('data-href');
    $.get(viewUrl,function(data){
        console.log(data);
        $('#order_info_view').html(data);
    });
})
// plan details
 $(document).on('click','.view_plan_details_modal',function(){
    let viewUrl = $(this).attr('data-href');
    $.get(viewUrl,function(data){
        $('#plan_info_view').html(data);
    });
})


// review rating get js
$(document).on('click','.star-review .star .fa-star',function(){
    $('.star-review .star').removeClass('active');
    let rating = $(this).parent().attr('data');
    $(this).parent().addClass('active');
    $('#rating_get').val(rating);
})

});