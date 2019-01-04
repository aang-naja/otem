<form class="form-horizontal form-material" id="loginform" action="signin.html" method="post">
    <h3 class="box-title m-b-20">Sign In</h3>

    <div id="info">

    </div>

    <div class="form-group ">
        <div class="col-xs-12">
            <input class="form-control" type="text" required="" name="email" placeholder="email"> </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control" type="password" required="" name="password" placeholder="Password"> </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
                <a href="javascript:void(0)" id="" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
            </div>
        </div>
    </div>
    <div class="form-group text-center">
        <div class="col-xs-12 p-b-20">
            <button class="btn btn-block btn-lg btn-info btn-rounded" id="submit">Log In</button>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
            <div class="social">
                <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
            </div>
        </div>
    </div>
    <div class="form-group m-b-0">
        <div class="col-sm-12 text-center">
            Don't have an account? <a href="javascript:void(0)" class="text-info m-l-5"><b>Sign Up</b></a>
        </div>
    </div>
</form>
