<?php
  if($_POST){
    mysqli_query($con, "update web_master set title='$_POST[title]',
                                              address='$_POST[address]',
                                              phone='$_POST[phone]',
                                              website='$_POST[website]',
                                              instagram='$_POST[instagram]'
                                              where id_plan='1'
                                              ");

  }
  $r=mysqli_fetch_array(mysqli_query($con, "select * from web_master where id_plan='1'"));
 ?>
<div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Web master</h4>
                                <!-- <h6 class="card-subtitle">Just add <code>floating-labels</code> class to the form.</h6> -->
                                <form class="floating-labels m-t-40" action="" method="post">
                                    <div class="form-group m-b-40">
                                        <input type="text" name="title" value="<?php echo "$r[title]"; ?>" class="form-control" id="input1">
                                        <span class="bar"></span>
                                        <label for="input1">Tittle </label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input type="text" name="address" value="<?php echo "$r[address]"; ?>"  class="form-control" id="input2">
                                        <span class="bar"></span>
                                        <label for="input2">Address</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input type="text" name="phone" value="<?php echo "$r[phone]"; ?>"   class="form-control" id="input4">
                                        <span class="bar"></span>
                                        <label for="input3">phone</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input type="text" name="website" value="<?php echo "$r[website]"; ?>"  class="form-control" id="input5">
                                        <span class="bar"></span>
                                        <label for="input3">Website</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input type="text" name="instagram" value="<?php echo "$r[instagram]"; ?>"  class="form-control" id="input6">
                                        <span class="bar"></span>
                                        <label for="input3">Instagram</label>
                                    </div>
                                    <button type="submit" class="btn btn-info" name="button">Submit</button>
                                </form>
                            </div>
                        </div>
                      </div>
</div>
