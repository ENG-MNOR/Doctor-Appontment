$(document).ready(function () {
  $(".add").click(() => $(".proffisionModal").modal("show"));
  $(".save").click(function () {
    if ($(".save").text() == "save") {
      var data = {
        name: $(".name").val(),
        description: $(".description").val(),
        action: "createProffision",
      };
      $.ajax({
        method: "POST",
        dataType: "JSON",
        data: data,
        url: "../Api/proffision.api.php",
        success: (res) => {
          console.log(res);
          readProffisions();
        },
        error: (err) => {
          console.log(err);
        },
      });
    } else {
      var data = {
        name: $(".name").val(),
        description: $(".description").val(),
        id: $(".id").val(),
        action: "updateProffision",
      };
      $.ajax({
        method: "POST",
        dataType: "JSON",
        data: data,
        url: "../Api/proffision.api.php",
        success: (res) => {
          console.log(res);
        },
        error: (error) => {
          console.log(error);
        },
      });
    }
  });

  $(document).on("click", "a.editButton", function() {
    var id = $(this).attr('editID');
    console.log(id);
    fetchProffisionData(id)
;  });
});
$(document).on("click","Button.deleteProffision", function() {
  var id=$(this).attr("delID");
  $.ajax({
    method:"POST",
    dataType:"JSON",
    data:{id:id,action:"deleteProffision"},
    url:"../Api/proffision.api.php",
    success:(res)=>{
      console.log(res);
      readProffisions();
    },
    error:(err)=>{
      console.log(err);
    }
  })
})



function readProffisions() {
$.ajax({
    method:"POST",
    dataType:"JSON",
    data:{action:"readProffision",},
    url:"../Api/proffision.api.php",
    success:(res)=>{
        console.log(res);
        var {data}=res;
        tr=`<tr>`;
        data.forEach(values =>{
            tr+=`<td>${values.pro_id}</td>`
            tr+=`<td>${values.name}</td>`
            tr+=`<td>${values.description}</td>`
            tr+=`<td><a class="btn btn-success editButton" editID="${values.pro_id}">Edit</a>
            <button class="btn btn-danger deleteProffision" delID=${values.pro_id}>delete</button></td>` 
            tr+="</tr>"
        } )
        $(".table tbody").html(tr);
        
    },
    error:(err)=>{
        console.log(err);
    }
})
}
const fetchProffisionData = (id) => {
            $.ajax({
                method:"POST",
                dataType:"JSON",
                data:{action:"fetchingOne",id:id},
                url:"../Api/proffision.api.php",
                success:(res)=>{
                  $(".name").val(res.data[0].name);
                  $(".description").val(res.data[0].description);
                  $(".id").val(res.data[0].id);
                  $(".save").text("Edite");
                  $(".proffisionModal").modal("show");
                },
                error:(err)=>{
                    console.log(err);
                }
            })
        }
    

readProffisions();