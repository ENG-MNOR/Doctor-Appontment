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
                                                    <tbody>

                                                    
                                                   
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






<?php
include '../include/footer.php';
?>

<script>
 $(document).ready(()=>{
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
         tr+=`<td><a class="btn btn-success">Edit</a>
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

 readPatient();
 })


</script>