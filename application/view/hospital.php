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
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Manage All Hospitals</span>
                </div>
            </div>
            <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Hospital</a></li>
                </ol>
            </div> -->
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>All Hospitals</h5>
                        <button id="addNew" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary float-right add">Add New Hospital</button>
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>number</th>
                                        <th>email</th>
                                        <th>location</th>
                                        <!-- <th>description</th> -->
                                        <th>actions</th>
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
<div class="modal fade hospitalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">HOSPITAL - ADD NEW ONE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Hospital name</label>
                        <input type="text" class="form-control name" placeholder="example: digfeer hospital" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Hospital Main number:</label>
                        <input type="text" class="form-control number" placeholder="61xxxxxxx" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Email</label>
                        <input type="text" class="form-control email" placeholder="hospital@gmail.com" id="recipient-name">

                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Location/Address</label>
                        <input type="text" class="form-control location" placeholder="Digfeer Rd, 24" id="recipient-name">
                        <input type="text" hidden class="form-control id" id="recipient-name">

                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Description (Optional)</label>
                        <textarea type="text" class="form-control description" placeholder="Describe...." id="recipient-name"></textarea>

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
include '../include/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src='../js/jquery-3.3.1.min.js'></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="../iziToast-master/dist/js/iziToast.js"></script>
<script src="../iziToast-master/dist/js/iziToast.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src='../js/utils.js'></script>
<script>
    $(".add").click(() => {
        $(".hospitalModal").modal("show");
        clearInputData(
            $(".name"),
            $(".email"),
            $(".location"),
            $(".number"),
            $(".description"),

        );
        $(".save").text("save");
    })

    $(".save").click(() => {
        if ($(".save").text() == "save") {
            var data = {
                name: $(".name").val(),
                email: $(".email").val(),
                location: $(".location").val(),
                number: $(".number").val(),
                description: $(".description").val(),
                action: "createHospital"
            }

            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/hospital.api.php",
                data: data,
                success: (res) => {
                    console.log(res)
                    $(".hospitalModal").modal("hide");
                    readHospitals();
                    displayToast("Hospital " + $(".name").val() + " Was Created Successfully..", "success", 2000)
                },
                error: (res) => {
                    console.log(res)
                    displayToast("Internal Server Error Occurred 😢😢.", "error", 2000)
                }
            })
        } else {


            var data = {
                name: $(".name").val(),
                email: $(".email").val(),
                location: $(".location").val(),
                number: $(".number").val(),
                description: $(".description").val(),
                id: $(".id").val(),
                action: "updateHospital",

            }

            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/hospital.api.php",
                data: data,
                success: (res) => {
                    console.log(res)
                    $(".adminModal").modal("hide");
                    readHospitals();
                    $(".hospitalModal").modal("hide");
                    displayToast("Hospital Data Was Updated Successfully..", "success", 2000)
                },
                error: (res) => {
                    console.log(res)
                    displayToast("Internal Server Error Occurred 😢😢.", "error", 2000)
                }
            })

        }

    })

    $(document).on("click", "a.deleteHospital", function() {
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
                            "action": "deleteHospital"
                        },
                        url: "../Api/hospital.api.php",
                        success: (res) => {
                            swal("Data Has Been removed!", {
                                icon: "success",
                            });
                            readHospitals()
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
    $(document).on("click", "a.editHospital", function() {
        var id = $(this).attr('editID')
        fetchHospitalData(id)
    })

    const fetchHospitalData = (id) => {
        $.ajax({
            method: "POST",
            dataType: "JSON",
            data: {
                "action": "fetchingOne",
                id: id
            },
            url: "../Api/hospital.api.php",
            success: (res) => {
                console.log(res)
                $('.name').val(res.data[0].name)
                $('.number').val(res.data[0].main_number)
                $('.email').val(res.data[0].email)

                $('.location').val(res.data[0].location)
                $('.description').val(res.data[0].description)
                $('.id').val(res.data[0].hospital_id)
                $('.save').text("Edit")
                $(".hospitalModal").modal("show")
            },
            error: (res) => {
                console.log(res)
            },
        })
    }
    const readHospitals = () => {
        $.ajax({
            method: "POST",
            dataType: "JSON",
            data: {
                "action": "readHospital"
            },
            url: "../Api/hospital.api.php",
            success: (res) => {
                var tr = "<tr>"
                var {
                    data
                } = res;
                data.forEach(value => {
                    tr += `<td>${value.hospital_id}</td>`
                    tr += `<td>${value.name}</td>`
                    tr += `<td>${value.main_number}</td>`
                    tr += `<td>${value.email}</td>`
                    tr += `<td>${value.location}</td>`
                    // tr += `<td>${value.description}</td>`
                    tr += `<td><a class='btn btn-success editHospital' editID=${value.hospital_id}>Edit</a>
                     <a class='btn btn-danger deleteHospital' delID=${value.hospital_id}>Delete</a></td>`
                    tr += '</tr>'
                })
                $(".table tbody").html(tr)
                $(".table").DataTable();
                console.log(data)
            },
            error: (res) => {
                console.log(res)
            },
        })
    }
    readHospitals();


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
</script>