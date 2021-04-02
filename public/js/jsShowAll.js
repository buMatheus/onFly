function confirmar(){
    var confirmacao = confirm("Tem certeza que deseja excluir a despesa selecionada?");
    if (confirmacao==true){
        return true;
    }else{
        return false;
    }
}