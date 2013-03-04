{{> HeaderLogin}}


<!-- Login wrapper begins -->
<div class="loginWrapper">
	<!-- Current user form -->
	<form action="/login/autenticar" method="post" id="login">
		<div class="loginPic">
			<a href="#" title="" id="avatarUser"><img src="{{ template.paths.images }}/userLogin2.png" alt="" /></a>
			<span id="welcomeToPanel">Bem-vindo ao painel!</span>
			<div class="loginActions">
				<div><a href="#" title="Alterar senha" class="logleft flip"></a></div>
				<div><a href="#" title="Recarregar página" class="logright"></a></div>
			</div>
		</div>

		<input type="text" name="email" placeholder="E-mail" class="loginEmail" />
		<input type="password" name="senha" placeholder="Senha" class="loginPassword" />

		<div class="logControl">
			<div class="memory"><input type="checkbox" checked="checked" class="check" id="remember1" /><label for="remember1">Continuar conectado</label></div>
			<input type="submit" name="submit" value="Login" class="buttonM bBlue" />
		</div>
	</form>

	<!-- New user form -->
	<form action="index.html" id="recover">
		<div class="loginPic">
			<a href="#" title=""><img src="{{ template.paths.images }}/userLogin2.png" alt="" /></a>
			<span id="welcomeToPanel">Recuperar senha</span>
			<div class="loginActions">
				<div><a href="#" title="Acessar o painel" class="logback flip"></a></div>
				<div><a href="#" title="Recarregar página" class="logright"></a></div>
			</div>
		</div>

		<input type="text" name="emailSenha" placeholder="Digite o e-mail" class="loginEmail" />

		<div class="logControl">
			<input type="submit" name="submit" value="Recuperar senha" class="buttonM bGreen" />
		</div>
	</form>
</div>

{{> FooterLogin}}