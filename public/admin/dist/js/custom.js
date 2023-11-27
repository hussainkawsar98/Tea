$(document).ready(function(){
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    // $("#dataInput").on("keyup", function() {
    //     var value = $(this).val().toLowerCase();
    //     $("#myTable tbody tr").filter(function() {
    //     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    //     });
    // });

    $("input").on("change", function() {
        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format( this.getAttribute("data-date-format") )
        )
    }).trigger("change")

    // $("#filterDate").on("keyup", function() {
    //     var value = $(this).val().toLowerCase();
    //     $("#myTable tbody tr").filter(function() {
    //     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    //     });
    // });
});