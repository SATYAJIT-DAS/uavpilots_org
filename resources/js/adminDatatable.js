$(function() {
    var pendingtable = $(".waiting-approval-user-data").DataTable({
        processing: true,
        serverSide: true,
        bDestroy: true,
        ajax: "pending-user-data",
        columns: [
            { data: "id", name: "id" },
            { data: "industry", name: "industry" },
            { data: "country", name: "country" },
            { data: "fullname", name: "fullname" },
            { data: "email", name: "email" },
            { data: "link", name: "link" },
            { data: "action", name: "action" }
        ],
        scrollX: true,
        pagingType: "full",
        initComplete: function() {
            var column = this.api().column(1);
            var select = $(
                '<select class=" ml-2 custom-select custom-select-sm form-control form-control-sm"><option value=""></option></select>'
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
    var userListtable = $(".active-user-data").DataTable({
        processing: true,
        serverSide: true,
        bDestroy: true,
        ajax: "active-user-data",
        columns: [
            { data: "id", name: "id" },
            { data: "industry", name: "industry" },
            { data: "country", name: "country" },
            { data: "fullname", name: "fullname" },
            { data: "email", name: "email" },
            { data: "link", name: "link" },
            { data: "action", name: "action" }
        ],
        scrollX: true,
        pagingType: "full",
        initComplete: function() {
            var column = this.api().column(1);
            var select = $(
                '<select class=" ml-2 custom-select custom-select-sm form-control form-control-sm"><option value=""></option></select>'
            )
                .appendTo($("#DataTables_Table_1_length"))
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
    $(document).on("click", ".approve-button", function() {
        var userid = parseInt($(this).attr("id"));
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        $.ajax({
            type: "POST",
            url: "approve-user",
            data: { approve_id: userid },
            success: function(data) {
                pendingtable.ajax.reload();
                userListtable.ajax.reload();
            }
        });
    });
    $(document).on("click", ".unpublish-button", function() {
        var userid = parseInt($(this).attr("id"));
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        $.ajax({
            type: "POST",
            url: "unpublish-user",
            data: { unpublish_id: userid },
            success: function(data) {
                pendingtable.ajax.reload();
                userListtable.ajax.reload();
            }
        });
    });
    $(document).on("click", ".delete-button", function() {
        var userid = parseInt($(this).attr("id"));
        var confirmation = confirm("Are you sure to Delete the data");
        if (confirmation == true) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                type: "POST",
                url: "remove-user",
                data: { delete_id: userid },
                success: function(data) {
                    pendingtable.ajax.reload();
                }
            });
        }
    });
    $(document).on("click", ".delete-active-user-button", function() {
        var userid = parseInt($(this).attr("id"));
        var confirmation = confirm("Are you sure to Delete the data");
        if (confirmation == true) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            $.ajax({
                type: "POST",
                url: "remove-user",
                data: { delete_id: userid },
                success: function(data) {
                    userListtable.ajax.reload();
                }
            });
        }
    });
});
