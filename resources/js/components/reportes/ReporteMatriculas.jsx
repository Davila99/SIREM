
import React, { useEffect, useState } from "react";
import PivotTable from "./PivotTable";

const ReporteMatriculas = () => {
  const [estudiantes, setEstudiantes] = useState([]);
  const [search, setSearch] = useState("");

  const URL = "http://127.0.0.1:8000/data-reporte-matricula";

  const getEstudiantes = async () => {
    const response = await fetch(URL);
    const data = await response.json();
    setEstudiantes(data.matriculas);
  };

  useEffect(() => {
    getEstudiantes();
  }, []); 

  return (
    <div className="container">
      <div className="row">
        <div className="col-md-12">
          <h1>Reporte de Matriculas</h1>
        </div>
      </div>
      <PivotTable data={estudiantes} />
    </div>
  );
};

export default ReporteMatriculas;
