<?php 
    class Listas extends Controller{
        public function __construct(){
            //vai procurar na pasta model um arquivo chamado Fila.php e incluir
            $this->listaModel = $this->model('Lista');
        }

        public function listachamada(){            
            $data['etapas'] = $this->listaModel->getEtapas();

            foreach($data['etapas'] as $etapa){ 
                if($data['registros'][] = $this->listaModel->getFilaPorEtapaRelatorio($etapa['id'],'Aguardando'))
                {
                    $data['registros'][] = $this->listaModel->getFilaPorEtapaRelatorio($etapa['id'],'Aguardando');                    
                }
                else
                {
                    $data['registros'][] = NULL;
                }

            }    

            $this->view('listas/listachamada',$data);

        }


    }