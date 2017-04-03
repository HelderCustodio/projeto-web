function mudaFoto(foto){
	// alterar atributo src do elemento cujo id é icone
	document.getElementById("icone").src = foto;
}

function calc_total(){
	// recupera o valor da quantidade digitado pelo usuário 
	var qtde = document.getElementById('cQtde').value;
	// faz o cálculo
	total = qtde * 4000;
	// atribui para o campo total
	document.getElementById('cTotal').value = total;
}
