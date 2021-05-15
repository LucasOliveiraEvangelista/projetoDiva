function masc_cpf(){
	var cpf= document.getElementById('cpf')
	if(cpf.value.length == 3 || cpf.value.length==7){
		cpf.value += "."
	}else if(cpf.value.length == 11){
		cpf.value += "-"
		}
}
		
function masc_cep(){
	var cep= document.getElementById('cep')
	if(cep.value.length == 5){
		cep.value += "-"
	}
}

function masc_telefone(){
	var telefone = document.getElementById('telefone')
		if(telefone.value.length == 1)
			telefone.value = "(+55) " + telefone.value 
		if(telefone.value.length == 12)
			telefone.value += "-";
}

