function validar(){
    var descricao = document.getElementById('descricao');
    if(descricao.value == ""){
        alert('Preencha a descrição da despesa!');
        document.formulario.descricao.focus();
        return false;
    } 
    var valor = document.getElementById('valor');
    if(valor.value == ""){
        alert('Preencha o valor da despesa!');
        document.formulario.valor.focus();
        return false;
    }
    var dataForm = document.getElementById('date');
    if(dataForm.value == ""){
        alert('Preencha a data da despesa!');
        document.formulario.date.focus();
        return false;
    }

    var dataAtual = new Date();
    var partesData = dataForm.value.split("/",3);
    var data = new Date(partesData[2], partesData[1]-1, partesData[0]);
    if(data > dataAtual){
        alert('Preencha a data correta!');
        document.formulario.date.focus();
        return false;
    }
    partesData = dataForm.value.split("/",3);
    data = partesData[2] + "-" + partesData[1] + "-" + partesData[0];
    dataForm.value = data;

    return true;
}

window.onload = function() {
    $('#valor').mask("###0.00", {reverse: true});

    $('#date').mask("00/00/0000", {reverse: false});
}