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
                    <span class="ml-1">Datatable</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Hospital</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Basic Table</h5>
                        <button id="addNew" data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-primary float-right ad">Add New Transaction</button>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>number</th>
                                        <th>email</th>
                                        <th>location</th>
                                        <th>description</th>
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

<div class="modal fade hospitalModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="hospitalForm">
                    <div class="mb-3">
                        <!-- <label for="recipient-name" class="col-form-label">Username:</label> -->
                        <input type="text" class="form-control name" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->
                        <input type="text" class="form-control number" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->

                        <input type="text" class="form-control email" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->

                        <input type="text" class="form-control location" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->

                        <input type="text" class="form-control decription" id="recipient-name">
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
<script src='../js/jquery-3.3.1.min.js'></script>
<script>
    $(".add").click(() => $(".hospitalModal").modal("show"))
    $(document).on("click", "a.deleteHospital", function () {
        var id = $(this).attr('delID')
        $.ajax({
            method: "POST",
            data: {
                "id": id,
                "action": "deleteHospital"
            },
            url: "../Api/hospital.api.php",
            success: (res) => {
                console.log(res)
                readHospitals()
            },
            error: (res) => {
                console.log(res)
            }

        })
    })

    $(document).on("click", "a.editHospital", function () {
        var id = $(this).attr('editID')
        fetchHospitalData(id);

    })
    const readHospitals = () => {
        $.ajax({
            method: "POST",
            dataType: "JSON",
            data: { "action": "readHospital" },
            url: "../Api/hospital.api.php",
            success: (res) => {
                var tr = "<tr>"
                var { data } = res;
                data.forEach(value => {
                    tr += `<td>${value.hospital_id}</td>`
                    tr += `<td>${value.name}</td>`
                    tr += `<td>${value.main_number}</td>`
                    tr += `<td>${value.email}</td>`
                    tr += `<td>${value.location}</td>`
                    tr += `<td>${value.description}</td>`
                    tr += `<td><a class='btn btn-success editHospital ' editID=${value.hospital_id}>Edit</a>
                     <a class='btn btn-danger deleteHospital' delID=${value.hospital_id}>Delete</a></td>`
                    tr += '</tr>'
                })
                $(".table tbody").html(tr)
                console.log(data)
            },
            error: (res) => {
                console.log(res)
            },
        })
    }
    readHospitals();


    $(".save").click(() => {
        if ($(".save").text() == "save") {
            
            var data = {
                name: $(".name").val(),
                email: $(".email").val(),
                number: $(".number").val(),
                location: $(".location").val(),
                description: $(".decription").val(),
                action: "createHospital"
            }

            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/hospital.api.php",
                data: data,
                success: (res) => {
                    console.log(res)
                    readHospitals();
                },
                error: (res) => {
                    console.log(res)
                }
            })

        } else {
            var data = {
                name: $(".name").val(),
                email: $(".email").val(),
                number: $(".number").val(),
                location: $(".location").val(),
                description: $(".decription").val(),
                id:$(".id").val(),
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
                },
                error: (res) => {
                    console.log(res)
                }
            })
        }
    })
    const fetchHospitalData = (id) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: { "action": "fetchingOne", id: id },
                url: "../Api/hospital.api.php",
                success: (res) => {
                    console.log(res)
                    $('.name').val(res.data[0].name)
                    $('.email').val(res.data[0].email)
                    $('.description').val(res.data[0].description)
                    $('.id').val(res.data[0].hospital_id)
                    $('.number').val(res.data[0].main_number)
                    $('.location').val(res.data[0].location)
                    $('.save').text("Edit")
                    $(".hospitalModal").modal("show")
                },
                error: (res) => {
                    console.log(res)
                },
            })
        }

</script>