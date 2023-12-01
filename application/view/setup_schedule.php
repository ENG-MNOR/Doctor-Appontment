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
        <h6>Create or Setup New Schedule </h6>
        <p class='text-muted'>This Schedule Will Be Available On Public </p>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-block table-border-style p-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Doctor</label>
                                <select name="" id="" class="form-control dr_id">
                                    <option value="">Select Doctor</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="">Schedule Date</label>
                                <input type="date" name="" id="" class='form-control date'>
                            </div>
                            <div class="col-6 mt-4">
                                <label for="">From time </label>
                                <input type="time" name="" id="" class='form-control from_time'>
                            </div>
                            <div class="col-6 mt-4">
                                <label for="">To time </label>
                                <input type="time" name="" id="" class='form-control to_time'>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="">Range Number (How Many Patients Are Allowed)</label>
                                <input type="number" name="" id="" class='form-control range'>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="">Available (default yes)</label>
                                <input type="text" disabled value='yes' name="" id="" class='form-control available'>
                                <p class='text-danger text-muted'> Yes, Means This schedule Will be available on public.</p>
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
            if (parseInt(time) <12)
                return "AM";
            return "PM";
        }
    })
</script>