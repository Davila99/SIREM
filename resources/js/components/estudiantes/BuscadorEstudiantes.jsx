
import React, { useState, useEffect } from "react";
function BuscadorEstudiantes() {
    const [estudiantes, setEstudiantes] = useState([]);
    const [search, setSearch] = useState("");

    const URL = "http://127.0.0.1:8000/search-estudiantes";

    const getEstudiantes = async () => {
        const response = await fetch(URL);
        const data = await response.json();
        setEstudiantes(data.estudiantes.data);
    };
    console.log(estudiantes);
    const searcher = (e) => {
        setSearch(e.target.value);
    };

    const results = !search
        ? estudiantes
        : estudiantes.filter((dato) =>
              dato.nombres.toLowerCase().includes(search.toLocaleLowerCase())
          );
    useEffect(() => {
        getEstudiantes();
    }, []);
    return (
        <div>
            <input
                value={search}
                onChange={searcher}
                type="text"
                placeholder="Search"
                className="form-control"
            />

            <table className="table table-striped table-hover mt-5 shadow-lg">
                <thead>
                    <tr className="bg-curso text-white">
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Direcion</th>
                    </tr>
                </thead>
                <tbody>
                    {results.map((estudiante) => (
                        <tr key={estudiante.id}>
                            <td>{estudiante.nombres}</td>
                            <td>{estudiante.apellidos}</td>
                            <td>{estudiante.direccion}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}

export default BuscadorEstudiantes;
