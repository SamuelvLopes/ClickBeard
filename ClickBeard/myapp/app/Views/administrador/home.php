<div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Atendimentos Hoje</p>
                <h4 class="mb-0"><?=count($agendamentos)?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Usuarios</p>
                <h4 class="mb-0"><?=$numuser?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            
          </div>
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">engineering</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Barbeiros</p>
                <h4 class="mb-0"><?=$numbarbeiros?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            
          </div>
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">bolt</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Especialidades</p>
                <h4 class="mb-0"><?=$numespecialidade?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            
          </div>
        </div>
        
      </div>
      <H1 style='margin:20px 0px 10px 0px'>Atendimentos Hoje</H1>
      
<div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Especialidade</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cliente</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Horario</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Barbeiro</th>
          
        </tr>
      </thead>
      <tbody>
      <?php
     // $agendamentos=["a","a"];
      foreach($agendamentos as $agendamento){
        
      $data=explode(" ",$agendamento->HORARIO);
      echo'  
        <tr>
        <td>
            <div class="d-flex px-2">
              
                
              <div class="my-auto">
                <h6 class="mb-0 text-xs">#'.$agendamento->IDAGENDAMENTO.'</h6>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex px-2">
              
                
              <div class="my-auto">
                <h6 class="mb-0 text-xs">'.$agendamento->ESPECIALIDADE.'</h6>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex px-2">
              
                
              <div class="my-auto">
                <h6 class="mb-0 text-xs">'.$agendamento->CLIENTE.'</h6>
              </div>
            </div>
          </td>
          <td>
          <div class="d-flex px-2">
              
                
              <div class="my-auto">
                <h6 class="mb-0 text-xs">'.date("d/m/Y", strtotime($data[0])).'</h6>
              </div>
            </div>
            
          </td>
          <td>
            <span class="badge badge-dot me-4">
              <i class="bg-info"></i>
              <span class="text-dark text-xs">'.$data[1].'</span>
            </span>
          </td>
          <td>
            <span class="badge badge-dot me-4">
              <i class="bg-info"></i>
              <span class="text-dark text-xs">'.$agendamento->BARBEIRO.'</span>
            </span>
          </td>
          
        </tr>
      ';
      }
       
      ?>
        

      </tbody>
    </table>
  </div>
  </div>