<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');


class mod_fuc_mod_form extends moodleform_mod {

    public function definition() {

        $mform = $this->_form;

//    $this->add_intro_editor();
//$mform->addElement('static', 'mydescription', '', $course->description);
   
$mform->addElement('static', ' ', ' ','<center>FICHA DE CARACTERIZAÇÃO DE UNIDADE CURRICULAR</center>');		
$mform->addElement('static', ' ', ' ','<center>Ano Lectivo de 2011/2012</center>');		

$mform->addElement('static', ' ', ' ','<b>1. Designação</b>');		
$mform->addElement('text','desigpt','(Português) :','maxlength="100" size="50" ');
$mform->addElement('text','desigen','(Inglês) :','maxlength="100" size="50" ');
$mform->addElement('text','desigabrv','Abreviatura :','maxlength="20" size="10" ');

$mform->addElement('static', ' ', ' ','<br>');
$mform->addElement('static', ' ', ' ','<b>2. Aplicação</b>');
$mform->addElement('static', ' ', ' ','Designação do curso');
$mform->addElement('text','aplicacao','Obrigatoriedade (Opcional ou Obrigatorio):','maxlength="100" size="50" ');
$mform->addElement('text','ano','Ano :','maxlength="1" size="1" ');
$mform->addElement('text','sem','Semestre :','maxlength="1" size="1" ');
	
//$aplicacao=array();
//$aplicacao[] = &MoodleQuickForm::createElement('radio', 'yesno1', '', 'Opcional  ', 1);
//$aplicacao[] = &MoodleQuickForm::createElement('radio', 'yesno1', '','Obrigatorio  ', 0);
//$mform->addGroup($aplicacao, 'radioar', 'Tipo', array(' '), false);
//$mform->setDefault('yesno1', 1);
		




$mform->addElement('static', ' ', ' ','<br>');
$mform->addElement('static', ' ', ' ','<b>3. Responsável Pedagógico/Regente</b>');
$mform->addElement('text','respnome','Responsavel :','maxlength="100" size="50" ');
$mform->addElement('text','unidensino1','Unidade de Ensino (UATLA ou ESSATLA):','maxlength="100" size="50" ');

//$responsavel=array();
//$responsavel[] = &MoodleQuickForm::createElement('radio', 'yesno2', '',' UATLA  ', 1);
//$responsavel[] = &MoodleQuickForm::createElement('radio', 'yesno2', '',' ESSATLA  ', 0);
//$mform->addGroup($responsavel, 'radioar', 'Unidade de Ensino', array(' '), false);
//$mform->setDefault('yesno2', 1);

$mform->addElement('static', ' ', ' ','<br>');
$mform->addElement('static', ' ', ' ','<b>Docente(s)</b>');
$mform->addElement('text','docente','Responsavel :','maxlength="100" size="50" ');
$mform->addElement('text','unidensino2','Unidade de Ensino (UATLA ou ESSATLA):','maxlength="100" size="50" ');

//$docente=array();
//$docente[] = &MoodleQuickForm::createElement('radio', 'yesno3', '','UATLA  ', 1);
//$docente[] = &MoodleQuickForm::createElement('radio', 'yesno3', '','ESSATLA  ', 0);
//$mform->addGroup($docente, 'radioar','Unidade de Ensino', array(' '), false);
//$mform->setDefault('yesno3', 1);

$mform->addElement('static', ' ', ' ','<br>');
$mform->addElement('static', ' ', ' ','<b>4. Objectivos da unidade curricular</b>');	
$mform->addElement('editor','objec',' ','maxlength="500" size="250" ');

$mform->addElement('static', ' ', ' ','<br>');
$mform->addElement('static', ' ', ' ','<b>5. Requisitos para frequência</b>');	
$mform->addElement('editor','requesite','','maxlength="300" size="150" ');

$mform->addElement('static', ' ', ' ','<br>');
$mform->addElement('static', ' ', ' ','<b>6. Programa<br>(de acordo com as competencias da unidade curricular enviadas ao MCTES):</b>');
$mform->addElement('editor','program',' ','maxlength="800" size="400" ');

$mform->addElement('static', ' ', ' ','<br>');	
$mform->addElement('static', ' ', ' ','<b>7. Bibliografia (máx.10 títulos)</b>');
$mform->addElement('text','biblioum','','maxlength="135" size="135" ');
$mform->addElement('text','bibliodois','','maxlength="135" size="135" ');
$mform->addElement('text','bibliotres','','maxlength="135" size="135" ');
$mform->addElement('text','biblioquatro','','maxlength="135" size="135" ');
$mform->addElement('text','bibliocinco','','maxlength="135" size="135" ');
$mform->addElement('text','biblioseis','','maxlength="135" size="135" ');
$mform->addElement('text','bibliosete','','maxlength="135" size="135" ');
$mform->addElement('text','bibliooito','','maxlength="135" size="135" ');
$mform->addElement('text','biblionove','','maxlength="135" size="135" ');
$mform->addElement('text','bibliodez','','maxlength="135" size="135" ');

$mform->addElement('static', ' ', ' ','<br>');
$mform->addElement('static', ' ', ' ','<b>8. Trabalho do aluno</b>');
$mform->addElement('static', ' ', ' ','Horas de Contacto com Docente (a)');
$mform->addElement('static', ' ', ' ','Distribuir o número de horas segundo o tipo de metodologia adoptada');
$mform->addElement('static', ' ', ' ','<table border="1" width="100%" cellpadding="1" cellspacing="1" align="right">');
$mform->addElement('static', ' ', ' ','<TR><TD align="left" rowspan="10" table border="4">Horas de Contacto<br> com Docente (a)<br> <br> Distribuir o número de horas<br> segundo o tipo de metodologia<br> adoptada');
$mform->addElement('static', ' ', ' ','<TR><TH>TIPO<TH>HORAS*');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Aulas Teóricas');
$mform->addElement('text','aulasteoricas','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Aulas Teórico-práticas');
$mform->addElement('text','aulastp','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Aulas Práticas Laboratoriais');
$mform->addElement('text','aulaspum','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Trabalho de Campo Orientado');
$mform->addElement('text','trabcampori','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Seminários');
$mform->addElement('text','seminario','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Estágio');
$mform->addElement('text','estagioum','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Orientação Tutorial');
$mform->addElement('text','oritutorial','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Outras');
$mform->addElement('text','outrasum','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TV rowspan="1"><TH colspan="3"> ');

$mform->addElement('static', ' ', ' ','<TR><TD align="left" rowspan="7">Horas de Trabalho Autónomo (b)<br><br>Distribuir o número de<br> horas de trabalho estimado<br> dos alunos para além das horas<br> de contacto com o docente');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Estágio');
$mform->addElement('text','estagiodois','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Projectos e Trabalhos');
$mform->addElement('text','projtraba','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Trabalho de Campo');
$mform->addElement('text','trabacampo','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Estudo');
$mform->addElement('text','estudo','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Avaliação');
$mform->addElement('text','aval','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Outras');
$mform->addElement('text','outrasdois','<TD>','maxlength="4" size="4" ');
$mform->addElement('static', ' ', ' ','<TR><TV rowspan="1"><TH colspan="3"> ');

$mform->addElement('static', ' ', ' ','<TR><TD align="left">Total de Horas (a+b)<TD>&nbsp;');
$mform->addElement('text','totalh','<TD>','maxlength="3" size="3" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Créditos Calculados<TD>&nbsp;');
$mform->addElement('text','creditcalc','<TD>','maxlength="3" size="3" ');
$mform->addElement('static', ' ', ' ','<TR><TD align="left">Créditos (ECTS) Definidos<TD>&nbsp;');
$mform->addElement('text','creditects','<TD>','maxlength="3" size="3" ');

$mform->addElement('static', ' ', ' ','</TABLE>');
	
	$mform->addElement('static', ' ', ' ','<br>');
	$mform->addElement('static', ' ', ' ','<b>9. Métodos de ensino</b>');
	$mform->addElement('editor','metensino','','maxlength="800" size="400" ');
	
	$mform->addElement('static', ' ', ' ','<br>');
	$mform->addElement('static', ' ', ' ','<b>10. Métodos de avaliação</b>');
	$mform->addElement('static', ' ', ' ','<table border="1" width="100%" cellpadding="0" cellspacing="0">');
	$mform->addElement('static', ' ', ' ','<TR><TV rowspan="1"><TH colspan="3" align="right">Regime Geral de Avaliação Contínua');
	$mform->addElement('static', ' ', ' ','<TR><TH>Métodos de avaliação de<br>conhecimentos e competências<TH>Ponderação de<br>cada elemento*<TH>Assinalar o(s) elemento(s)<BR>de avaliação individual,<BR>presencial e arquivável (X)');
	$mform->addElement('static', ' ', ' ','<TR><TD align="left">Teste escrito');
	$mform->addElement('text','pondtesteescrito','<TD>','maxlength="3" size="3" ');
	$mform->addElement('text','pondtesteescritox','<TD>','maxlength="1" size="1" ');

	$mform->addElement('static', ' ', ' ','<TR><TD align="left">Trabalho escrito individual, com ou<br>sem apresentação/discussão oral');
	$mform->addElement('text','pondtrabescritoindiv','<TD>','maxlength="3" size="3" ');
	$mform->addElement('text','pondtrabescritoindivx','<TD>','maxlength="1" size="1" ');
	
	$mform->addElement('static', ' ', ' ','<TR><TD align="left"t">Trabalho escrito de grupo, com ou sem<br>apresentação/discussão oral');
	$mform->addElement('text','pondtrabescritogrupo','<TD>','maxlength="3" size="3" ');
	$mform->addElement('text','pondtrabescritogrupox','<TD>','maxlength="1" size="1" ');
	
	$mform->addElement('static', ' ', ' ','<TR><TD align="left"t">Trabalho prático individual');
	$mform->addElement('text','pondtrabpraticoindividual','<TD>','maxlength="3" size="3" ');
	$mform->addElement('text','pondtrabpraticoindividualx','<TD>','maxlength="1" size="1" ');
	
	$mform->addElement('static', ' ', ' ','<TR><TD align="left"t">Trabalho prático de grupo');
	$mform->addElement('text','pondtrabpraticogrupo','<TD>','maxlength="3" size="3" ');
	$mform->addElement('text','pondtrabpraticogrupox','<TD>','maxlength="1" size="1" ');
	
	$mform->addElement('static', ' ', ' ','<TR><TD align="left"t">Exposição oral de texto e/ou tema');
	$mform->addElement('text','pondexporal','<TD>','maxlength="3" size="3" ');
	$mform->addElement('text','pondexporalx','<TD>','maxlength="1" size="1" ');
	
	$mform->addElement('static', ' ', ' ','<TR><TV rowspan="1" align="left"><TD colspan="3" align="right">* O(s) elemento(s) de avaliação individual, presencial e arquivável(is) deve(m) ter uma<br>ponderação entre 60-75% da nota final e a sua classificação não pode ser inferior a 8 valores.');
	$mform->addElement('static', ' ', ' ','</TABLE>');

	$mform->addElement('static', ' ', ' ','<b>Observações:</b><br> Regime Geral de Avaliação por Exame (preencher após consulta do Regulamento de Alunos da ESSATLA)<br> Regime Específico (preencher após consulta dos Anexos aos Regulamentos de Alunos da UATLA ou da ESSATLA).');
		
		
		 $this->add_action_buttons();	
        //-------------------------------------------------------------------------------
        // add standard elements, common to all modules
        $this->standard_coursemodule_elements();
        //-------------------------------------------------------------------------------
        // add standard buttons, common to all modules
       
    }
}
