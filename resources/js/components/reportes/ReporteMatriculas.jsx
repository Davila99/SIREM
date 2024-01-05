import React, { useEffect, useState } from "react";
import PivotTableUI from "react-pivottable/PivotTableUI";
import "react-pivottable/pivottable.css";

const ReporteMatriculas = () => {
    const [state, setState] = useState([]);
    const [estudiantes, setEstudiantes] = useState([]);

    const URL = "http://127.0.0.1:8000/data-reporte-matricula";

    const getEstudiantes = async () => {
        const response = await fetch(URL);
        const data = await response.json();
        setEstudiantes(data.matriculas);
    };
    const handleDownload = async () => {

        console.log("Descargando...");
    };

    useEffect(() => {
        getEstudiantes();
    }, []);

    return (
        <div className="container">
            <div className="row">
                <div className="col-md-12">
                    <h1>Reporte de Matriculas</h1>
                    <a 
                        className="btn btn-primary"
                      href="/export-matriculas-excel" target="_blank"
                    >
                        Descargar Reporte
                    </a>
                </div>
            </div>
            <div className="row">
                <div className="col-md-12">
                    <PivotTableUI
                        data={estudiantes}
                        onChange={(s) => {
                            setState(s);
                        }}
                        {...state}
                    />
                </div>
            </div>
        </div>
    );
};

export default ReporteMatriculas;
