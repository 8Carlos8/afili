<?php require_once('Modelo.php'); ?>

<?php
class Pago extends Modelo{
    public $id;
    public $id_afiliado;
    public $id_promotor;
    public $codigo_fac;
    public $folio;
    public $nombre_comercial;
    public $giro;
    public $giro2;
    public $localidad;
    public $pago_afiliacion;
    public $estado;
    public $direccion;
    public $calle1;
    public $calle2;
    public $fecha;
    public $form;
    public $pago_c;
    public $extemp;
    public $salubridad;

    function __construct(){
        parent:: __construct();
        $this->tabla = "pago";
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
        $this->id_afiliado = $_POST['id_afiliado'];
        $this->id_promotor = $_POST['id_promotor'];
        $this->codigo_fac = $_POST['codigo_fac'];
        $this->folio = $_POST['folio'];
        $this->nombre_comercial = $_POST['nombre_comercial'];
        $this->giro = $_POST['giro'];
        $this->giro2 = $_POST['giro2'];
        $this->localidad = $_POST['localidad'];
        $this->pago_afiliacion = $_POST['pago_afiliacion'];
        $this->estado = $_POST['estado'];
        $this->direccion = $_POST['direccion'];
        $this->calle1 = $_POST['calle1'];
        $this->calle2 = $_POST['calle2'];
        $this->fecha = $_POST['fecha'];
        $this->form = $_POST['form'];
        $this->pago_c = $_POST['pago_c'];
        $this->extemp = $_POST['extemp'];
        $this->salubridad = $_POST['salubridad'];

        $this->consulta = 
        "insert into $this->tabla 
        (id_afiliado, id_promotor, codigo_fac, folio, nombre_comercial, giro, giro2, localidad, pago_afiliacion, estado, direccion, calle1, calle2, fecha, form, pago_c, extemp, salubridad) ".
        "values (" .
        "$this->id_afiliado,".
        "$this->id_promotor,".
        "$this->codigo_fac,".
        "$this->folio,".
        "'$this->nombre_comercial',".
        "'$this->giro',".
        "'$this->giro2',".
        "'$this->localidad',".
        "$this->pago_afiliacion,".
        "'$this->estado',".
        "$this->direccion,".
        "$this->calle1,".
        "'$this->calle2',".
        "'$this->fecha',".
        "$this->pago_c,".
        "'$this->extemp',". 
        "'$this->salubridad');";

        $this->ejecutarComandoIUD();
    }

    function actualizarRegistro(){
        $this->id = $_POST['id'];
        $this->id_afiliado = $_POST['id_afiliado'];
        $this->id_promotor = $_POST['id_promotor'];
        $this->codigo_fac = $_POST['codigo_fac'];
        $this->folio = $_POST['folio'];
        $this->nombre_comercial = $_POST['nombre_comercial'];
        $this->giro = $_POST['giro'];
        $this->giro2 = $_POST['giro2'];
        $this->localidad = $_POST['localidad'];
        $this->pago_afiliacion = $_POST['pago_afiliacion'];
        $this->estado = $_POST['estado'];
        $this->direccion = $_POST['direccion'];
        $this->calle1 = $_POST['calle1'];
        $this->calle2 = $_POST['calle2'];
        $this->fecha = $_POST['fecha'];
        $this->form = $_POST['form'];
        $this->pago_c = $_POST['pago_c'];
        $this->extemp = $_POST['extemp'];
        $this->salubridad = $_POST['salubridad'];

        $this->consulta =
        "update $this->tabla set ".
        "id_afiliado = $this->id_afiliado,".
        "id_promotor = $this->id_promotor,".
        "codigo_fac = '$this->codigo_fac',".
        "folio = $this->folio,".
        "nombre_comercial = '$this->nombre_comercial',".
        "giro = '$this->giro',".
        "giro2 = '$this->giro2',".
        "localidad = '$this->localidad',".
        "pago_afiliacion = $this->pago_afiliacion,".
        "estado = '$this->estado',".
        "direccion = '$this->direccion',".
        "calle1 = '$this->calle1',".
        "calle2 = '$this->calle2',".
        "fecha = '$this->fecha',".
        "form = $this->form,".
        "pago_c = $this->pago_c,".
        "extemp = $this->extemp,".
        "salubridad = $this->salubridad,".
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