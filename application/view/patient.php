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
                    <span class="ml-1">Manage Patients</span>
                </div>
            </div>
            <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Patient</a></li>
                </ol>
            </div> -->
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>List Of Patients</h5>
                        <button id="addNew" data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-primary float-right add">Add Patient</button>
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>Gender</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
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
<div class="modal fade patientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Add Patient Information</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">FullName</label>
                        <input type="text" class="form-control name" placeholder="patient name" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Gender</label>
                        <select class="form-control gender">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <!-- <input type="text" class="form-control gender" placeholder="One-line Description (option)" id="recipient-name"> -->
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Mobile</label>
                        <input type="text" class="form-control mobile" placeholder="61xxxxxxxxx" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Address</label>
                        <input type="text" class="form-control address" placeholder="Yaqshid" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Email</label>
                        <input type="text" class="form-control email" placeholder="name@gmail.com" id="recipient-name">
                    </div>
                    <div class="mb-3 passContainer">
                        <label for="message-text" class="col-form-label">Password</label>
                        <input type="text" class="form-control password" placeholder="your password"
                            id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Profile (Optional)</label>
                        <input type="file" class="form-control profile_image"
                            placeholder="One-line Description (option)" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->

                        <input type="text" hidden class="form-control id" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <img src='../uploads/default.png' class="profile_photo"
                            style="border: 1px solid green;border-radius: 10%; width: 120px; height: 120px" />
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

<!-- view modal -->
<div class="modal fade viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">View Patient</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <img src="../uploads/default.png" class="view_profile_image"
                            style="border-radius: 10%; width: 120px; height: 120px" />
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-12"><strong for="">Patient Name</strong></div>
                            <div class="col-12"><label for="" class='pat_name'>Abdullahi</label></div>
                            <div class="col-12"><strong for="">Email</strong></div>
                            <div class="col-12"><label for="" class='pat_email'>Moham@email.com</label></div>
                            <div class="col-12"><strong for="">Mobile</strong></div>
                            <div class="col-12"><label for="" class='pat_number'>6100000</label></div>

                        </div>
                    </div>
                    <hr />
                    <p>✔ This is only view. Missing Data will appear here</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger closeBtn" data-dismiss="modal">close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<!-- end view modal -->





<?php
include '../include/footer.php';
?>
<script src='../js/jquery-3.3.1.min.js'></script>
<script src="../js/validations.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
<script src='../js/jquery-3.3.1.min.js'></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="../iziToast-master/dist/js/iziToast.js"></script>
<script src="../iziToast-master/dist/js/iziToast.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(() => {
        $(".add").click(() => {
            $(".patientModal").modal("show")
            clearInputData(
                $(".name"),
                $(".gender"),
                $(".email"),
                $(".password"),
                $(".address"),
                $(".mobile"),
                $(".profile_image"),
            );
            $('.passContainer').attr("hidden", false)
            $(".profile_photo").attr("src", "../uploads/default.png");
            $(".save").text("save");


        });
        $(".closeBtn").click(() => $(".viewModal").modal("hide"))

        // fetching 
        const fetchPatientData = (id, response) => {

            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "fetchPatientData",
                    id: id
                },
                url: "../Api/patient.api.php",
                success: (res) => {
                    console.log(res)
                    response(res);


                },
                error: (res) => {
                    console.log(res)
                },
            })
        }

        // display patient data
        $(document).on("click", "a.viewPatient", function () {
            var id = $(this).attr("viewID")

            fetchPatientData(id, (res) => {
                $('.pat_name').text(res.data[0].name)
                $('.pat_email').text(res.data[0].email)
                $('.pat_number').text(res.data[0].mobile)
                if (res.data[0].profile_image == "no_profile") {
                    $(".view_profile_image").attr("src", "../uploads/default.png");
                } else
                    $(".view_profile_image").attr("src", "../uploads/" + res.data[0].profile_image);


                $(".viewModal").modal("show")
            })


        });
        // edit 
        $(document).on("click", "a.editPatient", function () {
            var id = $(this).attr("editID")
            clearInputData(
                $(".name"),
                $(".gender"),
                $(".email"),
                $(".password"),
                $(".address"),
                $(".mobile"),
                $(".profile_image"),


            );

            fetchPatientData(id, (res) => {
                $('.name').val(res.data[0].name)
                $('.email').val(res.data[0].email)
                $('.mobile').val(res.data[0].mobile)
                $('.address').val(res.data[0].address)
                $('.password').val(res.data[0].password)
                $('.id').val(res.data[0].pat_id)
                $('.gender').val(res.data[0].gender)

                if (res.data[0].profile_image == "no_profile") {
                    $(".profile_photo").attr("src", "../uploads/default.png");
                } else
                    $(".profile_photo").attr("src", "../uploads/" + res.data[0].profile_image);

                $(".save").text("Edit")
                $('.passContainer').attr("hidden", true)
                $(".patientModal").modal("show")
            })


        });



        // creating patient
        function createPatient(data, hasFile = false) {
            if (!hasFile) {
                console.log(data.hasProfile)
                if (validateEmail($(".email").val())) {
                    adminCheck($(".email").val(), "patients", (result) => {
                        if (result) {
                            displayToast("patient all ready exist please create new one 🤷‍♂😢️", "error", 2000);
                        } else {
                            $.ajax({
                                method: "POST",
                                dataType: "JSON",
                                url: "../Api/patient.api.php",
                                data: data,
                                success: (res) => {
                                    console.log(res)
                                    $(".patientModal").modal("hide")
                                    readPatient();
                                    $(".table").DataTable();
                                    displayToast("The Data has been added..👋", "success", 2000)

                                },
                                error: (res) => {
                                    console.log(res)
                                    displayToast("Internal Server error occurred 😢", "error", 2000)
                                }
                            })
                        }
                    });

                } else {
                    {
                        displayToast("please check the format of your email 🤷‍♂😢️", "error", 2000);
                    }
                }

            } else {
                if (validateEmail($(".email").val())) {
                    adminCheck($(".email").val(), "patients", (result) => {
                        if (result) {
                            displayToast("patient all ready exist please create new one 🤷‍♂😢️", "error", 2000);
                        } else {
                            $.ajax({
                                method: "POST",
                                dataType: "JSON",
                                processData: false,
                                cache: false,
                                contentType: false,
                                url: "../Api/patient.api.php",
                                data: data,
                                success: (res) => {
                                    console.log(res)
                                    $(".patientModal").modal("hide")
                                    readPatient();
                                    $(".table").DataTable();
                                    displayToast("The Data has been added..👋", "success", 2000)

                                },
                                error: (res) => {
                                    console.log(res)
                                    displayToast("Internal Server error occurred 😢", "error", 2000)
                                }
                            })
                        }
                    })
                } else {
                    {
                        displayToast("please check the format of your email 🤷‍♂😢️", "error", 2000);
                    }
                }


            }

        }
        // update patient
        function updatePatient(data, hasFile = false) {
            if (!hasFile) {
                console.log(data.hasProfile)
                if (validateEmail($(".email").val())) {
                    $.ajax({
                        method: "POST",
                        dataType: "JSON",
                        url: "../Api/patient.api.php",
                        data: data,
                        success: (res) => {
                            console.log(res)
                            $(".patientModal").modal("hide")
                            readPatient();
                            $(".table").DataTable();
                            displayToast("The Data has been added..👋", "success", 2000)

                        },
                        error: (res) => {
                            console.log(res)
                            displayToast("Internal Server error occurred 😢", "error", 2000)
                        }
                    })


                } else {
                    {
                        displayToast("please check the format of your email 🤷‍♂😢️", "error", 2000);
                    }
                }

            } else {
                if (validateEmail($(".email").val())) {
                     $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    processData: false,
                    cache: false,
                    contentType: false,
                    url: "../Api/patient.api.php",
                    data: data,
                    success: (res) => {
                        console.log(res)
                        $(".patientModal").modal("hide")
                        readPatient();
                        $(".table").DataTable();
                        displayToast("The Data has been added..👋", "success", 2000)

                    },
                    error: (res) => {
                        console.log(res)
                        displayToast("Internal Server error occurred 😢", "error", 2000)
                    }
                })
                }
                else {
                    {
                        displayToast("please check the format of your email 🤷‍♂😢️", "error", 2000);
                    }
                }

               
            }

        }
        // create patient
        $(".save").click(() => {
            if ($(".save").text() == "save") {
                if ($(".profile_image")[0].files.length > 0) {
                    var data = new FormData();
                    data.append("name", $(".name").val())
                    data.append("gender", $(".gender").val())
                    data.append("mobile", $(".mobile").val())
                    data.append("address", $(".address").val())
                    data.append("email", $(".email").val())

                    data.append("password", $(".password").val())
                    data.append("hasProfile", true)
                    data.append("profile_image", $(".profile_image")[0].files[0])
                    data.append("action", "createPatient")
                    createPatient(data, true)
                } else {
                    var data = {
                        name: $(".name").val(),
                        gender: $(".gender").val(),
                        mobile: $(".mobile").val(),
                        address: $(".address").val(),
                        email: $(".email").val(),

                        password: $(".password").val(),
                        hasProfile: false,
                        action: "createPatient"
                    }
                    createPatient(data)
                }


            } else {
                if ($(".profile_image")[0].files.length > 0) {
                    var data = new FormData();
                    data.append("name", $(".name").val())
                    data.append("gender", $(".gender").val())
                    data.append("mobile", $(".mobile").val())
                    data.append("address", $(".address").val())
                    data.append("email", $(".email").val())
                    // data.append("password", $(".password").val())
                    data.append("id", $(".id").val())
                    data.append("hasProfile", true)
                    data.append("profile_image", $(".profile_image")[0].files[0])
                    data.append("action", "updatePatient")
                    updatePatient(data, true)
                } else {
                    var data = {
                        name: $(".name").val(),
                        gender: $(".gender").val(),
                        mobile: $(".mobile").val(),
                        address: $(".address").val(),
                        email: $(".email").val(),
                        // password: $(".password").val(),
                        id: $(".id").val(),
                        hasProfile: false,
                        action: "updatePatient"
                    }
                    updatePatient(data)
                }

            }
        })
        // end patient


        // function that reads patients
        const readPatient = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "readPatient"
                },
                url: "../Api/patient.api.php",
                success: (res) => {
                    // console.log(res);
                    var {
                        data
                    } = res;
                    var tr = "<tr>";
                    data.forEach(values => {
                        tr += `<td>${values.pat_id}</td>`;
                        tr += `<td>${values.name}</td>`;
                        tr += `<td>${values.gender}</td>`;
                        tr += `<td>${values.mobile}</td>`;
                        tr += `<td>${values.address}</td>`;

                        tr += `<td><a class="btn btn-success editPatient" editID=${values.pat_id}><i class="fa-solid fa-pen-to-square"></i></a>
         <a class="btn btn-danger deletePatient" delId=${values.pat_id}><i class="fa-solid fa-xmark"></i></a>
         <a class="btn btn-primary viewPatient" viewID=${values.pat_id}><i class="fa-solid fa-eye"></i></a>
         
         </td>`;
                        tr += "</tr>";
                    })
                    $(".table tbody").html(tr);
                    $(".table").DataTable();

                },
                error: (res) => {
                    console.log(res);
                }
            })
        }
        readPatient();

        // delete patient

        $(document).on("click", "a.deletePatient", function () {
            $id = $(this).attr('delId')
            // start confirmation
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
                                id: $id,
                                "action": "deletePatient"
                            },
                            url: "../Api/patient.api.php",
                            success: (res) => {
                                console.log(res);

                                readPatient();
                                swal("Data Has Been removed!", {
                                    icon: "success",
                                });
                                $(".table").DataTable().row($(this).parents('tr')).remove().draw();
                            },
                            error: (error) => {
                                console.log(error);
                            }
                        })

                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });

            // end deletion confirm

        })



        // clear inputs
        function clearInputData(...inputs) {
            inputs.forEach(input => {
                input.val("");
            })
        }

        // toast
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
                        ['<button style="background: #DC3535; color: white;"><b>YES</b></button>', function (instance, toast) {
                            alert("Ok Deleted...");
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                        }, true],
                        ['<button style="background: #ECECEC; color: #2b2b2b;">NO</button>', function (instance, toast) {
                            alert("Retuned");
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                        }],
                    ],
                    onClosing: function (instance, toast, closedBy) {
                        //  console.info('Closing | closedBy: ' + closedBy);
                    },
                    onClosed: function (instance, toast, closedBy) {
                        // console.info('Closed | closedBy: ' + closedBy);
                    }
                });
            }
        }
    })
</script>