<?php 
	require_once("conexion.php");
	include 'funcionpreg.php';
	class Usuario
	{
		private $user="";
		private $pw="";
		private $codigoTipoUsuario="";
		private $codigoUsuario="";
		private $estadoUsuario="";
		function __construct($user,$pw)
		{
			$this->user=$user;
			$this->pw=$pw;
		}
		

		public function autenticar(){
			$this->user=ValidacionUsername($_POST['user']);
			$conexion= new Conexion();
			$mysqli= $conexion->getConexion();
			if (mysqli_connect_errno()) {
    			printf("Connect failed: %s\n", mysqli_connect_error());
    			exit();
			}

			if ($stmt = $mysqli->prepare("SELECT CODIGO_USUARIO, USER, PW, CODIGO_TIPO_USUARIO, ESTADO_USUARIO FROM TBL_USUARIOS WHERE USER = ? AND PW = ? ")){
				$stmt->bind_param("ss",$this->user,$this->pw);
				$stmt->execute();
				$stmt->bind_result($this->codigoUsuario,$this->user,$this->pw,$this->codigoTipoUsuario, $this->estadoUsuario);
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

		public function setCodigoUser($codigoUsuario){
			$this->codigoUsuario=$codigoUsuario;
		}	

		public function getCodigoUsuario(){
			return $this->codigoUsuario;
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
		public function setEstadoUsuario($estadoUsuario){
			$this->estadoUsuario=$estadoUsuario;
		}

		public function getEstadoUsuario(){
			return $this->estadoUsuario;
		}
	}
?>