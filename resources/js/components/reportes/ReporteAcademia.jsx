import React, { useEffect, useState } from "react";
import PivotTableUI from "react-pivottable/PivotTableUI";
import "react-pivottable/pivottable.css";

const ReporteAcademia = () => {
    const [state, setState] = useState([]);
    const [academia, setAcademia] = useState([]);

    const URL = "http://127.0.0.1:8000/data-reporte-academia";

    const getAcademia = async () => {
        const response = await fetch(URL);
        const data = await response.json();
        setAcademia(data.academia);
    };

    const handleDownload = async () => {
        console.log("Descargando...");
    };
    useEffect(() => {
       getAcademia();
    }, []);
    return (
        <div className="container">
            <div className="row">
                <div className="col-md-12">
                    <div className="mb-3">
                        <h1>Reporte de Academia</h1>
                        <button className="btn btn-primary" onClick={handleDownload}>
                            Descargar Reporte
                        </button>
                    </div>
                    <PivotTableUI
                        data={academia}
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

export default ReporteAcademia;
