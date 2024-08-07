<?php require_once('Modelo.php'); ?>

<?php
class Pago extends Modelo{
    public $id;
    public $id_afiliado;
    public $id_promotor;
    public $codigo_factu;
    public $folio;
    public $nombre_comercial;
    public $giro;
    public $giro2;
    public $localidad;
    public $pago_afiliacion;
    public $modo_pago;
    public $estado;
    public $direccion;
    public $calle1;
    public $calle2;
    public $fecha;
    public $form;
    public $pago_c;
    public $extemp;
    public $salubridad;
    public $siem;

    function __construct(){
        parent:: __construct();
        $this->tabla = "pago";
    }

    function lista(){
        $this->consulta = "select * from $this->tabla";
        return $this->encuentraTodos();
    }

    function recuperarPromotor($id_promotor){
        $this->consulta = "select * from $this->tabla where id_promotor = $id_promotor";
        return $this->encuentraTodos();
    }

    function recuperarRegistro($id){
        $this->consulta= "select * from $this->tabla where id = $id";
        $dato = $this->encuentraUno();
        if (isset($dato)) {
            $this->id = $dato->id;
            $this->id_afiliado = $dato->id_afiliado;
            $this->id_promotor = $dato->id_promotor;
            $this->codigo_factu = $dato->codigo_factu;
            $this->folio = $dato->folio;
            $this->nombre_comercial = $dato->nombre_comercial;
            $this->giro = $dato->giro;
            $this->giro2 = $dato->giro2;
            $this->localidad = $dato->localidad;
            $this->pago_afiliacion = $dato->pago_afiliacion;
            $this->modo_pago = $dato->modo_pago;
            $this->estado = $dato->estado;
            $this->direccion = $dato->direccion;
            $this->calle1 = $dato->calle1;
            $this->calle2 = $dato->calle2;
            $this->fecha = $dato->fecha;
            $this->form = $dato->form;
            $this->pago_c = $dato->pago_c;
            $this->extemp = $dato->extemp;
            $this->salubridad = $dato->salubridad;
            $this->siem = $dato->siem;

            // Recupera los datos del afiliado
            $this->recuperarDatosAfiliado($this->id_afiliado);
        }
        return $dato;
    }

    function recuperarDatosAfiliado($id_afiliado) {
        $afiliado = new Afiliado(); // Asegúrate de que Afiliado se conecta correctamente
        $datos_afiliado = $afiliado->recuperarRegistro($id_afiliado);

        if ($datos_afiliado) {
            $this->nombre = $datos_afiliado->nombre;
            $this->rfc = $datos_afiliado->rfc;
            $this->curp = $datos_afiliado->curp;
            $this->telefono = $datos_afiliado->telefono;
            $this->correo = $datos_afiliado->correo;
        }
    }

    function insertarRegistro(){
        $this->id = $_POST['id'];
        $this->id_afiliado = $_POST['id_afiliado'];
        $this->id_promotor = $_POST['id_promotor'];
        $this->codigo_factu = $_POST['codigo_factu'];
        $this->folio = $_POST['folio'];
        $this->nombre_comercial = $_POST['nombre_comercial'];
        $this->giro = $_POST['giro'];
        $this->giro2 = $_POST['giro2'];
        $this->localidad = $_POST['localidad'];
        $this->pago_afiliacion = $_POST['pago_afiliacion'];
        $this->modo_pago = $_POST['modo_pago'];
        $this->estado = $_POST['estado'];
        $this->direccion = $_POST['direccion'];
        $this->calle1 = $_POST['calle1'];
        $this->calle2 = $_POST['calle2'];
        $this->fecha = $_POST['fecha'];
        $this->form = $_POST['form'];
        $this->pago_c = $_POST['pago_c'];
        $this->extemp = $_POST['extemp'];
        $this->salubridad = $_POST['salubridad'];
        $this->siem = $_POST['siem'];

        $this->consulta = 
        "insert into $this->tabla (id_afiliado, id_promotor, codigo_factu, folio, nombre_comercial, giro, giro2, localidad, pago_afiliacion, modo_pago, estado, direccion, calle1, calle2, fecha, form, pago_c, extemp, salubridad, siem) ".
        "insert into $this->tabla (id_afiliado, id_promotor, codigo_factu, folio, nombre_comercial, giro, giro2, localidad, pago_afiliacion, estado, direccion, calle1, calle2, fecha, form, pago_c, extemp, salubridad) ".
        "values (" .
        "$this->id_afiliado, ".
        "$this->id_promotor, ".
        "$this->codigo_factu, ".
        "$this->folio, ".
        "'$this->nombre_comercial', ".
        "'$this->giro', ".
        "'$this->giro2', ".
        "'$this->localidad', ".
        "$this->pago_afiliacion, ".
        "'$this->modo_pago', ".
        "'$this->estado', ".
        "'$this->direccion', ".
        "'$this->calle1', ".
        "'$this->calle2', ".
        "'$this->fecha', ".
        "$this->form, ".
        "$this->pago_c, ".
        "$this->extemp, ". 
        "$this->salubridad, ".
        "$this->siem)";
        "$this->id_afiliado, ".
        "$this->id_promotor, ".
        "$this->codigo_factu, ".
        "$this->folio, ".
        "'$this->nombre_comercial', ".
        "'$this->giro', ".
        "'$this->giro2', ".
        "'$this->localidad', ".
        "$this->pago_afiliacion, ".
        "'$this->estado', ".
        "'$this->direccion', ".
        "'$this->calle1', ".
        "'$this->calle2', ".
        "'$this->fecha', ".
        "$this->form, ".
        "$this->pago_c, ".
        "$this->extemp, ". 
        "$this->salubridad)";

        $this->ejecutaComandoIUD();
    }

    function actualizarRegistro(){
        $this->id = $_POST['id'];
        $this->id_afiliado = $_POST['id_afiliado'];
        $this->id_promotor = $_POST['id_promotor'];
        $this->codigo_factu = $_POST['codigo_factu'];
        $this->folio = $_POST['folio'];
        $this->nombre_comercial = $_POST['nombre_comercial'];
        $this->giro = $_POST['giro'];
        $this->giro2 = $_POST['giro2'];
        $this->localidad = $_POST['localidad'];
        $this->pago_afiliacion = $_POST['pago_afiliacion'];
        $this->modo_pago = $_POST['modo_pago'];
        $this->estado = $_POST['estado'];
        $this->direccion = $_POST['direccion'];
        $this->calle1 = $_POST['calle1'];
        $this->calle2 = $_POST['calle2'];
        $this->fecha = $_POST['fecha'];
        $this->form = $_POST['form'];
        $this->pago_c = $_POST['pago_c'];
        $this->extemp = $_POST['extemp'];
        $this->salubridad = $_POST['salubridad'];
        $this->siem = $_POST['siem'];

        $this->consulta =
        "update $this->tabla set ".
        "id_afiliado = $this->id_afiliado, ".
        "id_promotor = $this->id_promotor, ".
        "codigo_factu = $this->codigo_factu, ".
        "folio = $this->folio, ".
        "nombre_comercial = '$this->nombre_comercial', ".
        "giro = '$this->giro', ".
        "giro2 = '$this->giro2', ".
        "localidad = '$this->localidad', ".
        "pago_afiliacion = $this->pago_afiliacion, ".
        "modo_pago = '$this->modo_pago', ".
        "estado = '$this->estado', ".
        "direccion = '$this->direccion', ".
        "calle1 = '$this->calle1', ".
        "calle2 = '$this->calle2', ".
        "fecha = '$this->fecha', ".
        "form = $this->form, ".
        "pago_c = $this->pago_c, ".
        "extemp = $this->extemp, ".
        "salubridad = $this->salubridad, ".
        "siem = $this->siem ".
        "where id = $this->id";

        $this->ejecutaComandoIUD();
    }

    function eliminarRegistro($id){
        $this->consulta =
        "delete from $this->tabla ".
        "where id = $id;";

        $this->ejecutaComandoIUD();
    }

    //Consultas Extras 
    function buscarPagosPorAfiliado($id_afiliado) {
        $this->consulta = "SELECT * FROM $this->tabla WHERE id_afiliado = $id_afiliado";
        return $this->encuentraTodos();
    }

    function buscarPagosPorPromotor($id_promotor) {
        $this->consulta = "SELECT * FROM $this->tabla WHERE id_promotor = $id_promotor";
        return $this->encuentraTodos();
    }
    
    function buscarPagosPorEstado($estado) {
        $this->consulta = "SELECT * FROM $this->tabla WHERE estado = '$estado'";
        return $this->encuentraTodos();
    }

    function buscarPagosPorFecha($fecha) {
        $this->consulta = "SELECT * FROM $this->tabla WHERE fecha = '$fecha'";
        return $this->encuentraTodos();
    }
    
    function buscarPagosPorLocalidad($localidad) {
        $this->consulta = "SELECT * FROM $this->tabla WHERE localidad = '$localidad'";
        return $this->encuentraTodos();
    }
    
    function buscarPagosPorFolio($folio) {
        $this->consulta = "SELECT * FROM $this->tabla WHERE folio = '$folio'";
        return $this->encuentraTodos();
    }
    
    function resumenPagosPorAfiliado() {
        $this->consulta = "SELECT id_afiliado, COUNT(*) as total_pagos, SUM(pago_afiliacion) as total_pagado FROM $this->tabla GROUP BY id_afiliado";
        return $this->encuentraTodos();
    }
    
    function resumenPagosPorPromotor() {
        $this->consulta = "SELECT id_promotor, COUNT(*) as total_pagos, SUM(pago_afiliacion) as total_pagado FROM $this->tabla GROUP BY id_promotor";
        return $this->encuentraTodos();
    }
    
    function pagosMensuales() {
        $this->consulta = "SELECT DATE_FORMAT(fecha, '%Y-%m') as mes, COUNT(*) as total_pagos, SUM(pago_afiliacion) as total_pagado FROM $this->tabla GROUP BY mes";
        return $this->encuentraTodos();
    }
    
    function pagosAnuales() {
        $this->consulta = "SELECT YEAR(fecha) as año, COUNT(*) as total_pagos, SUM(pago_afiliacion) as total_pagado FROM $this->tabla GROUP BY año";
        return $this->encuentraTodos();
    }
    
    function buscarPagosPorRangoFechas($fecha_inicio, $fecha_fin) {
        $this->consulta = "SELECT * FROM $this->tabla WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
        return $this->encuentraTodos();
    }
    
    function buscarPagosConInfoAfiliadoPromotor() {
        $this->consulta = "SELECT p.*, a.nombre AS nombre_afiliado, a.apellido_paterno AS apellido_afiliado, 
                            pr.nombre AS nombre_promotor, pr.apellido_paterno AS apellido_promotor 
                            FROM $this->tabla p 
                            JOIN afiliado a ON p.id_afiliado = a.id 
                            JOIN promotor pr ON p.id_promotor = pr.id";
        return $this->encuentraTodos();
    }
}
?>