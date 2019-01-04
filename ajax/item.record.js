function edit_item(id)
{
            var name=document.getElementById("nama_item"+id).innerHTML;
            var satuan=document.getElementById("satuan"+id).innerHTML;
            var qty=document.getElementById("qty"+id).innerHTML;
            // var suplier=document.getElementById("id_suplier"+id).innerHTML;
            var price=document.getElementById("price"+id).innerHTML;


            document.getElementById("nama_item"+id).innerHTML="<input class='form-control' type='text' id='name_val"+id+"' value='"+name+"'>";
            document.getElementById("satuan"+id).innerHTML="<select class='form-control' id='name_satuan"+id+"''><option value='"+satuan+"'>"+satuan+"</option><option value='pcs'>pcs</option><option value='lusin'>lusin</option><option value='dus'>dus</option><option value='pack'>Pack</option><option value='gram'>gram</option></select>";
            document.getElementById("qty"+id).innerHTML="<input class='form-control' type='text' id='name_qty"+id+"' value='"+qty+"'>";
            // document.getElementById("id_suplier"+id).innerHTML="<input class='form-control' type='text' id='name_suplier"+id+"' value='"+suplier+"'>";
            document.getElementById("price"+id).innerHTML="<input class='form-control' type='text' id='name_price"+id+"' value='"+price+"'>";



 document.getElementById("edit_button"+id).style.display="none";
 document.getElementById("save_button"+id).style.display="block";
}


function save_row(id)
{
  var name=document.getElementById("name_val"+id).value;
  var satuan=document.getElementById("name_satuan"+id).value;
  var qty=document.getElementById("name_qty"+id).value;
  var price=document.getElementById("name_price"+id).value;



 $.ajax
 ({
  type:'post',
  url:'control/modify.item.php',
  data:{
   edit_row:'edit_item',
   name:name,
   satuan:satuan,
   qty:qty,
   price:price,
   row_id:id


  },
  success:function(response) {
   if(response=="success")
   {
     document.getElementById("nama_item"+id).innerHTML=name;
     document.getElementById("satuan"+id).innerHTML=satuan;
     document.getElementById("qty"+id).innerHTML=qty;
     document.getElementById("price"+id).innerHTML=price;



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
  url:'control/modify.item.php',
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
