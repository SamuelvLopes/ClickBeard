let especialidades="";
let especialidade = [];
let cores = ["primary","secondary","info","success","danger","warning"]

function MostrarEspecialidade(){
especialidades="";
let div="";
let c=0;
    for (var i = 0; i <especialidade.length; i++) {
        if(c==5){
            c=0;
        }
     
        div=div+'<span  class="badge badge-pill badge-lg bg-gradient-'+cores[c]+'">'+especialidade[i]+'</span>';
        document.getElementById("DivEspecialidade").innerHTML =div;
        c++;
        if(especialidades==""){

            especialidades=especialidade[i];

        }else{

            especialidades=especialidades+'|||'+especialidade[i];
           

        }
     }
     document.getElementById("Especialidades_Campo").value=especialidades;

}
function AdicionarEspecialidade(){

let valor=document.getElementById("CampoEspecialidade").value;
if(valor!=""){
especialidade.push(valor);
document.getElementById("CampoEspecialidade").value="";
MostrarEspecialidade();
}

}
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



