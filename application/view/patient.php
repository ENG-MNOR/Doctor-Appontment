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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Patient</a></li>
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
                                                            <th>name</th>
                                                            <th>Gender</th>
                                                            <th>Mobile</th>
                                                            <th>Address</th>
                                                            <th>password</th>
                                                            <th>image</th>
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
        <div class="modal fade patientModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="patientForm">
                    <div class="mb-3">
                        <!-- <label for="recipient-name" class="col-form-label">Username:</label> -->
                        <input type="text" class="form-control name" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->
                        <input type="text" class="form-control gender" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->

                        <input type="text" class="form-control email" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->

                        <input type="text" class="form-control address" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->

                        <input type="text" class="form-control mobile" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->

                        <input type="text" class="form-control password" id="recipient-name">
                    </div>                    <div class="mb-3">
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->

                        <input type="text" class="form-control image" id="recipient-name">
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

<script>
 $(document).ready(()=>{
    
  
    const fetchPatientData = (id) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: { "action": "fetchingOne", id: id },
                url: "../Api/patient.api.php",
                success: (res) => {
                    console.log(res)
                    $('.name').val(res.data[0].name)
                    $('.email').val(res.data[0].email)
                    $('.gender').val(res.data[0].gender)
                    $('.id').val(res.data[0].pat_id)
                    $('.mobile').val(res.data[0].mobile)
                    $('.address').val(res.data[0].address)
                    $('.image').val(res.data[0].profile_image)
                    $('.save').text("Edit")
                    $(".patientModal").modal("show")
                },
                error: (res) => {
                    console.log(res)
                },
            })
        }

const readPatient=()=>{
    $.ajax({
        method:"POST",
        dataType:"JSON",
        data:{"action":"readPatient"},
        url:"../Api/patient.api.php",
        success:(res)=>{
        // console.log(res);
        var {data}=res;
        var tr="<tr>";
        data.forEach(values =>{
         tr+=`<td>${values.pat_id}</td>`;
         tr+=`<td>${values.name}</td>`;
         tr+=`<td>${values.gender}</td>`;
         tr+=`<td>${values.address}</td>`;
         tr+=`<td>${values.email}</td>`;
         tr+=`<td>${values.password}</td>`;
         tr+=`<td>${values.profile_image}</td>`;
         tr+=`<td><a class="btn btn-success editPatient" editID=${values.pat_id}>Edit</a>
         <a class="btn btn-danger deletePatient " delId=${values.pat_id}>Delete</a></td>`;
         tr+="</tr>";
        })
        $(".table tbody").html(tr);
        },
        error: (res)=>{
          console.log(res);
        }
    })
}

$(document).on("click", "a.deletePatient", function(){
    $id = $(this).attr('delId')
    $.ajax({
        method: "POST",
        data: {
            id:$id,
            "action": "deletePatient"
        },
        url: "../Api/patient.api.php",
        success: (res) => {
            console.log(res);
            readPatient();
        },
        error: (error)=> {
            console.log(error);
        }
    })
})

$(document).on('click',"a.editPatient",function(){
    id=$(this).attr("editID");
    fetchPatientData(id);
    

});

readPatient();
 })


</script>