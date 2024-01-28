import React, { useEffect, useState } from "react";
import PivotTableUI from "react-pivottable/PivotTableUI";
import "react-pivottable/pivottable.css";

const ReporteCalificaciones = () => {
    const [state, setState] = useState([]);
    const [calificaciones, setCalificaciones] = useState([]);
    const [search, setSearch] = useState("");

    const URL = "http://127.0.0.1:8000/data-reporte-calificaciones";

    const getCalificaciones = async () => {
        const response = await fetch(URL);
        const data = await response.json();
        setCalificaciones(data.calificaciones);
    };

    const handleDownload = async () => {
        console.log("Descargando...");
    };
    useEffect(() => {
        getCalificaciones();
        // handleDownload();
    }, []);
    return (
        <div className="container">
            <div className="row">
                <div className="col-md-12">
                <div className="col-md-12">
                    <h1>Reporte de Calificaciones</h1>
                    <a 
                        className="btn btn-primary"
                      href="/export-calificaciones-excel" target="_blank"
                    >
                        Descargar Reporte
                    </a>
                </div>
                    <PivotTableUI
                        data={calificaciones}
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

export default ReporteCalificaciones;
