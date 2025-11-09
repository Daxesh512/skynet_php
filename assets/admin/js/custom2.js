$(function ($) {
    "use strict";


    function isEmpty(el) {
        return !$.trim(el.html())
    }

    $(document).on('click', "#add_more", function () {

        $("#attribute_view").append(
            ` <div class="col-sm-10 offset-2 mt-3">
      <span class="remove-btn language-remove pull-right"><i class="fas fa-times"></i></span>
      <input type="text" class="form-control" name="attributes_title[]" placeholder="Attributes" value="">
     
      
      <textarea name="attributes_description[]" class="form-control my-2" placeholder="Attribute Description"></textarea>
      </div> `
        );
    });

    $(document).on('click', '.remove-btn', function () {

        $(this.parentNode).remove();

    });

    $(document).on('click', '.remove_gallery', function () {
        let galleryUrl = $(this).data('target');
        $(this.parentNode).remove();
        $.ajax({
            type: "GET",
            url: galleryUrl,
            success: function (data) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    type: 'success',
                    timer: 3000,
                    title: data
                })
            }
        });
    });


    // Helper Admin Category get
    $(document).on('change', '#select_language', function () {
        let geturl = $(this).data('href');
        let language = $(this).val();
        console.log(language);
        if (language) {
            $.get(geturl + '&language=' + language, function (value) {
                let showData = [];
                $.each(value, function (index, value) {
                    showData += `<option value="${value.id}">${value.name}</option>`;
                });

                $('#showData').html(showData);
            });
        }
    });

    $(document).ready(function () {
        let geturl = $('#select_language').data('href');
        let language = $('#select_language').val();
        let selectId = $('#select_language').data('role');
        if (selectId || language) {
            $.get(geturl + '&language=' + language, function (value) {
                let showData = [];
                $.each(value, function (index, value) {
                    showData += `<option value="${value.id}" ${value.id == selectId ? 'selected' : ''}>${value.name}</option>`;
                });

                $('#showData').html(showData);
            });
        }
    });

    // Helper Admin Category get
    $(document).on('change', '#icon_type', function () {
        if ($(this).val() == 'font_icon') {
            $('.icon_show').removeClass('d-none');
            $('.image_show').addClass('d-none');
        } else {
            $('.icon_show').addClass('d-none');
            $('.image_show').removeClass('d-none');
            $('.image_show .up-img').attr('required', true);
        }
    })


    // Droplinks Start
    $(document).on('click', '.StatusCheck', function () {
        console.log();
        $(this).parent().prev().text($(this).attr('data-val'));
        if ($(this).attr('data-val') == 'Cancle') {
            $(this).parent().prev().removeClass('btn-primary');
            $(this).parent().prev().addClass('btn-danger');
        } else {
            $(this).parent().prev().addClass('btn-primary');
            $(this).parent().prev().removeClass('btn-danger');
        }

        var link = $(this).attr('data-href');
        $.get(link, function (data) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                type: 'success',
                timer: 3000,
                title: data
            })
        });
    });


    //complete status check 
    $('#complete_check').on('show.bs.modal', function (e) {
        $(this).find('.status_btn').attr('href', $(e.relatedTarget).data('href'));
        $(this).find('.status_btn').attr('data-val', $(e.relatedTarget).attr('data-val'));
    });


    $(document).on('click', '.status_btn', function (e) {
        e.preventDefault();
        let pre = $(this).text();
        var send = `<span class="spinner-grow spinner-grow-sm"  role="status"></span> Sending Mail...`;
        $(this).html(send);
        var link = $(this).attr('href');
        $.get(link, function (data) {
            $('#complete_check .close').click();
            location.reload();
        });

    });


    $(document).on('click', '.view_order_details', function () {
        let viewUrl = $(this).attr('data-href');
        $.get(viewUrl, function (data) {
            $('#view_order_details_modal').html(data);
        });
    })


    $(document).on('click', '.view_question_details', function () {
        let viewUrl = $(this).attr('data-href');
        $.get(viewUrl, function (data) {
            $('#info_view_question').html(data);
        });
    })


    $(document).on('click', '.view_attendance_details', function () {
        let viewUrl = $(this).attr('data-href');
        $.get(viewUrl, function (data) {
            $('#attendance_info_view').html(data);
        });
    })


    $(document).on('click', '.view_plan_details', function () {
        let viewUrl = $(this).attr('data-href');
        $.get(viewUrl, function (data) {
            $('#plan_info_view').html(data);
        });
    })



    // Iconpicker Icon Submit Javascript Code
    function store(e) {
        console.log('hi');
        e.preventDefault();
        $("#inputIcon").val($(".biconpicker").find('i').attr('class'));
        console.log($("#inputIcon"));
        document.getElementById('slink').submit();
    }


    $(document).on('click', 'td .btn-icon', function () {
        $('#inputIcon').val($(this).val());
    });


    // product downloadable check js
    $(document).on('click', '#is_downloadable', function () {

        if (this.checked) {
            $('.showFile').removeClass('d-none');
            $('.showFile #file').removeClass('required', true);
        } else {
            $('.showFile').addClass('d-none');
            $('.showFile #file').attr('required', false);
        }
    })
    // product downloadable check js


    // product gallery image upload 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(document).on('click', '#delete-gallery-image', function (e) {
        e.preventDefault();
        var request_url = $(this).attr('data-target');
        $.ajax({
           type:'GET',
           url: request_url,
           success:function(data){
              
           }
        });
    });

    $(document).on('click', '.remove-img', function () {
        var id = $(this).find('input[type=hidden]').val();
        $('#galval' + id).remove();
        $(this).parent().parent().remove();
    });

    $(document).on('click', '#prod_gallery', function () {
		$('#uploadgallery').click();
		$('.selected-image .row').html('');
		$('#geniusform').find('.removegal').val(0);
	});

    $(document).on('click', '#delete-gallery-image', function () {
        var id = $(this).find('input[type=hidden]').val();
        $('#galval' + id).remove();
        $(this).parent().parent().remove();
    });


    $("#uploadgallery").change(function (event) {
        var total_file = document.getElementById("uploadgallery").files.length;
        for (var i = 0; i < total_file; i++) {
            $('.selected-image .row').append('<div class="col-sm-6">' +
                '<div class="img gallery-img">' +
                '<span class="remove-img"><i class="fas fa-times"></i>' +
                '<input type="hidden" value="' + i + '">' +
                '</span>' +
                '<img src="' + URL.createObjectURL(event.target.files[i]) + '" alt="gallery image">' +
                '</div>' +
                '</div> '
            );
            $('#geniusform').append('<input type="hidden" name="galval[]" id="galval' + i +
                '" class="removegal" value="' + i + '">')
        }

    });
    // product gallery image upload 

});