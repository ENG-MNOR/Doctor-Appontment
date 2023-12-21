<?php
include '../include/links.php';
include '../include/header.php';
include '../include/sidebar.php';
?>

h



<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Here is a List of Appointments</span>
                </div>
            </div>
            <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Apointment</a></li>
                        </ol>
                    </div> -->
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Appointments</h5>
                        <button id="addNew" data-toggle="modal" data-target="#exampleModal" class="btn btn-dark float-right report">
                            <i class="fa-regular fa-flag"></i>

                            Report</button>
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="table-responsive list_appointments">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>

                                        <th>Diagnose</th>
                                        <th>Patient</th>

                                        <th>Status</th>
                                        <th>Actions</th>
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



<div class="modal fade editAppointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="fa-solid fa-circle-info mr-2"></i><strong>
                        Before making any edits to an appointment, please specify the desired profession or specialty of the doctor you are looking for.
                    </strong>
                </div>
                <hr>
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Select Profession</label>
                        <select class='profession form-control proffision_selection filterPro'>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Select Doctor</label>
                        <select class='doctor form-control doctors'>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Appointment date (Doctor's schedule)</label>
                        <select class='form-control date'>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="message-text" class="col-form-label">Time</label>
                        <input type="time" class="form-control time" id="recipient-name">
                        <input type="text" hidden class="form-control id" id="recipient-name">
                    </div> -->
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Diagnose</label>
                        <select class='doctor form-control diagnose'>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Descriptions</label>
                        <textarea class='form-control description' placeholder="Please describe your symptoms"></textarea>
                    </div>
                    <input type='text' hidden class='id mr-2' id="show" />

                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-primary edit">Edit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg viewModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View And Print</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body body-content">

            </div>
            <div class="modal-footer">
                <button type='button' class="btn btn-success print">Print</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade err-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">
                    <i class="fa-solid fa-triangle-exclamation mr-2 text-danger"></i>
                    Printing Error
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-2">
                <div class="alert alert-danger">
                    <strong>You can only print the appointment details after the doctor has confirmed it. Printing is not available for appointments that are still pending confirmation</strong>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary ok">Ok</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-muted" id="exampleModalLongTitle">
                    Confirmation Status
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-2">
                <div class="my-2">
                    <strong class='text-muted'>The confirmation should be based on the status of the appointment, which can be either "In progress" or "Completed."</strong>
                </div>

            </div>
            <input type="text" hidden class='id-value'>
            <div class="modal-footer">
                <button type="button" class="btn btn-success completed">Completed</button>
                <button type="button" class="btn btn-warning inprogress">In Progress</button>
                <button type="button" class="btn btn-secondary default">Default</button>
            </div>
        </div>
    </div>
</div>

<?php
include '../include/footer.php';


?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src='../js/jquery-3.3.1.min.js'></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="../iziToast-master/dist/js/iziToast.js"></script>
<script src="../iziToast-master/dist/js/iziToast.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src='../printThis.js'></script>

<script>
    $(document).ready(function() {
        $(document).on("click", "a.confirm", function() {
            var id = $(this).attr("statusID");
            $('.id-value').val(id)
            $(".statusModal").modal("show")

        })
        $('.completed').click(() => updateAppointmentStatus("completed"))
        $('.inprogress').click(() => updateAppointmentStatus("inprogress"))
        $('.default').click(() => updateAppointmentStatus("Pending"))



        function updateAppointmentStatus(status) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "updateAppointmentStatus",
                    status: status,
                    id: $('.id-value').val()
                },
                url: "../Api/appointments.api.php",
                success: (res) => {

                    console.log(res)
                    loadAppointments()
                    $('.statusModal').modal("hide")
                    // alert(res.message)
                },
                error: (res) => {
                    console.log(res)
                }
            })
        }

        $('.edit').click(() => {
            if ($('.doctors').val() == "" || $('.date').val() == "" || $('.diagnose').val() == "" ||
                $('.description').val() == "")
                alert("In order to update an appointment, please ensure that all the required fields are filled and not left empty.")
            else {

                var data = {
                    date: $(".date").val(),
                    diagnose: $(".diagnose").val(),
                    dr: $(".doctors").val(),
                    id: $(".id").val(),
                    description: $('.description').val(),
                    action: "updateAppointment",
                }
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    data: data,
                    url: "../Api/appointments.api.php",
                    success: (res) => {

                        console.log(res)
                        loadAppointments()
                        alert(res.message)
                    },
                    error: (res) => {
                        console.log(res)
                    }
                })
            }
        })
        $('.doctors').change((e) => {
            if ($('.doctors').val() == "") {
                $(".date").attr("disabled", true)
                option2 = "<option value=''>Waiting...</option>"

                $('.date').css({
                    border: "1px solid grey"
                })
                $('.date').html(option2)
            } else {
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        action: "readScheduleSelectedDoctor",
                        dr_id: $('.doctors').val()
                    },
                    url: "../Api/doctor.api.php",
                    success: (res) => {
                        if (res.data.length > 0) {
                            $(".date").attr("disabled", true)
                            option = `<option value='${res.data[0].date}'>${res.data[0].date}</option>`
                            $('.date').html(option)
                            $('.date').css({
                                border: "1px solid grey"
                            })
                        } else {

                            option2 = "<option value=''>Related Data Error (No Appointment Date)</option>"
                            $('.date').css({
                                border: "1px solid red"
                            })
                            $(".date").attr("disabled", true)
                            // $('.doctors').html(option)
                            $('.date').html(option2)
                        }
                        console.log(res)
                    },
                    error: (res) => {

                    }
                })
            }
        })
        $(".filterPro").change((e) => {
            if ($('.filterPro').val() == "") {
                loadDoctors()

                $(".date").attr("disabled", true)
                option2 = "<option value=''>Waiting...</option>"

                $('.date').css({
                    border: "1px solid grey"
                })
                $('.date').html(option2)

                $(".doctors").attr("disabled", false)


                $('.doctors').css({
                    border: "1px solid grey"
                })

            } else {
                $(".doctors").val("")
                $(".date").val("")
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        action: "filterProfession",
                        pro: $('.filterPro').val()
                    },
                    url: "../Api/proffision.api.php",
                    success: (res) => {
                        if (res.data.length > 0) {
                            $(".doctors").attr("disabled", false)
                            $(".date").attr("disabled", true)
                            option = "<option value=''>Select Doctor</option>"
                            option2 = "<option value=''>Waiting...</option>"
                            res.data.forEach(value => {
                                option += `<option value='${value.drID}'>${value.drName}</option>`
                            })
                            $('.doctors').css({
                                border: "1px solid grey"
                            })
                            $('.date').css({
                                border: "1px solid grey"
                            })
                            $('.doctors').html(option)
                            $('.date').html(option2)
                        } else {
                            option = "<option value=''>No Doctors Found</option>"
                            option2 = "<option value=''>Related Data Error</option>"
                            $(".doctors").attr("disabled", true)
                            $(".date").attr("disabled", true)
                            $('.doctors').html(option)
                            $('.date').css({
                                border: "1px solid red"
                            })
                            $('.doctors').css({
                                border: "1px solid red"
                            })
                            $('.date').html(option2)
                        }
                        console.log(res)
                    },
                    error: (res) => {

                    }
                })
            }

        })

        function readDiagnoses() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {

                    action: "readDiagnose",
                },
                url: "../Api/diagnose.api.php",
                success: (res) => {
                    console.log(res);

                    var {
                        data
                    } = res;
                    var tr = "<tr>";
                    var option = "<option value=''>Select Diagnose</option>";
                    if (data.length > 0) {

                        data.forEach(value => {

                            option += `<option value="${value.diganose_id}">${value.name}</option>`;


                        })
                        //  option += `<option value="all">All</option>`;

                        $('.diagnose').html(option)

                    } else {
                        var option = "<option value=''>Select Diagnose</option>";
                        $('.diagnose').html(option)

                    }




                },
                error: (err) => {
                    console.log(err);
                }
            })
        }
        readDiagnoses()

        function loadDoctors() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/schedule.api.php",
                data: {
                    action: "loadDoctors",
                },
                success: (res) => {
                    console.log(res)

                    var htmlOptions = "<option value=''>Select Doctor</option>"
                    res.data.forEach(value => {
                        htmlOptions += `<option value='${value.dr_id}'>${value.name}</option>`
                    })
                    $(".doctors").html(htmlOptions)
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        loadDoctors()

        function readEditAppointmentData(id, response) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/appointments.api.php",
                data: {
                    action: "readEditAppointmentData",
                    id: id,
                },
                success: (res) => {
                    $('.date').css({
                        border: "1px solid grey"
                    })

                    $('.date').attr("disabled", false)
                    // readSchedules()
                    console.log(res)

                    response(res)
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }

        function getDoctorProffision() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "readProffision",
                },
                url: "../Api/proffision.api.php",
                success: (res) => {
                    console.log(res);
                    var {
                        data
                    } = res;
                    option = ` <option value="" selected>Select</option>`
                    data.forEach(values => {
                        option += `<option value="${values.name}">${values.name}</option>`
                    });
                    $(".proffision_selection").html(option);
                },
                error: (err) => {
                    console.log(err);
                }
            })
        };
        getDoctorProffision()


        $(".report").click(() => window.location.href = "./report.php");
        $(".ok").click(() => $('.err-modal').modal("hide"));
        $(".print").click(() => {
            if ($(".state").text().toLocaleLowerCase() == "pending") {
                $('.viewModal').modal("hide")
                $('.err-modal').modal("show")
                return;
            }
            $(".body-content").printThis({
                importCSS: true
            })
        });

        $(document).on("click", "a.viewAppo", function() {
            var id = $(this).attr("viewID");
            readPrintableData(id, (res) => {
                $('.body-content').html(`
                
                 <img src="http://localhost/Doctor-Appontment/application/images/doctor-logo.png" alt="" class="image-fluid w-100">
                <br>
                <br>
                <br>
                <h6>Patient Details</h6>
                <table style="border-collapse: collapse; width: 100%;" class='mb-4'>
                    <thead>
                        <tr>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Name</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Gender</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Mobile</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].patName}</td>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].gender}</td>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].mobile}</td>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].address}</td>
                        </tr>
                       
                    </tbody>
                </table>

                <h6>Appointment Details</h6>
                <table style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">#ID</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Date</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Diagnose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].appo_id}</td>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].appo_date}</td>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].diagnose_name}</td>
                        </tr>
                       
                    </tbody>
                </table>
                <div class="my-1">
                    <strong>Card Price : </strong><span>$10</span>
                </div>
                <div class="my-1">
                    <strong>Confirmation Status: </strong><span class='state'>${res.data[0].status}</span>
                </div>
                <div class="my-1">
                    <strong class='text-muted'>Pointed Doctor: </strong>
                    <p>Dr. ${res.data[0].drName}, ${res.data[0].hosName}</p>


                </div>
                <hr>
                <div class="my-1">
                    <p>Processed By : <strong>Doctor Care (e-Doctor Appointment) 💖</strong></p>
                </div>
                <div class="my-2">
                    <div class="alert alert-warning">
                        <strong>Note: Please utilize this form/sheet to ensure that the correct patient is present for their scheduled appointment..</strong>
                    </div>
                </div>
                
                `)
                $('.viewModal').modal("show")

            })

        })

        function readPrintableData(id, response) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                    action: "readPrintableData",
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    console.log(res)
                    response(res)
                },
                error: (res) => {
                    console.log(res)
                }
            })
        }

        function readSchedules() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {

                    action: "readSchedules",
                },
                url: "../Api/schedule.api.php",
                success: (res) => {
                    console.log(res)
                    var op = '<option value="">Select</option>'
                    res.data.forEach(value => {
                        op += `<option value="${value.date}">${value.date}</option>`

                    })
                    $(".date").html(op)
                },
                error: (res) => {
                    console.log(res)
                }
            })
        }
        // readSchedules()
        $(document).on("click", "a.deleteAppointment", function() {
            var id = $(this).attr("delID");
            swal({
                    title: "Remove This Appointment",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                id: id,
                                action: "deleteAppointment",
                            },
                            url: "../Api/appointments.api.php",
                            success: (res) => {
                                console.log(res)
                                swal("Data has been removed", {
                                    icon: "success",
                                });
                                loadAppointments();
                            },
                            error: (res) => {
                                console.log(res)
                            }
                        })

                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });


        })
        $(document).on("click", "a.editAppointment", function() {
            var id = $(this).attr("editID");


            readEditAppointmentData(id, res => {
                // readSchedules()
                var op = `<option value='${res.data[0].appo_date}'>${res.data[0].appo_date}</option>`
                console.log(res)
                $(".doctors").val(res.data[0].dr_id)
                $(".id").val(res.data[0].appo_id)
                $(".date").html(op)
                $('.date').attr("disabled", true)
                $(".diagnose").val(res.data[0].diagnose_id)
                $(".description").val(res.data[0].symptom_description)
                // alert(res.data[0].appo_date)
                $(".editAppointmentModal").modal("show")

            })


        })

        const loadAppointments = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "loadAppointmentsForDoctor"
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    var tr = "<tr>"
                    var {
                        data
                    } = res;
                    if (data.length == 0) {
                        $('.list_appointments').html(`
                       <div class="alert alert-info" role="alert">
   Currently, there are no available appointments for you.<a href="./active_doctors.php" class="alert-link">Please schedule an appointment now</a> or click <strong>Make booking</strong> Button
</div>
                        
                        `)
                        return;
                    }
                    data.forEach(value => {
                        tr += `<td>${value.appo_id}</td>`
                        tr += `<td>${value.appo_date}</td>`
                        // tr += `<td>${value.time}</td>`
                        tr += `<td>${value.diagnose}</td>`
                        tr += `<td>${value.patient}</td>`
                        if (value.status.toLowerCase() == "pending")
                            tr += `<td>
                        
                            <a class='btn btn-danger text-light confirm' statusID='${value.appo_id}'>${value.status}</a>
                            </td>`
                        else if (value.status.toLowerCase() == "completed")
                            tr += `<td >
                         <a class='btn btn-success text-light confirm' statusID='${value.appo_id}'>${value.status}</a>
                            </td>`
                        else if (value.status.toLowerCase() == "inprogress")
                            tr += `<td>
                         <a class='btn btn-warning confirm' statusID='${value.appo_id}'>${value.status}</a></td>`
                        else
                            tr += `<td>
                        
                            <a class='btn btn-danger text-light confirm' statusID='${value.appo_id}'>${value.status}</a>
                            </td>`
                        tr += `<td>
                     <a class='btn btn-danger text-light deleteAppointment' delID=${value.appo_id}><i class="fa-solid fa-rotate-left"></i></a>
                     <a class="btn btn-primary viewAppo text-light" viewID=${value.appo_id}><i class="fa-solid fa-eye"></i></a>
                     </td>`


                        tr += '</tr>'
                    })
                    $(".table tbody").html(tr);
                    $(".table").DataTable();

                    console.log("data is ", data)
                },
                error: (res) => {
                    console.log("There is an error")
                    console.log(res)
                },
            })
        }
        loadAppointments()
    })
</script>