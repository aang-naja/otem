<!-- <script src="ajax/modify.record.js"></script> -->
<script src="ajax/suplier.record.js"></script>
<?php
if (!empty($_POST['nama'])) {
  $nama=$_POST['nama'];
  $salesman=$_POST['salesman'];
  $phone=$_POST['phone'];
  $alamat=$_POST['alamat'];
  $rekening=$_POST['rekening'];

  mysqli_query($con, "insert into suplier (nama_suplier,alamat,kontak,salesman,username,rekening)
  values ('$nama','$alamat','$phone','$salesman','$_SESSION[user_session]','$rekening')");

}


?>

<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Contact Suplier list</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>Nama Suplier</th>
                                                <th>Salesman</th>
                                                <th>Phone</th>
                                                <th>Alamat</th>
                                                <th>Nomor Rekening</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          $p=mysqli_query($con, "select * from suplier order by id_suplier asc");
                                          while ($r=mysqli_fetch_array($p)) {


                                           ?>
                                            <tr id="row<?php echo $r['id_suplier'];?>">
                                                <td id="nama_suplier<?php echo $r['id_suplier'];?>"><?php echo "$r[nama_suplier]"; ?>  </td>
                                                <td id="salesman<?php echo $r['id_suplier'];?>"> <?php echo "$r[salesman]"; ?></td>
                                                <td id="kontak<?php echo $r['id_suplier'];?>"><?php echo "$r[kontak]"; ?></td>
                                                <td id="alamat<?php echo $r['id_suplier'];?>"><?php echo "$r[alamat]"; ?></td>
                                                <td id="rekening<?php echo $r['id_suplier'];?>"><?php echo "$r[rekening]"; ?></td>

                                                <td>
                                                   <a href="javascript:void(0)" id="edit_button<?php echo $r['id_suplier'];?>"  onclick="edit_suplier('<?php echo $r['id_suplier'];?>');"> <i class="icon-pencil text-info"></i>  </a>
                                                    <input type='button' class="btn btn-success" id="save_button<?php echo $r['id_suplier'];?>" value="save" onclick="save_row('<?php echo $r['id_suplier'];?>');" style="display:none;">
                                                    <!-- <a href="javascript:void(0)" id="delete_button<?php echo $r['id_suplier'];?>" onclick="delete_row('<?php echo $r['id_suplier'];?>');"><i class="icon-trash"></i></a> -->

                                                </td>
                                            </tr>
                                            <?php
                                              }
                                              ?>
                                        </tbody>
                                        <tfoot>
                                            <tr id="row<?php echo $r['id_kategori_khas'];?>">
                                                <td colspan="2">
                                                    <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact">Add New Suplier</button>
                                                </td>
                                                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Add New Suplier</h4> </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" method="post" Action="" >
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text"  name="nama" class="form-control" placeholder="nama suplier"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="salesman" class="form-control" placeholder="bussines orwner/ salesman"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="phone" class="form-control" placeholder="Phone"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="alamat" class="form-control" placeholder="alamat"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="rekening" class="form-control" placeholder="Nomor rekening"> </div>



                                                                    </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" value="submit">

                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                          </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->

                        <!-- Column -->

                        <!-- Column -->

                        <!-- Column -->

                    </div>
                </div>
