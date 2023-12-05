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

                </div>
            </div>

        </div>
        <!-- row -->
        <h6>Make an appointment </h6>
        <p class='text-muted'>NB: This appointment will automatically or the owner disabled when the time is reached.</p>
        <div class="card">
            <div class="card-header">Selected Doctor</div>
            <div class="card-body">
                <div class="row doctor_details">

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Available Schedules For The Selected Doctor</div>
            <div class="card-body">
                <div class="row available_schedules">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th scope="col">Date</th>
                                <th scope="col">From Time</th>
                                <th scope="col">To Time</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-block table-border-style p-3">
                        <div class="row">

                            <div class="col-6">
                                <label for="">Appointment Date (Based On Doctor Schedule)</label>
                                <!-- <input type="date" name="" id="" class='form-control date'> -->
                                <select name="" id="" class="form-control date">
                                    <!-- <option value="">Date</option> -->
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="">Diagnose</label>
                                <select name="" id="" class="form-control diagnose">
                                    <option value="">Select Doctor</option>
                                </select>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="">time</label>
                                <input type="time" name="" id="" class='form-control time'>
                            </div>

                            <div class="col-12 mt-4">
                                <label for="">Symptoms</label>
                                <textarea class='form-control description' placeholder="Please describe your symptoms in advance."></textarea>
                            </div>

                            <div class="col-12 mt-4">
                                <button class='btn btn-success create'>Create</button>
                                <button class='btn btn-primary'>Back</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_GET['dr_id'])) {
?>
    <input type='text' class='dr' hidden value="<?php echo $_GET['dr_id'] ?>" />
<?php
}

?>
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
    $(document).ready(function() {
        function getScheduleRange(getResponse) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "getScheduleRange",
                    dr_id: $(".dr").val(),
                    date: $(".date").val(),
                },
                url: "../Api/schedule.api.php",
                success: (res) => {
                    getResponse(res);
                },
                error: (err) => {
                    console.log(err);
                }
            })

        }

        function getNumberOfAppointments(getRes) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "getNumberOfAppointments",
                    dr_id: $(".dr").val(),
                    date: $(".date").val(),
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    getRes(res);
                },
                error: (err) => {
                    console.log(err);
                }
            })

        }

        function getSpecificPatient(getRes) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "getSpecificPatient",
                    pat_id: 14,
                    date: $(".date").val(),
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    getRes(res);
                },
                error: (err) => {
                    console.log(err);
                }
            })

        }
        $(document).on("click", ".create", function() {
            var data = {
                appointment_date: $('.date').val(),
                diagnose: $('.diagnose').val(),
                time: formatTime($('.time').val()),
                description: $(".description").val(),
                pat_id: 14,
                dr_id: $('.dr').val(),
                action: "makeAppointment"
            }
            getScheduleRange(res => {
                console.log(res)
                getNumberOfAppointments(res2 => {
                    if (res.range == res2.rows) {

                        swal("No Space Available!", "The desired number of appointments has been reached for this particular schedule");
                    } else {
                        getSpecificPatient(result => {
                            if (result.rows > 0)
                                swal("Oops!", "You are not allowed to schedule multiple appointments on the same date", "error");
                            else {
                                $.ajax({
                                    method: "POST",
                                    dataType: "JSON",
                                    data: data,
                                    url: "../Api/appointments.api.php",
                                    success: (res) => {
                                        swal("Booked ✔!", "Your appointment has been scheduled..", "succes");
                                    },
                                    error: (err) => {
                                        console.log(err);
                                    }
                                })
                            }

                        })

                    }
                })
            })


        });

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

        function readScheduleSelectedDoctor() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    dr_id: $(".dr").val(),
                    action: "readScheduleSelectedDoctor",
                },
                url: "../Api/doctor.api.php",
                success: (res) => {
                    console.log(res);

                    var {
                        data
                    } = res;
                    var tr = "<tr>";
                    var option = "<option value=''>Date</option>";
                    if (data.length > 0) {
                        $(".create").attr("disabled", false)
                        $('.date').attr("disabled", false);
                        data.forEach(value => {
                            tr += `<td>${value.date}</td>`
                            tr += `<td>${value.from_time}</td>`
                            tr += `<td>${value.to_time}</td>`
                            tr += `<td>${value.available}</td>`
                            option += `<option value="${value.date}">${value.date}</option>`;
                            tr += "</tr>";

                        })
                        $('.table tbody').html(tr)
                        $('.date').append(option)

                    } else {
                        $(".create").attr("disabled", true);
                        $('.date').attr("disabled", true);
                        $('.date').html("<option>No Schedule Dates Are available</option>");

                        $('.available_schedules').html(`
                        <div class='p-3'>
                        <div class='alert alert-info'>
                        <strong>At the moment, this doctor does not have a schedule in place, which means that you are unable to make any appointments.</strong>
                        
                        </div>
                        </div>
                        
                        `)
                    }




                },
                error: (err) => {
                    console.log(err);
                }
            })
        }
        readScheduleSelectedDoctor()

        function readSelectedDoctor() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    dr_id: $(".dr").val(),
                    action: "readSelectedDoctor",
                },
                url: "../Api/doctor.api.php",
                success: (res) => {
                    console.log(res);
                    var {
                        data
                    } = res;
                    $(".doctor_details").html(`
                    
                        <div class="col-5">
                        <img src="../images/${data[0].profile_image}" alt="" class="img-fluid w-100">
                    </div>
                    <div class="col-7">
                        <strong>Full Name</strong>
                        <p class='ml-2'>${data[0].drName}</p>
                        <strong>Emergency Number</strong>
                        <p class='ml-2'>${data[0].mobile}</p>
                        <strong>Profession</strong>
                        <p class='ml-2'>${data[0].pro_name}</p>
                        <strong>Hospital (work-in)</strong>
                        <p class='ml-2'>${data[0].hosName}</p>
                    </div>
                    <div class="col-12">
                        <strong>Description (Qualifications)</strong>
                        <p>${data[0].drDescription}.</p>
                    </div>
                    
                    `)

                },
                error: (err) => {
                    console.log(err);
                }
            })
        }
        readSelectedDoctor()


        function formatTime(time) {
            var time = time.split(":");
            var hours = parseInt(time[0]);
            var minutes = parseInt(time[1]);

            var modifiedHours = hours - 12;
            if (modifiedHours < 0)
                modifiedHours += 12;
            convertedTime = modifiedHours + ":" + minutes.toString().padStart(2, '0');
            console.log(hours)
            return convertedTime + getTimePeriod(hours);
        }

        function getTimePeriod(time) {
            if (parseInt(time) < 12)
                return "AM";
            return "PM";
        }
    })
</script>