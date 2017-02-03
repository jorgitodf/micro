
<section class="container container col-xs-12 col-lg-12 col-md-12 col-sm-12" id="section_cadastro_cliente">
    <aside class="row">
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" id="div_cadastro">
            <div class="panel panel-default" id="panel_cadastro_cliente_body">
                <form class="form-login" id="" action="/cadastrar" method="post">
                    <div class="panel-heading" id="panel_cadastro_cliente">Cadastro de Cliente</div>
                    <div class="panel-body"><br/>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input class="form-control input-group" placeholder="Digite seu Nome Completo" name="nome" type="text" value="<?php echo isset($this->view->retorno['nome']) ? $this->view->retorno['nome'] : ""; ?>"/> 
                        </div>	
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input class="form-control input-group" placeholder="Digite seu E-mail" name="email" type="email" value="<?php echo isset($this->view->retorno['email']) ? $this->view->retorno['email'] : ""; ?>"/> 
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input class="form-control input-group" placeholder="Digite sua Senha" name="senha" type="password" value="<?php echo isset($this->view->retorno['senha']) ? $this->view->retorno['senha'] : ""; ?>"/> 
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input class="form-control input-group" placeholder="Confirme sua Senha" name="senha_confirm" type="password" value="<?php echo isset($this->view->retorno['senha_confirm']) ? $this->view->retorno['senha_confirm'] : ""; ?>"/> 
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input class="form-control input-group" placeholder="Digite seu Telefone Celular" name="tel_celular" id="tel_celular" type="text" value="<?php echo isset($this->view->retorno['tel_celular']) ? $this->view->retorno['tel_celular'] : ""; ?>"/> 
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input class="form-control input-group" placeholder="Digite seu CPF" name="cpf" id="cpf" type="text" value="<?php echo isset($this->view->retorno['cpf']) ? $this->view->retorno['cpf'] : ""; ?>"/> 
                        </div>
                        <br/>
                        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4" id="div_botoes_cadas_cliente">
                            <button type="submit" class="btn btn-success btn-sm" id="btn_cad_cliente">Cadastrar</button>
                            <a class="btn btn-primary btn-sm" href="/home" id="btn_cad_cliente_logar">Logar</a>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6" id="div_erros_cadas_cliente">
                            <?php echo isset($this->view->cadastro) ? $this->view->cadastro : ""; ?>
                            <?php echo isset($this->view->retorno_senha) ? $this->view->retorno_senha : ""; ?>
                            <?php 
                                if (isset($this->view->retorno)) {
                                    echo $this->view->retorno['erroNome'];
                                    echo $this->view->retorno['erroEmail'];
                                    echo $this->view->retorno['erroSenha'];
                                    echo $this->view->retorno['erroSenha2'];
                                    echo $this->view->retorno['erroTelefone'];
                                    echo $this->view->retorno['erroCpf'];
                                } else {
                                    echo "";
                                }
                                if (isset($this->view->erro)) {
                                    echo $this->view->erro['erroSemCadastro'];
                                    echo $this->view->erro['erroSenha'];
                                } else {
                                    echo "";
                                }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </aside>
</section>