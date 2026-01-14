<?php

error_reporting(E_ALL);

ini_set('max_execution_time', '3600');
ini_set('display_errors', '1');

require_once "dao_certificado.php";

$certificado = new certificadoPDF();


$testing = array(
    array('nombreApellidos'=>'Aaron Fidel Alencastre Mercado','correo'=>'aaron.alencastre@gmail.com','nombre'=>'Aaron','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Alanis Alessandra Zamalloa Menacho','correo'=>'alanisazm23@gmail.com','nombre'=>'Alanis','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Alejandra Lucia Aranibar Rivera ','correo'=>'alejandra.aranibar@ucsp.edu.pe','nombre'=>'Alejandra','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Alexa Bustamante','correo'=>'pam_34_43@hotmail.com','nombre'=>'Alexa','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Alexandra Zumico Miranda Valle','correo'=>'zumiko14gaus@hotmail.com','nombre'=>'Alexandra','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Alexia Pamela Alvis Rojas ','correo'=>'alexiaar52@gmail.com','nombre'=>'Alexia','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Alonso Sadaaki Sasagawa Quiroz','correo'=>'alfonsoquiroz4@gmail.com','nombre'=>'Alonso','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Amy María Huancas Montero','correo'=>'amyhmont@gmail.com','nombre'=>'Amy','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Annett Prycyla Atau Ascencio','correo'=>'prycy12@hotmail.com','nombre'=>'Annett','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Antony Ricardo Cornejo Cuti','correo'=>'antony_cornejo@usmp.pe','nombre'=>'Antony','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Augusto André Cabrera Romero','correo'=>'augustocr032193@gmail.com','nombre'=>'Augusto','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Dana Karoline Cabrera Alburqueque','correo'=>'karolcabrera0809@gmail.com','nombre'=>'Dana','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Daniel Francisco Albarracin Carnero','correo'=>'daniel.albarracin@ucsp.edu.pe','nombre'=>'Daniel','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Daniela Nicole Chavez Alvites','correo'=>'zebachnad17@hotmail.com','nombre'=>'Daniela','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Elard Nicolas Zegarra Rivera','correo'=>'a20160878@pucp.edu.pe','nombre'=>'Elard','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Elisabet Curay Farias','correo'=>'elisa_curay29@outlook.es','nombre'=>'Elisabet','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Estefany Lady Leon Vega','correo'=>'estefanyleonvega@gmail.com','nombre'=>'Estefany','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Fátima Solange Valdivia Chuquitaype','correo'=>'fati.sol.valdivia@gmail.com','nombre'=>'Fátima','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Fernanda Leonor Castro Alarcon','correo'=>'fernanda_only@hotmail.es','nombre'=>'Fernanda','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Fiorella Alexandra Velazco Zegarra','correo'=>'fiorella.velazco@ucsp.edu.pe','nombre'=>'Fiorella','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Fiorella Lisette Godoy Albornoz','correo'=>'fgodoy.4a.et@gmail.com','nombre'=>'Fiorella','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Flavia Renata Ochoa Martinez','correo'=>'flavia.ochoa@ucsp.edu.pe','nombre'=>'Flavia','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Flor Xiomara Chacón Guillén','correo'=>'fchacong@unsa.edu.pe','nombre'=>'Flor','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Francy Kasandra Mamani Llaique ','correo'=>'francykasandra17@gmail.com','nombre'=>'Francy','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Frank Esteban Sánchez Chicana','correo'=>'frank.sanchez@pucp.edu.pe','nombre'=>'Frank','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Gabriela Alexandra Huarancca Ocoruro ','correo'=>'ghuarancca@unsa.edu.pe','nombre'=>'Gabriela','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Gabriela Paola Veliz Ponce','correo'=>'velizpaola6@gmail.com','nombre'=>'Gabriela','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Gerardo Josué González Sánchez','correo'=>'gerardo.gonzalez@pucp.edu.pe','nombre'=>'Gerardo','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Gledy Cinthya Huahuala Chire','correo'=>'gledy.cinthya.15@gmail.com','nombre'=>'Gledy','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Grecia Sheryl Vasquez Chamorro','correo'=>'sheryl19958@gmail.com','nombre'=>'Grecia','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Héctor Daniel Navarro Castro','correo'=>'danonavarrocastro@gmail.com','nombre'=>'Héctor','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Henry Yerik Málaga Cárdenas','correo'=>'hymalagac@hotmail.com','nombre'=>'Henry','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Hingler David Atayupanqui Tito','correo'=>'hingleratayupanqui@gmail.com','nombre'=>'Hingler','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Howar Elard Clemente Mamani','correo'=>'howlardclementezape@gmail.com','nombre'=>'Howar','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Isaac Misael Rojas Herrera','correo'=>'isaac23arm@gmail.com','nombre'=>'Isaac','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Jarod Yanqui Magallan','correo'=>'jarod.yanqui@pucp.edu.pe','nombre'=>'Jarod','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Jean Piers Rodrigo Aytite Centty ','correo'=>'jean.aytite@ucsp.edu.pe','nombre'=>'Jean','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Jessica Cota Rosello ','correo'=>'jcota@unsa.edu.pe','nombre'=>'Jessica','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Jhojan Pierre Mautino Vidaurre','correo'=>'mauvi.jp@gmail.com','nombre'=>'Jhojan','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Joan Daniel Choquehuanca Luque','correo'=>'N00067533@upn.pe','nombre'=>'Joan','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Johana Geraldine Alvarez Peña','correo'=>'johana032896@gmail.com','nombre'=>'Johana','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Jose Evaristo Manayay Sánchez','correo'=>'pc1manayay@gmail.com','nombre'=>'Jose','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Jose Puma Condori','correo'=>'jose.puma.condori@ucsp.edu.pe','nombre'=>'Jose','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Karen Seisén Chaquilla Cayo ','correo'=>'karen.chaquilla@ucsp.edu.pe','nombre'=>'Karen','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Katherine Lizet Fora Zuni ','correo'=>'kfora@unsa.edu.pe','nombre'=>'Katherine','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Katherine Yanella Sebastián Marquina','correo'=>'katiyane.12@gmail.com','nombre'=>'Katherine','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Kenyi Gethsu Saavedra Mendoza','correo'=>'kenyi981930280@gmail.com','nombre'=>'Kenyi','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Laura Sophia Salazar Salas','correo'=>'lsalazarsa@unsa.edu.pe','nombre'=>'Laura','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Leydi Yusney Ramos Huamani','correo'=>'leyyus12@gmail.com','nombre'=>'Leydi','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Lindsay Samantha Rendon Taco','correo'=>'lrendon@unsa.edu.pe','nombre'=>'Lindsay','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Lisbeth Yajaira Merma Villavicencio','correo'=>'lisbeth.merma@ucsp.edu.pe','nombre'=>'Lisbeth','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'LIZBETH NICKOL RODRIGUEZ SANCHEZ','correo'=>'lrodriguezs@unsa.edu.pe','nombre'=>'LIZBETH','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Lucero De Los Angeles Huaracallo Coaquira','correo'=>'lucehuaracallo@hotmail.com','nombre'=>'Lucero','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Lucy Paty Luna Ttito','correo'=>'75928446@continental.edu.pe','nombre'=>'Lucy','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Luis Alberto Cutipa Cutipa','correo'=>'luis.cutipa1410@gmail.com','nombre'=>'Luis','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'luis enrique suarez fernandez','correo'=>'lsuarez@unsa.edu.pe','nombre'=>'luis','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Luis Guillermo Benites Laso','correo'=>'lgoctober14@gmail.com','nombre'=>'Luis','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Majerly Katleen Vilca Peralta ','correo'=>'Majerlyv@gmail.com','nombre'=>'Majerly','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'María Alejandra Vargas Solis ','correo'=>'maria29vs@gmail.com','nombre'=>'María','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Maria Fernanda Postigo Del Carpio','correo'=>'mariafernanda.postigo@ucsp.edu.pe','nombre'=>'Maria','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Maria Lourdes Mamani Mamani','correo'=>'mamamanim@unsa.edu.pe','nombre'=>'Maria','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Maribel Milagros Mamani Arizaca','correo'=>'mmamaniar@unsa.edu.pe','nombre'=>'Maribel','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Mariluz Lizet Basurco Luque','correo'=>'mariluzbasurco11@gmail.com','nombre'=>'Mariluz','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Marisela Enriquez Chávez','correo'=>'menriquezch@outlook.com','nombre'=>'Marisela','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Marjorie Nicole Geronimo Valverde ','correo'=>'marjorieg158@gmail.com','nombre'=>'Marjorie','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Melanie Briggite Paz Llamocca','correo'=>'m.paz9530@gmail.com','nombre'=>'Melanie','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Melany Maryory Taco Huanqui','correo'=>'71079635@continental.edu.pe','nombre'=>'Melany','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Miguel Iván Becerra Guerrero','correo'=>'miguel_102010@hotmail.com','nombre'=>'Miguel','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Milagros Alejandra Gutiérrez Sosa ','correo'=>'milalesosa@gmail.com','nombre'=>'Milagros','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Miranda Rosario Briceño Aedo','correo'=>'miranda.briceno@ucsp.edu.pe','nombre'=>'Miranda','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Miryam Lizeth Ramirez Rodriguez ','correo'=>'miryam.ramirez23.4@gmail.com','nombre'=>'Miryam','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Mónica Cuti Magaño','correo'=>'mcutim@unsa.edu.pe','nombre'=>'Mónica','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Nanyeli Nicole Cornejo Ccana','correo'=>'ncornejoc@unsa.edu.pe','nombre'=>'Nanyeli','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Natalia Pacheco Conde','correo'=>'nata-pc-25@hotmail.com','nombre'=>'Natalia','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Nelly Victoria Huanca Puntillo','correo'=>'nellyhuanca@outlook.com','nombre'=>'Nelly','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Nicole Estephany Castro Blanco','correo'=>'ncastrob@unsa.edu.pe','nombre'=>'Nicole','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Patrick Edson Mendoza Palma ','correo'=>'patmen1197@gmail.com','nombre'=>'Patrick','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Pierina López Heredia','correo'=>'pierinalopezh@hotmail.com','nombre'=>'Pierina','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Rayza Alexandra Talavera Paz ','correo'=>'rayzaale@gmail.com','nombre'=>'Rayza','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Renzo Manani Rojas','correo'=>'renzo.200486@hotmail.com','nombre'=>'Renzo','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Renzo Rey Salazar','correo'=>'reysalazarrenzo@gmail.com','nombre'=>'Renzo','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Rivelino Saulo Díaz Alipio','correo'=>'river9610@hotmail.com','nombre'=>'Rivelino','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Roxana Tapia Coronado','correo'=>'Roxanatc30@gmail.com','nombre'=>'Roxana','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Sandy Alicia Villafuerte Alata','correo'=>'schoquef@uni.pe','nombre'=>'Sandy','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Stefany Alison Canaza Vilca','correo'=>'scanazav@unsa.edu.pe','nombre'=>'Stefany','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Valeria Priscila Tello Huayapa','correo'=>'valeria.tello@ucsp.edu.pe','nombre'=>'Valeria','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Valmi Zadid Cancino Maque ','correo'=>'valmi.cancino.01@gmail.com','nombre'=>'Valmi','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Victor Hugo Pastor Aruhuanca','correo'=>'indumecvic@gmail.com','nombre'=>'Victor','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Yardali Naydu Gómez Moroco ','correo'=>'alma_mia_jesus@hotmail.com','nombre'=>'Yardali','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),
array('nombreApellidos'=>'Yoselyn Lizeth Sánchez Mamani ','correo'=>'yoselyn.sanchez@ucsp.edu.pe','nombre'=>'Yoselyn','capacitacion'=>'Generación de un tablero de cobranzas de alto impacto en Power BI','codigo'=>'','horas'=>5,'calificacion'=>14),


);

foreach ($testing as $key => $valor) {

    $asunto = "Certificado de Participación: ".$valor["capacitacion"];

    $nombre = urlencode($valor["nombreApellidos"]);
    
    $capacitacion = urlencode($valor["capacitacion"]);

    $fechaFin = "2020-08-04";
    
    $url = "https://survey.dmc.pe/academico/certificado_generador.php?codigo=".$valor['codigo']."&nombreApellidos=".$nombre."&capacitacion=".$capacitacion."&notas=".$valor["calificacion"]."&horas=".$valor["horas"]."&fechaFin=".$fechaFin."&tipo=Congreso";

    $mensaje = $certificado->mensaje_certificado_digital_congreso($valor["nombre"]);

    //echo $valor['correo'];
    var_dump($certificado->send_mail("Área Académica",$valor['correo'],$valor['nombre'],"",$url,"certificado",$asunto,$mensaje));
    var_dump($certificado->send_mail("Área Académica","contacto.ereii2020@gmail.com",$valor['nombre'],"",$url,"certificado",$asunto,$mensaje));

    echo $url;    
    # code...
}




?>