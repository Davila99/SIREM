import * as ReactDOM from "react-dom/client";

require("./bootstrap");

import "sweetalert2/src/sweetalert2.scss";
import BuscadorEmpleados from "./components/empleados/BuscadorEmpleados";
import BuscadorEstudiantes from "./components/estudiantes/BuscadorEstudiantes";
import BuscadorMatriculas from "./components/matriculas/BuscadorMatriculas";
//importar sweet alert dialog en las vistas eliminar/confirmar

import { initializeDataTable } from "./funciones";
import ReporteMatriculas from "./components/reportes/ReporteMatriculas";
initializeDataTable();
window.Swal = require("sweetalert2");

if (document.getElementById("reactapp")) {
    const appReact = document.getElementById("reactapp");
    const root = ReactDOM.createRoot(appReact);
    root.render(<ReporteMatriculas />);
}
if (document.getElementById("reactAppBuscadorEmpleado")) {
    const appReact = document.getElementById("reactAppBuscadorEmpleado");
    const root = ReactDOM.createRoot(appReact);
    root.render(<BuscadorEmpleados />);
}
if (document.getElementById("reactAppBuscadorMatriculas")) {
    const appReact = document.getElementById("reactAppBuscadorMatriculas");
    const root = ReactDOM.createRoot(appReact);
    root.render(<BuscadorMatriculas />);
}
