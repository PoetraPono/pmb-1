<div class="section">
            <div class="container">                 

                <?php
                //form data
                $attributes = array('class' => 'form-horizontal', 'id' => '');
                //form validation
                echo validation_errors();
      
                echo form_open('login/validate_credentials', $attributes);
                ?>

                <div class="row" style="margin-top:20px">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                        <form role="form">
                            <fieldset>
                                <h2>Punya Akun? <small>silahkan masuk</small></h2>
                                <hr class="colorgraph">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required="required">
                                </div>
                                <span class="button-checkbox">
                                    <button type="button" class="btn" data-color="info">Ingatkan saya</button>
                                    <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
                                    <a href="lupa-password.html" class="btn btn-link pull-right">Lupa Password?</a>
                                </span>
                                <br>
                                <?php
                                if(isset($message_error) && $message_error){
                                    echo '<br>';
                                    echo '<div class="alert alert-danger">';
                                    echo '<a class="close" data-dismiss="alert">×</a>';
                                    echo '<strong>Email atau Password Salah! Silahkan ulangi kembali</strong>';
                                    echo '</div>';             
                                    }
                                ?>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Masuk">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <?php echo form_close(); ?>

                </div>
        </div>