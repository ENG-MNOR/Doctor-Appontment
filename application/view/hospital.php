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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Hospital</a></li>
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
                                                            <th>number</th>
                                                            <th>email</th>
                                                            <th>location</th>
                                                            <th>description</th>
                                                            <th>actions</th>
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






<?php
include '../include/footer.php';?>
<script src='../js/jquery-3.3.1.min.js'></script>
<script>
     $(document).on("click","a.deleteHospital",function(){
        var id = $(this).attr('delID')
      $.ajax({
        method: "POST",
        data : {
            "id": id,
            "action": "deleteHospital"
        },
        url : "../Api/hospital.api.php",
        success: (res)=>{
            console.log(res)
            readHospitals()
        },
        error: (res)=>{
            console.log(res)
        }

      })
       })
            const readHospitals=()=>{
            $.ajax({
                method :"POST",
                dataType:"JSON",
                data : {"action": "readHospital"},
                url : "../Api/hospital.api.php",
                success : (res)=>{
                    var tr="<tr>"
                   var {data}=res;
                   data.forEach(value =>{
                    tr+=`<td>${value.hospital_id}</td>`
                    tr+=`<td>${value.name}</td>`
                    tr+=`<td>${value.main_number}</td>`
                    tr+=`<td>${value.email}</td>`
                    tr+=`<td>${value.location}</td>`
                    tr+=`<td>${value.description}</td>`
                    tr+=`<td><a class='btn btn-success'>Edit</a>
                     <a class='btn btn-danger deleteHospital' delID=${value.hospital_id}>Delete</a></td>`
                    tr+='</tr>'
                   })
                   $(".table tbody").html(tr)
                   console.log(data)
                },
                error : (res)=>{
                    console.log(res)
                },
            })
        }
        readHospitals();
</script>