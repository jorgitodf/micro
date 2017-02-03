
<section class="container col-xs-12 col-lg-12 col-md-12 col-sm-12" id="section_login">
    <aside class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" id="div_login">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6" id="div_cadastrar">
                <h2>Quero me Cadastrar!</h2>
                <p><a href="/cadastrar" class="btn btn-primary btn-lg btn-block">
                   <span class="glyphicon glyphicon-envelope" id="gly_email"></span>&nbsp;&nbsp;Cadastrar Usando E-mail</a>
                </p>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6" id="div_cadastrado">
                <form class="form-login" id="" action="/login" method="post">
                    <h2>Já sou Cadastrado!</h2>
                    <div class="form-group">
                        <input class="form-control input-lg" name="email" type="email" placeholder="Insira seu E-mail" value="<?php echo isset($this->view->retorno['email']) ? $this->view->retorno['email'] : ""; ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" name="senha" type="password" placeholder="Insira sua Senha" value="<?php echo isset($this->view->retorno['senha']) ? $this->view->retorno['senha'] : ""; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg" id="btn_login_entrar">Entrar</button>
                    </div>
                    <div class="form-group" id="div_lembrar_senha">
                        <p><a href="/login/senha" class="">Esqueci Minha Senha</a></p>
                    </div>
                </form>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6" id="">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6" id="div_erro_login">
                <?php 
                    if (isset($this->view->retorno)) {
                        echo $this->view->retorno['erroEmail'];
                        echo $this->view->retorno['erroSenha'];
                    } else {
                        echo "";
                    }
                ?>
                <?php 
                    if (isset($this->view->erro)) {
                        echo $this->view->erro['erroSemCadastro'];
                        echo $this->view->erro['erroSenha'];
                    } else {
                        echo "";
                    }
                ?>
            </div>
        </div>
    </aside>
</section>

