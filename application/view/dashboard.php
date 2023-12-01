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
                            <div class="stat-text text-light">Total Doctors </div>
                            <div class="stat-digit text-light doctors">

                                8500
                            </div>
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card text-light" style="background: #2E4374;">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text text-light">Total Users</div>
                            <div class="stat-digit text-light admins"> 7800</div>
                            <i class="fa-solid fa-user-pen"></i>
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
                            <div class="stat-text text-light">Patients</div>
                            <div class="stat-digit text-light patients"> 500</div>
                            <i class="fa-solid fa-suitcase-medical"></i>
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
                            <div class="stat-text text-light">Registered Hospitals</div>
                            <div class="stat-digit text-light hospitals"> 900</div>
                            <i class="fa-solid fa-hospital"></i></i>
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
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Active Appointments</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Unverified Doctors</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered Unverified">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>

                                </tr>
                            </thead>
                            <tbody>



                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Today Schedules</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
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

        const countRowNumbers = (tableName, label) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/counters.api.php",
                data: {
                    action: "count",
                    table: tableName,
                },
                success: (res) => {
                    console.log(res)
                    label.html(res.rowNumber);
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        const getUnverifiedDoctors = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/counters.api.php",
                data: {
                    action: "unverifiedDoctors",

                },
                success: (res) => {
                    console.log(res)
                    var tr = "<tr>"
                    res.data.forEach(value => {
                        tr += `<td>${value.dr_id}</td>`
                        tr += `<td>${value.name}</td>`
                        if (value.profile_image != "no_profile")
                            tr += `<td><img src='../uploads/${value.profile_image}' style='width: 40px; height: 40px; border-radius: 50%'/></td>`
                        else
                            tr += `<td><img src='../uploads/default.png' style='width: 50px; height: 50px; border-radius: 50%'/></td>`

                        // tr += `<td>${value.profile_image}</td>`
                        tr += '</tr>'
                    })
                    $(".Unverified tbody").html(tr)
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }


        // callers
        countRowNumbers("admins", $(".admins"))
        countRowNumbers("doctors", $(".doctors"))
        countRowNumbers("patients", $(".patients"))
        countRowNumbers("hospitals", $(".hospitals"))
        getUnverifiedDoctors()


    })
</script>