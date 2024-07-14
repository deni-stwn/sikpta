<script src="{{ asset('lte/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('lte/DataTables/datatables.js') }}"></script>
<script>
    window.softdelete = function(tableid, url, route, message) {
        $(document).ready(function() {
            let showDeleted = false;

            $("#showDeleted").on("click", function() {
                showDeleted = !showDeleted;
                $(this).toggleClass('active', showDeleted);
                $(`#${tableid}`)
                    .DataTable()
                    .ajax.url(url + '?showDeleted=' + showDeleted)
                    .load();
                $(this).text(showDeleted ? "Hide Deleted" : "Show Deleted");
            });

            $(`#${tableid}`).on("click", ".restore", function() {
                let id = $(this).attr("id");
                Swal.fire({
                    title: "Apakah anda yakin ingin mengembalikan data ?",
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: "Ya",
                    denyButtonText: `Batal`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // let id = $(this).data('id');
                        $.ajax({
                            url: `${url}/restore/` + id + "",
                            method: "POST",
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                            success: function(data) {
                                // let oTable = $('#datatable-${message}').dataTable();
                                // oTable.fnDraw(false);
                                if (data.success) {
                                    $(`#${tableid}`).DataTable().ajax.reload();
                                    Swal.fire({
                                        icon: "success",
                                        title: `${message} Restored`,
                                        showConfirmButton: false,
                                        timer: 1500,
                                    });
                                    // Swal.fire("Berhasil menghapus!", "", "success");
                                } else {
                                    console.error("Deletion failed");
                                }
                            },
                        });
                        // Swal.fire("Berhasil menghapus!", "", "success");
                    } else if (result.isDenied) {
                        Swal.fire({
                            icon: "error",
                            title: `${message} Not Restored`,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                });
            });

            $(`#${tableid}`).on("click", ".force-delete", function() {
                let id = $(this).attr("id");
                Swal.fire({
                    title: "Apakah anda yakin ingin menghapus permanen data ?",
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: "Ya",
                    denyButtonText: `Batal`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // let id = $(this).data('id');
                        $.ajax({
                            url: `${url}/force-delete/` + id + "",
                            method: "DELETE",
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                            success: function(data) {
                                // let oTable = $('#datatable-${message}').dataTable();
                                // oTable.fnDraw(false);
                                if (data.success) {
                                    $(`#${tableid}`).DataTable().ajax.reload();
                                    Swal.fire({
                                        icon: "success",
                                        title: `${message} Permanently Deleted`,
                                        showConfirmButton: false,
                                        timer: 1500,
                                    });
                                    // Swal.fire("Berhasil menghapus!", "", "success");
                                } else {
                                    console.error("Deletion failed");
                                }
                            },
                        });
                        // Swal.fire("Berhasil menghapus!", "", "success");
                    } else if (result.isDenied) {
                        Swal.fire({
                            icon: "error",
                            title: `${message} Not Permanently Deleted`,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                });
            });
        });
    };
</script>
