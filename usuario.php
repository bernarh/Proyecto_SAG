<?php 
	require_once("conexion.php");
	class Usuario
	{
		private $user="";
		private $pw="";
		private $codigoTipoUsuario="";
		
		function __construct($user,$pw)
		{
			$this->user=$user;
			$this->pw=$pw;
		}

		public function autenticar(){
			$conexion= new Conexion();
			$mysqli= $conexion->getConexion();
			if (mysqli_connect_errno()) {
    			printf("Connect failed: %s\n", mysqli_connect_error());
    			exit();
			}
			if ($stmt = $mysqli->prepare("SELECT USER, PW, TIPO_USUARIO FROM TBL_USUARIO WHERE USER = ? AND PW = ? ")){
				$stmt->bind_param("ss",$this->user,$this->pw);
				$stmt->execute();
				$stmt->bind_result($this->user,$this->pw,$this->codigoTipoUsuario);
				$stmt->fetch();
			}
		}

		//setter and getters
		public function setUser($user){
			$this->user=$user;
		}	

		public function getUser(){
			return $this->user;
		}

		public function setPw($pw){
			$this->pw=$pw;
		}

		public function getPw(){
			return $this->pw;
		}
		public function setCodigoTipoUsuario($codigoTipoUsuario){
			$this->codigoTipoUsuario=$codigoTipoUsuario;
		}

		public function getCodigoTipoUsuario(){
			return $this->codigoTipoUsuario;
		}
	}
?>