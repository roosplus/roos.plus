$(window).on("load", function () {
    "use strict";
    $('#preloader').fadeOut('slow')
    if ($(".multimenu").find(".active")) {
        $(".multimenu").find(".active").parent().parent().addClass("show");
        $(".multimenu").find(".active").parent().parent().parent().attr("aria-expanded", true);
    }
});

$(document).ready(function () {
    $('.togl-btn').click(function () {
        if (direction == 1) {
            $('.menu').toggleClass('togl-show');
        }
        else {
            $('.menu-rtl').toggleClass('togl-show-rtl');
        }

        $('.bg-layer').toggleClass('bg-gray');
        $('body').addClass('overflow-hidden');
    })
    $('#deletebtn').click(function () {

        if (direction == 1) {
            $('.menu').removeClass('togl-show');
        }
        else {
            $('.menu-rtl').removeClass('togl-show-rtl');
        }

        $('.bg-layer').removeClass('bg-gray');
        $('body').removeClass('overflow-hidden');
    })
    $('.bg-layer').click(function () {
        if (direction == 1) {
            $('.menu').removeClass('togl-show');
        }
        else {
            $('.menu-rtl').removeClass('togl-show-rtl');
        }
        $('.bg-layer').removeClass('bg-gray');
        $('body').removeClass('overflow-hidden');
    })


})

$(window).on("scroll", function () {
    "use strict";
    if ($(window).scrollTop() > 150) {
        if ($(window).width() > 768) {
            $(".view-cart-bar").removeClass("d-none");
        } else {
            $(".view-cart-bar").addClass("d-none");
        }
    } else {
        $(".view-cart-bar").addClass("d-none");
    }
});


$(document).ready(function () {
    "use strict";
    $('.zero-configuration').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'pdfHtml5'
        ]
    });
});

// # Sweetalert2
$(document).on('click', '#sweetalert', function (e) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-1 yes-btn',
            cancelButton: 'btn btn-danger mx-1 no-btn'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: are_you_sure,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: yes,
        cancelButtonText: no,
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })
});



function managefavorite(vendor_id, slug, type, manageurl, url) {
    "use strict";
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: manageurl,
        data: {
            slug: slug,
            type: type,
            favurl: manageurl,
            vendor_id: vendor_id,
            url: url
        },
        method: 'POST',
        success: function (response) {
            $('.set-fav1-' + slug).html(response.data);
            $('#additems').modal('hide');
            if (window.location.href.includes('details')) {
                location.reload();
            }
        },
        error: function (e) {
            return false;
        }
    });
}


$('.category-slider-theme-10').on('click', '.owl-item', function () {
    $(".specs").hide().eq($(this).index()).show();
    $('.category-box').removeClass('active1').eq($(this).index()).addClass("active1");
    $('.owl-item').removeClass('active1');
})

$(".navgation_lower li").click(function () {
    $(".specs").hide().eq($(this).index()).show();
    $(".navgation_lower li ").removeClass("active1").eq($(this).index()).addClass("active1");
    $(".category-card li").removeClass("active1").eq($(this).index()).addClass("active1");
});

$(".mobile-menu-active li").click(function () {
    $(".mobile-menu-active li a").removeClass("active").eq($(this).index()).addClass("active");
});

function statusupdate(nexturl) {
    "use strict";
    manegedata(nexturl);
}
function manegedata(nexturl) {
    "use strict";
    if (env == 'sandbox') {
        if (!nexturl.includes('orders') && !nexturl.includes('logout')) {
            myFunction();
            return false;
        }
    }
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-1 yes-btn',
            cancelButton: 'btn btn-danger mx-1 no-btn'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: are_you_sure,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: yes,
        cancelButtonText: no,
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $('#preloader').show();
            location.href = nexturl;
        } else {
            result.dismiss === Swal.DismissReason.cancel
        }
    })
}
let deferredPrompt = null;
window.addEventListener('beforeinstallprompt', (e) => {
    $("#foo").trigger("click");
    deferredPrompt = e;
});

const mobile_install_app = document.getElementById('mobile-install-app');
if (mobile_install_app != null) {
    mobile_install_app.addEventListener('click', async () => {
        if (deferredPrompt !== null) {
            deferredPrompt.prompt();
            const {
                outcome
            } = await deferredPrompt.userChoice;
            if (outcome === 'accepted') {
                deferredPrompt = null;

            }
        }
    });
}
$('.nav02').click(function () {
    $('.mobile_drop_down').animate({
        bottom: "-100vh"
    }, 200);
});
$(document).ready(function () {
    window.addEventListener('beforeinstallprompt', (e) => {
        $('.install-app-btn-container').show();
        $('.mobile_drop_down').animate({
            bottom: "0px"
        }, 200);
        deferredPrompt = e;
    });

});

$(document).ready(function () {
    // Function to add blur class to wrapper when modal has 'show' class
    function addBlurOnModalShow() {
        if ($('.modal').hasClass('show')) {
            $('#main-content').addClass('blurred');
        }
    }
    // Call the function on document ready
    addBlurOnModalShow();
    // Event listener for modal visibility changes
    $('.modal').on('shown.bs.modal', function () {
        $('#main-content').addClass('blurred');
    });
    $('.modal').on('hidden.bs.modal', function () {
        $('#main-content').removeClass('blurred');
    });
});
