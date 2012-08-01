<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Prints a particular instance of fuc
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod
 * @subpackage fuc
 * @copyright  2011 Paulo Dias
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');
require_once($CFG->dirroot.'/user/profile/lib.php');

$id = optional_param('id', 0, PARAM_INT); // course_module ID, or
$n  = optional_param('s', 0, PARAM_INT);  // fuc instance ID - it should be named as the first character of the module

if ($id) {
    $cm         = get_coursemodule_from_id('fuc', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $fuc   = $DB->get_record('fuc', array('id' => $cm->instance), '*', MUST_EXIST);
} elseif ($n) {
    $fuc   = $DB->get_record('fuc', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $fuc->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('fuc', $fuc->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);

if ($id) {
    $context    = get_context_instance(CONTEXT_MODULE, $cm->id);
} elseif ($n) {
    $context    = context_module::instance_by_id($cm->id);
}

add_to_log($course->id, 'fuc', 'view', "view.php?id={$cm->id}", $fuc->name, $cm->id);

/// Print the page header

$PAGE->set_url('/mod/fuc/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($fuc->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($context);

// Output starts here
		echo $OUTPUT->header('fuc');
echo $OUTPUT->box_start();

echo '<b><center>FICHA DE CARACTERIZAÇÃO DE UNIDADE CURRICULAR</b></center><br><br>';
echo '<center><Ano Lectivo de 2011/2012</center><br>';

echo '<table border="1" width="100%" cellpadding="1" cellspacing="1" align="left" >';

// echo '<input type="text">';

echo '<table><tr><TD align="left">1.</td><td colspan="5"><b>Designação</b></th></tr >';
echo "<tr><td&nbsp/td><td>Em Português</td><td>$fuc->desigpt</td></tr >";
echo "<tr><td&nbsp/td><td>Em Inglês</td><td>$fuc->desigen</td></tr >";
echo "<tr><td&nbsp/td><td>Abreviatura</td><td>$fuc->desigabrv</td></tr></tr >";
echo '<th colspan="5">&nbsp</th><tr >';

//echo '<tr><td>2.</td >';
//echo '<TD align="left" colspan="3"><b>Aplicação</b></th></tr >';
//echo '<tr><td>Obrigatória</td><td>Opcional</td><td>Ano</td><td>Semestre</td></tr >';
//echo "<tr><td>$fuc->yesno1</td><td>$fuc->fff</td><td>$fuc->ano</td><td>$fuc->sem</td></tr >";

echo '<tr><TD align="left">2.</td><td colspan="5"><b>Aplicação</b></th></tr >';
echo "<tr><td&nbsp/td><td>Obrigatoriedade</td><td>$fuc->aplicacao</td></tr >";
echo "<tr><td&nbsp/td><td>Ano</td><td>$fuc->ano</td></tr >";
echo "<tr><td&nbsp/td><td>Semestre</td><td>$fuc->sem</td></tr></tr >";
echo '<th colspan="5">&nbsp</th><tr >';


echo '</tr><th colspan="5">&nbsp</th><tr >';

echo '<tr><td>3.</td >';
echo '<TD align="left" colspan="5"><b>Responsável Pedagógico/Regente</b></th></tr >';
echo "<tr><td&nbsp/td><td>Nome</td><td>$fuc->respnome</td><td&nbsp/td><td&nbsp/td></tr >";
echo "<tr><td&nbsp/td><td>Unidade de Ensino</td><td>$fuc->unidensino1</td><td&nbsp</td><td></td></tr >";
//echo "<tr><td&nbsp/td><td>UATLA</td><td>$fuc->fff</td><td>ESSATLA</td><td>$fuc->fff</td></tr >";
echo '</tr><th colspan="5">&nbsp</th><tr >';

echo '<tr><TD align="left"></td><td align="left" colspan="5"><b>Docente(s)</b></td></tr >';
echo "<tr><td&nbsp/td><td>Nome</td><td>$fuc->docente</td><td&nbsp/td><td&nbsp/td></tr >";
echo "<tr><td&nbsp/td><td>Unidade de Ensino</td><td>$fuc->unidensino2</td><td&nbsp/td><td&nbsp</td></tr >";
//echo "<tr><td&nbsp/td><td>UATLA</td><td>$fuc->fff</td><td>ESSATLA</td><td>$fuc->fff</td></tr >";
echo '<th colspan="5">&nbsp</th >';

echo '<tr><td>4.</td >';
echo '<TD align="left" colspan="4"><b>Objectivos da unidade curricular</b></th >';
echo '</tr><td&nbsp/td>';
echo "<td colspan='4'>$fuc->objec</td></tr >";
echo '<td colspan="5">&nbsp</td >';

echo '<tr><td>5.</td >';
echo '<TD align="left" colspan="4"><b>Requisitos para frequência</b></th >';
echo '</tr >';
echo '<td&nbsp/td >';
echo "<td colspan='4'>$fuc->requesite</td >";
echo '</tr >';
echo '<td colspan="5">&nbsp</td >';

echo '<tr >';
echo '<td>6.</td >';
echo '<TD align="left" colspan="4"><b>Programa<br>(de acordo com as competências da unidade curricular enviadas ao MCTES)</b></th >';
echo '</tr >';
echo '<td&nbsp/td >';
echo "<td colspan='4'>$fuc->program</td >";
echo '</tr >';
echo '<td colspan="5">&nbsp</td >';

echo '<tr>';
echo '<td>7.</td >';
echo '<TD align="left" colspan="4"><b>Bibliografia</b></td >';
echo '</tr >';
echo '<td&nbsp/td >';
echo "<td colspan='4'> $fuc->biblioum </td >";
echo '<tr >';
echo '<td&nbsp/td >';
echo "<td colspan='4'>$fuc->bibliodois</td >";
echo '</tr >';
echo '<tr >';
echo '<td&nbsp/td >';
echo "<td colspan='4'>$fuc->bibliotres</td >";
echo '</tr >';
echo '<tr >';
echo '<td&nbsp/td >';
echo "<td colspan='4'>$fuc->biblioquatro</td >";
echo '</tr >';
echo '<tr >';
echo '<td&nbsp/td >';
echo "<td colspan='4'>$fuc->bibliocinco</td >";
echo '</tr >';
echo '<tr >';
echo '<td&nbsp/td >';
echo "<td colspan='4'>$fuc->biblioseis</th >";
echo '</tr >';
echo '<tr >';
echo '<td&nbsp/td >';
echo "<td colspan='4'>$fuc->bibliosete</td >";
echo '</tr >';
echo '<tr >';
echo '<td&nbsp/td >';
echo "<td colspan='4'>$fuc->bibliooito</td >";
echo '</tr >';
echo '<tr >';
echo '<td&nbsp/td >';
echo "<td colspan='4'>$fuc->biblionove</td >";
echo '</tr >';
echo '<tr >';
echo '<td&nbsp/td >';
echo "<td colspan='4'>$fuc->bibliodez</td >";
echo '</tr >';
echo '</tr >';
echo '<td colspan="5">&nbsp</td >';
 echo '<tr >';
 echo '<tr >';
 echo '<td&nbsp/td >';
 //echo '<th colspan="4">$fuc->fff</th >';
 echo '</tr >';
 echo '</tr >';

echo '<tr>';
echo '<td>8.</td >';
echo '<TD align="left" colspan="4"><b>Trabalho do aluno</b></th >';
echo '</tr >';

 
echo '<TD align="left" colspan="5">&nbsp</th><tr >';
echo '<TR><Th rowspan="10"><b>Horas de Contacto com Docente (a)</b>';
echo "<TR><TH>TIPO<TH>HORAS*";
echo "<TR><Td>Aulas Teóricas<TD>$fuc->aulasteoricas";
echo "<TR><Td>Aulas Teórico-práticas<TD>$fuc->aulastp";
echo "<TR><Td>Aulas Práticas Laboratoriais<TD>$fuc->aulaspum";
echo "<TR><Td>Trabalho de Campo Orientado<TD>$fuc->trabcampori";
echo "<TR><Td>Seminários<TD>$fuc->seminario";
echo "<TR><Td>Estágio<TD>$fuc->estagioum";
echo "<TR><Td>Orientação Tutorial<TD>$fuc->oritutorial";
echo "<TR><Td>Outras<TD>$fuc->outrasum";
echo '<TR><TV rowspan="1"><TH colspan="3">&nbsp';

echo '<TR><Th align="left" rowspan="7">Horas de Trabalho Autónomo (b) ';
echo "<TR><Td>Estágio<TD>$fuc->estagiodois";
echo "<TR><Td>Projectos e Trabalhos<TD>$fuc->projtraba";
echo "<TR><Td>Trabalho de Campo<TD>$fuc->trabacampo";
echo "<TR><Td>Estudo<TD>$fuc->estudo";
echo "<TR><Td>Avaliação<TD>$fuc->aval";
echo "<TR><Td>Outras<TD>$fuc->outrasdois";
echo '<TR><TV rowspan="1"><TH colspan="3">&nbsp';

echo "<TR><TH>Total de Horas (a+b))<TD>&nbsp<TD>$fuc->totalh";
echo '<TR><TV rowspan="1"><TH colspan="3">&nbsp';
echo "<TR><TH>Créditos Calculados<TD>&nbsp<TD>$fuc->creditcalc";
echo '<TR><TV rowspan="1"><TH colspan="3">&nbsp';
echo "<TR><TH>Créditos (ECTS) Definidos<TD>&nbsp<TD>$fuc->creditects";

echo '<tr><td>9.</td >';
echo '<TD align="left" colspan="4"><b>Métodos de ensino</b></th >';
echo '</tr><td&nbsp/td>';
echo "<td colspan='4'>$fuc->metensino</td></tr >";
echo '<td colspan="5">&nbsp</td >';


echo '<tr >';
echo '<TD align="left" colspan="1"><br>10.</th >';
echo '<th colspan="3" align="left"><b>Métodos de avaliação</b></th >';
echo '</tr >';

echo '<tr >';
echo '<th rowspan="10"&nbsp/th >';
echo '<th colspan="3"><b>Regime Geral de Avaliação Contínua</b></th >';
echo '</tr >';

echo '<tr >';
echo '<td><b>Métodos de avaliação de conhecimentos e  competências</b></td >';
echo '<td><b>Ponderação de cada elemento*</b></td >';
echo '<td><b>Assinalar o(s) elemento(s) de avaliação individual, presencial e arquivável</b></td >';
echo '</tr >';

echo "<tr><td>Teste escrito</td><td>$fuc->pondtesteescrito</td><td>$fuc->pondtesteescritox</td></tr >";
echo "<tr><td>Trabalho escrito individual, com ou sem apresentação/discussão oral</td><td>$fuc->pondtrabescritoindiv</td><td>$fuc->pondtrabescritoindivx</td></tr >";
echo "<tr><td>Trabalho escrito de grupo, com ou sem apresentação/discussão oral</td><td>$fuc->pondtrabescritogrupo</td><td>$fuc->pondtrabescritogrupox</td >";
echo "<tr><td>Trabalho prático individual</td><td>$fuc->pondtrabpraticoindividual</td><td>$fuc->pondtrabpraticoindividualx</td></tr >";
echo "<tr><td>Exposição oral de texto e/ou tema</td><td>$fuc->pondtrabpraticogrupo</td><td>$fuc->pondtrabpraticogrupox</td></tr >";

echo '<tr><td colspan="3">* O(s) elemento(s) de avaliação individual, presencial e arquivável(is) deve(m) ter uma ponderação entre 60-75% da nota final e a sua classificação não pode ser inferior a 8 valores.</td></tr >';

echo '</table >';


//echo "EXEMPLO - Dados da BD - Grau : "; echo '<font size=\"2\">$fuc->grau</font></td >';
//echo '<br >';


echo $OUTPUT->box_end();


// Finish the page
echo $OUTPUT->footer();


//echo str_replace("\n","<br />",$fuc->unidade"\n","<br />");
//echo str_replace("\n","<br />",$fuc->categoria);
//echo str_replace("\n","<br />",$fuc->grau)
