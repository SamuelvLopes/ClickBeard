function CadastraEspecialidade(){
let DescricaoEspecialidade=document.getElementById("DescricaoEspecialidade").value;
document.getElementById("DescricaoEspecialidade").value="";
    $.post('colaboradores/especialidade', {DescricaoEspecialidade:DescricaoEspecialidade}, function (retorno) {
        if (retorno != null) {

            console.log(retorno);

        } else {

            alert("houve uma falha.. tente novamente mais tarde");

        }

    
    });
}