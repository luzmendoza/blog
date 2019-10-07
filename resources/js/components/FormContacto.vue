<template>
	<div>
		<!--el mensae solo se muestra si la variable sent es verdadera-->
		<p v-if="sent">Tu mensaje ha sido recibido, te contactaremos pronto</p>
		<!--previene el envio y ejecuta el metodo que le decimos, el metodo se crea abajo en script-->
		  <form v-else @submit.prevent="submit"> <!--si ya se envio no se muestra el formuario-->
          <div class="control-group form-group">
            <div class="controls">
              <label>Nombre Completo:</label>
              <input v-model="form.name" type="text" class="form-control" id="name" required data-validation-required-message="Por favor ingresa tu nombre.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Telefono:</label>
              <input v-model="form.phone" type="tel" class="form-control" id="phone" required maxlength="10" data-validation-required-message="Por favor ingresa tu número de telefono.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input v-model="form.email" type="email" class="form-control" id="email" required data-validation-required-message="Por favor ingresa tu correo electronico.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Tu Mensaje:</label>
              <textarea v-model="form.message" rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Por favor ingresa tu mensaje" maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button :disabled="working" class="btn btn-primary" id="sendMessageButton">
          	<span v-if="working">Enviando...</span>
          	<span v-else>Enviar mensaje</span>
      	  </button>
        </form>
        
	</div>
</template>

<script type="text/javascript">
	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
	var url = baseUrl + '/public/api/messages';

	export default{
		data(){
			return{
				sent: false,
				working: false,
				form: {
					name: '',
					phone: '',
					email: '',
					message: ''
				}
			}
		},
		methods: {
			submit(){
				this.working = true;//se desabilita el boton enviar
				//llamado ajax
				axios.post(url, this.form)
					.then(resp => {
						console.log(resp);
						this.sent = true;
						this.working = false;
					})
					.catch(errors => {
						this.sent = false;
						this.working = false;
					})
			}
		}
	};
</script>