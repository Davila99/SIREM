import React, { useEffect, useState } from "react";
import PivotTableUI from "react-pivottable/PivotTableUI";
import "react-pivottable/pivottable.css";

const data = [
    ["attribute", "attribute2"],
    ["value1", "value2"],
];

export function ReporteMatriculas() {
    const [state, setState] = useState([]);
    const [estudiantes, setEstudiantes] = useState([]);
    const [search, setSearch] = useState("");

    const URL = "http://127.0.0.1:8000/reporte-matricula";

    const getEstudiantes = async () => {
        const response = await fetch(URL);
        const data = await response.json();
        setEstudiantes(data.matriculas);
    };

    useEffect(() => {
        getEstudiantes();
    });

    return (
        <>
            <div className="container">
                <div className="row">
                    <div className="col-md-12">
                        <h1>Reporte de Matriculas</h1>
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
        </>
    );
}

export default ReporteMatriculas;
