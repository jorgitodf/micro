
<section class="container">
    <aside class="row">
        <div class="col-lg-4 col-md-4 col-sm-4" id="div_login">
            <h3 class="form-login-heading">Login no Sistema</h3>
            <form class="form-login" id="" action="/login" method="post">    
                <div class="form-group">
                    <input class="form-control input-sm" placeholder="Digite seu E-mail" name="email" type="email" value="<?php echo isset($this->view->email) ? $this->view->email : ""; ?>"/> 
                </div>	
                <div class="form-group">
                    <input class="form-control input-sm" placeholder="Digite sua Senha" name="senha" type="password" value="<?php echo isset($this->view->senha) ? $this->view->senha : ""; ?>"/> 
                </div>	
                <div class="form-group">
                    <input class="btn btn-default" type="submit" value="Entrar" />
                    <a class="btn btn-default" href="/cadastrar">Cadastrar</a>
                </div>	
                <div class="form-group" id="div_erro_login">
                <?php echo isset($this->view->erroEmail) ? $this->view->erroEmail : ""; ?><br/>
                <?php echo isset($this->view->erroSenha) ? $this->view->erroSenha : ""; ?>
                <?php echo isset($this->view->erro) ? $this->view->erro : ""; ?>
                </div>	
            </form>
        </div>
    </aside>
</section>

