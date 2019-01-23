/**
 * @author Matheus
 */
function validacaoForm(Formulario) {
	if(Formulario.NM_Prestador.values==""||Formulario.NM_Prestador.values==null||Formulario.NM_Prestador.value.lenght<3){
		alert("Por Favor, indique seu nome");
		Formulario.NM_Prestador.focus();
		return false;
	}
	if(Formulario.DS_Email.value.indexOf("@") == -1 ||
      Formulario.DS_Email.valueOf.indexOf(".") == -1 ||
      Formulario.DS_Email.value == "" ||
      Formulario.DS_Email.value == null) {
        alert("Por favor, indique um e-mail válido.");
        Formulario.email.focus();
        return false;
    }
 f(FrmPrestador.NM_Prestador.values	==	""||FrmPrestador.NM_Prestador.values==null||FrmPrestador.NM_Prestador.value.lenght <3){
		alert("Por Favor, indique seu nome");
		FrmPrestador.NM_Prestador.focus();
		return false;
	}
	if(FrmPrestador.DS_Email.value.indexOf("@") == -1 ||
      FrmPrestador.DS_Email.valueOf.indexOf(".") == -1 ||
      FrmPrestador.DS_Email.value == "" ||
      FrmPrestador.DS_Email.value == null) {
        alert("Por favor, indique um e-mail válido.");
        FrmPrestador.DS_Email.focus();
        return false;
    }