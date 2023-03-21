import axios from "axios";
import { useEffect, useState } from "react";

export const LitarEstudiantes = () => {
    const [estudiantes, setEstudiantes] = useState([]);

    //función para traer los datos de la API
    const URL = "http://127.0.0.1:8000/search-estudiantes";

    const getEstudiantes = async () => {
        const response = await fetch(URL);
        const data = await response.json();
        setEstudiantes(data.estudiantes.data);
     
        
    };
    console.log(estudiantes)
    // const getEstudiantes = async () => {
    //     const respuesta = await axios.get(URL);
    //     setEstudiantes(respuesta.data);
    //     console.log(respuesta.data)
    // };
    
    useEffect(() => {
        getEstudiantes();
        
    }, []);

    return (
        <div>
            <table className="table table-striped table-hover mt-5 shadow-lg">
                <thead>
                    <tr className="bg-curso text-white">
                        <th>Nombre</th>
                        <th>Apellidos</th>
                    </tr>
                </thead>
                <tbody>
                   
                    {estudiantes.map((estudiante) => (
                        <tr key={estudiante.id}>
                        <td>{estudiante.nombres}</td>
                        <td>{estudiante.apellidos}</td>
                    </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};
