<?php

function matriculaApi($nombre, $apellidos, $dni, $celular, $email, $productoId, $moneda, $monto, $fechaTransaccion)
{

    //Conectarse a API Matricula

    $url = 'https://admin.intranetdmc.com/api/matricula-nueva';

    $data = [
        'nombres' => $nombre,
        'apellidos' => $apellidos,
        'numDocumento' => $dni,
        'celular' => $celular,
        'email' => $email,
        'moneda' => $moneda,
        'transferenciaMonto' => $monto,
        'fechaTransaccion' => $fechaTransaccion,
        'productoId' => $productoId,
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);

    $response = file_get_contents($url, false, $context);

    $newData = json_decode($response, true);

    return $newData;
}

$alumnos = array(

    /*array('nombres' => 'Sebastian', 'apellidos' => 'Cieza', 'numDocumento' => '71733076', 'email' => 'sebastian.ciezaa@gmail.com'),
    */
    array('nombres' => 'Daniel Darío', 'apellidos' => 'Segura Ferry', 'numDocumento' => '70124698', 'email' => 'seguraferrydaniel@gmail.com'),
    array('nombres' => 'Carlos José', 'apellidos' => 'Yáñez Gonzales', 'numDocumento' => '71860148', 'email' => 'carlosyanezgonzales@gmail.com'),
    array('nombres' => 'Hermes', 'apellidos' => 'Vizconde Olivares', 'numDocumento' => '09958888', 'email' => 'hermesvizconde@gmail.com'),
    array('nombres' => 'Richard', 'apellidos' => 'Sandoval', 'numDocumento' => '09855635', 'email' => 'rsandbar@gmail.com'),
    array('nombres' => 'Jhonatan Jean Pierre', 'apellidos' => 'Blanco Román', 'numDocumento' => '46173372', 'email' => 'jhonatanblancoroman@gmail.com'),
    array('nombres' => 'Robert', 'apellidos' => 'Sanchez', 'numDocumento' => '48106677', 'email' => 'robert.sanchez@kma.com.pe'),
    array('nombres' => 'Karen Angela', 'apellidos' => 'Ayala Flores', 'numDocumento' => '44837469', 'email' => 'ayalaflores.ka@gmail.com'),
    array('nombres' => 'NADIA', 'apellidos' => 'CASTILLO CENTURIÓN', 'numDocumento' => '46019212', 'email' => 'nadechca7@gmail.com'),
    array('nombres' => 'Daniela Belen', 'apellidos' => 'Caballero Soto', 'numDocumento' => '70184475', 'email' => 'danielabelen.cs@gmail.com'),
    array('nombres' => 'Kevin', 'apellidos' => 'Campos Cárdenas', 'numDocumento' => '70114217', 'email' => 'kevin.kcc17125@gmail.com'),
    array('nombres' => 'Jorge Luis', 'apellidos' => 'Diaz Salvatierra', 'numDocumento' => '42241720', 'email' => 'jorgediaz915@gmail.com'),
    array('nombres' => 'Danny', 'apellidos' => 'Lamas', 'numDocumento' => '08170392', 'email' => 'Dannylamas@gmail.com'),
    array('nombres' => 'Freddy Romeo', 'apellidos' => 'Alvarez Huayanay', 'numDocumento' => '42187371', 'email' => 'falvarez@mdh.com.pe'),
    array('nombres' => 'Luís', 'apellidos' => 'Gallardo', 'numDocumento' => '47069253', 'email' => 'luisgallardo17831@gmail.com'),
    array('nombres' => 'Christian', 'apellidos' => 'Castillo Cabanillas', 'numDocumento' => '72200349', 'email' => 'c.castillocabanillas@gmail.com'),
    array('nombres' => 'Jhonpiere Beltran', 'apellidos' => 'Beltran Valderrama', 'numDocumento' => '44418468', 'email' => 'JBELTRAN8736@GMAIL.COM'),
    array('nombres' => 'Anthony Edwin', 'apellidos' => 'Zegarra Eguiluz', 'numDocumento' => '76609315', 'email' => 'anthonyzegarra1997@gmail.com'),
    array('nombres' => 'JENIFER', 'apellidos' => 'SANCHEZ REQUEJO', 'numDocumento' => '47841767', 'email' => 'JENIFER.SANREQ@GMAIL.COM'),
    array('nombres' => 'Claudia Micaela', 'apellidos' => 'Villalba Santillan', 'numDocumento' => '47112880', 'email' => 'micaelavillalbas@gmail.com'),
    array('nombres' => 'JESUS EDUARDO', 'apellidos' => 'CHAUCA CRUZ', 'numDocumento' => '70052379', 'email' => 'jsschc@gmail.com'),
    array('nombres' => 'Hassler Klinsmann', 'apellidos' => 'León Pineda', 'numDocumento' => '72154320', 'email' => 'hassler.courses@gmail.com'),
    array('nombres' => 'Max Florencio', 'apellidos' => 'Cajo Chavez', 'numDocumento' => '76068163', 'email' => 'cajochavezmax@gmail.com'),
    array('nombres' => 'Edwin Jonathan', 'apellidos' => 'Cueva Huaman', 'numDocumento' => '74692318', 'email' => 'ecuevah16_1@unc.edu.pe'),
    array('nombres' => 'Eder Martin Luis', 'apellidos' => 'Cordova', 'numDocumento' => '70371056', 'email' => 'martinluis@outlook.com'),
    array('nombres' => 'Rodrigo', 'apellidos' => 'Callalli', 'numDocumento' => '72942247', 'email' => 'rodrigocallalli97@gmail.com'),
    array('nombres' => 'Maria Teresa Belermina', 'apellidos' => 'Quiroz Rojas', 'numDocumento' => '46797996', 'email' => 'Mariate.quiroz@gmail.com'),
    array('nombres' => 'SEBASTIAN FLORIANO', 'apellidos' => 'FLORIANO GUARDIA', 'numDocumento' => '42567377', 'email' => 'sfloriano05@gmail.com'),
    array('nombres' => 'James Frank', 'apellidos' => 'Beteta Maguiña', 'numDocumento' => '43002306', 'email' => 'jbetetam@uni.pe'),
    array('nombres' => 'PATRICIA', 'apellidos' => 'CHAMOCHUMBI', 'numDocumento' => '40088803', 'email' => 'patricia.chamochumbia@gmail.com'),
    array('nombres' => 'Jorge Alonso', 'apellidos' => 'Mendoza Blancas', 'numDocumento' => '75830149', 'email' => 'jamb1594@gmail.com'),
    array('nombres' => 'Gloria Priscila Rosas Vidal', 'apellidos' => 'Rosas Vidal', 'numDocumento' => '43326950', 'email' => 'rosas_priscila@hotmail.com'),
    array('nombres' => 'JUAN ABIRAM', 'apellidos' => 'TORRES GUEVARA', 'numDocumento' => '41710140', 'email' => 'juant2832@gmail.com'),
    array('nombres' => 'Erika Linda Hammer', 'apellidos' => 'Hammer Vicente', 'numDocumento' => '45883335', 'email' => 'erikahammer27@gmail.com'),
    array('nombres' => 'Kevin Fabrizio', 'apellidos' => 'Palza Carmona', 'numDocumento' => '73800896', 'email' => 'kevin.palza@gmail.com'),
    array('nombres' => 'Renato André', 'apellidos' => 'Huamaní Alarcón', 'numDocumento' => '72151917', 'email' => 'Renatohuamanialarcon@gmail.com'),
    array('nombres' => 'Jorge', 'apellidos' => 'Quiroz', 'numDocumento' => '42913820', 'email' => 'jorge.quiroz@marcobre.com'),
    array('nombres' => 'Yomar', 'apellidos' => 'vega mogollón', 'numDocumento' => '77690141', 'email' => 'yomarvegamogollon@gmail.com'),
    array('nombres' => 'Carlos', 'apellidos' => 'Villanueva', 'numDocumento' => '10264859', 'email' => 'carlos@villanueva.com.pe'),
    array('nombres' => 'Ricardo Félix', 'apellidos' => 'Félix fuentes', 'numDocumento' => '41029350', 'email' => 'ricardo.felix@forbislogistics.com'),
    array('nombres' => 'Oskar Omar', 'apellidos' => 'Ramirez Huayllara', 'numDocumento' => '44354987', 'email' => 'oskar.ramirez@outlook.com'),
    array('nombres' => 'Gladys Pamela', 'apellidos' => 'Pérez Piminchumo', 'numDocumento' => '73516837', 'email' => 'pamela.perezp14@gmail.com'),
    array('nombres' => 'Juan Carlos Damian', 'apellidos' => 'Damian Odar', 'numDocumento' => '46655977', 'email' => 'juan.damian.odar@gmail.com'),
    array('nombres' => 'Gustavo Fernando', 'apellidos' => 'Moya Estrada', 'numDocumento' => '03595105', 'email' => 'gustavo.moya.e@gmail.com'),
    array('nombres' => 'Gustavo', 'apellidos' => 'Chong-qui', 'numDocumento' => '0930414750', 'email' => 'gchongqui@hotmail.com'),
    array('nombres' => 'FREDDY JUNIOR', 'apellidos' => 'VALDIVIA MOSCOSO', 'numDocumento' => '41634284', 'email' => 'fvaldiviam2020@gmail.com'),
    array('nombres' => 'Yosselyn', 'apellidos' => 'Meza Neira', 'numDocumento' => '48209907', 'email' => 'bilibrodis.meza.ne@gmail.com'),
    array('nombres' => 'CARLOS LEVANO', 'apellidos' => 'LEVANO VALERIO', 'numDocumento' => '48078530', 'email' => 'clevanovalerio@gmail.com'),
    array('nombres' => 'Diego Josue', 'apellidos' => 'Morales Zapata', 'numDocumento' => '70606661', 'email' => 'diegoj.morales.z@gmail.com'),
    array('nombres' => 'Dana', 'apellidos' => 'Paredes Ynfante', 'numDocumento' => '70246525', 'email' => 'dana.paredes@pucp.pe'),
    array('nombres' => 'Stephany Paola', 'apellidos' => 'Gómez Vargas', 'numDocumento' => '47138783', 'email' => 'stephanygomezvargas@gmail.com'),
    array('nombres' => 'Rodrigo', 'apellidos' => 'Mandujano Masias', 'numDocumento' => '71940616', 'email' => 'rmandujanomasias@gmail.com'),
    array('nombres' => 'Diego Eduardo', 'apellidos' => 'Hinostroza Gonzales', 'numDocumento' => '47366963', 'email' => 'Dehinostrozagonzales@gmail.com '),
    array('nombres' => 'Lucero', 'apellidos' => 'Jimenez Medina', 'numDocumento' => '74852788', 'email' => 'jimenezmd.24@gmail.com'),
    array('nombres' => 'Luis Felipe', 'apellidos' => 'Basurto Aponte', 'numDocumento' => '70423044', 'email' => 'lfba179@gmail.com'),
    array('nombres' => 'Christian', 'apellidos' => 'Julca Segovia', 'numDocumento' => '40191745', 'email' => 'Cejotaese@gmail.com'),
    array('nombres' => 'Shirley', 'apellidos' => 'Romero Ampuero', 'numDocumento' => '72629868', 'email' => 'shirleyr93@hotmail.com'),
    array('nombres' => 'Enmanuel Jesus', 'apellidos' => 'Cuadros', 'numDocumento' => '48115402', 'email' => 'ecuadrosg36@gmail.com'),
    array('nombres' => 'Anthony Paul', 'apellidos' => 'Arias Alcides', 'numDocumento' => '70972899', 'email' => 'anthony.arias181@gmail.com'),
    array('nombres' => 'José', 'apellidos' => 'Castañeda Chilon', 'numDocumento' => '46039751', 'email' => 'jcastanedac8@gmail.com'),
    array('nombres' => 'CARLOS LEVANO', 'apellidos' => 'LEVANO VALERIO', 'numDocumento' => '48078530', 'email' => 'clevanovalerio@gmail.com'),
    array('nombres' => 'Anderson', 'apellidos' => 'Trujillo acuña', 'numDocumento' => '46751315', 'email' => 'anderson_3101@hotmail.com'),
    array('nombres' => 'Rocio', 'apellidos' => 'Callupe Llana', 'numDocumento' => '45315195', 'email' => 'rocio.callupe@gmail.com'),
    array('nombres' => 'Mijail Willy', 'apellidos' => 'Poma García', 'numDocumento' => '72535667', 'email' => 'cp9chap@gmail.com'),
    array('nombres' => 'Jamil Jafet', 'apellidos' => 'Moreno Grimaldo', 'numDocumento' => '75391693', 'email' => 'jamil.moreno@unmsm.edu.pe'),
    array('nombres' => 'Oscar Rodolfo', 'apellidos' => 'Gutierrez Araujo', 'numDocumento' => '45219124', 'email' => 'ogutara@gmail.com'),
    array('nombres' => 'Jarvik Willy', 'apellidos' => 'Chaccha Zarate', 'numDocumento' => '43520227', 'email' => 'Jarvik.chaccha@gmail.com'),
    array('nombres' => 'William Javier', 'apellidos' => 'Araujo Banchón', 'numDocumento' => '44526862', 'email' => 'williamdr_14@hotmail.com'),
    array('nombres' => 'Renzo David', 'apellidos' => 'Ballón Gallegos', 'numDocumento' => '41409606', 'email' => 'renzodavid.ballon@gmail.com'),
    array('nombres' => 'María Alejandra', 'apellidos' => 'Meza', 'numDocumento' => '73175569', 'email' => 'Maria.meza.co@gmail.com'),
    array('nombres' => 'Miguel', 'apellidos' => 'Ramos', 'numDocumento' => '48197727', 'email' => 'miguel.ramosc2402@gmail.com'),
    array('nombres' => 'Fernando', 'apellidos' => 'Miranda Marroquin', 'numDocumento' => '44163452', 'email' => 'fernando.miranda@marcobre.com'),
    array('nombres' => 'Katterin Lucero', 'apellidos' => 'Lopez Nieto', 'numDocumento' => '75281027', 'email' => 'kattlopezn1@gmail.com'),
    array('nombres' => 'Claudia', 'apellidos' => 'Castro', 'numDocumento' => '73186284', 'email' => 'Claudialucie.97@gmail.com'),
    array('nombres' => 'Danny Jefferson', 'apellidos' => 'Romero Carrasco', 'numDocumento' => '47522405', 'email' => 'dannyromerocarrasco@gmail.com'),
    array('nombres' => 'OLIVER PARDO', 'apellidos' => 'PARDO MAYDANA', 'numDocumento' => '3489649', 'email' => 'opardo@redenlace.com.bo'),
    array('nombres' => 'Litzana Valentina', 'apellidos' => 'Rodríguez Bautista', 'numDocumento' => '45425194', 'email' => 'sarukrp@gmail.com'),
    array('nombres' => 'William Stiven', 'apellidos' => 'Gamarra Apestegui', 'numDocumento' => '75356922', 'email' => 'william1210ga@hotmail.com'),
    array('nombres' => 'Miguel', 'apellidos' => 'Mercado Gervasi', 'numDocumento' => '42411228', 'email' => 'Mmercadog24@gmail.com'),
    array('nombres' => 'Walter', 'apellidos' => 'velasquez', 'numDocumento' => '46632723', 'email' => 'wvelasqz@gmail.com'),
    array('nombres' => 'Jonathan Jackson', 'apellidos' => 'Palomares Morales', 'numDocumento' => '41707655', 'email' => 'Jjpalomaresm@gmail.com'),
    array('nombres' => 'Alex', 'apellidos' => 'Portocarrero Samalvides', 'numDocumento' => '10281717', 'email' => 'alexportocarrero03@hotmail.com'),
    array('nombres' => 'Miguel Carrillo', 'apellidos' => 'Carrillo Meza', 'numDocumento' => '73003835', 'email' => 'miguel.carrillo.meza@gmail.com'),
    array('nombres' => 'Masiel', 'apellidos' => 'mansilla', 'numDocumento' => '74095097', 'email' => 'mmansillayo@gmail.com'),
    array('nombres' => 'Francisco Javier', 'apellidos' => 'Figueroa Ventura', 'numDocumento' => '43657150', 'email' => 'ffigueroav5@gmail.com'),
    array('nombres' => 'Krystel', 'apellidos' => 'Zevallos', 'numDocumento' => '76555574', 'email' => 'krystelzevallos@gmail.com'),
    array('nombres' => 'Bruno Jair Jaziel', 'apellidos' => 'Zorrilla Quispe', 'numDocumento' => '70552197', 'email' => 'bruno1097zorrilla@gmail.com'),
    array('nombres' => 'Norma Nicole', 'apellidos' => 'alvarado laura', 'numDocumento' => '75589812', 'email' => 'nalvarado981@gmail.com'),
    array('nombres' => 'Adrian Ronaldo', 'apellidos' => 'Jimenez Peña', 'numDocumento' => '70287242', 'email' => 'radrianjimenezp@gmail.com'),
    array('nombres' => 'Freddy', 'apellidos' => 'Torres Cortez', 'numDocumento' => '0923213052', 'email' => 'freddy.torres121@gmail.com'),
    array('nombres' => 'Luciano Diburga', 'apellidos' => 'Diburga Ricci', 'numDocumento' => '73796849', 'email' => 'lucianodiburga@gmail.com'),
    array('nombres' => 'Fernando', 'apellidos' => 'Miranda Marroquín', 'numDocumento' => '44163452', 'email' => 'fernando.miranda@marcobre.com'),
    array('nombres' => 'Douglas Gabriel', 'apellidos' => 'Palacios Garcia', 'numDocumento' => '72452484', 'email' => 'Douglas_Palacios1997@outlook.es'),
    array('nombres' => 'Brian Steven', 'apellidos' => 'García Ríos', 'numDocumento' => '47840554', 'email' => 'brian.garcia.rios@gmail.com'),
    array('nombres' => 'Vladimir', 'apellidos' => 'Cordova Rosas', 'numDocumento' => '77812985', 'email' => 'Vladix1911@gmail.com'),
    array('nombres' => 'Romina', 'apellidos' => 'Guevara Acevedo', 'numDocumento' => '75853823', 'email' => 'romina.guevara@pucp.edu.pe'),
    array('nombres' => 'Miguel Angel', 'apellidos' => 'Roca Carhuayano', 'numDocumento' => '75372884', 'email' => 'm.rocacarhuayano@gmail.com'),
    array('nombres' => 'Lucero Fabiola', 'apellidos' => 'Pérez Goñi', 'numDocumento' => '70000067', 'email' => 'fabiolagoni25@gmail.com'),
    array('nombres' => 'Diego Armando', 'apellidos' => 'Torres Vicente', 'numDocumento' => '74324707', 'email' => 'diar100897@gmail.com'),
    array('nombres' => 'Guillermo', 'apellidos' => 'Alegre Lam', 'numDocumento' => '42445615', 'email' => 'Guillermo.alegre@pucp.edu.pe'),
    array('nombres' => 'Claudia', 'apellidos' => 'Barrios', 'numDocumento' => '74035249', 'email' => 'barriosclaudia21@gmail.com'),
    array('nombres' => 'Juan', 'apellidos' => 'Hernandez', 'numDocumento' => '74941898', 'email' => 'jhernandezc@pucp.pe'),
    array('nombres' => 'José Alberto', 'apellidos' => 'Nacarino Fernández', 'numDocumento' => '45818659', 'email' => 'jnacarinof@gmail.com'),
    array('nombres' => 'Arturo', 'apellidos' => 'Aliaga Nicacio', 'numDocumento' => '42712845', 'email' => 'ing.arturoaliaga@gmail.com'),
    array('nombres' => 'Eduardo', 'apellidos' => 'benavente', 'numDocumento' => '72430389', 'email' => 'Carlos.edu.benavente@gmail.com'),
    array('nombres' => 'Pablo', 'apellidos' => 'Alcarraz', 'numDocumento' => '40340733', 'email' => 'Palcarraz17@gmail.com '),
    array('nombres' => 'Julio Cesar', 'apellidos' => 'Cuba Espinoza', 'numDocumento' => '42569364', 'email' => 'cuesjuce@outlook.com'),
    array('nombres' => 'Antony', 'apellidos' => 'Mendoza', 'numDocumento' => '99999912', 'email' => 'By.peruvian@hotmail.com'),
    array('nombres' => 'Rolando Antonio', 'apellidos' => 'Arellano Arellano', 'numDocumento' => '07490686', 'email' => 'rolando.arellano.a@gmail.com'),
    array('nombres' => 'Jose', 'apellidos' => 'gallardo', 'numDocumento' => '181812156', 'email' => 'Jcgallardom@hotmail.com '),
    array('nombres' => 'Daniela', 'apellidos' => 'Zunini Yengle', 'numDocumento' => '70006071', 'email' => 'daniela.zunini.yengle@gmail.com'),
    array('nombres' => 'Reyner Omar', 'apellidos' => 'Yarleque Cruz', 'numDocumento' => '72023317', 'email' => 'reyner.yarleque@alum.udep.edu.pe'),
    array('nombres' => 'Nicholas Xavier', 'apellidos' => 'Marengo Rojas', 'numDocumento' => '44782863', 'email' => 'nickixavier10@gmail.com'),
    array('nombres' => 'Paolo Kevin', 'apellidos' => 'gambini Valverde', 'numDocumento' => '70163250', 'email' => 'Kevingambini06@gmail.com'),
    array('nombres' => 'José Eduardo', 'apellidos' => 'Ormeño Meneses', 'numDocumento' => '72404979', 'email' => 'eduardoorm79@gmail.com'),
    array('nombres' => 'Jeniffer', 'apellidos' => 'Chilon', 'numDocumento' => '47404146', 'email' => 'ctorresjeniffer@gmail.com'),
    array('nombres' => 'Nicholas Xavier', 'apellidos' => 'Marengo Rojas', 'numDocumento' => '44782863', 'email' => 'nickixavier10@gmail.com'),
    array('nombres' => 'Eduardo', 'apellidos' => 'prado melendez', 'numDocumento' => '46485842', 'email' => 'eprado.melendez@gmail.com'),
    array('nombres' => 'Cesar', 'apellidos' => 'Quezada', 'numDocumento' => '45194569', 'email' => 'Cesarmqb@gmail.com'),

);
$fecha_actual = date("Y-m-d H:i:s");
foreach ($alumnos as $key => $valor) {
    var_dump(matriculaApi($valor['nombres'], $valor['apellidos'], $valor['numDocumento'], null, $valor['email'], 2587, 's', 0, null));
    //  var_dump($valor);
}
