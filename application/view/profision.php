<?php
include '../include/links.php';
include '../include/header.php';
include '../include/sidebar.php';
?>





<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>List Of Specials</h4>
                    <span class="ml-1">Manage Operations</span>
                </div>
            </div>
            <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">profision</a></li>
                </ol>
            </div> -->
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h5>Basic Table</h5> -->
                        <button id="addNew" class="btn btn-primary float-right add">Create Profession</button>
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAME</th>

                                        <th>Description</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<div class="modal fade proffisionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Specialist Types</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Profession Type</label>
                        <input type="text" class="form-control name" placeholder="example: surgeon" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Description</label>
                        <input type="text" class="form-control decription" placeholder="One-line Description (option)" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->

                        <input type="text" hidden class="form-control id" id="recipient-name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save">save</button>
            </div>
        </div>
    </div>
</div>





<?php
include '../include/footer.php';
?>


<script src='../js/jquery-3.3.1.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src='../js/jquery-3.3.1.min.js'></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="../iziToast-master/dist/js/iziToast.js"></script>
<script src="../iziToast-master/dist/js/iziToast.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(() => {
        $(".add").click(() => {
            $(".proffisionModal").modal("show")
            clearInputData(
                $(".name"),
                $(".decription"),

            );
            $(".save").text("save");


        });

        $(".save").click(() => {
            if($(".name").val()==""){
                displayToast("all fields are required", "error", 2000);
                    }                  
                    else{
                        if ($(".save").text() == "save") {
                var data = {
                    name: $(".name").val(),
                    decription: $(".decription").val(),
                    action: "createProffision"
                }

                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    url: "../Api/proffision.api.php",
                    data: data,
                    success: (res) => {
                        console.log(res)
                        $(".proffisionModal").modal("hide")
                        readProffision();
                        $(".table").DataTable();
                        displayToast("The Data has been added..👋", "success", 2000)

                    },
                    error: (res) => {
                        console.log(res)
                        displayToast("Internal Server error occurred 😢", "error", 2000)
                    }
                })

            } else {
                var data = {
                    name: $(".name").val(),
                    decription: $(".decription").val(),

                    id: $(".id").val(),
                    action: "updateProffision",

                }
                console.log(data);

                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    url: "../Api/proffision.api.php",
                    data: data,
                    success: (res) => {
                        console.log(res)
                        $(".proffisionModal").modal("hide")
                        readProffision();
                        $(".table").DataTable();
                        displayToast("The Data has been updated..👋", "success", 2000)
                    },
                    error: (res) => {
                        console.log(res)
                        displayToast("Internal Server error occurred 😢", "error", 2000)
                    }
                })
            }


                    }
        })





        const readProffision = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "readProffision"
                },
                url: "../Api/proffision.api.php",
                success: (res) => {
                    var tr = "<tr>"
                    var {
                        data
                    } = res;
                    data.forEach(value => {
                        tr += `<td>${value.pro_id}</td>`
                        tr += `<td>${value.name}</td>`
                        tr += `<td>${value.description}</td>`
                        tr += `<td><a class='btn btn-success editButton' editID=${value.pro_id}>Edit</a>
                      <a class='btn btn-danger deleteProffision' delID=${value.pro_id}>Delete</a></td>`
                        tr += '</tr>'
                    })
                    $(".table tbody").html(tr)
                    $(".table").DataTable();
                    console.log(data)
                },
                error: (err) => {
                    console.log(err)
                }

            })
        }
        readProffision()
        const fetchProffisionData = (id) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "fetchingOne",
                    id: id
                },
                url: "../Api/proffision.api.php",
                success: (res) => {
                    console.log(res)
                    $('.name').val(res.data[0].name)
                    $('.decription').val(res.data[0].description)
                    $('.id').val(res.data[0].pro_id)
                    $('.save').text("Edit")
                    $(".proffisionModal").modal("show")
                },
                error: (res) => {
                    console.log(res)
                },
            })
        }



        $(document).on("click", "a.editButton", function() {
            var id = $(this).attr('editID')
            fetchProffisionData(id)

        })
        $(document).on("click", "a.deleteProffision", function() {
            var id = $(this).attr('delID')
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "POST",
                            data: {
                                "id": id,
                                "action": "deleteProffision"
                            },
                            url: "../Api/proffision.api.php",
                            success: (res) => {
                                swal("Data Has Been removed!", {
                                    icon: "success",
                                });
                                readProffision();

                                console.log(res)
                            },
                            error: (res) => {
                                console.log(res)
                            }

                        })

                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });
            // end

        })

        function clearInputData(...inputs) {
            inputs.forEach(input => {
                input.val("");
            })
        }

        function displayToast(message, type, timeout) {
            if (type == "error") {
                iziToast.error({
                    title: 'Error Encountered! ',
                    message: message,
                    backgroundColor: "#D83A56",
                    titleColor: "white",
                    messageColor: "white",
                    position: "topRight",
                    timeout: timeout
                });
            } else if (type == "success") {
                iziToast.success({

                    message: message,
                    backgroundColor: "#54B435",
                    titleColor: "white",
                    messageColor: "white",
                    position: "topRight",
                    timeout: timeout
                });
            } else if (type == "ask") {
                iziToast.question({
                    timeout: timeout,
                    close: false,
                    overlay: true,
                    displayMode: 'once',
                    id: 'question',
                    zindex: 999,
                    title: "Condirm!",
                    message: message,
                    position: 'topRight',
                    titleColor: "#86E5FF",
                    messageColor: "white",
                    backgroundColor: "#0081C9",
                    iconColor: "white",
                    buttons: [
                        ['<button style="background: #DC3535; color: white;"><b>YES</b></button>', function(instance, toast) {
                            alert("Ok Deleted...");
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                        }, true],
                        ['<button style="background: #ECECEC; color: #2b2b2b;">NO</button>', function(instance, toast) {
                            alert("Retuned");
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                        }],
                    ],
                    onClosing: function(instance, toast, closedBy) {
                        //  console.info('Closing | closedBy: ' + closedBy);
                    },
                    onClosed: function(instance, toast, closedBy) {
                        // console.info('Closed | closedBy: ' + closedBy);
                    }
                });
            }
        }
    })
</script>