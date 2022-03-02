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
const ProcurandoEspecialidade = setInterval(procurarespecialidade, 1000);
function escolheespecialidade(id,especialidade) {
    clearInterval(ProcurandoEspecialidade);
    document.getElementById("botoes_especialidade").innerHTML="";
    document.getElementById("form_especialidade").style.display="none";
    document.getElementById("botoes_especialidade").style.display="none";
    document.getElementById("div_especialidade").style.display="none";
    document.getElementById("form_especialidade").value=especialidade;
    document.getElementById("form_especialidade2").value=id;
    let select;
    $.post('/agendar/buscarbarbeiro', {id:id}, function (retorno) {

        document.getElementById("divbabeiroselect").style.display="block";
        document.getElementById("babeiroselect").innerHTML=retorno;
        
    });
    
}
function procurarespecialidade() {
  
  //seria bom não deixar essa função rodando assim por consumir o servidor de forma desnessesaria
  let especialidade=document.getElementById("form_especialidade").value;
  if(especialidade!=""){
      
    $.post('/agendar/buscarespecialidade', {especialidade:especialidade}, function (retorno) {
            if (retorno != null) {
                retorno=retorno.split("|||");
               
                let div="";
                for (var i = 0; i <retorno.length; i++) {
                    if(retorno[i]!=""){
                    div=div+'<button type="button" onclick="escolheespecialidade('+retorno[i+1]+','+"'"+retorno[i]+"'"+')" class="btn btn-primary">'+retorno[i]+'</button>';
                    }
                    i++;
                }

                document.getElementById("botoes_especialidade").innerHTML=div;

    
            } else {
    
               
    
            }
        });

  }
}
function selecionaespecialidade(){
    id=document.getElementById("select-especialidadade").value;
    document.getElementById("form_especialidade2").value=id;
    document.getElementById("form_especialidade").value=id;
    escolheespecialidade(id,'SOMBRANCELHAS HAVAINAS2')

}
function mostarespecialidades(){
    document.getElementById("mensagem-especialidade").style.display="none";
    document.getElementById("div_especialidade").style.display="none";
    document.getElementById("mensagem-especialidade").style.display="none";
    document.getElementById("select-especialidade").style.display="block";
    id=document.getElementById("select-especialidadade").value;
    document.getElementById("form_especialidade").value=1;
    document.getElementById("form_especialidade2").value=1;

}
function pergunta(){ 
    if (confirm('Tem certeza que quer realizar esse agendamento?')){ 
       //document.agendamento_form.submit();
       
       document.getElementById("submeter").click;
    } 
 }

 





