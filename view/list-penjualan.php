<script src="ajax/item.record.js"></script>

                    <div class="col-md-12">
                      <div class="card">
                          <div class="card-body">
                            <table class="table table-responsive">

                              <tr>

                                <th width="20%">From</th>
                                <th width="20%">Until</th>


                                <th></th>
                              </tr>
                              <tbody>
                                <tr>
                                  <form class="" action="" method="post">


                                  <td><input type="date" name="from" class="form-control" value="<?php echo "$date"; ?>"></td>
                                  <td><input type="date" name="until" class="form-control" value="<?php echo "$date"; ?>"></td>

                                  <td><input type="submit" name="save" class="btn btn-info" value="Cari"></td>
                                </tr>
                                </form>
                              </tbody>
                            </table>





                          </div>
                          </div>

                          <!--  -->
                          <div class="card">
                            <div class="card-body">

                          <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                              <thead>
                                  <tr>

                                      <th>Name</th>
                                      <th width="15%">Price</th>
                                      <th>QTY</th>
                                      <th>SUB</th>
                                      <th>date</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $from=$_POST['from'];
                                  $until=$_POST['until'];

                                  $p=mysqli_query($con, "select * from orders,menu where menu.id_menu=orders.id_menu and $from >= $until order by orders.id_order desc");
                                
                                while ($r=mysqli_fetch_array($p)) {


                                 ?>
                                  <tr id="row<?php echo $r['id_order'];?>">

                                      <td id="nama_item<?php echo $r['id_order'];?>"> <?php echo "$r[name]"; ?></td>
                                      <td id="satuan<?php echo $r['id_order'];?>" align="right"><?php echo "".number_format($r['price']).""; ?></td>
                                      <td id="qty<?php echo $r['id_order'];?>"><?php echo "$r[qty]"; ?></td>
                                      <td id="id_suplier<?php echo $r['id_order'];?>" align="right"><?php echo "".number_format($r['price']*$r['qty']).""; ?></td>
                                      <td id="price<?php echo $r['id_order'];?>"><?php echo "".$r['date'].""; ?></td>

                                      <td>
                                         <a href="javascript:void(0)" id="edit_button<?php echo $r['id_order'];?>"  onclick="edit_item('<?php echo $r['id_order'];?>');"> <i class="icon-pencil text-info"></i>  </a>
                                          <input type='button' class="btn btn-success" id="save_button<?php echo $r['id_order'];?>" value="save" onclick="save_row('<?php echo $r['id_order'];?>');" style="display:none;">
                                          <!-- <a href="javascript:void(0)" id="delete_button<?php echo $r['id_order'];?>" onclick="delete_row('<?php echo $r['id_order'];?>');"><i class="icon-trash"></i></a> -->

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
