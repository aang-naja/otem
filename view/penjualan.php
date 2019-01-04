<?php
     if ($_POST['menu']) {
       mysqli_query($con,"insert into orders (id_menu,username,date,qty) values ('$_POST[menu]','$_SESSION[user_session]','$datetime','$_POST[qty]') ");
       echo "<script type='text/javascript'> window.location.href = './penjualan.aspx' </script>";
     }
     if($_GET['act'] == 'proses'){
       mysqli_query($con, "update orders set clear='Y'");
       echo "<script type='text/javascript'> window.location.href = './penjualan.aspx' </script>";
     }

 ?>
 <script src="ajax/modify.penjualan.js"></script>
 <!-- <script src="ajax/suplier.record.js"></script> -->
 <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-screen-desktop"></i></h3>
                                            <p class="text-muted">Cashier</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-primary"><?php echo "$_SESSION[user_session]"; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-note"></i></h3>
                                            <p class="text-muted">Date</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-cyan"><?php echo "".tanggal_indo($date).""; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-doc"></i></h3>
                                            <p class="text-muted">Sub Cash Cashier Today</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-purple">  <?php echo "".khastoday($con,$tanggal).""; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">All PROJECTS</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-success">431</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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


                                   <td><select name='menu' class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                    <option>Select</option>
                                    <?php
                                      $a=mysqli_query($con, "SELECT * from kategori_menu");
                                      while ($r=mysqli_fetch_array($a)) {

                                        echo "  <optgroup label='$r[nama_kategori_menu]'>";
                                          $c=mysqli_query($con, "select * from menu where id_kategori_menu='$r[id_kategori_menu]'");
                                          while ($d=mysqli_fetch_array($c)) {
                                              echo "<option value='$d[id_menu]'>$d[name]</option>";
                                          }
                                          echo "</optgroup>";

                                      }
                                     ?>


                                </select>
</td>
                                  <td><input type="text" name="qty" class="form-control" value=""></td>

                                  <td><input type="submit" name="save" class="btn btn-info" value="save"></td>
                                </tr>
                                </form>
                              </tbody>
                            </table>

                          </div>
                      </div>

                    <div class="card">
                        <div class="card-body">
                          <label for="">KERANJANG BELANJA </label>
                          <div class="table-responsive">
                                     <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">

                            <thead>
                              <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price </th>
                                <th>QTY </th>

                                <th>Action </th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            $t=mysqli_query($con, "select * from orders,menu where menu.id_menu=orders.id_menu and orders.clear='N'");
                            while ($g=mysqli_fetch_array($t)) {
                            ?>
                            <tr id="row<?php echo $g['id_order'];?>">
                                <td><a href="javascript:void(0)" id="delete_button<?php echo $g['id_order'];?>" onclick="delete_row('<?php echo $g['id_order'];?>');"><i class="icon-trash"></i></a></td>
                                <td id="name<?php echo $g['id_order'];?>"><?php echo "$g[name]"; ?>  </td>
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
