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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Basic Table</h5>
                        <button data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-primary float-right add">Add New Admin</button>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>username</th>
                                        <th>email</th>

                                        <th>Action</th>
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
</div>
<!--**********************************
            Content body end
        ***********************************-->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
    data-bs-whatever="@mdo">Open modal for @mdo</button>


<div class="modal fade adminModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                        <!-- <label for="recipient-name" class="col-form-label">Username:</label> -->
                        <input type="text" class="form-control username" placeholder="UserName" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->
                        <input type="text" class="form-control email" placeholder="Email" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->
                        <input type="text" class="form-control password" placeholder="Password" id="recipient-name">
                        <input type="text" hidden class="form-control id" id="recipient-name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save">Save</button>
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
<script src='../js/jquery-3.3.1.min.js'></script>

<script>
    // tabine 
    // pretier
    // php formatter
    // 
    $(document).ready(() => {
        //this where we want to create  or insert the admin
        $(".add").click(() => $(".adminModal").modal("show"));
        $(".save").click(() => {
            if ($(".save").text() == "Save") {
                alert("create admin clicked");
            var data ={
                username : $(".username").val(),
                email : $(".email").val(),
                password : $(".password").val(),
                action: "createAdmin"
            }
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/admins.api.php",
                data:data,
                success : (res)=>{
                    console.log(res)
                    readAdmin();
                },
                error: (res)=>{
                    console.log(res)
                }
            })
            }
            // this where  we update the admin
            else {
                $(".save").click(() => {
                    alert("update admin clicked");
                    var data = {
                        username: $(".username").val(),
                        email: $(".email").val(),
                        password: $(".password").val(),
                        id: $(".id").val(),
                        action: "updateAdmin",

                    }

                    $.ajax({
                        method: "POST",
                        dataType: "JSON",
                        url: "../Api/admins.api.php",
                        data: data,
                        success: (res) => {
                            console.log(res)
                        },
                        error: (res) => {
                            console.log(res)
                        }
                    })
                })
            }

        })

        //this is where we listen the update button and call the function of fetching data
        $(document).on("click", "a.editButton", function () {
            var id = $(this).attr('editID');
            
            fetchAdminData(id)

        })

        //this listens the clicking of the delete button and deletes the selected admin
        $(document).on("click", "a.deleteAdmin", function () {
            var id = $(this).attr('delID')
            
            $.ajax({
                method: "POST",
                data: {
                    "id": id,
                    "action": "deleteAdmin"
                },
                url: "../Api/admins.api.php",
                success: (res) => {
                    console.log(res);
                    readAdmin();
                },
                error: (res) => {
                    console.log(res)
                }

            })
        })




        // this the part of the function
        // this is the fuction that reads the admin data
        const readAdmin = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: { "action": "readAdmins" },
                url: "../Api/admins.api.php",
                success: (res) => {
                    var tr = "<tr>"
                    var { data } = res;
                    data.forEach(value => {
                        tr += `<td>${value.admin_id}</td>`
                        tr += `<td>${value.username}</td>`
                        tr += `<td>${value.email}</td>`
                        tr += `<td><a class='btn btn-success editButton' editID=${value.admin_id}>Edit</a>
                     <a class='btn btn-danger deleteAdmin' delID=${value.admin_id}>Delete</a></td>`
                        tr += '</tr>'
                    })
                    $(".table tbody").html(tr);
                    $(".table").DataTable();

                    console.log(data)
                },
                error: (res) => {
                    console.log(res)
                },
            })
        }
        readAdmin();


        // this function fetches asingle admin information
        const fetchAdminData = (id) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: { "action": "fetchingOne", id: id },
                url: "../Api/admins.api.php",
                success: (res) => {
                    console.log(res)
                    $('.username').val(res.data[0].username)
                    $('.email').val(res.data[0].email)
                    $('.password').val(res.data[0].password)
                    $('.id').val(res.data[0].admin_id)
                    $('.save').text("Edit")
                    $(".adminModal").modal("show")
                },
                error: (res) => {
                    console.log(res)
                },
            })
        }




    })

</script>