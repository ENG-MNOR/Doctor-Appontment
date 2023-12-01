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
                                <select name="" id="" class="form-control">
                                    <option value="">Select Doctor</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="">Schedule Date</label>
                                <input type="date" name="" id="" class='form-control'>
                            </div>
                            <div class="col-6 mt-4">
                                <label for="">From time </label>
                                <input type="time" name="" id="" class='form-control'>
                            </div>
                            <div class="col-6 mt-4">
                                <label for="">To time </label>
                                <input type="time" name="" id="" class='form-control'>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="">Range Number (How Many Patients Are Allowed)</label>
                                <input type="number" name="" id="" class='form-control'>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="">Available (default yes)</label>
                                <input type="text" disabled value='yes' name="" id="" class='form-control'>
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