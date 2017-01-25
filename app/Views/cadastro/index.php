
<section class="container">
    <aside class="row">
        <div class="col-lg-5 col-md-5 col-sm-5" id="div_cadastro">
            <h3 class="form-login-heading">Cadastro no Sistema</h3>
            <form class="form-login" id="" action="/cadastrar" method="post">
                <div class="form-group">
                    <input class="form-control input-sm" placeholder="Digite seu Nome Completo" name="nome" type="nome" value="<?php echo isset($this->view->nome) ? $this->view->nome : ""; ?>"/> 
                </div>	
                <div class="form-group">
                    <input class="form-control input-sm" placeholder="Digite seu E-mail" name="email" type="email" value="<?php echo isset($this->view->email) ? $this->view->email : ""; ?>"/> 
                </div>	
                <div class="form-group">
                    <input class="form-control input-sm" placeholder="Digite sua Senha" name="senha" type="password" value="<?php echo isset($this->view->senha) ? $this->view->senha : ""; ?>"/> 
                </div>	
                <div class="form-group">
                    <input class="btn btn-default" type="submit" value="Salvar" />
                    <a class="btn btn-default" href="/home">Logar</a>
                </div>	
                <div class="form-group" id="div_erro_login">
                    <?php echo isset($this->view->cadastro) ? $this->view->cadastro : ""; ?>
                    <?php echo isset($this->view->erroNome) ? $this->view->erroNome : ""; ?><br>
                    <?php echo isset($this->view->erroEmail) ? $this->view->erroEmail : ""; ?><br>
                    <?php echo isset($this->view->erroSenha) ? $this->view->erroSenha : ""; ?>
                </div>	
            </form>
        </div>
    </aside>
</section>