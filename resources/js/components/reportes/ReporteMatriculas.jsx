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



        const response = await fetch("http://127.0.0.1:8000/export-matriculas-excel", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: state,

        });

        if (response.ok) {
            window.open("http://127.0.0.1:8000/export-matriculas-excel", "_blank");
        } else {
            console.error("Error al descargar el reporte");
            console.error(state);
        }

        console.log("Descargando...");
    };
    useEffect(() => {
        getEstudiantes();
    }, []);

    return (
        <div className="container">
            <div className="row">
                <div className="col-md-6">
                    <h1>Reporte de Matriculas</h1>
                </div>
                <div className="col-md-6">
                    <button
                        className="btn btn-primary"
                        onClick={handleDownload}
                    >
                        Descargar Reporte
                    </button>
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
