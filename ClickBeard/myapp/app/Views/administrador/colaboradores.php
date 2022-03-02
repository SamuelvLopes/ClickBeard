<!-- Button trigger modal -->
<button type="button" class="btn bg-gradient-secondary" data-bs-toggle="modal" data-bs-target="#CadastrarColaborador">
Cadastrar Colaborador
</button>
<button type="button" class="btn bg-gradient-secondary" data-bs-toggle="modal" data-bs-target="#CadastrarEspecialidade">
Cadastrar Especialidade
</button>

<!-- Modal 1-->
<div class="modal fade" id="CadastrarEspecialidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Cadastrar Especialidade</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="p-4">
        
            <div class="input-group input-group-outline mb-4">
            <label class="form-label">Especialidade</label>
            <input type="text" id="DescricaoEspecialidade" class="form-control">
            </div>

            <button type="button" class="btn bg-gradient-success toast-btn" data-target="successToast" onclick="CadastraEspecialidade(1)" data-bs-dismiss="modal">Salvar</button>
        
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Modal 2-->
<div class="modal fade" id="CadastrarColaborador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Cadastrar Colaborador</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="colaboradores/cadastro" enctype="multipart/form-data">  
      <div class="input-group input-group-outline mb-4">
            <label class="form-label">Nome</label>
            <input type="text" name="Nome" class="form-control" required>
        </div>
        <div class="input-group input-group-static my-3">
            <label>Data de nascimento</label>
            <input type="date" name="DataNascimento" class="form-control"required>
        </div>
        <div class="input-group input-group-outline mb-4">
            <label class="form-label">Email</label>
            <input type="email" name="Email" class="form-control" required>
        </div>
        <div class="input-group input-group-static my-3">
            <label>Data de Contratação</label>
            <input type="date" name="DataContratacao" class="form-control" required>
        </div>
        <div class="input-group input-group-static my-3">
            
            <input style="display:none" type="text" name="especialidades" id="Especialidades_Campo" class="form-control" required>
        </div>
        <div class="input-group input-group-outline mb-4">
        <p>Foto</p>
            <input type="file" name="Foto" class="form-control" required>
        </div>
        <div id='DivEspecialidade' class="col-md-12">
        </div>
       <div class="row"> 
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Especialidade</label>
        <input type="text" id='CampoEspecialidade' class="form-control">
        
      </div>
      
    </div>
    <div class="col-md-6">
    <button type="button" onclick="AdicionarEspecialidade()" class="btn bg-gradient-info">Adicionar Especialidade</button>
      </div>
</div>
        <button type="submit"  class="btn bg-gradient-success">Adicionar colaborador</button>
       
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cargo</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Especialidade</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contratação</th>
        </tr>
      </thead>
      <tbody>
          <?php

          foreach($users as $user){
          echo'
        <tr>
          <td>
            <div class="d-flex px-2 py-1">
              <div>
                <img src="'.base_url().'/'.$user->FOTO.'" class="avatar avatar-sm me-3">
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs">'.$user->NOME.'</h6>
                <p class="text-xs text-secondary mb-0">'.$user->EMAIL.'</p>
              </div>
            </div>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0">Barber</p>
            <p class="text-xs text-secondary mb-0">Operacional</p>
          </td>
          <td class="align-middle text-center text-sm">
          <div class="dropdown">
            <button class="btn bg-gradient-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Especialidades
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
            foreach($user->especialidade as $especialidade){
            
            echo'<li><a class="dropdown-item" href="#">'.$especialidade.'</a></li>';

            }
            echo'</ul>
            </div>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-normal">'.date("d/m/Y", $user->CONTRATACAO).'</span>
          </td>
          
        </tr>
        ';
          }
    ?>
      
        
      </tbody>
    </table>
  </div>
</div>
<div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successToast" aria-atomic="true">
          <div class="toast-header border-0">
            <i class="material-icons text-success me-2">
        check
      </i>
            <span class="me-auto font-weight-bold">Sucesso </span>
            <small class="text-body">Agora</small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body">
           Especialidade Criada com sucesso
          </div>
        </div>
</div>