{*##########################Modal login###############################################*}
<div id="modalLogin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <img src="{$BASE_PATH}images/key_login.png" alt="Login" style="float:left">
        <h3 id="loginModalLabel">{#login#}</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" id="login-form" method="POST" action="{$BASE_PATH}{$LANGUAGE}/ajax/login">
            <div id="login-messages"></div>
            <div class="control-group">
                <label class="control-label" for="email">Email: </label>
                <div class="controls">
                    <input type="text" class="input-medium" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password" >{#password#}</label>
                <div class="controls">
                    <input type="password" class="input-medium" name="password" id="password" placeholder="{#password#}">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" name="remember_ckb" value="on">{#remember_me#}
                    </label>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" id="login-button" class="btn btn-success">{#login#}</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
{*##########################End of Modal login###############################################*}

{*##########################Modal register###############################################*}
<div id="modalRegister" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <img src="{$BASE_PATH}images/user_friend.png" alt="Register" style="float:left">
        <h3 id="registerModalLabel">{#register#}</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" id="register-form" action="{$BASE_PATH}{$LANGUAGE}/ajax/register" method="POST">
            <div id="register-messages"></div>
            <div class="control-group">
                <label class="control-label" for="first_name">{#first_name#}:</label>
                <div class="controls">
                    <input type="text" class="input-medium" id="first_name" name="first_name" placeholder="{#first_name#}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="last_name">{#last_name#}:</label>
                <div class="controls">
                    <input type="text" class="input-medium" id="last_name" name="last_name" placeholder="{#last_name#}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="email2">Email:</label>
                <div class="controls">
                    <input type="text" class="input-medium" id="email2" name="email" placeholder="Email">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="password1">{#password#}:</label>
                <div class="controls">
                    <input type="password" class="input-medium" id="password1" name="password_1" placeholder="{#password#}">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="re_password">{#password#}:</label>
                <div class="controls">
                    <input type="password" class="input-medium" id="re_password" name="password_2" placeholder="{#password#}">
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button type="submit"  class="btn btn-success">Trimite</button>
                </div>
            </div>

        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

    </div>
</div>
{*##########################End of Modal register###############################################*}

{*##########################Modal recovery password###############################################*}
<div id="recoveryPassword" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="recoveryModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <img src="{$BASE_PATH}images/bonus.png" alt="Register" style="float:left">
        <h3 id="recoveryModalLabel">{#recovery_password#}</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" id="recovery-form" method="POST" action="{$BASE_PATH}{$LANGUAGE}/ajax/login">
            <div id="recovery-messages"></div>
            <div class="control-group">
                <label class="control-label" for="recovery_email">Email: </label>
                <div class="controls">
                    <input type="text" class="input-medium" id="recovery_email" name="email" placeholder="Email">
                </div>
            </div>


            <div class="control-group">
                <div class="controls">
                    <button type="submit" id="login-buttonr" class="btn btn-success">{#recovery_password#}</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
{*##########################End of Modal recovery###############################################*}