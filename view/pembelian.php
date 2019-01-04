 <?php
     if ($_POST['item']) {
       mysqli_query($con,"insert into orders (kode_item,username,date,qty,transaksi) values ('$_POST[item]','$_SESSION[user_session]','$datetime','$_POST[qty]','penjualan') ");
       echo "<script type='text/javascript'> window.location.href = './pembelian.aspx' </script>";
     }
     if($_GET['act'] == 'proses'){
       mysqli_query($con, "update orders set clear='Y' where transaksi='penjualan'");
       echo "<script type='text/javascript'> window.location.href = './pembelian.aspx' </script>";
     }

 ?>
 <script src="ajax/modify.penjualan.js"></script>
 <!-- <script src="ajax/suplier.record.js"></script> -->


                  <div class="col-lg-8 col-md-12">
                      <div class="card">
                          <div class="card-body">
                            <table class="table table-responsive">

                              <tr>
                                <th>Menu</th>
                                <th width="20%">QTY</th>

                                <th></th>
                              </tr>
                              <tbody>
                                <tr>
                                  <form class="" action="" method="post">


                                   <td><select name='item' class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                    <option>Select</option>
                                    <?php
                                      $a=mysqli_query($con, "SELECT * from suplier  ");
                                      while ($r=mysqli_fetch_array($a)) {

                                        echo "  <optgroup label='$r[nama_suplier]'>";
                                          $c=mysqli_query($con, "select * from item where id_suplier='$r[id_suplier]'");
                                          while ($d=mysqli_fetch_array($c)) {
                                              echo "<option value='$d[kode_item]'>$d[nama_item]</option>";
                                          }
                                          echo "</optgroup>";

                                      }
                                     ?>


                                </select>
</td>
                                  <td><input type="number" name="qty" class="form-control" value=""></td>

                                  <td><input type="submit" name="save" class="btn btn-info" value="save"></td>
                                </tr>
                                </form>
                              </tbody>
                            </table>

                          </div>
                      </div>

                    <div class="card">
                        <div class="card-body">
                          <label for=""> Invoice Pembelian </label>
                          <div class="table-responsive">
                                     <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">

                            <thead>
                              <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Suplier</th>
                                <th>Price </th>
                                <th>QTY </th>

                                <th>Action </th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            $t=mysqli_query($con, "select * from orders,item where item.kode_item=orders.kode_item and orders.clear='N'");
                            while ($g=mysqli_fetch_array($t)) {
                            ?>
                            <tr id="row<?php echo $g['id_order'];?>">
                                <td><a href="javascript:void(0)" id="delete_button<?php echo $g['id_order'];?>" onclick="delete_row('<?php echo $g['id_order'];?>');"><i class="icon-trash"></i></a></td>
                                <td id="name<?php echo $g['id_order'];?>"><?php echo "$g[nama_item]"; ?>  </td>
                                <td id="price<?php echo $g['id_order'];?>">Rp. <?php echo "".number_format($g['price']).""; ?></td>
                                <td id="qty<?php echo $g['id_order'];?>"><?php echo "$g[qty]"; ?></td>

                                <td>
                                   <a href="javascript:void(0)" id="edit_button<?php echo $g['id_order'];?>"  onclick="edit_row('<?php echo $g['id_order'];?>');"> <i class="icon-pencil text-info"></i>  </a>
                                    <input type='button' class="btn btn-success" id="save_button<?php echo $g['id_order'];?>" value="save" onclick="save_row('<?php echo $g['id_order'];?>');" style="display:none;">
                                    <!-- <a href="javascript:void(0)" id="delete_button<?php echo $r['id_suplier'];?>" onclick="delete_row('<?php echo $r['id_suplier'];?>');"><i class="icon-trash"></i></a> -->

                                </td>
                            </tr>
                            <?php
                            }

                             ?>
                             <tr>
                               <td></td><td> <strong class="text-info"> Sub total (Rp)</strong></td><td> <b class="text-success" id="totalchart"></b> </td><td></td>
                             </tr>

                             <tr>
                               <td></td><td> <strong class="text-info"> Cash (Rp) </strong></td>
                               <td>
                                  <form id="loginform" action="proses.html" method="post">
                                  <input type="number" class="form-control" name="pembayaran" value="" min="0" step="0.01" data-number-to-fixed="0" data-number-stepfactor="100" class="currency" id="c1" />


                                 </td><td> <button id="submit" class="btn btn-info">Submit</button> </td>  </form>
                             </tr>


                             <tr>
                               <td></td><td> <strong class="text-info"> Kembali  (Rp) </strong></td><td>    <b id="info"> </b> </td><td>  </td>
                             </tr>



                            </tbody>
                          </table>

                        </diV>
                        </diV>
                      </div>
                  </div>
                  <script type="text/javascript">
                  webshims.setOptions('forms-ext', {
                        replaceUI: 'auto',
                        types: 'number'
                      });
                      webshims.polyfill('forms forms-ext');
                  </script>
                   <script src="library/assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>

                  <script>
                      jQuery(document).ready(function() {
                          // Switchery
                          var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
                          $('.js-switch').each(function() {
                              new Switchery($(this)[0], $(this).data());
                          });
                          // For select 2
                          $(".select2").select2();
                          $('.selectpicker').selectpicker();
                          //Bootstrap-TouchSpin
                          $(".vertical-spin").TouchSpin({
                              verticalbuttons: true,
                              verticalupclass: 'ti-plus',
                              verticaldownclass: 'ti-minus'
                          });
                          var vspinTrue = $(".vertical-spin").TouchSpin({
                              verticalbuttons: true
                          });
                          if (vspinTrue) {
                              $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
                          }
                          $("input[name='tch1']").TouchSpin({
                              min: 0,
                              max: 100,
                              step: 0.1,
                              decimals: 2,
                              boostat: 5,
                              maxboostedstep: 10,
                              postfix: '%'
                          });
                          $("input[name='tch2']").TouchSpin({
                              min: -1000000000,
                              max: 1000000000,
                              stepinterval: 50,
                              maxboostedstep: 10000000,
                              prefix: '$'
                          });
                          $("input[name='tch3']").TouchSpin();
                          $("input[name='tch3_22']").TouchSpin({
                              initval: 40
                          });
                          $("input[name='tch5']").TouchSpin({
                              prefix: "pre",
                              postfix: "post"
                          });
                          // For multiselect
                          $('#pre-selected-options').multiSelect();
                          $('#optgroup').multiSelect({
                              selectableOptgroup: true
                          });
                          $('#public-methods').multiSelect();
                          $('#select-all').click(function() {
                              $('#public-methods').multiSelect('select_all');
                              return false;
                          });
                          $('#deselect-all').click(function() {
                              $('#public-methods').multiSelect('deselect_all');
                              return false;
                          });
                          $('#refresh').on('click', function() {
                              $('#public-methods').multiSelect('refresh');
                              return false;
                          });
                          $('#add-option').on('click', function() {
                              $('#public-methods').multiSelect('addOption', {
                                  value: 42,
                                  text: 'test 42',
                                  index: 0
                              });
                              return false;
                          });
                          $(".ajax").select2({
                              ajax: {
                                  url: "https://api.github.com/search/repositories",
                                  dataType: 'json',
                                  delay: 250,
                                  data: function(params) {
                                      return {
                                          q: params.term, // search term
                                          page: params.page
                                      };
                                  },
                                  processResults: function(data, params) {
                                      // parse the results into the format expected by Select2
                                      // since we are using custom formatting functions we do not need to
                                      // alter the remote JSON data, except to indicate that infinite
                                      // scrolling can be used
                                      params.page = params.page || 1;
                                      return {
                                          results: data.items,
                                          pagination: {
                                              more: (params.page * 30) < data.total_count
                                          }
                                      };
                                  },
                                  cache: true
                              },
                              escapeMarkup: function(markup) {
                                  return markup;
                              }, // let our custom formatter work
                              minimumInputLength: 1,
                              templateResult: formatRepo, // omitted for brevity, see the source of this page
                              templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
                          });
                      });
                      </script>
