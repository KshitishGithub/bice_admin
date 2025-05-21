$(function() {
    $.validator.setDefaults({
        submitHandler: function() {
            alert("Form successful submitted!");
        }
    });
    $('#AddStudentsForm').validate({
        rules: {
            stu_id: {
                required: true
            },
            name: {
                required: true
            },
            first_name: {
                required: true
            },
            second_name: {
                required: true
            },
            last_name: {
                required: true
            },
            father_name: {
                required: true
            },
            mother_name: {
                required: true
            },
            dob: {
                required: true,
                date: true
            },
            gander: {
                required: true
            },
            mobile: {
                required: true,
                phoneUS: true
            },
            village: {
                required: true
            },
            post_office: {
                required: true
            },
            police_station: {
                required: true
            },
            district: {
                required: true
            },
            pin: {
                required: true,
                minlength: 6,
                maxlength: 6,
            },
            state: {
                required: true
            },
            country: {
                required: true
            },
            image: {
                required: true
            }

        },
        messages: {
            stu_id: "Student ID is required.",
            name: "Name is required.",
            first_name: "First name is required.",
            last_name: "Last name is required",
            father_name: "Father name is required",
            mother_name: "Mother name is required",
            dob: "Date of birth is required",
            gander: "Gander is required",
            mobile: {
                required: "Mobile is required"
            },
            village: "Village is required",
            post_office: "Post Office is required",
            police_station: "Police station is required",
            districe: "District is required",
            pin: {
                required: "Pin number is required",
                minlength: "Pin number invalid.",
                maxlength: "Pin number invalid",
            },
            state: "State is required",
            country: "Country is required",
            image: "Image is required",
        }
    });
});