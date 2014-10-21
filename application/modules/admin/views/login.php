<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <div><?php 
                        if(!$this->session->flashdata('loginerror')){
                            echo $this->session->flashdata('loginerror');
                        }
                        ?></div>
                        <form role="form" name="loginform" id="loginform" method="post" action="<?php echo base_url(); ?>admin/login/dologin">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control required" placeholder="E-mail" name="email" id="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control required" placeholder="Password" name="password" id="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block" id="loginsubmit">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>