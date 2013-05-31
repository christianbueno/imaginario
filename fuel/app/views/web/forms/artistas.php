<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO > Fale conosco > Artistas</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
    <?php echo Asset::js('analytics.js'); ?>
</head>
<body class="artistas">
    <div id="vignette" class="container-fluid">     

        <a href="/" id="logo" class="offset2"></a>
        <span class="Aviso"><i class="icon-warning-sign icon-white"></i> Portal em Desenvolvimento</span>
        <div class="texto-wrapper">
        <h1>Coletivos & Artistas</h1>
        <p>Se você é um artista ou representa algum coletivo, e gostaria de fazer parte ou descobrir como o IMAGINA RIO ajuda a divulgar você, preencha o formulário abaixo, e nós entraremos em contato com você diretamente.</p>
			<script src="https://ky108.infusionsoft.com/app/webTracking/getTrackingCode?trackingId=4f04c36b6b1db8ad14a88bb9450b4899" type="text/javascript">
			</script>
			<div class="formContainer">
			<form accept-charset="UTF-8" action="https://ky108.infusionsoft.com/app/form/process/bc82c6b497f81af8960c2e3ddb61e95f" class="infusion-form" method="POST" name="Artista/Coletivo" onsubmit="var form = document.forms[0];
			var resolution = document.createElement('input');
			resolution.setAttribute('id', 'screenResolution');
			resolution.setAttribute('type', 'hidden');
			resolution.setAttribute('name', 'screenResolution');
			var resolutionString = screen.width + 'x' + screen.height;
			resolution.setAttribute('value', resolutionString);
			form.appendChild(resolution);
			var pluginString = '';
			if (window.ActiveXObject) {
			var activeXNames = {'AcroPDF.PDF':'Adobe Reader',
			'ShockwaveFlash.ShockwaveFlash':'Flash',
			'QuickTime.QuickTime':'Quick Time',
			'SWCtl':'Shockwave',
			'WMPLayer.OCX':'Windows Media Player',
			'AgControl.AgControl':'Silverlight'};
			var plugin = null;
			for (var activeKey in activeXNames) {
			try {
			    plugin = null;
			    plugin = new ActiveXObject(activeKey);
			} catch (e) {
			    // do nothing, the plugin is not installed
			}
			pluginString += activeXNames[activeKey] + ',';
			}
			var realPlayerNames = ['rmockx.RealPlayer G2 Control',
			'rmocx.RealPlayer G2 Control.1',
			'RealPlayer.RealPlayer(tm) ActiveX Control (32-bit)',
			'RealVideo.RealVideo(tm) ActiveX Control (32-bit)',
			'RealPlayer'];
			for (var index = 0; index &lt; realPlayerNames.length; index++) {
			try {
			    plugin = new ActiveXObject(realPlayerNames[index]);
			} catch (e) {
			    continue;
			}
			if (plugin) {
			    break;
			}
			}
			if (plugin) {
			pluginString += 'RealPlayer,';
			}
			} else {
			for (var i = 0; i &lt; navigator.plugins.length; i++) {
			pluginString += navigator.plugins[i].name + ',';
			}
			}
			pluginString = pluginString.substring(0, pluginString.lastIndexOf(','));
			var plugins = document.createElement('input');
			plugins.setAttribute('id', 'pluginList');
			plugins.setAttribute('type', 'hidden');
			plugins.setAttribute('name', 'pluginList');
			plugins.setAttribute('value', pluginString);
			form.appendChild(plugins);
			var java = navigator.javaEnabled();
			var javaEnabled = document.createElement('input');
			javaEnabled.setAttribute('id', 'javaEnabled');
			javaEnabled.setAttribute('type', 'hidden');
			javaEnabled.setAttribute('name', 'javaEnabled');
			javaEnabled.setAttribute('value', java);
			form.appendChild(javaEnabled);">
			<input name="inf_form_xid" type="hidden" value="bc82c6b497f81af8960c2e3ddb61e95f" /><input name="inf_form_name" type="hidden" value="Artista/Coletivo" /><input name="infusionsoft_version" type="hidden" value="1.28.7.17" />

			<div class="text" id="webformErrors" name="errorContent">
			</div>
			<div>
			<label for="inf_field_FirstName">Nome *</label>
			<input class="infusion-field-input-container" id="inf_field_FirstName" name="inf_field_FirstName" type="text" />
			<label for="inf_field_LastName">Nome (Arista/Coletivo) *</label>
			<input class="infusion-field-input-container" id="inf_field_LastName" name="inf_field_LastName" type="text" />
			</div>
			<div>
			<label for="inf_field_Email">Email *</label>
			<input class="infusion-field-input-container" id="inf_field_Email" name="inf_field_Email" type="text" />
			</div>
			<div>
			<label for="inf_field_Phone1">Telefone *</label>
			<input class="infusion-field-input-container" id="inf_field_Phone1" name="inf_field_Phone1" type="text" />
			</div>
			<div>
			<label for="inf_field_StreetAddress1">Endere&ccedil;o *</label>
			<input class="infusion-field-input-container" id="inf_field_StreetAddress1" name="inf_field_StreetAddress1" type="text" />
			</div>
			<div>
			<label for="inf_custom_Site">Site</label>
			<input class="infusion-field-input-container" id="inf_custom_Site" name="inf_custom_Site" type="text" />
			</div>
			<div>
			<label for="inf_custom_Categoria">Categoria *</label>
			<input class="infusion-field-input-container" id="inf_custom_Categoria" name="inf_custom_Categoria" type="text" />
			</div>
			<div>
			<label for="inf_custom_Descricao">Descri&ccedil;&atilde;o *</label>
			<textarea  class="infusion-field-input-container contDescr" id="inf_custom_Descricao" name="inf_custom_Descricao" type="text"></textarea>
			</div>
			<div>
			<div class="infusion-captcha" style="-moz-border-radius:10px; background-color:#CCCCCC; border-radius:10px; border: 1px solid #000000; color:#000000; margin-left:auto; margin-right:auto">
			<div>
			<img alt="captcha" border="0px" name="captcha" onclick="reloadJcaptcha();" src="https://ky108.infusionsoft.com/Jcaptcha/img.jsp" title="If you can't read the image, click it to get another one." />
			<script type="text/javascript">
			function reloadJcaptcha() {var now = new Date();if (document.images) {document.images.captcha.src = 'https://ky108.infusionsoft.com/Jcaptcha/img.jsp?reload=' + now}}
			</script>
			</div>
			<div>
			<label for="captcha.typed">Copie c&oacute;digo acima:</label>
			</div>
			<div>
			<input class="infusion-field-input-container" id="captcha.typed" name="captcha.typed" type="text" />
			</div>
			</div>
			</div>
			<div>
			<div style="height:15px; line-height:15px">
			&nbsp;
			</div>
			</div>
			<div>
			<div class="infusion-submit" style="text-align:center">
			<button style="" class="btn btn-primary" type="submit" value="Enviar">Enviar</button>
			</div>
			</div>
			</form>
			</div>
     
        </div>

        <?php echo render('modules/menu'); ?>
    </div>
    <footer class="copyFooter">
        <a href="/copyright">Copyright</a> | <a href="/politicas-de-privacidade">Política de Privacidade</a> | <a href="/anti-spam">Anti-Spam</a><br/>
        &copy; Imagina: Rio 2013 - Todos os direitos reservados. | Rua Humaitá, 58 - Casa 2 - Humaitá<br/>
        Rio de Janeiro, RJ Brasil 22261-001 | <a href="mailto:contato@imaginario.etc.br">contato@imaginario.etc.br</a><br/>
        <a href="http://www.babelteam.com/pt">Babel-Team – Marketing & Vendas Automatizadas</a>
    </footer>
<?php echo Asset::js('jquery-1.8.3.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>