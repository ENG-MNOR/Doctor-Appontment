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
            <!-- <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                </div>
            </div> -->


        </div>
        <!-- row -->
        <div class="message-handler">

        </div>
        <h6>Create or Setup New Schedule </h6>
        <p class='text-muted'>This Schedule Will Be Available On Public </p>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-block table-border-style p-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Doctor</label>
                                <select name="" id="" class="form-control doctors">
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
                                <button class='btn btn-primary back'>Back</button>
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
        $('.back').click(() => window.location.href = "./schedule.php")
        $(".create").click(() => {

            var data = {
                dr_id: $(".doctors").val(),
                fromTime: formatTime($(".from_time").val()),
                toTime: formatTime($(".to_time").val()),
                date: $(".date").val(),
                range: $(".range").val(),
                available: "yes",
                action: "createSchedule"

            }
            console.log(data);
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/schedule.api.php",
                data: data,
                success: (res) => {
                        displayToast(res.message,"success",4000)
                },
                error: (res) => {
                    console.log(res)
                    displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })


        });

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

        function displayToast(message, type, timeout) {
            if (type == "error") {
                iziToast.error({
                    title: 'Error Encountered! ',
                    message: message,
                    backgroundColor: "#D83A56",
                    titleColor: "white",
                    messageColor: "white",
                    position: "topRight",
                    timeout: timeout
                });
            } else if (type == "success") {
                iziToast.success({

                    message: message,
                    backgroundColor: "#54B435",
                    titleColor: "white",
                    messageColor: "white",
                    position: "topRight",
                    timeout: timeout
                });
            } else if (type == "ask") {
                iziToast.question({
                    timeout: timeout,
                    close: false,
                    overlay: true,
                    displayMode: 'once',
                    id: 'question',
                    zindex: 999,
                    title: "Condirm!",
                    message: message,
                    position: 'topRight',
                    titleColor: "#86E5FF",
                    messageColor: "white",
                    backgroundColor: "#0081C9",
                    iconColor: "white",
                    buttons: [
                        ['<button style="background: #DC3535; color: white;"><b>YES</b></button>', function(instance, toast) {
                            alert("Ok Deleted...");
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                        }, true],
                        ['<button style="background: #ECECEC; color: #2b2b2b;">NO</button>', function(instance, toast) {
                            alert("Retuned");
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                        }],
                    ],
                    onClosing: function(instance, toast, closedBy) {
                        //  console.info('Closing | closedBy: ' + closedBy);
                    },
                    onClosed: function(instance, toast, closedBy) {
                        // console.info('Closed | closedBy: ' + closedBy);
                    }
                });
            }
        }
    })
</script>