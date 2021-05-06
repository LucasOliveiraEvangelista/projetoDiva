<?php
 require_once 'restrito.php';
?>
<?php
require_once '../../models/consulta.php';
require_once '../../helpers/valida.php';

session_start();
$usuario = new Consulta();
$valida = new Valida();
$profissional =$_SESSION['usuario'];
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$usuario->setData($data['data']);
$usuario->setIdMedico($medico);

if($valida->Campos($data) == true) {
    echo("<br/>");
    echo('Escolha uma opção por favor.');
    return;
}
if($usuario->find() == NULL){
    echo('Não existe consultas para essa data');
    return;
}

foreach($usuario->find() as $key => $value)
{

    echo("<br/>");
    echo("<table>");
    echo("<tr> Data: ".$value->data_consulta." ");
    echo("<td>Observacoes: ".$value->observacoes."</td></tr>");
    echo("</table>");

}