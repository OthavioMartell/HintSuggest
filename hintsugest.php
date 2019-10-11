<?php

    interface Usuario{
        public function setNomeUsuario($nomeUsuario);
        public function getNomeUsuario();

        public function setSexo($sexo);
        public function getsexo();
    }

    class Comentarista implements Usuario{
        protected $nomeUsuario = ' ';
        protected $sexo = 'não é da sua conta!';

        public function setNomeUsuario($nomeUsuario){
            $this->nomeUsuario=(is_string($nomeUsuario))? $nomeUsuario : 'N/D';
        }
        public function getNomeUsuario(){
            return $this->nomeUsuario;
        }
        public function setSexo($sexo){
            $sexoArray = array('feminino', 'masculino', 'outro');
            if(in_array($sexo,$sexoArray)){
                $this->sexo=$sexo;
            }
        }
        public function  getSexo(){
            return $this->sexo;
        }
    }


    function adicionaSrouSra(Usuario $usuario){
        $nomeUsuario = $usuario->getNomeUsuario();
        $sexo = $usuario->getSexo();

        if($sexo === 'feminino'){
            return "Sra. " . $nomeUsuario;
        } else if($sexo === 'masculino'){
            return "Sr. " . $nomeUsuario;
        }
        return $nomeUsuario;
    }

    $usuario1 = new Comentarista();
    $usuario1->setNomeUsuario("Jane");
    $usuario1->setSexo("feminino");
    echo adicionaSrouSra($usuario1)."\n";

    $usuario2 = new Comentarista();
    $usuario2->setNomeUsuario("Bobby");
    $usuario2->setSexo("masculino");
    echo adicionaSrouSra($usuario2)."\n";

?>