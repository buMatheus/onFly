$('#valor').mask("###0.00", {reverse: true});
$('#date').mask("00/00/0000", {reverse: false});

/* validação de descrição
var vdescricao = function(){
    var descricao = document.getElementById('descricao');
    if(descricao.value == ""){
        alert('Preencha a descrição da despesa!');
        document.formulario.descricao.focus();
        return false;
    }
}
*/
/* Validação de valor
var vValor = function(){
    var valor = document.getElementById('valor');
    if(valor.value == ""){
        alert('Preencha o valor da despesa!');
        document.formulario.valor.focus();
        return false;
    }
}
*/
/* Validação de data
var vDate = function(){
    var dataForm = document.getElementById('date');
    var dataAtual = new Date();
    var partesData = dataForm.split("/");
    var data = new Date(partesData[2], partesData[1] - 1, partesData[0]);
    if(data > new Date())
    alert("maior");
    if(data > dataAtual){
        alert('Preencha a data correta!');
        document.formulario.date.focus();
        return false;
    }
}
*/
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
    console.log(dataForm);
    var dataAtual = new Date();
    console.log(dataAtual);
    var partesData = dataForm.value.split("/",3);
    console.log(partesData);
    var data = new Date(partesData[2], partesData[1]-1, partesData[0]);
    console.log(data);
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