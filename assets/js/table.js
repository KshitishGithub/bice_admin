//  Data Table with Function....

// $('#student_fees').DataTable();
$(function() {
    $("#student_fees").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('.col-md-6:eq(0)');
});
// Registered Students Table...

function LoadStudentsTable() {
    $(function() {
        $("#AllStudents").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('.col-md-6:eq(0)');
    });
}

//Dashboard table
$(function() {
    $(".dashboard_table").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
    }).buttons().container().appendTo('.col-md-6:eq(0)');
});