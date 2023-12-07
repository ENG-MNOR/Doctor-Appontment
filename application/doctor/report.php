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
                    <h4>Report Appointments</h4>
                    <span class="ml-1">View and print Data</span>
                </div>
            </div>

        </div>
        <!-- row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Lists</h5>
                        <button id="addNew" data-toggle="modal" data-target="#exampleModal" class="btn btn-dark float-right report">
                            <i class="fa-solid fa-print"></i>

                            Print</button>
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
        
    })
</script>