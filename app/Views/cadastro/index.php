
<section class="container">
    <aside class="row">
        <div class="col-lg-5 col-md-5 col-sm-5" id="div_cadastro">
            <h3 class="form-login-heading">Cadastro no Sistema</h3>
            <form class="form-login" id="" action="/cadastrar" method="post">
                <div class="form-group">
                    <input class="form-control input-sm" placeholder="Digite seu Nome Completo" name="nome" type="nome" value="<?php echo isset($this->view->retorno['nome']) ? $this->view->retorno['nome'] : ""; ?>"/> 
                </div>	
                <div class="form-group">
                    <input class="form-control input-sm" placeholder="Digite seu E-mail" name="email" type="email" value="<?php echo isset($this->view->retorno['email']) ? $this->view->retorno['email'] : ""; ?>"/> 
                </div>	
                <div class="form-group">
                    <input class="form-control input-sm" placeholder="Digite sua Senha" name="senha" type="password" value="<?php echo isset($this->view->retorno['senha']) ? $this->view->retorno['senha'] : ""; ?>"/> 
                </div>	
                <div class="form-group">
                    <input class="btn btn-default" type="submit" value="Salvar" />
                    <a class="btn btn-default" href="/home">Logar</a>
                </div>	
                <div class="form-group" id="div_erro_login">
                    <?php echo isset($this->view->cadastro) ? $this->view->cadastro : ""; ?> 
                    <?php if (isset($this->view->retorno)): ?>
                    <?php echo $this->view->retorno['erroNome']; ?><br/>
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