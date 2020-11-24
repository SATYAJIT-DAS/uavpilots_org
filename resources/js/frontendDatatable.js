$(function() {
    $(".user-data").DataTable({
        processing: true,
        serverSide: true,
        ajax: "userdata",
        columns: [
            { data: "id", name: "id" },
            { data: "state", name: "state" },
            { data: "country", name: "country" },
            { data: "created_at", name: "created_at" },
            { data: "updated_at", name: "updated_at" },
            { data: "link", name: "link" }
        ],
        scrollX: true,
        pagingType: "full",
        initComplete: function() {
            var column = this.api().column(1);
            var select = $(
                '<select class="ml-2 custom-select custom-select-sm form-control form-control-sm"><option value=""></option></select>'
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
