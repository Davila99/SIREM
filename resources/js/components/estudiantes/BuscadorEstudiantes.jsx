import axios from "axios";
import React, { useState, useEffect } from "react";
function BuscadorEstudiantes() {
    const numbers = [1, 2, 3, 4, 5];
    const [estudiantes, setEstudiantes] = useState([]);
    const [search, setSearch] = useState("");
    useEffect(() => {
        getEstudiantes();
    }, []);
    //función para traer los datos de la API
    const URL = "http://127.0.0.1:8000/search-estudiantes";

    const getEstudiantes = async () => {
        const respuesta = await axios.get(URL);
        setEstudiantes(respuesta.data);
    };

    //función de búsqueda
    const searcher = (e) => {
        setSearch(e.target.value);
    };
    //metodo de filtrado 2
    const results = !search
        ? estudiantes
        : estudiantes.data.filter((dato) =>
              dato.nombres.toLowerCase().includes(search.toLocaleLowerCase())
          );

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
                        <th>Nombre</th>
                        <th>Apellidos</th>
                    </tr>
                </thead>
                <tbody>
                    {estudiantes.map(estudiante => (
                        <tr key={estudiante.id}>
                            <td>{estudiantes.nombres}</td>
                            <td>{estudiantes.apellidos}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}

export default BuscadorEstudiantes;
