
import React, { useEffect, useState } from "react";
import PivotTable from "./PivotTable";

const ReporteMatriculas = () => {
  const [calificaciones, setCalificaciones] = useState([]);
  const [search, setSearch] = useState("");

  const URL = "http://127.0.0.1:8000/data-reporte-calificaciones";

  const getCalificaciones = async () => {
    const response = await fetch(URL);
    const data = await response.json();
    setCalificaciones(data.calificaciones);
  };

  useEffect(() => {
    getCalificaciones();
  }, []); 

  return (
    <div className="container">
      <div className="row">
        <div className="col-md-12">
          <h1>Reporte de calificaciones</h1>
        </div>
      </div>
      <PivotTable data={calificaciones} />
    </div>
  );
};

export default ReporteMatriculas;
