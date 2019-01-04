<?php
     if ($_POST['Category']) {
       mysqli_query($con,"insert into kategori_menu (nama_kategori_menu,date,username) values ('$_POST[Category]','$date','$_SESSION[user_session]') ");
       // echo "insert into kategori_menu (name_kategori_menu,date) values ('$_POST[master]','$date')";
     }elseif ($_POST['menu']) {
       mysqli_query($con,"insert into menu (name,price,id_kategori_menu) values ('$_POST[menu]','$_POST[price]','$_POST[id_kategori_menu]') ");

     }
 ?>
 <script src="ajax/modify.menu.js"></script>
 <!-- <script src="ajax/suplier.record.js"></script> -->
<div class="col-md-12">
                      <div class="card">
                          <div class="card-body">
                              <!-- <h4 class="card-title">Responsive model</h4> -->
                              <!-- sample modal content -->
                              <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title">Category Menu</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          </div>
                                          <div class="modal-body">
                                              <form method="post" action="" >
                                                  <div class="form-group">
                                                      <label for="recipient-name" class="control-label">Category Menu:</label>
                                                      <input type="text" class="form-control" name='Category' id="recipient-name">
                                                  </div>
                                              </form>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                              <!-- SUB MODALE -->
                              <div id="responsive-modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title">Menu</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          </div>
                                          <div class="modal-body">
                                              <form method="post" action="" >
                                                <div class="form-group">
                                                  <label for="recipient-name" class="control-label">Category Memu:</label>

                                                  <select class="form-control" name="id_kategori_menu">
                                                    <option value=""> -Select Category - </option>
                                                    <?php
                                                    $d=mysqli_query($con, "select * from kategori_menu order by id_kategori_menu asc");
                                                    while ($v=mysqli_fetch_array($d)) {
                                                      echo "<option value='$v[id_kategori_menu]'> $v[nama_kategori_menu] </option>";
                                                    }
                                                     ?>
                                                  </select>
                                                </div>
                                                  <div class="form-group">
                                                      <label for="recipient-name" class="control-label">Nama Menu:</label>
                                                      <input type="text" class="form-control" name='menu' >
                                                  </div>


                                              </form>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                              <!-- /.modal -->

                  <button type="button" class="btn btn-info d-none d-lg-block m-l-4" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-folder"></i> Create New Category Menu</button>
<br>
                  <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#responsive-modal2"><i class="fa fa-folder"></i> Create New Menu</button>

                          </div>
                      </div>
                  </div>

                  <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                          <table>
                            <thead>

                            </thead>
                            <tbody>
                              <?php
                                $a=mysqli_query($con,"select * from kategori_menu order by id_kategori_menu asc");
                                while ($r=mysqli_fetch_array($a)) {
                               ?>
                              <tr id="row<?php echo $r['id_kategori_menu'];?>">
                              <td><a href="javascript:void(0)" id="delete_button<?php echo $r['id_kategori_menu'];?>" onclick="delete_row('<?php echo $r['id_kategori_menu'];?>');"><i class="icon-trash"></i></a></td>
                              <td id="nama_kategori_menu<?php echo $r['id_kategori_menu'];?>"><?php echo $r['nama_kategori_menu'];?>
                              </td>


                              <td>
                               <a href="javascript:void(0)"    id="edit_button<?php echo $r['id_kategori_menu'];?>"  onclick="edit_row('<?php echo $r['id_kategori_menu'];?>');"> <i class="icon-pencil text-info"></i>  </a>

                               <input type='button' class="btn btn-success" id="save_button<?php echo $r['id_kategori_menu'];?>" value="save" onclick="save_row('<?php echo $r['id_kategori_menu'];?>');" style="display:none;">

                              </td>
                             </tr>


                               <?php
                               $p=mysqli_query($con, "select * from menu where id_kategori_menu='$r[id_kategori_menu]'");
                               while ($m=mysqli_fetch_array($p)) {
                                ?>
                                <tr id="rowmenu<?php echo $m['id_menu'];?>">
                                <td></td>
                                <td></td>
                               <td><a href="javascript:void(0)" id="delete_button<?php echo $m['id_menu'];?>" onclick="delete_menu('<?php echo $m['id_menu'];?>');"><i class="icon-trash"></i></a></td>
                               <td id="menu<?php echo $m['id_menu'];?>" ><?php echo $m['name'];?></td>
                               <td>:</td>
                               <td id="price<?php echo $m['id_menu'];?>"> <?php echo $m['price'];?> </td>
                               <td>   <a href="javascript:void(0)"    id="edit_menu<?php echo $m['id_menu'];?>"  onclick="edit_menu('<?php echo $m['id_menu'];?>');"> <i class="icon-pencil text-info"></i>  </a>

                                  <input type='button' class="btn btn-success" id="save_menu<?php echo $m['id_menu'];?>" value="save" onclick="save_menu('<?php echo $m['id_menu'];?>');" style="display:none;"></td>
                             </tr>
                             <?php
                           }
                         }
                              ?>
                            </tbody>
                          </table>

                        </diV>
                      </div>
                  </div>
