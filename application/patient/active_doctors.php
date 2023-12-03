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
        <h6>Make Appointment On Specific Doctor </h6>
        <p class='text-muted'>Click On Pick Button To make Specific Appointment</p>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-block table-border-style p-3">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Filter Doctor Profession</label>
                                <select id="single-select" class="form-control">
                                    <option value="all">All</option>
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                            <div class="col-12 my-2">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>From: Digfeer Hospital</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <img src="../uploads/1838081373.jpg" class='img-fluid' style="border-radius: 20px" alt="">
                                                        <div class="my-2 ml-2">
                                                            <label for="" class='text-muted'>
                                                                <i class="fa-solid fa-circle-check"></i>
                                                                Verified</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-6">
                                                        <strong>Dr. Name</strong>
                                                        <label for="">Dr. Abdullahi Saciid</label>
                                                        <strong>Profession</strong><br>
                                                        <label for="">Sergeon</label><br>
                                                        <strong>Card Price $</strong><br>
                                                        <label for="">$20.0 (once)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button class='btn btn-success create w-100'>
                                                    <i class="fa-regular fa-thumbs-up mr-2"></i>
                                                    Pickup</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>From: Digfeer Hospital</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <img src="../uploads/1838081373.jpg" class='img-fluid' style="border-radius: 20px" alt="">
                                                        <div class="my-2 ml-2">
                                                            <label for="" class='text-muted'>
                                                                <i class="fa-solid fa-circle-check"></i>
                                                                Verified</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-6">
                                                        <strong>Dr. Name</strong>
                                                        <label for="">Dr. Abdullahi Saciid</label>
                                                        <strong>Profession</strong><br>
                                                        <label for="">Sergeon</label><br>
                                                        <strong>Card Price $</strong><br>
                                                        <label for="">$20.0 (once)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button class='btn btn-success  w-100 pick'>
                                                    <i class="fa-regular fa-thumbs-up mr-2"></i>
                                                    Pickup</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>From: Digfeer Hospital</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <img src="../uploads/1838081373.jpg" class='img-fluid' style="border-radius: 20px" alt="">
                                                        <div class="my-2 ml-2">
                                                            <label for="" class='text-muted'>
                                                                <i class="fa-solid fa-circle-check"></i>
                                                                Verified</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-6">
                                                        <strong>Dr. Name</strong>
                                                        <label for="">Dr. Abdullahi Saciid</label>
                                                        <strong>Profession</strong><br>
                                                        <label for="">Sergeon</label><br>
                                                        <strong>Card Price $</strong><br>
                                                        <label for="">$20.0 (once)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button class='btn btn-success create w-100'>
                                                    <i class="fa-regular fa-thumbs-up mr-2"></i>
                                                    Pickup</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-12 mt-4">
                                <button class='btn btn-success create'>Create</button>
                                <button class='btn btn-primary'>Back</button>
                            </div> -->
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
        $(".pick").click(() => window.location.href = "./booking.php");
        $(".create").click(() => console.log(formatTime($(".from_time").val())));


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