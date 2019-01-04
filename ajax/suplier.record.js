function edit_suplier(id)
{
            var name=document.getElementById("nama_suplier"+id).innerHTML;
            var alamat=document.getElementById("alamat"+id).innerHTML;
            var kontak=document.getElementById("kontak"+id).innerHTML;
            var salesman=document.getElementById("salesman"+id).innerHTML;
            var rekening=document.getElementById("rekening"+id).innerHTML;


            document.getElementById("nama_suplier"+id).innerHTML="<input class='form-control' type='text' id='name_val"+id+"' value='"+name+"'>";
            document.getElementById("alamat"+id).innerHTML="<input class='form-control' type='text' id='name_alamat"+id+"' value='"+alamat+"'>";
            document.getElementById("kontak"+id).innerHTML="<input class='form-control' type='text' id='name_kontak"+id+"' value='"+kontak+"'>";
            document.getElementById("salesman"+id).innerHTML="<input class='form-control' type='text' id='name_sales"+id+"' value='"+salesman+"'>";
            document.getElementById("rekening"+id).innerHTML="<input class='form-control' type='text' id='name_rekening"+id+"' value='"+rekening+"'>";



 document.getElementById("edit_button"+id).style.display="none";
 document.getElementById("save_button"+id).style.display="block";
}


function save_row(id)
{
  var name=document.getElementById("name_val"+id).value;
  var alamat=document.getElementById("name_alamat"+id).value;
  var kontak=document.getElementById("name_kontak"+id).value;
  var salesman=document.getElementById("name_sales"+id).value;
  var rekening=document.getElementById("name_rekening"+id).value;


 $.ajax
 ({
  type:'post',
  url:'control/modify.suplier.php',
  data:{
   edit_row:'edit_suplier',
   name:name,
   alamat:alamat,
   kontak:kontak,
   salesman:salesman,
   rekening:rekening,
   row_id:id


  },
  success:function(response) {
   if(response=="success")
   {
     document.getElementById("nama_suplier"+id).innerHTML=name;
     document.getElementById("alamat"+id).innerHTML=alamat;
     document.getElementById("kontak"+id).innerHTML=kontak;
     document.getElementById("salesman"+id).innerHTML=salesman;
     document.getElementById("rekening"+id).innerHTML=rekening;


    document.getElementById("edit_button"+id).style.display="block";
    document.getElementById("save_button"+id).style.display="none";
   }
  }
 });
}

function delete_row(id)
{
 $.ajax
 ({
  type:'post',
  url:'control/modify.suplier.php',
  data:{
   delete_row:'delete_row',
   row_id:id,
  },
  success:function(response) {
   if(response=="success")
   {
    var row=document.getElementById("row"+id);
    row.parentNode.removeChild(row);
   }
  }
 });
}

function insert_row()
{
 var name=document.getElementById("new_name").value;
 var age=document.getElementById("new_age").value;

 $.ajax
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   insert_row:'insert_row',
   name_val:name,
   age_val:age
  },
  success:function(response) {
   if(response!="")
   {
    var id=response;
    var table=document.getElementById("user_table");
    var table_len=(table.rows.length)-1;
    var row = table.insertRow(table_len).outerHTML="<tr id='row"+id+"'><td id='name_val"+id+"'>"+name+"</td><td id='age_val"+id+"'>"+age+"</td><td><input type='button' class='edit_button' id='edit_button"+id+"' value='edit' onclick='edit_row("+id+");'/><input type='button' class='save_button' id='save_button"+id+"' value='save' onclick='save_row("+id+");'/><input type='button' class='delete_button' id='delete_button"+id+"' value='delete' onclick='delete_row("+id+");'/></td></tr>";

    document.getElementById("new_name").value="";
    document.getElementById("new_age").value="";
   }
  }
 });
}
