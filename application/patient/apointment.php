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
                        <button id="addNew" data-toggle="modal" data-target="#exampleModal" class="btn btn-dark float-right booking">
                            <i class="fa-regular fa-calendar-check mr-2 text-light"></i>
                            Make Booking</button>
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="table-responsive list_appointments">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Diagnose</th>
                                        <th>Doctor</th>
                                        <!-- <th>Patient</th> -->
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
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Select Profession</label>
                        <select class='profession form-control'>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Select Doctor</label>
                        <select class='doctor form-control'>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Time</label>
                        <input type="time" class="form-control time" id="recipient-name">
                        <input type="text" hidden class="form-control id" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Diagnose</label>
                        <select class='doctor form-control'>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Descriptions</label>
                        <textarea class='form-control description' placeholder="Please describe your symptoms"></textarea>
                    </div>
                    <!-- <div class="mb-3" style="display: flex; align-items: center;">
                        <input type='checkbox' class='showPass mr-2' id="show" />
                        <label for="show" class="col-form-label">
                            Show Password
                        </label>

                    </div> -->
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src='../js/jquery-3.3.1.min.js'></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="../iziToast-master/dist/js/iziToast.js"></script>
<script src="../iziToast-master/dist/js/iziToast.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {

        $(".booking").click(() => window.location.href = "./active_doctors.php");
        $(document).on("click", "a.deleteAppointment", function() {
            var id = $(this).attr("delID");
            swal({
                    title: "Undo Appointment",
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
            $(".editAppointmentModal").modal("show")

        })
        const loadAppointments = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "loadAppointments"
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
                        tr += `<td>${value.time}</td>`
                        tr += `<td>${value.diagnose}</td>`
                        tr += `<td>${value.doctor}</td>`
                        if (value.status.toLowerCase() == "pending")
                            tr += `<td class='text-danger'>${value.status}</td>`
                        else if (value.status.toLowerCase() == "complete")
                            tr += `<td class='text-success'>${value.status}</td>`
                        else if (value.status.toLowerCase() == "onprogress")
                            tr += `<td class='text-info'>${value.status}</td>`
                        else
                            tr += `<td class='text-danger'>${value.status}</td>`
                        tr += `<td><a class='btn btn-success editAppointment' editID=${value.appo_id}>Edit</a>
                     <a class='btn btn-danger text-light deleteAppointment' delID=${value.appo_id}><i class="fa-solid fa-rotate-left"></i></a></td>`
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