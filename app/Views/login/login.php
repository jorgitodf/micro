
<section class="container">
    <aside class="row">
        <div class="col-lg-4 col-md-4 col-sm-4" id="div_login">
            <h3 class="form-login-heading">Login no Sistema</h3>
            <form class="form-login" id="" action="/login" method="post">    
                <div class="form-group">
                    <input class="form-control input-sm" placeholder="Digite seu E-mail" name="email" type="email" value="<?php echo isset($this->view->retorno['email']) ? $this->view->retorno['email'] : ""; ?>"/> 
                </div>	
                <div class="form-group">
                    <input class="form-control input-sm" placeholder="Digite sua Senha" name="senha" type="password" value="<?php echo isset($this->view->retorno['senha']) ? $this->view->retorno['senha'] : ""; ?>"/> 
                </div>	
                <div class="form-group">
                    <input class="btn btn-default" type="submit" value="Entrar" />
                    <a class="btn btn-default" href="/cadastrar">Cadastrar</a>
                </div>	
                <div class="form-group" id="div_erro_login">
                <?php if (isset($this->view->retorno)): ?>
                <?php echo $this->view->retorno['erroEmail']; ?><br/>
                <?php echo $this->view->retorno['erroSenha']; ?>
                <?php else: ?> 
                <?php echo ""; ?>    
                <?php endif; ?> 
                <?php if (isset($this->view->erro)): ?>
                <?php echo $this->view->erro['erroSemCadastro']; ?>
                <?php echo $this->view->erro['erroSenha']; ?>
                <?php else: ?> 
                <?php echo ""; ?>    
                <?php endif; ?> 
                </div>	
            </form>
        </div>
    </aside>
</section>

