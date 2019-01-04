<script src="ajax/item.record.js"></script>

                    <div class="col-md-12">
                      <div class="card">
                          <div class="card-body">
                            <table class="table table-responsive">

                              <tr>
                                <th>Nama Barang</th>
                                <th width="20%">Satuan</th>
                                <th width="10%">QTY</th>
                                <th width="25%">Suplier</th>
                                <th>Price</th>
                                <th></th>
                              </tr>
                              <tbody>
                                <tr>
                                  <form class="" action="" method="post">


                                  <td><input type="text" name="namabarang" class="form-control" value=""></td>
                                  <td>
                                    <select class="form-control" name="satuan">
                                      <option value="">Pilih</option>
                                      <option value="pcs">pcs</option>
                                      <option value="lusin">lusin</option>
                                      <option value="dus">dus</option>
                                      <option value="pack">Pack</option>
                                      <option value="gram">gram</option>

                                    </select>
                                  </td>
                                  <td><input type="text" name="qty" class="form-control" value=""></td>
                                  <td>
                                    <select class="form-control" name="suplier">
                                        <option value="">pilih</option>
                                        <?php
                                        $p=mysqli_query($con, "select * from suplier order by nama_suplier asc");
                                        while ($r=mysqli_fetch_array($p)) {
                                          echo "<option value='$r[id_suplier]'>$r[nama_suplier]</option>";
                                        }

                                         ?>
                                    </select>
                                  </td>
                                  <td><input type="text" name="price" class="form-control" value=""></td>
                                  <td><input type="submit" name="save" class="btn btn-info" value="save"></td>
                                </tr>
                                </form>
                              </tbody>
                            </table>
                            <?php
                          if ($_POST['namabarang']) {
                            $numb=mysqli_num_rows(mysqli_query($con, "select kode_item from item"));
                            $char = "BRG";
                            $kode = $char . sprintf("%03s", $numb);

                            mysqli_query($con, "insert into item (kode_item, nama_item, satuan, qty, id_suplier, price ,username, date) values
                            ('$kode','$_POST[namabarang]','$_POST[satuan]','$_POST[qty]','$_POST[suplier]','$_POST[price]','$_SESSION[user_session]','$date')");
                            echo "$kode";
                          }

                             ?>





                          </div>
                          </div>

                          <!--  -->
                          <div class="card">
                            <div class="card-body">

                          <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                              <thead>
                                  <tr>
                                      <th>Kode Item</th>
                                      <th>Nama Barang</th>
                                      <th width="15%">satuan</th>
                                      <th>QTY</th>
                                      <th>Suplier</th>
                                      <th>Price</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $p=mysqli_query($con, "select * from item,suplier where item.id_suplier=suplier.id_suplier order by item.kode_item desc");
                                while ($r=mysqli_fetch_array($p)) {


                                 ?>
                                  <tr id="row<?php echo $r['kode_item'];?>">
                                      <td id="kode_item<?php echo $r['kode_item'];?>"><?php echo "$r[kode_item]"; ?>  </td>
                                      <td id="nama_item<?php echo $r['kode_item'];?>"> <?php echo "$r[nama_item]"; ?></td>
                                      <td id="satuan<?php echo $r['kode_item'];?>"><?php echo "$r[satuan]"; ?></td>
                                      <td id="qty<?php echo $r['kode_item'];?>"><?php echo "$r[qty]"; ?></td>
                                      <td id="id_suplier<?php echo $r['kode_item'];?>"><?php echo "$r[nama_suplier]"; ?></td>
                                      <td id="price<?php echo $r['kode_item'];?>"><?php echo "$r[price]"; ?></td>

                                      <td>
                                         <a href="javascript:void(0)" id="edit_button<?php echo $r['kode_item'];?>"  onclick="edit_item('<?php echo $r['kode_item'];?>');"> <i class="icon-pencil text-info"></i>  </a>
                                          <input type='button' class="btn btn-success" id="save_button<?php echo $r['kode_item'];?>" value="save" onclick="save_row('<?php echo $r['kode_item'];?>');" style="display:none;">
                                          <!-- <a href="javascript:void(0)" id="delete_button<?php echo $r['kode_item'];?>" onclick="delete_row('<?php echo $r['kode_item'];?>');"><i class="icon-trash"></i></a> -->

                                      </td>
                                  </tr>
                                  <?php
                                    }
                                    ?>
                              </tbody>

                          </table>

                        </div>

                      </div>
                          <!--  -->


                          </div>
