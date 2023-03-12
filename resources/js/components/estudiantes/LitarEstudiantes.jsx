import axios from "axios";
import {useEffect, useState} from "react";

export const LitarEstudiantes = () => {
    const [estudiantes, setEstudiantes] = useState([]);

    const getStudiantes = async () => {
        console.log(" estoy llamando a los estudiantes");
    }


    useEffect(() => {
        getStudiantes()
    }, [])
    

    return <div>Listart estudiantes</div>;
};
