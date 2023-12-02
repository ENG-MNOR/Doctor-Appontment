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
                            <span class="ml-1">Datatable</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Diagnose</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                <div class="row">
                            <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Basic Table</h5>
                                            <button id="addNew" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary float-right" >Add New Transaction</button>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Amount</th>
                                                            <th>Type</th>
                                                            <th>Description</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                   
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

        <div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Datatable</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">diagnose</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Basic Table</h5>
                        <button id="addNew" data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-primary float-right">Add New Transaction</button>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAME</th>

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
                        
                        <input type="text" class="form-control decription" id="recipient-name">
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
<script src='../js/jquery-3.3.1.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
<script src='../js/jquery-3.3.1.min.js'></script>
<script>
    $(document).ready(() => {
        $(".add").click(() => $(".diagnoseModal").modal("show"));

        $(".save").click(() => {
            if ($(".save").text() == "save") {
                var data = {
                    name: $(".name").val(),
                    decription: $(".decription").val(),
                    action: "createDiagnose"
                }

                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    url: "../Api/diagnose.api.php",
                    data: data,
                    success: (res) => {
                        console.log(res)
                    },
                    error: (res) => {
                        console.log(res)
                    }
                })
           
    }else {
        var data = {
            name: $(".name").val(),
            decription: $(".decription").val(),

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
            },
            error: (res) => {
                console.log(res)
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
                    tr += `<td>${value.pro_id}</td>`
                    tr += `<td>${value.name}</td>`
                    tr += `<td>${value.description}</td>`
                    tr += `<td><a class='btn btn-success editButton' editID=${value.pro_id}>Edit</a>
                      <a class='btn btn-danger deleteDiagnose' delID=${value.pro_id}>Delete</a></td>`
                    tr += '</tr>'
                })
                $(".table tbody").html(tr)
                console.log(data)
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
                $('.decription').val(res.data[0].description)
                $('.id').val(res.data[0].pro_id)
                $('.save').text("Edit")
                $(".diagnoseModal").modal("show")
            },
            error: (res) => {
                console.log(res)
            },
        })
    }



    $(document).on("click", "a.editButton", function () {
        var id = $(this).attr('editID')
        fetchDiagnoseData(id)

    })
    $(document).on("click", "a.deleteDiagnose", function () {
        var id = $(this).attr('delID')
        $.ajax({
            method: "POST",
            data: {
                "id": id,
                "action": "deleteDiagnose"
            },
            url: "../Api/diagnose.api.php",
            success: (res) => {
                console.log(res)
            },
            error: (res) => {
                console.log(res)
            }

        })
    })
    })