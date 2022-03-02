<?php 
//var_dump($agendamentos);exit();
?>
<h1>Agendamentos</h1>
<!-- Button trigger modal -->
<button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Fazer um agendamento
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Novo Agendamento</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form name="agendamento_form" method="post" action="/agendar/agendamento">
        <div class="input-group input-group-static my-3">
          <label>Data e Hora</label>
          
          <input name="horario" min="<?=date('Y-m-d')?>T00:00" max="2030-01-01T00:00" type="datetime-local" class="form-control" required>
        </div>
        <div id='div_especialidade' class="input-group input-group-outline my-3">
         <label class="form-label">Especialidade
         </label>
          <input autocomplete='off' name="especialidade" id='form_especialidade' type="text" class="form-control" required>
       </div>
        <div id="botoes_especialidade">
         
      
        </div>
        <div id="divbabeiroselect" style='display:none' class="input-group input-group-static mb-4">
          <label for="exampleFormControlSelect1" class="ms-0">Escolha seu barbeiro</label>
          <select name='barbeiro' class="form-control" id="babeiroselect" required>
            
          </select>
        </div> 
        <input style='display:none' name="especialidade2" id='form_especialidade2' type="text" required>
        <!-- <button type='submit' id='submeter'></button> -->
        <!-- onclick="pergunta()" --> 
        <button type="submit"  class="btn bg-gradient-success">Agendar</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Voltar</button>
        
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Especialidade</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Horario</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Barbeiro</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="d-flex px-2">
              
                
              <div class="my-auto">
                <h6 class="mb-0 text-xs">Spotify</h6>
              </div>
            </div>
          </td>
          <td>
            <p class="text-xs font-weight-normal mb-0">$2,500</p>
          </td>
          <td>
            <span class="badge badge-dot me-4">
              <i class="bg-info"></i>
              <span class="text-dark text-xs">working</span>
            </span>
          </td>
          <td>
            <span class="badge badge-dot me-4">
              <i class="bg-info"></i>
              <span class="text-dark text-xs">Samuel</span>
            </span>
          </td>
          
        </tr>


       

        

      </tbody>
    </table>
  </div>
  </div>