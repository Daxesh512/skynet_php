$(function ($) {
    "use strict";

    let main_url = $('#main_url').val();


    // bulk delete start 

    $(document).on('change','.bulk_all_delete',function(){
        let target = $(this).attr('data-target');
        if($(this).is(':checked')){
            $('#'+target+' .bulk-item').prop('checked',true);
        }else{
            $('#'+target+' .bulk-item').prop('checked',false);
        }

        bulk_select(target);
    });

    // Product
    $(document).on('change','#product-bulk-delete input.bulk-item',function(){
        bulk_select('product-bulk-delete');
    })
    // Product Category
    $(document).on('change','#product-category-bulk-delete input.bulk-item',function(){
        bulk_select('product-category-bulk-delete');
    })
    // Order
    $(document).on('change','#order-bulk-delete input.bulk-item',function(){
        bulk_select('order-bulk-delete');
    })
    // Quote
    $(document).on('change','#quote-bulk-delete input.bulk-item',function(){
        bulk_select('quote-bulk-delete');
    })
    // Gallery
    $(document).on('change','#gallery-bulk-delete input.bulk-item',function(){
        bulk_select('gallery-bulk-delete');
    })
    // Gallery Category
    $(document).on('change','#gcategory-bulk-delete input.bulk-item',function(){
        bulk_select('gcategory-bulk-delete');
    })
    // Job Category
    $(document).on('change','#jcategory-bulk-delete input.bulk-item',function(){
        bulk_select('jcategory-bulk-delete');
    })
    // Job 
    $(document).on('change','#job-bulk-delete input.bulk-item',function(){
        bulk_select('job-bulk-delete');
    })
    // Applicant 
    $(document).on('change','#applicant-bulk-delete input.bulk-item',function(){
        bulk_select('applicant-bulk-delete');
    })
    // Blog Category 
    $(document).on('change','#bcategory-bulk-delete input.bulk-item',function(){
        bulk_select('bcategory-bulk-delete');
    })
    // Blog 
    $(document).on('change','#blog-bulk-delete input.bulk-item',function(){
        bulk_select('blog-bulk-delete');
    })
    // newsletter 
    $(document).on('change','#newsletter-bulk-delete input.bulk-item',function(){
        bulk_select('newsletter-bulk-delete');
    })


    function bulk_select(target){
        var selected = [];
        $('#'+target+' input:checked').each(function() {
            selected.push($(this).val());
        });
        $('#bulk_delete').val(selected);
       
    }



    // message show sweet alert end

    $('.my-colorpicker2').colorpicker();
    $('.my-colorpicker2').on('colorpickerChange', function (event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    //  Datatable js
    $(".data_table").DataTable();

    // active alert js
    $('.alert').alert();

    // Bootstrap Toggle js
    $(function () {
        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch({
                state: $(this).is(':checked')
            }).trigger('change');
        });
    });

    // Summernote
    $('.summernote').summernote();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
        })


     // Start Date
     $('.month-year').datetimepicker({ 
        format: 'MM/YYYY'
     }); 

         // Start Date
    $('#start_date').datetimepicker({ 
        format: 'L'
        }); 

    // Submission Date
    $('#submission_date').datetimepicker({ 
        format: 'L'
    }); 
    
    // Language filter
    $('#languageSelect').on('change', function () {
        let languageUrl = $(this).attr('data');
        let languageVal = $(this).val();
        languageUrl = languageUrl + languageVal;
        window.location.href = languageUrl;
    })
    $('.languageSelect').on('change', function () {
        let languageUrl = $(this).attr('data');
        let languageVal = $(this).val();
        languageUrl = languageUrl + languageVal;
        window.location.href = languageUrl;
    })

    // Job Applicant Details
    $(document).on('click','.view_applicant_details',function(){
        let viewUrl = $(this).attr('data-href');
        console.log(viewUrl);
        $.get(viewUrl,function(data){
            $('#info_view').html(data);
        });
    })
        
    // Active tooltip
    $('[data-toggle="tooltip"]').tooltip();

    //  Blog Ajax Category 
    $('#blog_lan').on('change', function (event) {
        event.preventDefault();
        var lang_id = $(this).val();
        if (lang_id) {
            $.ajax({
                url: main_url + "/admin/blog/get/categoty/" + lang_id,
                type: "GET",
                contentType: false,
                processData: false,
                data: {},
                success: function (data) {
                    $('#bcategory_id').empty();
                    $('#bcategory_id').html(data);
                },
            });
        } else {
            alert('danger');
        }

    });

    //  Job Ajax Category 
    $('#job_lan').on('change', function (event) {
        event.preventDefault();
        var lang_id = $(this).val();
        if (lang_id) {
            $.ajax({
                url: main_url + "/admin/job/get/categoty/" + lang_id,
                type: "GET",
                contentType: false,
                processData: false,
                data: {},
                success: function (data) {
                    $('#job_category_id').empty();
                    $('#job_category_id').html(data);
                },
            });
        } else {
            alert('danger');
        }

    });
    
    
    //  Gallery Ajax Category 
    $('#gallery_lan').on('change', function (event) {
        event.preventDefault();
        var lang_id = $(this).val();
        if (lang_id) {
            $.ajax({
                url: main_url + "/admin/gallery/get/categoty/" + lang_id,
                type: "GET",
                contentType: false,
                processData: false,
                data: {},
                success: function (data) {
                    $('#gcategory_id').empty();
                    $('#gcategory_id').html(data);
                },
            });
        } else {
            alert('danger');
        }

    })

    //  Portfolio Ajax Category 
    $('#portfolio_lan').on('change', function (event) {
        event.preventDefault();
        var lang_id = $(this).val();
        if (lang_id) {
            $.ajax({
                url: main_url + "/admin/portfolio/get/categoty/" + lang_id,
                type: "GET",
                contentType: false,
                processData: false,
                data: {},
                success: function (data) {
                    $('#bcategory_id').empty();
                    $('#bcategory_id').html(data);
                },
            });
        } else {
            alert('danger');
        }

    })


    $(document).on("click", "#delete", function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $(this).parent("#deleteform").submit();
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Your file is safe :)',
                    'error'
                )
            }
        });
    });


    /* ======================================
    Bootstrap Datepicker Start
    ========================================= */
    // Start Date
    $('.datepicker').datetimepicker({
        format: 'MM/YYYY'
    });
    // From Date Year Select
    $("#from_date").datetimepicker({
        format: 'YYYY'
    });

    // Date To Year Select
    $("#date_to").datetimepicker({
        format: 'YYYY'
    });

    // Toggle Date to Field
    $('#date_check').on('change', function () {
        if ($('#date_check').is(':checked')) {
            $("input[name='date_to']").val('');
            $('#date_to_grup').hide();
        } else {
            $('#date_to_grup').show();
        }
    });
    if ($('#date_check').is(':checked')) {
        $('#date_to_grup').hide();
    }
    /* ======================================
    Bootstrap Datepicker End
    ========================================= */


    /* ======================================
    Bs Cistom Input Start
    ========================================= */
    bsCustomFileInput.init();
    /* =======================================
    Bs Cistom Input End
    ========================================== */


    /* ======================================
    IMAGE UPLOADING Start
    ========================================= */
    $(".up-img").on("change", function () {
        var imgpath = $(this).parent().parent().find('.show-img');
        var file = $(this);
        readURL(this, imgpath);
    });

    function readURL(input, imgpath) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imgpath.attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    /* ========================================
    IMAGE UPLOADING End 
    =========================================== */
    if (document.body.dataset.notification == undefined) {
        return false;
    } else {

        var data = JSON.parse(document.body.dataset.notificationMessage);
        var msg = data.messege;

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        switch (data.alert) {
            case 'info':
                Toast.fire({
                    icon: 'info',
                    title: msg
                })
                break;
            case 'success':
                Toast.fire({
                    icon: 'success',
                    title: msg
                })
                break;
            case 'warning':
                Toast.fire({
                    icon: 'warning',
                    title: msg
                })
                break;
            case 'error':
                Toast.fire({
                    icon: 'error',
                    title: msg
                })
                break;
        }
    };


    

});


// Iconpicker Icon Submit Javascript Code
function store(e) {
    e.preventDefault();
    $("#inputIcon").val($(".biconpicker").find('i').attr('class'));
    document.getElementById('slink').submit();
}