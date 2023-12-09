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
        <div class="error-handler p-2 my-2">

        </div>
        <div class="card">
            <div class="card-header">Filters</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label for="">Filter By Date</label>
                        <select name="" id="" class="form-select date">
                            <option value="">Select</option>
                            <option value="2023-12-08">2023-12-08</option>
                            <option value="2023-12-09">2023-12-09</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="">Filter By Status</label>
                        <select name="" id="" class="form-select status">
                            <option value="">Select</option>
                            <option value="Pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="inprogress">inprogress</option>
                        </select>
                    </div>
                    <div class="col-6 mt-2">
                        <button class="btn btn-dark w-100 submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Lists</h5>
                        <button id="addNew" data-toggle="modal" data-target="#exampleModal" class="btn btn-dark float-right print">
                            <i class="fa-solid fa-print"></i>

                            Print</button>
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="report-area">
                            <img src="http://localhost/Doctor-Appontment/application/images/doctor-logo.png" alt="" class="img-fluid w-100 mb-3">
                            <div class="table-responsive list_appointments">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>

                                            <th>Diagnose</th>
                                            <th>Patient</th>

                                            <th>Status</th>
                                            <!-- <th>Actions</th> -->
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
                    <strong>Printing is restricted to completed or in-progress appointments only. Data that is pending confirmation cannot be printed at this stage.</strong>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary ok">Ok</button>
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
        $('.ok').click(() => $('.err-modal').modal('hide'))
        $('.submit').click(() => {
            if ($('.date').val() != "" && $('.status').val() != "") {
                console.log("r1")
                submitReportFilter("both", [$(".status").val(), $('.date').val()])
            } else if ($('.date').val() == "" && $('.status').val() != "") {
                console.log("r2")
                submitReportFilter("status", [$(".status").val(), $('.date').val()])
            } else if ($('.date').val() != "" && $('.status').val() == "") {
                console.log("r3")
                submitReportFilter("date", [$(".status").val(), $('.date').val()])
            } else {
                $('.error-handler').html(` <div class="alert alert-danger">
                <strong>Please provide the filter criteria you would like to use in order to fetch the corresponding report data.</strong>
            </div>`)
                setTimeout(() => {
                    $('.error-handler').html('')
                }, 5000);
            }


        })


        function submitReportFilter(filterType, ...filters) {
            console.log(filters)
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/report.api.php",
                data: {
                    dr: 4,
                    type: filterType,
                    status: filters[0][0],
                    date: filters[0][1],
                    action: "filterReportData"
                },
                success: (res) => {
                    console.log(res)
                    var {
                        data
                    } = res;
                    displayData(data)
                },
                error: (res) => {
                    console.log(res)
                },

            })


        }
        $('.print').click(() => {
            // $('.report-area').printThis();
            var table = document.querySelectorAll('.table')

            if (Array.from(table).length == 0) {
                alert("There is no data available to be printed at the moment")
                return;
            }

            // var colIndex = 4;
            var collection = table[0].children[1].children;
            var rows = Array.from(collection);
            var isValidated = true;

            rows.forEach(tr => {
                var status = tr.innerText.split("\t")[4]
                if (status.toLowerCase() == "pending") {
                    isValidated = false;
                    $('.err-modal').modal("show")
                    return;
                }

            })

            if (isValidated)
                $('.report-area').printThis();
        })

        const readData = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/report.api.php",
                data: {
                    dr_id: 4,
                    action: "readReportData"
                },
                success: (res) => {
                    var tr = "<tr>"
                    var {
                        data
                    } = res;
                    displayData(data)
                    console.log("data is ", data)
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        readData()

        function displayData(data) {
            if (data.length == 0) {
                $('.list_appointments').html(`
                       <div class="alert alert-danger" role="alert">
   There are no reports (appointments) available based on the specified filter criteria, or there is no data available for generating reports at the moment..<a href="./apointments.php" class="alert-link">view appointments</a>
</div>
                        
                        `)
                return;
            }
            var tr = "<tr>"
            var drName = '';
            var profile = 'http://localhost/Doctor-Appontment/application/images/'
            $('.table tbody').html('')
            data.forEach(value => {
                tr += `<td>${value.appo_id}</td>`
                tr += `<td>${value.Date}</td>`
                drName = value.name;
                profile += value.profile_image;
                tr += `<td>${value.diagnose}</td>`
                tr += `<td>${value.patient}</td>`
                if (value.status.toLowerCase() == "pending")
                    tr += `<td>
                        
                            <a class='text text-danger  confirm' statusID='${value.appo_id}'>${value.status}</a>
                            </td>`
                else if (value.status.toLowerCase() == "completed")
                    tr += `<td >
                         <a class='text text-success  confirm' statusID='${value.appo_id}'>${value.status}</a>
                            </td>`
                else if (value.status.toLowerCase() == "inprogress")
                    tr += `<td>
                         <a class='text text-warning confirm' statusID='${value.appo_id}'>${value.status}</a></td>`
                else
                    tr += `<td>
                        
                            <a class='text text-danger  confirm' statusID='${value.appo_id}'>${value.status}</a>
                            </td>`



                tr += '</tr>'
            })
            var htmlTable = `
             <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>

                                            <th>Diagnose</th>
                                            <th>Patient</th>

                                            <th>Status</th>
                                            <!-- <th>Actions</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    ${tr}</tbody>

                                </table>
            
            `;
            var doctor = `
            <div class='mt-5'>
            <strong>___________________________________</strong><br>
            <span>Doctor's Signature</span>
            
            </div>
            Dr.<strong>${drName}</strong><br>
            
            </div>
            
            `

            $(".list_appointments").html(htmlTable);
            $(".list_appointments").append(doctor);

        }

    })
</script>