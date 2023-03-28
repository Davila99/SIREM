import * as ReactDOM from "react-dom/client"


require('./bootstrap');
import App from './components/app'

import 'sweetalert2/src/sweetalert2.scss'
import BuscadorEmpleados from "./components/empleados/BuscadorEmpleados";
import { CrearEstudiante } from "./components/estudiantes/CrearEstudiante";
import BuscadorEstudiantes from "./components/estudiantes/BuscadorEstudiantes";
//importar sweet alert dialog en las vistas eliminar/confirmar
 window.Swal = require('sweetalert2')

 if (document.getElementById('reactapp')) {
    const appReact = document.getElementById('reactapp');
    const root = ReactDOM.createRoot(appReact);
    root.render(<BuscadorEstudiantes/>);
  }
  if (document.getElementById('reactAppBuscadorEmpleado')) {
    const appReact = document.getElementById('reactAppBuscadorEmpleado');
    const root = ReactDOM.createRoot(appReact);
    root.render(<BuscadorEmpleados/>);
  }
