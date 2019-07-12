<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p class="mr-5"><small>Configuração Geral</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Funções Externas</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>Funções Internas</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Comlpementos</small></p>
            </div>
             <div class="stepwizard-step col-xs-3"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Controlles</small></p>
            </div>
        </div>
    </div>
    
    <form role="form" method="POST" action="<?php echo base_url(); ?>">
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title">Configurações Gerais</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Diretório das planilha</label>
                    <input name="diretorio_planilha" maxlength="200" type="text" required="required" class="form-control" placeholder="Diretório das Planilhas" />
                </div>
                <div class="form-group">
                    <label class="control-label">Nome do Sistema</label>
                    <input name="nome_sistema" maxlength="200" type="text" required="required" class="form-control" placeholder="Nome do Sistema" />
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Avançar</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-heading">
                 <h3 class="panel-title">Funções Externas</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Habilitar envio de SMS? </label><br>
                 <input maxlength="100" type="checkbox" name="sendSMS" />
                 Habilitar enviar SMS aos possíveis números de celular identificados, através da API de envio:
                </div>

                <div class="form-group">
                    <label class="control-label">Habilitar envio de Whattsapp? </label><br>
                 <input maxlength="100" type="checkbox" name="sendWhattsapp" />
                 Habilitar envio de Whattsapp, a partir de uma aba logada externa.
                </div>

                <div class="form-group">
                    <label class="control-label">Habilitar envio de Email? </label><br>
                 <input maxlength="100" type="checkbox" name="sendemail" />
                 Habilitar envio de Email's aos possíveis emails identificados, através do Host:
                </div>

                <button class="btn btn-primary nextBtn pull-right" type="button">Avançar</button>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
                 <h3 class="panel-title">Funções Internas</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Conectar a um Banco de Dados</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Mapa Set</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Avançar</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-4">
            <div class="panel-heading">
                 <h3 class="panel-title">Controlles</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Controllar acesso via login</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Usuários</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                </div>
                <button class="btn btn-success pull-right" type="submit">Finalizar!</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-success').addClass('btn-default');
                $item.addClass('btn-success');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-success').trigger('click');
    });
</script>