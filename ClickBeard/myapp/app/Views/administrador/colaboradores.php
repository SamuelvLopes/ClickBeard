
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
        <div class="input-group input-group-outline mb-4">
        <p>Foto</p>
            <input type="file" name="Foto" class="form-control" required>
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
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cargo</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Especialidade</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contratação</th>
          
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="d-flex px-2 py-1">
              <div>
                <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs">John Michael</h6>
                <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0">Manager</p>
            <p class="text-xs text-secondary mb-0">Organization</p>
          </td>
          <td class="align-middle text-center text-sm">
          <div class="dropdown">
            <button class="btn bg-gradient-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Secondary
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </div>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-normal">23/04/18</span>
          </td>
          
        </tr>

      
        
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