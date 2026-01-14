<?php

function matriculaApi($nombre, $apellidos, $dni, $celular, $email, $productoId, $moneda, $monto, $fechaTransaccion)
{

    set_time_limit(600000);

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
    /*array('nombres' => 'César Alfredo', 'apellidos' => 'Ayllón Gonzales', 'numDocumento' => null, 'email' => 'cesarayllonpersonal@gmail.com', 'celular' => '+51947664948', 'servicio_id' => 2587),
    array('nombres' => 'Valery Gabriela', 'apellidos' => 'Cardoza Aponte', 'numDocumento' => null, 'email' => 'valerycardoza28@gmail.com', 'celular' => '+51987240411', 'servicio_id' => 2587),
    array('nombres' => 'Oscar', 'apellidos' => 'Verastegui', 'numDocumento' => null, 'email' => 'overastegui@bcp.com.pe', 'celular' => '+51996572983', 'servicio_id' => 2587),
    array('nombres' => 'Jhoseline Denisse', 'apellidos' => 'Alva Gazani', 'numDocumento' => null, 'email' => 'jd.alvag@gmail.com', 'celular' => '+51978251224', 'servicio_id' => 2587),
    array('nombres' => 'Geisson Lelis', 'apellidos' => 'Rueda Fernandez', 'numDocumento' => null, 'email' => 'ge.rueda.fer@gmail.com', 'celular' => '+51985301073', 'servicio_id' => 2587),
    array('nombres' => 'Andrea Ttito', 'apellidos' => 'Carazas', 'numDocumento' => null, 'email' => 'andreattito1401@gmail.com', 'celular' => '+51974683367', 'servicio_id' => 2587),
    array('nombres' => 'Jeremy', 'apellidos' => 'Villanueva', 'numDocumento' => null, 'email' => 'jeremyvillanueva@gmail.com', 'celular' => '+51918083546', 'servicio_id' => 2587),
    array('nombres' => 'Liz', 'apellidos' => 'Mejia', 'numDocumento' => null, 'email' => 'liz.m.df.sbo@gmail.com', 'celular' => '+51997978545', 'servicio_id' => 2587),
    array('nombres' => 'Manuel Alejandro', 'apellidos' => 'Povis Arias', 'numDocumento' => null, 'email' => 'manuel_povis@usmp.pe', 'celular' => '+51986415483', 'servicio_id' => 2587),
    array('nombres' => 'Julie', 'apellidos' => 'Saucedo', 'numDocumento' => null, 'email' => 'juliesaucedol@bcp.com.pe', 'celular' => '+51975521864', 'servicio_id' => 2587),
    array('nombres' => 'Eduardo', 'apellidos' => 'Carpio', 'numDocumento' => null, 'email' => 'eduardocarpiocontreras@gmail.com', 'celular' => '+51945087068', 'servicio_id' => 2587),
    array('nombres' => 'Sandra', 'apellidos' => 'Carmona', 'numDocumento' => null, 'email' => 'smarinacf@gmail.com', 'celular' => '+51964263063', 'servicio_id' => 2587),
    array('nombres' => 'Iván Arturo', 'apellidos' => 'García Ruesta', 'numDocumento' => null, 'email' => 'ivangarciar@bcp.com', 'celular' => '+51973157894', 'servicio_id' => 2587),
    array('nombres' => 'Gabriela Angelie', 'apellidos' => 'Ortiz Ames', 'numDocumento' => null, 'email' => 'gabrielaortiza@bcp.com.pe', 'celular' => '+51980501730', 'servicio_id' => 2587),
    array('nombres' => 'Max', 'apellidos' => 'Casanca', 'numDocumento' => null, 'email' => 'max.casanca@gmail.com', 'celular' => '+51922149748', 'servicio_id' => 2587),
    array('nombres' => 'Nathalia', 'apellidos' => 'Aguirre Ingunza', 'numDocumento' => null, 'email' => 'n.aguirre@pucp.edu.pe', 'celular' => '+51953648855', 'servicio_id' => 2587),
    array('nombres' => 'José', 'apellidos' => 'Yaya', 'numDocumento' => null, 'email' => 'jose.miguel.yaya@gmail.com', 'celular' => '+51997368153', 'servicio_id' => 2587),
    array('nombres' => 'Juan Carlos', 'apellidos' => 'Carlos', 'numDocumento' => null, 'email' => 'juancarlosp@gmail.con', 'celular' => '+51947327632', 'servicio_id' => 2587),
    array('nombres' => 'Diego Alonso', 'apellidos' => 'Murrieta Reaño', 'numDocumento' => null, 'email' => 'Diegoarrara@gmail.com', 'celular' => '+51997631444', 'servicio_id' => 2587),
    array('nombres' => 'Angela Mireya', 'apellidos' => 'Quiquia Cajahuanca', 'numDocumento' => null, 'email' => 'angelaquiquiac@gmail.com', 'celular' => '+51921668985', 'servicio_id' => 2587),
    array('nombres' => 'Joselyn Alexandra', 'apellidos' => 'Davila Alayo', 'numDocumento' => null, 'email' => 'joselyndavilaalayo@gmail.com', 'celular' => '+51901662862', 'servicio_id' => 2587),
    array('nombres' => 'Angélica Andrea', 'apellidos' => 'Guidotti Acuña', 'numDocumento' => null, 'email' => 'vanesaguidottiacuna@gmail.com', 'celular' => '+51922756475', 'servicio_id' => 2587),
    array('nombres' => 'Manuel Jesús', 'apellidos' => 'Ruiz Chacchchi', 'numDocumento' => null, 'email' => 'manuel.ruiz.chacchi@gmail.com', 'celular' => '+51993662008', 'servicio_id' => 2587),
    array('nombres' => 'Miluzca', 'apellidos' => 'Navarro', 'numDocumento' => null, 'email' => 'miluzcapamela@gmail.com', 'celular' => '+51910035280', 'servicio_id' => 2587),
    array('nombres' => 'Edwin', 'apellidos' => 'Marchena', 'numDocumento' => null, 'email' => 'marchenaedwinj@gmail.com', 'celular' => '+51961359605', 'servicio_id' => 2587),
    array('nombres' => 'Silvia', 'apellidos' => 'Fuentes Castro', 'numDocumento' => null, 'email' => 'silvia_fuentescastro@hotmail.com', 'celular' => '+51948929082', 'servicio_id' => 2587),
    array('nombres' => 'Yuliana', 'apellidos' => 'Castillo', 'numDocumento' => null, 'email' => 'yulianacastillos@bcp.com.pe', 'celular' => '+51994889812', 'servicio_id' => 2587),
    array('nombres' => 'Daniela', 'apellidos' => 'Grimaldo', 'numDocumento' => null, 'email' => 'dgrimaldo8.2@gmail.con', 'celular' => '+51942807275', 'servicio_id' => 2587),
    array('nombres' => 'Daniel', 'apellidos' => 'Dominguez', 'numDocumento' => null, 'email' => 'dadb14@hotmail.com', 'celular' => '+51947960150', 'servicio_id' => 2587),
    array('nombres' => 'Frank Carlo', 'apellidos' => 'Pajuelo Torres', 'numDocumento' => null, 'email' => 'fpajuelot@gmail.com', 'celular' => '+51965806018', 'servicio_id' => 2587),
    array('nombres' => 'Elvis Maza', 'apellidos' => 'Maza Honorio', 'numDocumento' => null, 'email' => 'elvismh1223@gmail.com', 'celular' => '+51993680367', 'servicio_id' => 2587),
    array('nombres' => 'Miriam', 'apellidos' => 'Sinche', 'numDocumento' => null, 'email' => 'roxanasinche@hotmail.com', 'celular' => '+51938860503', 'servicio_id' => 2587),
    array('nombres' => 'Gloria Stephany', 'apellidos' => 'Cisneros Condori', 'numDocumento' => null, 'email' => 'gloriacisneros457@gmail.com', 'celular' => '+51912256137', 'servicio_id' => 2587),
    array('nombres' => 'Renzo', 'apellidos' => 'Pañahua', 'numDocumento' => null, 'email' => 'r3nzopp@gmail.com', 'celular' => '+51947396414', 'servicio_id' => 2587),
    array('nombres' => 'Kely Moreno', 'apellidos' => 'Moreno Palomino', 'numDocumento' => null, 'email' => 'kmoreno@bcp.com.pe', 'celular' => '+51934724737', 'servicio_id' => 2587),
    array('nombres' => 'Franco Khaled', 'apellidos' => 'Tello Palacios', 'numDocumento' => null, 'email' => 'khaledtello@bcp.com.pe', 'celular' => '+51923739367', 'servicio_id' => 2587),
    array('nombres' => 'Diego Fernando', 'apellidos' => 'Arosquipa Rojas', 'numDocumento' => null, 'email' => 'diego.arosquipa@gmail.com', 'celular' => '+51965372873', 'servicio_id' => 2587),
    array('nombres' => 'Lucia Alejo', 'apellidos' => 'Alejo Loayza', 'numDocumento' => null, 'email' => 'lucia_19al@hotmail.com', 'celular' => '+51932248404', 'servicio_id' => 2587),
    array('nombres' => 'Jennifer', 'apellidos' => 'Solis', 'numDocumento' => null, 'email' => 'jenniferleslysolis1577@gmail.com', 'celular' => '+51921604639', 'servicio_id' => 2587),
    array('nombres' => 'Anyela', 'apellidos' => 'Angulo Ortiz', 'numDocumento' => null, 'email' => 'anyelaanguloortiz@gmail.com', 'celular' => '+51997175576', 'servicio_id' => 2587),
    array('nombres' => 'Katherine', 'apellidos' => 'Diaz', 'numDocumento' => null, 'email' => 'kty12d_xto@hotmail.com', 'celular' => '+51940251200', 'servicio_id' => 2587),
    array('nombres' => 'Rosa', 'apellidos' => 'Ludeña Cordova', 'numDocumento' => null, 'email' => 'rositalude2608@gmail.com', 'celular' => '+51934293158', 'servicio_id' => 2587),
    array('nombres' => 'Angely', 'apellidos' => 'Lozano Dávila', 'numDocumento' => null, 'email' => 'angelylozanodavila1699@gmail.com', 'celular' => '+51991881194', 'servicio_id' => 2587),
    array('nombres' => 'Roxana', 'apellidos' => 'Mescco Pacori', 'numDocumento' => null, 'email' => 'roxy.mescco@gmail.com', 'celular' => '+51993621638', 'servicio_id' => 2587),
    array('nombres' => 'Fernando Guillermo', 'apellidos' => 'Verastegui Sanchez', 'numDocumento' => null, 'email' => 'f.verastegui@pucp.edu.pe', 'celular' => '+51906793233', 'servicio_id' => 2587),
    array('nombres' => 'Elida', 'apellidos' => 'Ponce Ore', 'numDocumento' => null, 'email' => 'eponceore@gmail.com', 'celular' => '+51933964980', 'servicio_id' => 2587),
    array('nombres' => 'Fiorella Denisse', 'apellidos' => 'Motta Ypanaque', 'numDocumento' => null, 'email' => 'fiorella.motta4@gmail.com', 'celular' => '+51992500529', 'servicio_id' => 2587),
    array('nombres' => 'Angello', 'apellidos' => 'Panta', 'numDocumento' => null, 'email' => 'apantam@pucp.edu.pe', 'celular' => '+51960253747', 'servicio_id' => 2587),
    array('nombres' => 'Maria Alejandra', 'apellidos' => 'Bodero', 'numDocumento' => null, 'email' => 'mabodero@gmail.com', 'celular' => '+51980280244', 'servicio_id' => 2587),
    array('nombres' => 'Enrique Manuel', 'apellidos' => 'Arroyo Panduro', 'numDocumento' => null, 'email' => 'earroyop81.ea@icloud.com', 'celular' => '+51990926959', 'servicio_id' => 2587),
    array('nombres' => 'Romulo Alejandro', 'apellidos' => 'Salvador Cama', 'numDocumento' => null, 'email' => 'alejandrosalvador051@gmail.com', 'celular' => '+51930344357', 'servicio_id' => 2587),
    array('nombres' => 'Fiorela Giovanna', 'apellidos' => 'Tárraga Raucana', 'numDocumento' => null, 'email' => 'fiorellatarraga@gmail.com', 'celular' => '+51981227019', 'servicio_id' => 2587),
    array('nombres' => 'Victoria Valeria', 'apellidos' => 'Cortez Rivera', 'numDocumento' => null, 'email' => 'victoriacortez@bcp.com.pe', 'celular' => '+51953403363', 'servicio_id' => 2587),
    array('nombres' => 'GIANFRANCO', 'apellidos' => 'Bello', 'numDocumento' => null, 'email' => 'bakanelfulbito_741@hotmail.com', 'celular' => '+51950790428', 'servicio_id' => 2587),
    array('nombres' => 'Guido Gustavo', 'apellidos' => 'García Talledo', 'numDocumento' => null, 'email' => 'guidoggt2402@gmail.com', 'celular' => '+51934809340', 'servicio_id' => 2587),
    array('nombres' => 'Alberto', 'apellidos' => 'Tiahuallpa', 'numDocumento' => null, 'email' => 'alberto.tiahuallpa@gmail.com', 'celular' => '+51969824774', 'servicio_id' => 2587),
    array('nombres' => 'Nicole', 'apellidos' => 'Lizano Goñi', 'numDocumento' => null, 'email' => 'nicolizanog@gmail.com', 'celular' => '+51966750632', 'servicio_id' => 2587),
    array('nombres' => 'José Carlos', 'apellidos' => 'Uribe Palomino', 'numDocumento' => null, 'email' => 'josecarlos.up26@gmail.com', 'celular' => '+51970110543', 'servicio_id' => 2587),
    array('nombres' => 'Diana Guadalupe', 'apellidos' => 'Sánchez Rivera', 'numDocumento' => null, 'email' => 'd.sanchez1149@gmail.com', 'celular' => '+51994939092', 'servicio_id' => 2587),
    array('nombres' => 'Mauricio', 'apellidos' => 'Montenegro', 'numDocumento' => null, 'email' => 'mauriciomontenegroa@bcp.com.pe', 'celular' => '+51922186227', 'servicio_id' => 2587),
    array('nombres' => 'Marco', 'apellidos' => 'Flores', 'numDocumento' => null, 'email' => 'marcozfr@gmail.com', 'celular' => '+51992611135', 'servicio_id' => 2587),
    array('nombres' => 'Romina', 'apellidos' => 'Díaz Julcapoma', 'numDocumento' => null, 'email' => 'rominadiazjulcapoma@gmail.com', 'celular' => '+51966702668', 'servicio_id' => 2587),
    array('nombres' => 'Ricardo Manuel', 'apellidos' => 'Torres Velasquez', 'numDocumento' => null, 'email' => 'richitorres235@gmail.com', 'celular' => '+51936978945', 'servicio_id' => 2587),
    array('nombres' => 'Nory Idelsa', 'apellidos' => 'HERNANDEZ', 'numDocumento' => null, 'email' => 'nory.idelsa@gmail.com', 'celular' => '+51992122539', 'servicio_id' => 2587),
    array('nombres' => 'Gian Marco', 'apellidos' => 'Portugal Jurkic', 'numDocumento' => null, 'email' => 'gianmpj2@gmail.com', 'celular' => '+51957972614', 'servicio_id' => 2587),
    array('nombres' => 'Ariana', 'apellidos' => 'Santa Cruz', 'numDocumento' => null, 'email' => 'arianasantacruz535@gmail.com', 'celular' => '+51945788493', 'servicio_id' => 2587),
    array('nombres' => 'Jesus', 'apellidos' => 'Montoya Acuña', 'numDocumento' => null, 'email' => 'jesusmax81@gmail.com', 'celular' => '+51991481773', 'servicio_id' => 2587),
    array('nombres' => 'Karen', 'apellidos' => 'Arellano', 'numDocumento' => null, 'email' => 'karu.judith@gmail.com', 'celular' => '+51989506861', 'servicio_id' => 2587),
    array('nombres' => 'Evelyn', 'apellidos' => 'Condori', 'numDocumento' => null, 'email' => 'melisa.condoric@gmail.com', 'celular' => '+51959237192', 'servicio_id' => 2587),
    array('nombres' => 'Natalia', 'apellidos' => 'Cruz Pacheco', 'numDocumento' => null, 'email' => 'nattycp_0129@hotmail.com', 'celular' => '+51993059812', 'servicio_id' => 2587),
    array('nombres' => 'Noelia', 'apellidos' => 'Bonilla Acuña', 'numDocumento' => null, 'email' => 'elia_acbo_02@hotmail.com', 'celular' => '+51960685449', 'servicio_id' => 2587),
    array('nombres' => 'Katherein', 'apellidos' => 'Sánchez Zapata', 'numDocumento' => null, 'email' => 'shasha987847766@gmail.com', 'celular' => '', 'servicio_id' => 2587),
    array('nombres' => 'Rossana', 'apellidos' => 'Uribe', 'numDocumento' => null, 'email' => 'rossanauribea@bcp.com.pe', 'celular' => '+51996897669', 'servicio_id' => 2587),
    array('nombres' => 'Larisa Isabel', 'apellidos' => 'Rivadeneyra', 'numDocumento' => null, 'email' => 'larisa03rb@gmail.com', 'celular' => '+51923453446', 'servicio_id' => 2587),
    array('nombres' => 'Jacqqueline', 'apellidos' => 'Rios', 'numDocumento' => null, 'email' => 'jacqueliner2213@gmail.com', 'celular' => '+51991162526', 'servicio_id' => 2587),
    array('nombres' => 'Raúl Ricardo', 'apellidos' => 'Román Cárcamo', 'numDocumento' => null, 'email' => 'raulrrc88@gmail.com', 'celular' => '+51989250743', 'servicio_id' => 2587),
    array('nombres' => 'Nicole', 'apellidos' => 'Macuri6', 'numDocumento' => null, 'email' => 'franciemacuri@gmail.com', 'celular' => '+51937191154', 'servicio_id' => 2587),
    array('nombres' => 'Gerson Manosalva', 'apellidos' => 'Manosalva Guerrero', 'numDocumento' => null, 'email' => 'manosalvag@gmail.com', 'celular' => '+51924840013', 'servicio_id' => 2587),
    array('nombres' => 'María Villar', 'apellidos' => 'Villar Medel', 'numDocumento' => null, 'email' => 'marita.vm@gmail.com', 'celular' => '+51997135529', 'servicio_id' => 2587),
    array('nombres' => 'Ximena Moreno', 'apellidos' => 'Moreno Martel', 'numDocumento' => null, 'email' => 'xamorenom@gmail.com', 'celular' => '+51987795815', 'servicio_id' => 2587),
    array('nombres' => 'Lesly', 'apellidos' => 'Perez', 'numDocumento' => null, 'email' => 'leslylperez@gmail.com', 'celular' => '+51980748962', 'servicio_id' => 2587),
    array('nombres' => 'Marina Senisse', 'apellidos' => 'Rondinel', 'numDocumento' => null, 'email' => 'marinasenisse14@gmail.com', 'celular' => '+51948247633', 'servicio_id' => 2587),
    array('nombres' => 'Favio Edilson', 'apellidos' => 'Riveros Alfaro', 'numDocumento' => null, 'email' => 'fariedal2508@gmail.com', 'celular' => '+51990066362', 'servicio_id' => 2587),
    array('nombres' => 'Leydi', 'apellidos' => 'Rojas Perez', 'numDocumento' => null, 'email' => 'leydirojas29@gmail.com', 'celular' => '+51950120092', 'servicio_id' => 2587),
    array('nombres' => 'Carolina', 'apellidos' => 'Solano', 'numDocumento' => null, 'email' => 'carito2366@hotmail.com', 'celular' => '+51990086222', 'servicio_id' => 2587),
    array('nombres' => 'Karen Gabriela', 'apellidos' => 'Elescano Zabarburu', 'numDocumento' => null, 'email' => 'gabels.9504@gmail.com', 'celular' => '+51972603612', 'servicio_id' => 2587),
    array('nombres' => 'Fernanda', 'apellidos' => 'Mamani Navarro', 'numDocumento' => null, 'email' => 'mnavarrofernanda@gmail.com', 'celular' => '+51986835563', 'servicio_id' => 2587),
    array('nombres' => 'Maria Fe', 'apellidos' => 'Burga Cornejo', 'numDocumento' => null, 'email' => 'mburgacornejo@gmail.com', 'celular' => '+51998345058', 'servicio_id' => 2587),
    array('nombres' => 'Silvia', 'apellidos' => 'Viera', 'numDocumento' => null, 'email' => 'svierao81@gmail.com', 'celular' => '+51942050842', 'servicio_id' => 2587),
    array('nombres' => 'Geraldiny', 'apellidos' => 'Martinez', 'numDocumento' => null, 'email' => 'mgeraldiny03@gmail.com', 'celular' => '+51992262364', 'servicio_id' => 2587),
    array('nombres' => 'Walter Abel', 'apellidos' => 'Aviles Yataco', 'numDocumento' => null, 'email' => 'wt_98@hotmail.com', 'celular' => '+51996696814', 'servicio_id' => 2587),
    array('nombres' => 'Raul Mogollon', 'apellidos' => 'Mogollon Quispe', 'numDocumento' => null, 'email' => 'raulmogollon@bcp.com.pe', 'celular' => '+51964589076', 'servicio_id' => 2587),
    array('nombres' => 'Jenrry', 'apellidos' => 'Pallarco', 'numDocumento' => null, 'email' => 'jenrrypallarco@gmail.com', 'celular' => '+51991130905', 'servicio_id' => 2587),
    array('nombres' => 'Samuel', 'apellidos' => 'Condori Pampa', 'numDocumento' => null, 'email' => 'sam.condori.p@gmail.com', 'celular' => '+51993647743', 'servicio_id' => 2587),
    array('nombres' => 'Edgar Kenyi', 'apellidos' => 'Rojo Moreno', 'numDocumento' => null, 'email' => 'edgar.kenyi.rojo@gmail.com', 'celular' => '+51977768328', 'servicio_id' => 2587),
    array('nombres' => 'CYNTIA', 'apellidos' => 'VARGAS', 'numDocumento' => null, 'email' => 'katcynvl@gmail.com', 'celular' => '+51910215947', 'servicio_id' => 2587),
    array('nombres' => 'Mario', 'apellidos' => 'Mora', 'numDocumento' => null, 'email' => 'rulliormario@gmail.com', 'celular' => '+51971887447', 'servicio_id' => 2587),
    array('nombres' => 'Eduardo', 'apellidos' => 'Huaroc', 'numDocumento' => null, 'email' => 'Eduhuarocfigueroa@gmail.com', 'celular' => '+51937554462', 'servicio_id' => 2587),
    array('nombres' => 'Adrian', 'apellidos' => 'Ticona', 'numDocumento' => null, 'email' => 'adrian.ticona.tapia@gmail.com', 'celular' => '+51977137514', 'servicio_id' => 2587),
    array('nombres' => 'Katherine Diez', 'apellidos' => 'Diez Sánchez', 'numDocumento' => null, 'email' => 'Katherine_ds@hotmail.com', 'celular' => '+51991109186', 'servicio_id' => 2587),
    array('nombres' => 'Yoel', 'apellidos' => 'Cardenas', 'numDocumento' => null, 'email' => 'ym.cardenas.v@gmail.com', 'celular' => '+51984368263', 'servicio_id' => 2587),
    array('nombres' => 'Jairo', 'apellidos' => 'Villacorta', 'numDocumento' => null, 'email' => 'jairo.villacorta.mariano@gmail.com', 'celular' => '+51961853776', 'servicio_id' => 2587),
    array('nombres' => 'Eric Giancarlos', 'apellidos' => 'PALGA HUACACHI', 'numDocumento' => null, 'email' => 'eric_vizard@hotmail.com', 'celular' => '+51951348607', 'servicio_id' => 2587),
    array('nombres' => 'Alicia', 'apellidos' => '', 'numDocumento' => null, 'email' => '', 'celular' => '+51956020933', 'servicio_id' => 2587),
    array('nombres' => 'Karla', 'apellidos' => '', 'numDocumento' => null, 'email' => '', 'celular' => '+51992732303', 'servicio_id' => 2587),
    array('nombres' => 'Erick', 'apellidos' => '', 'numDocumento' => null, 'email' => '', 'celular' => '+51933668473', 'servicio_id' => 2587),*/
    array('nombres' => 'Manuel Alonso', 'apellidos' => 'Morante Baldo', 'numDocumento' => null, 'email' => 'manuelmoranteb@gmail.com', 'celular' => '+51999362526', 'servicio_id' => 2587),
    array('nombres' => 'Jeannette', 'apellidos' => 'Ferrer', 'numDocumento' => null, 'email' => 'jnft@hotmail.com', 'celular' => '+51975222437', 'servicio_id' => 2587),
    array('nombres' => 'Jackeline', 'apellidos' => 'Anccana', 'numDocumento' => null, 'email' => 'jackeline.anccana@gmail.com', 'celular' => '+51935575025', 'servicio_id' => 2587),
    array('nombres' => 'Sergio', 'apellidos' => 'Yaranga Espiritu', 'numDocumento' => null, 'email' => 'scye354@live.com', 'celular' => '+51987322980', 'servicio_id' => 2587),
    array('nombres' => 'Jorge', 'apellidos' => 'Alejos Cordova', 'numDocumento' => null, 'email' => 'jorge.alejos0789@gmail.com', 'celular' => '+51993753815', 'servicio_id' => 2587),
    array('nombres' => 'Dylann Ernesto', 'apellidos' => 'Rojas Huaytalla', 'numDocumento' => null, 'email' => 'dylann.rojas890@outlook.com', 'celular' => '+51933909006', 'servicio_id' => 2587),
    array('nombres' => 'Airamt Wilson', 'apellidos' => 'Cerron Rodriguez', 'numDocumento' => null, 'email' => 'airamtcr@gmail.com', 'celular' => '+51996838685', 'servicio_id' => 2587),
    array('nombres' => 'Jose Octavio', 'apellidos' => 'Ramos Benito', 'numDocumento' => null, 'email' => 'joseoctaviobenito.02@gmail.com', 'celular' => '+51925156318', 'servicio_id' => 2587),
    array('nombres' => 'Diego', 'apellidos' => 'Miñope', 'numDocumento' => null, 'email' => 'diego.equisde15@gmail.com', 'celular' => '+51960308690', 'servicio_id' => 2587),
);
$fecha_actual = date("Y-d-m H:i:s");
foreach ($alumnos as $key => $valor) {
    var_dump(matriculaApi($valor['nombres'], $valor['apellidos'], $valor['numDocumento'], $valor['celular'], $valor['email'], $valor['servicio_id'], 's', 0, null));
    ($key + 1) . "</br>";
    var_dump($valor);
}
count($alumnos);
