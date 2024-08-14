<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Formulario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<!-- jQuery and JS bundle w/ Popper.js -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>

<!-- FORMULARIO DE CONTATO
================================================== -->
<div class="container">
<div class="jumbotron">
<div>
<svg width="200px" height="100px" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style=" display: block;
    margin-left: auto;
    margin-right: auto !important;">
  <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg>
<div>
    <h2 style="text-align: center;">FORMULÁRIO DE CONTATO</h2>
    <form class="form-horizontal" data-toggle="validator" name="ajax_form" id="ajax_form" method="post" autocomplete="off" action="email.php">
		<div class="form-group">
            <label class="control-label col-sm-2" for="txtnome"><i style="color:red; font-weight: bold">Email do Cliente:</i></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="txtnome" name="email_cliente" placeholder="Digite seu email aqui." required>
                            <div class="help-block with-errors"></div>
            </div>
        </div>
		<div class="form-group">
            <label class="control-label col-sm-2" for="txtnome"><i style="color:red; font-weight: bold">Senha do Email:</i></label>
            <div class="col-sm-7">
                <input type="password" class="form-control" id="txtnome" name="senha_email" placeholder="Digite a senha do email aqui." required>
                            <div class="help-block with-errors"></div>
            </div>
        </div>
				<div class="form-group">
            <label class="control-label col-sm-2" for="txtnome"><i style="color:red; font-weight: bold">qual smtp utilizar:</i></label>
            <div class="col-sm-7">
                <select class="form-select form-control" aria-label="Default select example" name="tipo" required>
				  <option value="1">1</option>
				  <option value="2">2</option>
				</select>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="txtnome">Nome:</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="txtnome" name="nome" placeholder="Digite seu nome aqui." required>
                            <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="txtemail">E-mail:</label>
            <div class="col-sm-7">
                <input type="email" class="form-control" id="txtemail" name="email" placeholder="Digite seu e-mail aqui."
                       data-error="Por favor, informe um e-mail correto." required>
                             <div class="help-block with-errors"></div>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="txttel">Telefone:</label>
            <div class="col-sm-7">
                <input type="tel" class="form-control" id="txttel" name="telefone" placeholder="Digite seu telefone." required>
                <span class="help-block">Mínimo de oito (8) digitos.</span>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Observações:</label>
            <div class="col-sm-7">
                <textarea class="form-control" rows="5" id="comment" name="observacoes" placeholder="Digite informações complementares." required></textarea>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div data-alerts="alerts" data-titles="{'success': '<em>success!</em>'}" data-ids="myid" data-fade="4000"></div>
                <button type="submit" id="warn-me" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-danger">Resetar</button>
            </div>
        </div>
    </form>
</div>
</div>

<!-- ============FINAL DO FORMULARIO DE CONIATO=============== -->




<!-- ============SCRIPTS PARA ENVIO VIA AJAX E MENSAGEM DE SUCESSO AO ENVIAR=============== -->


<script>

    $("#ajax_form").submit(function() {
        $(document).trigger("add-alerts", [
            {
                'message': "Mensagem enviada com sucesso.",
                'priority': 'success'
            }
        ]);
    });
</script>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#ajax_form').submit(function(){
            var dados = jQuery( this ).serialize();

            jQuery.ajax({
                type: "POST",
                data: dados,
                url: "email.php",
                success: function()
                {
                    document.ajax_form.reset();

                }
            });

            return false;
        });
    });
</script>
