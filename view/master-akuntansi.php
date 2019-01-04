  <?php
       if ($_POST['master']) {
         mysqli_query($con,"insert into kategori_khas (nama_kategori_khas,date) values ('$_POST[master]','$date') ");
         // echo "insert into kategori_khas (name_kategori_khas,date) values ('$_POST[master]','$date')";
       }elseif ($_POST['submaster']) {
         mysqli_query($con,"insert into subkategori_khas (nama_subkategori_khas,date,id_kategori_khas) values ('$_POST[submaster]','$date','$_POST[id_kategori_khas]') ");

       }
   ?>
   <script src="ajax/modify.record.js"></script>
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
                                                <h4 class="modal-title">Master Akuntansi</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="" >
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Master:</label>
                                                        <input type="text" class="form-control" name='master' id="recipient-name">
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
                                                <h4 class="modal-title">Sub Master Akuntansi</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="" >
                                                  <div class="form-group">
                                                    <select class="form-control" name="id_kategori_khas">
                                                      <option value=""> -Select Master - </option>
                                                      <?php
                                                      $d=mysqli_query($con, "select * from kategori_khas order by id_kategori_khas asc");
                                                      while ($v=mysqli_fetch_array($d)) {
                                                        echo "<option value='$v[id_kategori_khas]'> $v[nama_kategori_khas] </option>";
                                                      }
                                                       ?>
                                                    </select>
                                                  </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Master:</label>
                                                        <input type="text" class="form-control" name='submaster' id="recipient-name">
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->

                    <button type="button" class="btn btn-info d-none d-lg-block m-l-4" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-folder"></i> Create New Master</button>
<br>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#responsive-modal2"><i class="fa fa-folder"></i> Create New Submaster</button>

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
                                  $a=mysqli_query($con,"select * from kategori_khas order by id_kategori_khas asc");
                                  while ($r=mysqli_fetch_array($a)) {
                                 ?>
                                <tr id="row<?php echo $r['id_kategori_khas'];?>">
                                <td><a href="javascript:void(0)" id="delete_button<?php echo $r['id_kategori_khas'];?>" onclick="delete_row('<?php echo $r['id_kategori_khas'];?>');"><i class="icon-trash"></i></a></td>
                                <td id="nama_kategori_khas<?php echo $r['id_kategori_khas'];?>"><?php echo $r['nama_kategori_khas'];?>
                                </td>


                                <td>
                                 <a href="javascript:void(0)"    id="edit_button<?php echo $r['id_kategori_khas'];?>"  onclick="edit_row('<?php echo $r['id_kategori_khas'];?>');"> <i class="icon-pencil text-info"></i>  </a>

                                 <input type='button' class="btn btn-success" id="save_button<?php echo $r['id_kategori_khas'];?>" value="save" onclick="save_row('<?php echo $r['id_kategori_khas'];?>');" style="display:none;">

                                </td>
                               </tr>
                               <tr>
                                 <?php
                                 $p=mysqli_query($con, "select * from subkategori_khas where id_kategori_khas='$r[id_kategori_khas]'");
                                 while ($m=mysqli_fetch_array($p)) {
                                  ?>
                                 <td></td>
                                 <td id="nama_subkategori_khas<?php echo $m['id_subkategori_khas'];?>"><?php echo $m['nama_subkategori_khas'];?></td>
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
