function exportarAExcel() {
    // Obtén la tabla HTML
    var tabla = document.getElementById("table");

    // Crea un objeto de libro de Excel
    var libro = XLSX.utils.book_new();
    
    // Añade una hoja al libro
    var hoja = XLSX.utils.table_to_sheet(tabla);
    
    // Obtiene las filas de la hoja como objetos JSON
    var filas = XLSX.utils.sheet_to_json(hoja);

    // Filtra las columnas que deseas mantener y elimina 'Acciones'
    filas = filas.map(function (fila) {
        return {
            'Nombres': fila['Nombres'],
            'Apellidos': fila['Apellidos'],
            'CI': fila['CI'],
            'Evento': fila['Evento'],
            'Grupo': fila['Grupo']
        };
    });

    // Añade el título como una única celda al principio de la hoja
    filas.unshift(['PARTICPANTES']);

    // Crea una hoja de cálculo con los datos
    var hojaConTitulo = XLSX.utils.json_to_sheet(filas);

    // Añade la hoja al libro
    XLSX.utils.book_append_sheet(libro, hojaConTitulo, 'Participantes');

    // Descarga el archivo Excel
    XLSX.writeFile(libro, "archivo_excel.xlsx");
}