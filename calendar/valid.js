$(document).ready(function() {
    $("#datedropdown").change(function(){
            var datevalue = $("#datedropdown option:selected").val();
            getdata();
        }

    )
}
);

function getdata(){
    var datevalue = $("#datedropdown option:selected").val();
    var area = $("#data");
    if (datevalue == 0) {
        area.attr("disabled", true);
        getcity();
    } else {
        area.attr("disabled", false);
        area.load("getdata.php", {date : datevalue});
    }
}