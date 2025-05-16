$(document).ready(function () {
  //!! Change Pass////////

  $("#changepass").submit(function (e) {
    e.preventDefault();
    var oldpass = $("#oldpass").val();
    var newpass = $("#newpass").val();
    var cnewpass = $("#cnewpass").val();
    if (oldpass !== "" && newpass !== "" && cnewpass !== "") {
      if (newpass == cnewpass) {
        if (oldpass !== cnewpass) {
          $.ajax({
            url: "php_files/changepass.php",
            type: "POST",
            data: $("#changepass").serialize(),
            beforeSend: function () {
              $("#overlayer").show();
            },
            success: function (data) {
              // console.log(data);
              $("#changepass").trigger("reset");
              if (data == "0") {
                $("#alertBox")
                  .removeClass("alert-success alert-warning")
                  .addClass("alert-danger")
                  .fadeIn(1000)
                  .html("Confirm Password does not matched.")
                  .fadeOut(3000);
              } else if (data == "1") {
                $("#alertBox")
                  .removeClass("alert-success alert-warning")
                  .addClass("alert-danger")
                  .fadeIn(1000)
                  .html("Current Password does not matched.")
                  .fadeOut(3000);
              } else if (data == "3") {
                swal(
                  "Good job!",
                  "Password Updated Succssfully .",
                  "success"
                ).then((value) => {
                  if ((value = true)) {
                    window.location = "page-dashboard.php";
                  }
                });
              }
              $("#overlayer").hide();
            },
          });
        } else {
          $("#changepass").trigger("reset");
          $("#alertBox")
            .removeClass("alert-success alert-warning")
            .addClass("alert-danger")
            .fadeIn(1000)
            .html("Old password and new password must have changed.")
            .fadeOut(3000);
        }
      } else {
        $("#changepass").trigger("reset");
        $("#alertBox")
          .removeClass("alert-success alert-warning")
          .addClass("alert-danger")
          .fadeIn(1000)
          .html("Confirm Password does not matched.")
          .fadeOut(3000);
      }
    } else {
      $("#changepass").trigger("reset");
      $("#alertBox")
        .removeClass("alert-danger alert-success")
        .addClass("alert-warning")
        .fadeIn(1000)
        .html("All Fields are required.")
        .fadeOut(3000);
    }
  });

  //!! Log Out Function .........
  $("#logout").click(function (e) {
    e.preventDefault();
    swal({
      title: "Are you sure want to sign out ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "php_files/logout.php",
          beforeSend: function () {
            $("#overlayer").show();
          },
          success: function (data) {
            if (data == "success") {
              swal("Good job!", "Log Out Succssfully .", "success").then(
                (value) => {
                  if ((value = true)) {
                    window.location = "index.php";
                  }
                }
              );
            } else {
              swal("Oops!", "Log Out Failed .", "error");
            }
          },
        });
      }
    });
  });

  // Load Success Students.....
  function LoadSuccessStudents() {
    $.ajax({
      url: "php_files/load_success_students.php",
      type: "POST",
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#LoadContent").html(data);
        $("#overlayer").hide();
      },
    });
  }
  LoadSuccessStudents();

  // Add success students ......
  $("#AddSuccessStudents").on("submit", function (e) {
    e.preventDefault();
    var stunents_name = $("#stunents_name").val();
    var stunents_job = $("#stunents_job").val();
    var image = $("#stunents_photo").val();
    if (stunents_name == "") {
      toastr.error("Students name is required.");
    } else if (stunents_job == "") {
      toastr.error("Students job is required.");
    } else if (image == "") {
      toastr.error("Students photo is required.");
    } else {
      var data = new FormData(this);
      $.ajax({
        url: "php_files/add_success_students.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#overlayer").show();
        },
        success: function (data) {
          $(".modal_close").click();
          $("#overlayer").hide();
          $("#AddSuccessStudents").trigger("reset");
          var result = jQuery.parseJSON(data);
          if (result.status == "error") {
            var msg = result.msg;
            toastr.error(msg);
          } else {
            var msg = result.msg;
            toastr.success(msg);
          }
          LoadSuccessStudents();
        },
      });
    }
  });

  // Edit Success Students///
  $(document).on("click", "#EditSuccessStudents", function () {
    var id = $(this).data("id");
    $.ajax({
      url: "php_files/EditSuccessStudents.php",
      type: "POST",
      data: { id: id },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#overlayer").hide();
        $("#EditSuccessData").html(data);
        $("#EditStudents").modal("show");
      },
    });
  });

  // Update Success Students //
  $("#EditSuccessData").on("submit", function (e) {
    e.preventDefault();
    var stunent_name = $("#stunent_name").val();
    var stunent_job = $("#stunent_job").val();
    var stunent_image = $("#stunent_old_photo").val();
    if (stunent_name == "") {
      toastr.error("Students name is required.");
    } else if (stunent_job == "") {
      toastr.error("Students job is required.");
    } else if (stunent_image == "") {
      toastr.error("Students photo is required.");
    } else {
      var newData = new FormData(this);
      $.ajax({
        url: "php_files/update_success_students.php",
        type: "POST",
        data: newData,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#overlayer").show();
        },
        success: function (data) {
          $(".modal_close").click();
          $("#overlayer").hide();
          $("#EditSuccessData").trigger("reset");
          var result = jQuery.parseJSON(data);
          if (result.status == "error") {
            var msg = result.msg;
            toastr.error(msg);
          } else {
            var msg = result.msg;
            toastr.success(msg);
          }
          LoadSuccessStudents();
        },
      });
    }
  });

  // Delete Success Students//

  $(document).on("click", "#DeleteSuccessStudents", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    swal({
      title: "Are you sure want to Delete this students ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "php_files/DeleteSuccessStudents.php",
          type: "POST",
          data: { delete_id: id },
          beforeSend: function () {
            $("#overlayer").show();
          },
          success: function (data) {
            var result = jQuery.parseJSON(data);
            var msg = result.msg;
            if (result.status == "success") {
              toastr.success(msg);
            } else {
              toastr.error(msg);
            }
            LoadSuccessStudents();
          },
        });
      }
    });
  });

  //!! YouTube Section
  // Load Youtube //
  function LoadThumbnail() {
    $.ajax({
      url: "php_files/load_thumbnail.php",
      type: "POST",
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#loadYTcontent").html(data);
        $("#overlayer").hide();
      },
    });
  }
  LoadThumbnail();

  //add youtube //
  $("#yt_form").on("submit", function (e) {
    e.preventDefault();
    var title = $("#title").val();
    var link = $("#link").val();
    var yt_photo = $("#yt_photo").val();
    if (title == "") {
      toastr.error("Title is required.");
    } else if (link == "") {
      toastr.error("Link is required.");
    } else if (yt_photo == "") {
      toastr.error("Thumbnail is required.");
    } else {
      var data = new FormData(this);
      $.ajax({
        url: "php_files/add_youtube.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#overlayer").show();
        },
        success: function (data) {
          $(".modal_close").click();
          $("#overlayer").hide();
          $("#yt_form").trigger("reset");
          var result = jQuery.parseJSON(data);
          if (result.status == "error") {
            var msg = result.msg;
            toastr.error(msg);
          } else {
            var msg = result.msg;
            toastr.success(msg);
          }
          LoadThumbnail();
        },
      });
    }
  });

  // Edit Thumbnail ///
  $(document).on("click", "#EditThumbnail", function (e) {
    e.preventDefault();
    var id = $(this).data("yt_id");
    $.ajax({
      url: "php_files/EditThumbnail.php",
      type: "POST",
      data: { id: id },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#overlayer").hide();
        $("#LoadEditContent").html(data);
        $("#EditYtVideo").modal("show");
      },
    });
  });

  // Update Thumbnail //
  $(document).on("submit", "#UpdateThumbnailData", function (e) {
    e.preventDefault();
    var EditTitle = $("#EditTitle").val();
    var EditLink = $("#EditLink").val();
    var yt_old_photo = $("#old_thumbnail").val();
    var yt_new_photo = $("#new_thumbnail").val();
    if (EditTitle == "") {
      toastr.error("Title is required.");
    } else if (EditLink == "") {
      toastr.error("Link is required.");
    } else if (yt_old_photo == "" && yt_new_photo == "") {
      toastr.error("Thumbnail is required.");
    } else {
      var newData = new FormData(this);
      $.ajax({
        url: "php_files/update_thumbnail.php",
        type: "POST",
        data: newData,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#overlayer").show();
        },
        success: function (data) {
          $(".modal_close").click();
          $("#overlayer").hide();
          $("#UpdateThumbnail").trigger("reset");
          var result = jQuery.parseJSON(data);
          if (result.status == "error") {
            var msg = result.msg;
            toastr.error(msg);
          } else {
            var msg = result.msg;
            toastr.success(msg);
          }
          LoadThumbnail();
        },
      });
    }
  });

  // Delete Thumbnail //
  $(document).on("click", "#YoutubeDelete", function (e) {
    e.preventDefault();
    var id = $(this).data("yt_id");
    swal({
      title: "Are you sure want to Delete this students ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "php_files/DeleteThumbnail.php",
          type: "POST",
          data: { delete_id: id },
          beforeSend: function () {
            $("#overlayer").show();
          },
          success: function (data) {
            var result = jQuery.parseJSON(data);
            var msg = result.msg;
            if (result.status == "success") {
              toastr.success(msg);
            } else {
              toastr.error(msg);
            }
            LoadThumbnail();
          },
        });
      }
    });
  });

  //!! Notice Section
  // Load Notice //
  function loadnotice() {
    $.ajax({
      url: "php_files/load_notice.php",
      type: "POST",
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#LoadNoticeContent").html(data);
        $("#overlayer").hide();
      },
    });
  }
  loadnotice();

  //add notice //
  $("#NoticeForm").on("submit", function (e) {
    e.preventDefault();
    var title = $("#title").val();
    var link = $("#link").val();
    var notice_file = $("input[type=file]").val().split("\\").pop();
    if (title == "") {
      toastr.error("Notice Title is required.");
    } else if (link == "" && $("#FileCheckBox").prop("checked") == false) {
      toastr.error("Notice link is required.");
    } else if (
      notice_file == "" &&
      $("#FileCheckBox").prop("checked") == true
    ) {
      toastr.error("Media file is required.");
    } else {
      var data = new FormData(this);
      $.ajax({
        url: "php_files/add_notice.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#overlayer").show();
        },
        success: function (data) {
          $(".modal_close").click();
          $("#overlayer").hide();
          $("#NoticeForm").trigger("reset");
          var result = jQuery.parseJSON(data);
          if (result.status == "error") {
            var msg = result.msg;
            toastr.error(msg);
          } else {
            var msg = result.msg;
            toastr.success(msg);
          }
          loadnotice();
        },
      });
    }
  });

  // Delete Notice //
  $(document).on("click", "#NoticeDelete", function (e) {
    e.preventDefault();
    var id = $(this).data("notice_id");
    swal({
      title: "Are you sure want to Delete this Notice ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "php_files/DeleteNotice.php",
          type: "POST",
          data: { delete_id: id },
          beforeSend: function () {
            $("#overlayer").show();
          },
          success: function (data) {
            var result = jQuery.parseJSON(data);
            var msg = result.msg;
            if (result.status == "success") {
              toastr.success(msg);
            } else {
              toastr.error(msg);
            }
            loadnotice();
          },
        });
      }
    });
  });

  //! Students Registration ....
  // Load Students .........
  function LoadRegisterStudents() {
    $.ajax({
      url: "php_files/load_register_stuedents.php",
      type: "POST",
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#LoadRegisterStudents").html(data);
        $("#overlayer").hide();
        LoadStudentsTable();
      },
    });
  }
  LoadRegisterStudents();

  //! Students Registration ...

  $(document).on("submit", "#AddStudentsForm", function (e) {
    e.preventDefault();
    var mobile = $("#mobile").val();
    var gurdain_mobile = $("#gurdain_mobile").val();
    var aadhar = $("#aadhar").val();
    var pin = $("#pin").val();

    if ($("#stu_id").val() == "") {
      toastr.error("Student ID is required.");
    } else if ($("#name").val() == "") {
      toastr.error("Name is required.");
    } else if ($("#father_name").val() == "") {
      toastr.error("Fathers name is required.");
    } else if ($("#mother_name").val() == "") {
      toastr.error("Mothers name is required.");
    } else if ($("#dob").val() == "") {
      toastr.error("Date of birth is required.");
    } else if ($("#gander").find(":selected").val() == "") {
      toastr.error("Gander is required.");
    } else if (mobile == "" || mobile.length > 10 || mobile.length < 10) {
      toastr.error("Mobile number invalid.");
    } else if (
      gurdain_mobile == "" ||
      gurdain_mobile.length > 10 ||
      gurdain_mobile.length < 10
    ) {
      toastr.error("Gurdain mobile number invalid.");
    } else if ($("#email").val() == "") {
      toastr.error("Email is required.");
    } else if ($("#category").find(":selected").val() == "") {
      toastr.error("Category is required.");
    } else if ($("#religion").find(":selected").val() == "") {
      toastr.error("Religion is required.");
    } else if ($("#batch").find(":selected").val() == "") {
      toastr.error("Batch is required.");
    } else if ($("#village").val() == "") {
      toastr.error("Village is required.");
    } else if ($("#post_office").val() == "") {
      toastr.error("Post Office is required.");
    } else if ($("#police_station").val() == "") {
      toastr.error("Police Station is required.");
    } else if ($("#district").val() == "") {
      toastr.error("District is required.");
    } else if (pin == "" || pin.length > 6 || pin.length < 6) {
      toastr.error("Pin is required.");
    } else if ($("#state").val() == "") {
      toastr.error("State is required.");
    } else if ($("#country").val() == "") {
      toastr.error("Country is required.");
    } else if ($("#image").val().split("\\").pop() == "") {
      toastr.error("Student photo is required.");
    } else {
      var data = new FormData(this);
      $.ajax({
        url: "php_files/save_students_registration.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#overlayer").show();
        },
        success: function (data) {
          $("#overlayer").hide();
          // console.log(data);
          var result = jQuery.parseJSON(data);
          if (result.status == "error") {
            var msg = result.msg;
            toastr.error(msg);
          } else {
            $("#AddStudentsForm").trigger("reset");
            var msg = result.msg;
            toastr.success(msg);
          }
        },
      });
    }
  });

  // delete from freesh Students ///
  $(document).on("click", "#DeleteRegisterStudents", function (e) {
    e.preventDefault();
    var id = $(this).data("stu_id");
    // alert(id);
    swal({
      title: "Are you sure want to Delete this Students ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "php_files/DeleteRegisterStudents.php",
          type: "POST",
          data: { id: id },
          beforeSend: function () {
            $("#overlayer").show();
          },
          success: function (data) {
            var result = jQuery.parseJSON(data);
            var msg = result.msg;
            if (result.status == "success") {
              swal(
                "Good job!",
                "Student Deleted Successfully!",
                "success"
              ).then((value) => {
                window.location.reload();
              });
            } else {
              swal("Good job!", "Student Deleted Failed !", "error");
            }
          },
        });
      }
    });
  });

  // Edit Registered Students ///
  $(document).on("click", "#RegisterStudents", function (e) {
    e.preventDefault();
    var id = $(this).data("stu_id");
    $.ajax({
      url: "php_files/RegisterStudents.php",
      type: "POST",
      data: { id: id },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#overlayer").hide();
        $("#LoadEditRegisterStudents").html(data);
        $("#EditRegisteredStudents").modal("show");
      },
    });
  });

  // Update Registered Students //
  $(document).on("submit", "#UpdateRegisteredStudents", function (e) {
    e.preventDefault();
    if ($("#name").val() == "") {
      toastr.error("Name is required.");
    } else if ($("#father_name").val() == "") {
      toastr.error("Fathers name is required.");
    } else if ($("#dob").val() == "") {
      toastr.error("Date of birth is required.");
    } else if ($("#gander").find(":selected").val() == "") {
      toastr.error("Gander is required.");
    } else if ($("#mobile").val() == "") {
      toastr.error("Mobile is required.");
    } else if ($("#email").val() == "") {
      toastr.error("Email is required.");
    } else if ($("#height").val() == "") {
      toastr.error("Height is required.");
    } else if ($("#weight").val() == "") {
      toastr.error("Weight is required.");
    } else if ($("#qualification").val() == "") {
      toastr.error("Last Qualification is required.");
    } else if ($("#course").find(":selected").val() == "") {
      toastr.error("Course is required.");
    } else if ($("#batch").find(":selected").val() == "") {
      toastr.error("Batch is required.");
    } else if ($("#aadhar").val() == "") {
      toastr.error("Aadhar number is required.");
    } else if ($("#village").val() == "") {
      toastr.error("Village is required.");
    } else if ($("#post_office").val() == "") {
      toastr.error("Post Office is required.");
    } else if ($("#police_station").val() == "") {
      toastr.error("Police Station is required.");
    } else if ($("#district").val() == "") {
      toastr.error("District is required.");
    } else if ($("#pin").val() == "") {
      toastr.error("Pin is required.");
    } else {
      var data = new FormData(this);
      $.ajax({
        url: "php_files/update_students_registration.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#overlayer").show();
        },
        success: function (data) {
          $("#overlayer").hide();
          $(".modal_close").click();
          var result = jQuery.parseJSON(data);
          if (result.status == "error") {
            var msg = result.msg;
            toastr.error(msg);
          } else {
            var msg = result.msg;
            toastr.success(msg);
          }
          LoadRegisterStudents();
        },
      });
    }
  });

  // Status Registered Students ///
  $(document).on("click", ".students_status", function (e) {
    e.preventDefault();
    var id = $(this).data("stu_id");
    var status = "";
    if ($(this).prop("checked") == true) {
      status = "1";
    } else if ($(this).prop("checked") == false) {
      status = "0";
    }
    $.ajax({
      url: "php_files/EditStudentsStatus.php",
      type: "POST",
      data: { id: id, status: status },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#overlayer").hide();
        var result = jQuery.parseJSON(data);
        if (result.status == "error") {
          var msg = result.msg;
          toastr.error(msg);
        } else {
          var msg = result.msg;
          toastr.success(msg);
        }
        LoadRegisterStudents();
      },
    });
  });

  // Delete Registered Students //
  $(document).on("click", "#StudentsDelete", function (e) {
    e.preventDefault();
    var id = $(this).data("stu_id");
    swal({
      title: "Are you sure want to Delete this Students ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "php_files/DeleteStudents.php",
          type: "POST",
          data: { delete_id: id },
          beforeSend: function () {
            $("#overlayer").show();
          },
          success: function (data) {
            var result = jQuery.parseJSON(data);
            var msg = result.msg;
            if (result.status == "success") {
              toastr.success(msg);
            } else {
              toastr.error(msg);
            }
            LoadRegisterStudents();
          },
        });
      }
    });
  });

  //!! Students Collect ///
  // Fees Modal
  $(document).on("click", "#student_collect", function (e) {
    e.preventDefault();
    var id = $(this).data("stu_id");
    var year = new Date().getFullYear();

    $.ajax({
      url: "php_files/StudentsCollect.php",
      type: "POST",
      data: { id: id, year: year },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#overlayer").hide();
        $("#LoadCollectStudents").html(data);
        $("#StudentsFees").modal("show");
      },
    });
  });
  //!! Old Students Collect ///
  // Fees Modal
  $(document).on("click", "#old_student_collect", function (e) {
    e.preventDefault();
    var id = $(this).data("stu_id");
    $.ajax({
      url: "php_files/OldStudentsCollect.php",
      type: "POST",
      data: { id: id },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#overlayer").hide();
        $("#LoadCollectStudents").html(data);
        $("#StudentsFees").modal("show");
      },
    });
  });

  //!! Students Fees Collect
  $("#Fees_Forms").on("submit", function (e) {
    e.preventDefault();

    // Get selected months
    var selectedMonths = [];
    $(".month.selected").each(function () {
      selectedMonths.push($(this).data("value"));
    });

    // Validation
    if (selectedMonths.length === 0) {
      toastr.error("Please select at least one month.");
      return;
    }

    // Create FormData object
    var formData = new FormData(this);

    // Append selected months to FormData
    formData.append("selected_months", selectedMonths.join(","));

    Swal.fire({
      title: "Select Payment Method",
      text: "How do you want to pay?",
      icon: "question",
      showCancelButton: false, // Hide default cancel button
      showConfirmButton: false, // Hide default confirm button
      allowOutsideClick: false, // Prevent closing on outside click
      showCloseButton: true, // Add top-right close button (X)
      html: `
        <button id="cashPaymentBtn" class="swal2-confirm swal2-styled">Cash</button>
        <button id="onlinePaymentBtn" class="swal2-cancel swal2-styled">Online Payment</button>
      `,

      didOpen: () => {
        let amount = selectedMonths.length * 500;
        // Handle Cash Payment
        document
          .getElementById("cashPaymentBtn")
          .addEventListener("click", () => {
            Swal.close(); // Close the dialog
            if (
              confirm(
                `You have to collect total amount of: ${amount}.00/- from students`
              )
            ) {
              // AJAX for Cash Payment
              $.ajax({
                url: "php_files/students_fees.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                  $("#overlayer").show();
                },
                success: function (response) {
                  $("#overlayer").hide();
                  $(".modal_close").click();
                  try {
                    var result = JSON.parse(response);
                    if (result.status === "error") {
                      toastr.error(result.msg);
                    } else {
                      Swal.fire(
                        "Payment Received Successful!",
                        "Your payment was successful.",
                        "success"
                      )
                      // .then(() => {
                      //   location.reload(); // Refresh UI
                      // });
                    }
                  } catch (e) {
                    toastr.error("Unexpected response from server.");
                    console.error("Parsing error:", e);
                  }
                },
                error: function (xhr, status, error) {
                  $("#overlayer").hide();
                  toastr.error("Error: " + error);
                },
              });
            }
          });

        // Handle Online Payment
        document
          .getElementById("onlinePaymentBtn")
          .addEventListener("click", () => {
            Swal.close(); // Close the dialog

            let studentId = $("#student_id").val();
            let year = $("#year").val();
            let amount = selectedMonths.length * 500 * 100;

            var options = {
              key: "rzp_test_LzIrcpJhdUiUpR", // Replace with your Razorpay Key
              amount: amount, // Amount in paisa (10000 = ₹100)
              currency: "INR",
              name: "BiCE Institute",
              description: "Fee Payment",
              image: "https://biceindia.in/assets/img/logo1.png",
              handler: function (response) {
                var paymentFormData = new FormData();
                paymentFormData.append("student_id", studentId);
                paymentFormData.append("year", year);
                paymentFormData.append(
                  "selected_months",
                  selectedMonths.join(",")
                );
                paymentFormData.append(
                  "payment_id",
                  response.razorpay_payment_id
                );
                paymentFormData.append("payment_method", "online");

                $.ajax({
                  type: "POST",
                  url: "php_files/monthly_payment_process.php",
                  data: paymentFormData,
                  contentType: false,
                  processData: false,
                  beforeSend: function () {
                    $("#overlayer").show();
                  },
                  success: function (data) {
                    $("#overlayer").hide();
                    try {
                      var result = JSON.parse(data);
                      if (result.status == "error") {
                        toastr.error(result.msg);
                      } else {
                        Swal.fire(
                          "Payment Received Successful!",
                          "Your payment was successful.",
                          "success"
                        )
                        .then(() => {
                          $("#StudentsFees").modal('hide');
                        });
                      }
                    } catch (e) {
                      toastr.error("Unexpected response from server.");
                      console.error("Parsing error:", e);
                    }
                  },
                  error: function (xhr, status, error) {
                    $("#overlayer").hide();
                    toastr.error("Payment processing failed.");
                    console.error("AJAX Error:", error);
                  },
                });
              },
              theme: { color: "#3399cc" },
            };

            var rzp = new Razorpay(options);
            rzp.open();
          });
      },
    });
  });

  // ! when changeing year
  $(document).change("#year", function () {
    let year = $("#year").val();
    var id = $("#student_id").val();

    $.ajax({
      url: "php_files/StudentsCollect.php",
      type: "POST",
      data: { id: id, year: year },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#overlayer").hide();
        $("#LoadCollectStudents").html(data);
        $("#StudentsFees").modal("show");
      },
    });
  });

  //! Old Students Fees Collect
  $("#Old_Fees_Forms").on("submit", function (e) {
    e.preventDefault();
    var months = $("#months").find(":selected").val();
    var Fees = $("#Fees").val();
    if (months == "") {
      toastr.error("Months is required.");
    } else if (Fees == "") {
      toastr.error("Fees is required.");
    } else {
      var data = new FormData(this);
      $.ajax({
        url: "php_files/old_students_fees.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#overlayer").show();
        },
        success: function (data) {
          // console.log(data);
          $(".modal_close").click();
          $("#overlayer").hide();
          var result = jQuery.parseJSON(data);
          if (result.status == "error") {
            var msg = result.msg;
            toastr.error(msg);
          } else {
            var msg = result.msg;
            toastr.success(msg);
          }
        },
      });
    }
  });

  //! Fees Details
  $(document).on("click", "#StudentsDetailsBtn", function (e) {
    e.preventDefault();
    var id = $(this).data("stu_id");
    $.ajax({
      url: "php_files/StudentsDetails.php",
      type: "POST",
      data: { id: id },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#overlayer").hide();
        $("#FeesDetails").html(data);
        $("#StudentsDetails").modal("show");
      },
    });
  });

  //! Old Students Fees Details
  $(document).on("click", "#OldStudentsDetailsBtn", function (e) {
    e.preventDefault();
    var id = $(this).data("stu_id");
    $.ajax({
      url: "php_files/OldStudentsDetails.php",
      type: "POST",
      data: { id: id },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#overlayer").hide();
        $("#FeesDetails").html(data);
        $("#StudentsDetails").modal("show");
      },
    });
  });

  //! Setting Section..........
  $("#setting_form").submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: "php_files/setting.php",
      type: "POST",
      data: $("#setting_form").serialize(),
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#overlayer").hide();
        // console.log(data);
        var result = jQuery.parseJSON(data);
        if (result.status == "success") {
          var msg = result.msg;
          toastr.success(msg);
        } else {
          var msg = result.msg;
          toastr.error(msg);
        }
      },
    });
  });

  //! Load Gallary Section.....

  function LoadGallary() {
    $.ajax({
      url: "php_files/gallary.php",
      type: "POST",
      data: { getdata: "getdata" },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#LoadGallary").html(data);
        $("#overlayer").hide();
      },
    });
  }
  LoadGallary();

  //! Add Gallary Photos........

  $(document).on("submit", "#AddGallaryForm", function (e) {
    e.preventDefault();
    var image = $("#gallary_photo").val();
    if (image == "") {
      toastr.error("Gallary photo is required.");
    } else {
      var data = new FormData(this);
      $.ajax({
        url: "php_files/gallary.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#overlayer").show();
        },
        success: function (data) {
          $(".modal_close").click();
          $("#overlayer").hide();
          $("#AddGallaryForm").trigger("reset");
          var result = jQuery.parseJSON(data);
          if (result.status == "error") {
            var msg = result.msg;
            toastr.error(msg);
          } else {
            var msg = result.msg;
            toastr.success(msg);
          }
          LoadGallary();
        },
      });
    }
  });

  //! Delete gallary photo //

  $(document).on("click", "#DeleteGallary", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    swal({
      title: "Are you sure want to Delete this Gallary Photo ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "php_files/gallary.php",
          type: "POST",
          data: { delete_gallary_id: id },
          beforeSend: function () {
            $("#overlayer").show();
          },
          success: function (data) {
            var result = jQuery.parseJSON(data);
            var msg = result.msg;
            if (result.status == "success") {
              toastr.success(msg);
            } else {
              toastr.error(msg);
            }
            LoadGallary();
          },
        });
      }
    });
  });

  //! Banner Section
  //! Load Banner Section.....

  function LoadBanner() {
    $.ajax({
      url: "php_files/banner.php",
      type: "POST",
      data: { getdata: "getdata" },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#LoadBanner").html(data);
        $("#overlayer").hide();
      },
    });
  }
  LoadBanner();

  //! Add Banner Photos........

  $(document).on("submit", "#AddBannerForm", function (e) {
    e.preventDefault();
    var image = $("#banner_photo").val();
    if (image == "") {
      toastr.error("Banner photo is required.");
    } else {
      var data = new FormData(this);
      $.ajax({
        url: "php_files/banner.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#overlayer").show();
        },
        success: function (data) {
          $(".modal_close").click();
          $("#overlayer").hide();
          $("#AddBannerForm").trigger("reset");
          var result = jQuery.parseJSON(data);
          if (result.status == "error") {
            var msg = result.msg;
            toastr.error(msg);
          } else {
            var msg = result.msg;
            toastr.success(msg);
          }
          LoadBanner();
        },
      });
    }
  });

  //! Delete Banner Photo//

  $(document).on("click", "#DeleteBanner", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    swal({
      title: "Are you sure want to Delete this Banner Photo ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "php_files/banner.php",
          type: "POST",
          data: { delete_banner_id: id },
          beforeSend: function () {
            $("#overlayer").show();
          },
          success: function (data) {
            var result = jQuery.parseJSON(data);
            var msg = result.msg;
            if (result.status == "success") {
              toastr.success(msg);
            } else {
              toastr.error(msg);
            }
            LoadBanner();
          },
        });
      }
    });
  });

  //! SMS Setting.....
  $(document).on("click", "#SmsSetting", function (e) {
    e.preventDefault();
    $.ajax({
      url: "php_files/banner.php",
      type: "POST",
      data: { sms: "sms" },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#LoadStatus").html(data);
        $("#overlayer").hide();
        $("#SmsModal").modal("show");
      },
    });
  });

  //! SMS Update status....

  $(document).on("click", ".sms_status", function (e) {
    e.preventDefault();
    var status = "";
    if ($(this).prop("checked") == true) {
      status = "1";
    } else if ($(this).prop("checked") == false) {
      status = "0";
    }
    $.ajax({
      url: "php_files/banner.php",
      type: "POST",
      data: { op_type: "update", status: status },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#overlayer").hide();
        $("#SmsModal").modal("hide");
        var result = jQuery.parseJSON(data);
        if (result.status == "error") {
          var msg = result.msg;
          toastr.error(msg);
        } else {
          var msg = result.msg;
          toastr.success(msg);
        }
      },
    });
  });

  //! Batch Setting.....
  $(document).on("click", "#BatchSetting", function (e) {
    e.preventDefault();
    $.ajax({
      url: "php_files/batch.php",
      type: "POST",
      data: { get_data: "get_data" },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#LoadGroup").html(data);
        $("#overlayer").hide();
        $("#GroupModal").modal("show");
      },
    });
  });

  //! Change Batch.....
  $(document).on("change", "#active_course", function (e) {
    e.preventDefault();
    var changeId = $(this).children(":selected").attr("id");
    $.ajax({
      url: "php_files/batch.php",
      type: "POST",
      data: { changeId: changeId },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        if (data == "success") {
          swal("Good job!", "Batch Changed Successfully!", "success");
          $("#overlayer").hide();
          $("#GroupModal").modal("hide");
        } else {
          swal("Opps!", "Batch Change Faild!", "error");
          $("#overlayer").hide();
          $("#GroupModal").modal("hide");
        }
      },
    });
  });

  //! Add new batch
  $(document).on("submit", "#BatchForm", function (e) {
    e.preventDefault();
    var batch_name = $("#batch_name").val();
    if (batch_name == "") {
      toastr.error("Batch name is required.");
    } else {
      var data = new FormData(this);
      $.ajax({
        url: "php_files/batch.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#overlayer").show();
        },
        success: function (res) {
          $("#overlayer").hide();
          $("#AddBatchModal").modal("hide");
          $("#BatchForm").trigger("reset");
          var result = jQuery.parseJSON(res);
          if (result.status == "error") {
            var msg = result.msg;
            toastr.error(msg);
          } else {
            var msg = result.msg;
            toastr.success(msg);
          }
        },
      });
    }
  });

  //! Course Setting.....
  $(document).on("click", "#CourseSetting", function (e) {
    e.preventDefault();
    $.ajax({
      url: "php_files/course.php",
      type: "POST",
      data: { get_data: "get_data" },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#LoadGroup").html(data);
        $("#overlayer").hide();
        $("#GroupModal").modal("show");
      },
    });
  });

  //! Add new batch
  $(document).on("submit", "#CourseForm", function (e) {
    e.preventDefault();
    var batch_name = $("#course_name").val();
    if (batch_name == "") {
      toastr.error("Course name is required.");
    } else {
      var data = new FormData(this);
      $.ajax({
        url: "php_files/course.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#overlayer").show();
        },
        success: function (res) {
          $("#overlayer").hide();
          $("#AddCourseModal").modal("hide");
          $("#CourseForm").trigger("reset");
          var result = jQuery.parseJSON(res);
          if (result.status == "error") {
            var msg = result.msg;
            toastr.error(msg);
          } else {
            var msg = result.msg;
            toastr.success(msg);
          }
        },
      });
    }
  });

  //! Delete Contact........
  $(document).on("click", "#DeleteContact", function (e) {
    e.preventDefault();
    var id = $(this).data("contect_id");
    swal({
      title: "Are you sure want to Delete this Contact ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "php_files/DeleteContact.php",
          type: "POST",
          data: { delete_id: id },
          beforeSend: function () {
            $("#overlayer").show();
          },
          success: function (data) {
            $("#overlayer").hide();
            var result = jQuery.parseJSON(data);
            var msg = result.msg;
            if (result.status == "success") {
              toastr.success(msg);
            } else {
              toastr.error(msg);
            }
            location.reload(true);
          },
        });
      }
    });
  });

  //!Fetch Pending Students .......
  $(document).on("click", "#ApproveStudents", function (e) {
    e.preventDefault();
    var s_id = $(this).data("stu_id");
    $.ajax({
      url: "php_files/ApprveStudents.php",
      type: "POST",
      data: { s_id: s_id },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        // console.log(data);
        $("#overlayer").hide();
        $("#ApproveModalContent").html(data);
        $("#ApproveModal").modal("show");
      },
    });
  });

  //! Approve Students .......
  $(document).on("submit", "#ApproveForm", function (e) {
    e.preventDefault();
    $.ajax({
      url: "php_files/ApprveStudents.php",
      type: "POST",
      data: $(this).serialize(),
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        // console.log(data);
        $("#overlayer").hide();
        $("#ApproveModal").modal("hide");
        var result = jQuery.parseJSON(data);
        if (result.status == "success") {
          toastr.success("Students Approve Success.");
        } else {
          toastr.error("Student Approve Failed.");
        }
        location.reload(true);
      },
    });
  });

  //! Show Old Students ...
  $(document).on("click", "#ShowOldStudents", function (e) {
    e.preventDefault();
    var id = $(this).data("stu_id");
    $.ajax({
      url: "php_files/show_old_students.php",
      type: "POST",
      data: { id: id },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#overlayer").hide();
        $("#LoadOldStudents").html(data);
        $("#OldStuModal").modal("show");
      },
    });
  });

  //! Show Pending Students ...
  $(document).on("click", "#ViewPendingStudents", function (e) {
    e.preventDefault();
    var id = $(this).data("stu_id");
    $.ajax({
      url: "php_files/show_pending_students.php",
      type: "POST",
      data: { id: id },
      beforeSend: function () {
        $("#overlayer").show();
      },
      success: function (data) {
        $("#overlayer").hide();
        $("#PendingModalContent").html(data);
        $("#PendingModal").modal("show");
      },
    });
  });

  //! Delete Register Students........
  $(document).on("click", "#DeleteRegisterStu", function (e) {
    e.preventDefault();
    var id = $(this).data("res_id");
    swal({
      title: "Are you sure want to Delete this Register ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "php_files/delete_register.php",
          type: "POST",
          data: { delete_id: id },
          beforeSend: function () {
            $("#overlayer").show();
          },
          success: function (data) {
            $("#overlayer").hide();
            var result = jQuery.parseJSON(data);
            var msg = result.msg;
            if (result.status == "success") {
              toastr.success(msg);
            } else {
              toastr.error(msg);
            }
            location.reload(true);
          },
        });
      }
    });
  });

  //! Edit Mode of pending students
  $(document).on("click", ".edit_mode", function (e) {
    e.preventDefault();
    var id = $(this).data("stu_id");

    if ($(this).prop("checked") == false) {
      alert("Edit Mode already on.");
    } else if ($(this).prop("checked") == true) {
      $.ajax({
        url: "php_files/EditMode.php",
        type: "POST",
        data: { id: id },
        beforeSend: function () {
          $("#overlayer").show();
        },
        success: function (data) {
          $("#overlayer").hide();
          var result = jQuery.parseJSON(data);
          if (result.status == "error") {
            var msg = result.msg;
            toastr.error(msg);
          } else {
            var msg = result.msg;
            toastr.success(msg);
          }
          location.reload(true);
        },
      });
    }
  });
});
