$(function() {
    $(".user-data").DataTable({
        processing: true,
        serverSide: true,
        ajax: "userdata",
        columns: [
            { data: "name", name: "name" },
            { data: "industry", name: "industry" },
            { data: "location", name: "location" }
        ],
        scrollX: true,
        // lengthChange: false,
        pagingType: "full_numbers",
        initComplete: function() {
            var column = this.api().column(1);

            $('<label class="m-2">Filter:</label>').appendTo(
                $("#DataTables_Table_0_length")
            );
            let select = $(
                '<select class="m-2 custom-select custom-select-sm form-control form-control-sm"><option value="">Industry</option></select>'
            )
                .appendTo($("#DataTables_Table_0_length"))
                .on("change", function() {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                        .search(val ? "^" + val + "$" : "", true, false)
                        .draw();
                });

            column
                .data()
                .unique()
                .sort(function(d, j) {
                    select.append(
                        '<option value="' + d + '">' + d + "</option>"
                    );
                });
        }
    });
});
