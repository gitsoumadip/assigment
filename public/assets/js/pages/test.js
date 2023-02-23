$(document).ready(function () {
    // alert('test');

    // Form Validations
    // $("#AddUserForm").validate({
    //     errorElement: "i",
    //     errorClass: "msg msg-error",
    //     rules: {
    //         name: {
    //             required: true,
    //             rangelength: [3, 100],
    //         },
    //         gender: {
    //             required: true,
    //         },
    //         address: {
    //             required: true,
    //             rangelength: [3, 100],
    //         },
    //         image: {
    //             required: true,
    //             accept: "jpg|jpeg|png"
    //         },
    //     },
    //     messages: {
    //         name: {
    //             required: "Please enter name",
    //             rangelength: "Name should be 3 to 100 characters.",
    //         },
    //         gender: {
    //             required: "Please enter gender",
    //             // rangelength: "gender should be .",
    //         },
    //         address: {
    //             required: "Please enter address",
    //             rangelength: "Address should be 3 to 100 characters.",
    //         },
    //         image: {
    //             required: "Please enter image => jpg|jpeg|png|",
    //             // rangelength: "Name should be 3 to 100 characters.",
    //         },

    //     },

    // });



    $('#AddUserForm').on("submit", function (e) {
        // var submitbtn = $(this).find("input[type=submit]");
        // $(submitbtn).text("Please Wait...");
        // $(submitbtn).props(disable, true);
        e.preventDefault();
        alert("Please Wait...");
        var data = new FormData(this);
        console.log(data);
        $.ajax({
            url: "{{ route('test.adddata') }}",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                // if (data.success == true) {
                //     $(submitbtn).text("submit");
                //     $(submitbtn).props(disable, false);
                //     alert(data.msg);
                // } else {
                //     alert(data.msg);
                // }
            }
        })

    })
})
