import React, { useState, useEffect } from "react";
function BuscadorEmpleados() {
    const [empleados, setEmpleados] = useState([]);
    const [search, setSearch] = useState("");

    const URL = "http://127.0.0.1:8000/search-empleados";

    const getEmpleados = async () => {
        const response = await fetch(URL);
        const data = await response.json();
        setEmpleados(data.empleados);
    };
    console.log(empleados);
    const searcher = (e) => {
        setSearch(e.target.value);
    };

    const results = !search
        ? empleados
        : empleados.filter((dato) =>
              dato.nombres.toLowerCase().includes(search.toLocaleLowerCase())
          );
    useEffect(() => {
       getEmpleados();
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
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    {results.map((empleado) => (
                        <tr key={empleado.id}>
                            <td>{empleado.nombres}</td>
                            <td>{empleado.apellidos}</td>
                            <td>{empleado.telefono}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}

export default BuscadorEmpleados;
