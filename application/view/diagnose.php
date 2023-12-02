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
                            <h4>Diagnose list</h4>
                            <span class="ml-1">and their operation</span>
                        </div>
                    </div>

                </div>
                <!-- row -->

                <div class="row">
                            <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Basic Table</h5>
                                            <button id="addNew" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary float-right add" >Add New Transaction</button>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                          
                                                            <th>Description</th>
                                                           
                                                            <th>Action</th>
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

      
      
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
    data-bs-whatever="@mdo">Open modal for @mdo</button>


<div class="modal fade diagnoseModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                      
                        <input type="text" class="form-control name" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        
                        <input type="text" class="form-control description" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        

                        <input type="text" hidden class="form-control id" id="recipient-name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save">save</button>
            </div>
        </div>
    </div>
</div>







<?php
include '../include/footer.php';



?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="../iziToast-master/dist/js/iziToast.js"></script>
<script src="../iziToast-master/dist/js/iziToast.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src='../js/jquery-3.3.1.min.js'></script>
<script>
    $(document).ready(() => {
        
        
        $(".add").click(function(){
            
            $(".diagnoseModal").modal("show")
            $(".save").text("save");
        clearInputData(
                $(".name"),
                $(".description")
            )
            ;});
        

        $(".save").click(() => {
            if ($(".save").text() == "save") {
                var data = {
                    name: $(".name").val(),
                    decription: $(".description").val(),
                    action: "createDiagnose"
                }

                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    url: "../Api/diagnose.api.php",
                    data: data,
                    success: (res) => {
                        console.log(res)
                        readDiagnose()
                        $(".diagnoseModal").modal("hide");
                        displayToast("dignose Was Added Successfully 🔥", "success", 2000);
                        
                    },
                    error: (res) => {
                        console.log(res)
                        displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                    }
                })
           
    }else {
        var data = {
            name: $(".name").val(),
            decription: $(".description").val(),

            id: $(".id").val(),
            action: "updateDiagnose",

        }
            console.log(data);

        $.ajax({
            method: "POST",
            dataType: "JSON",
            url: "../Api/diagnose.api.php",
            data: data,
            success: (res) => {
                console.log(res)
                $(".diagnoseModal").modal("hide");
                            displayToast("diagnose Was updated Successfully 🔥", "success", 2000);
                            readDiagnose();
            },
            error: (res) => {
                console.log(res)
                displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);

            }
        })
    }
})





    const readDiagnose = () => {
        $.ajax({
            method: "POST",
            dataType: "JSON",
            data: { "action": "readDiagnose" },
            url: "../Api/diagnose.api.php",
            success: (res) => {
                var tr = "<tr>"
                var { data } = res;
                data.forEach(value => {
                    tr += `<td>${value.diganose_id}</td>`
                    tr += `<td>${value.name}</td>`
                    tr += `<td>${value.description}</td>`
                    tr += `<td><a class='btn btn-success editButton' editID=${value.diganose_id}}>Edit</a>
                      <a class='btn btn-danger deleteDiagnose' delID=${value.diganose_id}>Delete</a></td>`
                    tr += '</tr>'

                    console.log(value)
                })
                $(".table tbody").html(tr)
                console.log(tr)


              
            },
            error: (err) => {
                console.log(err)
            }

        })
    }
    readDiagnose()
    const fetchDiagnoseData = (id) => {
        $.ajax({
            method: "POST",
            dataType: "JSON",
            data: { "action": "fetchingOne", id: id },
            url: "../Api/diagnose.api.php",
            success: (res) => {
                console.log(res)
                $('.name').val(res.data[0].name)
                $('.description').val(res.data[0].description)
                $('.id').val(res.data[0].diganose_id)
                $('.save').text("Edit")
                $(".diagnoseModal").modal("show")
            },
            error: (res) => {
                console.log("there is ",res)
            },
        })
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
                        ['<button style="background: #DC3535; color: white;"><b>YES</b></button>', function (instance, toast) {
                            alert("Ok Deleted...");
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                        }, true],
                        ['<button style="background: #ECECEC; color: #2b2b2b;">NO</button>', function (instance, toast) {
                            alert("Retuned");
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                        }],
                    ],
                    onClosing: function (instance, toast, closedBy) {
                        //  console.info('Closing | closedBy: ' + closedBy);
                    },
                    onClosed: function (instance, toast, closedBy) {
                        // console.info('Closed | closedBy: ' + closedBy);
                    }
                });
            }
        }


    
    $(document).on("click", "a.editButton", function() {
            var id = $(this).attr('editID')
            fetchDiagnoseData(id)

    })
   
    function clearInputData(...inputs) {
        inputs.forEach(input => {
            input.val("");
        })
    }
    $(document).on("click", "a.deleteDiagnose", function () {
        var id = $(this).attr('delID')
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "POST",
                            data: {
                                "id": id,
                                "action": "deleteDiagnose"
                            },
                            url: "../Api/diagnose.api.php",
                            success: (res) => {
                                swal("Data Has Been removed!", {
                                    icon: "success",
                                });
                                readDiagnose();
                            },
                            error: (res) => {
                                console.log(res)
                            }

                        })

                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });
        
    })
    

    })

    </script>