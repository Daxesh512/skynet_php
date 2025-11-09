function disableWithUrl() {
    $("#withUrl input").removeClass('item-menu');
    $("#withUrl select").removeClass('item-menu');
}

function enableWithUrl() {
    $("#withUrl input").addClass('item-menu');
    $("#withUrl select").addClass('item-menu');
}

function disableWithoutUrl() {
    $("#withoutUrl input").removeClass('item-menu');
    $("#withoutUrl select").removeClass('item-menu');
}

function enableWithoutUrl() {
    $("#withoutUrl input").addClass('item-menu');
    $("#withoutUrl select").addClass('item-menu');
}

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

