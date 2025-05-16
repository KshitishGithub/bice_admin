$(document).ready(function() {
    $("#StudentsDelete").click(function() {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
    })

    //! Print Form

    // jQuery(function($) {
    //     'use strict';
    //     $("#printSec").find('#printBtn').on('click', function() {
    //         //Print printSec with custom options
    //         $("#printSec").print({
    //             //Use Global styles
    //             globalStyles: true,
    //             //Add link with attrbute media=print
    //             mediaPrint: true,
    //             //Custom stylesheet
    //             stylesheet: "http://fonts.googleapis.com/css?family=Inconsolata",
    //             //Print in a hidden iframe
    //             iframe: false,
    //             //Don't print this
    //             noPrintSelector: '#printBtn',
    //         });
    //     });
    // });
});