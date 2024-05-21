<?php require_once('Modelo.php'); ?>

<?php
class Afiliado extends Modelo{
    public $id;
    public $id_persona;
    public $codigo_fac;
    public $folio;
    public $nombre_afi;
    public $giro;
    public $que_se_dedica;
    public $rubro;
    public $rfc;
    public $direccion;
    public $numero;
    public $codigo_postal;
    public $colonia;
    public $pertenece;
    public $pago_camara;
    public $telefono;
    public $calle1;
    public $calle2;
    public $fecha;
    public $correo;
    public $siglas_promotor;

    function __construct(){
        parent:: __construct();
        $this->tabla = "afiliado";
    }

    function lista(){
        $this->consulta = "select * from $this->tabla";
        return $this->encuentraTodos();
    }

    function recuperarRegistro($id){
        $this->consulta= "select * from $this->tabla where id = $id";
        $dato = $this->encuentraUno();
        return $dato;
    }

    function insertarRegistro(){
        $this->id = $_POST['id'];
        $this->id_persona = $_POST['id_persona'];
        $this->codigo_fac = $_POST['codigo_fac'];
        $this->folio = $_POST['folio'];
        $this->nombre_afi = $_POST['nombre_afi'];
        $this->giro = $_POST['giro'];
        $this->que_se_dedica = $_POST['que_se_dedica'];
        $this->rubro = $_POST['rubro'];
        $this->rfc2 = $_POST['rfc'];
        $this->direccion = $_POST['direccion'];
        $this->numero = $_POST['numero'];
        $this->codigo_postal = $_POST['codigo_postal'];
        $this->colonia = $_POST['colonia'];
        $this->pertenece = $_POST['pertenece'];
        $this->pago_camara = $_POST['pago_camara'];
        $this->telefono = $_POST['telefono'];
        $this->calle1 = $_POST['calle1'];
        $this->calle2 = $_POST['calle2'];
        $this->fecha = $_POST['fecha'];
        $this->correo = $_POST['correo'];
        $this->siglas_promotor = $_POST['siglas_promotor'];

        $this->consulta = 
        "insert into $this->tabla 
        (id_persona, codigo_fac, folio, nombre_afi, giro, que_se_dedica, rubro, rfc, direccion, numero, codigo_postal, colonia, pertenece, pago_camara, telefono, calle1, calle2, fecha, correo, siglas_promotor) ".
        "values (" .
        "$this->id_persona,".
        "'$this->codigo_fac',".
        "'$this->folio',".
        "'$this->nombre_afi',".
        "'$this->giro',".
        "'$this->que_se_dedica',".
        "'$this->rubro',".
        "'$this->rfc',".
        "'$this->direccion',".
        "$this->codigo_postal,".
        "'$this->colonia',".
        "'$this->pertenece',".
        "$this->pago_camara,".
        "'$this->telefono',".
        "'$this->calle1',".
        "'$this->calle2',".
        "'$this->fecha',".
        "'$this->correo',".
        "'$this->siglas_promotor');";

        $this->ejecutarComandoIUD();
    }

    function actualizarRegistro(){
        $this->id = $_POST['id'];
        $this->id_persona = $_POST['id_persona'];
        $this->codigo_fac = $_POST['codigo_fac'];
        $this->folio = $_POST['folio'];
        $this->nombre_afi = $_POST['nombre_afi'];
        $this->giro = $_POST['giro'];
        $this->que_se_dedica = $_POST['que_se_dedica'];
        $this->rubro = $_POST['rubro'];
        $this->rfc2 = $_POST['rfc'];
        $this->direccion = $_POST['direccion'];
        $this->numero = $_POST['numero'];
        $this->codigo_postal = $_POST['codigo_postal'];
        $this->colonia = $_POST['colonia'];
        $this->pertenece = $_POST['pertenece'];
        $this->pago_camara = $_POST['pago_camara'];
        $this->telefono = $_POST['telefono'];
        $this->calle1 = $_POST['calle1'];
        $this->calle2 = $_POST['calle2'];
        $this->fecha = $_POST['fecha'];
        $this->correo = $_POST['correo'];
        $this->siglas_promotor = $_POST['siglas_promotor'];

        $this->consulta =
        "update $this->tabla set ".
        "id_persona = $this->id_persona,".
        "codigo_fac = '$this->codigo_fac',".
        "folio = '$this->folio',".
        "nombre_afi = '$this->nombre_afi',".
        "giro = '$this->giro',".
        "que_se_dedica = '$this->que_se_dedica',".
        "rubro = '$this->rubro',".
        "rfc = '$this->rfc',".
        "direccion = '$this->direccion',".
        "codigo_postal = $this->codigo_postal,".
        "colonia = '$this->colonia',".
        "pertenece = '$this->pertenece',".
        "pago_camara = $this->pago_camara,".
        "telefono = '$this->telefono',".
        "calle1 = '$this->calle1',".
        "calle2 = '$this->calle2',".
        "fecha = '$this->fecha',".
        "correo = '$this->correo',".
        "siglas_promotor = '$this->siglas_promotor'".
        "where id = $this->id";

        $this->ejecutarComandoIUD();
    }

    function eliminarRegistro($id){
        $this->consulta =
        "delete from $this->tabla ".
        "where id = $id;";

        $this->ejecutaComandoIUD();
    }
}
?>