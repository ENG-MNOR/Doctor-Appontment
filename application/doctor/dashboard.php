<?php
include '../include/links.php';
include '../include/header.php';
include '../include/sidebar.php';
?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card text-light" style="background: #79155B;">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content text-light">
                            <div class="stat-text text-light">Total Appointments </div>
                            <div class="stat-digit text-light appointments">

                                8500
                            </div>
                            <!-- <i class="fa-solid fa-user-doctor"></i> -->
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card text-light" style="background: #2E4374;">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text text-light">Pending Appointments</div>
                            <div class="stat-digit text-light pending"> 7800</div>
                            <!-- <i class="fa-solid fa-user-pen"></i> -->
                        </div>
                        <!-- <div class="progress">
                            <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card text-light" style="background: #5B0888;">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text text-light">Active Appointments</div>
                            <div class="stat-digit text-light active"> 500</div>
                            <!-- <i class="fa-solid fa-suitcase-medical"></i> -->
                        </div>
                        <!-- <div class="progress">
                            <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card text-light" style="background: #004225;">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text text-light">Completed</div>
                            <div class="stat-digit text-light completed"> 900</div>
                            <!-- <i class="fa-solid fa-hospital"></i></i> -->
                        </div>
                        <!-- <div class="progress">
                            <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>

        <div class="row">



            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Active Appointments</h5>
                    </div>
                    <div class="card-body body-dash">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                   

                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->
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
    $(document).ready(() => {

        const countRowNumbers = (tableName, label, options) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/counters.api.php",
                data: {
                    action: "countDashboardNumbers",
                    table: tableName,
                    id: 4,
                    status: options.status,
                    getStatus: options.getStatus
                },
                success: (res) => {
                    console.log(res)
                    label.text(res.rowNumber);
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        const activeAppointments = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/appointments.api.php",
                data: {
                    action: "activeAppointments",

                    id: 4,
                },
                success: (res) => {
                    if (res.data.length > 0) {
                        var tr = '<tr>'
                        res.data.forEach(value => {
                            tr+=`<td>${value.Date}</td>`
                            tr+=`<td>${value.status}</td>`

                            tr += '</tr>';
                        })
                        $('.table tbody').html(tr)
                    } else {
                        $('.body-dash').html(`
                        <div class='alert alert-info'>
                        <strong>Currently, there are no active appointments available at the moment</strong>
                        </div>

                        `)
                    }

                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        activeAppointments()


        // callers
        countRowNumbers("appointment", $(".appointments"), {
            getStatus: "no"
        })
        countRowNumbers("appointment", $(".pending"), {
            status: "Pending",
            getStatus: "yes"
        })
        countRowNumbers("appointment", $(".active"), {
            status: "inprogress",
            getStatus: "yes"
        })
        countRowNumbers("appointment", $(".completed"), {
            status: "completed",
            getStatus: "yes"
        })




    })
</script>