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
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Create Manage Schedules</span>
                </div>
            </div>
            <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Schedule</a></li>
                        </ol>
                    </div> -->
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header ">
                        <h5>All Schedules</h5>
                        <button id="addNew" data-toggle="modal" class="btn btn-primary float-right add">Setup Schedule</button>
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>From Time</th>
                                        <th>To Time</th>
                                        <th>Status</th>
                                        <th>Doctor</th>
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


<div class="modal fade editScheduleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Schedule</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label ">Date</label>
                        <input type="date" class="form-control date" id="recipient-name">
                    </div>
                      <div class="mb-3">
                        <label for="">duration</label>
                        <input type="number" class="form-control duration" placeholder="00:00:00" id="recipient-name">

                      </div>
                      <div class="mb-3">
                        <label for="">card price</label>
                        <input type="number" class="form-control price" placeholder="$0" id="recipient-name">

                      </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">From Time</label>
                        <input type="time" class="form-control from_time" placeholder="61xxxxxxxxx" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">To Time</label>
                        <input type="time" class="form-control to_time" placeholder="Yaqshid" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Range</label>
                        <input type="number" class="form-control range" id="recipient-name">
                    </div>


                    <div class="mb-3">

                        <input type="text" hidden class="form-control id" id="recipient-name">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary edit">Edit</button>
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
        $(".add").click(() => window.location.href = "./setup_schedule.php");

        const fetchPatientData = (id, response) => {

            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "fetchScheduleData",
                    id: id
                },
                url: "../Api/schedule.api.php",
                success: (res) => {
                    console.log(res)
                    response(res);
                },
                error: (res) => {
                    console.log(res)
                },
            })
        }


        function loadSchedule() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/schedule.api.php",
                data: {
                    action: "loadSchedule",
                },
                success: (res) => {
                    console.log(res)

                    var tr = "<tr>"
                    res.data.forEach(value => {
                        tr += `<td>${value.sch_id}</td>`
                        tr += `<td>${value.date}</td>`
                        tr += `<td>${value.from_time}</td>`
                        tr += `<td>${value.to_time}</td>`
                        if (value.available == "yes")
                            tr += `<td><a class='btn btn-success text-light activeClass' stateID=${value.sch_id}>Active</a></td>`
                        else
                            tr += `<td><a class='btn btn-danger text-light deactiveClass' stateID=${value.sch_id}>Deactive</a></td>`
                        tr += `<td>${value.name}</td>`
                        tr += `<td>
                        <a class='btn btn-danger text-light deleteSchedule' delID=${value.sch_id}><i class="fa-solid fa-xmark"></i></a>
                        <a class='btn btn-success text-light editSchedule' editID=${value.sch_id}><i class="fa-solid fa-pen-to-square"></i></a>
                        
                        </td>`

                        tr += '</tr>'
                    })
                    $(".table tbody").html(tr)
                    $('.table').DataTable()
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        loadSchedule();

        $(document).on("click", "a.editSchedule", function() {
            fetchPatientData($(this).attr("editID"), (res) => {
                console.log(res);
                $(".id").val(res.data[0].sch_id);
                // $(".dr_id").text(res.data[0].name);
                $(".range").val(res.data[0].range_number);
                $(".date").val(res.data[0].date);
                $(".from_time").val(convertTimeTo24Hour(res.data[0].from_time));
                $(".to_time").val(convertTimeTo24Hour(res.data[0].to_time));
                $(".duration").val(res.data[0].duration);
                $(".price").val(res.data[0].card_price);
                $('.editScheduleModal').modal("show");
            })

        })
        $(document).on("click", ".edit", function() {
            data={
                id:$(".id").val(),
                range:$(".range").val(),
                date:$(".date").val(),
                from_time:$(".from_time").val(),
                to_time:$(".to_time").val(),
                duration:$(".duration").val(),
                price:$(".price").val(),
                action:"updateAllSchedule"
            }
        $.ajax({
            method: "POST",
            dataType: "JSON",
            url: "../Api/schedule.api.php",
            data:data,
            success:(res)=>{
                console.log(res);
            },
            error:(error)=>{
                console.log(error);
            }
        })
     
        })

        $(document).on("click", "a.activeClass", function() {
            var id = $(this).attr("stateID");
            var text = $('a.activeClass').text();
            swal({
                    title: "Are you sure?",
                    text: "Do you want to Deactivate This Schedule, Once Deactivated It will Unavailable!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "POST",
                            dataType: "JSON",
                            url: "../Api/schedule.api.php",
                            data: {
                                sch_id: id,
                                available: "no",
                                action: "updateSchedule"
                            },
                            success: (res) => {

                                loadSchedule();
                                // displayToast(res.message, "success", 4000)
                            },
                            error: (res) => {
                                console.log(res)
                                // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                            }
                        })

                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });

        })
        $(document).on("click", "a.deleteSchedule", function() {
            var id = $(this).attr("delID");

            swal({
                    title: "Are you sure?",
                    text: "Confirm to delete this data?!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "POST",
                            dataType: "JSON",
                            url: "../Api/schedule.api.php",
                            data: {
                                sch_id: id,

                                action: "deleteSchedule"
                            },
                            success: (res) => {

                                loadSchedule();
                                // displayToast(res.message, "success", 4000)
                            },
                            error: (res) => {
                                console.log(res)
                                // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                            }
                        })

                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });

        })
        $(document).on("click", "a.deactiveClass", function() {
            var id = $(this).attr("stateID");
            var text = $('a.deactiveClass').text();
            swal({
                    title: "Are you sure?",
                    text: "Do you want to Activate This Schedule, Once Active It will Public!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "POST",
                            dataType: "JSON",
                            url: "../Api/schedule.api.php",
                            data: {
                                sch_id: id,
                                available: "yes",
                                action: "updateSchedule"
                            },
                            success: (res) => {
                                alert(res.message)
                                loadSchedule();
                                // displayToast(res.message, "success", 4000)
                            },
                            error: (res) => {
                                console.log(res)
                                // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                            }
                        })

                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });

        })
// Convert the time format from 12-hour to 24-hour
function convertTimeTo24Hour(time) {
  if (!time) {
    // Handle the case where the time is undefined or empty
    return '';
  }

  const [timePart, meridiem] = time.split(/(?<=\d)\s*([AP]M)/i);
  const timeParts = timePart.split(":");

  if (timeParts.length !== 2 || !meridiem) {
    // Handle invalid time format
    return '';
  }

  let [hours, minutes] = timeParts;
  hours = parseInt(hours);

  if (meridiem.toUpperCase() === "PM" && hours !== 12) {
    hours += 12;
  } else if (meridiem.toUpperCase() === "AM" && hours === 12) {
    hours = 0;
  }

  hours = hours.toString().padStart(2, "0");
  return `${hours}:${minutes}`;
}
    })
</script>