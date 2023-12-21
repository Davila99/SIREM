import React, { useEffect, useState } from "react";
import PivotTableUI from "react-pivottable/PivotTableUI";
import "react-pivottable/pivottable.css";

const ReporteMatriculas = () => {
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
                    <div className="mb-3">
                        <h1>Reporte de calificaciones</h1>
                        <button className="btn btn-primary" onClick={handleDownload}>
                            Descargar Reporte
                        </button>
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

export default ReporteMatriculas;
